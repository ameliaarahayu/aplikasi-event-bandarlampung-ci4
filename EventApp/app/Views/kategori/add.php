<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Halaman Tambah Data Kategori</h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/kategori" class="btn btn-dark">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <form action="/kategori/nambah" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label for="nama_catg" class="form-label">Nama Kategori</label> 
                    <input type="text" class="form-control <?= isset($errors['nama_catg']) ? 
                    'is-invalid ' : ''; ?>" id="nama_catg" name="nama_catg" value="<?= old('nama_catg'); ?>">
                    <?php if (isset($errors['nama_catg'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['nama_catg'] ?>
                                </div>
                            <?php endif; ?>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>