<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Employee Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include('C:\Users\derrthom\Desktop\httpful.phar');
 
// And you're ready to go!

//$response = \httpful\Request::get('http://php.net/manual/en/function.curl-exec.php')->addOnCurlOption(CURLOPT_PROXY, 'www-proxy-idc.in.oracle.com:80')->send();
$num=$_GET['var1'];
$user=$_GET['var2'];
$pass=$_GET['var3'];
$url = "https://osvctoasandbox.rightnowdemo.com/services/rest/connect/latest/contacts/$num";

$response = \Httpful\Request::get($url)
    ->addOnCurlOption(CURLOPT_PROXY, 'www-proxy-idc.in.oracle.com:80')
    ->authenticateWith($user,$pass)
    ->expectsJson()
    ->withXTrivialHeader('Just as a demo')
    ->send();
 
echo '<div class="container-fluid">
        <div class="row promo">
       	<a href="#">
				<div class="col-md-4 promo-item item-1">
					<h3>';
					echo "Contact ID:{$response->body->id}";
                                        echo '<br>';
                                        echo "Name:{$response->body->lookupName}";
                                        echo '</h3>
				</div>
            </a>
        </div>
    </div>
     <div class="container-fluid">
        <div class="row promo">
       	<a href="#">
				<div class="col-md-4 promo-item item-2">
					<h3>';
                                        
					echo "UserName:  {$response->body->customFields->c->us_name}";
                                        
                                          echo '  </h3>
				</div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row promo">
       	<a href="#">
				<div class="col-md-4 promo-item item-4">
					<h3><font color="red">';
					echo "PL/SQL:  {$response->body->customFields->c->pl_sql}";
                                        echo '</font></h3>
				</div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row promo">
       	<a href="#">
				<div class="col-md-4 promo-item item-4">
					<h3><font color="red">';
					echo "Java EE:  {$response->body->customFields->c->java_ee}";
                                        echo '</font></h3>
				</div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row promo">
       	<a href="#">
				<div class="col-md-4 promo-item item-4">
					<h3><font color="red">';
					echo "EBS Learning:  {$response->body->customFields->c->ebs}";
                                        echo '</font></h3>
				</div>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row promo">
       	<a href="#">
				<div class="col-md-4 promo-item item-4">
					<h3><font color="red">';
					echo "CX Cloud:  {$response->body->customFields->c->cx_cloud}";
                                        echo '</font></h3>
				</div>
            </a>
        </div>
    </div>';
/*echo "{$response->body->lookupName} joined GitHub on " ;.
                        date('M jS', strtotime($response->body->created_at)) ."\n";*/
        ?>
    </body>
</html>
