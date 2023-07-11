<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

    <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Semua Kategori</h1>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="/kategori/add" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                </tr>
                <?php $i =1;
                 foreach($data_kategori as $kategori) :?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $kategori['nama_catg']?></td>
                    <td>
                    <a href="/kategori/update/ <?=($kategori["id_catg"]); ?>" class="btn btn-success">Update</a>
                    <a class="btn btn-danger" onclick="confirmDelete('<?= $kategori ['id_catg']?>')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>
    <script>
    function confirmDelete(id_catg) {
        swal({
                title: "Apakah Anda yakin?",
                text: "Setelah dihapus! data anda akan benar-benar hilang!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    window.location.href = "/kategori/destroy/" +id_catg;

                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
    }
    </script>
    <?= $this->endSection() ?>