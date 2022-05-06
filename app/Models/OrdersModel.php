<?php

namespace App\Models;
use CodeIgniter\Model;

class OrdersModel extends Model {

    protected $table = 'clientes-produtos';
    protected $primaryKey = ['email', 'idproduto'];
    protected $allowedFields = [ 'email', 'idproduto'];

    public function getData($idproduto = null){
        if ($idproduto == null){
            $this->select('*, produtos.nome as nome');
            $this->join('produtos', 'produtos.id = clientes-produtos.idproduto');
            return $this->findAll();
        }
        
        return $this->asArray()->where(['idproduto' => $idproduto])->first();

    }

    public function insert_order($data)
    {            
        return $this->insert($data);
    }

    public function update_order($id,$data)
    {
        return $this->update($id, $data);
    }

    // public function getOrdersbyCustomer($customer_id){
    //     return $this->asArray()->where(['customer_id'=> $customer_id])->findAll();
    // }

    // public function removeOrder($id = null){
    //     if ($id != null){
    //         $this->delete($id);
    //     }
    // }

}

?>