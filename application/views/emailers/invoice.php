<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="">
  <title>Invoice for MyFynx</title>
</head>
<!-- <style>
  .container {
    width: 900px;
    margin: 0 auto;
  }

  .left {
    float: left;
  }

  .right {
    float: right;
  }

  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
    border: 1px solid #ddd;
  }

  .table > thead > tr > th,
  .table > thead > tr > td,
  .table > tbody > tr > th,
  .table > tbody > tr > td {
    border: 1px solid #ddd;
    padding: 10px;
  }

  .add {
    border: 1px solid #ddd;
    padding: 20px 30px;
  }
</style> -->

<body>
  <div style="width: 900px; margin: 0 auto;">
    <div>
      <div class="logo left" style="float: left;">
        <h1><a href=""><img src="" alt="" class="img">
           <img src="<?php echo base_url('uploads/logo.png'); ?>"> 
        </a></h1>
      </div>
      <div class="right" style="float: right;">
        <table class="table" style="width: 100%;max-width: 100%;margin-bottom: 20px;border-collapse: collapse;border: 1px solid #ddd;">
          <tr>
            <td style="border: 1px solid #ddd;padding: 10px;"><b>Date</b></td>
            <td style="border: 1px solid #ddd;padding: 10px;">
              <?php  echo date("Y-m-d");?>
            </td>
          </tr>
          <tr>
            <td style="border: 1px solid #ddd;padding: 10px;"><b>Invoice No.</b></td>
<!--            <td style="border: 1px solid #ddd;padding: 10px;">-->
              <?php echo $id;?>
            </td>
          </tr>
           <tr>
            <td style="border: 1px solid #ddd;padding: 10px;"><b>VAT TIN</b></td>
            <td style="border: 1px solid #ddd;padding: 10px;">
             27591147570V
            </td>
          </tr>   
            <tr>
            <td style="border: 1px solid #ddd;padding: 10px;"><b>CST TIN</b></td>
            <td style="border: 1px solid #ddd;padding: 10px;">
             27591147570C
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div style="clear:both;display:table;">&nbsp;</div>
    <div>
      <div class="billing add left" style="float:left;border: 1px solid #ddd;padding: 20px 30px;"><b>Billing Address</b><br>
        <?php
                        if($before->billingaddress=="")
                        {
                             echo $before->firstname." ".$before->lastname;
                            echo "<br>";
                            echo $before->shippingline1.", ".$before->shippingline2." - ".$before->shippingline3;
                            echo "<br>";
                             echo $before->shippingcity.", ".$before->shippingstate." - ".$before->shippingpincode;

                        }
                        else
                        {
                             echo $before->firstname." ".$before->lastname;
                            echo "<br>";
                           echo $before->billingline1.", ".$before->billingline2." - ".$before->billingline3;
                            echo "<br>";
                             echo $before->billingcity.", ".$before->billingstate." - ".$before->billingpincode;

                        }
                        ?>
      </div>
      <div class="shipping add right" style="float:right;border: 1px solid #ddd;padding: 20px 30px;"><b>Shipping Address</b><br>
         <?php
                        if($before->shippingaddress=="")
                        {

                             echo $before->firstname." ".$before->lastname;
                            echo "<br>";
                            echo $before->billingaddress;
                            echo "<br>";
                             echo $before->billingcity.", ".$before->billingstate." - ".$before->billingpincode;
                        }
                        else
                        {
                             echo $before->firstname." ".$before->lastname;
                            echo "<br>";
                             echo $before->shippingaddress;
                            echo "<br>";
                            $before->billingcity.", ".$before->billingstate." - ".$before->billingpincode;

                        }
                        ?>
      </div>
    </div>
    <div style="clear:both;display:table;">&nbsp;</div>
    <table class="table" style="margin: 20px 0;width: 100%;max-width: 100%;margin-bottom: 20px;border-collapse: collapse;border: 1px solid #ddd;">
      <thead>
        <tr>
          <th style="border: 1px solid #ddd;padding: 10px;">ID</th>
          <th style="border: 1px solid #ddd;padding: 10px;">Product</th>
          <th style="border: 1px solid #ddd;padding: 10px;">Quantity</th>
          <th style="border: 1px solid #ddd;padding: 10px;">Price</th>
          <th style="border: 1px solid #ddd;padding: 10px;">Vat(5%)</th>
          <th style="border: 1px solid #ddd;padding: 10px;">Total Amount</th>
        </tr>
      </thead>
      <tbody>
       <?php
                        $counter=1;
                        $finalpricetotal=0;
                        foreach($table as $value)
                        {
                          $oprice = $value->price / 1.05;
                          $ovat = $value->price - $oprice;

                    ?>
        <tr>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo $counter;?>
          </td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo $value->name;?>
          </td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo $value->quantity;?>
          </td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo round($oprice,2);?>
          </td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo round(($ovat*$value->quantity),2);?>
          </td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo $value->finalprice;?>
          </td>
        </tr>
        <?php
                        $finalpricetotal=$finalpricetotal+$value->finalprice;
                        $counter++;
                    }
                    ?>        
      </tbody>
    </table>
    <div style="clear:both;display:table;">&nbsp;</div>
    <div>
      <table class="table" style="width: 350px;margin-bottom: 20px;border-collapse: collapse;border: 1px solid #ddd;float: right;">
        <tr>
          <td style="border: 1px solid #ddd;padding: 10px;"><b>Total:</b></td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php $vat = $finalpricetotal * 0.05;
                        echo $finalpricetotal - $vat ;?>
          </td>
        </tr>
        <tr>
          <td style="border: 1px solid #ddd;padding: 10px;"><b>Total Vat:</b></td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo $vat;?>
          </td>
        </tr>
        <tr>
          <td style="border: 1px solid #ddd;padding: 10px;"><b>Final Total:</b></td>
          <td style="border: 1px solid #ddd;padding: 10px;">
            <?php echo $finalpricetotal;?>
          </td>
        </tr>
      </table>
    </div>
    <div style="clear:both;display:table;">&nbsp;</div>
    <p style="text-align: center">Thank you for shopping with myFynx.</p>
  </div>
  <script>
      $(window).load(function () {
          window.print();
      });
  </script>
</body>

</html>