<?php
//Tải code demo tại: https://goo.gl/4mjkd2
http://sandbox.vnpayment.vn/paymentv2/vpcpay.html?vnp_Amount=10000000&vnp_BankCode=NCB&vnp_Command=pay&vnp_CreateDate=20170829103111&vnp_CurrCode=VND&vnp_IpAddr=172.16.68.68&vnp_Locale=vn&vnp_Merchant=DEMO&vnp_OrderInfo=Nap+tien+cho+thue+bao+0123456789.+So+tien+100%2c000&vnp_OrderType=topup&vnp_ReturnUrl=http%3a%2f%2fsandbox.vnpayment.vn%2ftryitnow%2fHome%2fVnPayReturn&vnp_TmnCode=2QXUI4J4&vnp_TxnRef=23554&vnp_Version=2&vnp_SecureHashType=SHA256&vnp_SecureHash=e6ce09ae6695ad034f8b6e6aadf2726f
$vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.htm";
$vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
$vnp_TmnCode = "";//Mã website tại VNPAY
$vnp_HashSecret = ""; //Chuỗi bí mật

$vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = $_POST['orderDesc'];
$vnp_OrderType = $_POST['ordertype'];
$vnp_Amount = $_POST['amount'] * 100;
$vnp_Locale = $_POST['language'];
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
$inputData = array(
  "vnp_Version" => "2.0.0",
  "vnp_TmnCode" => vnp_TmnCode,
  "vnp_Amount" => $vnp_Amount,
  "vnp_Command" => "pay",
  "vnp_CreateDate" => date('YmdHis'),
  "vnp_CurrCode" => "VND",
  "vnp_IpAddr" => $vnp_IpAddr,
  "vnp_Locale" => $vnp_Locale,
  "vnp_OrderInfo" => $vnp_OrderInfo,
  "vnp_OrderType" => $vnp_OrderType,
  "vnp_ReturnUrl" => $vnp_Returnurl,
  "vnp_TxnRef" => $vnp_TxnRef,
);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
  if ($i == 1) {
    $hashdata .= '&' . $key . "=" . $value;
  } else {
    $hashdata .= $key . "=" . $value;
    $i = 1;
  }
  $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
  $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
  $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
}
?>