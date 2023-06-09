<?php
require APPPATH . 'libraries/RESTController.php';
class Pertanyaan extends RESTController{
// construct
  public function __construct(){
    parent::__construct();
    $this->load->model('M_Pertanyaan');
  }
// method index untuk menampilkan semua pertanyaan menggunakan method get
  public function index_get(){
    $response = $this->M_PertanyaanAPI->all_pertanyaan();
    $this->response($response);
  }
// untuk menambah pertanyaan menaggunakan method post
  public function add_post(){
    $response = $this->M_PertanyaanAPI->add_pertanyaan()(
        $this->post('id_kategori'),
        $this->post('judul'),
        $this->post('isi'),
        $this->post('gambar')
      );
    $this->response($response);
  }
// update pertanyaan menggunakan method put
  public function update_put(){
    $response = $this->M_PertanyaanAPI->update_pertanyaan(
        $this->put('id_kategori'),
        $this->put('judul'),
        $this->put('isi'),
        $this->put('gambar')
      );
    $this->response($response);
  }
// hapus pertanyaan menggunakan method delete
  public function delete_delete(){
    $response = $this->M_Pertanyaan->delete_pertanyaan(
        $this->delete('id_pertanyaan')
      );
    $this->response($response);
  }
}
