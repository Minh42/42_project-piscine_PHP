#!/usr/bin/php
<?php
include('admin/config.php');
$link = mysql_connect($SQLhost, $SQLlogin, $SQLpass)
        or die("Impossible de se connecter : " . mysql_error() . "\n");
echo "Connexion réussie\n";
$sql = 'CREATE DATABASE my_db';
if (mysql_query($sql, $link)) {
    echo "Base de données créée correctement\n";
} else {
    echo 'Erreur lors de la création de la base de données : ' . mysql_error() . "\n";
}
$db_selected = mysql_select_db("my_db", $link);
if (!$db_selected) {
   die ('Impossible de sélectionner la base de données : ' . mysql_error());
}

$sql_clients = "CREATE TABLE clients( ".
    "id_client INT NOT NULL AUTO_INCREMENT, ".
    "nom VARCHAR(30) NOT NULL, ".
    "prenom VARCHAR(30) NOT NULL, ".
    "sexe ENUM('M', 'F') NOT NULL, ".
    "email VARCHAR(255) NOT NULL, ".
    "date_naissance DATE NOT NULL, ".
    "pays VARCHAR(255) NOT NULL, ".
    "ville VARCHAR(255) NOT NULL, ".
    "code_postal VARCHAR(5) NOT NULL, ".
    "Tel INT NOT NULL, ".
    "PRIMARY KEY (id_client) ); ";

$retval_clients = mysql_query($sql_clients, $link);
if(!$retval_clients) {
    die('Could not create table: ' . mysql_error());
 }
 echo "Table clients created successfully\n";

$sql_produits = "CREATE TABLE produits( ".
     "id_produit INT NOT NULL AUTO_INCREMENT, ".
    "nom VARCHAR(30) NOT NULL, ".
    "description VARCHAR(300) NOT NULL, ".
     "prix DECIMAL(10,2) NOT NULL, ".
     "id_categorie INT NOT NULL, ".
     "PRIMARY KEY (id_produit) ); ";

$retval_produits = mysql_query($sql_produits, $link);
if(!$retval_produits) {
    die('Could not create table: ' . mysql_error());
}
echo "Table produits created successfully\n";

$sql_categories = "CREATE TABLE categories( ".
    "id_categorie INT NOT NULL AUTO_INCREMENT, ".
    "nom VARCHAR(30) NOT NULL, ".
    "PRIMARY KEY (id_categorie) ); ";

$retval_categories = mysql_query($sql_categories, $link);
if(!$retval_categories) {
    die('Could not create table: ' . mysql_error());
}
echo "Table categories created successfully\n";

$sql_commandes = "CREATE TABLE commandes( ".
"id_commande INT NOT NULL AUTO_INCREMENT, ".
"id_client INT NOT NULL, ".
"id_produit INT NOT NULL, ".
"quantite INT NOT NULL, ".
"PRIMARY KEY (id_commande) ); ";

$retval_commandes = mysql_query($sql_commandes, $link);
if(!$retval_commandes) {
    die('Could not create table: ' . mysql_error());
}
echo "Table commandes created successfully\n";
?>
