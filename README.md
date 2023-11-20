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
- Cloner le projet :
    En HTTPS :</br>
    ```git clone https://github.com/Simhar54/garage.v.parrot.git ``` </br>
   Ou avec SSH :</br>
    ```git clone git@github.com:Simhar54/garage.v.parrot.git ```</br>
- Se rendre dans le dossier du projet :</br>
    ```cd garage.v.parrot```
- Installer les dépendances :</br>
    ```composer install```
- Créer un fichier .env.local et y ajouter les informations de connexion à la base de données : </br>
    ```DATABASE_URL="mysql://user:password@host:port/database_name"```
- A la fin du fichier .env.local ajouter les lignes: </br>
    ```### Nom du garage ###  ```	</br>
    ```GARAGE_NAME="Garage V Parrot"```
- Créer la base de données :</br>
    ```symfony console doctrine:database:create```
- Créer les tables :</br>
    ```symfony console doctrine:migrations:migrate```
- Charger les données de test :</br>
    ```symfony console doctrine:fixtures:load```

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



