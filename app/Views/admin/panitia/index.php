<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- 🔔 IMPORT RESULT -->
    <?php if (session()->getFlashdata('import_result')):
        $result = session()->getFlashdata('import_result');
    ?>
        <div class="alert alert-info alert-dismissible fade show">
            <strong>Import Selesai</strong><br>
            Berhasil: <?= $result['success'] ?>
            <?php if (!empty($result['errors'])): ?>
                <hr>
                <strong>Error:</strong>
                <ul class="mb-0">
                    <?php foreach ($result['errors'] as $e): ?>
                        <li><?= esc($e) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- 🔹 CARD UTAMA -->
    <div class="card shadow-sm">

        <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">

            <h5 class="mb-0 fw-bold">Data Panitia</h5>

            <div class="d-flex gap-2 w-100 w-md-auto">

                <!-- Search -->
                <form method="get" class="flex-grow-1">
                    <div class="input-group input-group-sm">
                        <input type="text"
                            name="search"
                            class="form-control"
                            placeholder="Cari..."
                            value="<?= esc($_GET['search'] ?? '') ?>">
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Tambah -->
                <button class="btn btn-primary btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalTambah">
                    <i class="fas fa-plus"></i>
                </button>

            </div>
        </div>

        <!-- 🔹 TABLE -->
        <div class="table-responsive">
            <table id="datatablesSimple" class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Cabang</th>
                        <th>Seksi</th>
                        <th>Jabatan</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $page  = $pager->getCurrentPage('panitia');
                    $perPage = 10;
                    $no = 1 + ($perPage * ($page - 1));
                    ?>

                    <?php if (!empty($panitia)): ?>
                        <?php foreach ($panitia as $p): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= esc($p['nama']) ?></td>
                                <td><?= esc($p['no_hp']) ?></td>
                                <td><?= esc($p['nama_cabang']) ?></td>
                                <td><?= esc($p['nama_seksi']) ?></td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        <?= esc($p['jabatan']) ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit<?= $p['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <a href="/admin/panitia/delete/<?= $p['id'] ?>"
                                        onclick="return confirm('Hapus data?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- 🔹 MODAL EDIT -->
                            <div class="modal fade"
                                id="modalEdit<?= $p['id'] ?>"
                                tabindex="-1">

                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <form action="<?= base_url('admin/panitia/update/' . $p['id']) ?>" method="post">
                                            <?= csrf_field() ?>

                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Panitia</h5>
                                                <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="mb-2">
                                                    <label>Nama</label>
                                                    <input type="text"
                                                        name="nama"
                                                        class="form-control"
                                                        value="<?= esc($p['nama']) ?>"
                                                        required>
                                                </div>

                                                <div class="mb-2">
                                                    <label>No HP</label>
                                                    <input type="text"
                                                        name="no_hp"
                                                        class="form-control"
                                                        value="<?= esc($p['no_hp']) ?>">
                                                </div>

                                                <div class="mb-2">
                                                    <label>Jabatan</label>
                                                    <input type="text"
                                                        name="jabatan"
                                                        class="form-control"
                                                        value="<?= esc($p['jabatan']) ?>">
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-primary w-100">
                                                    Update
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- 🔹 PAGINATION -->
        <div class="card-footer bg-white">
            <?= $pager->links('panitia', 'default_full') ?>
        </div>

    </div>
</div>

<!-- 🔹 MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="<?= base_url('admin/panitia/store') ?>" method="post">
                <?= csrf_field() ?>

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Panitia</h5>
                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-2">
                        <label>Nama</label>
                        <input type="text"
                            name="nama"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-2">
                        <label>No HP</label>
                        <input type="text"
                            name="no_hp"
                            class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Jabatan</label>
                        <input type="text"
                            name="jabatan"
                            class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success w-100">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>