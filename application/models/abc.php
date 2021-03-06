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
              $sumsubtotal=$sumqty+$cart['subtotal'];
            }
        
        
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
        }
        
        $updatediscountamt=$this->db->query("UPDATE `fynx_order` SET `discountamount`='$substracteddiscountamout',`finalamount`='$sumsubtotal' = WHERE `id`='$order'");
        
        
        foreach ($carts as $cart) {
            
              $querycart = $this->db->query("INSERT INTO `fynx_orderitem`(`discount`,`order`, `product`, `quantity`, `price`, `finalprice`,`design`,`checkcustom`) VALUES ('".$cart['qty']."' * '$unitprice','$order','".$cart['id']."','".$cart['qty']."','".$cart['price']."','".$cart['subtotal']."','".$cart['design']."','".$cart['options']['json']."')");
            $quantity = intval($cart['qty']);
         
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

   $data['productquery'] = $this->db->query("SELECT `fynx_orderitem`.`order`,`fynx_orderitem`.`product`,`fynx_product`.`name`,`fynx_product`.`sku`,`fynx_product`.`type`,`fynx_type`.`name` as `typename`, `fynx_orderitem`.`quantity`,`fynx_orderitem`.`price`,`fynx_orderitem`.`discount`,`fynx_orderitem`.`finalprice`,`fynx_orderitem`.`design` as `designid`,`fynx_designs`.`name` as `designname`,`productdesignimage`.`image` as `image1`,`fynx_product`.`size` as `sizeid`,`fynx_size`.`name` as `sizename` FROM `fynx_orderitem`
   INNER JOIN `fynx_order` ON `fynx_order`.`id`=`fynx_orderitem`.`order`
    INNER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_orderitem`.`product` 
INNER JOIN `fynx_type` ON `fynx_product`.`type`=`fynx_type`.`id`
INNER JOIN `fynx_size` ON `fynx_product`.`size`=`fynx_size`.`id`
LEFT OUTER JOIN `fynx_designs` ON `fynx_designs`.`id`=`fynx_orderitem`.`design`
INNER JOIN `productdesignimage` ON `productdesignimage`.`product`=`fynx_orderitem`.`product` 
WHERE `fynx_orderitem`.`order`='$oid'
GROUP BY `fynx_orderitem`.`product`,`fynx_designs`.`id`")->result();
    
//    $data['productquery'] = $this->db->query("SELECT `fynx_orderitem`.`order`,`fynx_orderitem`.`product`,`fynx_product`.`name`,`fynx_product`.`image1`,`fynx_product`.`sku`, `fynx_orderitem`.`quantity`,`fynx_orderitem`.`price`,`fynx_orderitem`.`discount`,`fynx_orderitem`.`finalprice` FROM `fynx_orderitem`
//   INNER JOIN `fynx_order` ON `fynx_order`.`id`=`fynx_orderitem`.`order`
//    INNER JOIN `fynx_product` ON `fynx_product`.`id`=`fynx_orderitem`.`product` WHERE `fynx_orderitem`.`order`='$oid'")->result();
    return $data['productquery'];

}
    //////////////////////////////////////////////////////////////////////////////////////////////

//    function placeorder($user, $firstname, $lastname, $email,$billingcontact,$billingaddress, $billingcity, $billingstate, $billingcountry, $shippingaddress, $shippingcity, $shippingcountry, $shippingstate, $shippingpincode, $billingpincode, $status, $company, $carts, $finalamount, $shippingmethod, $shippingname, $shippingcontact, $customernote)
//	{
//
//        $mysession=$this->session->all_userdata();
//
//          if($shippingaddress==""){
//         $query=$this->db->query("INSERT INTO `order`(`user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `finalamount`, `billingpincode`,`shippingmethod`,`orderstatus`,`customernote`,`billingcontact`,`shippingcontact`) VALUES ('$user','$firstname','$lastname','$email','$billingaddress','$billingcity','$billingstate','$billingcountry','$billingaddress','$billingcity','$billingcountry','$billingstate','$billingpincode','$finalamount','$billingpincode','$shippingmethod','1','$customernote','$billingcontact','$billingcontact')");
//        }
//        else{
//        $query=$this->db->query("INSERT INTO `order`(`user`, `firstname`, `lastname`, `email`, `billingaddress`, `billingcity`, `billingstate`, `billingcountry`, `shippingaddress`, `shippingcity`, `shippingcountry`, `shippingstate`, `shippingpincode`, `finalamount`, `billingpincode`,`shippingmethod`,`orderstatus`,`shippingname`,`shippingcontact`,`customernote`,`billingcontact`) VALUES ('$user','$firstname','$lastname','$email','$billingaddress','$billingcity','$billingstate','$billingcountry','$shippingaddress','$shippingcity','$shippingcountry','$shippingstate','$shippingpincode','$finalamount','$billingpincode','$shippingmethod','1','$shippingname','$shippingcontact','$customernote','$billingcontact')");
//        }
//
//
//
//        $billingaddressforuser=$billingaddress;
//        $shippingaddressforuser=$shippingaddress;
//
//        $order=$this->db->insert_id();
//        $mysession["orderid"]=$order;
//        $this->session->set_userdata($mysession);
//        foreach($carts as $cart)
//        {
//            $querycart=$this->db->query("INSERT INTO `orderitems`(`order`, `product`, `quantity`, `price`, `finalprice`) VALUES ('$order','".$cart['id']."','".$cart['qty']."','".$cart['price']."','".$cart['subtotal']."')");
//            $quantity=intval($cart['qty']);
//            $productid=$cart['id'];
//            $this->db->query("UPDATE `product` SET `product`.`quantity`=`product`.`quantity`-$quantity WHERE `product`.`id`='$productid'");
//
//
//        }
//
//
//		$table =$this->order_model->getorderitem($order);
//		$before=$this->order_model->beforeedit($order);
//
//        $todaydata=date("Y-m-d");
//        $this->load->library('email');
//        $this->email->from('info@magicmirror.in', 'Magicmirror');
//        $this->email->to($email);
//        $this->email->subject('Magic Mirror Order');
//        if($before['order']->billingaddress=="")
//                        {
//            $billingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->shippingaddress."<br>".$before['order']->shippingcity."<br>".$before['order']->shippingstate."<br>".$before['order']->shippingpincode;
//
//                        }
//                        else
//                        {
//                            $billingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->billingaddress."<br>".$before['order']->billingcity."<br>".$before['order']->billingstate."<br>".$before['order']->billingpincode;
//                        }
//        if($before['order']->shippingaddress=="")
//                        {
//                             $shippingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->billingaddress."<br>".$before['order']->billingcity."<br>".$before['order']->billingstate."<br>".$before['order']->billingpincode;
//                        }
//                        else
//                        {
//                             $shippingaddress=$before['order']->firstname." ".$before['order']->lastname."<br>".$before['order']->shippingaddress."<br>".$before['order']->shippingcity."<br>".$before['order']->shippingstate."<br>".$before['order']->shippingpincode;
//                        }
//
//        $message="<html><body style=\"background:url('http://magicmirror.in/emaildata/emailer.jpg')no-repeat center; background-size:cover;\">
//    <div style='text-align:center; padding-top: 40px;'>
//        <img src='http://magicmirror.in/emaildata/email.png'>
//    </div>
//    <div style='text-align:center;   width: 50%; margin: 0 auto;'>
//        <h2 style='padding-bottom: 5px;color: #e82a96;'>Orders Details</h2>
//        <table align='center' border='1' cellpadding='2' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 40px;'>
//            <tr align='right' style='border: 0px;'>
//                <td width='70%' style='border: 0px;'>
//&nbsp;
//                </td>
//                     <td width='30%' style='border: 0px;'>
//                   Date :<span>$todaydata</span>
//                </td>
//                                                   </tr>
//                                                   <tr align='right' style='border: 0px;'>
//                                                  <td width='70%' style='border: 0px;'>
//&nbsp;
//                </td>
//                                <td width='30%' style='border: 0px;'>
//                  Invoice No.:<span>$order</span>
//                </td>
//            </tr>
//        </table>
//
//        <table align='center' border='1' cellpadding='0' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 40px;'>
//           <tr>
//    <th style='padding: 10px 0;'>Billing Address</th>
//    <th style='padding: 10px 0;'>Shipping Address</th>
//  </tr>
//          <tr >
//              <td width='50%' style='padding: 10px 15px;'>
//<p>$billingaddress</p>
//</td>
//              <td width='50%' style='padding: 10px 15px;'>
//<p>$shippingaddress</p>
// </td>
//  </tr>
//        </table>
//
//                 <table align='center' border='1' cellpadding='0' cellspacing='0' width='100%' style='border: 0px solid black;padding-bottom: 40px;'>
//  <tr>
//    <th style='padding: 10px 0;'>Id</th>
//    <th style='padding: 10px 0;'>Product</th>
//    <th style='padding: 10px 0;'>Quantity</th>
//    <th style='padding: 10px 0;'>Price</th>
//    <th style='padding: 10px 0;'>Total Amount</th>
//  </tr>";
//        $count=1;
//        $finalpricetotal=0;
//        foreach($table as $row)
//        {
//            $namesku=$row->name."-".$row->sku;
//            $quantity=$row->quantity;
//            $price=$row->price;
//            $finalprice=$row->finalprice;
//            $message.="
//            <tr>
//                <td align='center' style='padding: 10px 0;'>$count</td>
//                <td align='center' style='padding: 10px 0;'>$namesku</td>
//                <td align='center' style='padding: 10px 0;'>$quantity</td>
//                <td align='center' style='padding: 10px 0;'>$price</td>
//                <td align='center' style='padding: 10px 0;'>$finalprice</td>
//              </tr>";
//            $finalpricetotal=$finalpricetotal+$value->finalprice;
//                            $counter++;
//        }
//  $message.="
//
//        </table>
//    </div>
//    <div style='text-align:center;position: relative;'>
//        <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
//            Your Order is Pending.
//        </p>
//        <img src='http://magicmirror.in/emaildata/magicfooter.png'>
//    </div>
//</body>
//
//</html>";
//        $this->email->message($message);
//        // $this->email->html('<b>hello</b>');
//        $this->email->send();
//
//        $userquery=$this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$billingcontact',`status`='$status',`billingaddress`='$billingaddressforuser',`billingcity`='$billingcity',`billingstate`='$billingstate',`billingcountry`='$billingcountry',`shippingaddress`='$shippingaddressforuser',`shippingcity`='$shippingcity',`shippingcountry`='$shippingcountry',`shippingstate`='$shippingstate',`shippingpincode`='$shippingpincode',`companyname`='$company' WHERE `id`='$user'");
//        if($query){
//        return $order;
//        }
//        else{
//		return false;
//        }
//	}
//    public function getemailbyorder($orderid)
//    {
//        $query=$this->db->query("SELECT * FROM `user` WHERE `id`=(SELECT `user` FROM `fynx_order` WHERE `id`='$orderid')")->row();
//        $email=$query->email;
//        return $email;
//    }
}
