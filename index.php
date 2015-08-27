<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/normalize.css">  
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body >
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="container-fluid" id="main-container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3" id="text">
          <h1 id="title">Weather Forecast</h1>
          <p class="lead">Are you wondering what the weather will be like today?</p>
          <p class="lead">Submit your city below and find out!</p>
          <form>
            <div class="form-group">
              <input type="text" class="form-control" name="city" id="city" placeholder="Tell me your city. Eg. London, San Francisco, Mars" autofocus>
            </div>
            <button class="btn btn-success btn-lg" id="button">Show today's forecast!</button>
          </form>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success" id="success">Success!</div>
                <div class="alert alert-danger" id="fail">Sorry, we couldn't find the weather for this city. Are you sure it's a city on planet Earth? :)</div>
                <div class="alert alert-danger" id="noCity">Please enter a city</div>
              </div>  
            </div>    
          </div>
          

        </div>

     </div>
    </div>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      
      $("#button").click(function(event) {
        event.preventDefault();
          $(".alert").hide();

        if ($("#city").val()!="") {

          $.get("scraper.php?city="+$("#city").val(), function(data) {
          
          if(data=="") {
            $("#fail").fadeIn();        
          } else {
             $("#success").html(data).fadeIn();
          }
        });
        } else {
          $("#noCity").fadeIn();
          }
        });   

      $("#main-container").css("min-height", $(window).height());
      $("#text").css("margin-top", $(window).height()/6);

        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>    
  </body>
</html>