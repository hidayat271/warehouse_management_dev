<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller {

	protected $smiley_url = 'assets/img/smileys';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('last_seen_m', 'model_last_seen');
		$this->load->model('message_m', 'model_message');
		$this->load->model('employees/employees_m', 'model_employees');
		$this->load->helper('smiley');

		$this->smiley_url = base_url('assets/img/smileys');
	}

	public function tes()
	{
		
		$this->data['content'] = "chat_tes";
		$this->load->view('template/_main_page_template', $this->data);
	}

	public function messages(){
		//get paginated messages 
		$per_page = 5;
		$user 		= $this->session->userdata('account')['id'];;
		$buddy 		= $this->input->post('user');
		$limit 		= isset($_POST['limit']) ? $this->input->post('limit') : $per_page ;

		$messages 	= array_reverse($this->model_message->conversation($user, $buddy, $limit));
		$total 		= $this->model_message->thread_len($user, $buddy);

		$thread = array();
		foreach ($messages as $message) {
			$owner = $this->model_employees->get($message->from);
			$chat = array(
				'msg' 		=> $message->id,
				'sender' 	=> $message->from, 
				'recipient' => $message->to,
				'avatar' 	=> $owner->avatar != '' ? $owner->avatar : 'no-image.jpg',
				'body' 		=> parse_smileys($message->message, $this->smiley_url),
				'time' 		=> date("M j, Y, g:i a", strtotime($message->time)),
				'type'		=> $message->from == $user ? 'out' : 'in',
				'name'		=> $message->from == $user ? 'You' : ucwords($owner->firstname)
				);
			array_push($thread, $chat);
		}

		$chatbuddy = $this->model_employees->get($buddy);

		$contact = array(
			'name'=>ucwords($chatbuddy->firstname.' '.$chatbuddy->lastname),
			'status'=>$chatbuddy->online,
			'id'=>$chatbuddy->id,
			'limit'=>$limit + $per_page,
			'more' => $total  <= $limit ? false : true, 
			'scroll'=> $limit > $per_page  ?  false : true,
			'remaining'=> $total - $limit
			);


		$response = array(
					'success' => true,
					'errors'  => '',
					'message' => '',
					'buddy'	  => $contact,
					'thread'  => $thread
					);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}

	public function save_message(){
		$logged_user = $this->session->userdata('account')['id'];;
		$buddy 		= $this->input->post('user');
		$message 	= $this->input->post('message');
		if($message != '' && $buddy != '')
		{
			$msg_id = $this->model_message->save(array(
						'from' 		=> $logged_user,
						'to' 		=> $buddy,
						'message' 	=> $message,
						'message' 	=> $message,
					), NULL);
			$msg = $this->model_message->get($msg_id);

			$owner = $this->model_employees->get($msg->from);
			$chat = array(
				'msg' 		=> $msg->id,
				'sender' 	=> $msg->from, 
				'recipient' => $msg->to,
				'avatar' 	=> $owner->avatar != '' ? $owner->avatar : 'no-image.jpg',
				'body' 		=> parse_smileys($msg->message, $this->smiley_url),
				'time' 		=> date("M j, Y, g:i a", strtotime($msg->time)),
				'type'		=> $msg->from == $logged_user ? 'out' : 'in',
				'name'		=> $msg->from == $logged_user ? 'You' : ucwords($owner->firstname)
				);

			$response = array(
				'success' => true,
				'message' => $chat 	  
				);
		}
		else{
			  $response = array(
				'success' => false,
				'message' => 'Empty fields exists'
				);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}

	public function updates(){
	    $new_exists = false;
		$user_id 	= $this->session->userdata('account')['id'];;
		$last_seen  = $this->model_last_seen->get_by('user_id', $user_id);
		$last_seen  = empty($last_seen) ? 0 : $last_seen->message_id;
		$exists = $this->model_message->latest_message($user_id, $last_seen);
		//echo $exists;
		if($exists){
			$new_exists = true;
		}
		// THIS WHOLE SECTION NEED A GOOD OVERHAUL TO CHANGE THE FUNCTIONALITY
	    if ($new_exists) {
	        $new_messages = $this->model_message->unread($user_id);
			$thread = array();
			$senders = array();
			foreach ($new_messages as $message) {
				if(!isset($senders[$message->from])){
					$senders[$message->from]['count'] = 1; 
				}
				else{
					$senders[$message->from]['count'] += 1; 
				}
				$owner = $this->model_employees->get($message->from);
				$chat = array(
					'msg' 		=> $message->id,
					'sender' 	=> $message->from, 
					'recipient' => $message->to,
					'avatar' 	=> $owner->avatar != '' ? $owner->avatar : 'avatar.png',
					'body' 		=> parse_smileys($message->message, $this->smiley_url),
					'time' 		=> date("M j, Y, g:i a", strtotime($message->time)),
					'type'		=> $message->from == $user_id ? 'out' : 'in',
					'name'		=> $message->from == $user_id ? 'You' : ucwords($owner->firstname)
					);
				array_push($thread, $chat);
			}

			$groups = array();
			foreach ($senders as $key=>$sender) {
				$sender = array('user'=> $key, 'count'=>$sender['count']);
				array_push($groups, $sender);
			}
			// END OF THE SECTION THAT NEEDS OVERHAUL DESIGN
			$this->model_last_seen->update_lastSeen($user_id);

			$response = array(
				'success' => true,
				'messages' => $thread,
				'senders' =>$groups
			);

			//add the header here
			header('Content-Type: application/json');
			echo json_encode( $response );
	    } 
	}

}

/* End of file Chat.php */
/* Location: ./application/modules/chat/controllers/Chat.php */