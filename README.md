gite29
======

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

### #4 Start Symfony server
```
php bin/console server:start
```

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