<?php

class M_admin extends CI_Model

{
   public function userData($username)
   {
      return $this->db->get_where('petugas', ['username' => $username]);
   }

   public function tambah_kategori($add)
   {
      $this->db->insert('kategori', $add);
   }

   public function kategori()
   {
      return $this->db->get('kategori');
   }


   public function subkategori()
   {
      $this->db->select("*");
      $this->db->from('sub_kategori');
      $this->db->join('kategori', 'kategori.id=subkategori.id_kategori');
      return $this->db->get();
   }

   function insertpengaduan($data)
   {
      $this->db->insert('pengaduan', $data);
   }

   public function masyarakat()
   {
      return $this->db->get('masyarakat');
   }

   public function suspendmasyarakat($suspendmasyarakat)
   {
      $this->db->update('masyarakat', $suspendmasyarakat);
   }

   public function unsuspendmasyarakat($unsuspendmasyarakat)
   {
      $this->db->update('masyarakat', $unsuspendmasyarakat);
   }

   public function petugas()
   {
      return $this->db->get('petugas');
   }

   public function editpetugas($update)
   {
      return $this->db->update('petugas', $update);
   }


   public function suspendpetugas($suspend)
   {
      $this->db->update('petugas', $suspend);
   }

   public function unsuspendpetugas($unsuspend)
   {
      $this->db->update('petugas', $unsuspend);
   }

   function insertpetugas($data)
   {
      $this->db->insert('petugas', $data);
   }

   function pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('kategori', 'kategori.id=pengaduan.id_kategori');
        $this->db->join('sub_kategori','sub_kategori.id_subkategori=pengaduan.id_subkategori');
        $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
        $this->db->where('id_pengaduan');
        return $this->db->get();
    }
   
   
   
   function detail_pengaduan($id)
   {
      $this->db->select('*');
      $this->db->from('pengaduan');
      $this->db->join('masyarakat', 'masyarakat.nik=pengaduan.nik');
      $this->db->join('kategori', 'kategori.id=pengaduan.kategori');
      $this->db->join('sub_kategori','sub_kategori.id_subkategori=pengaduan.subkategori');
      $this->db->where('id_pengaduan',$id);
      return $this->db->get();     
   }


   public function tanggapanproses($id)
   {
      $this->db->select('*');
      $this->db->from('tanggapan');
      $this->db->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
      $this->db->where('id_pengaduan',$id);
      return $this->db->get();     
   }
}
