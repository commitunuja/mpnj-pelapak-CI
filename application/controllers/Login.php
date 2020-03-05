<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('pelapak/login');
	}
	public function cek_login()
	{
		$user = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        $users = $this->db->where(['username'=>$user, 'password'=>$pass])->get('pelapak');
        if($users->num_rows() > 0){
            $d = $users->row_array();
			$data = [
				'id_pelapak'=>$d['id_pelapak'],
				'username'=>$d['username'],
				'nama_toko'=>$d['nama_toko'],
				'status'=>'pelapak'
			];
			$this->session->set_userdata($data);
			$this->session->set_flashdata('berhasil', '<script>alert("Selamat Datang !")</script>');
			redirect('pelapak');
        }else{
            $this->session->set_flashdata('berhasil', '<script>alert("Username atau Password salah !")</script>');
            redirect('/');
        }
	}

	public function logout(){
		$this->session->sess_destroy();
        $this->session->set_flashdata('berhasil', '<script>alert("Anda, berhasil keluar ! ")</script>');
        redirect('/');
	}
}
