
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pengaduan extends CI_Model {function pdf()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id=pengaduan.id_kategori');
        $this->db->join('sub_kategori', 'sub_kategori.subkategori_id=pengaduan.id_subkategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }
}