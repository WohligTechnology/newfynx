<html><body style='margin: 0;'>
           <div class='fynxmailer' style='width: 600px; max-width:600px; margin: 0 auto;'>
             <header>
               <img src='http://wohlig.co.in/myfynx/img/emailer-fynx.png' alt='' class='img-responsive'>
             </header>
             <main>
               <div class=''>
                 <div class='section-login' style='margin: 0 20px;'>
                  <p style='font-family: Roboto;font-size: 20px;color: #000;'>Dear <span style='font-family: Roboto;font-size: 20px;color: #000;'></span>,</p>
                   <p style='font-family: Roboto;font-size: 20px;color: #000;'>Mr/Ms. <?php echo $username; ?> has placed an order on <?php echo $orderdate; ?>.</p> 
                    <p style='font-family: Roboto;font-size: 20px;color: #000;'>Address:</p>
                     <div>
                          <?php
                        if($before->shippingaddress=="")
                        {

                             echo $before->firstname." ".$before->lastname;
                            
                            echo "<br>";
                            echo $before->shippingline1." ".$before->shippingline2." ".$before->shippingline3;
                            echo "<br>";
                             echo $before->shippingcity.", ".$before->shippingstate." - ".$before->shippingpincode;
                        }
                        else
                        {
                             echo $before->firstname." ".$before->lastname;
                            echo "<br>";
                              echo $before->shippingline1." ".$before->shippingline2." ".$before->shippingline3;
                            echo "<br>";
                            $before->shippingcity.", ".$before->shippingstate." - ".$before->shippingpincode;

                        }
                        ?>
                     </div>
<!--                  show address here-->
                   <p style='font-family: Roboto;font-size: 20px;color: #000;'>Below mentioned is the details of the order:</p>

                   <table style='width: 100%;'>
                     <thead style=' background-color: #fc483f; color: #fff;'>
                       <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Item</th>
                       <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Apparel</th>
                       <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Design</th>
                      <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Size</th>
                      <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Quantity</th>
                      <th style='padding: 10px; text-transform:uppercase; font-size: 14px'>Price</th>
                    </thead>
                    <tbody>
       <?php

       foreach($productquery as $cart)
       {
         $id = $cart->order;
         $name = $cart->name;
         $image=$cart->image1;
         $designname=$cart->designname;
         $typename=$cart->typename;
         $size=$cart->sizename;
         $quantity=$cart->quantity;
         $price=$cart->price;
         $subtotal=$cart->finalprice;

       ?>





            <tr>
               <td style='text-align:center;'>
                <figure>
                  <img src='http://admin.myfynx.com/uploads/<?php echo $image; ?>' alt='' width='70' class='img-responsive'>
                  <figcaption><?php echo $name; ?></figcaption>
                </figure>

              </td>
                <td style='text-align:center;'><?php echo $typename; ?></td>
                <td style='text-align:center;'><?php echo $designname; ?></td>
                <td style='text-align:center;'><?php echo $size; ?></td>
                <td style='text-align:center;'><?php echo $quantity; ?></td>
                <td style='text-align:center;'><?php echo $price; ?></td>
            </tr>

         <?php
         $finalpricetotal=$finalpricetotal+$subtotal;
                $counter++;
         }

?>
</tbody>
</table>
<div style="background-color:#fc483f;color:#fff;text-align:right;padding:10px;text-transform:uppercase;font-size:14px;font-weight:bold;">
GRAND TOTAL : <?php echo $finalpricetotal; ?>
</div>
         <span class='block' style='font-family: Roboto;font-size: 20px;color: #000;display: block;'>They Got FYNED !!!</span>
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
