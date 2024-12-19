<!DOCTYPE html>
<html lang="en">
<head>
<title>Garden Truck</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script	src="js/jquery.touchSwipe.min.js"></script>
<script>
$(window).load(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: false,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 800,
        preset: 'fade',
        pagination: false, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: true,
        waitBannerAnimation: false,
        progressBar: false
    })
});
$(window).load(
    function () {
        $('.carousel1').carouFredSel({
            auto: false,
            prev: '.prev1',
            next: '.next1',
            width: 1030,
            items: {
                visible: {
                    min: 1,
                    max: 4
                },
                height: 'auto',
                width: 157,
            },
            responsive: true,
            scroll: 1,
            mousewheel: false,
            swipe: {
                onMouse: true,
                onTouch: true
            }
        });
    });
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body class="page1">
<?php
include('common/navbar.php');

?>
<div class="slider-relative">
  <div class="slider-block">
    <div class="slider"> <a href="#" class="prev"></a> <a href="#" class="next"></a>
      <ul class="items">
        <li> <img src="images/slide.jpg" alt="">
          <div class="banner">Healthy life <br>
            <br>
            tastes delicious</div>
        </li>
        <li> <img src="images/slide1.jpg" alt="">
          <div class="banner">A new generation <br>
            <br>
            of farming</div>
        </li>
        <li> <img src="images/slide2.jpg" alt="">
          <div class="banner">Best food is<br>
            <br>
            natural food</div>
        </li>
        <li> <img src="images/slide3.jpg" alt="">
          <div class="banner">New agricultural <br>
            <br>
            technologies only</div>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="content">
  <div class="black">
    <div class="page1_block">
      <div class="container_12">
        <div class="grid_12">
          <h2>Natural and fresh goods only!<br>
            <br>
            <br>
            The best agricultural technologies</h2>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="container_12">
      <div class="grid_3">
        <h3>Harvest</h3>
        <div class="col1">Qhasellus id adipiscing nunc. Tonec velko augue et nula ehicula pretium. Yonecjol po consequat achoumsan erat ac vulputatwyt. Ut consectetur commodo mollis. Ut necrcilo fg tells interdum aliquete. Phasellus juihers daiprtyiscing nunc. Conec vel augue etjotr lnulla hylo vehicula pretium. Nonec consde equat gtmk accumsan erat ac vulptase.</div>
        <a href="#" class="btn">More</a> </div>
      <div class="grid_3">
        <h3>Cultivation</h3>
        <div class="col1">Qhasellus id adipiscing nunc. Tonec velko augue et nula ehicula pretium. Yonecjol po consequat achoumsan erat ac vulputatwyt. Ut consectetur commodo mollis. Ut necrcilo fg tells interdum aliquete. Phasellus juihers daiprtyiscing nunc. Conec vel augue etjotr lnulla hylo vehicula pretium. Nonec consde equat gtmk accumsan erat ac vulptase.</div>
        <a href="#" class="btn">More</a> </div>
      <div class="grid_3">
        <h3>Protection</h3>
        <div class="col1">Qhasellus id adipiscing nunc. Tonec velko augue et nula ehicula pretium. Yonecjol po consequat achoumsan erat ac vulputatwyt. Ut consectetur commodo mollis. Ut necrcilo fg tells interdum aliquete. Phasellus juihers daiprtyiscing nunc. Conec vel augue etjotr lnulla hylo vehicula pretium. Nonec consde equat gtmk accumsan erat ac vulptase.</div>
        <a href="#" class="btn">More</a> </div>
      <div class="grid_3">
        <h3>Treatment</h3>
        <div class="col1">Qhasellus id adipiscing nunc. Tonec velko augue et nula ehicula pretium. Yonecjol po consequat achoumsan erat ac vulputatwyt. Ut consectetur commodo mollis. Ut necrcilo fg tells interdum aliquete. Phasellus juihers daiprtyiscing nunc. Conec vel augue etjotr lnulla hylo vehicula pretium. Nonec consde equat gtmk accumsan erat ac vulptase.</div>
        <a href="#" class="btn">More</a> </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="white">
    <div class="container_12">
      <div class="grid_7">
        <h3>Company Products</h3>
        <img src="images/page1_img1.jpg" alt="" class="img_inner fleft">
        <div class="extra_wrapper">
          <div class="text1"> Aliquam placerat ligula eu sem facilj is semper porta sem pellentesque. </div>
          <p class="col1"><a class="col2" href="#">Click here</a> for more info about this free website template created by TemplateMonster.com </p>
          Lkhasellus id adipiscing nunc. Donecvelqq wr augue et nulla vehicula pretium. Donew ctryi weconsequat accumsan erat ac vu jo lputate. Kt consectetur commodo mollis. Ut necrci we tellus interdum aliquet. Johaseko kolo	lus id adipiscing nunc. Donec veldsak augue et nulr jver ehicula pretium. <br>
          <a href="#" class="btn">More</a> </div>
      </div>
      <div class="grid_4 prefix_1">
        <h3>Technologies</h3>
        <img src="images/page1_img2.jpg" alt="" class="img_inner fleft i1">
        <div class="extra_wrapper">
          <div class="col1"> <a href="#">Mklhasellus aed hadipiscin nury.</a> </div>
          Konecvel whjugute etew nulla vehiculuote. pretium. Donew ctryi weconsequat accure msan erat ac vu jo lputatesectetur. </div>
        <div class="clear cl1"></div>
        <img src="images/page1_img3.jpg" alt="" class="img_inner fleft i1">
        <div class="extra_wrapper">
          <div class="col1"> <a href="#">Uokhasellus id adipiscing nu.</a> </div>
          Honecvelqq whjugue et nulla vehiculuowe. Kjonecvelqq jugue et nulla vehiculoretium. Donew ctryi weconsequat accumsan. </div>
        <div class="clear cl2"></div>
        <img src="images/page1_img4.jpg" alt="" class="img_inner fleft i1">
        <div class="extra_wrapper">
          <div class="col1 "> <a href="#">Lkokhasellusuop adipiscing nuretilo kolitri.</a> </div>
          Kjonecvelqq jugue et nulla vehiculoretium. Donew ctryi weconsequat accumsan erat ac vu jo lputateconsectetur commodo. </div>
        <div class="clear"></div>
        <a href="#" class="btn">More</a> </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="gray">
    <div class="container_12">
      <div class="grid_12">
        <div class="car"> <a href="#" class="prev1"></a> <a href="#" class="next1"></a>
          <div class="car_div">
            <ul class="carousel1">
              <li><a href="#"><img src="images/logo1.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo2.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo3.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo4.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo2.png" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<?php
include('common/footer.php');

?>
</body>
</html>