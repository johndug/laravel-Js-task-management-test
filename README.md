# John Tavener Rawson Demo

## Installation

git clone git@github.com:johndug/laravel-Js-task-management-test.git
cd /laravel-Js-task-management-test.git
composer install
php artisan migrate
php artisan db:seed
php artisan serve and navigate to your browser to see the demo
and make sure that your environment php / mysql is active

## Instructions

The seeded login is test@emaple.com password is password
I created the login through Laravel breeze. Don't want to re-invest the wheel. I separated the TaskController store and update from the storeApi and updateApi.

Here are the api endpoints
POST /api/register
{
"name": "TEst test",
"email": "test@example.com",
"password": "password"
}
POST /api/login
{
"name": "test@example.com",
"password": "password"
}
POST /api/logout

GET /api/tasks

POST /api/tasks // store
{
"title": "Test 2",
"description": "test test test",
"due_date": "2023-09-28"
}

GET /api/tasks/{id} // show

PATCH /api/tasks/{id} // update
{
"title": "Test 2",
"description": "test test test",
"due_date": "2023-09-28",
"completed": true
}

DELETE /api/tasks/{id} // delete

I have done pest tests on the tasks and user api endpoints
