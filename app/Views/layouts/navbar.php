<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?php if (session()->get('user')):
                $user = session()->get('user');
            ?>
                <a href="#" class="nav-link">
                    <i class="fas fa-user"></i>
                    <?= esc($user['username']) ?>
                </a>
            <?php endif; ?>
        </li>
    </ul>

</nav>