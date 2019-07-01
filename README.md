# blog-app
An app that allows the Admin to create, edit and delete posts, and other users to view those posts.

# Features

1. Guests can view blogs made by the admin, sign up and log in.
2. Logged in users can view the blogs ,and make comments on them.
3. Admin user can create, edit, and delete posts.
4. All users can use dark mode.
5. Admin can put his social media links in the footer.


# Server requirements

1. PHP >= 7.1.3
2. OpenSSL PHP Extension
3. PDO PHP Extension
4. Mbstring PHP Extension
5. Tokenizer PHP Extension
6. XML PHP Extension
7. Ctype PHP Extension
8. JSON PHP Extension
9. BCMath PHP Extension
10. NodeJs and NPM (node package manager)
11. MySQL database server
12. MongoDB
13. MongoDB PHP driver
14. Vuex

# Deployment

To deploy space-bubble on your server you need to run the following commands in the terminal to ensure that the dependencies needed are installed.

```
composer install
npm install
```
After that create a database in your MySQL server and give it a name that you want.

Copy `.env.example` file to `.env`

```
cp .env.example .env
```

Then run the following command to generate an app key :-

```
php artisan key:generate
```

After that add your database name, username and password to the `.env` file

```

MONGO_DB_DATABASE=[YOUR_MONGODB_DATABASE_NAME]
MONGO_DB_USERNAME=[YOUR_MONGODB_USER_NAME]
MONGO_DB_PASSWORD=[YOUR_MONGODB_PASSWORD]

DB_DATABASE=[YOUR_DATABASE_NAME]
DB_USERNAME=[YOUR_USER_NAME]
DB_PASSWORD=[YOUR_PASSWORD]

```

To create the framework needed tables run the following command:-

```
php artisan migrate
```

To run the development server you need to run

```
php artisan serve
```

# How it works
## Creating an admin
To create an admin for the website you need to run the following command in the terminal in the project directory :-

```
php artisan make:admin
```
Which will ask you for your username and password
Password must be more than 6 characters
