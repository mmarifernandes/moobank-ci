<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model {

    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'id', 'nome'];

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insert_categories($data)
    {            
        return $this->insert($data);
    }

    public function update_categories($id,$data)
    {
        return $this->update($id, $data);
    }

    // public function getcategoriessbyCustomer($customer_id){
    //     return $this->asArray()->where(['customer_id'=> $customer_id])->findAll();
    // }

    // public function removecategories($id = null){
    //     if ($id != null){
    //         $this->delete($id);
    //     }
    // }

}

?>