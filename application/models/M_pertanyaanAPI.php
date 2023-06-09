<?php
// extends class Model
class M_Pertanyaan extends CI_Model{
// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
// function untuk insert data ke tabel pertanyaan
  public function add_pertanyaan($id_kategori ,$judul, $isi, $gambar){
if(empty($id_kategori) || empty($judul) || empty($isi) || empty($gambar)){
      return $this->empty_response();
    }else{
      $data = array(
        "id_kategori"=> $id_kategori,
        "judul"=> $judul,
        "isi"=> $isi,
        "gambar"=> $gambar,
      );
$insert = $this->db->insert("pertanyaan", $data);
if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Pertanyaan ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Pertanyaan gagal ditambahkan.';
        return $response;
      }
    }
}
// mengambil semua pertanyaan
  public function all_pertanyaan(){
$all = $this->db->get("pertanyaan")->result();
    $response['status']=200;
    $response['error']=false;
    $response['pertanyaan']=$all;
    return $response;
}
// hapus data person
  public function delete_pertanyaan($id_pertanyaan){
if($id_pertanyaan == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_pertanyaan" => $id_pertanyaan
      );
$this->db->where($where);
      $delete = $this->db->delete("pertanyaan");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Pertanyaan dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Pertanyaan gagal dihapus.';
        return $response;
      }
    }
}
// update person
  public function update_pertanyaan($id_kategori ,$judul, $isi, $gambar){
if($id_kategori == '' || empty($judul) || empty($isi) || empty($gambar)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_pertanyaan" => $id_pertanyaan
      );
$set = array(
        "id_kategori" => $id_kategori,
        "judul" => $judul,
        "isi" => $isi,
        "gambar" => $gambar,
      );
$this->db->where($where);
      $update = $this->db->update("pertanyaan",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Pertanyaan berhasil diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Pertanyaan gagal diubah.';
        return $response;
      }
    }
}
}
?>