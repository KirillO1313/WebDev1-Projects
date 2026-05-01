## assignment description 
> ###### Part A (ASP)
> Creates a postcard builder that takes user input (city name, country name, image URL, and text/border color) and displays a dynamically styled postcard using Classic ASP. The postcard features the location name as a header, a bordered image, and responsive styling.

> ###### Part B (Ruby CGI)
> Replicates Part A functionality using Ruby and CGI. Takes the same user inputs and generates a dynamic HTML postcard. Includes intelligent text color selection—if black is chosen for the border, the text automatically becomes white for better contrast.

> ###### Part C (Python 2)
> Implements Part A functionality using Python 2 CGI. Processes form data and generates styled postcards. Includes logic to set text color based on the chosen border color for optimal readability.

> ###### Part D (Python 3)
> Python 3 version of the postcard builder using modern Python syntax (f-strings) and CGI. Provides the same postcard generation functionality as Parts A-C with updated language features.

## implementation notes
#### Part A (ASP)
Uses Classic ASP with `request.QueryString()` to retrieve form parameters. Dynamically embeds city and country names, image URL, and chosen color into the HTML response using `response.write()`. Includes Google Fonts integration (Playfair Display) for elegant styling. Grid-based layout with the postcard centered on the page.

#### Part B (Ruby)
Leverages Ruby's CGI library with `CGI.new()` to parse form data. Implements conditional logic to change text color to white when black background is selected. Uses heredoc syntax (HERE1, HERE2) for multi-line HTML generation. Applies string interpolation (`#{}`) for dynamic content insertion.

#### Part C (Python 2)
Uses Python 2's `cgi.FieldStorage()` to retrieve form values. Implements color contrast logic for readability. Uses `.format()` method for string interpolation in the HTML template. Triple-quoted strings for multi-line HTML output.

#### Part D (Python 3)
Modernized version using Python 3 with f-strings for cleaner string interpolation. Uses `str()` for explicit type casting of form values. Otherwise identical functionality to Part C with contemporary Python syntax.

## file structure:
+ index.html (input form for all implementations)
+ lab8ASP.asp (Classic ASP implementation)
+ lab8b.cgi (Ruby CGI implementation)
+ lab8c.cgi (Python 2 implementation)
+ lab8cV3.cgi (Python 3 implementation)