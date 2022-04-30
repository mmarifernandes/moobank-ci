<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomersModel extends Model {

    protected $table = 'clientes';
    protected $primaryKey = 'email';
    protected $allowedFields = ['nome', 'email', 'cidade', 'email', 'senha'];

    public function getData($email = null){
        if ($email == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['email' => $email])->first();
    }

    public function insert_data_login($data)
    {            
        return $this->insert($data);
    }

    public function checkUserPassword($data){
        return $this->where(['email' => $data['email'], 'senha' => $data['senha']])->first();
    }
}

?>