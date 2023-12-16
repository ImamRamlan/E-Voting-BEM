<!-- mahasiswa/poling/pilih.php -->

<?= $this->extend('templates/beranda'); ?>

<?= $this->section('page'); ?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/poling_user" class="btn btn-warning"><i class="fas fa-backward"> Kembali</i></a>
    </div>
    <div class="row">
        <div class="mb-sm-0">
            <div class="card mb-5" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="<?= base_url('path/to/folder/' . $calon['foto']); ?>" class="img-fluid" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $calon['namamhs']; ?></h5>
                            <p class="card-text">
                                <strong>Visi : </strong><?= $calon['visi']; ?><br>
                                <strong>Misi : </strong><?= $calon['misi']; ?><br>
                                <strong>Fakultas : </strong><?= $calon['fakultas']; ?><br>
                                <strong>Jurusan : </strong><?= $calon['jurusan']; ?><br>
                            </p>
                            <p class="card-text"><small class="text-body-secondary">Vote yang adil!!</small></p>
                            <form action="/poling_user/save" method="post">
                                <input type="hidden" value="<?= $calon['idcalon']; ?>" name="idcalon">
                                <input type="hidden" value="<?= session()->get('idmhs'); ?>" name="idmhs">
                                <div class="form-group">
                                    <input type="datetime-local" name="waktu" class="form-control" value="<?= date('Y-m-d\TH:i:s'); ?>" readonly>
                                </div>
                                <!-- Tambahkan kondisi untuk menampilkan pesan jika sudah memilih -->
                                <?php if (!$sudahMemilih) : ?>
                                    <button class="btn btn-success" type="submit">Pilih.</button>
                                <?php else : ?>
                                    <p>Anda sudah memilih calon ini.</p>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>