<?php

namespace App\Models;
use CodeIgniter\Model;

class OrdersModel extends Model {

    protected $table = 'clientes-produtos';
    protected $primaryKey = ['idorder'];
    protected $allowedFields = [ 'email', 'idproduto', 'quantidade', 'idproduto'];

    public function getData($idorder = null){
        if ($idorder == null){
            $this->select('*, `clientes-produtos`.quantidade as qnt, produtos.nome as nome');
            $this->join('produtos', 'produtos.id = clientes-produtos.idproduto');
            return $this->findAll();
        }
                    $this->select('*, `clientes-produtos`.quantidade as qnt, produtos.nome as nome');

                    $this->join('produtos', 'produtos.id = clientes-produtos.idproduto');

        return $this->asArray()->where(['idorder' => $idorder])->first();
    }

        public function getTotal($idorder = null){
        if ($idorder == null){
            $this->select('*, sum((preco*`clientes-produtos`.quantidade)) as total, produtos.nome as nome');
            $this->join('produtos', 'produtos.id = clientes-produtos.idproduto');
                        $this->groupBy('clientes-produtos.email'); // Produces: GROUP BY title

            return $this->findAll();
        }
    }



    public function insert_order($data)
    {            
        return $this->insert($data);
    }

    public function update_order($idorder, $data){
        $this->set('quantidade', $data['quantidade']);
        $this->where('idorder', $idorder);
       $this->update(`clientes-produtos`, $data);
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