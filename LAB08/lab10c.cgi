#!/usr/bin/python
print "content-type: text/html\n\n"
import cgi, cgit

form = cgi.FieldStorage()
cityInput = form.getvalue('cityInput')
countryInput = form.getvalue('countryInput')
placeName = cityInput + ', ' + countryInput
urlInput = form.getvalue('urlInput')
colorInput = form.getvalue('colorInput')

# Set text color to white if background is black
if colorInput == '#000000':
    textColor = '#ffffff'
else:
    textColor = '#000000'

print '''<html>
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
                            background-color: #F4F7F5;
                    }}

                    header {{    display: flex;
                                align-items: center;
                                justify-content: center;
                                text-align: center;
                                background-color: {0};
                            }}

                    h1 {{    color: {1}; }}

                    main {{  display: grid;
                            grid-template-columns: 1fr 4fr 1fr;
                        }}
                    
                    img {{   width: 80vw; }}  
                </style>
            </head>
            <body>
                <header>
                    <h1>{2}</h1>
                </header>
                <main>
                    <div></div>
                    <div style="border: 1vw solid {0};">
                        <img src="{3}" alt="{2}">      
                    </div>
                    <div></div>            
                </main>
                <footer></footer>
            </body>
        </html>'''.format(colorInput, textColor, placeName, urlInput)