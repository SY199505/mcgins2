<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav_model extends CI_Model {

    public function get_all()
    {
        $query = $this->db->get('t_nav');

        return $query->result() ;

    }

    public function update_show($id,$isShow)
    {
    	$this -> db -> where('nav_id', $id);
        $this -> db -> update('t_nav', array(
            'isShow' => $isShow
        ));
        return $this -> db -> affected_rows();
    }

    // public function get_by_id($course_id)
    // {
    //    return $this->db->get_where('t_course', array('id' => $course_id)) -> row();

    // }

    // public function save_course($levels, $age, $courses, $intro){
    //     $this -> db -> insert('t_course', array(
    //         'levels' => $levels,
    //         'age' => $age,
    //         'courses' => $courses,
    //         'intro' => $intro
    //     ));
    //     return $this -> db -> affected_rows();
    // }

    // public function update_course($course_id,$levels, $age, $courses, $intro){
    //     $this -> db -> where('id', $course_id);
    //     $this -> db -> update('t_course', array(
    //         'levels' => $levels,
    //         'age' => $age,
    //         'courses' => $courses,
    //         'intro' => $intro
    //     ));
    //     return $this -> db -> affected_rows();
    // }

    // public function delete_course($course_id)
    // {
    //     $this->db->delete('t_course', array('id' => $course_id));
    //     return $this -> db -> affected_rows();

    // }
}