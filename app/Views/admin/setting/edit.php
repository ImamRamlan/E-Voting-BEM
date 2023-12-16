<!-- File: App/Views/admin/setting/edit.php -->

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
                    <li class="breadcrumb-item">Setting Waktu</li>
                    <li class="breadcrumb-item active">Edit Setting Waktu</li>
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
                        <h5>Edit Waktu Poling</h5>
                        <form action="/setting/update/<?= $setting['idsetting'];?>" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">Mulai Poling</label>
                                    <input type="datetime-local" class="form-control" name="mulai" value="<?= isset($setting['mulai']) ? date('Y-m-d\TH:i', strtotime($setting['mulai'])) : ''; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Selesai Poling</label>
                                    <input type="datetime-local" class="form-control" name="selesai" value="<?= isset($setting['selesai']) ? date('Y-m-d\TH:i', strtotime($setting['selesai'])) : ''; ?>">
                                </div>
                            </div>
                            <button class="btn btn-warning">Update</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
