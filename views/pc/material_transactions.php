<?php include VIEWS_PATH . 'layouts/header.php'; ?>
<?php include VIEWS_PATH . 'layouts/navbar.php'; ?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="fas fa-exchange-alt me-2"></i>ธุรกรรมวัสดุ</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <button class="btn btn-success me-2">
                                <i class="fas fa-plus me-1"></i>รับวัสดุเข้า
                            </button>
                            <button class="btn btn-danger">
                                <i class="fas fa-minus me-1"></i>เบิกวัสดุออก
                            </button>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select">
                                <option>ทุกประเภทธุรกรรม</option>
                                <option>รับเข้า</option>
                                <option>เบิกออก</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="date" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                    </div>

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
                                    <th>ผู้ทำรายการ</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        ยังไม่มีธุรกรรมในวันนี้
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