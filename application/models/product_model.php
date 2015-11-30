<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class product_model extends CI_Model
{
public function create($subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status,$sku)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"relatedproduct" => $relatedproduct,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku);
$query=$this->db->insert( "fynx_product", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
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
public function edit($id,$subcategory,$quantity,$name,$type,$description,$visibility,$price,$relatedproduct,$category,$color,$size,$sizechart,$status,"sku" => $sku)
{
$data=array("subcategory" => $subcategory,"quantity" => $quantity,"name" => $name,"type" => $type,"description" => $description,"visibility" => $visibility,"price" => $price,"relatedproduct" => $relatedproduct,"category" => $category,"color" => $color,"size" => $size,"sizechart" => $sizechart,"status" => $status,"sku" => $sku);
$this->db->where( "id", $id );
$query=$this->db->update( "fynx_product", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `fynx_product` WHERE `id`='$id'");
return $query;
}
}
?>
