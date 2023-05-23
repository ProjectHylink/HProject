<?php
class MLogin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GoLogin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query;
    }

    public function getUserByEmail($email)
    {
        // Lakukan query ke database untuk mendapatkan data pengguna berdasarkan email
        $query = $this->db->get_where('login', array('email' => $email));
        return $query->row_array();
    }

}
