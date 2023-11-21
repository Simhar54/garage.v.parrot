# garage.v.parrot

# INTRODUCTION

Examen en cours de formation. </br> 
Application Symfony pour la gestion d'un site pour une garage automobile.

# PREREQUIS

- PHP 8.2
- Symfony CLI
- Composer
- Une base de données ("MySQL", "MariaDB", "PostgreSQL" etc...)

# INSTALLATION

Dans un terminal :
Se rendre dans le dossier où vous souhaitez installer le projet.
1.  Cloner le projet :
    En HTTPS :</br>
    ```git clone https://github.com/Simhar54/garage.v.parrot.git ``` </br>
   Ou avec SSH :</br>
    ```git clone git@github.com:Simhar54/garage.v.parrot.git ```</br>
2.  Se rendre dans le dossier du projet :</br>
    ```cd garage.v.parrot```
3.  Créer un fichier .env.local et y ajouter les informations de connexion à la base de données : </br>
    ```DATABASE_URL="mysql://user:password@host:port/database_name"```
4.  Configurer le mailer dans le fichier .env.local avec vos identifiant : </br>
    ```MAILER_DSN=smtp://USERNAME:PASSWORD@HOST:PORT?encryption=ENCRYPTION_METHOD```</br>
    Si vous n'avez pas d'adresse mail lire a la fin du fichier README.md pour créer un mail de test.
5.  A la fin du fichier .env.local ajouter les lignes: </br>
    ```### Nom du garage ###  ```	</br>
    ```GARAGE_NAME="Garage V Parrot"``

6.  Installer les dépendances :</br>
    ```composer install```</br>
    Des erreurs vont apparaitre a la fin du chargement, c'est normal il faut finir les instructions.

8.  Créer la base de données :</br>
    ```symfony console doctrine:database:create```
9.  Créer les tables :</br>
    ```symfony console doctrine:migrations:migrate```
10.  Charger les données de test :</br>
    ```symfony console doctrine:fixtures:load```
`
11. Execute la commande :</br>
    ```symfony console cache:clear```
    pour vider le cache.

12. Execute la commande :</br>
    ```symfony console assets:install```
    pour installer les assets.


## Configuration des Adresses E-mail

L'application utilise le composant Mailer de Symfony pour envoyer des e-mails. Pour que cela fonctionne, vous devez configurer le composant Mailer avec les paramètres suivants dans le fichier .env.local (l'adresse de l'expéditeur et l'adresse du destinataire peuvent être identiques) :
# L'adresse e-mail qui sera utilisée comme expéditeur dans les e-mails envoyés par l'application.
 ```MAIL_FROM_ADDRESS=expedition@exemple.fr```

# L'adresse e-mail destinataire pour les e-mails reçus par l'application (par exemple, pour les formulaires de contact).
 ```MAIL_TO_ADDRESS=contact@exemple.fr```

# UTILISATION

- Lancer le serveur :</br>
    ```symfony serve```
- Se rendre sur la page d'accueil :</br>
    ```https://127.0.0.1:8000/```
- Se connecter en tant qu'administrateur avec les identifiants suivants :</br>
    ```email :admin@demo.fr```</br>
    ```password :Admin123456.```
- Se connecter en tant qu'employé avec les identifiants suivants :</br>
    ```email :employee@demo.fr```</br>
    ```password :Employee123456.```

# POUR CREER UN MAIL DE TEST

## Configuration de Test pour les Emails

Si vous n'avez pas d'adresse email pour tester l'envoi d'emails, vous pouvez utiliser un service de test d'email. Voici quelques options :

### Mailtrap

Mailtrap est un service en ligne qui simule un serveur SMTP pour tester l'envoi d'emails. Il permet de visualiser les emails dans une boîte de réception virtuelle sans les envoyer réellement. Pour l'utiliser :

1. Crée un compte sur [Mailtrap](https://mailtrap.io).
2. Trouve tes identifiants SMTP dans ton compte Mailtrap.
3. Configure la chaîne `MAILER_DSN` dans ton fichier `.env.local` avec les identifiants fournis par Mailtrap.

Exemple :
```MAILER_DSN=smtp://USERNAME:PASSWORD@mailtrap.io:2525?encryption=tls```

### MailHog

MailHog est une application open source qui capture les emails envoyés par ton application et les affiche dans une interface web. C'est utile pour tester l'envoi d'emails en local. Pour l'utiliser :
1. Telecharge MailHog sur https://github.com/mailhog/MailHog/releases/tag/v1.0.1
2. Installe MailHog sur ton système.
3. Configure MailHog comme serveur SMTP dans ton fichier .env.local.

Exemple :
```MAILER_DSN=smtp://localhost:1025?encryption=tls```
