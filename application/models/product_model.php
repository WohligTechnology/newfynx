<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class product_model extends CI_Model
{
public function create($subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status,$sku,$image1,$image2,$image3,$image4,$image5)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"image5" => $image5);
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
public function edit($id,$subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status, $sku,$image1,$image2,$image3,$image4,$image5)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"relatedproduct" => $relatedproduct,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku,"image1" => $image1,"image2" => $image2,"image3" => $image3,"image4" => $image4,"image5" => $image5);
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
    
}
?>
