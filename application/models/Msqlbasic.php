<?php 
class Msqlbasic extends CI_Model {

    function add_db($table_name,$data=array()){
        $this->db->insert($table_name, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_db($table_name,$where=array(),$data=array())
    {
        $this->db->where($where);
        $this->db->update($table_name, $data);
        return $this->db->affected_rows();
    }

    function show_db($table_name,$where=array()) {
        
        $this->db->select("*");
        $this->db->from($table_name);
        $this->db->where($where);
        
        $hasil = $this->db->get();
        $data = $hasil->result();

        return $data;
    }

    function row_db($table_name,$where=array()) {
        
        $this->db->select("*");
        $this->db->from($table_name);
        $this->db->where($where);
        
        $hasil = $this->db->get();
        $data = $hasil->row();

        return $data;
    }

    function delete_db($table_name,$where) {
        return $this->db->delete($table_name, $where);
    }
}
?>