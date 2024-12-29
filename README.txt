# CakePHP Project - README

## Pré-requis
- **Version PHP** : 8.2.12 (uniquement compatible)  
- **XAMPP** : Recommandé comme environnement serveur local  

---

## Instructions d'installation

1. **Installer XAMPP** :  
   - Téléchargez XAMPP depuis : [https://www.apachefriends.org](https://www.apachefriends.org).  
   - Assurez-vous que la version de PHP est 8.2.12.

2. **Télécharger le projet** :  
   - Clonez le dépôt ou téléchargez-le au format ZIP.  
   - Extrayez le projet (folder "ibrahim_web" et copiez le dossier dans le répertoire `htdocs` de XAMPP.

3. **Configurer la base de données** :  
   - Lancez Apache et MySQL dans XAMPP.  
   - Accédez à phpMyAdmin via [http://localhost/phpmyadmin](http://localhost/phpmyadmin).  
   - Créez une nouvelle base de données.  
   - Importez le fichier `ibrahim_web.sql` (fourni dans le projet).  
   - Le nom de base de donner doit etre: "ibrahim_web"

5. **Mettre à jour la configuration** :  ( si tu veut changer le nom de Base de donne)
   - Ouvrez le fichier `config/app_local.php`.  
   - Modifiez les informations de connexion à la base de données :  
     ```php
     'username' => 'root',
     'password' => '',
     'database' => 'nom_de_votre_base_de_donnees',
     ```  

6. **Lancer le projet** :  
   - Ouvrez un navigateur et accédez à :  
     [http://localhost/ibrahim_web] ou [http://localhost/ibrahim_web/users/login].  

---

## Notes supplémentaires
- Assurez-vous que la version de PHP dans XAMPP correspond exactement à **8.2.12**.  
- En cas de problème, vérifiez les journaux dans `logs/error.log`ou bien contacter Moi. 


Merci Pour votre Temps!!!