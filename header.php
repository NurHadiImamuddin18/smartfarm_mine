<?php if ($_SESSION['status'] == "ketua"): ?>
<!-- Menu untuk anggota -->
<li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="mdi mdi-laptop-chromebook menu-icon"></i>
        <span class="menu-title">Monitoring</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="data.php">
        <i class="mdi mdi-chart-areaspline menu-icon"></i>
        <span class="menu-title">Data Sensor</span>
    </a>
</li>
<!-- Menu khusus ketua -->
<li class="nav-item">
    <a class="nav-link" href="admin.php">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Data Pengguna</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="profile.php">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Profile</span>
    </a>
</li>
<?php endif; ?>

<?php if ($_SESSION['status'] == "anggota"): ?>
<li class="nav-item">
    <a class="nav-link" href="index.php">
        <i class="mdi mdi-laptop-chromebook menu-icon"></i>
        <span class="menu-title">Monitoring</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="data.php">
        <i class="mdi mdi-chart-areaspline menu-icon"></i>
        <span class="menu-title">Data Sensor</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="profile.php">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Profile</span>
    </a>
</li>
<?php endif; ?>
