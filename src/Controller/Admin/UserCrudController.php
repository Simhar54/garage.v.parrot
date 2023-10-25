<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController
{

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstname')
                ->setLabel('Prénom')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            TextField::new('lastname')
                ->setLabel('Nom de famille')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 2 caractères']
                ]),
            TextField::new('email')
                ->setLabel('Adresse e-mail')
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Mettre une adresse e-mail valide']
                ]),
            TextField::new('password')
                ->setLabel('Mot de passe')
                ->onlyOnForms()
                ->setFormType(PasswordType::class)
                ->setFormTypeOptions([
                    'attr' => ['placeholder' => 'Doit contenir au moins 12 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial']
                ]),
            ArrayField::new('roles')
                ->setLabel('Rôles')
                ->hideOnForm(),
            DateField::new('created_at')
                ->setLabel('Date de création')
                ->onlyOnIndex(),
            BooleanField::new('first_time_login')
                ->setLabel('Première connexion')
                ->onlyOnIndex(),

               
        ];
    }

    
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $user = $entityInstance;
        // Set default role if none is set
            $user->setRoles(['ROLE_EMPLOYEE']);
        // Hash password before persisting
        $plainPassword = $user->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        parent::persistEntity($entityManager, $user);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setPageTitle('index', 'Utilisateurs')
            ->setPaginatorPageSize(10);
    }

}
