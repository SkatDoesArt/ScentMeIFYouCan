allez dans : ./script/terminale.sh
puis : cd SMIYC
apres : rm writable/database.db 
et : ls -al writable/ -> pour verif si ca a bien été supp 
apres : php spark db:create database.db -> pour recréer proprement la database
et : php spark migrate --all -> pour bien faire toute les tables 
enfin : php spark db:seed AllSeeder -> pour les seeder 