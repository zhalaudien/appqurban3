<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>


<form method="post" action="<?= base_url('cabang/pequrban/store') ?>">
    <?= csrf_field() ?>

    <div class="card">
        <div class="card-body">
            <input name="nama" class="form-control mb-2" placeholder="Nama Pequrban" required>

            <select name="jenis_hewan" class="form-control mb-2">
                <option value="sapi">Sapi</option>
                <option value="kambing">Kambing</option>
            </select>

            <select name="sumber" class="form-control mb-2">
                <option value="mandiri">Mandiri</option>
                <option value="bumm">BUMM</option>
            </select>

            <input name="harga" type="number" class="form-control mb-2" placeholder="Harga">
        </div>
        <div class="card-footer">
            <button class="btn btn-success">Simpan</button>
        </div>
    </div>
</form>

</div>
<?= $this->endSection() ?>