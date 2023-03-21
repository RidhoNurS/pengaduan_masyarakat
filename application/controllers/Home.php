<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation','upload');
	}

	public function userData($username)
	{
	   return $this->db->get_where('petugas', ['username' => $username]);
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('template/v_home_header');
		$this->load->view('template/v_home_sidebar');
		$this->load->view('template/v_home_topbar');
		$this->load->view('dashboard',$data);
		$this->load->view('template/v_home_footer');
	}

	public function pengaduan()
	{
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        // $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
		$data['kategori']=$this->db->get('kategori')->result_array();
        $data['sub_kategori']=$this->db->get('sub_kategori')->result_array();
		

		$this->load->model('m_pengaduan');
		$data['pengaduan2'] = $this->m_pengaduan->pengaduan()->result_array();
		// $this->load->model('m_pengaduan');

		$this->load->view('template/v_home_header', $data);
		$this->load->view('template/v_home_sidebar', $data);
		$this->load->view('template/v_home_topbar', $data);
		$this->load->view('pengaduan', $data);
		$this->load->view('template/v_home_footer', $data);
	}

	public function isipengaduan()
	{
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		// $kategori = $this->input->post('kategori');
		$user= $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$tgl_pengaduan = $this->input->post('tgl_pengaduan');
		$isi_laporan = $this->input->post('isi_laporan');

		// upload file
		$config['upload_path']          = './assets/uploads/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		
        $this->upload->initialize($config);

		$this->upload->do_upload('foto');
		$upload_img = $this->upload->data('file_name');

		$data = array(
			'nik'=>$user['nik'],
			'id_kategori'=>$this->input->post('kategori'),
			'tgl_pengaduan' => $tgl_pengaduan,
			'isi_laporan' => $isi_laporan,
			'tgl_pengaduan' => date("Y-m-d"),
			'foto' => $upload_img,
		); 
		
		$this->db->insert('pengaduan', $data);
		redirect('Home/pengaduan');
	}

	public function insertpengaduan()
    {
        $data = [
            'nik' => $this->session->userdata('nik'),
            'id_subkategori' => $this->input->post('subkategori'),
            'tgl_pengaduan' => date("Y-m-d"),
            'isi_laporan' => $this->input->post('isi'),
            'foto' => $this->input->post('foto'),
            'status' => 0
        ];

        $this->mdl_Home->insertpengaduan($data);
        $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert"> Berhasil ditambahkan! </div>');
        redirect('pengaduan');
    }

    public function get_sub_kategori()
    {
        $id_kategori = $this->input->post('id');
        $sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();
        echo json_encode($sub_kategori);
    }
}
