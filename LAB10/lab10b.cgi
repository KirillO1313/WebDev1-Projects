#!/usr/bin/ruby -w
puts "Content-type: text/html\n\n"
require 'cgi'
cgi = CGI.new("html5")

# Get and cast inputs 
cityName = cgi['cityInput'].to_s
countryName = cgi['countryInput'].to_s
urlName = cgi['urlInput'].to_s
chosenColor = cgi['colorInput'].to_s

# text color changes if black chosen
textColor = "#000000"
if chosenColor == "#000000"
    textColor = "#ffffff"
end

placeName = "#{cityName}, #{countryName}"

#display
cgi.out {
    cgi.html {
        cgi.head {
            <<-HERE1
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Lab 10: Ruby Output</title>
                <style>
                    * { box-sizing: border-box;
                        padding: 0%;
                        margin: 0%;
                        color: #{textColor};
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

                    main {  display: grid;
                            grid-template-columns: 1fr 4fr 1fr;
                        }
                    
                    img {   width: 80vw; }  

                    h1 {    background-color: #{chosenColor};}
                </style>
            HERE1
        } 
        cgi.body {
            <<-HERE2 
                <header>
                    <h1>#{placeName}</h1>
                </header>
                <main>
                    <div></div>
                    <div style="border: 1vw solid #{chosenColor};">
                        <img src="#{urlName}" alt="#{placeName}">
                    </div>
                    <div></div>            
                </main>
                <footer></footer>
            HERE2
        }
    }
}