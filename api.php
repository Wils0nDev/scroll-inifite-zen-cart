<?php 

include_once 'apiproducts.php';

if(isset($_GET['idcat'])){
    $id_cat = $_GET['idcat'];
}else{
    $id_cat = '';

}
if(isset($_GET['offset'])){
    $offset = $_GET['offset'];
}else{
    $offset = '';

}
if(isset($_GET['limit'])){
    $limit = $_GET['limit'];
}else{
    $limit = '';

}

$api = new ApiProducts();

echo $api->obtenerProductos_Cat($id_cat,$offset,$limit);