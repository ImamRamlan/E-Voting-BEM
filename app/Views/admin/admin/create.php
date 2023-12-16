<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Admin Baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item"><a href="/admin">Data Admin</a></li>
                    <li class="breadcrumb-item active">Tambah Admin Baru</li>
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
                        <!-- Tampilkan pesan kesalahan jika validasi gagal -->
                        <?php if (session()->getFlashdata('validation')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?= session()->getFlashdata('validation')->listErrors(); ?>
                            </div>
                        <?php endif; ?>

                        <form action="/admin/store" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
