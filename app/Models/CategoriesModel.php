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

    public function update_categoria($id,$data)
    {
     
        
                    $this->set('nome', $data['nome']);
               
                    $this->where('id', $id);
                   return $this->update(`categorias`, $data);

    }

    // public function getcategoriessbyCustomer($customer_id){
    //     return $this->asArray()->where(['customer_id'=> $customer_id])->findAll();
    // }
    public function removeCategory($id = null){
        if ($id!= null){
            $this->where('id', $id);
            $this->delete();
        }
    }

}

?>