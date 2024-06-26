<?php 

class Login extends CI_controller{

	public function index() {

        $this->load->model('User_model');
		$this->load->library('form_validation');

		

        $this->form_validation->set_rules('username','Username','Required');
        $this->form_validation->set_rules('password','Password','Required');
        if ($this->form_validation->run() == false) 
           {
             $this->load->view('admin/login');
	        }
	         else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
	         	$user = $this->User_model->doLogin($username,$password);
	         	print_r($user);
		 	    echo "Form validated successfully.";
		        }

	}
}


?>