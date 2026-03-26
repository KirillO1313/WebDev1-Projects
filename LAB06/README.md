## assignment description 


## implementation notes

**Problem 1 - Time-based Greeting:**
- Determines current hour using PHP's `date('H')` function
- Displays different greeting messages and background images based on time of day:
  - Night (23:00-04:59): "Good Night!" with night image
  - Morning (05:00-11:59): "Good Morning!" with morning image
  - Afternoon (12:00-17:59): "Good Afternoon!" with day image
  - Evening (18:00-22:59): "Good Evening!" with evening image
- Applies inline styles with appropriate text colors and shadows for each time period

**Problem 2 - Multiplication Table Generator:**
- Form collects two integers (3-12 inclusive) from user input
- `checkInputValidity()` function validates input:
  - Ensures values contain only digits
  - Checks minimum (3) and maximum (12) bounds
  - Returns error messages for invalid inputs
- Generates an HTML multiplication table where:
  - First row and column contain headers (styled differently)
  - Diagonal cells (where i == j) have distinct styling
  - Standard cells display multiplication results
- Displays validation errors if input is invalid

**Problem 3 - Image Favorite with Cookies:**
- Displays 6 selectable images in a 2-column grid layout
- Dropdown form allows user to select favorite image
- Selected image filename is stored in a cookie (`FavouriteImage`) with 48-hour expiration
- Cookie is retrieved on page load and displays the saved favorite image at the top of the page
- If no cookie exists, displays prompt to select a favorite image

## file structure:
+ main.php  
+ style.css