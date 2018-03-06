# Contact Form

Exercice technique / fonctionnel utilisé par ACSEO pour ses recrutements.


## Contexte

Vous êtes développeur chez ACSEO. Vous recevez une demande de la part d'un client pour la mise en place d'une nouvelle fonctionnalité sur son site Internet.


> Nous souhaiterions mettre en place un formulaire de contact sur notre site.
> Le formulaire de contact doit être simple : il doit nous permettre de connaitre les coordonnées de l'internaute, et sa question.
> Il nous faut au moins son nom, son email, et sa question pour que nous traitions sa demande.

> Il nous faudrait aussi un petit back-office avec accès sécurisé pour permettre au webmaster de consulter la liste des demandes, et de pouvoir cocher les messages que nous avons traité

Le projet initial étant basé sur Symfony 3, il vous est demandé de mettre en place la solution sur la base de ce Framework.

## Information
Le projet a été réalisé en Symfony 4

## TODO list
- ajouter des tests unitaires
- utiliser des traductions
- évolutions / nouvelles fonctionnalités possibles:
    * authentification via token (utilisation de Guard)
    * permettre tri du tableau des demandes sur les différents champs disponibles 
    * internationalisation (ajouter la locale dans les urls...)
    * ...