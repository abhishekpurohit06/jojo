<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();
		
        $this->load->model("user_model"); 
		$this->load->library('session');
		$this->load->helper('url');
    }
	public function index()
	{
		$this->load->view('main');
	}

	public function authentication() {

        $this->load->view('authentication');
    }

	public function register() {
        // Form validation can be added here
        $data = array(
            'name' => $this->input->post('newusername'),
            'number' => $this->input->post('newnumber'),
            'password' => $this->input->post('newpassword')
            // Add other user data as needed
        );
		if($this->user_model->add_user($data)=='success'){
			$this->session->set_userdata('data','Sucessfully Registerd');
		}
		else{
			$this->session->set_userdata('data','Already Registerd');
		}
		session_destroy();
    	$this->load->view('authentication');
    }

	public function dashbord(){
		$this->load->view('main');
	}

	public function login(){ 
        $number = $this->input->post('number');
        $password = $this->input->post('password');
		 if($this->user_model->verify_user($number, $password)==1){
			$this->dashbord();
		 }
		 else{
			$this->authentication();
		 }
		
		
	}

}
