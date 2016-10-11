<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_model extends CI_Model {

    public function get_all()
    {
        $query = $this->db->get('t_features');
       
        return $query->result() ;

    }

    public function get_by_id($index_id)
    {
        //return $this->db->get_where('t_features', array('features_id' => $index_id)) -> row();
        $data = array(
            'features_id' => $index_id
        );

        $query = $this -> db -> get_where('t_features',$data);
        return $query -> row() ;
    }

    public function update_index($features_id, $features_title_chn, $features_chn, $features_title_en, $features_en, $icon_url){
        $this -> db -> where('features_id', $features_id);
        $this -> db -> update('t_features', array(
            'features_title_chn' => $features_title_chn,
            'features_chn' => $features_chn,
            'features_title_en' => $features_title_en,
            'features_en' => $features_en,
            'features_picture' => $icon_url
        ));
        return $this -> db -> affected_rows();
    }

    public function delete_index($index_id)
    {
        $this->db->delete('t_features', array('features_id' => $index_id));
        return $this -> db -> affected_rows();

    }

    public function save_index($features_title_chn, $features_chn, $features_title_en, $features_en){
        $this -> db -> insert('t_features', array(
            'features_title_chn' => $features_title_chn,
            'features_chn' => $features_chn,
            'features_title_en' => $features_title_en,
            'features_en' => $features_en,
        ));
        return $this -> db -> affected_rows();
    }
}