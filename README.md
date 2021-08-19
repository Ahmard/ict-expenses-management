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

### You can alternatively use PHP's built-in server
```
cd ict-expenses-management
php artisan serve
```
And all your requests should be sent to [http://localhost:8000](http://localhost:8000)


## Usage 
### List expenses
Send **GET** request to **/api/expenses** endpoint

### Create expenses
Send **POST** request to **/api/expenses** endpoint with following json-payload
```json
{
    "user": 1,
    "reason" : "Your expense reason",
    "value": "Your expense value",
    "date": "YYYY-MM-DD"
}
```

If your expense is created, you'll receive something like 
```json
{
    "success": true,
    "status": 200,
    "data": {
        "user": 1,
        "reason": "Fri",
        "value": 2384,
        "date": "2021-08-19",
        "updated_at": "2021-08-19T11:44:27.000000Z",
        "created_at": "2021-08-19T11:44:27.000000Z",
        "expense_id": 8
    }
}
```

In case of any validation error, you'll receive response similar to below
```json
{
    "success": false,
    "status": 500,
    "data": {
        "reason": [
            "The reason must be at least 3 characters."
        ]
    }
}
```
