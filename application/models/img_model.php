<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Img_model extends CI_Model {

    public function get_all()
    {
        //$sql = "select * from t_faq";
        $query = $this->db->get('t_img');

        return $query->result() ;

    }

    public function get_by_id($id)
    {
        $data = array(
            'img_id' => $id
        );

        $query = $this -> db -> get_where('t_img',$data);
        return $query -> row() ;
    }

    public function save_team($type, $name, $photo_url, $desc){
        $this -> db -> insert('t_img', array(
            'type' => $type,
            'name' => $name,
            'img' => $photo_url,
            'desc' => $desc
        ));
        return $this -> db -> affected_rows();
    }

    public function updata_by_all($id,$title,$desc,$photo_url)
    {
        $data = array(
            'img_title' => $title,
            'img_desc' => $desc,
            'img_src' => $photo_url
        );

        $this -> db -> where('img_id', $id);
        $this -> db -> update('t_img', $data);
        $row = $this -> db -> affected_rows();
        return $row;

    }


    public function delete_team($id)
    {
        $this->db->delete('t_img', array('id' => $id));
        return $this -> db -> affected_rows();

    }

}