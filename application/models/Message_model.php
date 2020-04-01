<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends MY_Model
{
	public function __construct()
	{
        $this->table = 'tbl_messages';
        $this->primary_key = 'id';
        $this->return_as =  'array';

		parent::__construct();
	}
 
	

}
/* End of file '/Message_model.php' */
/* Location: ./application/models//Message_model.php */