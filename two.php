<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background-color:#f38630;}
.tg .tg-j2zy{background-color:#FCFBE3;vertical-align:top}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-zczf{background-color:#FCFBE3;text-align:right;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}

@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
<title>Employee List</title>
<div class="tg-wrap"><table class="tg">
        <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('C:\Users\derrthom\Desktop\httpful.phar');
 
// And you're ready to go!
$var_value1 = $_GET['user'];
 $var_value2= $_GET['pass'];
//$response = \httpful\Request::get('http://php.net/manual/en/function.curl-exec.php')->addOnCurlOption(CURLOPT_PROXY, 'www-proxy-idc.in.oracle.com:80')->send();
$url = "https://osvctoasandbox.rightnowdemo.com/services/rest/connect/v1.3/contacts/";
$response = \Httpful\Request::get($url)
    ->addOnCurlOption(CURLOPT_PROXY, 'www-proxy-idc.in.oracle.com:80')
    ->authenticateWith($var_value1, $var_value2)
    ->expectsJson()
    ->withXTrivialHeader('Just as a demo')
    ->send();
$arr= json_decode($response,true);
$count=count($arr['items']);


 echo  '<tr>
    <th class="tg-baqh">New Employee List</th>
    <th class="tg-yw4l">v 1.0</th>
  </tr>
  <tr>
    <td class="tg-j2zy">Name</td>
    <td class="tg-j2zy">Contact ID</td>
  </tr>
  <tr>';
for($i=$count-1;$i>=$count-21;$i--)
{       
 echo  ' <td class="tg-yw4l">';
 $name=$arr['items'][$i]['lookupName'];
 echo "$name";
 echo'</td>';
 echo '<td class="tg-yw4l">';
 $id=$arr['items'][$i]['id'];
 echo '<a href=three.php?var1=',$id,'&var2=',$var_value1,'&var3=',$var_value2,'>';
 echo "$id";
 echo '</a>';
 echo '</td>';
 echo '</tr>';
} 
  ?>
</table></div>





