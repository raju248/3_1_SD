<?php



$filename ='FinalMissingData.csv';

// $id = 1;



// if(file_exists($filename))
// {
//   
//     if (count($DataFromFile) > 0) {
//         echo "array size is greater than zero";
//     }
//     else {
//         echo "array size is zero";
//     }

   
// }

$id = 0;

if(file_exists($filename))
{
    $DataFromFile = readCSV($filename);
    $id = count($DataFromFile);
}
else
{
    $id = 0;
}
       



$new_csv = fopen($filename, 'a');
    if(!empty($_POST))
    {
        $formatted_value = sprintf("%011d", $_POST["PhoneNo"]);
        $resOrder = array(
            0 => $id,
            1 => $_POST["FirstName"],
            2 => $_POST["LastName"],
            3 => $_POST["Email"],
            4 => $formatted_value,
            5 => $_POST["message"]
            );

      fputcsv($new_csv, $resOrder);

      
    }


    function readCSV($csvFile){

    
            $file_handle = fopen($csvFile, 'r');
            while (!feof($file_handle) ) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
            }
            fclose($file_handle);
            return $line_of_text;
        
    }



?>




<html>

<head>

    <title>
        Php form
    </title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/newcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body>


    <div class="main">

        <h1>Send Us A Message</h1>




        <form action="" method= "post">


            <div class="block1">

                <div class="Header align-items-center">
                    <p class="text-uppercase font-weight-bold">tell us your name*</p>
                </div>

                <div class="twoInput">

                    <input id="firstName" type="text" placeholder="First Name" name="FirstName">
                    <input id="lastName" type="text" placeholder="Last Name" name="LastName">

                </div>

            </div>



            <div class="block1">

                <div class="Header align-items-center">
                    <p class="text-uppercase font-weight-bold">Enter your email*</p>
                </div>

                <div class="twoInput">

                    <input id="email" type="Email" placeholder="Eg. example@example.com" name="Email">

                </div>

            </div>

            <div class="block1">

                <div class="Header align-items-center ">
                    <p class="text-uppercase font-weight-bold">enter phone number*</p>
                </div>

                <div class="twoInput">

                    <input id="email" type="text" placeholder="Eg. +1800 0000000" name="PhoneNo">

                </div>

            </div>


            <div class="block1">

                <div class="Header align-items-center ">
                    <p class="text-uppercase font-weight-bold">Message*</p>
                </div>

                <div class="twoInput">

                    <textarea name="message" id="email" rows="6" placeholder="Write us a messsage"></textarea>

                </div>

            </div>

            <button type="submit" class="btn btn-success text-uppercase">Send Message</button>

        </form>




    </div>


</body>

</html>