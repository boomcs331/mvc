<nav class="navbar">
    <div class="navbar-brand">
        <a href="<?= BASE_URL ?>" class="brand-link">
            <i class="fas fa-code"></i> CPS
        </a>
    </div>
    
    <div class="navbar-menu">
        <a href="<?= BASE_URL ?>/home/dashboard" class="nav-link">
            <i class="fas fa-home"></i> หน้าแรก
        </a>
        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 'pc' || $_SESSION['role'] == 'admin')): ?>
        <a href="<?= BASE_URL ?>pc/materials" class="nav-link">
            <i class="fas fa-boxes"></i> ข้อมูลวัสดุ
        </a>
        <a href="<?= BASE_URL ?>pc/materialTransactions" class="nav-link">
            <i class="fas fa-exchange-alt"></i> ธุรกรรมวัสดุ
        </a>
        <a href="<?= BASE_URL ?>pc/materialStock" class="nav-link">
            <i class="fas fa-warehouse"></i> คลังวัสดุ
        </a>
        <a href="<?= BASE_URL ?>pc/transactionReport" class="nav-link">
            <i class="fas fa-chart-line"></i> รายงาน
        </a>
        <?php endif; ?>
    </div>
    
    <div class="navbar-user">
        <?php if (isset($current_user) && $current_user): ?>
            <div class="user-info">
                <i class="fas fa-user"></i>
                <span><?= htmlspecialchars($current_user['user_name']) ?></span>
                <?php if (!empty($current_user['position'])): ?>
                    <span class="user-badge"><?= htmlspecialchars($current_user['position']) ?></span>
                <?php endif; ?>
            </div>
            <a href="<?= BASE_URL ?>logout" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
            </a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>login" class="login-btn">
                <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
            </a>
        <?php endif; ?>
    </div>
</nav>