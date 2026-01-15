rm writable/database.db 
php spark db:create database.db
php spark migrate --all
php spark db:seed AllSeeder
chmod -R 777 writable