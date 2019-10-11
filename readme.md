# Why #
This project is just a sample to plan convention naming and code for PHP symfony 4 project built with docker.

# Config and params #

## Parameters ##
* /config/services.yaml + .env file
* subdir for all parameters in /config/parameters/*.yaml
* variable naming: my_var (snake_case)

## Naming yaml file ##
Use Snake Case
* yaml : name.yaml or name_xxx.yaml

## Naming folder ##
* only inside src : Kerner or EventSubscriber (PascalCase)
* everywhere : snake_case

# Code in PHP #

## Naming constant vars ##
* in env file : VARIABLE=xxx
* in php const : public const VARIABLE = xxx

## Naming PHP classes ##
* PascalCase

## Controllers ##
* Thin controller using services
* Inject service in constructor
* Use annotation for routing and limit by environment 
 ```
(condition="'dev' === '%kernel.environment%'")
 ```
* Don't Use Annotations to Configure the Controller Template

The @Template annotation is useful, but also involves some magic. Moreover, most of the time @Template is used without any parameters, which makes it more difficult to know which template is being rendered. It also hides the fact that a controller should always return a Response object.

## Services ##
* Make services private:
 to prevent you from accessing those services via $container->get(). Instead, you will need to use proper dependency injection.

## Repository ##
Separate database query (ORM/ODM) in this service.
* Naming : MyArticleRepository

## Form ##
All form separate in EntityType, example:
* MyArticleType

## Command ##
Command name in bin/console always in minus and prefix, that organize the command list to easily research, example:
 ```
php bin/console app:create-my-article
 ```

## API controllers ##
Separate Controller in folder, example /src/Controller/API.

Use FosRest and Route/SWG annotation with right HTTP Methods:
* GET (get ressources with 200 reponse)
* POST (create a new ressource with 201 response)
* PUT (update entire resource with 200/204 response)
* PATCH (update partial resource with 200/204 response)
* DELETE (delete resource with 200/204 response: no content)

# Twig #

## Naming ##
Use Snake Case for Template Names and Variables
* twig : name.html.twig or name_xxx.html.twig

Prefix Template Fragments with an Underscore
* twig : _bloc.html.twig or _bloc_xxx.html.twig


# Database management with doctrine #
 
## Update database and migration ##
 ```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
  ```
 
## Load fixture ##
```
php bin/console doctrine:fixtures:load --append
```  
 
## Danger zone
If need to clean all tables in database
```
php bin/console doctrine:schema:drop --full-database --force
```

# Resources #

## SF4 best practice ##
https://symfony.com/doc/current/best_practices.html