<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class order_model extends CI_Model
{

  public function printorderinvoice($id)
  {
    $query=$this->db->query("SELECT `fynx_product`.`name`, `fynx_orderitem`.`quantity`,`fynx_orderitem`.`price`,`fynx_orderitem`.`discount`,`fynx_orderitem`.`finalprice` FROM `fynx_orderitem`
  INNER JOIN `fynx_order` ON `fynx_order`.`id`=`fynx_orderitem`.`order`
  INNER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_orderitem`.`product` AND `fynx_orderitem`.`order`='$id'
    " )->result();

  return $query;
  }

    public function create($user, $firstname, $lastname, $email, $billingaddress, $billingcontact, $billingcity, $billingstate, $billingpincode, $billingcountry, $shippingcity, $shippingaddress, $shippingname, $shippingcountry, $shippingcontact, $shippingstate, $shippingpincode, $trackingcode, $defaultcurrency, $shippingmethod, $orderstatus, $billingline1, $billingline2, $billingline3, $shippingline1, $shippingline2, $shippingline3, $transactionid, $paymentmode)
    {
        $data = array('user' => $user,'firstname' => $firstname,'lastname' => $lastname,'email' => $email,'billingaddress' => $billingaddress,'billingcontact' => $billingcontact,'billingcity' => $billingcity,'billingstate' => $billingstate,'billingpincode' => $billingpincode,'billingcountry' => $billingcountry,'shippingcity' => $shippingcity,'shippingaddress' => $shippingaddress,'shippingname' => $shippingname,'shippingcountry' => $shippingcountry,'shippingcontact' => $shippingcontact,'shippingstate' => $shippingstate,'shippingpincode' => $shippingpincode,'trackingcode' => $trackingcode,'defaultcurrency' => $defaultcurrency,'shippingmethod' => $shippingmethod,'orderstatus' => $orderstatus,'billingline1' => $billingline1,'billingline2' => $billingline2,'billingline3' => $billingline3,'shippingline1' => $shippingline1,'shippingline2' => $shippingline2,'shippingline3' => $shippingline3,'transactionid' => $transactionid,'paymentmode' => $paymentmode);
        $query = $this->db->insert('fynx_order', $data);
        $id = $this->db->insert_id();
        if (!$query) {
            return  0;
        } else {
            return  $id;
        }
    }
    public function beforeedit($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('fynx_order')->row();
        return $query;
    }
    public function getsingleorder($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('fynx_order')->row();

        return $query;
    }
    public function edit($id, $user, $firstname, $lastname, $email, $billingaddress, $billingcontact, $billingcity, $billingstate, $billingpincode, $billingcountry, $shippingcity, $shippingaddress, $shippingname, $shippingcountry, $shippingcontact, $shippingstate, $shippingpincode, $trackingcode, $defaultcurrency, $shippingmethod, $orderstatus, $billingline1, $billingline2, $billingline3, $shippingline1, $shippingline2, $shippingline3, $transactionid, $paymentmode)
    {
        $query1 = $this->db->query("SELECT * FROM `fynx_order` WHERE `id`='$id'")->row();
        
        $data = array('user' => $user,'firstname' => $firstname,'lastname' => $lastname,'email' => $email,'billingaddress' => $billingaddress,'billingcontact' => $billingcontact,'billingcity' => $billingcity,'billingstate' => $billingstate,'billingpincode' => $billingpincode,'billingcountry' => $billingcountry,'shippingcity' => $shippingcity,'shippingaddress' => $shippingaddress,'shippingname' => $shippingname,'shippingcountry' => $shippingcountry,'shippingcontact' => $shippingcontact,'shippingstate' => $shippingstate,'shippingpincode' => $shippingpincode,'trackingcode' => $trackingcode,'defaultcurrency' => $defaultcurrency,'shippingmethod' => $shippingmethod,'orderstatus' => $orderstatus,'billingline1' => $billingline1,'billingline2' => $billingline2,'billingline3' => $billingline3,'shippingline1' => $shippingline1,'shippingline2' => $shippingline2,'shippingline3' => $shippingline3,'transactionid' => $transactionid,'paymentmode' => $paymentmode);
        $this->db->where('id', $id);
        $query = $this->db->update('fynx_order', $data);

        
        
        return $query1;
    }
    public function delete($id)
    {
        $query = $this->db->query("DELETE FROM `fynx_order` WHERE `id`='$id'");

        return $query;
    }
    public function getorderstatus()
    {
        $query = $this->db->query('SELECT * FROM `orderstatus` ORDER BY `name` ASC')->result();
        $return = array(
        '' => 'Choose an option',
        );

        foreach ($query as $row) {
            $return[$row->id] = $row->name;
        }

        return $return;
    }
    public function getpaymentmodedropdown()
    {
        $return = array(
        '' => 'Choose Payment Mode',
        '1' => 'Credit Card',
        '2' => 'Debit Card',
        '3' => 'Net Banking',
        '4' => 'Cash On Delivery',
        );

        return $return;
    }
    public function getorderdropdown()
    {
        $query = $this->db->query('SELECT * FROM `fynx_order`  ORDER BY `id` ASC')->result();
        $return = array(
        '' => '',
        );
        foreach ($query as $row) {
            $return[$row->id] = $row->firstname.' '.$row->lastname;
        }

        return $return;
    }
    public function getorderitem($id)
    {
        $query = $this->db->query("SELECT `fynx_orderitem`.`id`,`fynx_order`.`firstname`,`fynx_orderitem`.`order`,`fynx_orderitem`.`product`,`fynx_product`.`name`,`fynx_product`.`sku`, `fynx_orderitem`.`quantity`,`fynx_orderitem`.`price`,`fynx_orderitem`.`discount`,`fynx_orderitem`.`finalprice` FROM `fynx_orderitem`
		INNER JOIN `fynx_order` ON `fynx_order`.`id`=`fynx_orderitem`.`order`
		INNER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_orderitem`.`product` AND `fynx_orderitem`.`order`='$id'
        ")->result();
// print_r($query);
        return $query;
    }


    public function placeOrder($user, $firstname, $lastname, $email, $phone, $billingline1, $billingline2, $billingline3, $billingcity, $billingstate, $billingcountry, $shippingcity, $shippingcountry, $shippingstate, $shippingpincode, $billingpincode, $carts, $shippingline1, $shippingline2, $shippingline3, $paymentmode,$coupon)
    {
        $mysession = $this->session->all_userdata();

        if ($shippingline1 == '') {
            $query = $this->db->query("INSERT INTO `fynx_order`(`user`, `firstname`, `lastname`, `email`,`billingcontact`, `billingline1`,`billingline2`,`billingline3`, `billingcity`, `billingstate`, `billingcountry`, `shippingline1`,`shippingline2`,`shippingline3`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `billingpincode`,`shippingcontact`,`orderstatus`,`paymentmode`) VALUES ('$user','$firstname','$lastname','$email','$phone','$billingline1','$billingline2','$billingline3','$billingcity','$billingstate','$billingcountry','$billingline1','$billingline2','$billingline3','$billingcity','$billingcountry','$billingstate','$billingpincode','$billingpincode','$phone','1','$paymentmode')");
        } else {
            $query = $this->db->query("INSERT INTO `fynx_order`(`user`, `firstname`, `lastname`, `email`,`billingcontact`, `billingline1`,`billingline2`,`billingline3`, `billingcity`, `billingstate`, `billingcountry`, `shippingline1`,`shippingline2`,`shippingline3`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `billingpincode`,`shippingcontact`,`orderstatus`,`paymentmode`) VALUES ('$user','$firstname','$lastname','$email','$phone','$billingline1','$billingline2','$billingline3','$billingcity','$billingstate','$billingcountry','$shippingline1','$shippingline2','$shippingline3','$shippingcity','$shippingcountry','$shippingstate','$shippingpincode','$billingpincode','$phone','1','$paymentmode')");
        }

        $order = $this->db->insert_id();
        $mysession['orderid'] = $order;
        $this->session->set_userdata($mysession);
        
        
          //APPLY COUPON HERE
        
            $cartcount=count($carts);
            $sumqty=0;
            $sumsubtotal=0;
            foreach ($carts as $cart) {
              $sumqty=$sumqty+$cart['qty'];
              $sumsubtotal=$sumsubtotal+$cart['subtotal'];
            }
        
        $totalamount=$sumsubtotal;
           if($coupon && $coupon!=''){
            $coupondetail=$this->db->query("SELECT * FROM `fynx_coupon` WHERE `id`='$coupon'")->row();
            $min=$coupondetail->min;
            $max=$coupondetail->max;
            $id=$coupondetail->id;
            $type=$coupondetail->type;
            $discount=$coupondetail->discount;

            $substracteddiscountamout=($discount *$sumsubtotal)/100;
               
            if($substracteddiscountamout > $max )
            {
                $substracteddiscountamout = $max;
            }
            $calculatedamount=$sumsubtotal-$substracteddiscountamout;
            $sumsubtotal=$calculatedamount;
                 $updatediscountamt=$this->db->query("UPDATE `fynx_order` SET `discountamount`='$substracteddiscountamout',`finalamount`='$calculatedamount',`totalamount`='$totalamount' WHERE `id`='$order'");
        }
        else{
             $updatediscountamt=$this->db->query("UPDATE `fynx_order` SET `discountamount`='0',`finalamount`='$sumsubtotal',`totalamount`='$totalamount' WHERE `id`='$order'");
        }
        
      
        
        foreach ($carts as $cart) {
              $querycart = $this->db->query("INSERT INTO `fynx_orderitem`(`order`, `product`, `quantity`, `price`, `finalprice`,`design`,`checkcustom`) VALUES ('$order','".$cart['id']."','".$cart['qty']."','".$cart['price']."','".$cart['subtotal']."','".$cart['design']."','".$cart['options']['json']."')");
            $quantity = intval($cart['qty']);
            $productid = $cart['id'];
           
        }
      

        $userquery = $this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phone',`status`='2',`billingline1`='$billingline1',`billingline2`='$billingline2',`billingline3`='$billingline3',`billingcity`='$billingcity',`billingstate`='$billingstate',`billingcountry`='$billingcountry',`billingpincode`='$billingpincode',`shippingline1`='$shippingline1',`shippingline2`='$shippingline2',`shippingline3`='$shippingline3',`shippingcity`='$shippingcity',`shippingcountry`='$shippingcountry',`shippingstate`='$shippingstate',`shippingpincode`='$shippingpincode' WHERE `id`='$user'");
        if ($query) {
            return $order;
        } else {
            return false;
        }
    }

public function demo($oid)
{

   $data['productquery'] = $this->db->query("SELECT `fynx_orderitem`.`order`,`fynx_orderitem`.`product`,`fynx_product`.`name`,`fynx_product`.`sku`,`fynx_product`.`type`,`fynx_type`.`name` as `typename`,`fynx_orderitem`.`checkcustom`,`fynx_orderitem`.`id`,`fynx_product`.`image1` as `designimage`, `fynx_orderitem`.`quantity`,`fynx_orderitem`.`price`,`fynx_orderitem`.`discount`,`fynx_orderitem`.`finalprice`,`fynx_orderitem`.`design` as `designid`,`fynx_designs`.`name` as `designname`,`productdesignimage`.`image` as `image1`,`fynx_product`.`size` as `sizeid`,`fynx_size`.`name` as `sizename` FROM `fynx_orderitem`
   INNER JOIN `fynx_order` ON `fynx_order`.`id`=`fynx_orderitem`.`order`
    INNER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_orderitem`.`product` 
INNER JOIN `fynx_type` ON `fynx_product`.`type`=`fynx_type`.`id`
INNER JOIN `fynx_size` ON `fynx_product`.`size`=`fynx_size`.`id`
LEFT OUTER JOIN `fynx_designs` ON `fynx_designs`.`id`=`fynx_orderitem`.`design`
INNER JOIN `productdesignimage` ON `productdesignimage`.`product`=`fynx_orderitem`.`product` 
WHERE `fynx_orderitem`.`order`='$oid'
GROUP BY `fynx_orderitem`.`product`,`fynx_designs`.`id`")->result();
    
    for($i=0;$i <count($data['productquery']); $i++ )
    {
        if($data['productquery'][$i]->checkcustom !='')
        {
            $array =json_decode($data['productquery'][$i]->checkcustom);
            $data['productquery'][$i]->text1=$array->custom[0]->text;
            $data['productquery'][$i]->text2=$array->custom[1]->text;
            $data['productquery'][$i]->text3=$array->custom[2]->text;
            $data['productquery'][$i]->text4=$array->custom[3]->text;
            $data['productquery'][$i]->imagefront=$array->image1->image;
            $data['productquery'][$i]->imageback=$array->image1->image1;
            // above is an array
        }
    }
    return $data['productquery'];

}
   
}
