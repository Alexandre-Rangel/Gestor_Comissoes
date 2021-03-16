<!DOCTYPE html>
<html lang="pt-br">

<head>
@yield('header')
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de Gestão</title>

  


  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Kendo Ui JQuery -->
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.1.224/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.1.224/styles/kendo.rtl.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.1.224/styles/kendo.default.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.1.224/styles/kendo.mobile.all.min.css">
  <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2021.1.224/js/angular.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2021.1.224/js/jszip.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2021.1.224/js/kendo.all.min.js"></script>






</head>

<body>



<nav class="navbar navbar-light " style="background-color: #79b9e8;">
<div class="container-fluid">
<div class="col-11">


  <nav class="navbar navbar-light navbar-expand-md " >
    <a href="#" class="navbar-brand"> Software </a>
    <div class="collapse navbar-collapse" >
      <div class="navbar-nav">
        <a class="nav-link" href="{{route('home')}}">Principal</a>
        <a class="nav-link" href="{{route('vendedores')}}">Vendedores</a>
 
        <a class="nav-link" href="{{route('mercadorias')}}">Mercadorias</a>
        <a class="nav-link" href="{{route('comissao')}}">Comissão</a>
        <a class="nav-link" href="{{route('vendas')}}">Vendas</a>
        <a class="nav-link" href="{{route('adm')}}">Administração</a>
        <a class="nav-link" href="#">Logout</a>
 
      </div>


    </div>

  </nav>



  


  </div>




  <div class="col-1">

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <p>Administração </p>
    <a href="#" class="btn ">
      <div id="tot_carrinho"></div> <i class="fa fa-shopping-cart btn-lg"></i>
    </a>

    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Sair</a>
  </div>
</li>
</div>
  </div>
  
  </nav>




@yield('content')


</body>

</html>