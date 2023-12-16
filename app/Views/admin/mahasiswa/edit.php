<!-- app/Views/mahasiswa/edit.php -->

<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Data Mahasiswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Edit Data Mahasiswa</li>
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
                        <?php if (session()->getFlashdata('validation')) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('validation')->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <form action="/mahasiswa/update/<?= $mahasiswa['idmhs'] ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="namamhs">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="namamhs" name="namamhs" value="<?= $mahasiswa['namamhs'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $mahasiswa['jurusan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <select class="form-control" id="fakultas" name="fakultas" required>
                                    <option value="">--Fakultas--</option>
                                    <option value="Teknik Informatika" <?= ($mahasiswa['fakultas'] == 'Teknik Informatika') ? 'selected' : '' ?>>Teknik Informatika</option>
                                    <option value="Sistem Informasi" <?= ($mahasiswa['fakultas'] == 'Sistem Informasi') ? 'selected' : '' ?>>Sistem Informasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk" required>
                                    <option value="L" <?= ($mahasiswa['jk'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="P" <?= ($mahasiswa['jk'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="notelp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $mahasiswa['notelp'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tahunmasuk">Tahun Masuk</label>
                                <input type="text" class="form-control" id="tahunmasuk" name="tahunmasuk" value="<?= $mahasiswa['tahunmasuk'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $mahasiswa['username'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $mahasiswa['password'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="memilih">Memilih</label>
                                <select class="form-control" id="memilih" name="memilih" required>
                                    <option value="">--Memilih--</option>
                                    <option value="1" <?= ($mahasiswa['memilih'] == '1') ? 'selected' : '' ?>>Ya</option>
                                    <option value="0" <?= ($mahasiswa['memilih'] == '0') ? 'selected' : '' ?>>Tidak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <br>
                                <img src="<?= base_url('path/to/folder/' . $mahasiswa['foto']); ?>" alt="Current Foto" height="100">
                                <input type="file" class="form-control" id="foto" name="foto">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>