<?php
include("env.php");
$servername = $SERVERNAME;
$database = $DATABASE;
$username = $USERNAME;
$password = $PASSWORD;
$charset = $CHARSET;

 function getConnection()
{
    $status = "ABC";
    try {
        global $servername;
        global $database;
        global $charset;
        global $username;
        global $password;
        $dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         if ($pdo->query("SHOW TABLES LIKE '"."Data" ."'")->rowCount() > 0)
         {
             $status = "Connected";
         }
         else
         {
            $pdo->exec("create table Data(Time varchar(50), CurrencyCode varchar(5), CurrencyName varchar(30), Buy varchar(20), Transfer varchar(20), Sell varchar(20));");
            $status = "Connected! Created 'Data' table";
            
         }
      }
      catch (PDOException $e) {
        $status = "Connection failed!";
      }
      return $status;
}
function insertData($db)
{
    $status = "ABC";
    try {
        global $servername;
        global $database;
        global $charset;
        global $username;
        global $password;
        $dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //update
        $d = $db["date"];
        foreach($db["data"] as $k=>$v)
        {
            $CURRENCYCODE = $v['CURRENCYCODE'];
            $CURRENCYNAME = $v['CURRENCYNAME'];
            $BUY = $v['BUY'];
            $TRANSFER = $v['TRANSFER'];
            $SELL = $v['SELL'];
            $sql = "INSERT INTO Data (Time, CurrencyCode, CurrencyName, Buy,Transfer, Sell) 
            VALUES ('$d','$CURRENCYCODE' , '$CURRENCYNAME', '$BUY ', '$TRANSFER','$SELL');";
            $pdo->exec($sql);
        }
        $status = "INSERT to DATABASE SUCCEED!";
      }

      catch (PDOException $e) {
        $status = "Insertion failed!";
      }
      return $status;
}

?>