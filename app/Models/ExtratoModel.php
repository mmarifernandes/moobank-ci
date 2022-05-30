<?php

namespace App\Models;
use CodeIgniter\Model;

class ExtratoModel extends Model {

    protected $table = 'extrato';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'id', 'valor', 'tipo', 'conta', 'tipopagamento', 'descricao', 'data'];

    public function getData($username = null){
        if ($username == null){

            return $this->findAll();
        }

          $this->select('id, extrato.valor, extrato.tipo, conta, tipopagamento, descricao, data');
            $this->join('conta', 'conta.numero = extrato.conta', 'left');
                        $this->orderBy('data', 'desc'); // Produces: GROUP BY title

        return $this->asArray()->where(['conta.username' => $username])->findAll(5);
    }

    
    public function getData2($username = null){
      if ($username == null){

          return $this->findAll();
      }

        $this->select('id, extrato.valor, extrato.tipo, conta, tipopagamento, descricao, data');
          $this->join('conta', 'conta.numero = extrato.conta', 'left');
                      $this->orderBy('data', 'desc'); // Produces: GROUP BY title

      return $this->asArray()->where(['conta.username' => $username])->findAll();
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

    public function getData4($string = null){

        if ($string == null){
              $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            return $this->findAll();
        }
          $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            $this->orderBy('qnt', $string);
        return $this->findAll();
    }

        public function getData5($string = null){

        if ($string == null){
              $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            return $this->findAll();
        }
          $this->select('*, produtos.nome as nome, produtos.id as id, categorias.nome as nomec');
            $this->join('categorias', 'produtos.categoria = categorias.id', 'left');
            $this->orderBy('preco', $string);
        return $this->findAll();
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


    public function removeProduct($id = null){
        if ($id!= null){
            $this->where('id', $id);
            $this->delete();
        }
    }

}

?>