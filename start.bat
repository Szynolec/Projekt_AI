%systemDrive%xamppmysqlbinmysql -uroot -e

php -r "copy('.env.example', '.env');"

call composer install

call php artisan key:generate

call php artisan storage:link

call php artisan migrate

call php artisan dbseed

code .