<?php
class PcModel extends Model
{
    /**
     * ดึงข้อมูลวัสดุทั้งหมด
     */
    public function getAllMaterials()
    {
        $sql = "SELECT * FROM material WHERE active = 1 ORDER BY id DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * ดึงข้อมูลวัสดุแบบ pagination
     */
    public function getMaterialsPaginated($page = 1, $limit = 10, $filters = [])
    {
        $offset = ($page - 1) * $limit;
        $whereConditions = [];
        $params = [];
        
        // กรองตามสถานะ
        if (isset($filters['active']) && $filters['active'] !== '') {
            $whereConditions[] = "active = :active";
            $params[':active'] = $filters['active'];
        } else {
            $whereConditions[] = "active = 1";
        }
        
        // ค้นหาข้อความ
        if (!empty($filters['search'])) {
            $whereConditions[] = "(product_name LIKE :search OR product_id LIKE :search OR supplier LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        // กรองตามประเภท
        if (!empty($filters['type'])) {
            $whereConditions[] = "type = :type";
            $params[':type'] = $filters['type'];
        }
        
        $whereClause = 'WHERE ' . implode(' AND ', $whereConditions);
        $sql = "SELECT * FROM material {$whereClause} ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * นับจำนวนวัสดุทั้งหมด
     */
    public function getMaterialsCount($filters = [])
    {
        $whereConditions = [];
        $params = [];
        
        // กรองตามสถานะ
        if (isset($filters['active']) && $filters['active'] !== '') {
            $whereConditions[] = "active = :active";
            $params[':active'] = $filters['active'];
        } else {
            $whereConditions[] = "active = 1";
        }
        
        // ค้นหาข้อความ
        if (!empty($filters['search'])) {
            $whereConditions[] = "(product_name LIKE :search OR product_id LIKE :search OR supplier LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        // กรองตามประเภท
        if (!empty($filters['type'])) {
            $whereConditions[] = "type = :type";
            $params[':type'] = $filters['type'];
        }
        
        $whereClause = 'WHERE ' . implode(' AND ', $whereConditions);
        $sql = "SELECT COUNT(*) as total FROM material {$whereClause}";
        $stmt = $this->db->prepare($sql);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
