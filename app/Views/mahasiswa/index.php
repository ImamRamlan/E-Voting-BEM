<?= $this->extend('templates/beranda'); ?>

<?= $this->section('page'); ?>
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
    </div>
    <div class="row">
        <?php foreach ($calon as $m) : ?>
            <div class="col-sm-4 mb-sm-0">
                <div class="card">
                <img class="tes" src="<?= base_url('path/to/folder/' . $m['foto']); ?>" alt="Card image cap" height="300px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $m['namamhs'];?></h5>
                        <p class="card-text">
                            <B><?= $m['visi'];?></B><br>
                            <?= $m['misi'];?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div><br>
    <div class="row">
        <div class="col-xl-10 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header">
                    Panduan Memilih Calon Pasangan
                </div>
                <div class="card-body">
                    <ol>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                        <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li>
                        <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>