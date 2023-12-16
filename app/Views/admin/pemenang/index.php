<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pemenang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Data Pemenang</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5>List Data Pemenang</h5>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('success'); ?></h5>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('hapus')) : ?>
                            <div class="alert alert-danger alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('hapus'); ?></h5>
                            </div>
                        <?php endif; ?>
                        <div class="form-group row">
                            <?php if (!empty($winner)) : ?>
                                <div class="col-sm-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $winner['nama_calon']; ?></h5>
                                            <p class="card-text">
                                                Visi : <b><?= $winner['visi']; ?></b><br>
                                                Misi : <?= $winner['misi']; ?><br>
                                                Jumlah Suara :<b> <?= $winner['count']; ?></b>
                                            </p>
                                            <?php if (empty($pemenang)) : ?>
                                                <form action="/pemenang/pilih" method="post">
                                                    <input type="hidden" name="idcalon" value="<?= $winner['idcalon']; ?>">
                                                    <input type="hidden" name="jumlah_suara" value="<?= $winner['count']; ?>">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="tahunjabatan" placeholder="Masukkan Tahun Jabatan.">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </form>
                                            <?php else : ?>
                                                <button class="btn btn-success" disabled>(Sudah Ada Pemenang)</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <p>Belum ada pemenang.</p>
                                </div>
                            <?php endif; ?>
                            <?php if (empty($pemenang)) : ?>
                                <div class="col-sm-12">
                                    <p>Data pemenang belum ada.Silahkan Menunggu sampai set waktu selesai.</p>
                                </div>
                            <?php else : ?>
                                <?php foreach ($pemenang as $m) : ?>
                                    <div class="col-sm-7">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $m['nama_calon']; ?></h5>
                                                <p class="card-text">
                                                    Visi : <b><?= $m['visi']; ?></b><br>
                                                    Misi : <?= $m['misi']; ?><br>
                                                    Jumlah Suara :<b> <?= $m['jumlah_suara']; ?></b>
                                                </p>
                                                <a href="/pemenang/hapus/<?= $m['idpemenang'];?>" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin menghapus pemenang ini?')">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>