# katalyst

KKday Translation System

## Setup

### Prerequisites

  - PHP >= 7.1.3
  - Laravel >= 5.8
  - Redis >= 4.0.1
  - PostgreSQL >= 11.3 
  - npm >= 6.7.0

### Installations

    $ git clone git@github.com:kkday-it/katalyst.git
    # clone codebase

    $ php composer.phar install
    # install composer packages

### PostgreSQL

    $ brew install postgresql
    # install postgresql

    $ brew services start postgresql
    # start postgresql

    $ createuser developer
    # create an user for postgresql

    $ createdb translationdb
    # create database

    $ psql -h localhost translationdb -U developer
    # connect to localhost translationdb using developer

    $ translationdb=> grant all privileges on database translationdb to developer;
    # grant privileges for user

### Redis

    $ brew install redis
    # install redis

    $ redis-server
    # start redis server

### Post-Installation

    $ cp .env.example .env
    # create your own local .env

    $ php artisan key:generate
    # generate application key
    
    $ php artisan migrate
    # generate table schema for develop

    $ php artisan db:seed
    # generate database seed data for develop

### Start Service

    $ php artisan serve
    # Laravel development server started: <http://127.0.0.1:8000>

## Frontend Setup

base on ant-design-vue

### Project setup

    $ cd frontend
    # change directory to frontend folder

    $ npm install

### Compiles and hot-reloads for development

    $ cp .env.example .env
    # create your .env if neccessary

    $ npm run serve

### Compiles and minifies for production

    $ npm run build

### Lints and fixes files

    $ npm run lint

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

## API Document

### Swagger UI

Displays API documents according to swagger.yaml, refernce [Swagger UI Github](https://github.com/swagger-api/swagger-ui/blob/master/docs/usage/installation.md) for running Swagger UI in your local machine.

    $ docker pull swaggerapi/swagger-ui
    # pulls the swagger-ui docker image

    $ cd $PROJECT_PATH;
    # go to project path

    $ docker run -p 8888:8080 -e SWAGGER_JSON=/documents/swagger.yaml -v $PWD/documents:/documents swaggerapi/swagger-ui

    $ visit http://127.0.0.1:8888/
    
