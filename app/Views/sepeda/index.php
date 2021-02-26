<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
<div class="row">
<div class="col">
  <a href="/sepeda/create" class="btn btn-primary mt-3">Tambah Data Sepeda</a>
<h1><mt-2>Daftar Sepeda</mt-2></h1>
<?php if(session()->getFlashdata('pesan')) :?>
  <div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
  <?php endif; ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produk</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i= 1; ?>
  <?php foreach($sepeda as $s) : ?>

    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><img src="/img/<?= $s['produk'];?>" alt="" ></td>
      <td><?= $s['nama'];?></td>
      <td>
      <a href="/sepeda/<?= $s['slug'];?>"class="btn btn-success">Detail</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div></div></div>
<?= $this->endSection();?> 