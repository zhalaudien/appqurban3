<?php
$user   = session()->get('user') ?? [];
$roleId = $user['role_id'] ?? null;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- BRAND -->
    <a href="<?= base_url() ?>" class="brand-link">
        <span class="brand-text font-weight-light">APP Pusat 7</span>
    </a>

    <div class="sidebar">

        <!-- USER PANEL -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <?= esc($user['nama'] ?? 'User') ?>
                </a>
            </div>
        </div>

        <!-- MENU -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <!-- ================= SUPERADMIN ================= -->
                <?php if ($roleId == 1): ?>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- DATA -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/cabang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Cabang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/panitia') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Panitia</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/presensi') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Presensi Panitia</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/muspika') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Muspika</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- MASTER QURBAN -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-brain"></i>
                            <p>
                                Master Qurban
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('qurban') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Qurban Cabang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('amprah') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Amprah Besek</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('realisasi') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Realisasi Besek</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('jadwal') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal Pengiriman</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- PENERIMAAN -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Penerimaan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('penerimaan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Hewan Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('datasapi') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Sapi</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('kandang') ?>" class="nav-link">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>Kandang</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('besek') ?>" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Produksi Besek</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('k3') ?>" class="nav-link">
                            <i class="nav-icon fas fa-recycle"></i>
                            <p>K3</p>
                        </a>
                    </li>

                    <!-- MASTER SURAT -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Master Surat
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('kirimbesek') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kirim Besek</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('kirimkulit') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kirim Kulit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('suratmuspika') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Surat Muspika</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('setting') ?>" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Setting</p>
                        </a>
                    </li>

                <?php endif; ?>

                <!-- ================= ADMIN CABANG ================= -->
                <?php if ($roleId == 6): ?>

                    <li class="nav-item">
                        <a href="<?= base_url('cabang/dashboard') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('cabang/pequrban') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Data Pequrban</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('cabang/permintaan-besek') ?>" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Permintaan Besek</p>
                        </a>
                    </li>

                <?php endif; ?>

                <!-- LOGOUT -->
                <li class="nav-item mt-3">
                    <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>