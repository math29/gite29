gite29
======

The house vacations rental in britany !

[![Build Status](https://travis-ci.org/math29/gite29.svg?branch=master)](https://travis-ci.org/math29/gite29)

## Documentation & Getting Started

### #1 Clone the project

### #2 Download composer dependencies
- install composer : https://getcomposer.org/download/
- Make a composer install at the root of the project

### #3 Configure Symfony
- copy app/config/parameters.yml.dist to app/config/parameters.yml
- The parameters in function of your local environment

### #4 Update DB
```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

### #5 Start Symfony server
```
php bin/console server:start
```

### #BONUS
To be able to manipulate images in the web folder, you need to configure a vhost
