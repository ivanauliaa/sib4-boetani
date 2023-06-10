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

    $pertanyaan = $response['pertanyaan']; // [ { id_pertanyaan: 1 }, { id_pertanyaan: 2 } ]
    $pertanyaanIds = [];

    foreach ($pertanyaan as $p) {
      array_push($pertanyaanIds, $p['id_pertanyaan']);
    }
    
    $jawaban = $this->JawabanModel->listByPertanyaanIds($pertanyaanIds) // [ { id_pertanyaan: 1, id_jawaban: 1 }, { id_pertanyaan: 2, id_jawaban: 2 } ]

    foreach ($jawaban as $j) {
      foreach ($pertanyaan as $index => $p) {
        if ($j['id_pertanyaan'] == $p['id_pertanyaan']) {
          if (array_key_exists('jawaban', $p)) {
            array_push($pertanyaan[$index]['jawaban'], $j)
          } else {
            $pertanyaan[$index]['jawaban'] = [$j]
          }

          break;
        }
      }
    }
    
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
