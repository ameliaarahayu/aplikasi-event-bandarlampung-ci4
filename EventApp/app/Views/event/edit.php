<?php $this->extend('layout/layout'); ?>

<?= $this->section('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>Halaman Edit Data Event</h1>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="/event/" class="btn btn-dark">Kembali</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="/event/edit " method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" value="<?= $event["id_event"]; ?>" name="id_event">
                            <div class="col-md-6">
                                <label for="nama_event" class="form-label">Nama Event</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['nama_event']) ? 'is-invalid ' : ''; ?>"
                                    id="nama_event" name="nama_event"
                                    value="<?= isset($errors['nama_event']) ? old('nama_event') : $event["nama_event"]; ?>">

                                <?php if (isset($errors['nama_event'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nama_event'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="id_catg" id="kategori"
                                    class="form-control <?= isset($errors['id_catg']) ? 'is-invalid ' : ''; ?>"
                                    name="id_catg" value="<?= old('id_catg'); ?>">
                                    <option value="">PILIH..</option>
                                    <?php foreach ($kategori as $g): ?>
                                        <?php if ($event['id_catg'] == $g['id_catg']): ?>
                                            <option value="<?= $g["id_catg"] ?>"><?= $g["nama_catg"] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $g["id_catg"] ?>"><?= $g["nama_catg"] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['id_catg'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['id_catg'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_event" class="form-label">Tanggal Event</label>
                                <input type="date"
                                    class="form-control <?= isset($errors['tgl_event']) ? 'is-invalid ' : ''; ?>"
                                    id="tgl_event" name="tgl_event"
                                    value=" <?= isset($errors['nama_event']) ? old('tgl_event') : $event["tgl_event"]; ?>">
                                <?php if (isset($errors['tgl_event'])): ?>
                                    <div class=" invalid-feedback">
                                        <?= $errors['tgl_event'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Harga</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['price']) ? 'is-invalid ' : ''; ?>"
                                    id="price" name="price"
                                    value=" <?= isset($errors['nama_event']) ? old('price') : $event["price"]; ?>">
                                <?php if (isset($errors['price'])): ?>
                                    <div class=" invalid-feedback">
                                        <?= $errors['price'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <select name="id_loc" id="lokasi"
                                    class="form-control <?= isset($errors['id_loc']) ? 'is-invalid ' : ''; ?>"
                                    name="id_loc" value="<?= old('id_loc'); ?>">
                                    <option value="">PILIH..</option>
                                    <?php foreach ($lokasi as $g): ?>
                                        <?php if ($event['id_loc'] == $g['id_loc']): ?>
                                            <option value="<?= $g["id_loc"] ?>"><?= $g["nama_loc"] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $g["id_loc"] ?>"><?= $g["nama_loc"] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['id_loc'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['id_loc'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="cover" class="form-label">Cover</label>
                                    <input type="file"
                                        class="form-control <?= isset($errors['cover']) ? 'is-invalid' : ''; ?>"
                                        id="cover" name="cover" value="<?= old('cover'); ?>">
                                    <?php if (isset($errors['cover'])): ?>
                                        <div class="invalid-feedback">
                                            <?= $errors['cover'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <div class="col-md-3">
                                <label class="form-label">Cover Saat Ini</label>
                                <div class="mb-2">
                                    <?php if ($event["cover"]): ?>
                                        <img src="/assets/cover/<?= $event["cover"]; ?>" width="100">
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