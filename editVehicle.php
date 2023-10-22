<?php 
    session_start();
    // Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}

    // Check if the user is not logged in
    if (isset($_SESSION["email"]) && isset($_SESSION['uname'])) {
        $user_Email = $_SESSION["email"];
        $user_namw = $_SESSION["uname"];
    }
    if (isset($_SESSION["seller_ID"])){
        $sellerID = $_SESSION["seller_ID"];
    }
    

?>
<?php require_once('inc/connection.php');  ?>
<?php 
    // $userID = 1;
    // $sellerID = 1;

    // $vehicle_ID  = "CHB_3961_2023_95";

    if (isset($_GET['vehicleID'])) {
        // Retrieve the 'vehicleID' from the URL
        $vehicle_ID = $_GET['vehicleID'];
    }
   
    
    //echo $_GET['vehicleID'];

    //main variables
    $brandName = '';
    $rental_cat ='';
    $model = '';
    $manufc_year ='';
    $License_pl_number = '';
    $color = '';
    $fuelType = '';
    $transmissionType = '';
    $number_of_passengers = '';
    $Vehicle_District = '';
    $number_of_passengers = '';
    $Vehical_city = '';
    $Rental_rates = '';
    $Driver_status = '';
    $Baby_seat_satus = '';
    $Price = '';
    $Vehicle_descriptions = '';

    $query = "SELECT * FROM selerhub WHERE VehicleID = '{$vehicle_ID}' LIMIT 1";
    $result_set = mysqli_query($connection,$query);
    if($result_set){
        if(mysqli_num_rows($result_set) == 1){

            $result = mysqli_fetch_assoc($result_set);

            $brandName = $result['BrandName']; 
            $rental_cat = $result['RentalCategory']; 
            $model = $result['Model']; 
            $manufc_year = $result['YearOfManufacture']; 
            $License_pl_number = $result['LicensePlateNumber']; 
            $color = $result['Color']; 
            $fuelType = $result['FuelType']; 
            $transmissionType = $result['TransmissionType']; 
            $number_of_passengers = $result['NumberOfPassengers']; 
            $Vehicle_District = $result['VehicleDistrict'];  
            $Vehical_city = $result['VehicleCity']; 
            $Rental_rates = $result['RentalRates']; 
            $Driver_status = $result['DriverStatus']; 
            $Baby_seat_satus = $result['BabySeatStatus']; 
            $Price = $result['Price']; 
            $Vehicle_descriptions = $result['VehicleDescriptions']; 

        }
    }


    // user click submit button
    if(isset($_POST['uploard'])){

        

        $brandName = $_POST['brandName'];
        $rental_cat = $_POST['rental_cat'];
        $model = $_POST['model'];
        $manufc_year = $_POST['manufc_year'];
        $License_pl_number = $_POST['License_pl_number'];
        $color = $_POST['color'];
        $fuelType = $_POST['fuelType'];
        $transmissionType = $_POST['transmissionType'];
        $number_of_passengers = $_POST['number_of_passengers'];
        $Vehicle_District = $_POST['Vehicle_District'];
        $number_of_passengers = $_POST['number_of_passengers'];
        $Vehical_city = $_POST['Vehical_city'];
        $Rental_rates = $_POST['Rental_rates'];
        $Driver_status = $_POST['Driver_status'];
        $Baby_seat_satus = $_POST['Baby_seat_satus'];
        $Price = $_POST['Price'];
        $Vehicle_descriptions = $_POST['Vehicle_descriptions'];


        //errors array
        $errors = array();
        //required fields
        $req_fields = array(
            'brandName',
            'rental_cat',
            'model',
            'manufc_year',
            'License_pl_number',
            'color',
            'fuelType',
            'transmissionType',
            'number_of_passengers',
            'Vehicle_District',
            'Vehical_city',
            'Rental_rates',
            'Driver_status',
            'Baby_seat_satus',
            'Price',
            'Vehicle_descriptions'
        );
        


        //cheacking empty fields
        foreach ($req_fields  as $feld) {
            if(empty(trim($_POST[$feld]))){
                $errors[] = $feld.' is required.!';
            }            
        }

   



            // there are no errors in the form
            if(empty($errors)){

               //sanitaze and mking variable
                $brandName = mysqli_real_escape_string($connection,$_POST['brandName']);
                $rental_cat = mysqli_real_escape_string($connection,$_POST['rental_cat']);
                $model = mysqli_real_escape_string($connection,$_POST['model']);
                $manufc_year = mysqli_real_escape_string($connection,$_POST['manufc_year']);
                $License_pl_number = mysqli_real_escape_string($connection,$_POST['License_pl_number']);
                $color = mysqli_real_escape_string($connection,$_POST['color']);
                $fuelType = mysqli_real_escape_string($connection,$_POST['fuelType']);
                $transmissionType = mysqli_real_escape_string($connection,$_POST['transmissionType']);
                $number_of_passengers = mysqli_real_escape_string($connection,$_POST['number_of_passengers']);
                $Vehicle_District = mysqli_real_escape_string($connection,$_POST['Vehicle_District']);
                $number_of_passengers = mysqli_real_escape_string($connection,$_POST['number_of_passengers']);
                $Vehical_city = mysqli_real_escape_string($connection,$_POST['Vehical_city']);
                $Rental_rates = mysqli_real_escape_string($connection,$_POST['Rental_rates']);
                $Driver_status = mysqli_real_escape_string($connection,$_POST['Driver_status']);
                $Baby_seat_satus = mysqli_real_escape_string($connection,$_POST['Baby_seat_satus']);
                $Price = mysqli_real_escape_string($connection,$_POST['Price']);
                $Vehicle_descriptions = mysqli_real_escape_string($connection,$_POST['Vehicle_descriptions']);

              
                    // Query worked, redirect or do something else
                    $current_date = date('Y-m-d');
                    $query = "UPDATE selerhub SET 
                    BrandName = '{$brandName}',
                    RentalCategory = '{$rental_cat}',
                    Model = '{$model}',
                    YearOfManufacture = '{$manufc_year}',
                    LicensePlateNumber = '{$License_pl_number}',
                    Color = '{$color}',
                    FuelType = '{$fuelType}',
                    TransmissionType = '{$transmissionType}',
                    NumberOfPassengers = '{$number_of_passengers}',
                    RentalRates = '{$Rental_rates}',
                    VehicleDescriptions = '{$Vehicle_descriptions}',
                    VehicleDistrict = '{$Vehicle_District}',
                    VehicleCity = '{$Vehical_city}',
                    DriverStatus = '{$Driver_status}',
                    BabySeatStatus = '{$Baby_seat_satus}',
                    Price = '{$Price}',
                    s_date = '{$current_date}',
                    Status = 'Active'
                    WHERE VehicleID = '{$vehicle_ID}'";

                    $result_set = mysqli_query($connection,$query);
                    if($result_set){
                        // query working.
                  
                        header('Location:sellerDachBord.php?Update=successfull');
                    }else{
                        $errors[] = 'Update Feald';
                    }
         
                

                
                
            }    

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHireHub.com</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" integrity="sha512-HXXR0l2yMwHDrDyxJbrMD9eLvPe3z3qL3PPeozNTsiHJEENxx8DH2CxmV05iwG0dwoz5n4gQZQyYLUNt1Wdgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .user-loggin-container .userlogging-from form span p{
            font-size: 15px;
        }
    </style>

</head>
<body>


        <!-- top navigation bar start -->
        <?php include('headder.php'); ?>
        <!-- mobile nav END -->

        
        
       <!-------- user login form start -------------  -->
       <br><br><br>

     <div class="user-loggin-container">
        <div class="userlogging-from">
            <form action="editVehicle.php?vehicleID=<?php echo $vehicle_ID ?>" method = "POST" enctype="multipart/form-data">
                <div class="heading"><p>Edit Your Vehicle</p></div>
                <?php
                    if(!empty($errors)){
                        echo '<div class="errors">';
                        echo '<p>There ware error(s) on your form</p><ul>';
                        foreach ($errors as  $error) {
                            echo '<li> --> '.$error.'</li>';
                        }
                        echo '<ul></div>';
                    }
                ?>
                <span>
                    <p>Brand name</p>
                    <span>
                        <!-- <img src="img/main/icons8-user-96.png" width="30px" alt=""> -->
                        <input type="text" placeholder="Toyota,HondaSuzuki.." name="brandName" <?php echo 'value="' . $brandName . '"'; ?>>  
                    </span>

                </span>

                    <span>
                    <p>Rental Category</p>
 
                        <select name="rental_cat" <?php echo 'value="' . $rental_cat . '"'; ?>>
                            <option value="economy">economy</option>
                            <option value="basic">basic</option>
                            <option value="premium">premium</option>
                            <option value="SUV">SUV</option>
                        </select>
                    </span>

                <span>
                    <p>Model</p>
                    <span>
                        <input type="text" placeholder="corrala,civic" name="model" <?php echo 'value="' . $model . '"'; ?>> 
                    </span>

                </span>

                <span>
                    <p>Year of Manufacture</p>
                    <span>
                    <select id="year_picker" name="manufc_year" <?php echo 'value="' .$manufc_year . '"'; ?>>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                    </span>

                </span>  
                
                <span>
                    <p>License Plate Number</p>
                    <span>
                        <input type="text" placeholder="LL - DDDD" name="License_pl_number" <?php echo 'value="' . $License_pl_number . '"'; ?>> 
                    </span>

                </span>

                <span>
                    <p>Color</p>
                    <span>
                        <input type="text" placeholder="Color" name="color" <?php echo 'value="' . $color . '"'; ?>> 
                    </span>
                </span>

                <span>
                    <p>Fuel Type </p>
                    <span>
                    <select id="fuelType" name="fuelType" <?php echo 'value="' . $fuelType . '"'; ?>>
                    <option value="gasoline">Gasoline</option>
                    <option value="diesel">Diesel</option>
                    <option value="petrol">petrol</option>
                    <option value="electric">Electric</option>
                    <option value="hybrid">Hybrid</option>
                    <option value="naturalGas">Natural Gas</option>
                    <option value="propane">Propane</option>
                    <option value="hydrogen">Hydrogen</option>
                    <option value="other">Other</option>
                </select>
                    </span>
                </span>
                

                <span>
                    <p>Transmission_type</p>
                    <span>
                    <select id="transmissionType" name="transmissionType" <?php echo 'value="' . $transmissionType . '"'; ?>>
                    <option value="automatic">Automatic</option>
                    <option value="manual">Manual</option>
                    <option value="semi-automatic">Semi-Automatic</option>
                    <option value="continuouslyVariable">Continuously Variable (CVT)</option>
                    <option value="otherTransmission">Other</option>
                </select>
                    </span>
                </span>

                <span>
                    <p>Number of Passengers</p>
                    <span>
                        <input type="number" value="3"  name="number_of_passengers" <?php echo 'value="' . $number_of_passengers . '"'; ?>> 
                    </span>
                </span>

                <span>
                    <p>Vehicle District</p>
                    <span>
                        <input type="text" placeholder="Vehicle District"  name="Vehicle_District" <?php echo 'value="' . $Vehicle_District . '"'; ?>> 
                    </span>
                </span>

                <span>
                    <p>Vehical City</p>
                    <span>
                        <input type="text"   name="Vehical_city" placeholder="Vehical City" <?php echo 'value="' . $Vehical_city . '"'; ?>> 
                    </span>
                </span>


                <span>
                    <p>Rental Rates</p>
                    <span>
                        <!-- <img src="img/main/icons8-user-96.png" width="30px" alt=""> -->
 
                        <select name="Rental_rates" <?php echo 'value="' . $Rental_rates . '"'; ?>>
                            <option value="per day">per day</option>
                            <option value="per week">per week</option>
                        </select>
                    </span>

                </span>

                <span>
                    <p>Driver Status</p>
                    <span>
                        <select name="Driver_status" <?php echo 'value="' . $Driver_status . '"'; ?>>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </span>
                </span>

                <span>
                    <p>Baby Seat Satus </p>
                    <span>
                        <select name="Baby_seat_satus" <?php echo 'value="' . $Baby_seat_satus . '"'; ?>>
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </span>
                </span>


                <span>
                    <p>Price</p>
                    <span>
                        <input type="text"   name="Price" placeholder="Price" <?php echo 'value="' . $Price . '"'; ?>> 
                    </span>
                </span>

                <span>
                    <p>Vehicle Descriptions</p>
                    <span>
                        <textarea name="Vehicle_descriptions" id="Vehicle_descriptions"  placeholder="Vehicle descriptions...." <?php echo 'value="' . $Vehicle_descriptions . '"'; ?>></textarea>
                    </span>
                </span>





                <span>
                    <p class="f-pass"><a href="#">Forgot Password</a></p>
                </span>
                <div class="ulo-button">
                    <button type="submit" name="uploard">Uploard</button>
                </div>    

                
            </form>
        </div>
     </div>

       <!-------- user login form start -------------  -->

    <!-- footer Start -->
   
    <?php include('footer.php'); ?>
    <!-- footer Start end-->
    <script src="js/script.js"></script>    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/Jqury/jquery.counterup.min.js"></script>
    <script>
        // Function to validate image files
        function validateImage(input) {
            var fileInput = document.getElementById(input.id);
            var file = fileInput.files[0];
            
            if (!file) {
                alert('Please select an image file.');
                return;
            }

            // Check for file type
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file (e.g., JPEG, PNG, GIF).');
                fileInput.value = ''; // Reset the input field
                return;
            }

            // You can perform further actions with the valid image file here.
        }

        // Add event listeners to the file input elements
        document.getElementById('inc_f').addEventListener('change', function() {
            validateImage(this);
        });

        document.getElementById('inc_b').addEventListener('change', function() {
            validateImage(this);
        });


        //---------- year picker --------------------------
        const startYear = 1900;
    const endYear = new Date().getFullYear();
    const yearPicker = document.getElementById("year_picker");

    for (let year = endYear; year >= startYear; year--) {
        const option = document.createElement("option");
        option.text = year;
        option.value = year;
        yearPicker.appendChild(option); 
    }
    </script>
    </body>
    </html>