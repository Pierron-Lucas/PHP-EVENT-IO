Projet V8.1.0 ![](Aspose.Words.497f2ed6-ebe7-4025-af9b-a1d0864799b9.001.png)

![](Aspose.Words.497f2ed6-ebe7-4025-af9b-a1d0864799b9.002.png)

Cette œuvre est mise à disposition selon les termes de la[ licence Creative Commons Attribution – Pas d'Utilisation Commerciale – Partage à l'Identique 3.0 non transposé.](http://creativecommons.org/licenses/by-nc-sa/3.0/) 

Document en ligne :[ www.mickael-martin-nevot.com ](http://www.mickael-martin-nevot.com/)**\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_** 

Date de rendu : **18 janvier 2022** Travail : **groupe de six** 

**1  Assistance** 

Vous pouvez contacter l’enseignant en cas de besoin en formalisant et en ciblant précisément votre demande. Pour ce faire, vous devez respecter les règles de communication et d’envoi (ci-dessous). 

**2  Communication et envoi** 

1. **Généralités** 

En joignant vos coordonnées (*e-mail* et téléphone portable notamment) à un message ou à votre livraison, vous pourrez être joint en cas de problème. 

2. **Communication** 

Chaque communication devra être faite : 

- à destination de votre enseignant responsable : 
- Mickaël MartinNevot :[ mmartin.nevot@gmail.com ; ](mailto:mmartin.nevot@gmail.com) 
- Olivier Gérard :[ oliv.gerard@gmail.com ;  ](mailto:oliv.gerard@gmail.com)
- David Eng :[ engdavid13@gmail.com. ](mailto:engdavid13@gmail.com) 
- en faisant figurer [AMU][IUT][S3] en début de sujet. 
3. **Livraison** 

Votre livrable devra être : 

- nommé de la manière suivante (Nom1, Nom2, Nom3, Nom4, Nom5, Nom6 étant vos noms, par ordre lexicographique de vos noms de famille, et Prénom1, Prénom2, Prénom3, Prénom4, Prénom5, Prénom6 vos prénoms) : Nom1 Prénom1  –  Nom2 Prénom2  –  Nom3 Prénom3  – Nom4 Prénom4 – Nom5 Prénom5 – Nom6 Prénom6 ; 
- compressé dans une seule archive au format** ZIP **n’excédant pas 10 Mo** ; 
- remis, avant la date de rendu, sur AMeTICE [(http://ametice.univ-amu.fr), à la s](http://ametice.univ-amu.fr/)ection rendu du cours correspondant. 

**\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_** *Programmation Web côté serveur* 

David Eng – Mickaël Martin-Nevot 

Relecteurs : Philippe Mondou, Axel Prat 1/6 

*Projet – V8.1.0*  ![](Aspose.Words.497f2ed6-ebe7-4025-af9b-a1d0864799b9.003.png)![](Aspose.Words.497f2ed6-ebe7-4025-af9b-a1d0864799b9.004.png)

**3  Présentation orale** 

Vous effectuerez une présentation orale respectant les consignes suivantes : 

- une durée maximale de **40 minutes** devant un jury ; 
- à la **date de présentation** (selon l’ordre de passage que vous sera communiqué par votre enseignant responsable) ; 
- sur la réalisation de votre **projet** à laquelle des questions de cours viendront s’ajouter. 

**4  Disponibilité** 

Votre site Web doit rester disponible jusqu’à la fin de votre année universitaire de formation. En outre, l’ensemble  des  identifiants  de  connexion  du site Web et de la base de données doivent également rester valides durant toute cette période. 

**5  Sujet** 

1. **Mise en situation** 

L’entité « E-Event.IO ! » propose son soutien dans l’organisation d’événements, notamment pour les étudiants d’Aix-Marseille Université. 

Toutefois, cette entité ne soutiendrait qu’un nombre limité d’idées d’événements à la fois selon une période définie (reproduisible plusieurs fois si possible dans le temps). 

Cette période définie constitue en fait une **campagne d’idéation d’événements**, où des étudiants **organisateurs** proposent des **idées d’événements**. Une seule et unique **idée d’événement** peut être proposée par **organisateur** pendant cette période définie. 

La  **campagne**  est  animée  par  des  présentations  de  ces  **idées  d’événements**  et  les  étudiants **donateurs** dépensent des **points** dans des **idées d’événements**.  

Chaque **donateur** se voit attribuer, au début, une enveloppe de **points**, à dépenser, et qui ne se réalimente pas en pleine **campagne**. Une fois les **points** dépensés, c’est définitif, donc pas de possibilité de les réattribuer sur une autre idée ! 

Le contenu d’une **idée d’événement** devrait évoluer en fonction des **points** qui sont donnés pour l’idée.  Il  faut  donc  imaginer  des  **contenus  déblocables  supplémentaires**  (à  spécifier  par l’organisateur de l’idée). 

Exemple de contenu de base d’une idée d’événement : 

- Tournoi *challenge coding* sur une journée : 
- groupe de 2 personnes minimum ; 
- le gagnant remporte un prix. 

Exemple de contenus déblocables supplémentaires avec des points : 

- 100 points, une activité spécifique en plus dans l’événement ; 
- 500 points, l’événement se fera sur deux jours au lieu d’un seul jour. 

Quand la **campagne d’idéation d’événements** se termine, un **membre du jury** choisit au max N **idées d’événements** à mettre en œuvre. Les idées ayant reçus le plus de **points** seront mis en avant, mais cela ne doit pas bloquer la possibilité de choisir des idées moins populaires (tout est une question  de  jugement  sur  la  faisabilité  de  l’idée  finalement  !).  Les  points  seront  convertis  par l’entité « E-Event.IO » en « moyens » de soutien des idées d’événements. 

2. **Solution Web à développer** 

Il faudra développer une **application Web de gestion d’idéations d’événements**.  

Une campagne d’idéation d'événements commence à une date X et finit à une date Y. Pendant la campagne,  des  idées  d’événements  sont  soumises  par  des  organisateurs  à  travers  l’application. Pendant la campagne également, des donateurs dépensent leurs points dans les idées d’événements qui les intéressent. À la fin d’une campagne, un jury choisit des idées d’événements à organiser en fonction des points que chaque idée a reçu. 

Fonctionnalités/règles métiers : 

- L’application dispose d’un formulaire de connexion par *login* / mot de passe pour qu’un utilisateur puisse récupérer son rôle et effectuer des actions qui sont spécifiques à son rôle. 
- Le *login* / mot de passe est défini arbitrairement par un administrateur dans un premier temps.  
- Un administrateur gère la liste des utilisateurs, notamment en leurs attribuant des rôles. Il génère également des mots de passe de manière aléatoire pour que les utilisateurs puissent se connecter (le moyen de communiquer les *logins* / mots de passe se fera par *e-mail*, en dehors de l’outil). 
- Un administrateur commence par définir une campagne (nom de la campagne, date début, date fin, points attribués en début aux donateurs, etc.). 
- Un organisateur, porteur d’une idée d’événement, décrit le contenu de son idée pendant la campagne. Le contenu de l’idée est modifiable. L’idée d’événement a un coût minimum de points pour être considérée (sinon elle n’apparaitra pas dans la liste des choix du jury, en fin de campagne), puis peut être complétée par du contenus déblocables supplémentaires avec des points (fonctionnement par pallier de points). L’organisateur est libre d’ajouter au fur et à mesure des contenus déblocables supplémentaires, mais ne peut pas les supprimer par la suite. 
- Un  donateur  dépense  ses  points  sur  les  idées  d’événements.  La  dépense  de  points  est définitive ! Le capital de points est attribué en début de campagne. Le capital de points disparait en fin de campagne. 
- À la fin d’une campagne, le jury peut choisir N idées d’événements à mettre en œuvre. Les idées  ayant  reçu  le  plus  de  points  sont  mises  plus  en  évidences  mais  cela  ne  doit  pas empêcher la lecture des idées moins populaires. Les idées choisies par le jury sont mises en avant sur le site comme étant les idées gagnantes de la campagne sur l’application. 
- Tout  utilisateur  non  authentifié  (rôle  public)  peut  tout  de  même  consulter  les  idées d’événements. 

Formulaire de connexion : 

- Un utilisateur non authentifié a un rôle public. 
- Un utilisateur peut accéder à des fonctionnalités réservées à des rôles spécifiques après s’être connecté via un formulaire de connexion (*login* / mot de passe). 

*Front office* : 

- Espace accessible par tous les utilisateurs (tous les rôles donc). 
- Une page d’accueil (page par défaut) contiendrait une liste des idées : 
- Chaque *item* de cette liste est un point d’entrée vers la page descriptive détaillée en lien avec l’idée. 
- Les pages descriptives des idées ne sont consultables que pendant une campagne d’idéation d’événements. 
- La fonctionnalité de dépense des points n’est possible que pour les donateurs. 
- Une page descriptive d’une idée affiche le contenu de l’idée, les points dépensés dans cette idée, et les contenus déblocables supplémentaires. 

*Back office* : 

- Espace *back office* pour les administrateurs : 
  - Gestion des utilisateurs. 
  - Gestion des campagnes d’idéation. 
- Espace *back office* pour les organisateurs : 
  - Cet espace est accessible une fois la campagne démarrée. 
  - Gestion des idées d’événements. 
- Espace *back-office* pour les membres du jury : 
  - Cet espace est accessible une fois la campagne terminée. 
  - Choix des idées d’événements à organiser / mettre en œuvre. 

Fonctionnalités/règles métiers bonus : 

- Un contenu d’idée d’événement peut être modifié jusqu’au moment où cette idée reçoit des points. Après quoi, seuls les contenus déblocables supplémentaires peuvent y être ajoutés. 
- Un donateur peut ajouter un commentaire au moment de dépenser ses points sur une idée d’événement. De ce  fait, l’espace de présentation d’une idée contiendra l’ensemble  des commentaires  postés  en  lien  avec  la  dépense  de  points  sur  cette  idée.  L’ajout  de commentaire est facultatif. 
- L’entité partenaire est garante des points, et donc met à disposition l’enveloppe total de points à travers un Web Service qui est interrogé par l’application lors de la définition d’une campagne (le comportement fonctionnel sera simulé à l’aide d’un *web service* fourni, à installer sur le même serveur qui héberge l’application Web). 
- Un utilisateur devra modifier son mot de passe à sa première connexion. 
- Un  utilisateur  peut  soumettre  une  demande  de  réinitialisation  de  mot  de  passe  sur l’application, et un administrateur se chargera de lui envoyer, par *e-mail*, un mot de passe aléatoire. Ensuite l’utilisateur devra redéfinir son mot de passe comme s’il s’agissait d’une 

première connexion. 

Rôles : 

- Administrateur : 
  - Définit une campagne 
  - Attribue les points à dépenser aux donateurs 
- Membre du jury : 
  - Délibère en fin de campagne 
- Attention ! Un membre du jury ne peut pas être organisateur ou donateur en même temps 
- Organisateur : 
  - Poste une idée pendant une campagne 
  - Attention ! Un organisateur ne peut pas être donateur en même temps 
- Donateur : 
  - Dépense des points sur les idées 
  - Attention ! Un donateur ne peut pas être organisateur en même temps 
- Public (par défaut) : 
  - Utilisateur non authentifié 

Termes métiers : 

- **Campagne d’idéation d’événements** : 
- Peut-être raccourci en « campagne ». 
- Période de temps, avec une date de début et une date de fin, pendant laquelle, des idées d’événements peuvent être proposées par des organisateurs. 
- **Organisateur** : 
  - Un utilisateur qui a le rôle organisateur et qui peut poster une idée d’événement 
- **Idée d’événement** : 
- Le projet d’événement porté par un organisateur. 
- Se présente avec une description, des illustrations et des contenus supplémentaires déblocables par des points 
- A un coût minimum de points pour être lancée / être prise en considération. 
- **Contenu supplémentaire déblocable** : 
- Complète le contenu de l’idée d’événement. 
- Un  organisateur  fixe  le  montant  de  points  à  dépenser  pour  que  le  contenu supplémentaire  soit  débloqué  (pris  en  compte  plus  tard  dans  l’organisation  de 

l’événement). 

- **Donateur** : 
  - Un utilisateur qui a le rôle donateur et qui peut dépenser des points dans des idées. 
- **Membre du jury** : 
- Un utilisateur qui a le rôle membre du jury et qui peut, à la fin d’une campagne, choisir N idées comme étant gagnantes (mises ensuite en avant sur l’application). Les idées gagnantes sont considérées comme à mettre en œuvre. 

**5.2.1  Bonne pratique professionnelle** 

Les impératifs suivants devront être respectés : 

- bonne indentation et commentarisation de l’ensemble des codes sources ; 
- bonne architecture des répertoires sources ; 
- site  Web  adaptatif  *(responsive)*  pouvant  être  notamment  utilisable  sur  ordinateur, *smartphone* et tablettes ; 
- validation W3C de toutes vos pages HTML (documents au minimum de type HTML5) ; 
- validation W3C de toutes vos pages CSS (documents au minimum de profil CSS niveau 3 avec  aucun  avertissement  et  en  tenant  compte  des  extensions  propriétaires  comme 

avertissement). 

**6  Conseils** 

Voici quelques conseils : 

- faites une recherche des solutions concurrentes ; 
- n'oubliez  pas  de  tester  le  site  Web  sur  différents  systèmes  d’exploitation  et  différents navigateurs  Web  (en  utilisant  des  versions  portables  ou  des  services  Web  comme [http://www.browsershots.org/) ; ](http://www.browsershots.org/)
- pour  les  redoublants  et  ceux  qui  sont  à  l'aise,  vous  pouvez  mettre  en  place  quelques fonctionnalités intéressantes supplémentaires. À faire **uniquement** après avoir terminé tous les points essentiels notés ci-dessus et après avoir optimisé et approfondi les fonctionnalités demandées;  
- pensez  à  utiliser  des  services  gratuits  de  stockage  de  ressources  en  ligne  (Youtube, ImageShack, Scribd, etc.) afin d’éviter d’encombrer inutilement la taille restreinte du projet (et, bien souvent, de gagner en performance) ; 
- réalisez  quelques  éléments  d’une  bibliothèque  (logicielle)  ou  même  un  *framework* minimaliste ; 
- utilisez des systèmes de gestion de version (Git : Bitbucket et[ https://try.github.com ; ](https://try.github.com/)etc.), des *frameworks* de test unitaire (PHPUnit, etc.) et d’intégration continue (Jenkins, TravisCI, etc.) ; 
- activez le SSH par défaut pour votre solution d’hébergement ; 
- utilisez les outils de développement de vos navigateurs Web. 

Voici quelques conseils sur la présentation orale : 

- testez toujours le matériel avant une présentation orale ; 
- habillez-vous d’une tenue correcte en respect avec l’exercice ; 
- ne vous cachez pas derrière quelqu’un d’autre, et ne renvoyez pas la faute à autrui ; 
- ayez une voix qui porte (ce qui ne signifie pas forcément forte) ; 
- regardez l’assistance ; 
- employez une approche positive mais réelle (valorisante mais sans mensonge) ; 
- assurez-vous que ce qui est montré est bien vu. 

Voici les compétences relationnelles communément recherchées lors d’une présentation orale : 

- supprimer les parasites ; 
- avoir une bonne gestuelle ; 
- se mouvoir correctement ; 
- gérer l’utilisation de son regard. 
**\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_** *Programmation Web côté serveur* 

David Eng – Mickaël Martin-Nevot  6/6 
