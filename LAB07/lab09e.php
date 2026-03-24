<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9E</title>    
    <style>
        /*default style: LARGE or smaller*/
        h1 {    font-weight: 250; 
                font-size: 2rem;
                font-family: "Courier New", Courier, monospace;
            }
        
        body {  display: flex;
                flex-direction: column;
                background-color: #B8BDB5;
        }

        main {  display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr;
                gap: 1fr;
            }

        div {   width: 20vw;
                height: auto;
                display: flex;
                justify-content: center;
                margin: 1vw;
                border: 1vw groove #889696;
                align-items: center;
            }

        img {   width: 100%;
                height: 100%;
            }


        /*MEDIUM or smaller style */
        @media (max-width: 960px) {
            h1 {    font-size: 2rem; font-weight: 300;}

            main {  grid-template-columns: 1fr 1fr 1fr; }

            div {   width: 25vw; 
                    border: 2vw groove #889696;
                }
        }

        /*SMALL or smaller style */
        @media (max-width: 480px){
            h1 {    font-weight: 450; }

            main {  grid-template-columns: 1fr 1fr; }

            div {   width: 40vw; }
        }
    </style>  
</head> 
<body><?php require './db_connection.php';
    //getting all table data
    $sql1 = "SELECT * FROM pictures ORDER BY STR_TO_DATE(dat, '%m/%d/%y') DESC ;";
    $result1 =  mysqli_query($connection, $sql1);

    $sql2 = "SELECT COUNT(*) as total FROM pictures";
    $result2 = mysqli_query($connection, $sql2);
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    echo "<header><h1>Total records: {$row2['total']}</h1></header>";


    //displaying all photos
    echo "<main>";
    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
        echo "<div> <img src=\"{$row1['fil']}\"/> </div>";
    }
    echo "</main>";

    mysqli_free_result($result1);
    mysqli_free_result($result2);
    mysqli_close($connection);
?></body>
</html>