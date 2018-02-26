ALTER TABLE commande DROP FOREIGN KEY fk_commande_utilisateur;
ALTER TABLE commande DROP FOREIGN KEY fk_commande_produit;
ALTER TABLE avis DROP FOREIGN KEY fk_avis_utilisateur;
ALTER TABLE avis DROP FOREIGN KEY fk_avis_produit;
drop table if exists utilisateur;
drop table if exists produit;
drop table if exists categorie;
drop table if exists commande;
drop table if exists avis;

create table produit (
  id integer not null primary key auto_increment,
  titre varchar(100) not null,
  description_courte varchar(500) not null,
  description_longue varchar(2000) not null,
  prix decimal not null,
  dateAjout date,
  image varchar(150)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table utilisateur (
  id integer not null primary key auto_increment,
  login varchar(50) not null,
  password varchar(88) not null,
  nom varchar(88) not null,
  prenom varchar(88) not null,
  addresse varchar(88) not null,
  ville varchar(20) not null,
  codeP integer not null,
  estAdmin BOOLEAN not null
)engine=innodb character set utf8 collate utf8_unicode_ci;

create table commande (
  id integer not null primary key auto_increment,
  idUtilisateur integer NOT NULL,
  idProduit integer NOT NULL,
  quantite INTEGER NOT NULL,
  prix decimal NOT NULL,
  dateCommande date,
  FOREIGN KEY fk_commande_utilisateur(idUtilisateur) references utilisateur(id),
  FOREIGN KEY fk_commande_produit(idProduit) references produit(id)
)engine=innodb character set utf8 collate utf8_unicode_ci;

create table categorie (
  id integer not null primary key auto_increment,
  nom VARCHAR(50)
)engine=innodb character set utf8 collate utf8_unicode_ci;

create table avis (
  id integer not null primary key auto_increment,
  idUtilisateur integer NOT NULL ,
  idProduit integer NOT NULL ,
  commentaire VARCHAR(2),
  FOREIGN KEY fk_avis_utilisateur(idUtilisateur) references utilisateur(id),
  FOREIGN KEY fk_avis_produit(idProduit) references produit(id)
)engine=innodb character set utf8 collate utf8_unicode_ci;