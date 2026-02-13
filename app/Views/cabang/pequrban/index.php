<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>


<a href="<?= base_url('cabang/pequrban/create') ?>" class="btn btn-primary mb-3">
    + Tambah Pequrban
</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Hewan</th>
                    <th>Sumber</th>
                    <th>Harga</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pequrban as $row): ?>
                    <tr>
                        <td><?= esc($row['nama']) ?></td>
                        <td><?= esc($row['jenis_hewan']) ?></td>
                        <td><?= esc($row['sumber']) ?></td>
                        <td><?= number_format($row['harga']) ?></td>
                        <td>
                            <a href="<?= base_url('cabang/pequrban/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('cabang/pequrban/delete/' . $row['id']) ?>"
                                onclick="return confirm('Hapus data?')"
                                class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<?= $this->endSection() ?>