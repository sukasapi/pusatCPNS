<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Konfig_model (Login Model)
 * Konfig model class fungsi standard  
 * @author : sukasapi
 * @version : 1.0
 * @since : 20 November 2016
 */
class Data_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konfig_model','konfig');
        $this->load->model('User_model','user');
    }
    
 

   //MEDAPATKAN LIST PENDAFTAR
   function getStudent(){
    $this->db->select('*');
    $this->db->from('tbl_pendaftar as member');
    $this->db->order_by('member.id_user');
    $this->db->join('tbl_users as user','user.userId = member.id_user','LEFT');
    $query=$this->db->get();
        if($this->db->count_all_results() > 0){
            return $query->result();
        }else{
            return array();
        }
   }

   function addStudent(){
    $this->load->library('form_validation');
            
   
    $this->form_validation->set_rules('uname','User Name','trim|required|max_length[128]');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
    $this->form_validation->set_rules('upass','Password','required|max_length[20]');
   
    
    if($this->form_validation->run() == FALSE)
    {
       $pesan=validation_errors();
    }
    else
    {
       
        $uname = ucwords(strtolower($this->security->xss_clean($this->input->post('uname'))));
        $email = strtolower($this->security->xss_clean($this->input->post('email')));
        $password = $this->input->post('upass');
        $roleId = '4';
        
        $userInfo = array('email'=>$email,'username'=>$uname , 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'createdDtm'=>date('Y-m-d H:i:s'));
        
       
        $result = $this->user->addNewUser($userInfo);
        
        if($result > 0)
        {

            $infostudent=array('id_user'=>$result);
            $query= $this->db->insert('tbl_pendaftar', $infostudent);
            if($query){
                $pesan="ok";
            }else{
                $pesan="gagal mendaftarkan siswa";
            }
            
        }
        else
        {
            $pesan=validation_errors();
           
        }
        
       
    }
    return $pesan;
   }



   function getrole(){
       $this->db->Select('*');
       $this->db->from('tbl_roles');
       $this->db->where('roleId >','1');
       $this->db->where('roleId <','4');
       $query=$this->db->get();
       return $query->result();

   }


   //////////////////////////////////////////CRUD USER //////////////////////////////////////////
   /// MENDAPATKAN LIST USER NON STUDENT
   function getUser(){
    $this->db->Select('tuser.userId as idus,tuser.isDeleted as status,tuser.email as email, tuser.username as uname, tuser.name as nama, tuser.mobile as hp, tuser.roleId as role,tuser.createdDtm as createon,
    trole.role as roleName');
       $this->db->from('tbl_users as tuser');
       $this->db->where('tuser.roleId >','1');
       $this->db->where('tuser.roleId <','4');
       $this->db->join('tbl_roles as trole','trole.roleId = tuser.roleId');
       $query=$this->db->get();
       $syh=$this->db->last_query();
     
       if($query->num_rows() > 0){
        return $query->result();
       }else {
           return array();
       }
       
   }

   function addUser(){
    $this->load->library('form_validation');
            
    $this->form_validation->set_rules('fname','Full Name','required|max_length[128]');
    $this->form_validation->set_rules('uname','User Name','trim|required|max_length[128]');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
    $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
    $this->form_validation->set_rules('role','Role','trim|required|numeric');
    $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
    
    if($this->form_validation->run() == FALSE)
    {
       $pesan=validation_errors();
    }
    else
    {
        $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
        $uname = ucwords(strtolower($this->security->xss_clean($this->input->post('uname'))));
        $email = strtolower($this->security->xss_clean($this->input->post('email')));
        $password = $this->input->post('password');
        $roleId = $this->input->post('role');
        $mobile = $this->security->xss_clean($this->input->post('mobile'));
        
        $userInfo = array('email'=>$email,'username'=>$uname , 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name, 'mobile'=>$mobile, 'createdBy'=>$_SESSION['userId'], 'createdDtm'=>date('Y-m-d H:i:s'));
        
        $this->load->model('user_model');
        $result = $this->user_model->addNewUser($userInfo);
        
        if($result > 0)
        {
            $pesan="ok";
        }
        else
        {
            $pesan=validation_errors();
           
        }
        
       
    }
    return $pesan;
   }


   function editUser($idus){
    $this->load->library('form_validation');
            
    $userId = $this->input->post('userId');
    
    $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
    $this->form_validation->set_rules('role','Role','trim|required|numeric');
    $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');

    if($this->form_validation->run() == FALSE)
    {
        $pesan=validation_errors();
    }
    else
    {   
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $uname = ucwords(strtolower($this->security->xss_clean($this->input->post('uname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));

                $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                'mobile'=>$mobile, 'updatedBy'=>$_SESSION['userId'], 'updatedDtm'=>date('Y-m-d H:i:s'));

                $this->db->where('userId', $idus);
                $this->db->update('tbl_users', $userInfo);
                
                $pesan="ok";
    }
    
    return $pesan;
   }


   function deleteuser($idus){
    $userInfo = array('isDeleted'=>'1', 'updatedBy'=>$_SESSION['userId'], 'updatedDtm'=>date('Y-m-d H:i:s'));
    $this->db->where('userId', $idus);
    $this->db->update('tbl_users', $userInfo);
    $pesan="ok";
    return $pesan;
   }

////////////////////////////////////////// PRODUK MODEL /////////////////////////////////////

   function getproduk(){
       $this->db->select('*,usernya.name as siapa');
       $this->db->from('tbl_produk as produk');
       $this->db->order_by('date_added','ASC');
       $this->db->join('tbl_users as usernya','usernya.userId = produk.added_by','LEFT');
       $query=$this->db->get();
       if($this->db->count_all_results() > 0){
           return $query->result();
       }else{
           return array();
       }


   }

   function cekprodukExists(){
   }

   function addProduk(){
       /*
    $this->load->library('form_validation');
    $this->form_validation->set_rules('fname','Full Name','required|max_length[128]');
    $this->form_validation->set_rules('uname','User Name','trim|required|max_length[128]');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
    $this->form_validation->set_rules('password','Password','required|max_length[20]');
    $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
    $this->form_validation->set_rules('role','Role','trim|required|numeric');
    $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');*/
    $produkinfo=array(
        'nama_produk'=>$_POST['name'],
        'short_desc'=>$_POST['short_desc'],
        'desc'=>$_POST['deskripsi'],
        'price'=>$_POST['harga'],
        'date_added'=>date('Y-m-d H:i:s'),
        'last_modified'=>date('Y-m-d H:i:s'),
        'added_by'=>$_SESSION['userId']
        
    );

    if($this->db->insert('tbl_produk',$produkinfo)){
        return $this->db->insert_id();
    }else{
        return  "gagal";
    }
   }

   function editproduk($idpro = null){

   $produkinfo=array(
        'nama_produk'=>$_POST['name'],
        'short_desc'=>$_POST['short_desc'],
        'desc'=>$_POST['deskripsi'],
        'price'=>$_POST['harga'],
        'last_modified'=>date('Y-m-d H:i:s'),
        'added_by'=>$_SESSION['userId']
    );

    $this->db->where('id', $idpro);
    $query=$this->db->update('tbl_produk', $produkinfo);
    if($query){
        $pesan="ok";
    }else{
        $pesan="Edit data gagal";
    }

    return $pesan;
    
   }

   function update_image($nfile=null,$idpro=null){
    $path=base_url()."assets/images/product/".$nfile.".jpg";
    $tpath=base_url()."assets/images/thumb/".$nfile.".jpg";
    $produkinfo=array('thumbnail'=>$tpath,'image'=>$path);
    $this->db->where('id', $idpro);
    $this->db->update('tbl_produk', $produkinfo);
   }


/////// /////////////  CRUD JENIS TES ////////////////////////////////

function getjenistes(){
    $this->db->select('*');
    $this->db->from('tbl_tes');
    $this->db->order_by('date_added','ASC');
    $query=$this->db->get();
    if($this->db->count_all_results() > 0){
        return $query->result();
    }else{
        return array();
    }

}

function cekteseksis(){
    $this->db->select('*');
    $this->db->from('tbl_tes');
    $this->db->where('jenis_tes',$_POST['jenistes']);
    if($this->db->count_all_results() > 0){
        return false;
    }else{
        return true;
    }
}

function addjenistes(){
    if($this->cekteseksis()== TRUE ){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenistes','Jenis Tes','required|max_length[128]');
        $this->form_validation->set_rules('desc','Deskripsi Tes','max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
           return validation_errors();
        }else{
            $tesinfo = array(
                'jenis_tes'=>$_POST['jenistes'],
                'desc'=>$_POST['desc'],
                'date_added'=>date('Y-m-d H:i:s'));
            $query=$this->db->insert('tbl_tes',$tesinfo);
            if($query){
                return "ok";
            }else{
                return "penambahan data gagal";
            }
        }
        
    }else{
        return "jenis tes sudah ada, silahkan edit";
    }


}

function editjenistes(){

}

///////////////////// END CRUD JENIS TES /////////////////////////////
  
/////// /////////////  CRUD MATERI ////////////////////////////////

function getmateri(){
    $this->db->select('materi.nama_materi as n_materi,materi.id_materi as idm,materi.desc as desc,tes.id_tes as id_tes, tes.jenis_tes as jenistes');
    $this->db->from('tbl_materi as materi');
    $this->db->join('tbl_tes as tes','tes.id_tes=materi.id_jenis','ASC');
    $this->db->order_by('tes.id_tes','ASC');
    $query=$this->db->get();
    if($this->db->count_all_results() >0){
        return $query->result();
    }else{
        return array();
    }
}

function cekmaterieksis(){
    $this->db->select('*');
    $this->db->from('tbl_materi');
    $this->db->where('nama_materi',$_POST['materi']);
    $this->db->where('id_jenis',$_POST['tes']);
 
    if($this->db->count_all_results() > 0){
        return false;
    }else{
        return true;
    }
}

function addmateri(){
    if($this->cekmaterieksis() == TRUE){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('materi','Nama Materi','required|max_length[128]');
        $this->form_validation->set_rules('desc','Deskripsi Tes','max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
           return validation_errors();
        }else{
            $materiinfo = array(
                'nama_materi'=>$_POST['materi'],
                'id_jenis'=>$_POST['tes'],
                'desc'=>$_POST['desc'],
                'date_added'=>date('Y-m-d H:i:s'));
            $query=$this->db->insert('tbl_materi',$materiinfo);
            if($query){
                return "ok";
            }else{
                return "penambahan data gagal";
            }
        }
        
    }else{
        return "materi sudah ada, silahkan edit";
    }
}

function editmateri(){

}

///////////////////// END CRUD MATERI /////////////////////////////

}



?>