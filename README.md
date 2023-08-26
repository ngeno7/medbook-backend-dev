
## Medbook Test

### Backend
Install the packages using composer

```
composer install
```
To set up the database
create a database on your local machine and update the .env to match your database credentials. Run the following command to set up database tables.
```
php artisan migrate:fresh --seed
```

To Serve the application run the following command.
Use the default port (8000) because of the consumption by the frontend.
```
php artisan serve  


