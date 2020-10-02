<?php


include_once "productos.php";
include_once "configure.php";
include_once "html_output.php";

class ApiProducts
{
    public function obtenerProductos_Cat($id_cat,$offset,$limit)
    {
       
        ;

        $pro = new Productos();
        $products = array();
        $products["items"] = array();

        if (!empty($id_cat)) {
          
            $res = $pro->obtenerProductos_Cat($id_cat,$offset,$limit);
            
            if ($res->num_rows > 0) {
                
                while ($row = $res->fetch_array(MYSQLI_ASSOC)) {

                
                    $item = array(
                        
                        'imagen_product' => zen_image(DIR_WS_IMAGES.$row["products_image"], $row['products_name'], '', 120, 'class="listingProductImage" id="imgnp"'),
                        'name_product' => substr($row["products_name"],0,26),
                        'quantity_product' => $row["products_quantity"],
                        'id_product' => $row['products_id'],
                        'type_product' => $row['products_type'],
                        'id_manufacturers' =>$row["manufacturers_id"],
                        'price_products' => substr($row["products_price"],0,5),
                        'tax_class_id_products' => $row["products_tax_class_id"],
                        'description_products' => $row["products_description"],
                        'specials_new_products_price' => $row["specials_new_products_price"],
                        'final_price' => substr($row["final_price"],0,5),
                         'products_sort_order' => $row["products_sort_order"],
                         'product_is_call' => $row["product_is_call"],
                         'product_is_always_free_shipping' => $row["product_is_always_free_shipping"],
                         'products_qty_box_status' => $row["products_qty_box_status"]
    
                    );
                    
                    array_push($products["items"], $item);
                }
                 echo json_encode($products,JSON_UNESCAPED_UNICODE);
                 
               
            } else {
                echo json_encode(array('mensaje' => 'No hay elementos para mostrar'));
            }
        } else {
            echo json_encode(array('mensaje' => 'No hay elementos para mostrar'));
        }
    }
}


