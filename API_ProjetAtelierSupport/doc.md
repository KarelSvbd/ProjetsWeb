#Documentation API_ProjetAtelierSupport

##Requêtes GET
##Intéraction avec la table personne
####Récupérer l'intégralité des personnes
[/API_ProjetAtelierSupport/?personnes=all]
#####Récupérer des personnes par leur nom
[/API_ProjetAtelierSupport?nomPersonne=Donnee&personnes=all]
#####Récupérer des personnes par leur prenom
[/API_ProjetAtelierSupport?prenomPersonne=Donnee&personnes=all]
#####Récupérer des personnes par leur date de naissance
[/API_ProjetAtelierSupport?dateNaissance=Donnee&personnes=all]
#####Récupérer des personnes par leur id de grade
[/API_ProjetAtelierSupport?idGrade=Donnee&personnes=all]
##
#####Récupérer tous les noms
[/API_ProjetAtelierSupport?personnes=noms]
#####Récupérer tous les prénoms
[/API_ProjetAtelierSupport?personnes=prenoms]
#####Récupérer toutes les naissances
[/API_ProjetAtelierSupport?personnes=naissances]
#
##Intéraction avec la table grade
#####Récupérer tous les grades
[/API_ProjetAtelierSupport?grades=all]

##Intéraction avec la table typeObjet
#####Récupérer tous les types d'objets
[/API_ProjetAtelierSupport?typeObjet=all]

##Intéraction avec la table emprunt
#####Récupérer tous les emprunts
[/API_ProjetAtelierSupport?emprunt=all]

##Intéraction avec la table modele
#####Récupérer tous les modeles
[/API_ProjetAtelierSupport?modele=all]