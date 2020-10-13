<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ApiModel extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("session");
        $this->load->helper('string');
    }

    

     function get_num_rows($table,$condition){
        $this->db->select('*');
        $this->db->where($condition);
       return  $this->db->get($table)->num_rows();
    }


    function get_result($table,$condition){
        $this->db->select('*');
        $this->db->where($condition);
       return  $this->db->get($table)->result();
    }






    


}


?>