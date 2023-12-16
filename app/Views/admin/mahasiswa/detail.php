<!-- app/Views/mahasiswa/detail.php -->

<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Data Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item"><a href="/mahasiswa">Data Mahasiswa</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-body">
                    <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
                        <h5><?= $mahasiswa['namamhs']; ?></h5>
                        
                        <p><strong>NIM:</strong> <?= $mahasiswa['nim']; ?></p>
                        <p><strong>Jurusan:</strong> <?= $mahasiswa['jurusan']; ?></p>
                        <p><strong>Fakultas:</strong> <?= $mahasiswa['fakultas']; ?></p>
                        <p><strong>Jenis Kelamin:</strong> <?= $mahasiswa['jk']; ?></p>
                        <p><strong>Nomor Telepon:</strong> <?= $mahasiswa['notelp']; ?></p>
                        <p><strong>Tahun Masuk:</strong> <?= $mahasiswa['tahunmasuk']; ?></p>
                        <p><strong>Username:</strong> <?= $mahasiswa['username']; ?></p>
                        <?php if (!empty($mahasiswa['foto'])) : ?>
                            <img src="<?= base_url('path/to/folder/' . $mahasiswa['foto']); ?>" alt="Mahasiswa Photo" width="200">
                        <?php else : ?>
                            <p>Tidak ada foto.</p>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
