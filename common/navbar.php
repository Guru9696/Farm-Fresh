
<!-- <script	src="js/currentClass.js"></script> -->

<script>
$(document).ready(function () {
    const currentPage = window.location.pathname.split('/').pop();
    $('nav ul li a').each(function () {
        if ($(this).attr('href') === currentPage) {
            $('nav ul li').removeClass('current');
            $(this).parent().addClass('current');
        }
    });
});
</script>

<header>
  <div class="container_12">
    <div class="grid_12">
      <div class="h_phone">Need Help? Call Us +1 (800) 123 4567</div>
      <h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="menu_block">
    <div class="container_12">
      <div class="grid_12">
        <div class="socials"><a href="#"></a><a href="#"></a></div>
        <div class="autor"> <a href="#">User Login</a> Social </div>
        <nav class="">
          <ul class="sf-menu">
            <li class="current"><a href="index.php">Home</a></li>
            <li class="with_ul"><a href="about.php">About</a></li>
            <li class="with_ul"><a href="recommendation_crop.php">Predict Crop</a></li>

            <li><a href="services.php">Services</a>
              <ul>
                <li><a href="#"> Services List</a>
                  <ul>
                    <li><a href="#">Seeds</a></li>
                    <li><a href="#">Traits</a></li>
                    <li><a href="#">Safety Control</a></li>
                  </ul>
                </li>
                <li><a href="#">Overview</a></li>
                <li><a href="#">FAQS</a></li>
              </ul>
            </li>
            <li><a href="products.php">Products</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contacts.php">Contacts</a></li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>