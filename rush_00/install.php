#!/usr/bin/php
<?php
include('admin/config.php');
$link = mysqli_connect(null, $SQLlogin, $SQLpass, null, 0, '/Users/mpham/goinfre/mamp/mysql/tmp/mysql.sock');
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
	echo "connecter";

$sql = "CREATE DATABASE my_db";
if (mysqli_query($link, $sql)) {
	echo "Database created successfully\n";
} else {
	echo "Error creating database: " . mysqli_error($link);
	echo "\n";
}

/* Retourne le nom de la base de données courante */
if ($result = mysqli_query($link, "SELECT DATABASE()")) {
	$row = mysqli_fetch_row($result);
	printf("La base de données courante est %s.\n", $row[0]);
	mysqli_free_result($result);
}

/* Selectionne la base de donnes de travail */
mysqli_select_db($link, "my_db");

/* Retourne le nom de la base de données courante */
if ($result = mysqli_query($link, "SELECT DATABASE()")) {
	$row = mysqli_fetch_row($result);
	printf("La base de données courante est %s.\n", $row[0]);
	mysqli_free_result($result);
}

$sql_clients = "CREATE TABLE clients( ".
	"id_client INT NOT NULL AUTO_INCREMENT, ".
	"prenom VARCHAR(30) NOT NULL, ".
	"nom VARCHAR(30) NOT NULL, ".
	"login VARCHAR(30) NOT NULL, ".
	"password VARCHAR(300) NOT NULL, ".
	"email VARCHAR(255) NOT NULL, ".
	"date_naissance DATE NOT NULL, ".
	"tel INT NOT NULL, ".
	"sexe ENUM('M', 'F') NOT NULL, ".
	"adresse VARCHAR(300) NOT NULL, ".
	"ville VARCHAR(255) NOT NULL, ".
	"code_postal VARCHAR(5) NOT NULL, ".
	"pays VARCHAR(255) NOT NULL, ".
	"PRIMARY KEY (id_client)); ";

$retval_clients = mysqli_query($link, $sql_clients);
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
 	"PRIMARY KEY (id_produit)); ";

$retval_produits = mysqli_query($link, $sql_produits);
if(!$retval_produits) {
	die('Could not create table: ' . mysql_error());
}
echo "Table produits created successfully\n";

$sql_categories = "CREATE TABLE categories( ".
	"id_categorie INT NOT NULL AUTO_INCREMENT, ".
	"nom VARCHAR(30) NOT NULL, ".
	"PRIMARY KEY (id_categorie)); ";

$retval_categories = mysqli_query($link, $sql_categories);
if(!$retval_categories) {
	die('Could not create table: ' . mysql_error());
}
echo "Table categories created successfully\n";

$sql_commandes = "CREATE TABLE commandes( ".
"id_commande INT NOT NULL AUTO_INCREMENT, ".
"id_client INT NOT NULL, ".
"id_produit INT NOT NULL, ".
"quantite INT NOT NULL, ".
"PRIMARY KEY (id_commande)); ";

$retval_commandes = mysqli_query($link, $sql_commandes);
if(!$retval_commandes) {
	die('Could not create table: ' . mysql_error());
}
echo "Table commandes created successfully\n";
?>