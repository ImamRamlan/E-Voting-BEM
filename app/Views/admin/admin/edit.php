<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Edit Admin</li>
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
                        <!-- Add your form for editing data here -->
                        <form action="/admin/update/<?= $admin['idadmin']; ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama Admin</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $admin['username']; ?>" required>
                                <?php if(isset($validation) && $validation->getError('username')) : ?>
                                    <div class="text-danger"><?= $validation->getError('username'); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $admin['password']; ?>" required>
                            </div>
                            <!-- Add more form elements as needed -->

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
