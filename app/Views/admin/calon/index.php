<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
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
                        <h5>List Data Calon</h5>
                        <a href="<?= base_url('calon/create'); ?>" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i> Tambah Calon</a>
                        <a href="/calon/exportPdf" class="btn btn-info mt-3"><i class="fas fa-file-pdf"> Export PDF</i></a>
                        <br><br>

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

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Visi</th>
                                    <th scope="col">Misi</th>
                                    <th scope="col">Suara</th>
                                    <th scope="col">Mahasiswa</th>
                                    <th colspan="3" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($calon as $c) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $c['visi']; ?></td>
                                        <td><?= $c['misi']; ?></td>
                                        <td><?= $c['suara']; ?></td>
                                        <td><?= $c['namamhs']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('calon/detail/' . $c['idcalon']); ?>" class="btn btn-primary"><i class="fas fa-info"></i></a>
                                            <a href="<?= base_url('calon/edit/' . $c['idcalon']); ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('calon/delete/' . $c['idcalon']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
