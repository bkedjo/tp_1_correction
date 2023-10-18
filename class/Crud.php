<?php
class Crud
{
    public $connexion;
    public function __construct()
    {
        $host = "localhost";
        $db = "tp_1";
        $user = "root";
        $password = "";

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $this->connexion = new PDO($dsn, $user, $password);
            if ($this->connexion) {
                //echo "Connected to the $db database successfully";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    //methode pour afficher tt les horloges 
    public function getAll($table)
    {

        $PDOStatement = $this->connexion->query("SELECT * FROM $table ORDER BY id ASC");
        $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // methode pour afficher une horloge avec id 
    public function getById($table, $id)
    {
        $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id"); // preparation de rqt sql pour affichage 
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $PDOStatement->execute();
        $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

// methode pour afficher une horloge avec une colonne 
public function getByOneColumn($table, $col)
{
    $PDOStatement = $this->connexion->prepare("SELECT * FROM $table WHERE id = :id"); // preparation de rqt sql pour affichage 
    $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
    $PDOStatement->execute();
    $data = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

    // methode pour ajouter un item 
    public function add($request, $itemdata)
    {
        //requete sql pour l ajout
        $PDOStatement = $this->connexion->prepare($request);
        foreach ($itemdata as $key => $value) {
            
            if (is_numeric($value)) {
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_INT); 
            } else {
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_STR);
            }
        }
        $PDOStatement->execute();
        
        if ($PDOStatement->rowCount() <= 0) {
            return false;
        }
        return $this->connexion->lastInsertId();
    }
    //methode pour modifier un item 
    public function updateHorlogeById($request, $itemData)
    {
        //requete sql pour modification dans la table itemData 
        $PDOStatement = $this->connexion->prepare($request);
var_dump($itemData);
echo'</br></br>';
        foreach ($itemData as $key => $value) {
            
            if (is_numeric($value)) {
                var_dump('je suis dans mon if ma value est : '. $value);
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_INT); 
            } else if (is_string($value)) {
                var_dump('je suis dans mon else ma value est : '. $value);
                $PDOStatement->bindValue(':' . $key, $value, PDO::PARAM_STR);
            
            }else{
                var_dump('Houston on a un pbKey : '.$key.' Value : '.$value);
                }
        }
        $PDOStatement->execute();

        //var_dump($result);
    }

    //methode pour supprimer un item avec un id precis 

    public function delete($table, $id)
    {
        $horloge = $this->getById($table, $id);
        if ($horloge) {
            $PDOStatement = $this->connexion->prepare("DELETE FROM $table WHERE id = :id"); // preparation de requete sql 
            $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
            $PDOStatement->execute();
            return "L'horloge avec l'id " . $id . " a été supprimée.";
        } else {
            return "Horloge introuvable";
        }
    }
    public function __destruct()
    {
        $this->connexion = null;
    }
}
