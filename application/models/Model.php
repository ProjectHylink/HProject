<?php

class Model extends CI_Model
{

    public function AddData($tabel, $data = array())
    {
        $this->db->insert($tabel, $data);
    }

    public function UpdateData($tabel, $fieldid, $fieldvalue, $data = array())
    {
        $this->db->where($fieldid, $fieldvalue)->update($tabel, $data);
    }

    public function DeleteData($tabel, $fieldid, $fieldvalue)
    {
        $this->db->where($fieldid, $fieldvalue)->delete($tabel);
    }

    public function GetData($tabel)
    {
        $this->db->get($tabel);
    }
    public function GetDataWhere($tabel, $id, $nilai)
    {
        $this->db->where($id, $nilai);
        $query = $this->db->get($tabel);
        return $query;
    }
    // public function updateTabelTerkait($data)
    // {
    //     $this->db->where('email', $data['email']);
    //     $this->db->update('login', ['nama_pengguna' => $data['nama_pengguna']]);
    // }

    // function Is_already_register($id)
    // {
    //  $this->db->where('id', $id);
    //  $query = $this->db->get('login');
    //  if($query->num_rows() > 0)
    //  {
    //   return true;
    //  }
    //  else
    //  {
    //   return false;
    //  }
    // }

}
