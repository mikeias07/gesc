<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!-- =========== Trecho ABAIXO que nao esta sendo utilizado mais ======= -->
    <!--webService CEP-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>

<!--
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="http://themes.getbootstrap.com/xmlrpc.php">
    <link rel="apple-touch-icon" sizes="180x180" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/favicon-16x16.png">
    <link rel="manifest" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/manifest.json">
    <link rel="shortcut icon" href="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/images/fav/favicon.ico">
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/jquery.min.js"></script>
    <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/Chart.min.js"></script>
    <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/Chart.bundle.min.js"></script>
    <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/tether.min.js"></script>
    <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/popper.min.js"></script>
    <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/bootstrap.min.js"></script>
    <script src="http://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/assets/javascript/scripts.js?ver=1516485707"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
   
    --> <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  

   
  <!-- =========== Trecho ACIMA que nao esta sendo utilizado mais ======= -->
   

 
   <!--  <script src="{{ asset('.../js/app.js') }}" defer></script>
 -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet"> 
   
   <link rel="stylesheet" href="/css/style.css">
  <!--    <script src="js/Ativo-inativo.js"></script>
-->
    
    <title>GESC - Gerenciamento de Serviço de Convivência</title>
</head>
@yield('content')
</html>
