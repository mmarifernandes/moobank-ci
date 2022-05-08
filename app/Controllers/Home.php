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

		echo view ('common/headerUser');
		echo view ('productsView', $data_all);
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
		$result = $customers_model->getData(null);
		$data['customers'] = $result;

		$products_model = new ProductsModel();
		$result2 = $products_model->getData(null);
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

	public function insertOrderToDB(){


		// $rules = [
		// 	'description' => 'required|min_length[3]|max_length[255]',
		// 	'amount' => 'required', 
		// ];// revisar

		$orders_model = new OrdersModel();

		// if ($this->validate($rules)){
			$data = array(

				'email' =>  $this->request->getVar('clientes'),
				'idproduto' => $this->request->getVar('produtos'),
				'quantidade' => $this->request->getVar('qnt'),



			);
			

			$orders_model->insert_order($data);
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

				'quantidade' => $this->request->getVar('qnt'),

				'preco' => $this->request->getVar('preco'),

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



	public function removeOrder($id=null){
		
		if ($id==null){
			return redirect()->to('customersession');
		}

		$orders_model = new OrdersModel();

		$result = $orders_model->getData($id);

		if ($result !=NULL){
			$orders_model->removeOrder($result['id']);		
			return redirect()->to(base_url('customersession'));
			
		}else{
			return redirect()->to(base_url('customersession'));
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
		print_r($data);

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
