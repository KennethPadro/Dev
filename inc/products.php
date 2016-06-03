<?php

/*
 * Returns the four most recent products, using the order of the elements in the array
 * @return   array           a list of the last four products in the array;
                             the most recent product is the last one in the array
 */
function get_products_recent() {
    $recent = array();
    $all = get_products_all();

    $total_products = count($all);
    $position = 0;
    
    foreach($all as $product) {
        $position = $position + 1;
        if ($total_products - $position < 4) {
            $recent[] = $product;
        }
    }
    return $recent;
}

/*
 * Loops through all the products, looking for a search term in the product names
 * @param    string    $s    the search term
 * @return   array           a list of the products that contain the search term in their name
 */
function get_products_search($s) {
    $results = array();
    $all = get_products_all();

    foreach($all as $product) {
        if (stripos($product["name"],$s) !== false) {
            $results[] = $product;
        }
    }
    return $results;
}

/*
 * Counts the total number of products
 * @return   int             the total number of products
 */
function get_products_count() {
    return count(get_products_all());
}

/*
 * Returns a specified subset of products, based on the values received,
 * using the order of the elements in the array .
 * @param    int             the position of the first product in the requested subset 
 * @param    int             the position of the last product in the requested subset 
 * @return   array           the list of products that correspond to the start and end positions
 */
function get_products_subset($positionStart, $positionEnd) {
    $subset = array();
    $all = get_products_all();

    $position = 0;
    foreach($all as $product) {
        $position += 1;
        if ($position >= $positionStart && $position <= $positionEnd) {
            $subset[] = $product;
        }
    }
    return $subset;
}

/*
 * Returns the full list of products. This function contains the full list of products,
 * and the other model functions first call this function.
 * @return   array           the full list of products
 */
function get_products_all() {
    /*
    $products = array();
    $products[101] = array(
    	"name" => "Logo Shirt, Red",
    	"img" => "img/shirts/shirt-101.jpg",
    	"price" => 18,
    	"paypal" => "9P7DLECFD4LKE",
        "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[102] = array(
    	"name" => "Mike the Frog Shirt, Black",
        "img" => "img/shirts/shirt-102.jpg",
        "price" => 20,
        "paypal" => "SXKPTHN2EES3J",
        "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[103] = array(
        "name" => "Mike the Frog Shirt, Blue",
        "img" => "img/shirts/shirt-103.jpg",    
        "price" => 20,
        "paypal" => "7T8LK5WXT5Q9J",
        "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[104] = array(
        "name" => "Logo Shirt, Green",
        "img" => "img/shirts/shirt-104.jpg",    
        "price" => 18,
        "paypal" => "YKVL5F87E8PCS",
        "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[105] = array(
        "name" => "Mike the Frog Shirt, Yellow",
        "img" => "img/shirts/shirt-105.jpg",    
        "price" => 25,
        "paypal" => "4CLP2SCVYM288",
        "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[106] = array(
        "name" => "Logo Shirt, Gray",
        "img" => "img/shirts/shirt-106.jpg",    
        "price" => 20,
        "paypal" => "TNAZ2RGYYJ396",
        "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[107] = array(
        "name" => "Logo Shirt, Teal",
        "img" => "img/shirts/shirt-107.jpg",    
        "price" => 20,
        "paypal" => "S5FMPJN6Y2C32",
        "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[108] = array(
        "name" => "Mike the Frog Shirt, Orange",
        "img" => "img/shirts/shirt-108.jpg",    
        "price" => 25,
        "paypal" => "JMFK7P7VEHS44",
        "sizes" => array("Large","X-Large")
    );
    $products[109] = array(
            "name" => "Get Coding Shirt, Gray",
            "img" => "img/shirts/shirt-109.jpg",    
            "price" => 20,
            "paypal" => "B5DAJHWHDA4RC",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[110] = array(
            "name" => "HTML5 Shirt, Orange",
            "img" => "img/shirts/shirt-110.jpg",    
            "price" => 22,
            "paypal" => "6T2LVA8EDZR8L",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[111] = array(
            "name" => "CSS3 Shirt, Gray",
            "img" => "img/shirts/shirt-111.jpg",    
            "price" => 22,
            "paypal" => "MA2WQGE2KCWDS",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[112] = array(
            "name" => "HTML5 Shirt, Blue",
            "img" => "img/shirts/shirt-112.jpg",    
            "price" => 22,
            "paypal" => "FWR955VF5PALA",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[113] = array(
            "name" => "CSS3 Shirt, Black",
            "img" => "img/shirts/shirt-113.jpg",    
            "price" => 22,
            "paypal" => "4ELH2M2FW7272",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[114] = array(
            "name" => "PHP Shirt, Yellow",
            "img" => "img/shirts/shirt-114.jpg",    
            "price" => 24,
            "paypal" => "AT3XQ3ZVP2DZG",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[115] = array(
            "name" => "PHP Shirt, Purple",
            "img" => "img/shirts/shirt-115.jpg",    
            "price" => 24,
            "paypal" => "LYESEKV9JWE3A",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[116] = array(
            "name" => "PHP Shirt, Green",
            "img" => "img/shirts/shirt-116.jpg",    
            "price" => 24,
            "paypal" => "KT7MRRJUXZR34",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[117] = array(
            "name" => "Get Coding Shirt, Red",
            "img" => "img/shirts/shirt-117.jpg",    
            "price" => 20,
            "paypal" => "5UXJG8PXRXFKE",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[118] = array(
            "name" => "Mike the Frog Shirt, Purple",
            "img" => "img/shirts/shirt-118.jpg",    
            "price" => 25,
            "paypal" => "KHP8PYPDZZFTA",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[119] = array(
            "name" => "CSS3 Shirt, Purple",
            "img" => "img/shirts/shirt-119.jpg",    
            "price" => 22,
            "paypal" => "BFJRFE24L93NW",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[120] = array(
            "name" => "HTML5 Shirt, Red",
            "img" => "img/shirts/shirt-120.jpg",    
            "price" => 22,
            "paypal" => "RUVJSBR9FXXWQ",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[121] = array(
            "name" => "Get Coding Shirt, Blue",
            "img" => "img/shirts/shirt-121.jpg",    
            "price" => 20,
            "paypal" => "PGN6ULGFZTXL4",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[122] = array(
            "name" => "PHP Shirt, Gray",
            "img" => "img/shirts/shirt-122.jpg",    
            "price" => 24,
            "paypal" => "PYR4QH97W2TSJ",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[123] = array(
            "name" => "Mike the Frog Shirt, Green",
            "img" => "img/shirts/shirt-123.jpg",    
            "price" => 25,
            "paypal" => "STDAUJJTSPT54",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[124] = array(
            "name" => "Logo Shirt, Yellow",
            "img" => "img/shirts/shirt-124.jpg",    
            "price" => 20,
            "paypal" => "2R2U74KWU5RXG",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[125] = array(
            "name" => "CSS3 Shirt, Blue",
            "img" => "img/shirts/shirt-125.jpg",    
            "price" => 22,
            "paypal" => "GJG7F8EW3XFAS",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[126] = array(
            "name" => "Doctype Shirt, Green",
            "img" => "img/shirts/shirt-126.jpg",    
            "price" => 25,
            "paypal" => "QW2LFRYGU7L4Q",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[127] = array(
            "name" => "Logo Shirt, Purple",
            "img" => "img/shirts/shirt-127.jpg",    
            "price" => 20,
            "paypal" => "GFV6QVRMJU7F8",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[128] = array(
            "name" => "Doctype Shirt, Purple",
            "img" => "img/shirts/shirt-128.jpg",    
            "price" => 25,
            "paypal" => "BARQMHMB565PN",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[129] = array(
            "name" => "Get Coding Shirt, Green",
            "img" => "img/shirts/shirt-129.jpg",    
            "price" => 20,
            "paypal" => "DH9GXABU3P8GS",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[130] = array(
            "name" => "HTML5 Shirt, Teal",
            "img" => "img/shirts/shirt-130.jpg",    
            "price" => 22,
            "paypal" => "4LZ3EUVCBENE4",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[131] = array(
            "name" => "Logo Shirt, Orange",
            "img" => "img/shirts/shirt-131.jpg",    
            "price" => 20,
            "paypal" => "7BNDYJBKWD364",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    $products[132] = array(
            "name" => "Mike the Frog Shirt, Red",
            "img" => "img/shirts/shirt-132.jpg",    
            "price" => 25,
            "paypal" => "Y6EQRE445MYYW",
            "sizes" => array("Small","Medium","Large","X-Large")
    );
    // when creating a new product, create it first in PayPal and
    // then copy the product ID from PayPal to use here     

    // automated duplication to copy the product_id/sku from the array key
    // and duplicate it into the product details inside the array
    foreach ($products as $product_id => $product) {
        $products[$product_id]["sku"] = $product_id;
    }
    */

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("SELECT name, price, img, sku, paypal FROM products ORDER BY sku ASC");
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $products = $results->fetchAll(PDO::FETCH_ASSOC);    

    return $products;
}

/*
 *Returns an array of product info for the product that matches the sku;
 *returns a boolean false if no product matches the sku
 *param int Sku the sku
 */


function get_product_single($sku){

    require(ROOT_PATH . "inc/database.php");

    try{
        $results = $db->prepare("SELECT name, price, img, sku, paypal FROM products WHERE sku = ?");
        $results->bindParam(1,$sku);
        $results->execute();
            } catch (Exception $e){
        echo "Data could not be retrieved form the database.";
        exit;
    }

    $product = $results->fetch(PDO::FETCH_ASSOC);

    echo "<pre>";
    var_dump($product);
    exit();

    return $product;

}

?>