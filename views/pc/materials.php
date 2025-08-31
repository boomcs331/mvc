<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลวัตถุดิบ</title>
    <link rel="stylesheet" href="/mvc/lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/mvc/lib/css/navbar.css">
    <link rel="stylesheet" href="/mvc/lib/css/materials.css">
    <script src="/mvc/lib/js/sweetalert2.min.js"></script>
</head>
<body>
    <?php include VIEWS_PATH . 'layouts/navbar.php'; ?>
    
    
    <div class="container-fluid">
        <div class="search-section">
            <form method="GET" class="search-row">
                <div>
                    <label>ค้นหาชื่อวัตถุดิบ</label>
                    <input type="text" class="search-input" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="กรอกชื่อวัตถุดิบ...">
                </div>
                <div>
                    <label>กรองตามประเภท</label>
                    <select class="filter-select" name="type">
                        <option value="">ทั้งหมด</option>
                        <option value="pc" <?= isset($_GET['type']) && $_GET['type'] == 'pc' ? 'selected' : '' ?>>PC</option>
                        <option value="of" <?= isset($_GET['type']) && $_GET['type'] == 'of' ? 'selected' : '' ?>>OF</option>
                        <option value="of_mat" <?= isset($_GET['type']) && $_GET['type'] == 'of_mat' ? 'selected' : '' ?>>OF-MAT</option>
                    </select>
                </div>
                <div>
                    <label>กรองตามสถานะ</label>
                    <select class="filter-select" name="active">
                        <option value="">ทั้งหมด</option>
                        <option value="1" <?= isset($_GET['active']) && $_GET['active'] == '1' ? 'selected' : '' ?>>ใช้งาน</option>
                        <option value="0" <?= isset($_GET['active']) && $_GET['active'] == '0' ? 'selected' : '' ?>>ไม่ใช้งาน</option>
                    </select>
                </div>
                <div>
                    <label>จำนวนต่อหน้า</label>
                    <select class="filter-select" name="limit">
                        <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                        <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                        <option value="15" <?= $limit == 15 ? 'selected' : '' ?>>15</option>
                        <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i> ค้นหา
                    </button>
                    <a href="?" class="clear-btn">
                        <i class="fas fa-times"></i> ล้าง
                    </a>
                </div>
            </form>
        </div>
        
        <div class="materials-table">
            <div class="table-header">
                <h3><i class="fas fa-list"></i> รายการวัตถุดิบ</h3>
                <span>ทั้งหมด <?= $totalMaterials ?> รายการ</span>
            </div>
            <div class="table-content">
                <table>
                    <thead>
                        <tr>
                            <th>รหัสผลิตภัณฑ์</th>
                            <th>ชื่อผลิตภัณฑ์</th>
                            <th>ประเภท</th>
                            <th>ผู้จัดจำหน่าย</th>
                            <th>สต็อกขั้นต่ำ</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($materials)): ?>
                            <?php foreach ($materials as $material): ?>
                                <tr>
                                    <td><?= htmlspecialchars($material['product_id']) ?></td>
                                    <td><?= htmlspecialchars($material['product_name']) ?></td>
                                    <td>
                                        <?php 
                                        $typeLabels = [
                                            'pc' => 'PC',
                                            'of' => 'Office', 
                                            'of_mat' => 'OfficeMat'
                                        ];
                                        echo htmlspecialchars($typeLabels[$material['type']] ?? $material['type']);
                                        ?>
                                    </td>
                                    <td><?= htmlspecialchars($material['supplier'] ?? '-') ?></td>
                                    <td><?= number_format($material['min_stock']) ?></td>
                                    <td>
                                        <?php if ($material['active'] == 1): ?>
                                            <span class="status-badge status-active">ใช้งาน</span>
                                        <?php else: ?>
                                            <span class="status-badge status-inactive">ไม่ใช้งาน</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="action-btn edit-btn" title="แก้ไข">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn delete-btn" title="ลบ">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center" style="text-align: center; color: #6b7280;">
                                    <i class="fas fa-info-circle"></i>
                                    ไม่พบข้อมูลวัสดุ
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <div class="pagination-info">
                    แสดง <?= ($currentPage - 1) * $limit + 1 ?>-<?= min($currentPage * $limit, $totalMaterials) ?> จาก <?= $totalMaterials ?> รายการ
                </div>
                <div class="pagination-controls">
                    <?php 
                    $queryParams = http_build_query([
                        'search' => $_GET['search'] ?? '',
                        'type' => $_GET['type'] ?? '',
                        'active' => $_GET['active'] ?? '',
                        'limit' => $limit
                    ]);
                    ?>
                    
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=<?= $currentPage - 1 ?>&<?= $queryParams ?>" class="page-btn">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <?php if ($i == 1 || $i == $totalPages || ($i >= $currentPage - 1 && $i <= $currentPage + 1)): ?>
                            <a href="?page=<?= $i ?>&<?= $queryParams ?>" 
                               class="page-btn <?= $i == $currentPage ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        <?php elseif ($i == $currentPage - 2 || $i == $currentPage + 2): ?>
                            <span style="padding: 0 0.5rem;">...</span>
                        <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=<?= $currentPage + 1 ?>&<?= $queryParams ?>" class="page-btn">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="pagination-info">
                    หน้า <?= $currentPage ?> จาก <?= $totalPages ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>