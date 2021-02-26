<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="con">
    <div class="row">
        <div class="col-8">
            <h2>Form Ubah Data Sepeda</h2>
            <form action="/sepeda/update/<?=$sepeda['id'];?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?=$sepeda['slug'];?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?=$sepeda['nama'];?>">
                        <div id="validationServer05Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="merk" name="merk" value="<?=$sepeda['merk'];?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="produk" class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="produk" name="produk" value="<?=$sepeda['produk'];?>">
                    </div>
                </div>
                </label>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Ubah</button>
</form>
</div>
</div>
</div>
<?= $this->endSection(); ?>