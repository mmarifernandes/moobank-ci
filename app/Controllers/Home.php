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
		return redirect()->to(base_url('login'));
	}



	public function error()
	{
		echo view ('common/headerUser');
		echo view ('error');
		echo view ('common/footer');
	}


		public function menu()
	{
		// echo view ('common/headerUser');
		$data = $this->session->get();
		$conta_model = new ContaModel();
		$extrato_model = new ExtratoModel();


		$data['extrato'] = $extrato_model->getData($data['username']);
		$data['contac'] = $extrato_model->getTotalC($data['username']);
		$data['contap'] = $extrato_model->getTotalP($data['username']);
		echo view ('menu', $data);
		// echo view ('common/footer');

	}



		public function pagdebito()
	{
		// echo view ('common/headerUser');
		$data = $this->session->get();
		$conta_model = new ContaModel();
		$data['tipo'] = 'Débito';
		$data['contac'] = $conta_model->getDataC($data['username']);

		echo view ('pagamentosdados', $data);
		// echo view ('common/footer');

	}
			public function pagpix()
	{
		// echo view ('common/headerUser');
		$data = $this->session->get();
		$conta_model = new ContaModel();
		$data['tipo'] = 'Pix';
		$data['contac'] = $conta_model->getDataC($data['username']);

		echo view ('pagamentosdados', $data);
		// echo view ('common/footer');

	}


			public function pagboleto()
	{
		// echo view ('common/headerUser');
		$data = $this->session->get();
		$conta_model = new ContaModel();
		$data['tipo'] = 'Boleto';
		$data['contac'] = $conta_model->getDataC($data['username']);

		echo view ('pagamentosdados', $data);
		// echo view ('common/footer');

	}

			public function extrato()
	{
		// echo view ('common/headerUser');
		$data = $this->session->get();
		$conta_model = new ContaModel();
		$extrato_model = new ExtratoModel();


		$data['extrato'] = $extrato_model->getData2($data['username']);
		$data['contac'] = $conta_model->getDataC($data['username']);
		$data['contap'] = $conta_model->getDataP($data['username']);
		$data['extrato2'] = $extrato_model->getData3($data['username']);
	$data['contac'] = $extrato_model->getTotalC($data['username']);
		$data['contap'] = $extrato_model->getTotalP($data['username']);
				echo view ('extrato', $data);
		// echo view ('common/footer');
	}



	public function pagamentos()
	{
		// echo view ('common/headerUser');
		$data = $this->session->get();
		$conta_model = new ContaModel();
		$extrato_model = new ExtratoModel();


		$data['extrato'] = $extrato_model->getData2($data['username']);
		$data['contac'] = $conta_model->getDataC($data['username']);
		$data['contap'] = $conta_model->getDataP($data['username']);

		echo view ('pagamentos', $data);
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
		$extrato_model = new ExtratoModel();

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


			$dataDepositoInicial = array(
				'tipo' => 'Depósito Inicial',
				'valor' => $this->request->getVar('deposito'),
				'conta' => $numeros['corrente'],
				'tipopagamento' => 'Depósito',
				'descricao' => 'inicial',
				'data' => $date,
			);


			$dataDepositoInicial2 = array(
				'tipo' => 'Depósito Inicial }Poupança',
				'valor' => '00.00',
				'conta' => $numeros['poupanca'],
				'tipopagamento' => 'Depósito',
				'descricao' => 'poupança aberta',
				'data' => $date,
			);
			$usuarios_model->insertusuario($data);
			$conta_model->insertcontac($data);
			$conta_model->insertcontap($data2);
			$extrato_model->insertcontac($dataDepositoInicial);
			$extrato_model->insertcontap($dataDepositoInicial2);
			$auditoria_model->insertfirst($data3);
			$this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );

			return redirect()->to('/login');

		
	}





public function insertpagamento(){

		$date =  date('Y-m-d H:i:s');
		$extrato_model = new ExtratoModel();
		$uri = previous_url();
		print_r($uri);
		$user = $this->session->get();
			$data = array(
				'tipo' => 'Pagamento',
				'valor' => '-'.$this->request->getVar('valor'),
				'conta' => $this->request->getVar('conta'),
				'tipopagamento' => $this->request->getVar('tipo'),
				'descricao' => $this->request->getVar('descricao'),
				'data' => $date,
			);

			$total = $extrato_model->getTotalC($user['username']);
			if($total['total'] < substr($data['valor'], 1)){
				$this->session->setFlashdata('messageFail',' Saldo insuficiente!' );
			return redirect()->to($uri);
			}else{
				
				$extrato_model->insertpagamento($data);

			// $this->session->setFlashdata('messageRegisterOk',' Registered Successfull. Please, login.' );

			return redirect()->to('/menu');
			}

		
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
