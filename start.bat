%systemDrive%xamppmysqlbinmysql -uroot -e

php -r copy('.env.example', '.env');
#przekopiowanie danych z pliku env.example do plik env

call composer install
#instalacja plików vendor

call php artisan migrate
#wykonanie migracji

call php artisan dbseed
#wykonanie seedów

code .