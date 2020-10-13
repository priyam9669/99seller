<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

function check_input(){
	$ci=& get_instance();
	if(!empty($ci->input->post())){
		$input=$ci->input->post();
	} elseif (!empty($ci->input->raw_input_stream){
		$input=$ci->input->raw_input_stream;
	}else{
		redirect('https://straydopt.web.app/');
	}
	return $input;
}



?>