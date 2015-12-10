<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class product_model extends CI_Model
{
public function create($subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status,$sku,$image1,$image2,$image3,$image4,$image5,$baseproduct)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"image5" => $image5,"baseproduct" => $baseproduct);
$query=$this->db->insert( "fynx_product", $data );
$id=$this->db->insert_id();
    foreach($relatedproduct AS $key=>$value)
        {
            $this->product_model->createrelatedproduct($value,$id);
        }
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
public function edit($id,$subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status, $sku,$image1,$image2,$image3,$image4,$image5,$baseproduct)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"image5" => $image5,"baseproduct" => $baseproduct);
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
         $query1=$this->db->query("DELETE FROM `relatedproduct` WHERE `product`='$id'");
    foreach($relatedproduct AS $key=>$value)
        {
            $this->product_model->createrelatedproduct($value,$id);
        }
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
    function getProductDetails($product,$user,$size,$color)
	{
        $where=" ";
        if($size){
            $where .="AND `fynx_product`.`size`='$size' ";
        }
        else{}
        if($color){
            $where .="AND `fynx_product`.`color`='$color'";
        }
          else{}
        $query['product']=$this->db->query("SELECT `fynx_product`.`id`, `fynx_product`.`subcategory`, `fynx_product`.`quantity`, `fynx_product`.`name`, `fynx_product`.`type`, `fynx_product`.`description`, `fynx_product`.`visibility`, `fynx_product`.`price`, `fynx_product`.`relatedproduct`, `fynx_product`.`category`, `fynx_product`.`color`, `fynx_product`.`size`, `fynx_product`.`sizechart`, `fynx_product`.`status`, `fynx_product`.`sku`, `fynx_product`.`image1`, `fynx_product`.`image2`, `fynx_product`.`image3`, `fynx_product`.`image4`, `fynx_product`.`image5`,`fynx_wishlist`.`user`,`fynx_product`.`baseproduct` FROM `fynx_product`
        LEFT OUTER JOIN `fynx_wishlist` ON `fynx_wishlist`.`product`=`fynx_product`.`id` AND `fynx_wishlist`.`user`='$user' 
        WHERE `fynx_product`.`id`='$product' $where")->row();
        
        $baseproduct=$query['product']->baseproduct;
		
        
      if($baseproduct !=""){
          $query['relatedproduct'] = $this->db->query("SELECT `relatedproduct`.`relatedproduct`,`fynx_product`.`id`, `fynx_product`.`subcategory`, `fynx_product`.`quantity`, `fynx_product`.`name`, `fynx_product`.`type`, `fynx_product`.`description`, `fynx_product`.`visibility`, `fynx_product`.`price`, `fynx_product`.`relatedproduct`, `fynx_product`.`category`, `fynx_product`.`color`, `fynx_product`.`size`, `fynx_product`.`sizechart`, `fynx_product`.`status`, `fynx_product`.`sku`, `fynx_product`.`image1`, `fynx_product`.`image2`, `fynx_product`.`image3`, `fynx_product`.`image4`, `fynx_product`.`image5` FROM `fynx_product`
LEFT OUTER JOIN `relatedproduct` ON `relatedproduct`.`relatedproduct`=`fynx_product`.`id`
WHERE `relatedproduct`.`product`='$product'")->result();
           $query['size'] = $this->db->query("SELECT DISTINCT `fynx_size`.`id`,`fynx_size`.`name` FROM `fynx_size` 
        WHERE `fynx_size`.`id` IN (SELECT `size` FROM `fynx_product` WHERE `baseproduct`='$baseproduct')")->result();
          $query['color'] = $this->db->query("SELECT DISTINCT `fynx_color`.`id`,`fynx_color`.`name` FROM `fynx_color` 
        WHERE `fynx_color`.`id` IN (SELECT `color` FROM `fynx_product` WHERE `baseproduct`='$baseproduct')")->result();
      }
      
		return $query;
	}
      function addtowishlist($user,$product,$color,$size)
    {
        if($user!="")
        {
             $getexactproduct=$this->db->query("'SELECT `id` FROM `fynx_product` WHERE `color`='$color' AND `size`='$size' AND `baseproduct`=(SELECT `baseproduct` FROM `fynx_product` WHERE `id`='$product')")->row();
            $exactproduct=$getexactproduct->id;
            $userwishlist=$this->db->query("SELECT * FROM `fynx_wishlist` WHERE `user`='$user' AND `product`='$exactproduct' AND `color`='$color' AND `size`='$size'")->row();
            if(empty($userwishlist))
            {
                $query=$this->db->query("INSERT INTO `fynx_wishlist`(`user`,`product`,`color`,`size`) VALUES ('$user','$exactproduct','$color','$size')");
                return $query;
            }
            else
            {
                return 0;
            }
        }
        
        return 0;
 
    }
    
}
?>
