<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dame_model extends CI_Model
{

    /**
     * Created by PhpStorm.
     * User: SunYue
     * Date: 2016/10/4
     * Time: 23:21
     */
    public function get_all()
    {
        //$sql = "select * from t_faq";
        $query = $this->db->get('t_dame');

        return $query->result();

    }
    public function update_chinese($chinese){
        $this -> db -> where('id', 1);
        $this -> db -> update('t_dame', array(
            'title' => $chinese
        ));
        return $this -> db -> affected_rows();
    }
    public function update_english($english){
        $this -> db -> where('id', 2);
        $this -> db -> update('t_dame', array(
            'title' => $english
        ));
        return $this -> db -> affected_rows();
    }

    public function update_course_chinese($chinese)
    {
        $this -> db -> where('id', 3);
        $this -> db -> update('t_dame', array(
            'title' => $chinese
        ));
        return $this -> db -> affected_rows();
    }
    public function update_course_english($english)
    {
        $this -> db -> where('id', 4);
        $this -> db -> update('t_dame', array(
            'title' => $english
        ));
        return $this -> db -> affected_rows();
    }
    public function update_course_title1($title1)
    {
        $this -> db -> where('id', 5);
        $this -> db -> update('t_dame', array(
            'title' => $title1
        ));
        return $this -> db -> affected_rows();
    }
    public function update_course_title2($title2)
    {
        $this -> db -> where('id', 6);
        $this -> db -> update('t_dame', array(
            'title' => $title2
        ));
        return $this -> db -> affected_rows();
    }
    public function update_course_title3($title3)
    {
        $this -> db -> where('id', 7);
        $this -> db -> update('t_dame', array(
            'title' => $title3
        ));
        return $this -> db -> affected_rows();
    }
    public function update_eight($eight){
        $this -> db -> where('id', 9);
        $this -> db -> update('t_dame', array(
            'title' => $eight
        ));
        return $this -> db -> affected_rows();
    }
    public function update_nine($nine){
        $this -> db -> where('id', 10);
        $this -> db -> update('t_dame', array(
            'title' => $nine
        ));
        return $this -> db -> affected_rows();
    }
    public function update_ten($ten){
        $this -> db -> where('id', 11);
        $this -> db -> update('t_dame', array(
            'title' => $ten
        ));
        return $this -> db -> affected_rows();
    }
    public function update_eleven($eleven){
        $this -> db -> where('id', 12);
        $this -> db -> update('t_dame', array(
            'title' => $eleven
        ));
        return $this -> db -> affected_rows();
    }
    public function update_twelve($twelve){
        $this -> db -> where('id', 13);
        $this -> db -> update('t_dame', array(
            'title' => $twelve
        ));
        return $this -> db -> affected_rows();
    }
    public function update_thirteen($thirteen){
        $this -> db -> where('id', 14);
        $this -> db -> update('t_dame', array(
            'title' => $thirteen
        ));
        return $this -> db -> affected_rows();
    }
    public function update_forteen($forteen){
        $this -> db -> where('id', 15);
        $this -> db -> update('t_dame', array(
            'title' => $forteen
        ));
        return $this -> db -> affected_rows();
    }
    public function update_fifteen($fifteen){
        $this -> db -> where('id', 16);
        $this -> db -> update('t_dame', array(
            'title' => $fifteen
        ));
        return $this -> db -> affected_rows();
    }
    public function update_sixteen($sixteen){
        $this -> db -> where('id', 17);
        $this -> db -> update('t_dame', array(
            'title' => $sixteen
        ));
        return $this -> db -> affected_rows();
    }
    public function update_seventeen($seventeen){
        $this -> db -> where('id', 18);
        $this -> db -> update('t_dame', array(
            'title' => $seventeen
        ));
        return $this -> db -> affected_rows();
    }
    public function update_eighteen($eighteen){
        $this -> db -> where('id', 19);
        $this -> db -> update('t_dame', array(
            'title' => $eighteen
        ));
        return $this -> db -> affected_rows();
    }
    public function update_ninteen($ninteen){
        $this -> db -> where('id', 20);
        $this -> db -> update('t_dame', array(
            'title' => $ninteen
        ));
        return $this -> db -> affected_rows();
    }
}