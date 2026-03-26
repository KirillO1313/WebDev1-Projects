## assignment description 
> ###### Problem A  
> Explains the time-based greeting system with different messages and styling for each time period

> ###### Problem B 
> Documents the multiplication table generator, including input validation and table styling logic

> ###### Problem C 
> Describes the cookie-based favorite image feature with the 48-hour expiration

## implementation notes
###### Problem A
> Determines current hour using PHP's `date('H')` function
> Displays different greeting messages and background images based on time of day:
> Applies inline styles with appropriate text colors and shadows for each time period

###### Problem B 
> Form collects two integers, i and j (3-12 inclusive), from user input
> `checkInputValidity()` function validates input:
> - Ensures values contain only digits
> - Checks minimum (3) and maximum (12) bounds
> - Returns error messages for invalid inputs
> Generates an HTML multiplication table where:
> - First row and column contain headers (styled differently)
> - Diagonal cells (where i == j) have distinct styling
> - Standard cells display multiplication results
> Displays validation errors if input is invalid

###### Problem C
> Displays 6 selectable images in a 2-column grid layout
> Dropdown form allows user to select favorite image
> Selected image filename is stored in a cookie (`FavouriteImage`) with 48-hour expiration
> Cookie is retrieved on page load and displays the saved favorite image at the top of the page
> If no cookie exists, displays prompt to select a favorite image

## file structure:
+ main.php  
+ style.css
