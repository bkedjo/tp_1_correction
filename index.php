<?php
//connection a la bd 
/* $host = "localhost";
$db = "tp_1";
$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {

    $pdo = new PDO($dsn, $user, $password);
    if ($pdo) {
        echo "Connected to the $db database successfully";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
} */

require_once('class/Crud.php');
require_once('class/Horloge.php');

//$crud = new Crud();
// creer un objet crud 

// creeation d un objet horloge 
$horlogeObj = new Horloge();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'ajouter') {
            $nouvelleHorloge = [
                'brand' => $_POST['brand'],
                'type' => $_POST['type'],
                'model' => $_POST['model'],
                'price' => $_POST['price']
            ];
            $resultatAjout = $horlogeObj->ajouterHorloge($nouvelleHorloge);
            if ($resultatAjout) {
                echo "Horloge ajoutée avec l'ID : $resultatAjout";
            } else {
                echo "Erreur lors de l'ajout de l'horloge.";
            }
        } elseif ($_POST['action'] === 'éditer') {
            
            $horlogeModifiee = [
                'id'=> $_POST['id'],
                'brand' => $_POST['brand'],
                'type' => $_POST['type'],
                'model' => $_POST['model'],
                'price' => $_POST['price']
            ];
            $horlogeObj->updateHorloge($horlogeModifiee);
            echo "Horloge mise à jour avec succès.";
        } elseif ($_POST['action'] === 'supprimer') {
            $idHorloge = $_POST['id'];
            $resultatSuppression = $horlogeObj->deleteHorloge($idHorloge);
            echo $resultatSuppression;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Horloges</title>
</head>
<body>
    <h1>Gestion des Horloges</h1>

    <!-- liste de mes items  -->
    <h2>Liste des Horloges</h2>
    <ul>
        <?php
        $oHorloge = new Horloge;
        $horloges = $oHorloge->getHorloges();

        foreach ($horloges as $horloge) {
            echo "<li>{$horloge['brand']} - {$horloge['model']} - {$horloge['price']} $</li>";
        }
        ?>
    </ul>

    <!-- afficher une orloge avec son id  -->
    <h2>Rechercher l'horloge avec son ID</h2>
    <form method="get" action="index.php">
        <label>ID de l'Horloge:</label>
        <input type="text" name="id">
        <input type="submit" value="Afficher">
    </form>
    <?php
    if (isset($_GET['id'])) {
        $idHorloge = $_GET['id'];
        $oHorloge = new Horloge;
        $horlogeParId = $oHorloge->getHorlogeById($idHorloge);
        if ($horlogeParId) {
            echo "<pre>";
            print_r($horlogeParId);
            echo "</pre>";
        } else {
            echo "Horloge introuvable pour l'ID spécifié.";
        }
    }
    ?>

    <!-- Ajouter une Horloge -->
    <h2>Ajouter une Horloge</h2>
    <form method="post" action="index.php">
        <label>Marque:</label>
        <input type="text" name="brand">
        <label>Type:</label>
        <input type="text" name="type">
        <label>Modèle:</label>
        <input type="text" name="model">
        <label>Prix:</label>
        <input type="number" name="price">
        <input type="submit" name="action" value="ajouter">
    </form>

    <!-- Modifier une Horloge -->
    <h2>Modifier une Horloge</h2>
    <form method="post" action="index.php">
        <label>ID de l'horloge à modifier:</label>
        <input type="text" name="id">
        <label>Nouvelle Marque:</label>
        <input type="text" name="brand">
        <label>Nouveau Type:</label>
        <input type="text" name="type">
        <label>Nouveau Modèle:</label>
        <input type="text" name="model">
        <label>Nouveau Prix:</label>
        <input type="text" name="price">
        <input type="submit" name="action" value="éditer">
    </form>

    <!-- Supprimer une Horloge -->
    <h2>Supprimer une Horloge</h2>
    <form method="post" action="index.php">
        <label>ID de l'Horloge à supprimer:</label>
        <input type="text" name="id">
        <input type="submit" name="action" value="supprimer">
    </form>
</body>
</html>
