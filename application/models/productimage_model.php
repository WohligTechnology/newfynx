<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class productimage_model extends CI_Model
{
public function create($product,$order,$image,$status)
{
$data=array("product" => $product,"order" => $order,"image" => $image,"status" => $status);
$query=$this->db->insert( "fynx_productimage", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("fynx_productimage")->row();
return $query;
}
function getsingleproductimage($id){
$this->db->where("id",$id);
$query=$this->db->get("fynx_productimage")->row();
return $query;
}
public function edit($id,$product,$order,$image,$status)
{
$data=array("product" => $product,"order" => $order,"image" => $image,"status" => $status);
$this->db->where( "id", $id );
$query=$this->db->update( "fynx_productimage", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `fynx_productimage` WHERE `id`='$id'");
return $query;
}
}
?>
