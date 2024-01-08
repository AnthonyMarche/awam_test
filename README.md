# AWAM TEST

## Presentation du test

Pour réaliser ce test j'ai tout d'abord établi la manière dont j'allais procéder : stockage des taux de change, des devises, des calculs pour l'email et l'implémentations des méthodes.

J'ai créé 3 tables pour stocker les devises, les taux de changes et les calculs effectués.
Après chaque calcul le calcul est stocké puis récupéré pour chaque journée et envoyé par mail avec une commande. Il reste cependant à planifier la tache cron qui se chargera de l'exécuter. Ce mail est envoyé via SMTP qui fut la méthode la plus rapide au vu de mon installation PHP.

Les deux devises indiquées ainsi que leur taux de change (fixe) sont inscrites en base via les seeders.
Lors de l'entrée des données par l'utilisateur celles-ci sont envoyé à un service qui se charge par la suite, via deux autres méthodes de convertir les montants indiqués dans la devise souhaité puis de faire le calcul approprié.
Si les opérations se sont bien déroulées j'entre donc ce calcul et son résultat en base sous forme de texte, sinon une erreur est renvoyée.

Ce test a été réalisé en environ 2h30.

## Evolution du test

Avec plus de temps il est possible de continuer cette fonctionnalité de différentes manières selon le besoin client :

### Utilisation indicative avec peu de devises
Selon ce besoin il serait envisageable de réaliser les crud des devises et des taux de change.
Cela implique donc de rentrer manuellement les différentes devises souhaitées ainsi que leur taux de change envers les autres devises déjà en base.
Cela limite le nombre de devise car entrer chaque devises et chaque taux de change parait assez chronophage.
De plus le résultat attendu est forcément approximatif au vu du changement permanant des taux de change entre chaque devise.

### Utilisation modérée et précise avec de nombreuses devises
Ce besoin nécessiterait le développement du crud pour les devises uniquement et les taux de change seraient requêtés sur une api proposant ce service, permettant ainsi la suppression de la table stockant précédemment les taux de change de manière fixe.
Cela permet d'entrer en base les devises souhaitées et de récupérer un taux précis et actuel des taux de changes entre les devises. La table permettant de stocker les taux de change en brut peut donc être supprimer.
Cependant ce service peut se limiter à un certain nombre de requête (gratuitement) selon les api.  
Evolution plutôt rapide que j'ai développé sur la branche `feature_v2` de ce projet en dehors du temps imparti pour le test.

### Utilisation intensive et précise avec de nombreuses devises
Ce besoin nécessiterait le développement d'une api récupérant pour chaque devise leur taux de change auprès de différents acteurs de ce sujet.
Evolution plus pérenne mais je ne sais pas si cette solution est viable, que ce soit en terme de temps de développement ou de coût des données.

Enfin concernant l'historique des calculs effectués il serait envisageable de stocker non pas le texte représentant le calcul mais chaque élément le composant afin de réaliser des statistiques sur les devises utilisées par exemple.  
Si ce besoin n'est pas nécessaire il pourrait être envisager, suite à l'envois de l'email récapitulatif, de supprimer les calculs de la base de données.

## Getting Started

### Install

1. Clone this project.
2. Run `composer install`.
3. Run `npm install`.

### Environment variables

In your .env file indicate the environment variables in particular:

* DATABASE CREDENTIALS
* MAIL CREDENTIALS

### Database

1. Run `php artisan migrate`
2. Run `php artisan db:seed`

## Launch the application

* Run `npm run build`
* Run `php artisan serve`
