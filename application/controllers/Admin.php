<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller
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
        $this->load->model('konfig_model','konfig');
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
         echo "ok";//  redirect('/Welcome/backoffice');
            
        }
        else
        {
            if( $_SESSION['role'] > 2){
                $this->load->view('pages/be/access');
               }else{
                $this->load->view('pages/be/dashboard');
               }
           
        }
    }
    
   
///HALAMAN USER MANAGEMENT///

   function UserManagement(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
         redirect('/Welcome/backoffice');
        
        }
         else
        {
        if( $_SESSION['role'] > 2){
            $this->load->view('pages/be/access');
           }else{
               //mendapatkan role admin dan officer
            $role=$this->data->getrole();
            $listuser= $this->data->getUser();
            if(count((array)$listuser) > 0){
                $data['users']=$listuser;
            }else {
                $data['users']=array();
            }
           
            $data['role']=$role;
            $this->load->view('pages/be/v_users',$data);
           }
       
    }
        

   } 

    

  /// FUGSI MENAMBAH USER
  function addUser(){

    if($_POST){
        $insert=$this->data->addUser();
        if($insert =="ok"){
            $this->session->set_flashdata('success', 'New User created successfully');
            $this->konfig->dolog('Input data berhasil');
            redirect('Admin/UserManagement');
        }else{
            $this->session->set_flashdata('error',$insert);
            $this->konfig->dolog('Input data gagal');
            redirect('Admin/UserManagement');
        }

    }else{
        redirect('Admin/UserManagement');
    }
}     
 

function editUser(){
    $idus=$this->uri->segment(3);
    if($_POST){
        $edit=$this->data->editUser($idus);
        if($edit == "ok"){
            $this->session->set_flashdata('success', 'Users Edit Success');
            $this->konfig->dolog('Update data berhasil');
        }else{
            $this->konfig->dolog('Update data gagal');
            $this->session->set_flashdata('error',$edit);
        }
    }else{
        $this->session->set_flashdata('error','Tidak ada input');
        
    }
    redirect('Admin/UserManagement'); 
}

function delUser(){
    $idus=$this->uri->segment(3);
    $hapus=$this->data->deleteuser($idus);
    if($hapus == "ok"){
        $this->session->set_flashdata('success', 'User Edit Success');
        $this->konfig->dolog('Update berhasil atas user '.$idus);
    }else{
        $this->session->set_flashdata('error', 'gagal mengupdate '.$idus);
        $this->konfig->dolog('Update data gagal atas user '. $idus);
    }
    redirect('Admin/UserManagement');
}





    //////FUNGSI KELUAR DARI dashboard
    function logout(){
        $this->konfig->dolog('Keluar_sistem');
        session_destroy();
        redirect('backoffice');
    }



    ///FUNGSI PRODUK ///////////////
    function produk(){
        ////produk list 
        $dataproduk=$this->data->getproduk();
     
        $data['produk']=$dataproduk;
        $this->load->view('pages/be/v_produk',$data);
        
    }

    function addproduk(){
        if($_POST){
           $addproduk=$this->data->addproduk();
           if($addproduk != 'gagal'){
               if(empty($_FILES['image'])){
                $this->session->set_flashdata('success', ' tidak ada image');
               }else{
                $namaproduk="produk-".$addproduk;
                $this->konfig->uploadImage($namaproduk);
                $this->konfig->resize($namaproduk);
                $this->data->update_image($namaproduk,$addproduk);
                $this->session->set_flashdata('success', ' Data berhasil ditambahkan');
                $this->konfig->dolog('Penambahan data produk berhasil');
               } 
               
           }else{
            $this->session->set_flashdata('error', 'Penambahan data gagal');
            $this->konfig->dolog('Penambahan data produk gagal');
           }
        }else{
            $this->session->set_flashdata('error', ' Tidak ada data masuk');
            $this->konfig->dolog('Penambahan data produk gagal');
            
        }
        redirect('Admin/produk');
    }


    function editProduk(){
        $idpro=$this->uri->segment(3);
        if($_POST){
            $sizefile=$_FILES['image']['size'];
          
           $edit=$this->data->editproduk($idpro);
           if($edit=="ok"){
            if($sizefile > 0){
                $namaproduk="produk-".$idpro;
                $upload=$this->konfig->uploadImage($namaproduk);
                 if($upload == $namaproduk){
                   
                    $this->konfig->resize($namaproduk);
                    $this->data->update_image($namaproduk,$idpro);
                     $this->session->set_flashdata('success', ' Upload image dengan gambar berhasil');
                    $this->konfig->dolog('Edit data dengan gambar berhasil');
                 }else{
                    $this->session->set_flashdata('error', ' Upload image gagal karena '.$upload['error']);
                    $this->konfig->dolog('Edit data dengan gambar gagal');
                 }
                
            }else{
                $this->session->set_flashdata('success', ' Edit data tanpa image berhasil');
                $this->konfig->dolog('Edit data tanpa gambar'); 
            }
           }else{
            $this->session->set_flashdata('error', ' Edit data gagal dilakukan');
            $this->konfig->dolog('Edit data gagal');
           }

        }else{
            $this->session->set_flashdata('error', ' Tidak ada data masuk');
            $this->konfig->dolog('Edit data gagal');
        }
        redirect('Admin/produk');
    }


    function hapusProduk(){
        $idpro=$this->uri->segment(3);
        redirect('Admin/produk');
    }

    /////////// END PRODUK ////////////
    

    ///////// JENIS DAN MATERI /////////////
    function materijenis(){
        $datates=$this->data->getjenistes();
        $datamateri=$this->data->getmateri();
        $data['tes']=$datates;
        $data['materi']=$datamateri;
        $this->load->view('pages/be/v_jenismateri',$data);
    }

    function addTes(){
        if($_POST){
            $aksi=$this->data->addjenistes();
            if($aksi == "ok"){
                $this->session->set_flashdata('success', ' Data Tes telah ditambahkan');
                $this->konfig->dolog('Penambahan data Jenis Tes berhasil');
            }else{
                $pesan ="data gagal dilakukan karena ".$aksi;
                $this->session->set_flashdata('error', $pesan);
                $this->konfig->dolog($pesan);
            }
        }else{
            $this->session->set_flashdata('error', ' Tidak ada data masuk');
            $this->konfig->dolog('Penambahan data Jenis Tes gagal');
        }
        redirect('Admin/materijenis');
    }

    function addMateri(){
        if($_POST){
            if(empty($_POST['tes'])){
                $this->session->set_flashdata('error', ' Jenis tes masih kosong');
                $this->konfig->dolog('Penambahan data Materi gagal karena jenis tes kosong');
            }else{
                $aksi=$this->data->addmateri();
                    if($aksi == "ok"){
                        $this->session->set_flashdata('success', ' Data Tes telah ditambahkan');
                        $this->konfig->dolog('Penambahan data Jenis Tes berhasil');
                    }else{
                        $pesan ="data gagal dilakukan karena ".$aksi;
                        $this->session->set_flashdata('error', $pesan);
                        $this->konfig->dolog($pesan);
                    }
            }
            
        }else{
            $this->session->set_flashdata('error', ' Tidak ada data masuk');
            $this->konfig->dolog('Penambahan data Jenis Tes gagal');
        }
        redirect('Admin/materijenis');
    }


    //////// END JENIS DAN MATERI/////////////


    //////// PENDAFTAR ////////////////////
    function pendaftar(){
        $memberinfo= $this->data->getStudent();
        $data['member']=$memberinfo;
        $this->load->view('pages/be/v_member',$data);
    }
    

    function resetpassword(){
        $uid=$this->uri->segment(3);
        $resetpass='123456';
        $usersData = array('password'=>getHashedPassword($resetpass), 'updatedBy'=>$_SESSION['userId'],
        'updatedDtm'=>date('Y-m-d H:i:s'));
        $result = $this->konfig->changePassword($uid, $usersData);
        if($result > 0) { 
            $this->session->set_flashdata('success', 'Password updation successful'); 
            $this->konfig->dolog('reset password berhasil');
        }else { 
            $this->session->set_flashdata('error', 'Password updation failed'); 
            $this->konfig->dolog('Reset password gagal');
        }
        redirect('Admin/pendaftar');
    }
    ///// END PENDAFTAR ////////////////
}

?>