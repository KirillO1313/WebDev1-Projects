## assignment description 
> ###### Part A
> Creates and populates a MySQL database table with 10 photo records containing descriptions,
> locations, dates, and file paths.

> ###### Part B
> Displays all photos from the database in a 3-column grid layout, sorted by date in descending order.

> ###### Part C
> Displays only photos taken in Ontario locations in a 3-column grid layout, sorted by date
>  in descending order.

> ###### Part D
> Provides interactive filters to search photos by selected location(s) and year, displaying
>  results in a 2-column grid.

> ###### Part E
> Displays all photos in a responsive gallery layout (4 columns on large screens, 3 on medium,
>  2 on small screens).

## implementation notes
#### Part A
Uses mysqli_query() to create table if it doesn't exist, then inserts 10 photo records from predefined
arrays. Includes error reporting for debugging.

#### Part B
Queries all records ordered by date DESC. Uses CSS Grid to display photo cards with image, date, location, 
description, ID, and filename.

#### Part C
Similar to Part B but filters results using `WHERE loc LIKE '%Ontario'` to show only Ontario photos.

#### Part D
Dynamically generates checkboxes for locations and a dropdown for years extracted from database records.
Builds dynamic SQL based on user selections with OR/AND logic.

#### Part E
Simple responsive gallery using CSS Grid media queries. Displays only the image files in a grid that adapts 
from 4 to 3 to 2 columns based on screen size.


## file structure:
+ a.php
+ b.php
+ c.php
+ d.php
+ e.php
+ db_connection.php
