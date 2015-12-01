<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class order_model extends CI_Model
{
public function create($user,$firstname,$lastname,$email,$billingaddress,$billingcontact,$billingcity,$billingstate,$billingpincode,$billingcountry,$shippingcity,$shippingaddress,$shippingname,$shippingcountry,$shippingcontact,$shippingstate,$shippingpincode,$trackingcode,$defaultcurrency,$shippingmethod,$orderstatus)
{
$data=array("user" => $user,"firstname" => $firstname,"lastname" => $lastname,"email" => $email,"billingaddress" => $billingaddress,"billingcontact" => $billingcontact,"billingcity" => $billingcity,"billingstate" => $billingstate,"billingpincode" => $billingpincode,"billingcountry" => $billingcountry,"shippingcity" => $shippingcity,"shippingaddress" => $shippingaddress,"shippingname" => $shippingname,"shippingcountry" => $shippingcountry,"shippingcontact" => $shippingcontact,"shippingstate" => $shippingstate,"shippingpincode" => $shippingpincode,"trackingcode" => $trackingcode,"defaultcurrency" => $defaultcurrency,"shippingmethod" => $shippingmethod,"orderstatus" => $orderstatus);
$query=$this->db->insert( "fynx_order", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("fynx_order")->row();
return $query;
}
function getsingleorder($id){
$this->db->where("id",$id);
$query=$this->db->get("fynx_order")->row();
return $query;
}
public function edit($id,$user,$firstname,$lastname,$email,$billingaddress,$billingcontact,$billingcity,$billingstate,$billingpincode,$billingcountry,$shippingcity,$shippingaddress,$shippingname,$shippingcountry,$shippingcontact,$shippingstate,$shippingpincode,$trackingcode,$defaultcurrency,$shippingmethod,$orderstatus)
{
$data=array("user" => $user,"firstname" => $firstname,"lastname" => $lastname,"email" => $email,"billingaddress" => $billingaddress,"billingcontact" => $billingcontact,"billingcity" => $billingcity,"billingstate" => $billingstate,"billingpincode" => $billingpincode,"billingcountry" => $billingcountry,"shippingcity" => $shippingcity,"shippingaddress" => $shippingaddress,"shippingname" => $shippingname,"shippingcountry" => $shippingcountry,"shippingcontact" => $shippingcontact,"shippingstate" => $shippingstate,"shippingpincode" => $shippingpincode,"trackingcode" => $trackingcode,"defaultcurrency" => $defaultcurrency,"shippingmethod" => $shippingmethod,"orderstatus" => $orderstatus);
$this->db->where( "id", $id );
$query=$this->db->update( "fynx_order", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `fynx_order` WHERE `id`='$id'");
return $query;
}
    public function getorderstatus()
	{
		$query=$this->db->query("SELECT * FROM `orderstatus` ORDER BY `name` ASC" )->result();
		$return=array(
		"" => "Choose an option"
		);
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		return $return;
	}
    public function getorderdropdown()
	{
		$query=$this->db->query("SELECT * FROM `fynx_order`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname." ".$row->lastname;
		}
		
		return $return;
	}
}
?>
