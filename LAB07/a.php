<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9A</title>    
</head>

<body>
    <header><h1 style="text-align: center">Part A</h1></header>
    <main>
        <div>
        <?php 
            //debuging 
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            require './db_connection.php';
            // Create table if it doesn't exist
            $sql = "CREATE TABLE IF NOT EXISTS pictures (
                pic_id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
                txt VARCHAR(200) NOT NULL,
                loc VARCHAR(100) NOT NULL,
                dat VARCHAR(8) NOT NULL,
                fil VARCHAR(200) NOT NULL UNIQUE
            );";
            $create = mysqli_query($connection, $sql);

            //picture data arrays
            $descriptions = ["apartment windows, a view from a campus building", "a mansion on a shore", "skulls of the Catacombs", "Jellyfish at Oceanographic", "my best carved pumpkin thus far",
            "a pond in my parents home town", "cool tree remains at a park near my old boarding school", "a statue at Les Jardins d\'Etretat", "a pond along a hiking trail", "a waterfall"];
            $locations = ["Toronto, Ontario", "Quiberon, France", "Paris, France", "Valencia, France", "Toronto, Ontario",
            "Chaykovsky, Russia", "Bromsgrove, England", "Etretat, France", "Leysin, Switzerland", "Mission, British Columbia"];
            $dates = ["09/25/24", "07/18/25", "07/06/25", "08/02/24", "10/28/24", 
            "07/28/21", "06/03/21", "07/10/25", "08/21/24", "12/28/24"];
            $fileNames = ["building", "castle", "catacombs", "jellyfish", "pumpkin", 
            "rusLake", "skullTree", "statue", "swissLake", "waterfall"];
                $filePath = "./assets/";
                $fileExt = ".jpg";

            //populating table if not already full
            $sql = "SELECT COUNT(*) as total FROM pictures";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo "Total records: " . $row['total'];

            if ($row['total'] >= 10) {
                echo "<h2 style=\"color: #c1121f\">Table is already populated</h2><br>"; 
            }
            else {  for ($i=0; $i < sizeof($fileNames) ; $i++) { 
                        $fullFilePath = $filePath . $fileNames[$i] . $fileExt ;
                        $desc = $descriptions[$i];
                        $locat = $locations[$i];
                        $date = $dates[$i];
                        $sql = "INSERT INTO pictures(txt, loc, dat, fil) VALUES ('$desc', '$locat', '$date', '$fullFilePath');";
                        if (mysqli_query($connection, $sql)){
                            echo "<h2 style=\"color: #606c38\">inserted $fileNames[$i] </h2><br>";
                        }
                        else { //for debug
                            $e = mysqli_error($connection);
                            echo "<h2 style=\"color: #c1121f\">failed to insert $fileNames[$i]; $e</h2><br>"; 
                        } 
                    }
            }
            mysqli_close($connection);
        ?>
        </div>
    </main>
    <footer></footer>
</body>
</html>