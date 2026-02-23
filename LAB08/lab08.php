<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lab8.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <title>Lab 8: PHP</title>
</head>
<body>
    <header>
        <h1>Lab 8</h1>
    </header>
    <main>
        <?php
            if (isset($_COOKIE['FavouriteImage'])) {
                echo "<div id=\"FavImgDisplay\"><img src=\"./assets/p3/{$_COOKIE['FavouriteImage']}\" alt=\"Your favourite image\"></div>";
            }
            else {  
                echo "<div><h3>pick a favourite image and it will be displayed here next time</h3></div>";
            }
        ?>

        <section id="mainContent">
            <section id="prob1">
                <?php
                    $imgPath = "";
                    $greeting = "";
                    $greetStyle = " font-size: 4rem;
                                    font-family: 'Playfair Display', Georgia, serif;
                                    font-weight: 700;
                                    text-align: center; ";
                    $curHour = intval(date('H'));

                    if ($curHour <  5 || $curHour >= 23 ){
                        $imgPath = "./assets/p1/_night.jpg";
                        $greeting = "Good Night!";
                        $greetStyle = $greetStyle . 'color: #d9e3e5; text-shadow: 3px 3px 5px #d9e3e5; ';
                    }
                    elseif ($curHour >= 5 && $curHour < 12) {
                        $imgPath = "./assets/p1/morning.jpg";
                        $greeting = "Good Morning!";
                        $greetStyle =  $greetStyle . 'color: #5b2120; text-shadow: 5px 3px 5px #fdd148; ';
                    }
                    elseif ($curHour >= 12 && $curHour < 18) {
                        $imgPath = "./assets/p1/day.jpg";
                        $greeting = "Good Afternoon!";
                        $greetStyle =  $greetStyle . 'color: #356281ff; text-shadow:3px 3px 7px #ced2db; ';
                    }
                    elseif ($curHour >= 18 && $curHour < 23) {
                        $imgPath = "./assets/p1/evening.jpg";
                        $greeting = "Good Evening!";
                        $greetStyle =  $greetStyle . 'color: #231e16; text-shadow: 5px 3px 5px #e79b1e; ';
                    }

                    $displayHTML = <<<ABC
                        <div class="p1Display" style="background-image: url('$imgPath'); border-radius: 0.5vw;">
                            <h1 class="greeting" style="$greetStyle">$greeting </h1>
                        </div>
                    ABC;
                    echo $displayHTML;
                ?>
            </section>
            
            <section id="prob2">
                <div class="prob2Child">
                    <h2>Enter Two Integers</h2>
                    <h3>between 3 and 12 (inclusive)</h3>
                    <form action="https://www2.cs.torontomu.ca/~poparina/lab08/lab08.php" method="POST">
                        <div id="numInputs"> 
                            <div class="inputWrapper">
                                <label for="int1">First Multiple: </label>
                                <input type="text" name="int1"></input>
                            </div>

                            <div  class="inputWrapper">
                                <label for="int2">Second Multiple: </label>
                                <input type="text" name="int2"></input>
                            </div> 
                        </div>
                        <br>
                        <input class="btn" type="submit" value="Generate Table"></input>
                    </form>
                </div>

                <div class="prob2Child">
                        <?php
                            function checkInputValidity($input, &$errorMsg) {
                            if (preg_match('/[a-zA-Z]/', $input)){
                                $errorMsg[sizeof($errorMsg)] = "please enter an integer using digit characters";
                                        return 0; 
                            }
                            else {   
                                    if (preg_match('/^\d+$/', $input)){
                                        $input = intval($input);
                                        if($input < 3 ){
                                            $errorMsg[sizeof($errorMsg)] = "minimum allowed value is 3";
                                            return 0;
                                        }
                                        elseif ($input > 12) {
                                            $errorMsg[sizeof($errorMsg)] = "maximum allowed value is 12";
                                            return 0;
                                        }
                                        else {// EVERYTHING PASSED
                                                return TRUE;
                                        }
                                    }
                                    else {  
                                        $errorMsg[sizeof($errorMsg)] = "please enter an integer";
                                        return 0;
                                    }
                                }
                            }

                            $errorMsg = [];
                            $data_is_valid = FALSE;
                            
                            //checking data validity
                            if (isset($_POST['int1']) && isset($_POST['int2'])) {
                                $int1 = $_POST['int1'];
                                $int2 = $_POST['int2'];
                                    
                                if (checkInputValidity($int1, $errorMsg) && checkInputValidity($int2, $errorMsg) ){
                                    $int1 = intval($int1);
                                    $int2 = intval($int2); 
                                    $data_is_valid = TRUE;
                                    //to get horizontal tables;
                                    if ($int1 > $int2){
                                        $t = $int1 ;
                                        $int1 = $int2 ;
                                        $int2 = $t ;
                                    }
                                }
                            } 
                        
                            $headingStyle = "background-color: #889696; color: #E0E2DB;";
                            $itemStyle = "background-color: #D2D4C8; color: #393d3f;";
                            $squareStyle = "background-color: #B8BDB5; color: #393d3f;";

                            if ($data_is_valid) {//displaying table
                                $tableHTML = "";
                                $tableHTML .= "<table border=1 cellpadding=6 cellspacing=0>";
                                //populating table
                                for ($i = 1; $i <= $int1; $i++) {
                                    $tableHTML .= "<tr>"; //adding row
                                    for ($j = 1; $j <= $int2; $j++) {
                                        if ($j == 1 || $i == 1) {
                                        $tableHTML .= "<td style=\"$headingStyle\">";
                                        }
                                        else {
                                            if ($i == $j) {
                                                $tableHTML .= "<td style=\"$squareStyle\">";
                                            }
                                            else {
                                                $tableHTML .= "<td style=\"$itemStyle\">";
                                            }
                                            
                                        }
                                        $tableHTML .= ($i * $j) . "</td>";
                                    }
                                    $tableHTML .= "</tr>";
                                }
                                //adding closing tag and displaying
                                $tableHTML .= "</table>";
                                echo $tableHTML;
                            }
                            else { //displaying errors
                                $errorHTML = "";
                                foreach ($errorMsg as $i => $msg) {
                                    $errorHTML .= "<h4>" . $msg . "</h4>" ;
                                }
                                echo $errorHTML;
                            }
                        ?>
                </div>   
            </section>
            
            <section id="prob3">
                <?php
                    $usersFavImgOption = "";
                    $usersFavImgName = "";
                    if (isset($_POST['favimgInput'])) { 
                        $usersFavImgOption = $_POST['favimgInput'];
                       
                        //getting fav file name
                        switch ($usersFavImgOption) { 
                            case '1':
                                $usersFavImgName = "crab.jfif";
                                break;
                            case '2':
                                $usersFavImgName = "mountain.jfif";
                                break;
                            case '3':
                                $usersFavImgName = "orion.jfif";
                                break;
                            case '4':
                                $usersFavImgName = "pillars.jfif";
                                break;
                            case '5':
                                $usersFavImgName = "squid.jfif";
                                break;                        
                            default: //6
                                $usersFavImgName = "catsEye.jfif";
                                break;
                        } 

                        //saving/updating cookie
                        $expiration = time() + (60*60*48); //48 hours
                        setcookie("FavouriteImage", $usersFavImgName, $expiration);
                    }
                
                ?>
                <div class="prob3Child">
                    <div id="imageChoices">
                            <?php
                                $imgTags = "";
                                $imgNames = ['crab.jfif', 'mountain.jfif', 'orion.jfif', 'pillars.jfif', 'squid.jfif', 'catsEye.jfif'];
                                //need to also create number labels
                                foreach ($imgNames as $i => $name) {
                                    $num = $i + 1;
                                    $imgTags .= "<div class=\"imgChoice\"><img src=\"./assets/p3/$name\" class=\"selectionImage\" ><h2 class=\"imgOptionLabel\">$num</h2></div>";
                                }

                                echo $imgTags;
                            ?>
                    </div> 
                    
                    <form action="https://www2.cs.torontomu.ca/~poparina/lab08/lab08.php" method="POST">
                        <h3>Pick Your Favourite Image</h3>
                        <div>
                            <select name="favimgInput">
                                <option value="1">Image 1</option> 
                                <option value="2">Image 2</option>
                                <option value="3">Image 3</option>
                                <option value="4">Image 4</option>
                                <option value="5">Image 5</option>
                                <option value="6">Image 6</option>
                            </select>
                            <input type="submit" class="btn"/>
                        </div>
                    </form>
                </div>
            </section>
        </section>
    </main>
    <footer>
        
    </footer>
</body>
</html>