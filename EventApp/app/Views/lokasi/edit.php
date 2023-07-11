<?php $this->extend('layout/layout'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="class-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Halaman Edit Data Lokasi</h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="/lokasi/" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="/lokasi/edit" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" value="<?= $lokasi["id_loc"]; ?>" name="id">
                        <div class="col-md-6">
                            <label for="nama_loc" class="form-label">Nama Lokasi</label>
                            <input type="text"
                                class="form-control <?= isset($errors['nama_loc']) ? 'is-invalid ' : ''; ?>"
                                id="nama_loc" name="nama_loc"
                                value="<?= isset($errors['nama_loc']) ? old('nama_loc') : $lokasi["nama_loc"]; ?>">
                            <?php if (isset($errors['nama_loc'])): ?>
                                <div class="invalid-feedback">
                                    <?= $errors['nama_loc'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="cover" class="form-label">Cover</label>
                                <input type="file"
                                    class="form-control <?= isset($errors['cover']) ? 'is-invalid' : ''; ?>" id="cover"
                                    name="cover" value="<?= old('cover'); ?>">
                                <?php if (isset($errors['cover'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['cover'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Cover Saat Ini</label>
                                <div class="mb-2">
                                    <?php if ($lokasi["cover"]): ?>
                                        <img src="/assets/cover/<?= $lokasi["cover"]; ?>" width="100">
                                    <?php else: ?>
                                        <span>Tidak ada gambar lama</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>