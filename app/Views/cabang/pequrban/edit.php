<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<form method="post"
    action="<?= base_url('cabang/pequrban/update/' . $row['id']) ?>">

    <?= csrf_field() ?>

    <div class="card">
        <div class="card-body">

            <div class="form-group">
                <label>Nama Pequrban</label>
                <input type="text" name="nama"
                    value="<?= esc($row['nama']) ?>"
                    class="form-control" required>
            </div>

            <div class="form-group">
                <label>Jenis Hewan</label>
                <select name="jenis_hewan" class="form-control">
                    <option value="sapi" <?= $row['jenis_hewan'] == 'sapi' ? 'selected' : '' ?>>Sapi</option>
                    <option value="kambing" <?= $row['jenis_hewan'] == 'kambing' ? 'selected' : '' ?>>Kambing</option>
                </select>
            </div>

            <div class="form-group">
                <label>Sumber</label>
                <select name="sumber" class="form-control">
                    <option value="mandiri" <?= $row['sumber'] == 'mandiri' ? 'selected' : '' ?>>Mandiri</option>
                    <option value="bumm" <?= $row['sumber'] == 'bumm' ? 'selected' : '' ?>>BUMM</option>
                </select>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga"
                    value="<?= esc($row['harga']) ?>"
                    class="form-control">
            </div>

        </div>

        <div class="card-footer">
            <button class="btn btn-success">Update</button>
            <a href="<?= base_url('cabang/pequrban') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

</form>

</div>
<?= $this->endSection() ?>