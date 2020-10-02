<?php

include_once 'db.php';

class Productos{

    public function __construct()
    {
        $this->db = DataBase::connect();
    }


    function obtenerProductos_Cat($id_cat,$offset,$limit){
  // We show them all
 
        $listing_sql = "select p.products_image, pd.products_name, p.products_quantity,  p.products_id, p.products_type, p.manufacturers_id, p.products_price, p.products_tax_class_id, pd.products_description, IF(s.status = 1, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status =1, s.specials_new_products_price, p.products_price) as final_price, p.products_sort_order, p.product_is_call, p.product_is_always_free_shipping, p.products_qty_box_status
         from  mobelh_products_description  pd, mobelh_products p left join mobelh_manufacturers  m on p.manufacturers_id = m.manufacturers_id,
          mobelh_products_to_categories p2c left join mobelh_specials s on p2c.products_id = s.products_id
         where p.products_status = 1
           and p.products_id = p2c.products_id
           and pd.products_id = p2c.products_id
           and pd.language_id = '2'
           and p2c.categories_id = {$id_cat} LIMIT {$offset},{$limit}";
           
           
            
           
           $produc = $this->db->query($listing_sql);
           
           
           return $produc;
      
    }  
}
 
