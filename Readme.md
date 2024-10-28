# E-commerce Mangment System

## Introduction 

**A website for creating a system to manage a Products .**
    There two kinds of users admin and user . In these website you can view all (User,Products,Shippers) you can browse the forntend template and update your profile as user, in additon admin can view dashboard for (user,products,shippers) ,can  view student profiles,delete their accounts , promote them to be an admin or demote them and can apply CRUD system on (products,shppiers) .


## Featuers
1- Use free forntend template
2- Localization whole site
3- CRUD system for users,products,shippers
4- Can update your profile
5- Laravel auth system
6- API Implementation
7- Middleware Implementation
9- Gate Implementation
10- Laravel Sanctum

[Project Video Overview](https://drive.google.com/file/d/1NfodKUzX-V3ohlTJIOevLT-toSsXKaMw/view?usp=sharing)
## Installtion

1. clone this repository
```bash
git clone https://github.com/KhaledMahmoudSaeed/Kian.git
```
2. Navigate to the project directory 
3. Install dependencies
``` bash
npm install 
npm run build
```
4. Insatll composer
```bash
composer install
```
5. copy the .env.example to new file .evn  
   if you use windows run this
```bash
copy .env.example .env
```
   else
```bash
cp .env.example .env
```
6. Generate encrytion key 
```bash
php artisan key:generate
```
7. Edit database configration in .env to your database
8. add this in vite.config.js to ensure that your Vite configuration file (usually vite.config.js or vite.config.ts) specifies the correct entry points
```php
   build: {
        rollupOptions: {
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                // No wildcard for images
            ],
        },
    },
```

## Usage
1. Clear the congif cach 
```bash
php artisan config:cache
```
2. run this command 
```bash
php artisan storage:link
 ```
3. Navigate to the directory which you clone the project 
4. Run the server
 ```bash
php artisan serve
  ```
5. Build the project 
```bash
npm run build 
 ```
6. There are some default photos for users,products and shippers all are stored in public each one in a folder under its name
     users/img    the default img is  feature-image.jpg
     shipers/img  the default img is  shipper.png
     products/img the default img is  team_01.jpg
#### Be default all 15 users have a default image by name Capture.PNG

