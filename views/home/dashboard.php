<?php include VIEWS_PATH . 'layouts/header.php'; ?>
<?php include VIEWS_PATH . 'layouts/navbar.php'; ?>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user me-2"></i>ข้อมูลส่วนตัว</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-user fa-2x text-muted"></i>
                        </div>
                    </div>
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>รหัสผู้ใช้:</strong></td>
                            <td><?= htmlspecialchars($current_user['user_id']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>ชื่อผู้ใช้:</strong></td>
                            <td><?= htmlspecialchars($current_user['user_name']) ?></td>
                        </tr>
                        <?php if (!empty($current_user['user_email'])): ?>
                        <tr>
                            <td><strong>อีเมล:</strong></td>
                            <td><?= htmlspecialchars($current_user['user_email']) ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td><strong>เข้าสู่ระบบ:</strong></td>
                            <td><?= $current_user['login_time'] ? date('d/m/Y H:i', strtotime($current_user['login_time'])) : 'N/A' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Roles Card -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-shield-alt me-2"></i>บทบาทและสิทธิ์</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label"><strong>บทบาทหลัก:</strong></label>
                        <span class="badge bg-primary fs-6"><?= htmlspecialchars($current_user['role']) ?></span>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><strong>บทบาททั้งหมด:</strong></label>
                        <div>
                            <?php 
                            $roleColors = [
                                'admin' => 'bg-danger',
                                'pc' => 'bg-warning text-dark', 
                                'user' => 'bg-secondary',
                                'we' => 'bg-info'
                            ];
                            foreach ($current_user['roles'] as $role): 
                                $colorClass = isset($roleColors[$role]) ? $roleColors[$role] : 'bg-secondary';
                            ?>
                                <span class="badge <?= $colorClass ?> me-1 mb-1"><?= htmlspecialchars($role) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <small class="text-muted">จำนวน: <?= count($current_user['roles']) ?> บทบาท</small>
                    </div>

                    <div class="alert alert-info">
                        <small>
                            <i class="fas fa-info-circle me-1"></i>
                            บทบาทของคุณกำหนดสิทธิ์ในการเข้าถึงเมนูต่างๆ ในระบบ
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>สถิติด่วน</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="border rounded p-2">
                                <h4 class="text-primary mb-1">
                                    <i class="fas fa-clock"></i>
                                </h4>
                                <small class="text-muted">เวลาออนไลน์</small>
                                <div class="fw-bold" id="online-time">00:00:00</div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="border rounded p-2">
                                <h4 class="text-success mb-1">
                                    <i class="fas fa-check-circle"></i>
                                </h4>
                                <small class="text-muted">สถานะ</small>
                                <div class="fw-bold text-success">ออนไลน์</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Access Section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fas fa-th-large me-2"></i>เมนูที่สามารถเข้าถึงได้</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php 
                        $userRoles = $current_user['roles'];
                        $hasPC = in_array('pc', $userRoles);
                        $hasAdmin = in_array('admin', $userRoles);
                        $hasWE = in_array('we', $userRoles);
                        ?>
                        
                        <?php if ($hasPC || $hasAdmin): ?>
                        <!-- Material Data Menu -->
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>pc/materials" class="text-decoration-none">
                                <div class="card border-primary h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-boxes fa-3x text-primary mb-3"></i>
                                        <h6 class="card-title">ข้อมูลวัสดุ</h6>
                                        <p class="card-text text-muted small">จัดการข้อมูลวัสดุในระบบ</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Material Transaction Menu -->
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>pc/materialTransactions" class="text-decoration-none">
                                <div class="card border-warning h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-exchange-alt fa-3x text-warning mb-3"></i>
                                        <h6 class="card-title">ธุรกรรมวัสดุ</h6>
                                        <p class="card-text text-muted small">บันทึกการเข้า-ออกวัสดุ</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Material Stock Menu -->
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>pc/materialStock" class="text-decoration-none">
                                <div class="card border-success h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-warehouse fa-3x text-success mb-3"></i>
                                        <h6 class="card-title">คลังวัสดุ</h6>
                                        <p class="card-text text-muted small">ตรวจสอบสต็อกวัสดุ</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Transaction Report Menu -->
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>pc/transactionReport" class="text-decoration-none">
                                <div class="card border-info h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-chart-line fa-3x text-info mb-3"></i>
                                        <h6 class="card-title">รายงานธุรกรรม</h6>
                                        <p class="card-text text-muted small">รายงานการเคลื่อนไหววัสดุ</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>

                        <?php if ($hasWE || $hasAdmin): ?>
                        <!-- WE Menu -->
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>we/dashboard" class="text-decoration-none">
                                <div class="card border-info h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-tools fa-3x text-info mb-3"></i>
                                        <h6 class="card-title">จัดการงาน WE</h6>
                                        <p class="card-text text-muted small">งานด้านวิศวกรรม</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>

                        <?php if ($hasAdmin): ?>
                        <!-- Admin Menu -->
                        <!-- Admin Menus -->
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>admin/users" class="text-decoration-none">
                                <div class="card border-danger h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-users-cog fa-3x text-danger mb-3"></i>
                                        <h6 class="card-title">จัดการผู้ใช้</h6>
                                        <p class="card-text text-muted small">จัดการผู้ใช้และสิทธิ์</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>admin/settings" class="text-decoration-none">
                                <div class="card border-secondary h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-cogs fa-3x text-secondary mb-3"></i>
                                        <h6 class="card-title">ตั้งค่าระบบ</h6>
                                        <p class="card-text text-muted small">กำหนดค่าระบบ</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>admin/reports" class="text-decoration-none">
                                <div class="card border-dark h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-chart-pie fa-3x text-dark mb-3"></i>
                                        <h6 class="card-title">รายงานรวม</h6>
                                        <p class="card-text text-muted small">รายงานและสถิติระบบ</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>

                        <!-- Common Menus for all users -->
                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>profile" class="text-decoration-none">
                                <div class="card border-primary h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-user-edit fa-3x text-primary mb-3"></i>
                                        <h6 class="card-title">แก้ไขโปรไฟล์</h6>
                                        <p class="card-text text-muted small">จัดการข้อมูลส่วนตัว</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-3">
                            <a href="<?= BASE_URL ?>help" class="text-decoration-none">
                                <div class="card border-info h-100 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="fas fa-question-circle fa-3x text-info mb-3"></i>
                                        <h6 class="card-title">ช่วยเหลือ</h6>
                                        <p class="card-text text-muted small">คู่มือการใช้งาน</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Role Summary -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <h6 class="mb-2"><i class="fas fa-info-circle me-2"></i>สรุปสิทธิ์ของคุณ</h6>
                                <div class="row">
                                    <?php foreach ($current_user['roles'] as $role): ?>
                                    <div class="col-md-3 mb-2">
                                        <div class="d-flex align-items-center">
                                            <?php 
                                            $roleInfo = [
                                                'admin' => ['icon' => 'fas fa-crown', 'name' => 'ผู้ดูแลระบบ', 'desc' => 'สิทธิ์เต็ม'],
                                                'pc' => ['icon' => 'fas fa-boxes', 'name' => 'พนักงานคลัง', 'desc' => 'จัดการวัสดุ'],
                                                'we' => ['icon' => 'fas fa-tools', 'name' => 'วิศวกร', 'desc' => 'งานวิศวกรรม'],
                                                'user' => ['icon' => 'fas fa-user', 'name' => 'ผู้ใช้ทั่วไป', 'desc' => 'สิทธิ์พื้นฐาน']
                                            ];
                                            $info = isset($roleInfo[$role]) ? $roleInfo[$role] : $roleInfo['user'];
                                            ?>
                                            <i class="<?= $info['icon'] ?> me-2 text-primary"></i>
                                            <div>
                                                <strong><?= $info['name'] ?></strong><br>
                                                <small class="text-muted"><?= $info['desc'] ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php if (empty($current_user['roles']) || (count($current_user['roles']) == 1 && $current_user['roles'][0] == 'user')): ?>
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        คุณยังไม่มีสิทธิ์เข้าถึงเมนูพิเศษ กรุณาติดต่อผู้ดูแลระบบ
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-shadow {
    transition: all 0.3s ease;
}
.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}
.card {
    border-radius: 10px;
}
</style>

<script>
// Online time counter
let startTime = new Date().getTime();
function updateOnlineTime() {
    let currentTime = new Date().getTime();
    let diff = currentTime - startTime;
    
    let hours = Math.floor(diff / (1000 * 60 * 60));
    let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((diff % (1000 * 60)) / 1000);
    
    document.getElementById('online-time').textContent = 
        String(hours).padStart(2, '0') + ':' + 
        String(minutes).padStart(2, '0') + ':' + 
        String(seconds).padStart(2, '0');
}

setInterval(updateOnlineTime, 1000);
</script>

<?php include VIEWS_PATH . 'layouts/footer.php'; ?>