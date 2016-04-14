<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class product_model extends CI_Model
{
public function create($subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status,$sku,$image1,$image2,$image3,$image4,$image5,$baseproduct,$discountprice)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"image5" => $image5,"baseproduct" => $baseproduct,"discountprice" => $discountprice);
$query=$this->db->insert( "fynx_product", $data );
$id=$this->db->insert_id();
//    foreach($relatedproduct AS $key=>$value)
//        {
//            $this->product_model->createrelatedproduct($value,$id);
//        }
if(!$query)
return  0;
else
return  $id;
}
    public function createrelatedproduct($value,$productid)
	{
		$data  = array(
			'relatedproduct' => $value,
			'product' => $productid
		);
		$query=$this->db->insert( 'relatedproduct', $data );
		return  1;
	}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("fynx_product")->row();
return $query;
}
function getsingleproduct($id){
$this->db->where("id",$id);
$query=$this->db->get("fynx_product")->row();
return $query;
}
public function edit($id,$subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status, $sku,$image1,$image2,$image3,$image4,$image5,$baseproduct,$discountprice)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"image5" => $image5,"baseproduct" => $baseproduct,"discountprice" => $discountprice);
    if($image1 != "")
			$data['image1']=$image1;
		if($image2 != "")
			$data['image2']=$image2;
    if($image3 != "")
			$data['image3']=$image3;
    if($image4 != "")
			$data['image4']=$image4;
    if($image5 != "")
			$data['image5']=$image5;
//         $query1=$this->db->query("DELETE FROM `relatedproduct` WHERE `product`='$id'");
//    foreach($relatedproduct AS $key=>$value)
//        {
//            $this->product_model->createrelatedproduct($value,$id);
//        }
$this->db->where( "id", $id );
$query=$this->db->update( "fynx_product", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `fynx_product` WHERE `id`='$id'");
return $query;
}
    	public function getproductdropdown()
	{
		$query=$this->db->query("SELECT * FROM `fynx_product`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => "Choose an option"
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}
    public function getvisibility()
	{
		$status= array(
            "" => "Choose an option",
			 "1" => "Yes",
			 "0" => "No",
			);
		return $status;
	}
    public function getcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `fynx_category`  ORDER BY `id` ASC")->result();
		$return=array(

		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}
    public function getimage1byid($id)
	{
		$query=$this->db->query("SELECT `image1` FROM `fynx_product` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getimage2byid($id)
	{
		$query=$this->db->query("SELECT `image2` FROM `fynx_product` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getimage3byid($id)
	{
		$query=$this->db->query("SELECT `image3` FROM `fynx_product` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getimage4byid($id)
	{
		$query=$this->db->query("SELECT `image4` FROM `fynx_product` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getimage5byid($id)
	{
		$query=$this->db->query("SELECT `image5` FROM `fynx_product` WHERE `id`='$id'")->row();
		return $query;
	}
    public function getrelatedproductcount($id)
	{
        $return=array();
		$query=$this->db->query("SELECT `fynx_product`.`id`,`fynx_product`.`name` FROM `fynx_product` LEFT OUTER JOIN `relatedproduct` ON `relatedproduct`.`relatedproduct`=`fynx_product`.`id` WHERE `relatedproduct`.`product`='$id'");
		  if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->id;
            }
        }
         return $return;
	}
    function getProductDetails($product,$user,$size,$color,$design)
	{
        
        
        // check if shoe
        $checkshoe=$this->db->query("SELECT * FROM `fynx_product` WHERE `id`='$product'")->row();
        $category=$checkshoe->category;
         $baseproduct=$checkshoe->baseproduct;
        if($baseproduct==''){
            $baseproduct=$checkshoe->productname;
        }
    if($category==3)
    {
            // IT IS A SHOE
            $where=" ";
        if($size && $color){
            $where .=" `fynx_product`.`size`='$size' AND `fynx_product`.`color`='$color' ";
        }
        else{
              $where .="`fynx_product`.`id`='$product'";
        }
        $query['product']=$this->db->query("SELECT `fynx_product`.`id`, `fynx_product`.`subcategory`, `fynx_product`.`quantity`, `fynx_product`.`name` as `name`,`fynx_product`.`name` as `productname`, `fynx_product`.`type`, `fynx_product`.`description`, `fynx_product`.`visibility`, `fynx_product`.`price`, `fynx_product`.`relatedproduct`, `fynx_product`.`category`, `fynx_product`.`color`, `fynx_product`.`size`, `fynx_product`.`sizechart`, `fynx_product`.`status`, `fynx_product`.`sku`, `productdesignimage`.`image` as `image1`,`fynx_product`.`baseproduct`,`fynx_sizechart`.`image` as `sizechartimage`,`fynx_sizechart`.`name` as `sizechartname` FROM `fynx_product`
        LEFT OUTER JOIN `productdesignimage` ON `productdesignimage`.`product`=`fynx_product`.`id`
        LEFT OUTER JOIN `fynx_sizechart` ON `fynx_sizechart`.`id`=`fynx_product`.`sizechart` WHERE $where AND `productdesignimage`.`design`=0 AND `fynx_product`.`baseproduct`='$baseproduct'")->row();
       
     

        $baseproduct=$query['product']->baseproduct;
        if($baseproduct==''){
            $baseproduct=$query['product']->productname;
        }
        $product=$query['product']->id;
          $query['relatedproduct'] = $this->db->query("SELECT `relatedproduct`.`relatedproduct` as `id`, `relatedproduct`.`design`,`productdesignimage`.`image` as `image1` FROM `relatedproduct` LEFT OUTER JOIN `productdesignimage` ON `productdesignimage`.`product`=`relatedproduct`.`relatedproduct` AND `productdesignimage`.`design` = `relatedproduct`.`design` WHERE `relatedproduct`.`product`='$product' GROUP BY `relatedproduct`.`relatedproduct` , `relatedproduct`.`design`")->result();
        $query['productdesignimage'] = $this->db->query("SELECT `id`, `product`, `design`, `image` FROM `productdesignimage` WHERE `product`='$product' AND `design`='$design'")->result();


           $query['size'] = $this->db->query("SELECT DISTINCT `fynx_size`.`id`,`fynx_size`.`name` FROM `fynx_size`
        WHERE `fynx_size`.`category`='3' AND `fynx_size`.`id` IN (SELECT DISTINCT `fynx_product`.`size` FROM `fynx_product` INNER JOIN `productdesignimage` ON `productdesignimage`.`product` = `fynx_product`.`id` AND `productdesignimage`.`design`='$design' WHERE `fynx_product`.`baseproduct` LIKE '$baseproduct' OR `fynx_product`.`name` LIKE '$baseproduct')")->result();
          $query['color'] = $this->db->query("SELECT DISTINCT `fynx_color`.`id`,`fynx_color`.`name` FROM `fynx_color`
        WHERE `fynx_color`.`id` IN (SELECT DISTINCT `fynx_product`.`color` FROM `fynx_product` INNER JOIN `productdesignimage` ON `productdesignimage`.`product` = `fynx_product`.`id` AND `productdesignimage`.`design`='$design' WHERE `fynx_product`.`baseproduct` LIKE '$baseproduct' OR `fynx_product`.`name` LIKE '$baseproduct')")->result();
    }
    else{
            // THESE ARE APPARELS
            
            
        $where=" ";
        if($size && $color){
            $where .=" `fynx_product`.`size`='$size' AND `fynx_product`.`color`='$color' ";
        }
        else{
              $where .="`fynx_product`.`id`='$product'";
        }
        $query['product']=$this->db->query("SELECT `fynx_product`.`id`, `fynx_product`.`subcategory`, `fynx_product`.`quantity`, `fynx_designs`.`name` as `name`,`fynx_product`.`name` as `productname`, `fynx_product`.`type`, `fynx_product`.`description`, `fynx_product`.`visibility`, `fynx_product`.`price`, `fynx_product`.`relatedproduct`, `fynx_product`.`category`, `fynx_product`.`color`, `fynx_product`.`size`, `fynx_product`.`sizechart`, `fynx_product`.`status`, `fynx_product`.`sku`, `productdesignimage`.`image` as `image1`,`fynx_product`.`baseproduct`,`fynx_sizechart`.`image` as `sizechartimage`,`fynx_sizechart`.`name` as `sizechartname` FROM `fynx_product`
        LEFT OUTER JOIN `productdesignimage` ON `productdesignimage`.`product`=`fynx_product`.`id`
        LEFT OUTER JOIN `fynx_sizechart` ON `fynx_sizechart`.`id`=`fynx_product`.`sizechart`
        INNER JOIN `fynx_designs` ON `fynx_designs`.`id`  = `productdesignimage`.`design` AND `fynx_designs`.`id`='$design'
        WHERE  $where  GROUP BY `fynx_product`.`id`")->row();

        $baseproduct=$query['product']->baseproduct;
        if($baseproduct==''){
            $baseproduct=$query['product']->productname;
        }
        $product=$query['product']->id;
          $query['relatedproduct'] = $this->db->query("SELECT `relatedproduct`.`relatedproduct` as `id`, `relatedproduct`.`design`,`productdesignimage`.`image` as `image1` FROM `relatedproduct` LEFT OUTER JOIN `productdesignimage` ON `productdesignimage`.`product`=`relatedproduct`.`relatedproduct` AND `productdesignimage`.`design` = `relatedproduct`.`design` WHERE `relatedproduct`.`product`='$product' GROUP BY `relatedproduct`.`relatedproduct` , `relatedproduct`.`design`")->result();
        $query['productdesignimage'] = $this->db->query("SELECT `id`, `product`, `design`, `image` FROM `productdesignimage` WHERE `product`='$product' AND `design`='$design'")->result();


           $query['size'] = $this->db->query("SELECT DISTINCT `fynx_size`.`id`,`fynx_size`.`name` FROM `fynx_size`
        WHERE `fynx_size`.`category`='$category' AND `fynx_size`.`id` IN (SELECT DISTINCT `fynx_product`.`size` FROM `fynx_product` INNER JOIN `productdesignimage` ON `productdesignimage`.`product` = `fynx_product`.`id` AND `productdesignimage`.`design`='$design' WHERE `fynx_product`.`baseproduct` LIKE '$baseproduct' OR `fynx_product`.`name` LIKE '$baseproduct')")->result();
          $query['color'] = $this->db->query("SELECT DISTINCT `fynx_color`.`id`,`fynx_color`.`name` FROM `fynx_color`
        WHERE `fynx_color`.`id` IN (SELECT DISTINCT `fynx_product`.`color` FROM `fynx_product` INNER JOIN `productdesignimage` ON `productdesignimage`.`product` = `fynx_product`.`id` AND `productdesignimage`.`design`='$design' WHERE `fynx_product`.`baseproduct` LIKE '$baseproduct' OR `fynx_product`.`name` LIKE '$baseproduct')")->result();
        }


		return $query;
	}
      function addtowishlist($user,$product,$quantity,$design)
    {
        $userwishlist=$this->db->query("SELECT * FROM `fynx_wishlist` WHERE `user`='$user' AND `product`='$product'AND `design`='$design'")->row();
        if(empty($userwishlist))
        {
            $query=$this->db->query("INSERT INTO `fynx_wishlist`(`user`,`product`,`design`) VALUES ('$user','$product','$design')");
            return $query;
        }
        else
        {
            return false;
        }


    }

    public function createbycsv($file)
	{
        foreach ($file as $row)
        {
//            print_r($row);
            $subcategory=trim($row['subcategory']);
            $quantity=trim($row['quantity']);
            $name=trim($row['name']);
            $type=trim($row['type']);
            $description=trim($row['description']);
            $price=trim($row['price']);
            $category=trim($row['category']);
            $color=trim($row['color']);
            $size=trim($row['size']);
            $sizechart=trim($row['sizechart']);
            $sizechartimage=trim($row['sizechartimage']);
            $sku=trim($row['sku']);
            $image1=trim($row['image1']);
            $image2=trim($row['image2']);
            $baseproduct=trim($row['baseproduct']);
            $designname=trim($row['designname']);
            $designs=$row['designimage'];
            if($designname!=''){
                $alldesignname=explode(",",$designname);
            }
            else{
                 $alldesignname=0;
            }
            $alldesigns=explode(",",$designs);
            
            $checkproduct=$this->db->query("SELECT * FROM `fynx_product` where `name` LIKE '$name'")->row();
            if(empty($checkproduct)){
                $data  = array(
                "quantity" => $quantity,
                "name" => $name,
                "description" => $description,
                "visibility" => 1,
                "price" => $price,
                "status" => 2,
                "sku" => $sku,
                "image1" => $image1,
                "image2" => $image2,
                "baseproduct" => $baseproduct
            );
            $query=$this->db->insert( 'fynx_product', $data );
            $productid=$this->db->insert_id();

if($alldesignname!=0)
{
           foreach($alldesignname as $key => $designname)
			{
                $designname=trim($designname);
                $designnamequery=$this->db->query("SELECT * FROM `fynx_designs` where `name` LIKE '$designname'")->row();
                if(empty($designnamequery))
                {
                    if($designname!=''){
                    // create new design and get design id
                    $this->db->query("INSERT INTO `fynx_designs`(`name`,`status`) VALUES ('$designname','2')");
                    $designid=$this->db->insert_id();


                              $this->db->query("INSERT INTO `productdesignimage`(`product`,`design`,`image`) VALUES ('$productid','$designid','$alldesigns[$key]')");
                              $productdesigndesignid=$this->db->insert_id();
                    }
                }
                else
                {
                    // get design id
                    $designid=$designnamequery->id;

                    //now directly insert design

                  $this->db->query("INSERT INTO `productdesignimage`(`product`,`design`,`image`) VALUES ('$productid','$designid','$alldesigns[$key]')");
                              $productdesigndesignid=$this->db->insert_id();

                }

           }
}
                else if($alldesignname==0){
                    foreach($alldesigns as $key => $designimage){
                        $designimage=trim($designimage);
                        $designimagequery=$this->db->query("SELECT * FROM `productdesignimage` where `product`='$productid' AND  `image`= '$designimage' AND `design`=0")->row();
                        if(empty($designimagequery))
                        {
                            $this->db->query("INSERT INTO `productdesignimage`(`product`,`design`,`image`) VALUES ('$productid','0','$designimage')");
                              $productdesigndesignid=$this->db->insert_id();
                        }
                        
                    }
                    
                }

            //            insert designs ends

            //INSERT CATEGORY
             $query1=$this->db->query("SELECT `id` FROM `fynx_category` WHERE `name` = '$category'")->row();

            if(empty($query1))
            {
                $data=array("name" => $category,"status" => 2);
                $query=$this->db->insert( "fynx_category", $data );
                $categoryid=$this->db->insert_id();

                //SUB CATEGORY

                  $querysubcat=$this->db->query("SELECT `id` FROM `fynx_subcategory` WHERE `name` = '$subcategory' AND `category`='$categoryid'")->row();
                if(empty($querysubcat))
                {
                    $data=array("name" => $subcategory,"status" => 2,"category" => $categoryid);
                    $query=$this->db->insert( "fynx_subcategory", $data );
                    $subcategoryid=$this->db->insert_id();

                    $data=array("subcategory" => $subcategoryid);
                    $this->db->where( "id", $productid );
                    $query=$this->db->update( "fynx_product", $data );

                }
                else
                {
                    $subcategoryid=$querysubcat->id;
                    $data=array("subcategory" => $subcategoryid);
                    $this->db->where( "id", $productid );
                    $query=$this->db->update( "fynx_product", $data );
                }
                // update product

                $data=array("category" => $categoryid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }
            else
            {
                  $categoryid=$query1->id;
                //SUB CATEGORY

                  $querysubcat=$this->db->query("SELECT `id` FROM `fynx_subcategory` WHERE `name` = '$subcategory' AND `category`='$categoryid'")->row();
                if(empty($querysubcat))
                {
                    $data=array("name" => $subcategory,"status" => 2,"category" => $categoryid);
                    $query=$this->db->insert( "fynx_subcategory", $data );
                    $subcategoryid=$this->db->insert_id();

                    $data=array("subcategory" => $subcategoryid);
                    $this->db->where( "id", $productid );
                    $query=$this->db->update( "fynx_product", $data );

                }
                else
                {
                    $subcategoryid=$querysubcat->id;
                    $data=array("subcategory" => $subcategoryid);
                    $this->db->where( "id", $productid );
                    $query=$this->db->update( "fynx_product", $data );
                }
                  // update product
                $data=array("category" => $categoryid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }

    //INSERT type
            $type = trim($type);
             $query2=$this->db->query("SELECT `id` FROM `fynx_type` WHERE `name` = '$type'")->row();

            if(empty($query2))
            {
                $data=array("name" => $type,"status" => 2);
                $query=$this->db->insert( "fynx_type", $data );
                $typeid=$this->db->insert_id();

                // update product
                $data=array("type" => $typeid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }
            else
            {
                  $typeid=$query2->id;
                  // update product
                $data=array("type" => $typeid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }

    //INSERT color
             $query3=$this->db->query("SELECT `id` FROM `fynx_color` WHERE `name` = '$color'")->row();

            if(empty($query3))
            {
                $data=array("name" => $color,"status" => 2);
                $query=$this->db->insert( "fynx_color", $data );
                $colorid=$this->db->insert_id();

                // update product
                $data=array("color" => $colorid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }
            else
            {
                  $colorid=$query3->id;
                  // update product
                $data=array("color" => $colorid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }

            //INSERT size
             $query4=$this->db->query("SELECT `id` FROM `fynx_size` WHERE `name` = '$size'")->row();

            if(empty($query4))
            {
                $data=array("name" => $size,"status" => 2);
                $query=$this->db->insert( "fynx_size", $data );
                $sizeid=$this->db->insert_id();

                // update product
                $data=array("size" => $sizeid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }
            else
            {
                  $sizeid=$query4->id;
                  // update product
                $data=array("size" => $sizeid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }
            //INSERT sizechart
             $query5=$this->db->query("SELECT `id` FROM `fynx_sizechart` WHERE `name` = '$sizechart'")->row();

            if(empty($query5))
            {
                $data=array("name" => $sizechart,"image"=> $sizechartimage);
                $query=$this->db->insert( "fynx_sizechart", $data );
                $sizechartid=$this->db->insert_id();

                // update product
                $data=array("sizechart" => $sizechartid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }
            else
            {
                  $sizechartid=$query5->id;
                  // update product
                $data=array("sizechart" => $sizechartid);
                $this->db->where( "id", $productid );
                $query=$this->db->update( "fynx_product", $data );
            }
         
            }
            else{
                
            }
            
           
        }
        // for related products only
        foreach($file as $row1)
        {
            $quantity=trim($row1['quantity']);
            $price=trim($row1['price']);
            $relatedproduct=trim($row1['relatedproduct']);
            $name=trim($row1['name']);
            $relateddesign=trim($row1['relateddesign']);

            if($relatedproduct !=''){
              $allrelatedproduct=explode(",",$relatedproduct);
            }
            if($relateddesign !=''){
              $allrelateddesign=explode(",",$relateddesign);
            }
          

            $checkproduct=$this->db->query("SELECT * FROM `fynx_product` where `name` LIKE '$name'")->row();
            if(empty($checkproduct))
            {
                
            }
            else
            {
                $productid=$checkproduct->id;
                
                $data  = array(
                    'quantity' => $quantity,
                    'price' => $price
                );
                $this->db->where( 'id', $productid );
                $this->db->update( 'fynx_product', $data );
                 // related products upload

                  if($allrelatedproduct)
                {
                      foreach($allrelatedproduct as $key => $relatedproduct)
                    {
                          $relatedproduct=trim($relatedproduct);
                          $relatedproductquery=$this->db->query("SELECT * FROM `fynx_product` where `name` LIKE '$relatedproduct'")->row();
                          if(empty($relatedproductquery))
                          {
                              //  no such product
                          }
                          else
                          {
                              $relatedproduct=$relatedproductquery->id;
                         
                               
                              $getdesignid=$this->db->query("SELECT * FROM `fynx_designs` where `name` LIKE '$allrelateddesign[$key]'")->row();
                              $designid=$getdesignid->id;
//                                              check related products
                              
                              
//                              CHECK PRODUCT IS SHOE
                              $catquery=$this->db->query("SELECT * FROM `fynx_product` WHERE `id`='$productid'")->row();
                              $categoryid=$catquery->category;
                              if($categoryid==3){
                                  $designid=0;
                              }
                                    $checkrelatedproduct=$this->db->query("SELECT * FROM `relatedproduct` where `product`='$productid' AND `relatedproduct`='$relatedproduct' AND `design`='$designid'")->row();

                                    if(empty($checkrelatedproduct))
                                    {
                                        $data2  = array(
                                        'product' => $productid,
                                        'relatedproduct' => $relatedproduct,
                                        'design' => $designid
                                        );
                                         $queryproductrelatedproduct=$this->db->insert( 'relatedproduct', $data2 );
                                    }  
                            
                           }
                    }
                // related products end
                }
            }


        }

			return  1;
	}

}
?>
