<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';


class Api extends REST_Controller {


	public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->load->model('ApiModel');
    }

    


	function user_post()
	{
		if(!empty($this->input->post())){
			$p=$this->input->post();
			//echo '<pre>'; print_r($p); exit;
			if(!empty($p['email']) && !empty($p['user_id']) ){
				$user_exits=$this->db->select('*')->from('user_guest_info')->where('guest_id ',$p['guest_id '])->get()->row();
				if($user_exits){
					// $data['displayName']=$p['displayName'];					
					// $data['photoURL']=$p['photoURL'];
					$data=$p;
					$done=$this->db->where('user_id',$user_exits->user_id)->update('users',$data);
					if($done){
						$res['status']='1';
						$res['message']="Logged In Succesfully!";
					}


				}else{
					// $data['user_id']=$p['user_id'];
					// $data['displayName']=$p['displayName'];					
					// $data['photoURL']=$p['photoURL'];
					// $data['email']=$p['email'];
					// $data['type_of_user']=$p['type_of_user'];
					$data=$p;

					$done=$this->db->insert('users',$data);
					if($done){
						$res['status']='1';
						$res['message']="Account Created Succesfully!";
					}
				}

			}else{
				$res['status']='0';
				$res['message']="Missing Inputs!";
			}
		}else{
				$res['status']='0';
				$res['message']="No Inputs!";
		}
		 $this->response($res);
	}



	
	
      
}
