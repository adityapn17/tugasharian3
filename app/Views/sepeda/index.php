<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
<div class="row">
<div class="col">
<h1><mt-2>Daftar Sepeda</mt-2></h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produk</th>
      <th scope="col">Nama</th>
      <th scope="col">Merk</th>
    </tr>
  </thead>
  <tbody>
  <?= $i= 1; ?>
  <?php foreach($sepeda as $s) : ?>

    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><img src="/img/<?= $s['produk'];?>" alt="" ></td>
      <td><?= $s['nama'];?></td>
      <td>
      <td><?= $s['merk'];?></td>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div></div></div>
<?= $this->endSection();?>