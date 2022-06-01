<?php

namespace App\Models;
use CodeIgniter\Model;

class ContaModel extends Model {

    protected $table = 'conta';
    protected $primaryKey = ['numero'];
    protected $allowedFields = [ 'numero', 'tipo', 'username', 'valor'];

    public function getDataC($username = null){
        if ($username == null){
         
            return $this->findAll();
        }


        return $this->asArray()->where(['username' => $username, 'tipo' => "Corrente"])->first();
    }

        public function getDataP($username = null){
        if ($username == null){
         
            return $this->findAll();
        }


        return $this->asArray()->where(['username' => $username, 'tipo' => "Poupança"])->first();
    }

        public function getTotal($username = null){
        if ($username == null){
            $this->select('*, sum((preco*`clientes-produtos`.quantidade)) as total, produtos.nome as nome, clientes.Nome as cliente');
            $this->join('produtos', 'produtos.id = clientes-produtos.idproduto');
            $this->join('clientes', 'clientes.Email = `clientes-produtos`.email');
            $this->groupBy('clientes-produtos.email'); // Produces: GROUP BY title
            $this->orderBy('total', 'desc');

            return $this->findAll();
        }
    }



    public function insertcontac($dataconta)
    {            
        
        return $this->insert($dataconta);
    }

        public function insertcontap($data2)
    {            
        
        return $this->insert($data2);
    }




    public function update_order($username, $data){
        $this->set('quantidade', $data['quantidade']);
        $this->where('username', $username);
       $this->update(`clientes-produtos`, $data);
    }

    // public function getOrdersbyCustomer($customer_id){
    //     return $this->asArray()->where(['customer_id'=> $customer_id])->findAll();
    // }

    public function removeOrder($username = null){
        if ($username != null){
            $this->where('username', $username);
            $this->delete();
        }
    }

}

?>