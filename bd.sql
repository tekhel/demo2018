-- -----------------------------------------------------------------------------
--             Génération d'une base de données pour
--                           PostgreSQL
--                        (18/3/2019 10:27:10)
-- -----------------------------------------------------------------------------
--      Nom de la base : MLR1
--      Projet : 
--      Auteur : Linda
--      Date de dernière modification : 18/3/2019 10:26:37
-- -----------------------------------------------------------------------------

drop database MLR1;
-- -----------------------------------------------------------------------------
-- 

-- -----------------------------------------------------------------------------
--       TABLE : TENUE
-- -----------------------------------------------------------------------------

CREATE TABLE TENUE
   (
    NPRO serial NOT NULL  ,
    LIBELLE text NOT NULL  ,
    PRIX int4 NOT NULL  ,
    QSTOCK int8 NOT NULL  
,   CONSTRAINT PK_TENUE PRIMARY KEY (NPRO)
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : COMMANDE
-- -----------------------------------------------------------------------------

CREATE TABLE COMMANDE
   (
    NCOM serial NOT NULL  ,
    NCLI int8 NULL  ,
    DATECOM date(8) NOT NULL  
,   CONSTRAINT PK_COMMANDE PRIMARY KEY (NCOM)
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE COMMANDE
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_COMMANDE_CLIENT
     ON COMMANDE (NCLI)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : CLIENT
-- -----------------------------------------------------------------------------

CREATE TABLE CLIENT
   (
    NCLI serial NOT NULL  ,
    NOM text NOT NULL,
    ADRESSE text NOT NULL  ,
    LOCALITE text NOT NULL  ,
    CATEGORIE char(32) NOT NULL  ,
    COMPTE char(32) NOT NULL  
,   CONSTRAINT PK_CLIENT PRIMARY KEY (NCLI)
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : DETAIL
-- -----------------------------------------------------------------------------

CREATE TABLE DETAIL
   (
    NCOM int4 NOT NULL  ,
    NPRO int4 NOT NULL  ,
    QCOM int8 NOT NULL  
,   CONSTRAINT PK_DETAIL PRIMARY KEY (NCOM, NPRO)
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE DETAIL
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_DETAIL_COMMANDE
     ON DETAIL (NCOM)
    ;

CREATE  INDEX I_FK_DETAIL_TENUE
     ON DETAIL (NPRO)
    ;


-- -----------------------------------------------------------------------------
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------


ALTER TABLE COMMANDE ADD 
     CONSTRAINT FK_COMMANDE_CLIENT
          FOREIGN KEY (NCLI)
               REFERENCES CLIENT (NCLI);

ALTER TABLE DETAIL ADD 
     CONSTRAINT FK_DETAIL_COMMANDE
          FOREIGN KEY (NCOM)
               REFERENCES COMMANDE (NCOM);

ALTER TABLE DETAIL ADD 
     CONSTRAINT FK_DETAIL_TENUE
          FOREIGN KEY (NPRO)
               REFERENCES TENUE (NPRO);


-- -----------------------------------------------------------------------------
--                FIN DE GENERATION
-- -----------------------------------------------------------------------------