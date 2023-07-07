<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

    <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Semua Lokasi</h1>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="/event/addcatg" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                </tr>
                <?php $i =1;
                 foreach($data_lokasi as $lokasi) :?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $lokasi['nama_loc']?></td>
                    <td>
                    <a href="/detail/" class="btn btn-primary">Detail</a>
                    <a href="/event/update/" class="btn btn-success">Update</a>
                    <a class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>