<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="con">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Sepeda</h2>
            <form action="/sepeda/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div id="validationServer05Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="merk" name="merk" value="<?= old('merk'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                    <div class="input-group mb-3">
  <input type="file" class="form-control <?= ($validation->hasError('produk')) ? 'is-invalid' : ''; ?>" id="produk" name="produk">
  <div id="validationServer05Feedback" class="invalid-feedback">
                            <?= $validation->getError('produk'); ?>
                        </div>
</div>
                    </div>
                </div>
                </label>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
</div>
</div>
</div>
<?= $this->endSection(); ?>