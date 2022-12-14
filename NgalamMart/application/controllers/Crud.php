<?php
class Crud extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->library('datatables');
    $this->load->model('crud_model');
		$this->load->library('session');
		if ($this->session->logged_in == FALSE){
			redirect('login');
		}
  }
  function index(){
    // $dariDB = $this->crud_model->cekkodebarang();
    // //setiap kategori memiliki kode barang yang berbeda pada digit pertama
    // $nourut = substr($dariDB, 1, 9);
    // $kodeBarangSekarang = $nourut + 1;
    // $data = array('kode_barang' => $kodeBarangSekarang);
    // $this->load->view('crud_view', $data);

    $x['kategori']=$this->crud_model->get_kategori();
    $this->load->view('crud_view',$x);
  }


  function get_guest_json() { //data data produk by JSON object
    header('Content-Type: application/json');
    echo $this->crud_model->get_all_produk();
  }


  function simpan(){ //function simpan data
    $data=array(
      'barang_kode'     => $this->input->post('kode_barang'),
      'barang_nama'     => $this->input->post('nama_barang'),
      'barang_harga'    => $this->input->post('harga'),
      'barang_kategori_id' => $this->input->post('kategori')
    );
    $this->db->insert('barang', $data);
    redirect('crud');
  }

  function update(){ //function update data
    $kode=$this->input->post('kode_barang');
    $data=array(
      //'nama tabel db'     => $this->input->post('nama field'),
      'barang_nama'     => $this->input->post('nama_barang'),
      'barang_harga'    => $this->input->post('harga'),
      'barang_status'    => $this->input->post('status'),
      'barang_kategori_id' => $this->input->post('kategori')
    );
    $this->db->where('barang_kode',$kode);
    $this->db->update('barang', $data);
    redirect('crud');
  }

  function delete(){ //function hapus data
    $kode=$this->input->post('kode_barang');
    $this->db->where('barang_kode',$kode);
    $this->db->delete('barang');
    redirect('crud');
  }

}
