<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelapak extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('status') != 'pelapak'){
			$this->session->set_flashdata('berhasil', '<script>alert("Silahkan login dulu ! ")</script>');
			redirect('/');
		}
	}
	public function index()
	{
		$this->load->view('pelapak/header');
		$this->load->view('pelapak/home');
		$this->load->view('pelapak/footer');
	}
	



	//produk
	public function produk()
	{
		$data['produk'] = $this->db->where('pelapak_id', $this->session->userdata('id_pelapak'))->order_by('id_produk', 'DESC')->get('produk');
		$this->load->view('pelapak/header');
		$this->load->view('pelapak/produk', $data);
		$this->load->view('pelapak/footer');
	}
	public function tambah_produk(){
		$data = [
			'nama_produk'=>$this->input->post('nama_produk'),
			'slug'=>slug($this->input->post('nama_produk')),
			'satuan'=>$this->input->post('satuan'),
			'berat'=>$this->input->post('berat'),
            'harga_modal'=>$this->input->post('harga_modal'),
            'harga_jual'=>$this->input->post('harga_jual'),
            'diskon'=>$this->input->post('diskon'),
			'stok'=>$this->input->post('stok'),
			'keterangan'=>$this->input->post('keterangan'),
			'kategori_produk_id'=>$this->input->post('kategori_produk_id'),
			'pelapak_id'=>$this->session->userdata('id_pelapak'),
			'tipe_produk'=>$this->input->post('tipe_produk'),
		];
		$tambah = $this->db->insert('produk', $data);
		if($tambah){
			$this->session->set_flashdata('berhasil', '<script>alert("Berhasil Membuat Produk Baru ! ")</script>');
			redirect('pelapak/produk');
		}else{
			$this->session->set_flashdata('berhasil', '<script>alert("Terjadi error, silahkan coba lagi ! ")</script>');
			redirect('pelapak/produk');
		}
	}
	

	public function hapus_produk($id){
		$hapus = $this->db->where('id_produk', $id)->from('produk')->delete();
		$foto = $this->db->where('produk_id', $id)->get('foto_produk');
		if($foto->num_rows() > 0){
			foreach ($foto->result() as $f) {
				unlink('./asset/foto_produk/'.$f->foto_produk);
			}
		}
		$this->db->where('produk_id', $id)->delete('foto_produk');

		if($hapus){
			$this->session->set_flashdata('berhasil', '<script>alert("Produk telah dihapus ! ")</script>');
			redirect('pelapak/produk');
		}else{
			$this->session->set_flashdata('berhasil', '<script>alert("Terjadi Error, silahkan coba lagi ! ")</script>');
			redirect('pelapak/produk');
		}
	}

	public function update_produk($id){

	}

	public function tambah_foto($id){
		
		$config['upload_path']          = './asset/foto_produk/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['max_size'] 			= 5000; // max_size in kb
		$config['encrypt_name'] = true;

		$this->upload->initialize($config);

		$this->upload->do_upload('foto');
		
		$uploadData = $this->upload->data();
		$filename = $uploadData['file_name'];

		// Initialize array
		$data = [
			'foto_produk'=>$filename,
			'produk_id'=>$id
		];

		$this->db->insert('foto_produk', $data);
		$this->session->set_flashdata('berhasil', '<script>alert("Gambar baru dimasukkan ! ")</script>');
		redirect('pelapak/produk');
		  
	}

	public function hapus_foto($id){
		unlink('./asset/foto_produk/'.$this->input->get('foto'));
		$hapus = $this->db->where('id_foto_produk', $id)->from('foto_produk')->delete();
		if($hapus){
			$this->session->set_flashdata('berhasil', '<script>alert("Berhasil Menghapus Foto ! ")</script>');
			redirect('pelapak/produk');
		}else{
			$this->session->set_flashdata('berhasil', '<script>alert("Terjadi Error, silahkan coba lagi ! ")</script>');
			redirect('pelapak/produk');
		}
	}





	public function rekening()
	{
		$data['rekening_pelapak'] = $this->db->order_by('id_rekening', 'DESC')->where('pelapak_id', $this->session->userdata('id_pelapak'))->get('rekening_pelapak');
		$this->load->view('pelapak/header');
		$this->load->view('pelapak/rekening', $data);
		$this->load->view('pelapak/footer');
	}

	public function tambah_rekening()
	{
		$data = [
			'nama_bank'=>$this->input->post('nama_bank'),
			'nomor_rekening'=>slug($this->input->post('nomor_rekening')),
			'atas_nama'=>$this->input->post('atas_nama'),
			'pelapak_id'=>$this->session->userdata('id_pelapak'),
		];
		$tambah = $this->db->insert('rekening_pelapak', $data);
		if($tambah){
			$this->session->set_flashdata('berhasil', '<script>alert("Berhasil Membuat Rekening Baru ! ")</script>');
			redirect('pelapak/rekening');
		}else{
			$this->session->set_flashdata('berhasil', '<script>alert("Terjadi error, silahkan coba lagi ! ")</script>');
			redirect('pelapak/rekening');
		}
	}
	public function hapus_rekening($id){
		
		$hapus = $this->db->where('id_rekening', $id)->from('rekening_pelapak')->delete();
		if($hapus){
			$this->session->set_flashdata('berhasil', '<script>alert("Berhasil Menghapus Rekening ! ")</script>');
			redirect('pelapak/rekening');
		}else{
			$this->session->set_flashdata('berhasil', '<script>alert("Terjadi Error, silahkan coba lagi ! ")</script>');
			redirect('pelapak/rekening');
		}
	}

	public function update_rekening($id){
		$data = [
			'nama_bank'=>$this->input->post('nama_bank'),
			'nomor_rekening'=>slug($this->input->post('nomor_rekening')),
			'atas_nama'=>$this->input->post('atas_nama'),
			'pelapak_id'=>$this->session->userdata('id_pelapak'),
		];
		$update = $this->db->where('id_rekening', $id)->update('rekening_pelapak', $data);
		if($update){
			$this->session->set_flashdata('berhasil', '<script>alert("Telah diupdate ! ")</script>');
			redirect('pelapak/rekening');
		}else{
			$this->session->set_flashdata('berhasil', '<script>alert("Terjadi error, silahkan coba lagi ! ")</script>');
			redirect('pelapak/rekening');
		}
	}
	
}