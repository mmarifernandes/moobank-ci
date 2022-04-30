<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductsModel extends Model {

    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'id', 'nome', 'tipo', 'categoria', 'quantidade', 'preco', 'console'];

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insert_products($data)
    {            
        return $this->insert($data);
    }

    public function update_products($id,$data)
    {
        return $this->update($id, $data);
    }

    // public function getproductssbyCustomer($customer_id){
    //     return $this->asArray()->where(['customer_id'=> $customer_id])->findAll();
    // }

    // public function removeproducts($id = null){
    //     if ($id != null){
    //         $this->delete($id);
    //     }
    // }

}

?>