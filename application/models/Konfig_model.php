<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Konfig_model (Login Model)
 * Konfig model class fungsi standard  
 * @author : sukasapi
 * @version : 1.0
 * @since : 20 November 2016
 */
class Konfig_model extends CI_Model
{
    

    public function dolog($pesan = null){

        $datalog=array(
            'who_log'=>$_SESSION['userId'],
            'what_log'=>$pesan,
            'auth_log'=>$_SESSION['roleText'],
            'when_log'=>date('Y-m-d H:i:s'));
        $this->db->insert('tbl_log',$datalog);
    }

    public function uploadImage($productname){
        $config['upload_path']          = FCPATH.'assets/images/product/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = $productname.".jpg";
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                return $productname;
            }else{
                $errors = array('error' => $this->upload->display_errors());
                return $errors;
            }        

        }

    function resize($image){
        
        // Create thumnail or resize image
			$thumb['image_library'] = 'gd2';
			$thumb['source_image'] = FCPATH."assets/images/product/".$image.".jpg";
			$thumb['new_image'] = FCPATH."assets/images/thumb/".$image.".jpg"; // path where you want to save thumnail
			$thumb['create_thumb'] = FALSE;
			$thumb['maintain_ratio'] = TRUE;
			$thumb['width']         = 150;
            $this->load->library('image_lib', $thumb);
            if( $this->image_lib->resize()){
                return $image;
            }else{
                $errors = array('error' => $this->image_lib->display_errors());
                return $errors;
            }
    }

    /////FUNGSI UNTUK MENGGANTI PASSWORD////////
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);
        
        return $this->db->affected_rows();
    }
 
}

?>