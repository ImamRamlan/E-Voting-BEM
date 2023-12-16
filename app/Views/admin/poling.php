<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Hasil Poling</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">List Hasil Pemilihan</li>
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
                        <h5>List Data Poling</h5>
                        <?php foreach ($votesByCalon as $vote) : ?>
                            <div class="alert alert-dark">
                            Nama Calon : <?= $vote['nama_calon']; ?> - Total Votes: <?= $vote['count']; ?>
                            </div>
                        <?php endforeach; ?>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Calon</th>
                                    <th scope="col">Nama Pemilih</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach ($poling as $m) : ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?= $m['nama_calon']; ?></td>
                                    <td><?= $m['namamhs']; ?></td>
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