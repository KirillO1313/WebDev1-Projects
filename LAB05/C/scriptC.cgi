#!/usr/bin/perl -wT 
use CGI 'standard'; 
use CGI::Carp qw(warningsToBrowser fatalsToBrowser); 
use File::Basename; 

$CGI::POST_MAX = 1024 * 5000; 
my $query = new CGI; 

my $filename = $query->param('UserFileInput');
my $text = $query->param('UserTextInput') ;
my $safe_characters = "a-zA-Z0-9_.-";

if (not $filename) { 
    print $query->header ( ); 
    print "There was a problem uploading your photo (try a smaller file)."; 
    exit; 
}

#------------cleaning filename----------------
my ( $name, $path, $extension ) = fileparse ( $filename, '\..*' ); 
$filename = $name.$extension;
$filename =~ tr/ /_/; 
$filename =~ s/[^$safe_characters]//g;

if ( $filename =~ /^([$safe_characters]+)$/ ) { 
    $filename = $1; 
} 
else { 
    die "Filename contains invalid characters"; 
}

#------------uploading file------------------
my $upload_filehandle = $query->upload("UserFileInput");
open (UPLOADFILE, ">../uploads/$filename") or die "$!"; 
    binmode UPLOADFILE; 
    binmode $upload_filehandle;
    while (<$upload_filehandle>) { 
        print UPLOADFILE; 
    } 
close UPLOADFILE;

print $query->header();
print <<HTML;
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Honk&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {  display: grid;
                    grid-template-rows: 1fr 7fr 1fr;
                    align-items: center;
                    justify-content: center;
                    gap: 1vw;
            }

            section {   position: relative;
                        text-align: center;
                        width: 50vw;
            }

            h1 {position: absolute;
                bottom: 50%;
                left: 50%;
                transform: translate(-50%, -50%);

                /* width: 75%;   
                word-wrap: break-word;*/ 
                overflow-wrap: break-word;  
                text-align: center;

                font-size: 5rem;
                font-family: "Honk", system-ui;
                font-optical-sizing: auto;
                font-weight: 400;
                font-style: normal;
                font-variation-settings:
                    "MORF" 15,
                    "SHLN" 50;
            }
        </style>
    </head>
    <body>
        <div></div>
        <section>
            <img src="/uploads/$filename" alt="your Image and text" width="100%" height="100%"/>
            <h1>$text</h1>
        </section>
        <div></div>
    </body>
</html>
HTML
