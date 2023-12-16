<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Calon</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('calon'); ?>">Data Calon</a></li>
                    <li class="breadcrumb-item active">Edit Calon</li>
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
                        <!-- Tambahkan ID unik untuk formulir -->
                        <form action="<?= base_url('calon/update');?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="idcalon" value="<?= $calon['idcalon']; ?>">
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <textarea class="form-control" id="visi" name="visi" rows="3" required><?= $calon['visi']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="misi">Misi</label>
                                <textarea class="form-control" id="misi" name="misi" rows="3" required><?= $calon['misi']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="suara">Suara</label>
                                <input type="text" class="form-control" id="suara" name="suara" value="<?= $calon['suara']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="idmhs">Mahasiswa</label>
                                <select class="form-control" id="idmhs" name="idmhs" required>
                                    <?php foreach ($mahasiswa as $m) : ?>
                                        <option value="<?= $m['idmhs']; ?>" <?= ($m['idmhs'] == $calon['idmhs']) ? 'selected' : ''; ?>><?= $m['namamhs']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Elemen untuk menampilkan nama mahasiswa -->
                            <div class="form-group">
                                <label for="namacalon">Nama Calon</label>
                                <input type="text" class="form-control" id="namacalon" name="nama_calon" value="<?= $calon['nama_calon']; ?>" readonly required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('calon'); ?>" class="btn btn-secondary">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('idmhs').addEventListener('change', function() {
        updateNamaCalon();
    });

    function updateNamaCalon() {
        var namamhs = document.getElementById('idmhs').selectedOptions[0].text;
        document.getElementById('namacalon').value = namamhs;
    }
</script>
<?= $this->endSection(); ?>
