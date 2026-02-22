<!doctype html>
<html lang="en">

<head>
    <?= $this->include('layouts/header') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?= $this->include('layouts/navbar') ?>
        <?= $this->include('layouts/sidebar') ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">

            <!-- Page Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <?= $this->renderSection('page_header') ?>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </section>

        </div>

        <?= $this->include('layouts/footer') ?>

    </div>
</body>

</html>