<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9D</title>    
    <style>
        * { box-sizing: border-box;
            padding: 0%;
            margin: 0%;
            font-family: "Courier New", Courier, monospace;
        }

        h1{font-weight: 400; font-size: 3rem;}
        h2{font-weight: 350; font-size: 1.5rem;}
        h3{font-weight: 250; font-size: 0.75rem;}
        
        header {text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #889696;
                padding-top: 2vw;
        }

        
        body {  display: grid;
                grid-template-rows: 2fr 10fr;
                background-color: #5F7470;
        }

        main {  display: grid;
                grid-template-columns: 1fr 2fr;
                gap: 1vw;
                padding-right: 1vw;
                padding-left: 1vw;
                
        }

            #filters {  display: grid;
                        grid-template-rows: 1fr 1fr;
                        gap: 1vw;
                        background-color: #B8BDB5;
                        margin-top: 1vw;
                        height: 25vw;
                        border-radius: 1vw;
                        border: 0.5vw solid #889696;
                        padding: 2vw;
                    }

                    #lChoice {  display: flex;
                                flex-direction: column;
                                align-items: flex-start;
                                justify-items: center;
                            }

            #photos {   background-color: #B8BDB5;
                        padding: 1vw;
                        border: 1vw groove #7c8a8aff;
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 1vw;
                        min-height: 40vw;
                        margin-top: 1vw;
                        margin-bottom: 1vw;
                    }

            .photoCard {    display: grid;
                            grid-template-columns: 1fr 1fr;
                            border-radius: 1vw;
                            border: 0.5vw solid #5F7470;
                            background-color: #E0E2DB;
                            height: 14.25vw;
                    }

                    .picContainer {
                        width: 10vw;
                        aspect-ratio: 3 / 4;
                        overflow: hidden;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                        .picContainer img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            object-position: center;
                            border-radius: 0.5vw;
                        }
                    .picInfo {  display: flex;
                                flex-direction: column;
                                align-items: flex-start;
                                justify-items: flex-start;
                                gap: 5px;
                                padding-top: 1vw;
                                line-height: 0.75rem;
                    }
                    #btn {  transform: translateX(100%);}
    </style>
</head> 

<body>
    <header><h1>Part D: Filter by Location/Year</h1></header>
    <main><?php require './db_connection.php';
        echo "<section id=\"filters\">
            <form action=\"https://webdev.cs.torontomu.ca/~poparina/lab09/lab09d.php\" method=\"POST\">";
                $allLocations = [];
                $allYears = [];
                
                //getting all table data
                $sql = "SELECT * FROM pictures ORDER BY STR_TO_DATE(dat, '%m/%d/%y') DESC ;";
                $result =  mysqli_query($connection, $sql);

                //extracting all unique Years and years
                while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
                    $r = explode(", ", $row['loc']);
                    $region = $r[1]; //ignoriong city
                    if (!in_array($region, $allLocations)) {
                        $allLocations[]= $region;
                    }

                    //extract year
                    $year = "20" . substr($row['dat'], -2);
                    if (!in_array($year, $allYears)) {
                        $allYears[]= $year;
                    }
                }
                mysqli_free_result($result);

                //building location filter
                $locationHTML = "<div id=\"lChoice\"><h2>Select Location(s)</h2>";
                for ($i=0; $i < sizeof($allLocations) ; $i++) { 
                    $name = "opt" . $i;
                    $locationHTML.= "<div><input type=\"checkbox\" id=\"{$name}\" name=\"{$name}\" value=\"{$allLocations[$i]}\"><label for=\"{$name}\">{$allLocations[$i]}</label>";
                }
                $locationHTML .= "</div></div><br>";
                echo $locationHTML;

                //building year filter
                $yearHTML = "<div id=\"yChoice\"><h2>Select Year</h2><select id=\"selectInput\" name=\"selectInput\">";
                for ($i=0; $i < sizeof($allYears); $i++) { 
                    $yearHTML .= "<option value=\"$allYears[$i]\">$allYears[$i]</option>";
                }
                $yearHTML .= "</select></div>";
                echo $yearHTML;

                echo "      <br><input id=\"btn\" type=\"submit\" value=\"Apply Filters\"/>
                        </form>
                    </section>
                    <section id=\"photos\">";
            
                //if data has been submitted, populate user choices
                if (isset($_POST['selectInput'])){
                    $selectedYear = $_POST['selectInput'];
                    $selectedLocations = [];
                    
                    for ($i = 0; $i < sizeof($allLocations); $i++) {
                        $name = "opt" . $i;
                        if (isset($_POST[$name])) {
                            $selectedLocations[] = $_POST[$name];
                        }
                    }
                    if (0 < sizeof($selectedLocations)){
                        //building query string according to choices
                        $sql = "SELECT * FROM pictures WHERE (";
                        for ($i=0; $i < sizeof($selectedLocations) ; $i++) { 
                            $sql.= "loc LIKE '%{$selectedLocations[$i]}' ";
                            $lim = sizeof($selectedLocations) - 1 ;
                            if ( $i < $lim ){$sql.= "OR ";}
                        }
                        $formatedYear = substr($selectedYear, -2);
                        $sql.= ") AND dat LIKE '%{$formatedYear}' ORDER BY STR_TO_DATE(dat, '%m/%d/%y') DESC ;";
    //for debugging
    echo "<script>console.log(\"" . addslashes($sql) . "\" );</script>";
                        
                        //display picks, or none found message
                        $result =  mysqli_query($connection, $sql);
                        if ($result){
                            if (mysqli_num_rows($result) > 0) {
                                while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
                                    //removing file path for display
                                    $fnArray = explode("/", $row['fil']);
                                    $fn = $fnArray[2];
                                        echo "<section class=\"photoCard\">
                                            <div class=\"picContainer\">
                                                <img src=\"{$row['fil']}\"/>
                                            </div>
                                            <div class=\"picInfo\">
                                                <h3>{$row['dat']}</h3>
                                                <h3>{$row['loc']}</h3>
                                                <br>
                                                <h3>{$row['txt']}</h3>
                                                <br>
                                                <h3>Photo ID: {$row['pic_id']}</h3>
                                                <h3>File Name: {$fn}</h3>
                                            </div>
                                        </section>";
                                }
                            }
                            else { echo "<h2>No Matches Found</h2>";}
                        }
                        else { echo "<h2>Query Failed :(</h2>";}
                        mysqli_free_result($result);
                    }
                }
                else {
                    echo "<h2>Please select Location(s) and Year</h2>";
                }
                mysqli_close($connection);
         echo "</section>";
    ?></main>
</body>
</html>