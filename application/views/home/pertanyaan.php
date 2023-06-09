<script>
    $(document).ready(function(){

        $('.btnKirimBalasan').click(function(){
            $('#frmBalasan').attr('action', $(this).attr('data-action'));
            $('#modalKirimBalasan').modal('show');
        });

        $('#frmBalasan').submit(function(){
            
           /* implementasi code untuk mendapatkan nama dari id_user masih bingung
           if($('#txtBalasanNama').val().trim() == ''){
                alert('Nama harus diisi!');
                $('#txtBalasanNama').focus();

                return false;
            } */
            
            if($('#txtBalasanTeks').val().trim() == ''){
                alert('Teks harus diisi!');
                $('#txtBalasanTeks').focus();

                return false;
            }
            
        });

        $('#frmJawaban').submit(function(){
            
            /* implementasi code untuk mendapatkan nama dari id_user masih bingung
            if($('#txtJawabanNama').val().trim() == ''){
                alert('Nama harus diisi!');
                $('#txtJawabanNama').focus();

                return false;
            } */
            
            if($('#txtJawabanTeks').val().trim() == ''){
                alert('Teks harus diisi!');
                $('#txtJawabanTeks').focus();

                return false;
            }
            
        });

    });
</script>
<style>
    .container-jawaban{
        padding: 4px 4px 8px 4px;
        border-bottom: 1px solid #999;
    }

    .container-balasan{
        margin-left: 32px;
        padding: 4px;
        border-bottom: 1px solid #999;
    }
</style>
<h1><a href="<?= base_url() ?>">Home</a></h1>
<h2><?= $pertanyaan->judul; ?></h2>
<p><?= $pertanyaan->isi; ?></p>
<p><i><?= $pertanyaan->id; ?> - <?= $pertanyaan->updated; ?></i></p>
<button class="btn btn-success mt-1 mb-3 float-end" data-bs-toggle="modal" data-bs-target="#modalKirimJawaban">Kirim Jawaban</button><br/><br/>
<hr/>
<?php
    $id_jawaban = 0; 
    foreach($jawabans as $r){
        if($id_jawaban != $r->id_jawaban){
            $id_jawaban = $r->id_jawaban; 
?>
    <div class="container-jawaban">
        <?= $r->isi_jawaban ?><br/>
        <i><?= $r->nama_jawaban ?> - <?= $r->created_jawaban ?></i>
        <button class="btn btn-link btnKirimBalasan float-end" data-action="<?= base_url('balasan/save/' . $pertanyaan->id_pertanyaan . '/' . $id_jawaban) ?>" data-bs-toggle="modal" data-bs-target="#modalKirimBalasan">Balas</button><br/>
    </div>
<?php
    }        
    if($r->isi_balasan){
?>
    <div class="container-balasan">
        <?= $r->isi_balasan ?><br/>
        <i><?= $r->nama_balasan ?> - <?= $r->created_balasan ?></i>
    </div>
<?php
        } 
    } 
?>
<!-- Modal Kirim Jawaban -->
<div class="modal fade" id="modalKirimJawaban" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Kirim Jawaban</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="frmJawaban" method="post" action="<?= base_url('jawaban/save/' . $pertanyaan->id_pertanyaan) ?>">
        <div class="modal-body">
            <!-- code untuk menampilkan username dari id_user masih bingung
            <div class="row mb-3">
                <div class="col-md-3">Nama</div>
                <div class="col-md-9"><input id="txtJawabanNama" name="nama" type="text" class="form-control"/></div>
            </div>  -->
            <div class="row">
                <div class="col-md-3">Isi</div>
                <div class="col-md-9"><textarea id="txtJawabanIsi" name="teksIsi" class="form-control" rows="6"></textarea></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Kirim Balasan -->
<div class="modal fade" id="modalKirimBalasan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Kirim Balasan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="frmBalasan" method="post" action="<?= base_url('jawaban/save/' . $pertanyaan->id_pertanyaan) ?>">
        <div class="modal-body">
            <!-- code untuk menampilkan username dari id_user masih bingung
            <div class="row mb-3">
                <div class="col-md-3">Nama</div>
                <div class="col-md-9"><input id="txtBalasanNama" name="nama" type="text" class="form-control"/></div>
            </div> -->
            <div class="row">
                <div class="col-md-3">Isi</div>
                <div class="col-md-9"><textarea id="txtBalasanIsi" name="teksIsi" class="form-control" rows="6"></textarea></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
