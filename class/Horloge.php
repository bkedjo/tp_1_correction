<?php
// class horloge qui herite de la classe crud 
class Horloge extends Crud
{
    public $id;
    public $brand;
    public $type;
    public $model;
    public $price;
    public $table = 'horloge';

    public function getHorloges()
    {
        return $this->getAll($this->table);
    }

    public function getHorlogeById($id)
    {

        return $this->getById($this->table, $id);
    }

public function getByBrand($brand) {

    return $this->getByOneColumn($this->table, $brand);
}

    public function ajouterHorloge($horlogedata)
    {
        //validation
        /* 
        if horloge data 
        */
        $request = "INSERT INTO $this->table (brand, type, model, price) VALUES (:brand, :type, :model, :price)";
        return parent::add($request, $horlogedata);
    }

    public function updateHorloge($horlogeData)
    {
        $this->brand = $horlogeData['brand'];
        /* $horlogeData = [
            
            'brand' => $this->brand,
            'type' => $this->type,
            'model' => $this->model,
            'price' => $this->price,
            'id' => $this->id
        ]; */
        var_dump($horlogeData);
        echo'</br></br>';
        $request = "UPDATE horloge SET brand = :brand, type = :type, model = :model, price = :price WHERE id = :id";
        parent::updateHorlogeById($request, $horlogeData);
    }

    public function deleteHorloge($id)
    {
        return parent::delete('horloge',$id);
    }
}
