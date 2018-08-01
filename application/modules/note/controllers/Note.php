<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 7:35 PM
 */

class Note extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('note_m','model_note');
    }

    function proses($id = NULL){
        $data['content'] = $this->input->post('valuenote');
        $data['for_user'] = 13;
        $this->model_note->save($data, $id);
    }

    function get_data(){
        $where = array('for_user'=>13);
        $this->data['notes'] = $this->model_note->get_by($where);
        echo $this->load->view('note_list', $this->data, TRUE);
    }

    function delete(){
        foreach ($_POST['note_id'] as $id) {
            $this->model_note->delete($id);
        }
    }
}