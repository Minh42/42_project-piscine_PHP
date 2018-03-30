<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="compte.css" />
        <title>Mes informations</title>
    </head>

    <body>

    <div class="container">    
        <h1>MES INFORMATIONS</h1>
        <h2>N'hésitez pas à modifier vos coordonnées ci-dessous pour que votre compte soit parfatement à jour.</h2>
        <form method="post" action="modif.php">

<?php
include('admin/config.php');

/* Connexion Mysql */
$link = mysqli_connect(null, $SQLlogin, $SQLpass, 'my_db', 0, '/Users/mpham/goinfre/mamp/mysql/tmp/mysql.sock');
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/* Seletionner la base de donnees */
mysqli_select_db($link, "my_db");

//$id = $_GET['id_client'];

$id = "2";
$sql = "SELECT * FROM clients WHERE id_client = ".$id;
$requete = mysqli_query($link, $sql);
$data = mysqli_fetch_array($requete);
?>

<form method="post" action="modif2.php">
            <p>
            <div class="row">
                <div class="col-25">
                <label for="prenom">PRENOM :</label>
                </div>
                <div class="col-75">
                <input type="text" name="prenom" id="prenom" value="<?php echo $data['prenom'] ?>" size="30" maxlength="10" autofocus required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="nom">NOM DE FAMILLE:</label>
                </div>
                <div class="col-75">
                <input type="text" name="nom" id="nom" value="<?php echo $data['nom'] ?>" size="30" maxlength="10" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="login">LOGIN :</label>
                </div>
                <div class="col-75">
                <input class="input1" type="text" name="login" id="login"  value="<?php echo $data['login'] ?>" size="30" maxlength="10" required/>
                </div> 
            </div>
            <div class="row">
                <div class="col-25">
                <label for="password">MOT DE PASSE :</label>
                </div>
                <div class="col-75">
                <input class="input1" type="password" name="password" id="password" value="<?php echo $data['password'] ?>" size="30" maxlength="10" required/>
                </div> 
            </div>
            <div class="row">
                <div class="col-25">
                <label for="email">ADRESSE E-MAIL :</label>
                </div>
                <div class="col-75">
                <input type="email" name="email" id="email" value="<?php echo $data['email'] ?>" size="30" maxlength="10" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="date_naissance">DATE DE NAISSANCE :</label>
                </div>
                <div class="col-75">
                <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $data['date_naissance'] ?>" required/>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="telephone">NUMERO DE TELEPHONE:</label>
                </div> 
                <div class="col-75"> 
                <input type="tel" name="telephone" id="telephone" value="<?php echo $data['tel'] ?>" required/>
                </div>  
            </div> 
            <div class="row">
                <div class="col-25">
                <label for="sexe">SEXE:</label> 
                </div> 
                <div class="col-75"> 
                <input type="text" name="sexe" id="sexe" value="<?php echo $data['sexe'] ?>" required/>
                </div> 
            </div>
            <div class="row">
                <div class="col-25">
                <label for="adresse">ADRESSE :</label>
                </div> 
                <div class="col-75"> 
                <input type="text" name="adresse" id="adresse" value="<?php echo $data['adresse'] ?>" size="30" maxlength="10" required />
                </div> 
            </div>
            <div class="row">
                <div class="col-25">
                <label for="ville">VILLE :</label>
                </div>
                <div class="col-75"> 
                <input type="text" name="ville" id="ville" value="<?php echo $data['ville'] ?>" size="30" maxlength="10" required/>
                </div> 
            </div>
            <div class="row">
                <div class="col-25">
                <label for="code_postal">CODE POSTAL :</label>
                </div>
                <div class="col-75">
                <input type="text" name="code_postal" id="code_postal" value="<?php echo $data['code_postal'] ?>" size="30" maxlength="10" required/>
                </div> 
            </div>
            <div class="row">
                <div class="col-25">
                <label for="pays">PAYS :</label>
                </div>
                <div class="col-75">
                <input type="text" name="pays" id="pays" value="<?php echo $data['pays'] ?>" size="30" maxlength="10" required/>
                </div> 
            </div>
            <div class="row">
                <div class="col-25">
                </div>
                <div class="col-75">
                <input type="submit" name="modif" value="SAUVEGARDER"/>
                </div> 
            </div>
            </p>
        </form>
    </div>

    <div class="container">
        <h2>Vous êtes sur le point de supprimer votre compte. Souhaitez-vous continuer?</h2>

        <form method="post" action="delete.php">
            <p>
            <div class="row">
                <div class="col-25">
                </div>
                <div class="col-75">
                <input type="submit" name="delete" value="SUPPRIMER"/>
                </div> 
            </div> 
            </p>
        </form>
        </div>
    </body>
</html>

