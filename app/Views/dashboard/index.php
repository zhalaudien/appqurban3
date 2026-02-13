<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- RINGKASAN MASTER -->
<div class="row">
    <div class="col-6 col-md-3">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-sitemap"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Cabang</span>
                <span class="info-box-number"><?= $totalCabang ?></span>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Pequrban</span>
                <span class="info-box-number"><?= $totalPequrban ?></span>
            </div>
        </div>
    </div>
</div>


</div>

<?= $this->endSection() ?>