# Facades

Pour faciliter l’utilisation de l’application, des Facades laravel ont été ajoutées.
		
##Utils

Classe : `Utils`

Namespace : `App\Classes`

La facade Utils donne accès aux fonctions utiles de l’application :
			
###formatURI
signature : `string formatURI(string URI)`

Renvoie le string “URI” formatté pour pouvoir passer en tant que paramètre dans les requêtes 

###GETunformatURI
signature : `string unformatURI(string URI)`

Renvoie le string “URI” deformatté pour pouvoir le renvoyer au web service. 

###cast
signature : `stdObject cast(Object instance, String classname)`

Renvoie l’Object “instance” casté dans la classe “classname”. 

Si le string “classname” fini par “[]”, un tableau sera envoyé avec les instances qu’il contient castées dans la classe demandée.
		
##Comments

Classe : `Comments`

Namespace : `App\Classes`

La facade Comments donne accès aux fonctions du web service en relation avec les commentaires. 
			
###AddComment

signature : `Comment AddComment(Comment c, Entity e)`

Appelle la fonction “AddComment” du web service pour ajouter un commentaire.
L’objet Comment `c` est le commentaire que l’on veut ajouter. Ses attributs `email`, `authorName` et `comment` doivent être renseignés.
L’objet Entity `e` est l’entité que l’on veut commenter. Son attribut `URI` doit être renseigné.
La fonction renvoie le commentaire inséré dans la base donnée sémantique locale avec tous ses attributs renseignés.
			
###GrantComment

signature : `Boolean GrantComment(Comment c)`

Appelle la fonction `GrantComment` du web service pour valider un commentaire afin qu’il soit affiché au public du site web.
L’objet Comment `c` est le commentaire que l’on veut valider. Son attribut `id` doit être renseigné.
La fonction renvoie un booléen “Vrai” si la validation s’est bien déroulée.


###DenyComment

signature : `Boolean DenyComment(Comment c)`

Appelle la fonction `DenyComment` du web service pour refuser un commentaire afin qu’il ne soit plus affiché au public mais pas supprimé.
L’objet Comment `c` est le commentaire que l’on veut refuser. Son attribut `id` doit être renseigné.
La fonction renvoie un booléen “Vrai” si le refus s’est bien déroulé.


###RemoveComment

signature : `Boolean RemoveComment(Comment c)`

Appelle la fonction `RemoveComment` du web service pour supprimer un commentaire de la base de données sémantique locale.
L’objet Comment `c` est le commentaire que l’on veut supprimer. Son attribut `id` doit être renseigné.
L’objet Entity `e` est l’entité que l’on veut supprimer. Son attribut `URI` doit être renseigné.
La fonction renvoie un booléen “Vrai” si la suppression s’est bien déroulée.

			
###LoadComment

signature : `Comment[] LoadComment(Entity e)`

Appelle la fonction `LoadComment` du web service pour charger tous les commentaires sur une entité.
L’objet Entity `e` est l’entité dont on veut récupérer les commentaires. Son attribut `URI` doit être renseigné.
La fonction renvoie un tableau d’objet Comment.
Si l’objet Entity `e` est `null`,  la fonction renvoie tous les commentaires de la base de données sémantiques locales.

		
##Semantics

Classe : `Semantics`

Namespace : `App\Classes`

La facade Semantics donne accès aux fonctions du web service en relation avec le modèle AXIS_CSRM. 

###AddEntity

Signature : `Entity AddEntity(Entity e)`

Appelle la fonction `AddEntity` du web service pour ajouter une entité dans la base de données sémantique.
L’objet Entity passé en paramètre doit avoir l’attribut `URI` vide.
L’objet Entity renvoyé a l’attribut `URI` renseigné.

###RemoveEntity

Signature : `Boolean RemoveEntity(Entity e)`

Appelle la fonction `RemoveEntity` du web service pour supprimer une entité de la base de données sémantique.
L’objet Entity passé en paramètre doit avoir l’attribut `URI` renseigné.
La fonction renvoie un booléen “Vrai” si la suppression s’est bien passée.


###SetEntityProperty

Signature : `Boolean SetEntityProperty(Entity e, Property p, Entity valueEntity)`

Appelle la fonction `SetEntityProperty` du web service pour modifier une propriété d’une entité.
L’objet Entity `e` est l’entité dont on veut modifier la propriété. Son attribut `URI` doit être renseigné.
L’objet Property `p` est la propriété que l’on veut modifier. Ses attribut `URI` et `type` doivent être renseignés.
Si l’attribut `type` est `URI`, l’objet Entity `valueEntity` doit être fourni avec son attribut `URI` renseigné. Sinon, l’objet Property `p` doit avoir son attribut `value` renseigné et l’objet Entity `valueEntity` peut être `null`.
La fonction renvoie un booléen “Vrai” si la modification de la propriété s’est bien passée.

###RemoveEntityProperty

Signature : `Boolean RemoveEntityProperty(Entity e, Property p, Entity valueEntity)`

Appelle la fonction `RemoveEntityProperty` du web service pour supprimer une propriété d’une entité.
L’objet Entity `e` est l’entité dont on veut supprimer la propriété. Son attribut `URI` doit être renseigné.
L’objet Property `p` est la propriété que l’on veut supprimer. Ses attribut `URI` et `type` doivent être renseignés.
Si l’attribut `type` est `URI`, l’objet Entity `valueEntity` doit être fourni avec son attribut `URI` renseigné. Sinon, l’objet Property `p` doit avoir son attribut `value` renseigné et l’objet Entity `valueEntity` peut être `null`.
La fonction renvoie un booléen “Vrai” si la suppresion s’est bien passée.

###LoadEntityProperties

Signature : `Array(Property) LoadEntityProperties(Entity e)`

Appelle la fonction `LoadEntityProperties` du web service pour charger les propriétés remplies d’une entité.
L’objet Entity `e` est l’entité dont on veut charger les propriétés. Son attribut `URI` doit être renseigné.
La fonction renvoie un tableau d’objet Property.

###SearchOurEntitesFromText

Signature : `Array(Entity) SearchOurEntitiesFromText(String needle)`

Appelle la fonction `SearchOurEntitiesFromText` du web service pour chercher les entités présentes dans notre base de données sémantiques dont le nom correspond au texte passé en paramètre.
Le String `needle` représente le texte recherché dans le nom des entités.
La fonction renvoie un tableau d’objet Entity qui correspondent à la recherche.

###SearchAllEntitiesFromText

Signature : `Array(Entity) SearchAllEntitiesFromText(String needle)`

Appelle la fonction `SearchAllEntitiesFromText` du web service pour chercher les entités présentes dans le Linked Open Data dont le nom correspond au texte passé en paramètre.
Le String `needle` représente le texte recherché dans le nom des entités.
La fonction renvoie un tableau d’objet Entity qui correspondent à la recherche.

###GetAllEntities

Signature : `Array(Entity) GetAllEntities()`	

Appelle la fonction `GetAllEntities` du web service pour charger toutes les entités présentes dans notre base de données.
La fonction renvoie un tableau d’objet Entity qui sont présentes dans notre base de données sémantique locale.

###GetAllPropertiesAdmin

Signature : `Array(PropertyAdmin) GetAllPropertiesAdmin(Entity e)`

Appelle la fonction `GetAllPropertiesAdmin` du web service pour charger toutes les propriétés possible d’une entité pour l’administration de celles-ci.
L’objet Entity `e` est l’entité dont on veut charger les propriétés. Son attribut `URI` doit être renseigné.
La fonction renvoie un tableau d’objet PropertyAdmin.


###GetEntity

Signature : `Entity GetEntity(Entity e)`  

Appelle la fonction `GetEntity` du web service pour récupérer une entité.
L’objet Entity `e` est l’entité que l’on veut récupérer. Son attribut `URI` doit être renseigné.
La fonction renvoie un objet Entity correspondant à l’attribut `URI` donnée en paramètre et dont tous les attributs sont renseignés.
		
##Logs

Classe : `Logs`

Namespace : `App\Classes`

La facade Logs donne accès aux fonctions qui logguent les activités des utilisateurs authentifiés.
add
	
signature : `void add( String action, String message, User user)`

Cette fonction permet d’ajouter un log d’activité dans la base de données du site web. 
La variable `action` spécifie l’action fait par l’utilisateur
La variable `message` est le message de l’action fait par l’utilisateur
La variable `user` spécifie l’utilisateur qui a fait l’action. Si elle est `null`, l’action n’est liée à personne.
debug 

signature : `void debug(String type, String message, User user)`

Cette fonction permet d’ajouter un log d’activité dans la base de données du site web uniquement si l’application est en mode `debug`. 
La variable `type` spécifie le type de debug
La variable `message` est le message de debug
La variable `user` spécifie l’utilisateur qui a provoqué le log de debug. Si elle est `null`, l’action n’est liée à personne.
