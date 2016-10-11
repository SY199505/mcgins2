<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro_model extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->get('t_aboutUs');

        return $query->result();

    }


    public function update_intro($aboutUs_chn, $aboutUs_en){
        $this -> db -> where('aboutUs_id', 1);
        $this -> db -> update('t_aboutUs', array(
            'aboutUs_chn' => $aboutUs_chn,
            'aboutUs_en' => $aboutUs_en
        ));
        return $this -> db -> affected_rows();
    }
    public function update_intro_bg($intro_bg_url)
    {
        $this -> db -> where('aboutUs_id', 1);
        $this -> db -> update('t_aboutUs', array(
            'aboutUs_img' => $intro_bg_url
        ));
        return $this -> db -> affected_rows();
    }
}