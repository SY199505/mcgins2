<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends CI_Model {

    public function get_all()
    {
        $query = $this->db->get('t_job');
       
        return $query->result() ;

    }

    public function get_by_id($job_id)
    {
       return $this->db->get_where('t_job', array('job_id' => $job_id)) -> row();

    }

    public function save_job($title, $content){
        $this -> db -> insert('t_job', array(
            'job_title' => $title,
            'job_content' => $content,
        ));
        return $this -> db -> affected_rows();
    }

    public function update_job($id,$title, $content){
        $this -> db -> where('job_id', $id);
        $this -> db -> update('t_job', array(
            'job_title' => $title,
            'job_content' => $content,
        ));
        return $this -> db -> affected_rows();
    }

    public function delete_job($id)
    {
        $this->db->delete('t_job', array('job_id' => $id));
        return $this -> db -> affected_rows();

    }

    // public function update_job($job)
    // {
    //     $this -> db -> where('job_id', 1);
    //     $this -> db -> update('t_job', array(
            
    //     ));
    // }
}