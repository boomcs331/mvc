<?php include VIEWS_PATH . 'layouts/header.php'; ?>
<?php include VIEWS_PATH . 'layouts/navbar.php'; ?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-warehouse me-2"></i>คลังวัสดุ</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ค้นหาวัสดุในคลัง...">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>ทุกหมวดหมู่</option>
                                <option>PC</option>
                                <option>OF</option>
                                <option>OF-MAT</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option>ทุกสถานะ</option>
                                <option>มีสต็อก</option>
                                <option>สต็อกต่ำ</option>
                                <option>หมดสต็อก</option>
                            </select>
                        </div>
                    </div>

                    <!-- Summary Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>0</h4>
                                            <p class="mb-0">รายการวัสดุทั้งหมด</p>
                                        </div>
                                        <i class="fas fa-boxes fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>0</h4>
                                            <p class="mb-0">มีสต็อก</p>
                                        </div>
                                        <i class="fas fa-check-circle fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>0</h4>
                                            <p class="mb-0">สต็อกต่ำ</p>
                                        </div>
                                        <i class="fas fa-exclamation-triangle fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>0</h4>
                                            <p class="mb-0">หมดสต็อก</p>
                                        </div>
                                        <i class="fas fa-times-circle fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>รหัสวัสดุ</th>
                                    <th>ชื่อวัสดุ</th>
                                    <th>หมวดหมู่</th>
                                    <th>จำนวนคงเหลือ</th>
                                    <th>หน่วยนับ</th>
                                    <th>จุดสั่งซื้อ</th>
                                    <th>สถานะ</th>
                                    <th>อัพเดทล่าสุด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        ยังไม่มีข้อมูลสต็อกวัสดุ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include VIEWS_PATH . 'layouts/footer.php'; ?>