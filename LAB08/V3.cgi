#!/usr/bin/python3
print("content-type: text/html\n\n")
import cgi, cgitb

form = cgi.FieldStorage()
cityInput = str(form.getvalue('cityInput'))
countryInput = str(form.getvalue('countryInput'))
placeName = cityInput + ', ' + countryInput
urlInput = str(form.getvalue('urlInput'))
colorInput = str(form.getvalue('colorInput'))

# Set text color to white if background is black
if colorInput == '#000000':
    textColor = '#ffffff'
else:
    textColor = '#000000'

print(f'''<html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Lab 10: Python Output</title>
                <style>
                    * {{ box-sizing: border-box;
                        padding: 0%;
                        margin: 0%;
                        font-family: Georgia, serif;
                    }}

                    body {{  display: grid;
                            grid-template-rows: 1fr 10fr 1fr;
                            background-color: 
#F4F7F5;
                    }}

                    header {{    display: flex;
                                align-items: center;
                                justify-content: center;
                                text-align: center;
                                background-color: {colorInput};
                            }}

                    h1 {{    color: {textColor}; }}

                    main {{  display: grid;
                            grid-template-columns: 1fr 4fr 1fr;
                        }}

                    img {{   width: 80vw; }}  
                </style>
            </head>
            <body>
                <header>
                    <h1>{placeName}</h1>
                </header>
                <main>
                    <div></div>
                    <div style="border: 1vw solid {colorInput};">
                        <img src="{urlInput}" alt="{placeName}">      
                    </div>
                    <div></div>            
                </main>
                <footer></footer>
            </body>
        </html>''')




