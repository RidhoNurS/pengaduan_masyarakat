<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kategori extends CI_Model {

    public function kategori()
    {
        $this->db->select('*');
        $this->db->FROM('sub_kategori');
        $this->db->JOIN('kategori','kategori.id=sub_kategori.id_kategori');
        return $this->db->get();
    }
    public function sub_kategori()
    {
        $this->db->select('*');
        $this->db->FROM('sub_kategori');
        $this->db->JOIN('kategori','kategori.id=sub_kategori.id_kategori');
        return $this->db->get();
    }

}