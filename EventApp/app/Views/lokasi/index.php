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
                                <a href="/lokasi/add" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
        <div class="row">
        <?php foreach ($data_lokasi as $lokasi) : ?>
            <div class="col-md-3">
            <div class="card">
                <img src="/assets/cover/<?= $lokasi["cover"]?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $lokasi["nama_loc"]?></h5>
                    <a href="/lokasi/update/ <?= ($lokasi["id_loc"]); ?>" class="btn btn-success">Update</a>
                    <a class="btn btn-danger" onclick="confirmDelete('<?= $lokasi ['id_loc']?>')">Delete</a>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
            </div>
        </div>
    </div>
    <script>
    function confirmDelete(id_loc) {
        swal({
                title: "Apakah Anda yakin?",
                text: "Setelah dihapus! data anda akan benar-benar hilang!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    window.location.href = "/lokasi/destroy/" +id_loc;

                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
    }
    </script>

    <?= $this->endSection() ?>