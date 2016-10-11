<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends CI_Model {

    public function get_all()
    {
        //$sql = "select * from t_faq";
        $query = $this->db->get('t_faq');
       
        return $query->result() ;

    }
     public function get_by_id($question_id)
    {
       return $this->db->get_where('t_faq', array('FAQ_id' => $question_id)) -> row();

    }

    public function save_question($FAQ_title, $FAQ_content){
        $this -> db -> insert('t_faq', array(
            'FAQ_title' => $FAQ_title,
            'FAQ_content' => $FAQ_content
        ));
        return $this -> db -> affected_rows();
    }

    public function update_question($FAQ_id,$FAQ_title, $FAQ_content){
        $this -> db -> where('FAQ_id', $FAQ_id);
        $this -> db -> update('t_faq', array(
            'FAQ_title' => $FAQ_title,
            'FAQ_content' => $FAQ_content
        ));
        return $this -> db -> affected_rows();
    }

    public function delete_question($FAQ_id)
    {
        $this->db->delete('t_faq', array('FAQ_id' => $FAQ_id));
        return $this -> db -> affected_rows();

    }

}