<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
  </head>
  <body>
    <?php 
        include("connectDB.php");
        include("apiController.php");
        $status = getConnection();
        $myData = getDataFromAIP();
        $status = insertData($myData);
    ?>
    <div class = "heading">TỶ GIÁ NGOẠI TỆ</div>
    <div>
        <?php
        print '<div>Cập nhật lần cuối:'.$myData["date"].'</div>';
        ?>
    </div>
    <div>
        <table class = "ty-gia-ngoai-te">
        <tr class = "header">
            <td>Mã ngoại tệ </td>
            <td>Tên ngoại tệ</td>
            <td>Mua tiền mặt</td>
            <td>Chuyển khoản</td>
            <td>Bán         </td>
        </tr>
        <?php 
        foreach($myData["data"] as $k=>$v)
        {
            print '<tr><td>'.$v['CURRENCYCODE'].' </td><td>'.$v['CURRENCYNAME'].' </td><td> '.$v['BUY'].' </td><td> '.$v['TRANSFER'].'</td><td>'.$v['SELL'].'</td></tr>';
        }
    ?>
        </table>
    </div>
    <script>
      alert("<?php echo $status; ?>")
    </script>
  </body>
</html>
     
