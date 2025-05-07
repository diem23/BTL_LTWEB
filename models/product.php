<?php
require_once('./connection.php');
class Product
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $content;
    public $img;
    public $img1;
    public $img2;
    public $img3;
    public $sale;
    public $vote_number;
    public $total_stars;
    public $typeid;


    public function __construct($id, $name, $price, $description, $content, $img,$img1,$img2,$img3, $sale, $vote_number, $total_stars, $typeid )
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->content = $content;
        $this->img = $img;
        $this->img1 = $img1;
        $this->img2 = $img2;
        $this->img3 = $img3;
        $this->sale= $sale;
        $this->vote_number = $vote_number;
        $this->total_stars = $total_stars;
        $this->typeid = $typeid ;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }
        return $products;
    }
    static function getAllMen()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE typeid = 0");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }
        return $products;
    }
    static function getAllWomen()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE typeid = 1");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }
        return $products;
    }
    static function getAllShoes()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE typeid = 2");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }
        return $products;
    }

    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE id = $id");
        $result = $req->fetch_assoc();
        $product = new Product(
            $result['id'],
            $result['name'],
            $result['price'],
            $result['description'],
            $result['content'],
            $result['img'],
            $result['img1'],
            $result['img2'],
            $result['img3'],
            $result['sale'],
            $result['vote_number'],
            $result['total_stars'],
            $result['typeid']
        );
        return $product;
    }

    static function insert($name, $price, $description, $content, $img, $sale)
    {
 
        $db = DB::getInstance();
        $req = $db->query(
            " 
            INSERT INTO product ( name , price , description , content , img , sale , vote_number , total_stars)
            VALUES ('$name', '$price', '$description', '$content', '$img', '$sale' ,'0' , '0')
            ;");
        return $req;
    }
    static function insertmen($name, $price, $description, $content, $img,$img1,$img2,$img3, $sale)
    {
 
        $db = DB::getInstance();
        $req = $db->query(
            " 
            INSERT INTO product ( name , price , description , content , img , img1 , img2 , img3 , sale , vote_number , total_stars , typeid )
            VALUES ('$name', '$price', '$description', '$content', '$img', '$img1' , '$img2' , '$img3' ,'$sale' ,'0' , '0' , '0')
            ;");
        return $req;
    }
    static function insertwomen($name, $price, $description, $content, $img , $img1 , $img2 , $img3, $sale)
    {
 
        $db = DB::getInstance();
        $req = $db->query(
            " 
            INSERT INTO product ( name , price , description , content , img , img1 , img2 , img3 , sale , vote_number , total_stars , typeid )
            VALUES ('$name', '$price', '$description', '$content', '$img', '$img1', '$img2', '$img3', '$sale' ,'0' , '0' , '1')
            ;");
        return $req;
    }
    static function insertshoes($name, $price, $description, $content, $img , $img1 , $img2 , $img3, $sale)
    {
 
        $db = DB::getInstance();
        $req = $db->query(
            " 
            INSERT INTO product ( name , price , description , content , img , img1 , img2 , img3 , sale , vote_number , total_stars , typeid )
            VALUES ('$name', '$price', '$description', '$content', '$img', '$img1', '$img2', '$img3', '$sale' ,'0' , '0' , '2')
            ;");
        return $req;
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE id = $id");
        return $req;
    }

    static function update($id, $name, $price, $description, $content, $img,$img1, $img2,$img3,$sale)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE product
                SET name = '$name', price = $price, description = '$description', content = '$content', img = '$img' , img1 = '$img1' ,img2 = '$img2' ,img3 = '$img3' ,sale = '$sale'
                WHERE id = $id ; 
            ;");
    }
    static function search($keyword)
    {
        $db = DB::getInstance();
        $keyword = $db->real_escape_string($keyword); // Để ngăn chặn SQL injection
    
        $req = $db->query("SELECT * FROM product WHERE name LIKE '%$keyword%'");
        $products = [];
    
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }
    
        return $products;
    }
    static function addvotebyid($id,$star){
        $db = DB::getInstance();
        $req = $db->query(
            "
                UPDATE product
                SET vote_number = vote_number + 1 , total_stars = total_stars + $star 
                WHERE id = $id ; 
            ;");


    }
    public static function sortByPriceHighToLowMen()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE typeid = 0 ORDER BY (price - (price * sale / 100)) DESC");
        $products = [];

        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }

        return $products;
    }

    public static function sortByPriceLowToHighMen()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product  WHERE typeid = 0 ORDER BY (price - (price * sale / 100)) ASC");
        $products = [];

        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }

        return $products;
    }

    public static function sortByPriceHighToLowWomen()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE typeid = 1 ORDER BY (price - (price * sale / 100)) DESC");
        $products = [];

        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }

        return $products;
    }

    public static function sortByPriceLowToHighWomen()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product  WHERE typeid = 1 ORDER BY (price - (price * sale / 100)) ASC");
        $products = [];

        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }

        return $products;
    }

    public static function sortByPriceHighToLowShoes()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE typeid = 2 ORDER BY (price - (price * sale / 100)) DESC");
        $products = [];

        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }

        return $products;
    }

    public static function sortByPriceLowToHighShoes()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product  WHERE typeid = 2 ORDER BY (price - (price * sale / 100)) ASC");
        $products = [];

        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product) {
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['description'],
                $product['content'],
                $product['img'],
                $product['img1'],
                $product['img2'],
                $product['img3'],
                $product['sale'],
                $product['vote_number'],
                $product['total_stars'],
                $product['typeid']
            );
        }

        return $products;
    }
}
?>