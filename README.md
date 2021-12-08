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

The CSV is located on database/data/employee_data.csv, give read permissions to the file if necesary, then run the migration command:
```
sail artisan migrate:fresh --seed
```

6. API tests

Import the postman collection and enviroment for the API test.

- The collection: documents/postman/backend_case.postman_collection
- The enviroment: documentos/postman/backend_case-local.postman_environment.json

Define the correct url-api-v1 for the enviroment and select the enviroment on postman.

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
- The standar role is defined, it can see al the views but cannot execute all of the actions
- Add policies and restriccions to the blade views of the basic application
- The API is functional but it also can benefit from policies

