<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bargin_model extends CI_Model {

    public function get_all()
    {
        //$sql = "select * from t_faq";
        $query = $this->db->get('t_bargin');

        return $query->result();

    }


    public function get_bargin_count()
    {
        return $this -> db -> count_all('t_bargin');
    }



    public function get_bargin_by_page($limit,$offset)
    {
        $this -> db -> order_by('add_time','desc');
        $query = $this -> db -> get('t_bargin',$limit,$offset);
        return $query->result();
    }

    public function save_bargin_by_all($title,$content,$photo_url)
    {
        $data = array(
            'bargin_title' => $title,
            'bargin_content' => $content,
            'bargin_img' => $photo_url
        );
        $this -> db -> insert('t_bargin',$data);
        return $this -> db -> affected_rows();
    }

    public function delete_by_id($id)
    {
        $this -> db -> delete('t_bargin', array('bargin_id' => $id));
        return $this -> db -> affected_rows();
    }


    public function get_by_id($id)
    {
        return $this -> db -> get_where('t_bargin',array('bargin_id' => $id)) -> row();
    }

    public function update_bargin_by_all($id,$title,$content,$photo_url)
    {

        $this -> db -> where('bargin_id', $id);
        $this -> db -> update('t_bargin', array(
            'bargin_title' => $title,
            'bargin_content' => $content,
            'bargin_img' => $photo_url,
        ));
        return $this -> db -> affected_rows();

    }











}