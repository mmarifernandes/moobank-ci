<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomersModel;
use App\Models\OrdersModel;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;


class Home extends BaseController
{
	// I defined session variable in BaseController.php provided by Codeigniter. See code. 
	
	public function index()

	{   
		return redirect()->to(base_url('adminsession'));
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

		public function registrationproduto()
	{
		echo view ('common/headerUser');
		echo view ('formRegisterProduct');
		echo view ('common/footer');

	}


			public function registrationgames()
	{


			$categories_model = new CategoriesModel();
        $data_categories = $categories_model->getData();
        $data_all['categories'] = $data_categories;

		echo view ('common/headerUser');
		echo view ('formRegisterGame', $data_all);
		echo view ('common/footer');

	}

	public function clientesview()
	{
		$customers_model = new CustomersModel();
        $data_customers = $customers_model->getData();
        // $data_orders = $orders_model->getData();
        // $data = $this->session->get();
        // $data_all['orders'] = $data_orders;
        $data_all['customers'] = $data_customers;

		echo view ('common/headerUser');
		echo view ('clientesView', $data_all);
		echo view ('common/footer');

	}

	public function ordersview()
	{

		  
        $customers_model = new CustomersModel();
		$orders_model = new OrdersModel();
        $data_customers = $customers_model->getData2();
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
		$products_model = new ProductsModel();
        $data_products = $products_model->getData();
        $data_all['products'] = $data_products;
		// print_r($data_all);
		echo view ('common/headerUser');
		echo view ('productsView', $data_all);
		echo view ('common/footer');

	}


		public function gamesview()
	{
		$products_model = new ProductsModel();
        $data_products = $products_model->getData();
        $data_all['products'] = $data_products;

			$categories_model = new CategoriesModel();
		$result = $categories_model->getData();
		$data_all['categorias'] = $result;

				$products_model = new ProductsModel();
		$result = $products_model->getData3();
		$data_all['consoles'] = $result;


		// print_r($data_all);
		echo view ('common/headerUser');
		echo view ('gamesView', $data_all);
		echo view ('common/footer');

	}


		public function categoriesview()
	{
		$categories_model = new CategoriesModel();
        $data_categories = $categories_model->getData();
        $data_all['categories'] = $data_categories;

		echo view ('common/headerUser');
		echo view ('categoriesView', $data_all);
		echo view ('common/footer');

	}




	public function customerSession(){
		//$session = \Config\Services::session();
		$orders_model = new OrdersModel();
		$data = $this->session->get();
		$data['orders'] = $orders_model->getOrdersbyCustomer($data['id']);

		echo view ('common/headerUser');
		echo view ('ordersView',$data);
		echo view ('common/footer');
	}


	public function insertOrder(){
		$customers_model = new CustomersModel();
		$result = $customers_model->getData();
		$data['customers'] = $result;

		$products_model = new ProductsModel();
		$result2 = $products_model->getData();
		$data['products'] = $result2;
		// print_r($data['products']);
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
		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];
		$orders_model = new OrdersModel();

		// if ($this->validate($rules)){
			$data = array(

				'email' => $this->request->getVar('customerIDform'),
				'quantidade' => $this->request->getVar('qnt'),

			);
			
			print_r($data);
			print_r($idorder);
			// $email = $data['customer_id'];
			// print_r($email);
			$result = $orders_model->update_order($idorder, $data);
			
 			return redirect()->to(base_url('adminsession'));
			
		// }
		// else{
			// $this->editOrder($idproduto);	
					
		// }

	}



	public function editCliente($email){
		$customers_model = new CustomersModel();
		$result = $customers_model->getData($email);
		$data['clientes'] = $result;

		// print_r($result);
		
		echo view ('common/headerUser');
		echo view ('editClienteView',$data);
		echo view ('common/footer');
	}


	public function editClienteToDB($email){
		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];
		$customers_model = new CustomersModel();

		// if ($this->validate($rules)){
			$data = array(

				'email' => $this->request->getVar('email'),
				'nome' => $this->request->getVar('nome'),
				'cidade' => $this->request->getVar('cidade'),
				'emailantigo' => $this->request->getVar('customerIDform'),


			);

			$result = $customers_model->update_customer($email, $data);
			
 			return redirect()->to(base_url('adminsession'));
			
		// }
		// else{
			// $this->editOrder($idproduto);	
					
		// }

	}


	public function searchProduct($string){
		$products_model = new ProductsModel();

		
            $string = $this->request->getVar('search');
			// print_r($string);
		$result = $products_model->getData2($string);
		$data['products'] = $result;

		// print_r($data);
		
		echo view ('common/headerUser');
		echo view ('productsView',$data);
		echo view ('common/footer');
	}


		public function searchGames($string){
		$products_model = new ProductsModel();

		
            $string = $this->request->getVar('search');
			// print_r($string);
		$result = $products_model->getData2($string);
		$data['products'] = $result;

		
			$categories_model = new CategoriesModel();
		$result = $categories_model->getData();
		$data['categorias'] = $result;

				$products_model = new ProductsModel();
		$result = $products_model->getData3();
		$data['consoles'] = $result;


		// print_r($data);
		
		echo view ('common/headerUser');
		echo view ('gamesView',$data);
		echo view ('common/footer');
	}


			public function categorysearch($id){
		$products_model = new ProductsModel();
		$result = $products_model->getCategory($id);
		$data['products'] = $result;


		
			$categories_model = new CategoriesModel();
		$result = $categories_model->getData();
		$data['categorias'] = $result;

				$products_model = new ProductsModel();
		$result = $products_model->getData3();
		$data['consoles'] = $result;

		
		
		echo view ('common/headerUser');
		echo view ('gamesView',$data);
		echo view ('common/footer');
	}


		public function consolesearch($string){

		$products_model = new ProductsModel();
		$result = $products_model->getConsole($string);
		$data['products'] = $result;

		$products_model = new ProductsModel();
		$result = $products_model->getData3();
		$data['consoles'] = $result;

		
			$categories_model = new CategoriesModel();
		$result = $categories_model->getData();
		$data['categorias'] = $result;
		// print_r($result)
		echo view ('common/headerUser');
		echo view ('gamesView',$data);
		echo view ('common/footer');
	}



	
	public function editProduto($id){
		$products_model = new ProductsModel();
		$result = $products_model->getData($id);
		$data['produtos'] = $result;


				$categories_model = new CategoriesModel();
		$result = $categories_model->getData();
		$data['categorias'] = $result;


		// print_r($result);
		
		echo view ('common/headerUser');
		echo view ('editProductsView',$data);
		echo view ('common/footer');
	}


	public function editProdutoToDB($id){
		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];
		$products_model = new ProductsModel();

		// if ($this->validate($rules)){
			$data = array(

				'nome' => $this->request->getVar('nome'),
				'tipo' => $this->request->getVar('tipo'),
				'qnt' => $this->request->getVar('qnt'),
				'preco' => $this->request->getVar('preco'),
				'categoria' => $this->request->getVar('categoria'),
				'imagem' => $this->request->getVar('imagem'),



			);

			$result = $products_model->update_product($id, $data);
			
 			return redirect()->to(base_url('adminsession'));
			
		// }
		// else{
			// $this->editOrder($idproduto);	
					
		// }

	}



	
	public function editCategoria($id){
		$categories_model = new CategoriesModel();
		$result = $categories_model->getData($id);
		$data['categorias'] = $result;

		// print_r($result);
		
		echo view ('common/headerUser');
		echo view ('editCategoriesView',$data);
		echo view ('common/footer');
	}


	public function editCategoriaToDB($id){
		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];
		$categories_model = new CategoriesModel();

		// if ($this->validate($rules)){
			$data = array(

				'nome' => $this->request->getVar('nome'),

			);

			$result = $categories_model->update_categoria($id, $data);
			
 			return redirect()->to(base_url('adminsession'));
			
		// }
		// else{
			// $this->editOrder($idproduto);	
					
		// }

	}


	public function insertOrderToDB(){


		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];// revisar

		$orders_model = new OrdersModel();
		$products_model = new ProductsModel();

		// if ($this->validate($rules)){
			$data = array(

				'email' =>  $this->request->getVar('clientes'),
				'idproduto' => $this->request->getVar('produtos'),
				'quantidade' => $this->request->getVar('qnt'),
				// 'quantidademax' => $this->request->getVar('produtos'),



			);
			
			// print_r($data['quantidademax']);			

			// if($data['quantidade'] > $data['quantidademax']){
			// 	echo 'erro';
			// }
			if($products_model->verificar($data) !== false){
				$orders_model->insert_order($data);
				$products_model->update_quantidade($data);
			}else{
			return redirect()->to('error');
			}

 			return redirect()->to(base_url('adminsession'));
			
		// }
		// else{
			// $this->insertOrder($customer_id);	
					
		// }
	}


	public function insertProduct(){


		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];// revisar

		$products_model = new ProductsModel();

		// if ($this->validate($rules)){
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
			

			$products_model->insert_products($data);
			return redirect()->to('/adminsession');
			
		// }
		// else{
			// $this->insertOrder($customer_id);	
					
		// }
	}


	public function insertCategory(){


		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];// revisar

		$categories_model = new CategoriesModel();

		// if ($this->validate($rules)){
			$data = array(

				'id' =>  '',

				'nome' => $this->request->getVar('nome'),

			);
			

			$categories_model->insert_categories($data);
			return redirect()->to('/adminsession');
			
		// }
		// else{
			// $this->insertOrder($customer_id);	
					
		// }
	}



	public function removeOrder($idorder=null){
		
		if ($idorder==null){
			return redirect()->to('adminsession');
		}

		$orders_model = new OrdersModel();

		$result = $orders_model->getData($idorder);

		if ($result !=NULL){
			$orders_model->removeOrder($result['idorder']);		
			return redirect()->to(base_url('adminsession'));
			
		}else{
			return redirect()->to(base_url('adminsession'));
		}


	} 



		public function removeProduct($id=null){
		
		if ($id==null){
			return redirect()->to('adminsession');
		}

		$products_model = new ProductsModel();

		$result = $products_model->getData($id);

		if ($result !=NULL){
			$products_model->removeProduct($result['id']);		
			return redirect()->to(base_url('adminsession'));
			
		}else{
			return redirect()->to(base_url('adminsession'));
		}


	} 




			public function removeCliente($email=null){
		
		if ($email==null){
			return redirect()->to('adminsession');
		}

		$customers_model = new CustomersModel();

		$result = $customers_model->getData($email);

		if ($result !=NULL){
			$customers_model->removeCustomer($result['Email']);		
			return redirect()->to(base_url('adminsession'));
			
		}else{
			return redirect()->to(base_url('adminsession'));
		}


	} 


				public function removeCategoria($id=null){
		
		if ($id==null){
			return redirect()->to('adminsession');
		}

		$categories_model = new CategoriesModel();

		$result = $categories_model->getData($id);

		if ($result !=NULL){
			$categories_model->removeCategory($result['id']);		
			return redirect()->to(base_url('adminsession'));
			
		}else{
			return redirect()->to(base_url('adminsession'));
		}


	} 


	public function insertData(){

		// $rules = [
		// 	'nome' => 'required|min_length[3]|max_length[50]',
		// 	'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[customers.email]',
		// 	'datanascimento' => 'required',
		// 	'cidade' => 'required'
		// ];

		// Codeigniter 3: $this->load->model("CustomersModel");
		$customers_model = new CustomersModel();
		// Codeigniter 3: $this->load->library("session");
//		$session = \Config\Services::session();

		// codeignter 3 : $this->input->post("...");

		// if ($this->validate($rules)){
			$data = array(


				'nome' => $this->request->getVar('nome'),
				
				'email' => $this->request->getVar('email'),
				
				'datanascimento' => $this->request->getVar('datanascimento'),

				'cidade' => $this->request->getVar('cidade'),

				'senha' => ''


			);
			$customers_model->insert_data_login($data);

			return redirect()->to('/adminsession');
			
		// }
		// else{
			$this->registration();	
					
		// }
		
	}







	//--------------------------------------------------------------------

}
