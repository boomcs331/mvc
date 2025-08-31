<?php
/**
 * PC Controller
 * จัดการหน้าต่างๆ สำหรับ PC role
 */
class PcController extends Controller
{
    private $pcModel;

    public function __construct()
    {
        // ตรวจสอบ session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->pcModel = $this->model('PcModel');
    }


    /**
     * หน้า Dashboard สำหรับ PC
     */
    public function dashboard()
    {
        $this->requirePermission(['pc', 'admin']);
        
        $current_user = $this->getCurrentUser();
        
        $data = [
            'title' => 'PC Dashboard - ระบบจัดการวัสดุ',
            'current_user' => $current_user
        ];

        $this->view('home/dashboard', $data);
    }

    /**
     * หน้าข้อมูลวัสดุ
     */
    public function materials()
    {
        $this->requirePermission(['pc', 'admin']);

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
        
        $filters = [
            'search' => isset($_GET['search']) ? $_GET['search'] : '',
            'type' => isset($_GET['type']) ? $_GET['type'] : '',
            'active' => isset($_GET['active']) ? $_GET['active'] : ''
        ];
        
        $materials = $this->pcModel->getMaterialsPaginated($page, $limit, $filters);
        $totalMaterials = $this->pcModel->getMaterialsCount($filters);
        $totalPages = ceil($totalMaterials / $limit);

        $data = [
            'title' => 'ข้อมูลวัสดุ - ระบบจัดการวัสดุ',
            'materials' => $materials,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalMaterials' => $totalMaterials,
            'limit' => $limit,
            'search' => $filters['search']
        ];

        $this->view('pc/materials', $data);
    }

    /**
     * หน้าธุรกรรมวัสดุ
     */
    public function materialTransactions()
    {
        $this->requirePermission(['pc', 'admin']);
        
        $data = [
            'title' => 'ธุรกรรมวัสดุ - ระบบจัดการวัสดุ'
        ];

        $this->view('pc/material_transactions', $data);
    }

    /**
     * หน้าคลังวัสดุ
     */
    public function materialStock()
    {
        $this->requirePermission(['pc', 'admin']);
        
        $data = [
            'title' => 'คลังวัสดุ - ระบบจัดการวัสดุ'
        ];

        $this->view('pc/material_stock', $data);
    }

    /**
     * หน้ารายงานธุรกรรม
     */
    public function transactionReport()
    {
        $this->requirePermission(['pc', 'admin']);
        
        $data = [
            'title' => 'รายงานธุรกรรม - ระบบจัดการวัสดุ'
        ];

        $this->view('pc/transaction_report', $data);
    }
}
?>