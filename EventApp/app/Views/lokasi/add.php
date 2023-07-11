<?= $this->extend('/layout/layout') ?>

<?= $this->section('content') ?>

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Halaman Tambah Data Lokasi</h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/lokasi" class="btn btn-dark">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <form action="/lokasi/tambah" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label for="nama_loc" class="form-label">Nama Lokasi</label> 
                    <input type="text" class="form-control <?= isset($errors['nama_loc']) ? 
                    'is-invalid ' : ''; ?>" id="nama_loc" name="nama_loc" value="<?= old('nama_loc'); ?>">
                    <?php if (isset($errors['nama_loc'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['nama_loc'] ?>
                                </div>
                            <?php endif; ?>
            </div>
            <div class="col-md-6">
                <label for="cover" class="form-label">Gambar</label>
                <input type="file" class="form-control <?= isset($errors['cover']) ? 
                'is-invalid' : ''; ?>" id="cover" name="cover" value="<?= old('cover'); ?>">
                <?php if (isset($errors['cover'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['cover'] ?>
                                </div>
                            <?php endif; ?>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary mt-5">Simpan</button>
            </div>
            </div>
            </form>

        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>