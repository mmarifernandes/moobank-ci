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

    public function update_product($id,$data)
    {
       
        
        $this->set('nome', $data['nome']);
        $this->set('tipo', $data['tipo']);
        $this->set('quantidade', $data['quantidade']);
        $this->set('preco', $data['preco']);

                    $this->where('id', $id);
                   return $this->update(`produtos`, $data);

    }

    // public function getproductssbyCustomer($customer_id){
    //     return $this->asArray()->where(['customer_id'=> $customer_id])->findAll();
    // }

    public function removeProduct($id = null){
        if ($id!= null){
            $this->where('id', $id);
            $this->delete();
        }
    }

}

?>