<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ridho_admin extends CI_Controller
{

  public function index()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('template/temp_admin/v_admin_header');
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar',$data);
    $this->load->view('admin/v_admin');
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
    $this->load->view('admin/v_kategori', $data);
    $this->load->view('template/temp_admin/v_admin_footer', $data);
  }

  public function masyarakat()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

    $this->load->view('template/temp_admin/v_admin_header', $data);
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar', $data);
    $this->load->view('admin/v_masyarakat', $data);
    $this->load->view('template/temp_admin/v_admin_footer', $data);
  }

  public function petugas()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    $data['petugas'] = $this->db->get('petugas')->result_array();

    $this->load->view('template/temp_admin/v_admin_header', $data);
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar', $data);
    $this->load->view('admin/v_petugas', $data);
    $this->load->view('template/temp_admin/v_admin_footer', $data);
  }

  public function pengaduan()
  {
    // $data['pengaduanad'] = $this->db->get('pengaduan')->result_array();
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('m_pengaduan');
    $data['pengaduann'] = $this->m_pengaduan->pengaduan()->result_array();
    $this->load->model('M_admin');
    $data['pengaduan'] = $this->M_admin->pengaduan()->result_array();

    $this->load->view('template/temp_admin/v_admin_header');
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar');
    $this->load->view('admin/v_pengaduan', $data);
    $this->load->view('template/temp_admin/v_admin_footer');
  }

  public function laporan()
  {
    $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('template/temp_admin/v_admin_header');
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar');
    $this->load->view('admin/v_laporan', $data);
    $this->load->view('template/temp_admin/v_admin_footer');
  }

  public function tambahkategori()
  {
    $kategori = $this->input->post('kategori');
    $data = array(
      'kategori' => $kategori,
    );
    $this->db->insert('kategori', $data);
    redirect('C_ridho_admin/kategori');
  }

  public function delete_kategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kategori');
    // $this->db->delete('sub_kategori');
    redirect('C_ridho_admin/kategori');
  }

  public function edit_kategori($id)
  {
    $kategori = $this->input->post('kategori');

    $update = array(
      'kategori' => $kategori,

    );

    $this->db->where('id', $id);
    $this->db->update('kategori', $update);
    redirect('C_ridho_admin/kategori');
  }

  public function tambahsubkategori()
  {
    $sub_kategori = $this->input->post('sub_kategori');
    $data = array(
      'sub_kategori' => $sub_kategori,
      'id_kategori' => $this->input->post('kategori')
    );
    $this->db->insert('sub_kategori', $data);
    redirect('C_ridho_admin/kategori');
  }

  public function delete_subkategori($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('sub_kategori');
    redirect('C_ridho_admin/kategori');
  }

  public function edit_subkategori($id)
  {
    $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
    $sub_kategori = $this->input->post('sub_kategori');

    $update = array(
      'sub_kategori' => $sub_kategori,

    );

    $this->db->where('id_subkategori', $id);
    $this->db->update('sub_kategori', $update);
    redirect('C_ridho_admin/kategori');
  }

  public function logout_admin()
  {
    $this->session->unset_userdata('Username');
    $this->session->unset_userdata('Password');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
    redirect('Auth/admin_login');
  }

  // public function tambahpetugas()
  //   {
  //       $data = [
  //           'username' => htmlspecialchars($this->input->post('username', true)),
  //           'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
  //           'level' => htmlspecialchars($this->input->post('level', true)),
  //           'telp' => htmlspecialchars($this->input->post('telp', true)),
  //           'password' => password_hash(
  //               $this->input->post('password1'),
  //               PASSWORD_DEFAULT
  //           ),
  //           'is_active' => 1,
  //           'level' => 3,
  //       ];
  //       $this->db->insert('petugas', $data);
  //       redirect('c_riddho_admin/petugas');
  //   }


  public function statusproses($id)

	{

		$data['user'] = $this->M_admin->userData($this->session->userData('username'))->row_array();
		$data['masyarakat'] = $this->M_admin->masyarakat()->result_array();
		$data['p'] = $this->M_admin->detail_pengaduan($id)->row_array();
		$data['petugas'] = $this->M_admin->petugas()->result_array();
		$data['tanggapanproses'] = $this->M_admin->tanggapanproses($id)->result_array();

		$this->load->view('template/temp_admin/v_admin_header', $data);
    $this->load->view('template/temp_admin/v_admin_sidebar', $data);
    $this->load->view('template/temp_admin/v_admin_topbar', $data);
		$this->load->view('admin/v_proses',$data);
		$this->load->view('template/temp_admin/v_admin_footer', $data);

	}

  public function upload_pengaduan($id_pengaduan){
		
		$data_petugas=$this->M_admin->userData($this->session->userData('username'))->row_array();

		$upload_data = array(

			'id_pengaduan'=>$id_pengaduan,
			'tgl_tanggapan'=>date('Y-m-d'),
			'tanggapan'=>$this->input->post('tanggapan'),
			'id_petugas'=>$data_petugas['id_petugas'],
		);

		$this->db->insert('tanggapan',$upload_data);
		$update=array(
			'status'=>$this->input->post('status'),
		);

		$this->db->where('id_pengaduan',$id_pengaduan);
		$this->db->update('pengaduan',$update);
		redirect('C_ridho_admin/pengaduan');

	}

  public function laporan_pdf(){

    $data['masyarakat'] = $this->db->get('masyarakat')->result_array();
    $data['petugas'] = $this->db->get('petugas')->result_array();
    $pengaduan = $this->m_pengaduan->pdf()->result_array();

    $data = array(
        "dataku" => array(
            "nama" => "Petani Kode",
            "url" => "http://petanikode.com"
        ),
        'pengaduan' => $pengaduan

    );

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan-petanikode.pdf";
    $this->pdf->load_view('laporan_pdf', $data);  


}

}
