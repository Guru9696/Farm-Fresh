
<?php
// include('db_connection.php');
include('recommendation.php');
$recommended_crop = "";
$crop_image = "";
$cropsData=[];
$cropDetails=[];
$crop=[];


// Function to generate image URL based on the predicted crop
function getCropImage($crop_name) {
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
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<?php
include('common/navbar.php');

?>
<div class="content">
<div class="gray g2">
    <div class="container_12">
    <form action="" method="POST" class="decor">
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Predict Suitable Crop</h1>
        <p>To predict suitable crops based on soil type, climate, rainfall, temperature, humidity, and pH level</p>
        <!-- <input type="text" placeholder="Username">
        <input type="email" placeholder="Email">
        <textarea placeholder="Message..." rows="5"></textarea> -->
        <select id="soil_type" name="soil_type" required> <option value="" disabled selected>Select soil type</option> <option value="Loamy">Loamy</option> <option value="Clay">Clay</option> <option value="Sandy">Sandy</option> <option value="Silty">Silty</option> <option value="Peaty">Peaty</option> <option value="Chalky">Chalky</option> <option value="Gravelly">Gravelly</option> <option value="Saline">Saline</option> <option value="Alkaline">Alkaline</option> <option value="Acidic">Acidic</option> </select>

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

        // echo "Debug: Soil Type: " . htmlspecialchars($soil_type) . "<br>";
        // echo "Debug: pH: " . htmlspecialchars($pH) . "<br>";
        // echo "Debug: Rainfall: " . htmlspecialchars($rainfall) . "<br>";
        // echo "Debug: Temperature: " . htmlspecialchars($temperature) . "<br>";

        // Get the recommended crop name
        $recommended_crop = getCropRecommendation($soil_type, $pH, $rainfall, $temperature);
        // echo "Debug: Recommended Crop: " . htmlspecialchars($recommended_crop) . "<br>";

        // echo "Recommended Crop: " . htmlspecialchars($recommended_crop) . "<br>";

        // Get the corresponding image for the crop
        $crop_image = getCropImage($recommended_crop);
        // echo "<img src='$crop_image' alt='$recommended_crop' width='300'><br>";

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
        <h3>Suitable Crop : <?= htmlspecialchars($recommended_crop)?></h3>
         <?php
         if($crop_image){
            ?>
        <img src="<?= $crop_image ?>" alt="" width="366" height="362"  class="img_inner fleft">

            <?php
         }else{
         ?>
        <img src="images/page2_img1.jpg" alt="" width="366" height="362"  class="img_inner fleft">

         <?php
         }
         ?>

        <div class="extra_wrapper">

        <?php

// Check if decoding was successful
if (is_null($cropsData)) {
    die('Error decoding JSON data');
}

// Function to fetch crop details by name
function getCropDetails($cropName, $cropsData) {
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
        echo "<p>Crop Name: " . htmlspecialchars($cropDetails['name']) . "</p>";
        echo "<p>Soil Type: " . htmlspecialchars($cropDetails['soil_type']) . "</p>";
        echo "<p>pH Level: " . htmlspecialchars($cropDetails['pH']) . "</p>";
        echo "<p>Rainfall: " . htmlspecialchars($cropDetails['rainfall']) . " mm</p>";
        echo "<p>Temperature: " . htmlspecialchars($cropDetails['temperature']) . "°C</p>";
        // echo "<p>Description: " . htmlspecialchars($cropDetails['description']) . "</p>";
        // echo "<h3>Benefits:</h3>";
        // echo "<ul>";
        // foreach ($cropDetails['benefits'] as $benefit) {
        //     echo "<li>" . htmlspecialchars($benefit) . "</li>";
        // }
        // echo "</ul>";
   
?>

<?php
if($cropDetails['description']){
            ?>
       <p class="col1"><?=htmlspecialchars($cropDetails['description'])?><br>
          <a href="#" class="btn">More</a>
            <?php
         }else{
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

        
        <!-- <p class="p1">Kiorem ipsum dolor sit amet, consectetur adipiscing elitlore ylot. Integer semper dapibus pharetra. Aenean a rhoncuse justo. Henean consectetur tellus non purus accumsan idtril mollisar lorem commodo. Rtiam quis ante mattis laoreetewi risus eterto condimentum du. Sed id elementum nibhew ot. Nunc consewity gretroloni rew treol.</p>
        <div class="col1"><a href="#">Uokhasellus id adipiscing nu. </a></div>
        <p class="p2">Honecvelqq whjugue et nulla vehiculuo. </p>
        <div class="col1"><a href="#">Kokhasellus id dipiscing numa </a></div>
        <p class="p2">Koonecvelqq jugue et nulla vehiculup. </p>
        <div class="col1"><a href="#">Puokhasellus id adipiscing nutr. </a></div>
        <p class="p2">Jhonecvelqq whjugue et nulla vehiculum. </p>
        <div class="col1"><a href="#">Gfokhasellus id adipiscing nutre. </a></div>
        Kolonecvelqq whjugue nulla vehiculupi. </div> -->
      <div class="clear"></div>
    </div>
    <?php
         

        } else {
            echo "<p>Crop not found.</p>";
        }
    } else {
        echo "<p>Please provide a crop name in the query string, e.g., ?crop_name=Wheat</p>";
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
          <a href="#" class="btn">More</a> </div>
      </div>
      <div class="grid_4"> <img src="images/page2_img3.jpg" alt="" class="img_inner fleft">
        <div class="extra_wrapper">
          <time datetime="2045-01-01">15 May 2045</time>
          <div class="col1">Muokhasellus id adipiscing nut hylopyu aertroe. </div>
          Kellentesque fuctus massa tincidunt odio suscipiterelio vitae vulputate ri aenenet atisorem ipsumew.<br>
          <a href="#" class="btn">More</a> </div>
      </div>
      <div class="grid_4"> <img src="images/page2_img4.jpg" alt="" class="img_inner fleft">
        <div class="extra_wrapper">
          <time datetime="2045-01-01">19 May 2045</time>
          <div class="col1">Duokhasellus id adipiscing nut wropyu wertrolol. </div>
          Dellentesque luctus massa tincidunt adio suscipiterelio witae hulputate mi venenet atisorem ipsumq.<br>
          <a href="#" class="btn">More</a> </div>
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