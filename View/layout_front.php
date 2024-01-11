
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> </title>


  <link href="//fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
  
    rel="stylesheet">
        <!-- Font Icon -->
        <!-- <link rel="stylesheet" href="public/fonts/material-icon/css/material-design-iconic-font.min.css"> -->

<!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Template CSS -->
  <link rel="stylesheet" href="public/assets/css/style-starter.css">
  <style>
        .max-lines-3 {
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 3; /* Change this value to adjust the maximum number of lines */
      -webkit-box-orient: vertical;
    }
  </style>

  
</head>

<body>
  <!--header-->
  <header id="site-header" class="w3lhny-head fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke px-0">
        <h1> <a class="navbar-brand" href="index.php">
            <span class="sublog">Wikis.</span>
          </a></h1>
        <!-- if logo is image enable this   
  <a class="navbar-brand" href="#index.html">
      <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
  </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mx-lg-auto">
            <li class="nav-item active">
              <a class="nav-link text-black " href="index.php">Home <span class="sr-only">(current)</span></a>   </li>
              <?php if (isset( $_SESSION["Admin"]) || isset($_SESSION["auteur"])) { }else {     ?>
                <li class="nav-item active">
              <a href="index.php?action=form_login" class="nav-link  ">log in</a>   </li>
              <li class="nav-item active">
              <a href="index.php?action=form_registre" class="nav-link ">Create new account</a>   </li>
              <?php } ?>

         
          </ul>
        </div>
        <!-- toggle switch for light and dark theme -->
        <?php if (isset( $_SESSION["Admin"]) || isset($_SESSION["auteur"])) {      ?>
        <div class="mobile-position">
          <nav class="navigation">
          <div class="dropdown ">
      
              <a class="btn nav-link   dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-address-card"></i>
              </a>
             
              <ul class="dropdown-menu">
                <?php if (isset($_SESSION["auteur_id"])) {    ?>

                <li><a class="dropdown-item" href="index.php?action=profile&auteur_id=<?= $_SESSION["auteur_id"] ?>">My Profile</a></li>
                <?php  } ?>
                <li><a href="index.php?action=LogOut" class="dropdown-item">Log Out</a></li>
              </ul> 
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
    <?php }    ?>
 
  </header>
  <!--/header-->


 <?=  $contant ?>


  



    <!-- footer -->
  <footer class="w3l-footer-29-main">
    <div class="footer-29-w3l py-5">
      <div class="container py-lg-4">
        <div class="row footer-top-29">
          <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-1 pr-lg-5">
            <div class="footer-logo mb-3">
              <a class="footer-brand-logo" href="index.php">Wikis<span class="sublog"></span></a>

            </div>
            <p>Un wiki est une application web qui permet la création, la modification et l'illustration collaboratives de pages à l'intérieur d'un site web. Il utilise un langage de balisage et son contenu est modifiable au moyen d’un navigateur web. C'est un logiciel de gestion de contenu.</p>
            <div class="main-social-footer-29 mt-4">
              <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
              <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
              <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
              <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-sm-0 mt-5">

            <ul>
              <h6 class="footer-title-29">Usefull Links</h6>
              <li><a href="index.php">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>

              <li><a href="#who">Who We Are</a></li>

              <li><a href="#">Contact us</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-3 mt-lg-0 mt-5">
            <h6 class="footer-title-29">More Info</h6>
            <ul>
              <li><a href="#">Events</a></li>
              <li><a href="#petitions">Petitions</a></li>
              <li><a href="#member">
                  Membership</a></li>
              <li><a href="#donate">Donations</a></li>
              <li><a href="#help">Help</a></li>


            </ul>

          </div>
          <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4 mt-lg-0 mt-5">
            <h6 class="footer-title-29">Instagram
            </h6>

            <ul class="w3linst-imgs row">
              <li class="col-4"><a href="#"><img src="public/assets/images/b1.jpg" alt="" class="radius-image img-fluid"></a>
              </li>
              <li class="col-4"><a href="#"><img src="public/assets/images/b2.jpg" alt="" class="radius-image img-fluid"></a>
              </li>
              <li class="col-4"><a href="#"><img src="public/assets/images/b3.jpg" alt="" class="radius-image img-fluid"></a>
              </li>
              <li class="col-4"><a href="#"><img src="public/assets/images/b4.jpg" alt="" class="radius-image img-fluid"></a>
              </li>
              <li class="col-4"><a href="#"><img src="public/assets/images/b5.jpg" alt="" class="radius-image img-fluid"></a>
              </li>
              <li class="col-4"><a href="#"><img src="public/assets/images/b6.jpg" alt="" class="radius-image img-fluid"></a>
              </li>

            </ul>

          </div>
        </div>
      </div>
    </div>
    <!-- //footer -->

 
    <script>
      function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
    </script>

    <!-- /move top -->
  </footer>

  <!-- //copyright -->
  <!-- Template JavaScript -->
  <script src="public/assets/js/jquery-3.3.1.min.js"></script>
  <script src="public/assets/js/theme-change.js"></script>
  <!-- owlcarousel -->
  <!-- owl carousel -->
  <script src="public/assets/js/owl.carousel.js"></script>
  <!-- script for banner slider-->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1
          },
          480: {
            items: 1
          },
          667: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      })
    })
  </script>
  <!-- //script -->
  <!-- script for tesimonials carousel slider -->
  <script>
    $(document).ready(function () {
      $("#owl-demo2").owlCarousel({
        loop: true,
        nav: false,
        margin: 50,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          736: {
            items: 1,
            nav: false
          },
          991: {
            items: 2,
            margin: 30,
            nav: false
          },
          1080: {
            items: 2,
            nav: false
          }
        }
      })
    })
  </script>
  <!-- //script for tesimonials carousel slider -->
  <!-- owl carousel -->

  <!-- script for tesimonials carousel slider -->
  <script>
    $(document).ready(function () {
      $("#owl-demo2").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        responsiveClass: true,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          1000: {
            items: 1,
            nav: false,
            loop: false
          }
        }
      })
    })
  </script>
  <!-- //script for tesimonials carousel slider -->
  <!-- stats number counter-->
  <script src="public/assets/js/jquery.waypoints.min.js"></script>
  <script src="public/assets/js/jquery.countup.js"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats number counter -->
  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->
  <!-- <script src="public/vendor/jquery/jquery.min.js"></script> -->

  <script src="public/assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e9ea9ee727.js" crossorigin="anonymous"></script>
</body>

</html>