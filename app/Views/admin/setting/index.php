<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setting Waktu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Setting Waktu</li>
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
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('error'); ?></h5>
                            </div>
                        <?php endif; ?>
                        <form action="/setting/save" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">Mulai Poling</label>
                                    <input type="datetime-local" class="form-control" name="mulai">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Selesai Poling</label>
                                    <input type="datetime-local" class="form-control" name="selesai">
                                </div>
                                
                            </div>
                            <button class="btn btn-primary">Tambah</button><br>
                            <small>Data waktu tidak dapat ditambahkan, jika sudah ada data didalam.</small>
                        </form><br>

                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mulai</th>
                                    <th scope="col">Selesai</th>

                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach ($setting as $m) : ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?= $m['mulai']; ?></td>
                                    <td><?= $m['selesai']; ?></td>
                                    <td class="text-center">
                                        <a href="/setting/edit/<?= $m['idsetting'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="/setting/delete/<?= $m['idsetting'] ?>" class="btn btn-danger" onclick="return confirm ('Apakah Anda yakin?');"><i class="fas fa-trash"></i></a>
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