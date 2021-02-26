<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="con">
    <div class="row">
        <div class="col">
            <h2> <mt-2>Detail Sepeda</h2>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/<?= $sepeda['produk'];?>" class= "card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $sepeda['nama'];?></h5>
        <p class="card-text"><b>Merk: <?= $sepeda['merk'];?></b></p>
        <a href="/sepeda/edit/<?=$sepeda['slug'];?>"class="btn btn-warning">Edit</a>
        <form action="/sepeda/<?=$sepeda['id'];?>"  method="post" class="d-inline">
        <?=csrf_field();?>
        <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')";>Delete</button>
    </form>
        <br></br>
        <a href="/sepeda">Kembali ke daftar sepeda</a>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection();?>