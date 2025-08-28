<?php include VIEWS_PATH . 'layouts/header.php'; ?>
<?php include VIEWS_PATH . 'layouts/navbar.php'; ?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>รายงานธุรกรรม</h5>
                </div>
                <div class="card-body">
                    <!-- Filter Section -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label class="form-label">วันที่เริ่มต้น</label>
                            <input type="date" class="form-control" value="<?= date('Y-m-01') ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">วันที่สิ้นสุด</label>
                            <input type="date" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">ประเภทธุรกรรม</label>
                            <select class="form-select">
                                <option>ทุกประเภท</option>
                                <option>รับเข้า</option>
                                <option>เบิกออก</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">&nbsp;</label>
                            <div>
                                <button class="btn btn-primary me-2">
                                    <i class="fas fa-search me-1"></i>ค้นหา
                                </button>
                                <button class="btn btn-success">
                                    <i class="fas fa-file-excel me-1"></i>Export
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Summary Cards -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>0</h4>
                                            <p class="mb-0">ธุรกรรมทั้งหมด</p>
                                        </div>
                                        <i class="fas fa-list fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>0</h4>
                                            <p class="mb-0">รับเข้า</p>
                                        </div>
                                        <i class="fas fa-arrow-down fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>0</h4>
                                            <p class="mb-0">เบิกออก</p>
                                        </div>
                                        <i class="fas fa-arrow-up fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">กราฟแสดงการเคลื่อนไหววัสดุ</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center text-muted py-5">
                                        <i class="fas fa-chart-bar fa-3x mb-3"></i>
                                        <p>ยังไม่มีข้อมูลสำหรับแสดงกราฟ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Report Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>วันที่</th>
                                    <th>เลขที่ธุรกรรม</th>
                                    <th>ประเภท</th>
                                    <th>รหัสวัสดุ</th>
                                    <th>ชื่อวัสดุ</th>
                                    <th>จำนวน</th>
                                    <th>หน่วยนับ</th>
                                    <th>ผู้ทำรายการ</th>
                                    <th>หมายเหตุ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9" class="text-center text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        ไม่พบข้อมูลธุรกรรมในช่วงเวลาที่เลือก
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