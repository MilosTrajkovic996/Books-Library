
Project Setup:
```
clone project 
 - git clone
```
```
Install dependencies:
 - composer install
```
```
Database configuration:

Configure your database settings in the .env file.
```
```
Check Environment File:

Ensure that your .env file is correctly configured.
```
```
Run migrations:
 - php artisan migrate

Seed Database:

To populate the database with sample data (librarians, readers, and authors):

 - php artisan migrate:refresh --seed

```
```
Link Storage - create link from the 'public' directory to the 'storage' directory
- php artisan storage:link
```
```
Start the Server:
 - php artisan serve
```

```