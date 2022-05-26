<?php

namespace App\Models;
use CodeIgniter\Model;

class UsuariosModel extends Model {

    protected $table = 'usuario';
    protected $primaryKey = 'username';
    protected $allowedFields = ['nome', 'username', 'senha'];

    public function getData($username = null){
        if ($username == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['username' => $username])->first();
    }


        public function getData2($username = null){
        if ($username == null){
            $this->select('*');
            $this->join('clientes-produtos', 'clientes.username = clientes-produtos.username', 'inner');
            $this->groupBy('clientes.username'); // Produces: GROUP BY title
            // $this->order_by('1');  # or desc

            return $this->findAll();
        }
        
        // return $this->asArray()->where(['emai' => $idproduto])->first();

    }

    public function insertusuario($data)
    {            
        return $this->insert($data);
    }




    public function update_customer($username, $data){
        $this->set('username', $data['username']);
        $this->where('username', $data['usernameantigo']);
        return $this->update(`clientes-produtos`, $data);
        
        
        
                    $this->set('username', $data['username']);
                    $this->set('Nome', $data['nome']);
                    $this->set('Cidade', $data['cidade']);
            
                    $this->where('username', $data['usernameantigo']);
                   return $this->update(`clientes`, $data);

    }


        public function removeCustomer($username = null){
        if ($username!= null){
            $this->where('username', $username);
            $this->delete();
        }
    }


      public function checkUserPassword($data){
        return $this->where(['username' => $data['username'], 'senha' => md5($data['senha'])])->first();
    }
}

?>