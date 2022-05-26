<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;
use App\Models\ContaModel;

class Admin extends BaseController
{
	

	public function home(){
        $usuarios_model = new UsuariosModel();
        $data_customers = $usuarios_model->getData();
        $data_all['customers'] = $data_customers;

		echo view ('common/headerUser');
		echo view ('adminView', $data_all);
		echo view ('common/footer');
	}



	//--------------------------------------------------------------------

}
