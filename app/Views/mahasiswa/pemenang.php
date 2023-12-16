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
    <?php if (empty($pemenang)) : ?>
        <ul class="list-group">
            <li class="list-group-item list-group-item-danger">Pemenang belum ada, silahkan menunggu.</li>
        </ul>
    <?php else : ?>
        <div class="row">
            <?php foreach ($pemenang as $m) : ?>
                <div class="col-sm-4 mb-sm-0">
                    <div class="card">
                        <img class="tes" src="<?= base_url('path/to/folder/' . $m['foto']); ?>" alt="Pemenang Bem" height="300px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $m['nama_calon']; ?></h5>
                            <p class="card-text">
                                <b><?= $m['visi']; ?></b><br>
                                <?= $m['misi']; ?>
                            </p>
                            <a href="/poling_user/pilih/<?= $m['idcalon']; ?>" class="btn btn-success">Pilih.</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>