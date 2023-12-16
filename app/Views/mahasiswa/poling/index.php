<!-- mahasiswa/poling/index.php -->

<?= $this->extend('templates/beranda'); ?>

<?= $this->section('page'); ?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/beranda" class="btn btn-warning"><i class="fas fa-backward"> Kembali</i></a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible col-md-5">
            <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('success'); ?></h5>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger alert-dismissible col-md-5">
            <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('gagal'); ?></h5>
        </div>
    <?php endif; ?>
    <?php if ($riwayat) : ?>
        <ul class="list-group">
            <h2>Riwayat Pemilihan:</h2>
            <?php foreach ($riwayat as $item) : ?>
                <li class="list-group-item list-group-item-success"><?= $item['namamhs']; ?> memilih <?= $item['nama_calon']; ?> pada <?= $item['waktu']; ?></li>
            <?php endforeach; ?>
        </ul><br>
    <?php else : ?>
        <p>Belum ada riwayat pemilihan.</p>
    <?php endif; ?>
    <?php foreach ($calon as $m) : ?>
        <div class="form-group row">
            <div class="col-sm-6">
                <img class="img-fluid" src="<?= base_url('path/to/folder/' . $m['foto']); ?>" alt="Card image cap">
            </div>
            <div class="col-sm-6">
                <div class="card-body">
                    <h5 class="card-title"><?= $m['namamhs']; ?></h5>
                    <p class="card-text">
                        <strong>Visi : </strong><?= $m['visi']; ?><br>
                        <strong>Misi : </strong><?= $m['misi']; ?>
                    </p>
                    <a href="/poling_user/pilih/<?= $m['idcalon']; ?>" class="btn btn-success">Pilih.</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>