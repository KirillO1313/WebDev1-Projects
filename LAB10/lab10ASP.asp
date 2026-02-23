<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab 10: Input</title>

        <%  cityInput = request.QueryString("cityInput")
            countryInput = request.QueryString("countryInput")
            placeName = cityInput & ", " & countryInput
            urlName = request.QueryString("urlInput")
            chosenColor = request.QueryString("colorInput")
        %>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
        
        <style>
          * {   box-sizing: border-box;
                padding: 0%;
                margin: 0%;
                font-family: Georgia, serif;
            }
            
            body {  display: grid;
                    grid-template-rows: 1fr 10fr 1fr;
                    background-color: #F4F7F5;                
                }

                    header {    display: flex;
                                align-items: center;
                                justify-content: center;
                                text-align: center;
                            }
                    
                    h1 {    font-family: 'Playfair Display', serif;
                            font-size: 3rem;
                            background-color: <% response.write(chosenColor) %>;
                            padding: 1rem 2rem;
                    }

                    main {  display: grid;
                            grid-template-columns: 1fr 4fr 1fr;
                        }
                    
                    img {   width: 80vw; }  
        </style>
    </head>
    <body>
        <header>
            <h1><% response.write(placeName) %></h1>
        </header>
        <main>
            <div></div>
            <div style="border: 1vw solid <% response.write(chosenColor) %>;">
                <img src="<% response.write(urlName) %>" alt="<% response.write(placeName) %>">
            </div>
            <div></div>   
        </main>
        <footer></footer>
    </body>
</html>