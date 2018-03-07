# Contact Form

## Informations
Le projet a été réalisé en Symfony 4
- Création d'un formulaire de contact avec ReCaptcha (+protection crsf activée)
- Envoi de mail lors de la soumission du formulaire
- Page d'authentification au BO avec une gestion de droits ADMIN et USER (le ROLE_USER a accès au BO mais pas à la liste des demandes, le ROLE_ADMIN peut visualiser et passer en traité les demandes)
- Page listant les demandes de contact : tableau paginé (accès ROLE_ADMIN)
- Possiblité de passer en traité ou non les demandes (appel Ajax) (accès ROLE_ADMIN)

## Technique
- utilisation de Webpack
- jQuery pour le BO
- Bootstrap pour rendre les formulaires responsives
- MySQL pour persistence
- Doctrine pour ORM
- ReCaptcha


## TODO list
- ajouter des tests unitaires
- ajouter des vérifications sur les types de variables (notamment dans les getters et setters)
- utiliser des traductions
- rédiger une documentation
- évolutions / nouvelles fonctionnalités possibles:
    * authentification via token (utilisation de Guard)
    * fonctionnalité "Se souvenir de moi" sur la page d'authentification
    * permettre tri du tableau des demandes du BO sur les différents champs disponibles 
    * ajout d'un filtre sur le statut traité ou non et un filtre sur la date pour filtrer les demandes dans la BO
    * ajouter une icône de chargement lors du passage d'une demande en traité dans le BO
    * export CSV, Excel des demandes dans le BO
    * créer un role qui ait accès au BO, puisse visualiser les demandes, mais pas les passer en traité - ajout d'une hiérarchie dans les roles
    * internationalisation (ajouter la locale dans les urls...)
    * personnaliser les pages d'erreur 
    * utiliser un template de mail pour la demande de contact
    * faire une redirection après la soumission du formulaire de contact
    * ...
