<html><body style='margin: 0;'>
  <div class='fynxmailer' style='width: 600px; max-width:600px; margin: 0 auto;'>
    <header>
      <img src='http://wohlig.co.in/myfynx/img/emailer-fynx.png' alt='' class='img-responsive'>
    </header>
    <main>
      <div class=''>
        <div class='section-login' style='margin: 0 20px;'>
          <p style='font-family: Roboto;font-size: 20px;color: #000;'>Dear <span style='font-family: Roboto;font-size: 20px;color: #000;'><?php echo $firstname." ".$lastname ?></span>,</p>
          <p style='font-family: Roboto;font-size: 20px;color: #000;'>Thank You for shopping at My Fynx. Your order details are listed below:</p>


<?php
$count=1;
$finalpricetotal=0;

print_r($productquery);
foreach($productquery as $cart)
{
$id=$cart['id'];
$name=$cart['name'];
$image=$cart['image1'];
$quantity=$cart['quantity'];
$color=$cart['colorname'];
$size=$cart['sizename'];
$price=$cart['price'];
$subtotal=$cart['subtotal'];

?>

<table style='width: 100%;'>
  <thead style=' background-color: #fc483f; color: #fff;'>
    <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Item</th>
    <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Color</th>
    <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Size</th>
    <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Quantity</th>
    <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>SubTotal</th>
  </thead>
  <tbody>
    <tr>
      <td style='text-align:center;'>
        <img src='http://www.myfynx.com/newfynx/uploads/$image' alt='' width='70' class='img-responsive'>$name;
      </td>
      <td style='text-align:center;'>$color</td>
        <td style='text-align:center;'>$size</td>
        <td style='text-align:center;'>$quantity</td>
        <td style='text-align:center;'>$subtotal</td>
    </tr>
  </tbody>
</table>
<?php
$finalpricetotal=$finalpricetotal+$subtotal;
       $counter++;
}
?>

<p style='font-family: Roboto;font-size: 20px;color: #000;'>If you have any queries about your order, please email us on info@myfynx.com and we’ll be happy

to assist you. In order to help you server better, please mention the order number in your email.</p>
<p style='color: #fc483f;font-family: Roboto;font-size: 20px;'>Happy Shopping !</p>
<span style='font-family: Roboto;font-size: 20px;color: #000;'>Thank You,</span>
<span class='block' style='font-family: Roboto;font-size: 20px;color: #000;display: block;'>Team My Fynx!</span>
</div>
</div>
</main>
<footer style='background-color: #000; padding: 10px 0; color: #fff; margin-top: 20px;'>
<div class='footer-wrapper'>
<table style='width: 100%;'>
<tr>
  <td style='padding:15px; float:left;'>
    <div class='copy'>
      <span style='font-family: Roboto;font-size: 14px;color: #fff;'>COPYRIGHT@MYFYNX2016</span>
    </div>
  </td>
  <td style='padding: 0 15px; text-align: right;'>
    <div class='follow' style='text-align: center; float: right;'>
      <span class='block' style='font-family: Roboto;font-size: 14px;color: #fff;display: block;'>FOLLOW US ON</span>
      <a href='https://www.facebook.com/MyFynx-401315743385366/?fref=ts' target='_blank' class='inline-block' style='font-family: Roboto;font-size: 18px;color: #fff;display: inline-block;margin: 3px 5px 0 0;'><img src='http://wohlig.co.in/myfynx/img/fynx-fb.png' alt='Facebook' width='20'></a>
      <a href='https://twitter.com/MyFynx' target='_blank' class='inline-block' style='font-family: Roboto;font-size: 18px;color: #fff;display: inline-block;margin: 3px 5px 0 0;'><img src='http://wohlig.co.in/myfynx/img/fynx-twi.png' alt='Twitter' width='20'></a>
      <a href='https://www.instagram.com/myfynx/' target='_blank' class='inline-block' style='font-family: Roboto;font-size: 18px;color: #fff;display: inline-block;margin: 3px 5px 0 0;'><img src='http://wohlig.co.in/myfynx/img/fynx-insta.png' alt='Instagram' width='20'></a>
      <a href='https://www.youtube.com/channel/UCIo8qm3zCU8JmDZ1UaHhf3Q' target='_blank' class='inline-block' style='font-family: Roboto;font-size: 18px;color: #fff;display: inline-block;margin: 3px 5px 0 0;'><img src='http://wohlig.co.in/myfynx/img/fynx-youtube.png' alt='Youtube' width='20'></a>
    </div>
  </td>
</tr>
</table>
</div>
</footer>
</div>
</body></html>
