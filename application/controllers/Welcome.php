<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Welcome  extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model','data');
        $this->_init();
       
    }

    private function _init()
	{
		$this->output->set_template('fe/default');
		
	}


    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $dataproduk=$this->data->getproduk();
        $data['produk']=$dataproduk;
        $this->load->view('pages/fe/muka',$data);

    }

    function backoffice(){
        redirect('Login');
    }   
    
}

?>