<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card-body">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Data Panitia</h5>
            <a href="/panitia/create" class="btn btn-primary btn-sm">Tambah</a>
        </div>

        <form method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="search"
                    class="form-control"
                    placeholder="Cari nama, cabang, seksi..."
                    value="<?= esc($_GET['search'] ?? '') ?>">
                <button class="btn btn-secondary">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Cabang</th>
                        <th>Seksi</th>
                        <th>Jabatan</th>
                        <th width="80">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($panitia as $p): ?>
                        <tr>
                            <td><?= esc($p['nama']) ?></td>
                            <td><?= esc($p['no_hp']) ?></td>
                            <td><?= esc($p['nama_cabang']) ?></td>
                            <td><?= esc($p['nama_seksi']) ?></td>
                            <td>
                                <span class="badge bg-info">
                                    <?= esc($p['jabatan']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="/panitia/delete/<?= $p['id'] ?>"
                                    onclick="return confirm('Hapus data?')"
                                    class="btn btn-danger btn-sm">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?= $this->endSection() ?>