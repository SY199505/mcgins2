<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function get_all()
    {
        $query = $this->db->get('t_webinfo');
       	
        return $query->result();

    }

    public function update_contact($id, $tel, $mail, $website, $phone, $wechat, $addr, $QR_url, $longitude, $latitude){
        $this -> db -> where('webinfo_id', $id);
        $this -> db -> update('t_webinfo', array(
            'webinfo_tel' => $tel,
            'webinfo_mail' => $mail,
            'webinfo_website' => $website,
            'webinfo_phone' => $phone,
            'webinfo_wechat' => $wechat,
            'webinfo_addr' => $addr,
            'webinfo_QR' => $QR_url,
            'webinfo_longitude' => $longitude,
            'webinfo_latitude' => $latitude
        ));
        return $this -> db -> affected_rows();
    }

    // public function update_contact($tel, $mail, $website, $phone, $wechat, $addr)
    // {
    // 	$this -> db -> where('webinfo_id', 1);
    // 	$this -> db -> update('t_webinfo', array(
    //         'webinfo_tel' => $tel,
    //         'webinfo_mail' => $mail,
    //         'webinfo_website' => $website,
    //         'webinfo_phone' => $phone,
    //         'webinfo_wechat' => $wechat,
    //         'webinfo_addr' => $addr
    // 	));
    // 	return $this -> db -> affected_rows();
    // }
}