<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ridho_petugas extends CI_Controller
{
  
    public function index()
    {
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/temp_admin/v_admin_header');
        $this->load->view('template/temp_admin/v_admin_sidebar',$data);
        $this->load->view('template/temp_admin/v_admin_topbar');
        $this->load->view('petugas/v_dashboard', $data);
        $this->load->view('template/temp_admin/v_admin_footer');
    }

    
  public function kategori()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    $data['kategori'] = $this->db->get('kategori')->result_array();
    $this->load->model('m_kategori');
    $data['sub_kategori'] = $this->m_kategori->sub_kategori()->result_array();
    $this->load->model('m_kategori');

    $this->load->view('template/temp_admin/v_admin_header', $data);
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar', $data);
    $this->load->view('petugas/v_kategori', $data);
    $this->load->view('template/temp_admin/v_admin_footer', $data);
  }

  public function masyarakat()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

    $this->load->view('template/temp_admin/v_admin_header', $data);
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar', $data);
    $this->load->view('petugas/v_masyarakat', $data);
    $this->load->view('template/temp_admin/v_admin_footer', $data);
  }

  public function petugas()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    $data['petugas'] = $this->db->get('petugas')->result_array();

    $this->load->view('template/temp_admin/v_admin_header', $data);
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar', $data);
    $this->load->view('petugas/v_petugas', $data);
    $this->load->view('template/temp_admin/v_admin_footer', $data);
  }

  public function pengaduan()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('m_pengaduan');
    $data['pengaduanad'] = $this->m_pengaduan->pengaduan()->result_array();
    $this->load->model('m_pengaduan');

    $this->load->view('template/temp_admin/v_admin_header');
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar');
    $this->load->view('petugas/v_pengaduan', $data);
    $this->load->view('template/temp_admin/v_admin_footer');
  }

  public function laporan()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('template/temp_admin/v_admin_header');
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar');
    $this->load->view('petugas/v_laporan', $data);
    $this->load->view('template/temp_admin/v_admin_footer');
  }

}
