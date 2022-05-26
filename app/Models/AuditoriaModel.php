<?php

namespace App\Models;
use CodeIgniter\Model;

class AuditoriaModel extends Model {

    protected $table = 'auditoria';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'id', 'username', 'dataLogin', 'dataLogout'];

    public function getData($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

            public function insertfirst($data3)
    {            
        return $this->insert($data3);
    }

    
    public function insertlogout($data3)
    
    {
        $this->set('dataLogout', $data3['dataLogout']);
        $this->where('username', $data3['username']);
        $this->update(`auditoria`, $data3);
    }

        public function insertlogin($data3)
    
    {
        $this->set('dataLogin', $data3['dataLogin']);
        $this->where('username', $data3['username']);
        $this->update(`auditoria`, $data3);
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