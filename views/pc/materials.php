<?php include VIEWS_PATH . 'layouts/header.php'; ?>
<?php include VIEWS_PATH . 'layouts/navbar.php'; ?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-boxes me-2"></i>ข้อมูลวัสดุ</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMaterialModal">
                                <i class="fas fa-plus me-1"></i>เพิ่มวัสดุใหม่
                            </button>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ค้นหาวัสดุ...">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
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
                                    <th>หน่วยนับ</th>
                                    <th>สถานะ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        ยังไม่มีข้อมูลวัสดุ กรุณาเพิ่มข้อมูลวัสดุใหม่
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