<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Last_seen_m extends MY_Model {

	protected $_table_name = 'last_seen';
    protected $_primary_key = 'id';

    public function update_lastSeen($user=0)
	{
		$last_msg = $this->db->where('to', $user)->order_by('time', 'desc')->get('messages', 1)->row();
		$msg = !empty($last_msg) ? $last_msg->id : 0;

		$where = array('user_id'=> $user);
		$record = $this->get_by($where, TRUE);
		$details = array('user_id' => $user,'message_id' => $msg);
		if(empty($record))
		{
			$this->save($details);
		}else{
			$this->save($details, $record->id);
		}
	}

}

/* End of file Last_seen_m.php */
/* Location: ./application/modules/chat/models/Last_seen_m.php */