<?php 
class Location_model extends CI_Model{
	function get_prefecture(){
        $this->db->where('parent_id', '0');
        $this->db->where('location_type', 'Prefecture');
        $query = $this->db->get('tbl_location');
        return $query->result();
    }

    function get_city($parent_id){
        $this->db->where('parent_id', $parent_id);
        $this->db->where('location_type', 'City');
        $query = $this->db->get('tbl_location');
        return $query->result();
    }

    function get_city_by_id($city_id){
        $this->db->where('location_id', $city_id);
        $this->db->where('location_type', 'City');
        $query = $this->db->get('tbl_location');
        return $query->row('location_name');
    }

    function get_prefectures(){
        $this->db->where('parent_id', '0');
        $this->db->where('location_type', 'Prefecture');
        $query = $this->db->get('tbl_location2');
        return $query->result();
    }

    function get_cities($parent_id){
        $this->db->where('parent_id', $parent_id);
        $this->db->where('location_type', 'City');
        $query = $this->db->get('tbl_location2');
        return $query->result();
    }

}