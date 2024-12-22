<?php
// include('db_connection.php');
include('recommendation.php');
$recommended_crop = "";
$crop_image = "";
$cropsData = [];
$cropDetails = [];
$crop = [];


// Function to generate image URL based on the predicted crop
function getCropImage($crop_name)
{
  $image_folder = "crop_images/";  // Folder where crop images are stored
  $image_file = strtolower($crop_name) . ".webp";  // Image filename
  $image_path = $image_folder . $image_file;

  if (file_exists($image_path)) {
    return $image_path;
  } else {
    return "images/page2_img1.jpg";  // Default image if the crop image is not found
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Garden Truck | Predict Crop</title>
  <meta charset="utf-8">
  <link rel="icon" href="images/favicon.ico">
  <link rel="shortcut icon" href="images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/predict.css">

  <script src="js/jquery.js"></script>
  <script src="js/jquery-migrate-1.1.1.js"></script>
  <script src="js/superfish.js"></script>
  <script src="js/sForm.js"></script>
  <script src="js/jquery.equalheights.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>

</head>

<body>
  <?php
  include('common/navbar.php');

  ?>
  <div class="content">
    <div class="gray g2">
      <div class="container_12">
        <form action="" method="POST" id=" #predict_form" class="decor">
          <div class="form-left-decoration"></div>
          <div class="form-right-decoration"></div>
          <div class="circle"></div>
          <div class="form-inner">
            <h1>Predict Suitable Crop</h1>
            <p>To predict suitable crops based on soil type, climate, rainfall, temperature, humidity, and pH level</p>

            <select id="soil_type" name="soil_type" required>
              <option value="" disabled selected>Select soil type</option>
              <option value="Loamy">Loamy</option>
              <option value="Clay">Clay</option>
              <option value="Sandy">Sandy</option>
              <option value="Silty">Silty</option>
              <option value="Peaty">Peaty</option>
              <option value="Chalky">Chalky</option>
              <option value="Gravelly">Gravelly</option>
              <option value="Saline">Saline</option>
              <option value="Alkaline">Alkaline</option>
              <option value="Acidic">Acidic</option>
            </select>

            <input type="text" id="pH" name="pH" placeholder="pH Level" required>

            <input type="text" id="rainfall" name="rainfall" placeholder="Rainfall (mm)" required>

            <input type="text" id="temperature" name="temperature" placeholder="Farm Temperature (°C)" required>
            <button type="submit">Submit</button>
          </div>
        </form>


        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $soil_type = $_POST['soil_type'];
          $pH = $_POST['pH'];
          $rainfall = $_POST['rainfall'];
          $temperature = $_POST['temperature'];

          // Get the recommended crop name
          $recommended_crop = getCropRecommendation($soil_type, $pH, $rainfall, $temperature);

          // Get the corresponding image for the crop
          $crop_image = getCropImage($recommended_crop);

          // Path to the JSON file 
          $jsonFilePath = 'crop_all_data.json'; // Read the JSON file contents 
          $jsonData = file_get_contents($jsonFilePath); // Decode the JSON data into a PHP array
          $cropsData = json_decode($jsonData, true);
        }
        ?>
      </div>
      <div class="clear"></div>
    </div>
    <div class="black bl1">
      <div class="container_12">
        <div class="grid_8">
          <h3>Suitable Crop : <?= htmlspecialchars($recommended_crop) ?></h3>
          <?php
          if ($crop_image) {
          ?>
            <img src="<?= $crop_image ?>" alt="" width="366" height="362" class="img_inner fleft">

          <?php
          } else {
          ?>
            <img src="images/page2_img1.jpg" alt="" width="366" height="362" class="img_inner fleft">

          <?php
          }
          ?>

          <div class="extra_wrapper">

            <?php

            // Check if decoding was successful
            if ($cropsData) {


              // Function to fetch crop details by name
              function getCropDetails($cropName, $cropsData)
              {
                foreach ($cropsData['crops'] as $crop) {
                  if (strcasecmp($crop['name'], $cropName) == 0) {
                    return $crop;
                  }
                }
                return null;
              }


              // Check if a crop name is provided in the query string
              if (isset($recommended_crop)) {
                $cropName = $recommended_crop;
                $cropDetails = getCropDetails($cropName, $cropsData);

                if ($cropDetails) {

            ?>

                  <?php
                  if ($cropDetails['description']) {
                  ?>

                    <p class="col1">Crop Name: <?php echo htmlspecialchars($cropDetails['name']); ?></p>
                    <p class="col1">Soil Type: <?php echo htmlspecialchars($cropDetails['soil_type']); ?></p>
                    <p class="col1">pH Level: <?php echo htmlspecialchars($cropDetails['pH']); ?></p>
                    <p class="col1">Rainfall: <?php echo htmlspecialchars($cropDetails['rainfall']); ?> mm</p>
                    <p class="col1">Temperature: <?php echo htmlspecialchars($cropDetails['temperature']); ?></p>
                    <p class="col1"><?= htmlspecialchars($cropDetails['description']) ?></p><br>

                    <p> <a href="#" class="btn">More</a>
                    </p>

                  <?php
                  } else {
                  ?>
                    <p class="col1">Lorem ipsum dolor sit amet, consectetur adipiscing elitylot. Integer semper dapibus pharetra. Aenean a rhoncus justo. Aenean consectetur tellus non purus accumsan id mollisar lorem commodo. Etiam quis ante mattis laoreet risus eterto condimentum dui. Sed id elementum nibh. Nunc consewity ecetur metus eu massa feugiat pellentesque. Praesentaloi accumsan eu sem non consectetur. Morbi in vulputatertelo purus. Proin pharetra lacus fermentum augue rhoncuserw dapibus id euismod ante rutrum. </p>
                    Donec fringilla tincidunt tellus ut venenatis. Quisquetromot aliquam placerat sapien ut consequat. Nulla tincidunt odiot adipiscing libero ultricies, id euismod ante rutrum. Maurisat placerat ipsum nec velit dignissim vel congue dolorerotylok ultrcies. Pellentesque luctus massa tincidunt odio suscipite vitae vulputate mi venenatis. Lorem ipsum dolor sit ametw consectetur adipiscing elit. Integer semper dapibus pharyti etra. Aenean a rhoncus justo. Aenean consectetur tellusoli non purus accumsan id mollis lorem commodo. Etiam quisi ante mattis laoreet risus et, condimentum dui.<br>
                    <a href="#" class="btn">More</a>
                  <?php
                  }

                  ?>

          </div>
        </div>
        <div class="grid_4">
          <h3>Advantages</h3>

          <p class="p1">Kiorem ipsum dolor sit amet, consectetur adipiscing elitlore ylot. Integer semper dapibus pharetra. Aenean a rhoncuse justo. Henean consectetur tellus non purus accumsan idtril mollisar lorem commodo. Rtiam quis ante mattis laoreetewi risus eterto condimentum du. Sed id elementum nibhew ot. Nunc consewity gretroloni rew treol.</p>
          <div class="col1"><a href="#">Uokhasellus id adipiscing nu. </a></div>
          <p class="p2">Honecvelqq whjugue et nulla vehiculuo. </p>
          <div class="col1"><a href="#">Kokhasellus id dipiscing numa </a></div>
          <p class="p2">Koonecvelqq jugue et nulla vehiculup. </p>
          <div class="col1"><a href="#">Puokhasellus id adipiscing nutr. </a></div>
          <p class="p2">Jhonecvelqq whjugue et nulla vehiculum. </p>
          <div class="col1"><a href="#">Gfokhasellus id adipiscing nutre. </a></div>
          <p class="p2">Kolonecvelqq whjugue nulla vehiculupi.
        </div>


        <div class="clear"></div>
      </div>
  <?php

                } else {
                  echo "<p>Not found crop, e.g., ?crop_name=Wheat</p>";
                }
              } else {

                echo "<p>Please provide a crop name in the query string, e.g., ?crop_name=Wheat</p>";
              }
            } else {
  ?>

  <p class="col1">Lorem ipsum dolor sit amet, consectetur adipiscing elitylot. Integer semper dapibus pharetra. Aenean a rhoncus justo. Aenean consectetur tellus non purus accumsan id mollisar lorem commodo. Etiam quis ante mattis laoreet risus eterto condimentum dui. Sed id elementum nibh. Nunc consewity ecetur metus eu massa feugiat pellentesque. Praesentaloi accumsan eu sem non consectetur. Morbi in vulputatertelo purus. Proin pharetra lacus fermentum augue rhoncuserw dapibus id euismod ante rutrum. </p>
  Donec fringilla tincidunt tellus ut venenatis. Quisquetromot aliquam placerat sapien ut consequat. Nulla tincidunt odiot adipiscing libero ultricies, id euismod ante rutrum. Maurisat placerat ipsum nec velit dignissim vel congue dolorerotylok ultrcies. Pellentesque luctus massa tincidunt odio suscipite vitae vulputate mi venenatis. Lorem ipsum dolor sit ametw consectetur adipiscing elit. Integer semper dapibus pharyti etra. Aenean a rhoncus justo. Aenean consectetur tellusoli non purus accumsan id mollis lorem commodo. Etiam quisi ante mattis laoreet risus et, condimentum dui.<br>
  <a href="#" class="btn">More</a>


    </div>
  </div>
  <div class="grid_4">
    <h3>Advantages</h3>

    <p class="p1">Kiorem ipsum dolor sit amet, consectetur adipiscing elitlore ylot. Integer semper dapibus pharetra. Aenean a rhoncuse justo. Henean consectetur tellus non purus accumsan idtril mollisar lorem commodo. Rtiam quis ante mattis laoreetewi risus eterto condimentum du. Sed id elementum nibhew ot. Nunc consewity gretroloni rew treol.</p>
    <div class="col1"><a href="#">Uokhasellus id adipiscing nu. </a></div>
    <p class="p2">Honecvelqq whjugue et nulla vehiculuo. </p>
    <div class="col1"><a href="#">Kokhasellus id dipiscing numa </a></div>
    <p class="p2">Koonecvelqq jugue et nulla vehiculup. </p>
    <div class="col1"><a href="#">Puokhasellus id adipiscing nutr. </a></div>
    <p class="p2">Jhonecvelqq whjugue et nulla vehiculum. </p>
    <div class="col1"><a href="#">Gfokhasellus id adipiscing nutre. </a></div>
    <p class="p2">Kolonecvelqq whjugue nulla vehiculupi.
  </div>

  <div class="clear"></div>
  </div>
<?php
              // echo "<p>not get data from json.</p>";

            }
?>
</div>
<div class="white wt1">
  <div class="container_12">
    <div class="grid_12">
      <h3>Our News</h3>
    </div>
    <div class="grid_4"> <img src="images/page2_img2.jpg" alt="" class="img_inner fleft">
      <div class="extra_wrapper">
        <time datetime="2045-01-01">12 May 2045</time>
        <div class="col1">Kuokhasellus id adipiscing nut hylopyu wertrol. </div>
        Pellentesque luctus massa tincidunt odio suscipiterelio vitae vulputate mi venenet atisorem ipsum.<br>
        <a href="#" class="btn">More</a>
      </div>
    </div>
    <div class="grid_4"> <img src="images/page2_img3.jpg" alt="" class="img_inner fleft">
      <div class="extra_wrapper">
        <time datetime="2045-01-01">15 May 2045</time>
        <div class="col1">Muokhasellus id adipiscing nut hylopyu aertroe. </div>
        Kellentesque fuctus massa tincidunt odio suscipiterelio vitae vulputate ri aenenet atisorem ipsumew.<br>
        <a href="#" class="btn">More</a>
      </div>
    </div>
    <div class="grid_4"> <img src="images/page2_img4.jpg" alt="" class="img_inner fleft">
      <div class="extra_wrapper">
        <time datetime="2045-01-01">19 May 2045</time>
        <div class="col1">Duokhasellus id adipiscing nut wropyu wertrolol. </div>
        Dellentesque luctus massa tincidunt adio suscipiterelio witae hulputate mi venenet atisorem ipsumq.<br>
        <a href="#" class="btn">More</a>
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