<script>
    $(document).ready(function() {
        $('#frmPertanyaan').submit(function() {
            //bagian nama yang mengambil dari id_user bingung implementasi code nya
            if ($('#txtJudul').val().trim() == '') {
                alert('Judul harus diisi!');
                $('#txtJudul').focus();

                return false;
            }
            //bagian kategori yang mengambil dari tabel kategori bingung implementasi code nya
            if ($('#txtIsi').val().trim() == '') {
                alert('Pertanyaan harus diisi!');
                $('#txtIsi').focus();

                return false;
            }
            // bagian upload image bingung implementasi code nya

        })
    })
</script>
<button class="btn btn-success mb-3 float-end" data-bs-toggle="modal" data-bs-target="modalBuatPosting">Buat Pertanyaan</button>
<table class="table table-bordered">
    <tr>
        <th>Judul</th>
        <th width="20%">Penulis</th>
        <th width="15%">Terakhir Update</th>
    </tr>
    <?php foreach ($records as $r) { ?>
        <tr>
            <td><a href="<?= base_url('pertanyaan/' . $r->id) ?>"><?= $r->judul ?></a></td>
            <td><?= $r->nama ?></td>
            <td><?= $r->updated ?></td>
        </tr>
    <?php } ?>
</table>
<!-- Modal -->
<div class="modal fade" id="modalBuatPosting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Postingan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmPertanyaan" method="post" action="<?= base_url('pertanyaan/save') ?>">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-3">Judul</div>
                        <div class="col-md-9"><input id="txtJudul" name="judul" type="text" class="form-control" /></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">Kategori</div>
                        <div class="col-md-9"><input id="txtKategori" name="kategori" type="text" class="form-control" /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Isi</div>
                        <div class="col-md-9"><textarea id="txtIsi" name="isi" class="form-control" rows="6"></textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">Gambar</div>
                        <div class="col-md-9"><input id="gambar" name="gambar" type="text" class="form-control" /></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>