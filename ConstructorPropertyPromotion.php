<?php

class Product
{
    // property dan constructor yang umum
    public string $id;
    public string $name;
    public int $price;
    public int $quantity;
    public bool $expensive;

    public function __construct(string $id,
                                string $name,
                                int    $price = 0,
                                int    $quantity = 0,
                                bool   $expensive = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->expensive = $expensive;
    }

}

$product = new Product(id: "1", name: "Mie Ayam", price: 15000);
var_dump($product);

echo $product->name . PHP_EOL;


/**
 * Constructor Property Promotion
 * ● Kadang kita sering sekali membuat property sekaligus mengisi property tersebut menggunakan
 *    constructor
 * ● Sekarang kita bisa otomatis langsung membuat property dengan via constructor
 * ● Fitur ini mirip sekali di bahasa pemrograman seperti Kotlin dan TypeScript
 * ● https://wiki.php.net/rfc/constructor_promotion
 */
class NewProduct
{
    // Constructor Property Promotion
    public function __construct(public string $id,
                                public string $name,
                                public int    $price = 0,
                                public int    $quantity = 0,
                                private bool  $expensive = false)
    {
    }

}

$newProduct = new NewProduct(id: "1", name: "Mie Ayam", price: 15000);
var_dump($newProduct);

echo $newProduct->name . PHP_EOL;

/**
 * result:
 *object(Product)#1 (5) {
 * ["id"]=>
 * string(1) "1"
 * ["name"]=>
 * string(8) "Mie Ayam"
 * ["price"]=>
 * int(15000)
 * ["quantity"]=>
 * int(0)
 * ["expensive"]=>
 * bool(false)
 * }
 * Mie Ayam
 *
 * object(NewProduct)#2 (5) {
 * ["id"]=>
 * string(1) "1"
 * ["name"]=>
 * string(8) "Mie Ayam"
 * ["price"]=>
 * int(15000)
 * ["quantity"]=>
 * int(0)
 * ["expensive":"NewProduct":private]=>
 * bool(false)
 * }
 * Mie Ayam
 */