## source ##

https://symfony.com/doc/current/best_practices.html

## parameters ##
* /config/services.yaml + .env
* subdir for all parameters in /config/parameters/*.yaml

## naming file ##
* yaml : name.yaml or name_xxx.yaml
* twig : name.html.twig or name_xxx.html.twig

## naming folder ##
* only insde src : Kerner or EventSubscriber (PascalCase)
* everywhere : minus

## naming constant vars ##
* in env file : VARIABLE=xxx
* in php const : public const VARIABLE = xxx


## services ##

* Make services private:
 to prevent you from accessing those services via $container->get(). Instead, you will need to use proper dependency injection.