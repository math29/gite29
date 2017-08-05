gite29
======

[![Build Status](https://travis-ci.org/math29/gite29.svg?branch=master)](https://travis-ci.org/math29/gite29)

The house vacations rental in britany !

---

## Setting up the project in local

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

---

##Releases
###Release 0.0.1
- Setting up the project
- Create CommonEntityBundle
- Create FrontBundle
- Add the first templates from library

###Release 0.0.2
- Add gite creation page
- Add Gite object
- Add FOSUserBundle

###Release 0.0.3
- Add user fixtures
- Customize FosUserBundle templates and forms

###Release 0.0.4
- Add search gite module
- Update gite creation page

###Release 0.0.5
- Update gite creation page
- Update gite search page

###Release 0.0.6
- Update gite creation page to be a creation flow with craue/formflow-bundle
- Update creation flow to use egeloen/google-map-bundle with autocomplete and geocoder functionalities
- Update gite entity and gite form parameters