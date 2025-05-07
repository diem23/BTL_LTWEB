<?php
require_once('./connection.php');
class Order
{
    public $order_id;
    public $order_code;
    public $order_date;
    public $order_status;

    public function __construct($order_id, $order_code, $order_date, $order_status)
    {
        $this->$order_id = $order_id;
        $this->$order_code =  $order_code;
        $this->$order_date = $order_date;
        $this->$order_status = $order_status;
      
    }
   
    static function insert($order_code,$order_date,$order_status,$mail)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "   
            INSERT INTO orders (order_code,order_date,order_status,user_email)
            VALUES ('$order_code',  '$order_date' , '$order_status','$mail')
            ;");
        return $req;
    }
    static function insert_details($order_code,$product_id,$product_quantity,$product_size,$name,$phone,$email,$location,$method,$proof){
        $db = DB::getInstance();
        $req = $db->query(
            "   
            INSERT INTO order_details (order_code,product_id,product_quantity,product_size,name,phone,email,location,method,proof)
            VALUES ('$order_code',  '$product_id' , '$product_quantity' , '$product_size','$name' , '$phone' , '$email', '$location','$method','$proof')
            ;");
        return $req;
    }

    
    static function list_order()
    {
        $db = DB::getInstance();
        $req = $db->query(
            " SELECT * FROM  orders ORDER BY order_id DESC " );
        return $req;
    }

    static function list_order_user($mail)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "SELECT  o.order_code,od.product_quantity, product.name, product.img, o.order_status
            from orders o inner join order_details od on o.order_code= od.order_code, product
            WHERE o.user_email = '$mail' AND product.id = od.product_id" );
        return $req;
    }
    
    static function list_order_details($order_code) {
        $db = DB::getInstance();
        $query = "SELECT * FROM order_details, product WHERE product.id = order_details.product_id AND order_details.order_code = $order_code";
        $req = $db->query($query);
        return $req;
    }
    
    static function list_order_infos($order_code) {
        $db = DB::getInstance();
        $query = "SELECT * FROM order_details WHERE order_details.order_code = $order_code LIMIT 1";
        $req = $db->query($query);
        return $req;

    }
    static function confirm_status($order_code) {
        $db = DB::getInstance();
        $query = "UPDATE orders
        SET order_status = 1
        WHERE order_code = $order_code;";
        $req = $db->query($query);
        return $req;



    }
}
?>