<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carousel_model extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->get('t_index');

        return $query->result();

    }
    public function get_by_id($id)
    {
        return $this -> db -> get_where('t_index',array('index_id' => $id)) -> row();
    }
    public function update_carousel($id, $carousel_url)
    {

        $this -> db -> where('index_id', $id);
        $this -> db -> update('t_index', array(
            'index_carousel' => $carousel_url
        ));
        return $this -> db -> affected_rows();
    }
    public function update_feature_bg($feature_bg_url)
    {
        $this -> db -> where('index_id', 1);
        $this -> db -> update('t_index', array(
            'index_feature_bg' => $feature_bg_url
        ));
        return $this -> db -> affected_rows();
    }
    public function save_carousel($new_carousel)
    {
        $this -> db -> insert('t_index', array(
            'index_carousel' => $new_carousel
        ));
        return $this -> db -> affected_rows();
    }
    public function delete_carousel($carousel_id)
    {
        $this -> db -> delete('t_index', array('index_id'=>$carousel_id));
        return $this -> db -> affected_rows();
    }
}