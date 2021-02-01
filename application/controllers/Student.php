<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Student extends CI_Controller
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
        $this->load->model('Data_model','data');
        $this->load->library('form_validation');
             
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
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE || $isLoggedIn=!null)
        {
            $this->load->view('pages/fe/muka');
        }
        else
        {
            $this->load->view('pages/fe/dashboard_student');
        }
    }
    

    function logMe(){
        
        $datalog=array();
        if($_POST){
            $this->load->library('form_validation'); 
        
                    $this->form_validation->set_rules('input','User Name','trim|required|max_length[128]');
                    $this->form_validation->set_rules('passwd', 'Password', 'required|max_length[32]');
        
                    if($this->form_validation->run() == FALSE)
                    {
                        $this->session->set_flashdata('error',validation_errors());
                        $this->load->view('pages/fe/login');
                    }
                    else
                    {
                        $input = $this->security->xss_clean($this->input->post('input'));
                        $password = $this->input->post('passwd');
                        $result = $this->login_model->logStu($input, $password);
                        if(!empty($result))
                        {
                            $lastLogin = $this->login_model->lastLoginInfo($result->userId);
            
                            $sessionArray = array('userId'=>$result->userId,                    
                                                    'role'=>$result->roleId,
                                                    'roleText'=>$result->role,
                                                    'name'=>$result->name,
                                                    'isLoggedIn' => TRUE
                                            );
            
                            $this->session->set_userdata($sessionArray);
            
                            unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);
            
                            $loginInfo = array("userId"=>$result->userId, "sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());
            
                            $this->login_model->lastLogin($loginInfo);
                            $this->login_model->tolog('login'); 
                            redirect('Student');
                        }
                        else
                        {
                            $this->session->set_flashdata('error', 'Email or password mismatch');
                            $this->load->view('pages/be/login');
                        }
                        
                        //var_dump($result);
                    } 
            }else{
                $this->session->set_flashdata('error', 'Belum ada input');
                $this->load->view('pages/fe/login');

            }
           
    }
    

    function daftar(){
      
       
        if($_POST){
            $insert=$this->data->addStudent();
            if($insert =="ok"){
                $this->session->set_flashdata('success', 'Registrasi berhasil, i=silahkan login untuk masuk ke halaman anda');
               $this->load->view('pages/fe/login');
            }else{
                //$this->session->set_flashdata('error',$insert);
                 // $this->konfig->dolog('Input data gagal');
                 $this->load->view('pages/fe/registrasi');
            }
    
        }else{
            $this->load->view('pages/fe/registrasi');
        }
    }
    


    function logout(){
         //do log
         $datalog=array(
            'who_log'=>$_SESSION['userId'],
            'what_log'=>'logout',
            'when_log'=>date('Y-m-d H:i:s'));
            $this->login_model->tolog('login'); 

            session_destroy();
            redirect('/Welcome');
    }
}

?>