<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                        <h5>List Data Mahasiswa</h5>
                        <a href="/mahasiswa/create" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i></a>
                        <a href="/mahasiswa/exportPdf" class="btn btn-info mt-3"><i class="fas fa-file-pdf"> Export PDF</i></a>
                        <br><br>

                        <?php if(session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('success'); ?></h5>
                            </div>
                        <?php endif; ?>

                        <?php if(session()->getFlashdata('hapus')) : ?>
                            <div class="alert alert-danger alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('hapus'); ?></h5>
                            </div>
                        <?php endif; ?>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">No. Telepon</th>
                                    <th scope="col">Gambar</th>
                                    <th colspan="3" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                            <?php foreach($mahasiswa as $m) :?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $m['nim']; ?></td>
                                    <td><?= $m['namamhs']; ?></td>
                                    <td><?= $m['jk']; ?></td>
                                    <td><?= $m['notelp']; ?></td>
                                    <td>
                                        <img src="<?= base_url('path/to/folder/' . $m['foto']); ?>" alt="Mahasiswa Photo" width="100">
                                     </td>
                                    <td class="text-center">
                                    <a href="/mahasiswa/detail/<?= $m['idmhs'] ?>" class="btn btn-primary"><i class="fas fa-info"></i></a>
                                        <a href="/mahasiswa/edit/<?= $m['idmhs'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="/mahasiswa/delete/<?= $m['idmhs'] ?>" class="btn btn-danger" onclick="return confirm ('Apakah Anda yakin?');"><i class="fas fa-trash"></i></a>
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
