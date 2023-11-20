# garage.v.parrot

INTRODUCTION

Examen en cours de formation. Application Symfony pour la gestion d'un site pour une garage automobile.

PREREQUIS

- PHP 8.2
- Symfony CLI
- Composer
- Une base de données ("MySQL", "MariaDB", "PostgreSQL" etc...)

INSTALLATION

Dans un terminal :
Se rendre dans le dossier où vous souhaitez installer le projet.
- Cloner le projet :
    En HTTPS :
    ```git clone https://github.com/Simhar54/garage.v.parrot.git ```
    Ou avec SSH :
    ```git clone git@github.com:Simhar54/garage.v.parrot.git ```
- Se rendre dans le dossier du projet :
    ```cd garage.v.parrot```
- Installer les dépendances :
    ```composer install```
- Créer un fichier .env.local et y ajouter les informations de connexion à la base de données :
    ```DATABASE_URL="mysql://user:password@host:port/database_name"```
- A la fin du fichier .env.local ajouter les lignes:
    ```### Nom du garage ###  ```	
    ```GARAGE_NAME="Garage V Parrot"```
- Créer la base de données :
    ```symfony console doctrine:database:create```
- Créer les tables :
    ```symfony console doctrine:migrations:migrate```
- Charger les données de test :
    ```symfony console doctrine:fixtures:load```

UTILISATION

- Lancer le serveur :
    ```symfony serve```
- Se rendre sur la page d'accueil :
    ```https://127.0.0.1:8000/```
- Se connecter en tant qu'administrateur avec les identifiants suivants :
    ```email :admin@demo.fr```
    ```password :Admin123456.```
- Se connecter en tant qu'employé avec les identifiants suivants :
    ```email :employee@demo.fr```
    ```password :Employee123456.```



