# ITC Expenses Management

## Installation
The installation of this project requires [composer](https://getcomposer.org)

- Step 1: Clone this repository
  ```
  git clone git@github.com:ahmard/ict-expenses-management.git
  ```
- Step 2: Change directory ownership
  ```
  chown www-data:www-data ict-expenses-management -R
  ```
- Step 3: Install composer dependencies
  ```
  cd ict-expenses-management
  composer update
  ```
- Step 4: Configure database connection, duplicate **.env.example** to **.env** and make following changes to **.env**
    * DB_DATABASE = your_database_name
    * DB_USERNAME = your_database_user
    * DB_PASSWORD = your_database_user_password
- Step 5: Generate application key
  ```
  php artisan key:generate
  ```
- Step 6: copy **config/dev.conf** to **/etc/nginx/conf.d/dev.conf** to configure nginx
- Step 7: Restart nginx
  ```
  service nginx restart
  ```
