<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductsModel extends Model {

    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'id', 'nome', 'tipo', 'categoria', 'qnt', 'preco', 'console', 'imagem'];

    public function getData($id = null){
        if ($id == null){
            $this->select('*, produtos.nome as nome, produtos.id as id, categorias.id as idc, categorias.nome as nomec');

            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            return $this->findAll();
        }

          $this->select('*, produtos.nome as nome, produtos.id as id, categorias.id as idc, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
        return $this->asArray()->where(['produtos.id' => $id])->first();
    }

    
    public function getData2($string = null){

        if ($string == null){
              $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            return $this->findAll();
        }
          $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
        return $this->asArray()->like('produtos.nome', $string)->findAll();
    }

      public function getData3($id = null){
        if ($id == null){
            $this->select('*, produtos.nome as nome, produtos.id as id, categorias.id as idc, categorias.nome as nomec');
            // $this->distinct('produtos.console as consoless');
            // $this->db->distinct();
            $this->where('console is not null');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            $this->groupBy('console'); // Produces: GROUP BY title

            return $this->findAll();
        }

          $this->select('*, produtos.nome as nome, produtos.id as id, categorias.id as idc, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
        return $this->asArray()->where(['produtos.id' => $id])->first();
    }


    

    public function getCategory($id = null){

        if ($id == 0){
              $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            return $this->findAll();
        }
          $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
        return $this->asArray()->where('categorias.id', $id)->findAll();
    }


        public function getConsole($string = null){

          $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');

        return $this->asArray()->where('console', $string)->findAll();
    }




    public function insert_products($data)
    {            
        return $this->insert($data);
    }

        public function verificar($data)
    {            
        $result = $this->asArray()->where(['id' => $data['idproduto']])->first();
        // print_r($result['qnt']);
        if($data['quantidade'] > $result['qnt'] ){
            return false;
        }
        // return $this->insert($data);
    }


    public function update_product($id,$data)
    {
       
        
        $this->set('nome', $data['nome']);
        $this->set('tipo', $data['tipo']);
        $this->set('qnt', $data['qnt']);
        $this->set('preco', $data['preco']);
        $this->set('categoria', $data['categoria']);
        $this->set('imagem', $data['imagem']);


                    $this->where('id', $id);
                   return $this->update(`produtos`, $data);

    }

    public function update_quantidade($data){

        print_r($data);
          $this->set('qnt', 'qnt-'.$data['quantidade'], false);
        $this->where('id', $data['idproduto']);
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