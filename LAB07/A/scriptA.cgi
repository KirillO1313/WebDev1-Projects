#!/usr/bin/perl -T
use warnings;     
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";
print qq(
<!DOCTYPE html>
<html>
    <head>
        <title> Lab7A </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
            h1 {
                text-align: center; 
                color: green; 
                font-family: "Courier New", monospace;
                font-size: 2.5em;
                font-weight: bold;
                letter-spacing: 2px;
            }
        </style>        
    </head>
    <body style="display:flex; justify-content:center">
        <h1>This is my first PERL program</h1>
    </body>
</html>);
