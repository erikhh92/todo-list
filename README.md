<p align="center"><a href="#"><img src="https://img.freepik.com/free-vector/doodle-list-icon-logo-hand-drawn-with-thin-black-line-isolated-white-background-vector-illustration_92242-931.jpg" width="400"></a></p>


## Installation steps

To run this Laravel + Vue app we need some requirements:

- Recommended to run in Linux distribution (Ubuntu 20.04 in my case)
- Web browser (Chrome recommended)
- Docker & Docker compose engine

## Where is the code and how can i download it?

You can download the code from this repository using the next command:
`git clone https://github.com/erikhh92/todo-list.git`


## How to run this app

It's very simple, the steps to lifting up the app are the next:

- Enter on the folder downloaded previously: `cd todo-list`
- Open the laradock folder: `cd laradock`
- Start the required containers: `docker-compose up -d apache2 mysql`
- Enter to the 'workspace' container: `docker-compose exec --user=laradock workspace bash`
- Install composer dependencies: `composer install`
- Run the migrations to make the database tables: `php artisan migrate`
- !OPTIONAL: If you want some TODO tasks per default, you can run the seeders: `php artisan db:seed`
- Access to the project through [this link](http://localhost)


### Things to improve

Thinks to improve:
- Validation
- Websockets to update the TO-DO lists
- Transitions when opening and adding items
- Order items manually
- Pin items to the top
- TO-DO items belonging to user
- Allow to share items with other users
- Integration of a bookmark or better options in the items like: checklists, formatted text, etc..
