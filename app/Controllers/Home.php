<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;
use App\Models\ExtratoModel;
use App\Models\AuditoriaModel;
use App\Models\ContaModel;


class Home extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()

	{   
		return redirect()->to(base_url('home'));
	}



	public function error()
	{
		echo view ('common/headerUser');
		echo view ('error');
		echo view ('common/footer');
	}



	public function registrationcategory()
	{
		echo view ('common/headerUser');
		echo view ('formRegisterCategory');
		echo view ('common/footer');
	}

	public function registrationcliente()
	{
		echo view ('common/headerUser');
		echo view ('formRegisterCliente');
		echo view ('common/footer');

	}

		public function menu()
	{
		// echo view ('common/headerUser');
		$data = $this->session->get();
		$conta_model = new ContaModel();
		$extrato_model = new ExtratoModel();


		$data['extrato'] = $extrato_model->getData($data['username']);
		$data['contac'] = $conta_model->getDataC($data['username']);
		$data['contap'] = $conta_model->getDataP($data['username']);

		echo view ('menu', $data);
		// echo view ('common/footer');

	}
			public function extrato()
	{
		// echo view ('common/headerUser');
				$data = $this->session->get();
		$conta_model = new ContaModel();
		$extrato_model = new ExtratoModel();


		$data['extrato'] = $extrato_model->getData($data['username']);
		$data['contac'] = $conta_model->getDataC($data['username']);
		$data['contap'] = $conta_model->getDataP($data['username']);

		echo view ('extrato', $data);
		// echo view ('common/footer');
	}
			public function login()
	{
		// echo view ('common/headerUser');
		echo view ('login');
		// echo view ('common/footer');

	}

				public function signup()
	{
		// echo view ('common/headerUser');
		echo view ('signup');
		// echo view ('common/footer');

	}

		public function registrationproduto()
	{
		echo view ('common/headerUser');
		echo view ('formRegisterProduct');
		echo view ('common/footer');

	}


			public function registrationgames()
	{


			$conta_model = new ContaModel();
        $data_categories = $conta_model->getData();
        $data_all['categories'] = $data_categories;

		echo view ('common/headerUser');
		echo view ('formRegisterGame', $data_all);
		echo view ('common/footer');

	}

	public function clientesview()
	{
		$usuarios_model = new UsuariosModel();
        $data_customers = $usuarios_model->getData();
        $data_all['customers'] = $data_customers;

		echo view ('common/headerUser');
		echo view ('clientesView', $data_all);
		echo view ('common/footer');

	}

	public function ordersview()
	{

        $usuarios_model = new UsuariosModel();
		$orders_model = new OrdersModel();
        $data_customers = $usuarios_model->getData2();
        $data_orders = $orders_model->getData();
        $orders_model2 = new OrdersModel();
        $data_orders2 = $orders_model2->getTotal();

        $data_all['customers'] = $data_customers;
        $data_all['orders'] = $data_orders;
		$data_all['total'] = $data_orders2;


		echo view ('common/headerUser');
		echo view ('ordersView', $data_all);
		echo view ('common/footer');

	}

		public function productsview()
	{
		$auditoria_model = new AuditoriaModel();
        $data_products = $auditoria_model->getData();
        $data_all['products'] = $data_products;
		echo view ('common/headerUser');
		echo view ('productsView', $data_all);
		echo view ('common/footer');

	}


		public function gamesview()
	{
		$auditoria_model = new AuditoriaModel();
        $data_products = $auditoria_model->getData();
        $data_all['products'] = $data_products;

		$conta_model = new ContaModel();
		$result = $conta_model->getData();
		$data_all['categorias'] = $result;

		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getData3();
		$data_all['consoles'] = $result;


		echo view ('common/headerUser');
		echo view ('gamesView', $data_all);
		echo view ('common/footer');

	}


		public function categoriesview()
	{
		$conta_model = new ContaModel();
        $data_categories = $conta_model->getData();
        $data_all['categories'] = $data_categories;

		echo view ('common/headerUser');
		echo view ('categoriesView', $data_all);
		echo view ('common/footer');

	}


	public function insertOrder(){
		$usuarios_model = new UsuariosModel();
		$result = $usuarios_model->getData();
		$data['customers'] = $result;

		$auditoria_model = new AuditoriaModel();
		$result2 = $auditoria_model->getData();
		$data['products'] = $result2;
		echo view ('common/headerUser');
		echo view ('insertOrderView', $data);
		echo view ('common/footer');
	}

	public function editOrder($idorder){
		$orders_model = new OrdersModel();
		$result = $orders_model->getData($idorder);
		$data['orders'] = $result;
		
		echo view ('common/headerUser');
		echo view ('editOrderView',$data);
		echo view ('common/footer');
	}


	public function editOrderToDB($idorder){

		$orders_model = new OrdersModel();
		$auditoria_model = new AuditoriaModel();

			$data = array(

				'email' => $this->request->getVar('customerIDform'),
				'quantidade' => $this->request->getVar('qnt'),
				'idproduto' => $this->request->getVar('idproduto'),

			);


				if($auditoria_model->verificar($data) !== false){
				$result = $orders_model->update_order($idorder, $data);
				$auditoria_model->update_quantidade($data);
			}else{
			return redirect()->to('error');
			}
			
 			return redirect()->to(base_url('home'));


	}

		public function quantidade($string)
	{
		$auditoria_model = new AuditoriaModel();
        $data_products = $auditoria_model->getData4($string);
        $data_all['products'] = $data_products;
		echo view ('common/headerUser');
		echo view ('productsView', $data_all);
		echo view ('common/footer');

	}


			public function preco($string)
	{
		$auditoria_model = new AuditoriaModel();
        $data_products = $auditoria_model->getData5($string);
        $data_all['products'] = $data_products;
		echo view ('common/headerUser');
		echo view ('productsView', $data_all);
		echo view ('common/footer');

	}


			public function quantidadeg($string)
	{
		$auditoria_model = new AuditoriaModel();
        $data_products = $auditoria_model->getData4($string);
        $data_all['products'] = $data_products;


		
		$conta_model = new ContaModel();
		$result = $conta_model->getData();
		$data_all['categorias'] = $result;

		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getData3();
		$data_all['consoles'] = $result;


		echo view ('common/headerUser');
		echo view ('gamesView', $data_all);
		echo view ('common/footer');

	}


			public function precog($string)
	{
		$auditoria_model = new AuditoriaModel();
        $data_products = $auditoria_model->getData5($string);
        $data_all['products'] = $data_products;


		
		$conta_model = new ContaModel();
		$result = $conta_model->getData();
		$data_all['categorias'] = $result;

		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getData3();
		$data_all['consoles'] = $result;


		echo view ('common/headerUser');
		echo view ('gamesView', $data_all);
		echo view ('common/footer');

	}

	


	public function editCliente($email){
		$usuarios_model = new UsuariosModel();
		$result = $usuarios_model->getData($email);
		$data['clientes'] = $result;

		
		echo view ('common/headerUser');
		echo view ('editClienteView',$data);
		echo view ('common/footer');
	}


	public function editClienteToDB($email){

		$usuarios_model = new UsuariosModel();

			$data = array(

				'email' => $this->request->getVar('email'),
				'nome' => $this->request->getVar('nome'),
				'cidade' => $this->request->getVar('cidade'),
				'emailantigo' => $this->request->getVar('customerIDform'),


			);

			$result = $usuarios_model->update_customer($email, $data);
			
 			return redirect()->to(base_url('home'));


	}


	public function searchProduct($string){
		$auditoria_model = new AuditoriaModel();

		
        $string = $this->request->getVar('search');
		$result = $auditoria_model->getData2($string);
		$data['products'] = $result;

		
		echo view ('common/headerUser');
		echo view ('productsView',$data);
		echo view ('common/footer');
	}


		public function searchGames($string){
		$auditoria_model = new AuditoriaModel();

		
        $string = $this->request->getVar('search');
		$result = $auditoria_model->getData2($string);
		$data['products'] = $result;

		
		$conta_model = new ContaModel();
		$result = $conta_model->getData();
		$data['categorias'] = $result;

		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getData3();
		$data['consoles'] = $result;


		
		echo view ('common/headerUser');
		echo view ('gamesView',$data);
		echo view ('common/footer');
	}


		public function categorysearch($id){
		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getCategory($id);
		$data['products'] = $result;


		
		$conta_model = new ContaModel();
		$result = $conta_model->getData();
		$data['categorias'] = $result;

		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getData3();
		$data['consoles'] = $result;

		
		
		echo view ('common/headerUser');
		echo view ('gamesView',$data);
		echo view ('common/footer');
	}


		public function consolesearch($string){

		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getConsole($string);
		$data['products'] = $result;

		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getData3();
		$data['consoles'] = $result;

		
		$conta_model = new ContaModel();
		$result = $conta_model->getData();
		$data['categorias'] = $result;
		echo view ('common/headerUser');
		echo view ('gamesView',$data);
		echo view ('common/footer');
	}


	
	public function editProduto($id){
		$auditoria_model = new AuditoriaModel();
		$result = $auditoria_model->getData($id);
		$data['produtos'] = $result;


		$conta_model = new ContaModel();
		$result = $conta_model->getData();
		$data['categorias'] = $result;


		
		echo view ('common/headerUser');
		echo view ('editProductsView',$data);
		echo view ('common/footer');
	}


	public function editProdutoToDB($id){

		$auditoria_model = new AuditoriaModel();

			$data = array(

				'nome' => $this->request->getVar('nome'),
				'tipo' => $this->request->getVar('tipo'),
				'qnt' => $this->request->getVar('qnt'),
				'preco' => $this->request->getVar('preco'),
				'categoria' => $this->request->getVar('categoria'),
				'imagem' => $this->request->getVar('imagem'),



			);

			$result = $auditoria_model->update_product($id, $data);
			
			return redirect()->to(base_url('home'));
		

	}



	
	public function editCategoria($id){
		$conta_model = new ContaModel();
		$result = $conta_model->getData($id);
		$data['categorias'] = $result;

		
		echo view ('common/headerUser');
		echo view ('editCategoriesView',$data);
		echo view ('common/footer');
	}


	public function editCategoriaToDB($id){

		$conta_model = new ContaModel();

			$data = array(

				'nome' => $this->request->getVar('nome'),

			);

			$result = $conta_model->update_categoria($id, $data);
			
 			return redirect()->to(base_url('home'));
			


	}


	public function insertOrderToDB(){



		$orders_model = new OrdersModel();
		$auditoria_model = new AuditoriaModel();

			$data = array(

				'email' =>  $this->request->getVar('clientes'),
				'idproduto' => $this->request->getVar('produtos'),
				'quantidade' => $this->request->getVar('qnt'),



			);

			if($auditoria_model->verificar($data) !== false){
				$orders_model->insert_order($data);
				$auditoria_model->update_quantidade($data);
			}else{
			return redirect()->to('error');
			}

 			return redirect()->to(base_url('home'));

	}


	public function insertProduct(){



		$auditoria_model = new AuditoriaModel();

			$data = array(

				'id' =>  '',
				'nome' => $this->request->getVar('nome'),
				'tipo' => $this->request->getVar('tipo'),
				'categoria' => $this->request->getVar('categoria'),
				'qnt' => $this->request->getVar('qnt'),
				'console' => $this->request->getVar('console'),
				'preco' => $this->request->getVar('preco'),
				'imagem' => $this->request->getVar('imagem'),

			);
			

			$auditoria_model->insert_products($data);
			return redirect()->to('/home');

	}


	public function insertCategory(){


		$conta_model = new ContaModel();

			$data = array(

				'id' =>  '',
				'nome' => $this->request->getVar('nome'),

			);
			
			$conta_model->insert_categories($data);
			return redirect()->to('/home');

	}



	public function removeOrder($idorder=null){
		
		if ($idorder==null){
			return redirect()->to('home');
		}

		$orders_model = new OrdersModel();

		$result = $orders_model->getData($idorder);

		if ($result !=NULL){
			$orders_model->removeOrder($result['idorder']);		
			return redirect()->to(base_url('home'));
			
		}else{
			return redirect()->to(base_url('home'));
		}


	} 



		public function removeProduct($id=null){
		
		if ($id==null){
			return redirect()->to('home');
		}

		$auditoria_model = new AuditoriaModel();

		$result = $auditoria_model->getData($id);

		if ($result !=NULL){
			$auditoria_model->removeProduct($result['id']);		
			return redirect()->to(base_url('home'));
			
		}else{
			return redirect()->to(base_url('home'));
		}


	} 




			public function removeCliente($email=null){
		
		if ($email==null){
			return redirect()->to('home');
		}

		$usuarios_model = new UsuariosModel();

		$result = $usuarios_model->getData($email);

		if ($result !=NULL){
			$usuarios_model->removeCustomer($result['Email']);		
			return redirect()->to(base_url('home'));
			
		}else{
			return redirect()->to(base_url('home'));
		}


	} 


		public function removeCategoria($id=null){
		
		if ($id==null){
			return redirect()->to('home');
		}

		$conta_model = new ContaModel();

		$result = $conta_model->getData($id);

		if ($result !=NULL){
			$conta_model->removeCategory($result['id']);		
			return redirect()->to(base_url('home'));
			
		}else{
			return redirect()->to(base_url('home'));
		}


	} 


	public function registration(){


	$freq = [];
	$number = rand(100,100000000000000000);
	$times = 2;
	while($times-- > 0)
	{
    while(in_array($number, $freq))$number = rand(100,100000000000000000);
    $freq[] = $number;
	}
	$numeros = array( 'corrente' => $freq[0],
					'poupanca' => $freq[1]);

		$date =  date('Y-m-d H:i:s');
		$usuarios_model = new UsuariosModel();
		$conta_model = new ContaModel();
		$auditoria_model = new AuditoriaModel();

			$data = array(
				'numero' => $numeros['corrente'],
				'tipo' => 'Corrente',
				'username' => $this->request->getVar('username'),
				'nome' => $this->request->getVar('nome'),
				'senha' => md5($this->request->getVar('senha')),
				'valor' => $this->request->getVar('deposito'),
			);

			$data2 = array(
				'numero' => $numeros['poupanca'],
				'tipo' => 'Poupança',
				'username' => $this->request->getVar('username'),
			);
			$data3 = array(
				'dataLogin' => '',
				'dataLogout' => '',
				'username' => $this->request->getVar('username'),

			);
			$usuarios_model->insertusuario($data);
			$conta_model->insertcontac($data);
			$conta_model->insertcontap($data2);
			$auditoria_model->insertfirst($data3);
			$this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );

			return redirect()->to('/login');

		
	}

	public function loginUser(){
		
		// $rules = [
		// 	'email' => 'required|min_length[6]|max_length[50]|valid_email',
		// 	'password'=> 'required|min_length[5]|max_length[60]', 
		// ];

		$usuarios_model = new UsuariosModel();
		$auditoria_model = new AuditoriaModel();
		$date =  date('Y-m-d H:i:s');
		// if ($this->validate($rules)){
			$data = array(

				'username' => $this->request->getVar('username'),
				'senha' => $this->request->getVar('senha'),
				'logged_in' => FALSE

			);
		
				$data3 = array(

				'dataLogin' => $date,
				'username' => $this->request->getVar('username'),

			);
			if(!($userRow = $usuarios_model->checkUserPassword($data))){
				$this->session->setFlashdata('loginFail',' Incorrect username or password.' );
				return redirect()->to(base_url('login'));
			}
			else{
				$data['logged_in'] = TRUE;
				$data['username'] = $userRow['username'];
				$data['nome'] = $userRow['nome'];
				$auditoria_model->insertlogin($data3);

				$this->session->set($data);
					return redirect()->to(base_url('menu'));
				}

			// return view('login');
	
	} 

	public function logout(){
		$auditoria_model = new AuditoriaModel();
		$date =  date('Y-m-d H:i:s');

						$data3 = array(
				'dataLogin',
				'dataLogout' => $date,
				'username' => $this->request->getVar('username'),

			);
			$auditoria_model->insertlogout($data3);
//		$session = \Config\Services::session();
		$data['logged_in'] = FALSE;
		$data['username'] = "";
		$data['nome']="";
		$data['senha']="";

		$this->session->destroy();
		// $this->session->set($data);
		return redirect()->to('/login'); 

	}



	//--------------------------------------------------------------------

}
