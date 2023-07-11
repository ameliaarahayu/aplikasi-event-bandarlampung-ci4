<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

    <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Semua Event</h1>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="/event/add" class="btn btn-primary">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Cover</th>
                    <th>Kategori</th>
                    <th>Tanggal Event</th>
                    <th>Lokasi</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
                <?php $i =1;
                 foreach($data_event as $event) :?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $event['nama_event']?></td>
                    <td><img style="width: 50px;" src="/assets/cover/<?= $event["cover"]?>" class="card-img-top"></td>
                    <td><?= $event['nama_catg']?></td>
                    <td><?= $event['tgl_event']?></td>
                    <td><?= $event['nama_loc']?></td>
                    <td><?= $event['price']?></td>
                    <td>
                    <a href="/event/update/ <?=($event["id_event"]); ?>" class="btn btn-success">Update</a>
                    <a class="btn btn-danger" onclick="confirmDelete('<?= $event ['id_event']?>')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
            </div>
        </div>
    </div>

    <script>
    function confirmDelete(id_event) {
        swal({
                title: "Apakah Anda yakin?",
                text: "Setelah dihapus! data anda akan benar-benar hilang!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    window.location.href = "/event/destroy/" +id_event;

                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
    }
    </script>
    
    <?= $this->endSection() ?>