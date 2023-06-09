
<?php
defined ('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{ 
   public function pertanyaan($id_pertanyaan)
{
    $pertanyaanModel  = new \application\models\PertanyaanModel();
    $this->data['pertanyaan'] = $pertanyaanModel->find($id_pertanyaan);

    if($this->data['pertanyaan']) {
        $jawabanModel = new \application\models\JawabanModel();
        $this->data['jawabans'] = $jawabanModel->listById($id_jawaban);
        return view('Home/pertanyaan', $this->data);
    } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}
    public function index() {
        $pertanyaanModel = new \application\models\PertanyaanModel();
        $this->data['records'] = $pertanyaanModel->listAll();

        return view('Home/index', $this->data);
    }
}
 