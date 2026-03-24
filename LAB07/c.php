<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9C</title>    
     <style>
        * { box-sizing: border-box;
            padding: 0%;
            margin: 0%;
            font-family: "Courier New", Courier, monospace        
        }

        h1{font-weight: 400; font-size: 4rem;}
        h2{font-weight: 250; font-size: 0.75rem;}

        body {  display: grid;
                grid-template-rows: 2fr 10fr;
                background-color: #5F7470;
            }

        header {text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #889696;
        }

        main {  display: grid;
                grid-template-columns: 1fr 7fr 1fr;
        }
        
            #content {  background-color: #B8BDB5;
                        padding: 1vw;
                        border: 1vw groove #7c8a8aff;
                        display: grid;
                        grid-template-columns: 1fr 1fr 1fr;
                        gap: 1vw;

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
                                justify-content: flex-start;
                                gap: 5px;
                                padding-top: 0.75vw;
                                line-height: 0.75rem;
                    }
    </style> 
</head> 

<body>
    <header><h1>Part C: Ontario Photos</h1></header>
    <main>
        <div></div>
        <div id="content"><?php
         require './db_connection.php';

            //getting table data
            $sql = "SELECT * FROM pictures WHERE loc LIKE '%Ontario' ORDER BY STR_TO_DATE(dat, '%m/%d/%y') DESC ;";
            $result =  mysqli_query($connection, $sql);

            while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
                //removing file path for display
                $fnArray = explode("/", $row['fil']);
                $fn = $fnArray[2];
                    echo "<section class=\"photoCard\">
                        <div class=\"picContainer\">
                            <img src=\"{$row['fil']}\"/>
                        </div>
                        <div class=\"picInfo\">
                            <h2>{$row['dat']}</h2>
                            <h2>{$row['loc']}</h2>
                            <br>
                            <h2>{$row['txt']}</h2>
                            <br>
                            <h2>Photo ID: {$row['pic_id']}</h2>
                            <h2>File Name: {$fn}</h2>
                        </div>
                    </section>";
            }
            mysqli_close($connection);
        ?></div>
        <div></div>
    </main>
    <footer></footer>
</body>
</html>