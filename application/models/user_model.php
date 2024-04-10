<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database library
    }

    //Check Exist
    function role_exists($key)
    {
        $this->db->where('number', $key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Function to add a new user
    public function add_user($data)
    {

        if ($this->role_exists($data['number']) == false) {
            return $this->db->insert('users', $data);
        } else {
            return $result = 'unsuccess';
        }
    }

    // Function to verify user credentials
    public function verify_user($number, $password)
    {
        // $query = $this->db->get_where('users', array('number' => $number, 'password' => $password));
        // print_r($query);
        // exit();
        // return $query->row_array();

        $condition = "number =" . "'" . $number . "' AND " . "password =" . "'" . $password . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) 
        {
            return true;
        } else 
        {  
            return false;
        }
    }
}
