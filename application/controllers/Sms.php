<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Sms extends RestController  {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		$this->load->model('Message_model','messages');
	}
	
	public function index_post()
	{
		$mobile_no = $this->post( 'MobileNo' );
		$mensahe = $this->post( 'Message' ) ;
		if(empty($mobile_no) || empty($mensahe) ){
			$this->response( [
				'success' => false,
				'message' => 'Mobile number and message is required.'
			],   400   );
			die();
		}
		$client = new nusoap_client(config_item('api_url'), true);
		$client->soap_defencoding = 'UTF-8';
		$client->decode_utf8 = FALSE;

		// Calls
		$action = "sendMessage";
		$data = ['UserName'	=>	config_item('api_user'),
				'PassWord'	=>	config_item('api_password'),
				'MobileNo'	=>	$mobile_no,
				'Message'	=>	$mensahe];

		$result = $client->call($action, $data);
		$status = isset($result);
		if($status){
			$this->messages->insert([
				'message'=>$mensahe,
				'sent_to'=>$mobile_no,
				'status'=>1,
				'created_at'=>date('Y-m-d h:i:s')	
			]);
		}
		$this->response( [
			'success' => $status,
			'message' => $status ? $result :  'Message sending failed.'
		], $status ? 201 : 304 );
	}

	public function index_get(){
		$client = new nusoap_client(config_item('api_url'), true);
		$client->soap_defencoding = 'UTF-8';
		$client->decode_utf8 = FALSE;
		
		$action = "getLatestCRGQueries";
		$data = ['UserName'	=>	config_item('api_user'),
				'PassWord'	=>	config_item('api_password'),
				'WSID'	=>	0];
		$result = $client->call($action, $data);
		$status = isset($result);

		$this->response( $result , $status ? 200 : 404 );
	}
 
}
