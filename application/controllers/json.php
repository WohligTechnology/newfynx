<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{function getalluseraddress()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_useraddress`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_useraddress`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_useraddress`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_useraddress`.`billingcity`";
$elements[3]->sort="1";
$elements[3]->header="Billing City";
$elements[3]->alias="billingcity";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_useraddress`.`billingstate`";
$elements[4]->sort="1";
$elements[4]->header="Billing State";
$elements[4]->alias="billingstate";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_useraddress`.`billingcountry`";
$elements[5]->sort="1";
$elements[5]->header="Billing Country";
$elements[5]->alias="billingcountry";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_useraddress`.`shippingcity`";
$elements[6]->sort="1";
$elements[6]->header="Shipping City";
$elements[6]->alias="shippingcity";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`fynx_useraddress`.`shippingstate`";
$elements[7]->sort="1";
$elements[7]->header="Shipping State";
$elements[7]->alias="shippingstate";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`fynx_useraddress`.`shippingcountry`";
$elements[8]->sort="1";
$elements[8]->header="Shipping Country";
$elements[8]->alias="shippingcountry";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`fynx_useraddress`.`shippingpincode`";
$elements[9]->sort="1";
$elements[9]->header="Shipping Pincode";
$elements[9]->alias="shippingpincode";

$elements=array();
$elements[10]=new stdClass();
$elements[10]->field="`fynx_useraddress`.`billingaddress`";
$elements[10]->sort="1";
$elements[10]->header="Billing Address";
$elements[10]->alias="billingaddress";

$elements=array();
$elements[11]=new stdClass();
$elements[11]->field="`fynx_useraddress`.`shippingaddress`";
$elements[11]->sort="1";
$elements[11]->header="Shipping Address";
$elements[11]->alias="shippingaddress";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_useraddress`");
$this->load->view("json",$data);
}
public function getsingleuseraddress()
{
$id=$this->input->get_post("id");
$data["message"]=$this->useraddress_model->getsingleuseraddress($id);
$this->load->view("json",$data);
}
function getallcart()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_cart`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_cart`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_cart`.`quantity`";
$elements[2]->sort="1";
$elements[2]->header="Quantity";
$elements[2]->alias="quantity";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_cart`.`product`";
$elements[3]->sort="1";
$elements[3]->header="Product";
$elements[3]->alias="product";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_cart`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Timestamp";
$elements[4]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_cart`");
$this->load->view("json",$data);
}
public function getsinglecart()
{
$id=$this->input->get_post("id");
$data["message"]=$this->cart_model->getsinglecart($id);
$this->load->view("json",$data);
}
function getallwishlist()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_wishlist`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_wishlist`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_wishlist`.`product`";
$elements[2]->sort="1";
$elements[2]->header="Product";
$elements[2]->alias="product";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_wishlist`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_wishlist`");
$this->load->view("json",$data);
}
public function getsinglewishlist()
{
$id=$this->input->get_post("id");
$data["message"]=$this->wishlist_model->getsinglewishlist($id);
$this->load->view("json",$data);
}
function getallcredit()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_credit`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_credit`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_credit`.`credit`";
$elements[2]->sort="1";
$elements[2]->header="Credit";
$elements[2]->alias="credit";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_credit`.`addcredit`";
$elements[3]->sort="1";
$elements[3]->header="Add Credit";
$elements[3]->alias="addcredit";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_credit`");
$this->load->view("json",$data);
}
public function getsinglecredit()
{
$id=$this->input->get_post("id");
$data["message"]=$this->credit_model->getsinglecredit($id);
$this->load->view("json",$data);
}
function getallproduct()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_product`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_product`.`subcategory`";
$elements[1]->sort="1";
$elements[1]->header="Subcategory";
$elements[1]->alias="subcategory";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_product`.`quantity`";
$elements[2]->sort="1";
$elements[2]->header="Quantity";
$elements[2]->alias="quantity";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_product`.`name`";
$elements[3]->sort="1";
$elements[3]->header="Name";
$elements[3]->alias="name";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_product`.`type`";
$elements[4]->sort="1";
$elements[4]->header="Type";
$elements[4]->alias="type";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_product`.`description`";
$elements[5]->sort="1";
$elements[5]->header="Description";
$elements[5]->alias="description";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_product`.`visibility`";
$elements[6]->sort="1";
$elements[6]->header="Visibility";
$elements[6]->alias="visibility";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`fynx_product`.`price`";
$elements[7]->sort="1";
$elements[7]->header="Price";
$elements[7]->alias="price";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`fynx_product`.`relatedproduct`";
$elements[8]->sort="1";
$elements[8]->header="Related Product";
$elements[8]->alias="relatedproduct";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`fynx_product`.`category`";
$elements[9]->sort="1";
$elements[9]->header="Category";
$elements[9]->alias="category";

$elements=array();
$elements[10]=new stdClass();
$elements[10]->field="`fynx_product`.`color`";
$elements[10]->sort="1";
$elements[10]->header="Color";
$elements[10]->alias="color";

$elements=array();
$elements[11]=new stdClass();
$elements[11]->field="`fynx_product`.`size`";
$elements[11]->sort="1";
$elements[11]->header="Size";
$elements[11]->alias="size";

$elements=array();
$elements[12]=new stdClass();
$elements[12]->field="`fynx_product`.`sizechart`";
$elements[12]->sort="1";
$elements[12]->header="Size Chart";
$elements[12]->alias="sizechart";

$elements=array();
$elements[13]=new stdClass();
$elements[13]->field="`fynx_product`.`status`";
$elements[13]->sort="1";
$elements[13]->header="Status";
$elements[13]->alias="status";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_product`");
$this->load->view("json",$data);
}
public function getsingleproduct()
{
$id=$this->input->get_post("id");
$data["message"]=$this->product_model->getsingleproduct($id);
$this->load->view("json",$data);
}
function getallproductimage()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_productimage`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_productimage`.`product`";
$elements[1]->sort="1";
$elements[1]->header="Product";
$elements[1]->alias="product";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_productimage`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_productimage`.`image`";
$elements[3]->sort="1";
$elements[3]->header="Image";
$elements[3]->alias="image";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_productimage`.`status`";
$elements[4]->sort="1";
$elements[4]->header="Status";
$elements[4]->alias="status";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_productimage`");
$this->load->view("json",$data);
}
public function getsingleproductimage()
{
$id=$this->input->get_post("id");
$data["message"]=$this->productimage_model->getsingleproductimage($id);
$this->load->view("json",$data);
}
function getalldesigner()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_designer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_designer`.`email`";
$elements[1]->sort="1";
$elements[1]->header="Email Id";
$elements[1]->alias="email";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_designer`.`noofdesigns`";
$elements[2]->sort="1";
$elements[2]->header="No of Designs";
$elements[2]->alias="noofdesigns";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_designer`.`designerid`";
$elements[3]->sort="1";
$elements[3]->header="Designer Id";
$elements[3]->alias="designerid";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_designer`.`name`";
$elements[4]->sort="1";
$elements[4]->header="Name";
$elements[4]->alias="name";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_designer`.`contact`";
$elements[5]->sort="1";
$elements[5]->header="Contact";
$elements[5]->alias="contact";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_designer`.`commission`";
$elements[6]->sort="1";
$elements[6]->header="Commission in %";
$elements[6]->alias="commission";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_designer`");
$this->load->view("json",$data);
}
public function getsingledesigner()
{
$id=$this->input->get_post("id");
$data["message"]=$this->designer_model->getsingledesigner($id);
$this->load->view("json",$data);
}
function getalldesigns()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_designs`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_designs`.`designer`";
$elements[1]->sort="1";
$elements[1]->header="Designer";
$elements[1]->alias="designer";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_designs`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_designs`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_designs`.`timestamp`";
$elements[4]->sort="1";
$elements[4]->header="Timestamp";
$elements[4]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_designs`");
$this->load->view("json",$data);
}
public function getsingledesigns()
{
$id=$this->input->get_post("id");
$data["message"]=$this->designs_model->getsingledesigns($id);
$this->load->view("json",$data);
}
function getallhomeslide()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_homeslide`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_homeslide`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_homeslide`.`link`";
$elements[2]->sort="1";
$elements[2]->header="Link";
$elements[2]->alias="link";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_homeslide`.`target`";
$elements[3]->sort="1";
$elements[3]->header="Target";
$elements[3]->alias="target";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_homeslide`.`status`";
$elements[4]->sort="1";
$elements[4]->header="Status";
$elements[4]->alias="status";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_homeslide`.`image`";
$elements[5]->sort="1";
$elements[5]->header="Image";
$elements[5]->alias="image";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_homeslide`.`template`";
$elements[6]->sort="1";
$elements[6]->header="Template";
$elements[6]->alias="template";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`fynx_homeslide`.`class`";
$elements[7]->sort="1";
$elements[7]->header="Class";
$elements[7]->alias="class";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`fynx_homeslide`.`text`";
$elements[8]->sort="1";
$elements[8]->header="Text";
$elements[8]->alias="text";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`fynx_homeslide`.`centeralign`";
$elements[9]->sort="1";
$elements[9]->header="Center Align";
$elements[9]->alias="centeralign";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_homeslide`");
$this->load->view("json",$data);
}
public function getsinglehomeslide()
{
$id=$this->input->get_post("id");
$data["message"]=$this->homeslide_model->getsinglehomeslide($id);
$this->load->view("json",$data);
}
function getalltype()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_type`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_type`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_type`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_type`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_type`");
$this->load->view("json",$data);
}
public function getsingletype()
{
$id=$this->input->get_post("id");
$data["message"]=$this->type_model->getsingletype($id);
$this->load->view("json",$data);
}
function getallcategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_category`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_category`.`order`";
$elements[1]->sort="1";
$elements[1]->header="Order";
$elements[1]->alias="order";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_category`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_category`.`parent`";
$elements[3]->sort="1";
$elements[3]->header="Parent";
$elements[3]->alias="parent";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_category`.`status`";
$elements[4]->sort="1";
$elements[4]->header="Status";
$elements[4]->alias="status";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_category`.`image1`";
$elements[5]->sort="1";
$elements[5]->header="Image1";
$elements[5]->alias="image1";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_category`.`image2`";
$elements[6]->sort="1";
$elements[6]->header="Image2";
$elements[6]->alias="image2";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_category`");
$this->load->view("json",$data);
}
public function getsinglecategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->category_model->getsinglecategory($id);
$this->load->view("json",$data);
}
function getallcolor()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_color`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_color`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_color`.`status`";
$elements[2]->sort="1";
$elements[2]->header="Status";
$elements[2]->alias="status";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_color`.`timestamp`";
$elements[3]->sort="1";
$elements[3]->header="Timestamp";
$elements[3]->alias="timestamp";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_color`");
$this->load->view("json",$data);
}
public function getsinglecolor()
{
$id=$this->input->get_post("id");
$data["message"]=$this->color_model->getsinglecolor($id);
$this->load->view("json",$data);
}
function getalloffer()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_offer`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_offer`.`title`";
$elements[1]->sort="1";
$elements[1]->header="Title";
$elements[1]->alias="title";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_offer`.`description`";
$elements[2]->sort="1";
$elements[2]->header="Description";
$elements[2]->alias="description";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_offer`.`price`";
$elements[3]->sort="1";
$elements[3]->header="Price";
$elements[3]->alias="price";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_offer`.`status`";
$elements[4]->sort="1";
$elements[4]->header="Status";
$elements[4]->alias="status";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_offer`.`image`";
$elements[5]->sort="1";
$elements[5]->header="Image";
$elements[5]->alias="image";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_offer`.`fromdate`";
$elements[6]->sort="1";
$elements[6]->header="From Date";
$elements[6]->alias="fromdate";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`fynx_offer`.`todate`";
$elements[7]->sort="1";
$elements[7]->header="To Date";
$elements[7]->alias="todate";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_offer`");
$this->load->view("json",$data);
}
public function getsingleoffer()
{
$id=$this->input->get_post("id");
$data["message"]=$this->offer_model->getsingleoffer($id);
$this->load->view("json",$data);
}
function getallofferproduct()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_offerproduct`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_offerproduct`.`offer`";
$elements[1]->sort="1";
$elements[1]->header="Offer";
$elements[1]->alias="offer";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_offerproduct`.`product`";
$elements[2]->sort="1";
$elements[2]->header="Product";
$elements[2]->alias="product";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_offerproduct`.`quantity`";
$elements[3]->sort="1";
$elements[3]->header="Quantity";
$elements[3]->alias="quantity";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_offerproduct`");
$this->load->view("json",$data);
}
public function getsingleofferproduct()
{
$id=$this->input->get_post("id");
$data["message"]=$this->offerproduct_model->getsingleofferproduct($id);
$this->load->view("json",$data);
}
function getallsubcategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_subcategory`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_subcategory`.`category`";
$elements[1]->sort="1";
$elements[1]->header="Category";
$elements[1]->alias="category";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_subcategory`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_subcategory`.`order`";
$elements[3]->sort="1";
$elements[3]->header="Order";
$elements[3]->alias="order";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_subcategory`.`status`";
$elements[4]->sort="1";
$elements[4]->header="Status";
$elements[4]->alias="status";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_subcategory`.`image1`";
$elements[5]->sort="1";
$elements[5]->header="Image1";
$elements[5]->alias="image1";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_subcategory`.`image2`";
$elements[6]->sort="1";
$elements[6]->header="Image2";
$elements[6]->alias="image2";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_subcategory`");
$this->load->view("json",$data);
}
public function getsinglesubcategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->subcategory_model->getsinglesubcategory($id);
$this->load->view("json",$data);
}
function getallorder()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_order`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_order`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_order`.`firstname`";
$elements[2]->sort="1";
$elements[2]->header="First Name";
$elements[2]->alias="firstname";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_order`.`lastname`";
$elements[3]->sort="1";
$elements[3]->header="Last Name";
$elements[3]->alias="lastname";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_order`.`email`";
$elements[4]->sort="1";
$elements[4]->header="Email Id";
$elements[4]->alias="email";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_order`.`billingaddress`";
$elements[5]->sort="1";
$elements[5]->header="Billing Address";
$elements[5]->alias="billingaddress";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_order`.`billingcontact`";
$elements[6]->sort="1";
$elements[6]->header="Billing Contact";
$elements[6]->alias="billingcontact";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`fynx_order`.`billingcity`";
$elements[7]->sort="1";
$elements[7]->header="Billing City";
$elements[7]->alias="billingcity";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`fynx_order`.`billingstate`";
$elements[8]->sort="1";
$elements[8]->header="Billing State";
$elements[8]->alias="billingstate";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`fynx_order`.`billingpincode`";
$elements[9]->sort="1";
$elements[9]->header="Billing Pincode";
$elements[9]->alias="billingpincode";

$elements=array();
$elements[10]=new stdClass();
$elements[10]->field="`fynx_order`.`billingcountry`";
$elements[10]->sort="1";
$elements[10]->header="Billing Country";
$elements[10]->alias="billingcountry";

$elements=array();
$elements[11]=new stdClass();
$elements[11]->field="`fynx_order`.`shippingcity`";
$elements[11]->sort="1";
$elements[11]->header="Shipping City";
$elements[11]->alias="shippingcity";

$elements=array();
$elements[12]=new stdClass();
$elements[12]->field="`fynx_order`.`shippingaddress`";
$elements[12]->sort="1";
$elements[12]->header="Shipping Address";
$elements[12]->alias="shippingaddress";

$elements=array();
$elements[13]=new stdClass();
$elements[13]->field="`fynx_order`.`shippingname`";
$elements[13]->sort="1";
$elements[13]->header="Shipping Name";
$elements[13]->alias="shippingname";

$elements=array();
$elements[14]=new stdClass();
$elements[14]->field="`fynx_order`.`shippingcountry`";
$elements[14]->sort="1";
$elements[14]->header="Shipping Country";
$elements[14]->alias="shippingcountry";

$elements=array();
$elements[15]=new stdClass();
$elements[15]->field="`fynx_order`.`shippingcontact`";
$elements[15]->sort="1";
$elements[15]->header="Shipping Contact";
$elements[15]->alias="shippingcontact";

$elements=array();
$elements[16]=new stdClass();
$elements[16]->field="`fynx_order`.`shippingstate`";
$elements[16]->sort="1";
$elements[16]->header="shippingstate";
$elements[16]->alias="shippingstate";

$elements=array();
$elements[17]=new stdClass();
$elements[17]->field="`fynx_order`.`shippingpincode`";
$elements[17]->sort="1";
$elements[17]->header="Shipping Pincode";
$elements[17]->alias="shippingpincode";

$elements=array();
$elements[18]=new stdClass();
$elements[18]->field="`fynx_order`.`trackingcode`";
$elements[18]->sort="1";
$elements[18]->header="Tracking Code";
$elements[18]->alias="trackingcode";

$elements=array();
$elements[19]=new stdClass();
$elements[19]->field="`fynx_order`.`defaultcurrency`";
$elements[19]->sort="1";
$elements[19]->header="Default Currency";
$elements[19]->alias="defaultcurrency";

$elements=array();
$elements[20]=new stdClass();
$elements[20]->field="`fynx_order`.`shippingmethod`";
$elements[20]->sort="1";
$elements[20]->header="Shipping Method";
$elements[20]->alias="shippingmethod";

$elements=array();
$elements[21]=new stdClass();
$elements[21]->field="`fynx_order`.`orderstatus`";
$elements[21]->sort="1";
$elements[21]->header="Order Status";
$elements[21]->alias="orderstatus";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_order`");
$this->load->view("json",$data);
}
public function getsingleorder()
{
$id=$this->input->get_post("id");
$data["message"]=$this->order_model->getsingleorder($id);
$this->load->view("json",$data);
}
function getallorderitem()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_orderitem`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_orderitem`.`discount`";
$elements[1]->sort="1";
$elements[1]->header="Discount";
$elements[1]->alias="discount";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_orderitem`.`order`";
$elements[2]->sort="1";
$elements[2]->header="Order";
$elements[2]->alias="order";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_orderitem`.`product`";
$elements[3]->sort="1";
$elements[3]->header="Product";
$elements[3]->alias="product";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`fynx_orderitem`.`quantity`";
$elements[4]->sort="1";
$elements[4]->header="Quantity";
$elements[4]->alias="quantity";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`fynx_orderitem`.`price`";
$elements[5]->sort="1";
$elements[5]->header="Price";
$elements[5]->alias="price";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`fynx_orderitem`.`finalprice`";
$elements[6]->sort="1";
$elements[6]->header="Final Price";
$elements[6]->alias="finalprice";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_orderitem`");
$this->load->view("json",$data);
}
public function getsingleorderitem()
{
$id=$this->input->get_post("id");
$data["message"]=$this->orderitem_model->getsingleorderitem($id);
$this->load->view("json",$data);
}
function getallnewsletter()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_newsletter`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_newsletter`.`user`";
$elements[1]->sort="1";
$elements[1]->header="User";
$elements[1]->alias="user";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_newsletter`.`email`";
$elements[2]->sort="1";
$elements[2]->header="Email Id";
$elements[2]->alias="email";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`fynx_newsletter`.`status`";
$elements[3]->sort="1";
$elements[3]->header="Status";
$elements[3]->alias="status";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_newsletter`");
$this->load->view("json",$data);
}
public function getsinglenewsletter()
{
$id=$this->input->get_post("id");
$data["message"]=$this->newsletter_model->getsinglenewsletter($id);
$this->load->view("json",$data);
}
function getallconfig()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_config`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_config`.`text`";
$elements[1]->sort="1";
$elements[1]->header="Text";
$elements[1]->alias="text";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_config`.`content`";
$elements[2]->sort="1";
$elements[2]->header="Content";
$elements[2]->alias="content";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_config`");
$this->load->view("json",$data);
}
public function getsingleconfig()
{
$id=$this->input->get_post("id");
$data["message"]=$this->config_model->getsingleconfig($id);
$this->load->view("json",$data);
}
function getallsize()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_size`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_size`.`status`";
$elements[1]->sort="1";
$elements[1]->header="status";
$elements[1]->alias="status";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_size`.`name`";
$elements[2]->sort="1";
$elements[2]->header="Name";
$elements[2]->alias="name";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_size`");
$this->load->view("json",$data);
}
public function getsinglesize()
{
$id=$this->input->get_post("id");
$data["message"]=$this->size_model->getsinglesize($id);
$this->load->view("json",$data);
}
function getallsizechart()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`fynx_sizechart`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`fynx_sizechart`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`fynx_sizechart`.`image`";
$elements[2]->sort="1";
$elements[2]->header="Image";
$elements[2]->alias="image";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `fynx_sizechart`");
$this->load->view("json",$data);
}
public function getsinglesizechart()
{
$id=$this->input->get_post("id");
$data["message"]=$this->sizechart_model->getsinglesizechart($id);
$this->load->view("json",$data);
}
} ?>