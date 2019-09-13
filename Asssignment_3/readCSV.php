<html>

<head>

    <title>
        read csv
    </title>



    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/newcss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone no.</th>
                    <th>Message</th>
                </tr>
            </thead>


            <?php

            $fileName = 'FinalMissingData.csv';
            

            if(file_exists($fileName))
            {
                $fileData = readCSV($fileName);

                //echo $fileData[0][0];
                //echo print_r($fileData);

                echo '<tbody>';
                foreach($fileData as $Data)
                {
                        if(!empty($Data))
                        {
                            // echo count($Data);
                            // echo '<pre>';
                            // echo $Data[1];

                            echo  '<tr>';

                            for($i=0;$i<6;$i++)
                            {
                                echo '<td>';
                                echo $Data[$i];
                                echo '</td>';
                            }
    
                            echo '</tr>';
                        }
                }

                echo '</tbody>';
            }


            function readCSV($csvFile)
            {
                    $file_handle = fopen($csvFile, 'r');
                    while (!feof($file_handle)) {
                        $line_of_text[] = fgetcsv($file_handle, 1024);
                        //echo print_r($line_of_text);
                    }
                    fclose($file_handle);
                    return $line_of_text;
                
            }
            
      
            ?>
        </table>
    </div>

</body>


</html>