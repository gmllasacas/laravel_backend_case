# Core Requirements

1. Create a database migration to import the provided employee_data.csv file
2. Create a database seeder which reads and parses the CSV file to populate the database
3. Define some form of user management with roles: standard & admins
4. Create a page that displays all of the employee data
5. Create a page that lists the employees in a table
6. Create an authorized view (or set of views) for admins only to perform CRUD operations to manipulate the employee data in the database.
7. Create a menu system to help users navigate around the application

# Requirements

- [docker](https://www.docker.com/products/docker-desktop)
- [git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

# Installation

1. Clone the repository
```
git clone https://github.com/gmllasacas/laravel_backend_case.git
```

2. Generate vendor files
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs

```

3. Setup environment

Change directory to the root of the cloned project, then run the command:
```
./vendor/bin/sail up
```
For future commands, add the bash alias with:
```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

4. Run the feature tests
```
sail artisan test
```

5. Run the migration and import the data from the CSV

The CSV is located on database/data/employee_data.csv, give read permissions to the file if necessary, then run the migration command:
```
sail artisan migrate:fresh --seed
```

6. API tests

Import the postman collection and environment for the API test.

- The collection: documents/postman/backend_case.postman_collection
- The environment: documents/postman/backend_case-local.postman_environment.json

Define the correct url-api-v1 for the environment and select the environment on postman.

7. Application tests

Go to http://localhost/ and login with the admin credentials:

- email: admin@email.com
- password: base_app

8. Done

- The employee seeder parse and validate the CSV file
- Laravel Sanctum is used for authentication
- There are 2 roles with defined abilities
- A page that displays all the employee data: http://localhost/employees
- A page that list the employees with CRUD actions:  http://localhost/employees/filtered
- A basic menu for navigation

9. TODO
- Add frontend validations to the forms
- The standard role is defined, it can see all the views but cannot execute all of the actions
- Add policies and restrictions to the blade views of the basic application
- The API is functional but it also can benefit from policies
