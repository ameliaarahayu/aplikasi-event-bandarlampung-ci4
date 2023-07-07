<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

    <div class="container">
        <div class="row">
        <?php foreach ($semuaevent as $event) : ?>
            <div class="col-md-3">
            <div class="card">
                <img src="/assets/cover/<?= $event["cover"]?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $event["nama_event"]?></h5>
                    <p class="card-text"> <?=$event["nama_catg"]?> || <?= $event["price"]?> || <?= $event["tgl_event"]?> </p>
                    <a href="#" class="btn btn-info">Detail</a>
                    <a href="#" class="btn btn-success">Update</a>
                    <a href="#" class="btn btn-warning">Delete</a>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?= $this->endSection() ?>