<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_model extends CI_Model {

    public function get_all()
    {
        //$sql = "select * from t_faq";
        $query = $this->db->get('t_activity');
       
        return $query->result();

    }
    

    public function get_news_count()
    {
        return $this -> db -> count_all('t_activity');
    }



    public function get_news_by_page($limit,$offset)
    {
        $this -> db -> order_by('add_time','desc');
        $query = $this -> db -> get('t_activity',$limit,$offset);
        return $query->result();
    }

    public function save_news_by_all($title,$content,$photo_url)
    {
         $data = array(
            'activity_title' => $title,
            'activity_content' => $content,
            'activity_img' => $photo_url
        );
        $this -> db -> insert('t_activity',$data);
        return $this -> db -> affected_rows();
    }

     public function delete_by_id($id)
     {
        $this -> db -> delete('t_activity', array('activity_id' => $id));
        return $this -> db -> affected_rows();
     }


     public function get_by_id($id)
     {
        return $this -> db -> get_where('t_activity',array('activity_id' => $id)) -> row();
     }

     public function update_news_by_all($id,$title,$content,$photo_url)
     {

        $this -> db -> where('activity_id', $id);
        $this -> db -> update('t_activity', array(
            'activity_title' => $title,
            'activity_content' => $content,
            'activity_img' => $photo_url,
        ));
        return $this -> db -> affected_rows();

     }











}