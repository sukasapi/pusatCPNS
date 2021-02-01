<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Officer extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();

        $isLoggedIn = $this->session->userdata('isLoggedIn');
        $this->_init();
        $this->load->model('login_model');
        $this->load->model('data_model','data');
        $this->load->library('form_validation');
             
    }


    private function _init()
	{
		$this->output->set_template('be/dashboard');
		
	}
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
          redirect('/Welcome/backoffice');
            
        }
        else
        {
            if( $_SESSION['role'] > '3'){
                $this->load->view('pages/be/access');
               }else{
                echo "dashboard transaksi";
                //$this->load->view('pages/be/dashboard');
               }
           
        }
    }
    
   



    //////FUNGSI KELUAR DARI dashboard
    function logout(){
         //do log
        $this->login_model->tolog('keluar sistem');
        session_destroy();
        redirect('backoffice');
    }


    
}

?>