<?php
require_once('./connection.php');
class Delivery
{
    public $hoTen;
    public $soDienThoai;
    public $email;
    public $tinhThanh;
    public $quanHuyen;
    public $phuongXa;
    public $diaChi;

    public function __construct($hoTen, $soDienThoai, $email, $tinhThanh, $quanHuyen, $phuongXa, $diaChi)
    {
        $this->hoTen = $hoTen;
        $this->soDienThoai = $soDienThoai;
        $this->email = $email;
        $this->tinhThanh = $tinhThanh;
        $this->quanHuyen = $quanHuyen;
        $this->phuongXa = $phuongXa;
        $this->diaChi = $diaChi;
    }

   /* static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM delivery ORDER BY ngayDatHang DESC");
        $deliveries = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $delivery)
        {
            $deliveries[] = new Delivery(
                $delivery['id'],
                $delivery['hoTen'],
                $delivery['soDienThoai'],
                $delivery['email'],
                $delivery['tinhThanh'],
                $delivery['quanHuyen'],
                $delivery['phuongXa'],
                $delivery['diaChi'],
                $delivery['ngayDatHang'],
                $delivery['tongTienHang']
            );
        }
        return $deliveries;
    } */

   /* static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM delivery WHERE id = $id");
        $result = $req->fetch_assoc();
        $delivery = new Delivery(
            $result['hoTen'],
            $result['soDienThoai'],
            $result['email'],
            $result['tinhThanh'],
            $result['quanHuyen'],
            $result['phuongXa'],
            $result['diaChi'],
            $result['ngayDatHang'],
            $result['tongTienHang']
        );
        return $delivery;
    } */

    static function insert($hoTen, $soDienThoai, $email, $tinhThanh, $quanHuyen, $phuongXa, $diachi)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
            INSERT INTO order_details (name, phone, email, province, district, ward, address)
            VALUES ('$hoTen', '$soDienThoai', '$email', '$tinhThanh', '$quanHuyen', '$phuongXa', '$diachi')
            ;");
        return $req;
    }
}
?>