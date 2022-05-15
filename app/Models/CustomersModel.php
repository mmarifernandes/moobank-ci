<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomersModel extends Model {

    protected $table = 'clientes';
    protected $primaryKey = 'email';
    protected $allowedFields = ['nome', 'email', 'cidade', 'email'];

    public function getData($email = null){
        if ($email == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['email' => $email])->first();
    }


        public function getData2($email = null){
        if ($email == null){
            $this->select('*');
            $this->join('clientes-produtos', 'clientes.email = clientes-produtos.email', 'inner');
            $this->groupBy('clientes.email'); // Produces: GROUP BY title
            // $this->order_by('1');  # or desc

            return $this->findAll();
        }
        
        // return $this->asArray()->where(['emai' => $idproduto])->first();

    }

    public function insertcliente($data)
    {            
        return $this->insert($data);
    }




    public function update_customer($email, $data){
        $this->set('email', $data['email']);
        $this->where('email', $data['emailantigo']);
        return $this->update(`clientes-produtos`, $data);
        
        
        
                    $this->set('Email', $data['email']);
                    $this->set('Nome', $data['nome']);
                    $this->set('Cidade', $data['cidade']);
            
                    $this->where('Email', $data['emailantigo']);
                   return $this->update(`clientes`, $data);

    }


        public function removeCustomer($email = null){
        if ($email!= null){
            $this->where('Email', $email);
            $this->delete();
        }
    }
}

?>