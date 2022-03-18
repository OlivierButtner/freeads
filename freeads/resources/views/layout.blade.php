<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Freeads</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/df0909b738.js" crossorigin="anonymous"></script>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "flex ";
    x.style.alignContent= "center";
    x.style.justifyContent="space-around";
    x.style.alignItems="center";
    x.style.width="100%";
  } else {
    x.style.display = "none";
  }
}
</script>

</head>
<body class="template-for-all-site">
<header>
    <div class="top-bar">
        <div class="logo"><i class="fas fa-handshake logo"></i></a> </div>
        <div class="home"><a href="/" class="link-topbar">HOME</a></div>

        <button id="burger" onclick="myFunction()"><img src="{{ asset('picture/add-on/menu-hamburger.png') }}"></button>
        
       
        <div class="loupe"><img src="{{ asset('picture/add-on/loupe_200*200.png')}}" class="loupe"></div>
        <div class="search-bar">
            <form action="/" method="post" class="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="submit" type="button"/>
                <input type="text" name="search"/>
            </form>
        </div>


          <?php 
            if(auth()->guest()){

            ?>
                <div class="my-page"><a href="/signup" class="link-topbar">Sign UP</a></div>
                <div class="login"><a href="/connexion" class="link-topbar">LOGIN</a></div>
            <?php
            }else{?>
            <div class="my-page"><a href="/mon-compte" class="link-topbar">My Page</a></div>
            <div class="login"><a href="/deconnexion" class="link-topbar">LOGOUT</a></div>
  <?php
            }
        ?>

        
        
       
        <div class="post-ads"><a href="/createAd" class="link-post-ads"> + POST-ADS </a></div>
    </div>
     <div id="myDIV" class=menu-hamburger>

            <p class="home-hamburger"><a href="/" class="link-topbar-hamburger">HOME</a></p>

            <p class="my-page-hamburger"><a href="my-page.blade.php" class="link-topbar-hamburger">My Page</a></p>
            <p class="post-ads-hamburger"><a href="post-ads.blade.php" class="link-post-ads-hamburger"> + POST-ADS </a>
            </p>
       </div>

</header>
    
    @yield('contenu')
    


</body>
</html>

