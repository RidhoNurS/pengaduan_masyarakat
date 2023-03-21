<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			// Gagal validasi
			$data['title'] = 'Login';
			$this->load->view('template/auth_header');
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {

			// Lolos validasi
			$this->_login();
		}
	}

	private function _login()
	{
		$nik = $this->input->post('nik');
		$password = $this->input->post('password');

		$masyarakat = $this->db->get_where('masyarakat', ['nik' => $nik])->row_array();

		// var_dump($masyarakat);
		// jika usernya ada
		if ($masyarakat) {
			// jika usernya aktif

			// cek password
			if (password_verify($password, $masyarakat['password'])) {
				$data = [
					'nik' => $masyarakat['nik'],		
					'username' => $masyarakat['username'],
					'name' => $masyarakat['name']
				];	
				$this->session->set_userdata($data);
				redirect('Home');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> username is not register </div>');
			redirect('Auth');
		}
	}


	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/auth_header');
			$this->load->view('auth/registration');
			$this->load->view('template/auth_footer');
		} else {
			$data = array(
				'name' => htmlspecialchars($this->input->post('name', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'telp' => htmlspecialchars($this->input->post('telp', true)),

			);

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! your account has been created. Please login</div>');
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('password');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logout !
		  	</div>');
		redirect('Auth');
	}

	public function admin_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/admin_login');
			$this->load->view('template/auth_footer');
		} else {
			// validasinya success
			$this->_login_admin();
		}
	}

	private function _login_admin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('petugas', ['username' => $username])->row_array();


		// jika usernya aktif

		// cek password
		if (password_verify($password, $user['password'])) {
			$data = [
				'username' => $user['username'],
				'level' => $user['level']
			];
			$this->session->set_userdata($data);
			if ($user['level'] == 'admin') {
				redirect('C_ridho_admin'); //admin
			} else if ($user['level'] == 'petugas') {
				redirect('C_ridho_petugas');
			} else {
				redirect('C_ridho_masyarakat');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
			redirect('auth/admin_login');
		}
	}


	public function admin_register()
	{

		$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		// $this->form_validation->set_rules('level', 'Level', 'required|trim');




		if ($this->form_validation->run() == false) {
			$data['title'] = 'Register';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/admin_registration');
			$this->load->view('template/auth_footer');
		} else {
			$data = array(
				'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'telp' => htmlspecialchars($this->input->post('telp', true)),
				'level' => 2,

			);


			$this->db->insert('petugas', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! your account has been created. Please login</div>');
			redirect('Auth/admin_login');
		}
	}

	public function landingpage(){
			$this->load->view('landingpage');
	}
}
