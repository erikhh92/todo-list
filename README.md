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

- Enter on the folder downloaded previously and prepare the docker container: `cd todo-list`
- Open the laradock folder: `cd laradock`
- Start the required containers: `docker-compose up -d apache2 mysql`
- Enter to the 'workspace' container: `docker-compose exec --user=laradock workspace bash`
- Install composer dependencies: `composer install`
- Generate the project key: `php artisan key:generate`
- Run the migrations to make the database tables: `php artisan migrate`
- !OPTIONAL: If we want some TODO tasks per default, you can run the seeders: `php artisan db:seed`
- Access to the project through [this link](http://localhost)


### Things to think about

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
