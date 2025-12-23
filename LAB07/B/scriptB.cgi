#!/usr/bin/perl -T
use warnings;     
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
print "Content-type: text/html\n\n";

#---------VARIABLES---------------
my $safe_characters = "a-zA-Z0-9_.-";

    my $firstName = param('firstName');
    my $lastName = param('lastName');
    my $fullName = "..." ;
    my $nameError = "";

    my $province = param('province');
    my $city = param('city');
        my $cityError = "";
    my $postal = param('postal');
        my $postalError = "";
    my $addres = param('streetAdrs');

    my $tel = param('tel');
        my $telError = "";
    my $email = param('email');
        my $emailError = "";

    my $cardNum = param('cardNum');
        my $cardNumError = "";
    my $cardType = param('cardType');
    my $cardExpiryM = param('cardExpiryM');
    my $cardExpiryY = param('cardExpiryY');
    

#-----------------CLEANING-----------------
    #clean name
        if ( onlyAlpha($firstName) && onlyAlpha($lastName) ) {
            $fullName = $firstName . " " . $lastName ;
        }
        else {
            $nameError = "Name can only contain Alpha characters";
            $fullName = "...";
        }

                 
    #clean addres
        if (not onlyAlpha($city)) {
            $cityError = "City can only contain Alpha characters";
            $city = "";
        }
        
       if (not checkPostal($postal)){
            $postalError = "invalid Postal Code; please use this exact format: L0L 0L0";
            $postal = "";
       } 

    #clean contact info
        $tel =~s/-//g;
        $tel =~s/ //g;
        if (correctLen($tel, 10)){
            if (not onlyNum($tel)){
                $telError = "phone number can only contain digits";
                $tel = "";
            }
        }
        else {
            $telError = "Phone Number must be 10 digits";
            $tel = "";
        }

        if ( not checkEmail($email)) {
            $emailError = "invalid email addres";
            $email = "";
        } 
    

    #clean card info   
        $cardNum =~s/-//g;
        $cardNum =~s/ //g;
        if (not checkCardNum($cardNum)){
            $cardNumError = "invalid card number";
            $cardNum = "";
        }
        else {
            $cardNum = "*" x (length($cardNum) - 4) . substr($cardNum, -4); #censoring info
        }

        my $cardExpiry = $cardExpiryM . "/" . $cardExpiryY;

#----------HELPERS----------------
sub onlyAlpha {
    if ($_[0] =~ /^[a-z]+$/i ) { 
        return 1;
    } 
    else { 
       return undef; 
    }
}
sub onlyNum {
    if ( $_[0] =~ /^([0-9]+)$/ ) { 
        return 1;
    } 
    else { 
       return undef ; 
    }
}
sub correctLen {
    if (length($_[0]) == $_[1]){
        return 1;
    }
    else {
        return undef;
    }
}
sub checkPostal {
    if ($_[0] =~ /^[A-Z]\d[A-Z] \d[A-Z]\d$/) {
        return 1;
    }
    else {
        return undef;
    }
}
sub checkEmail {
    if ($_[0] =~ /^([$safe_characters]+)\@([$safe_characters]+)\.([a-zA-Z]{2,})$/) {
        return 1;
    } 
    else {
        return undef;
    }
}
sub checkCardNum {
    #card numbers are typically 13-19 digits long;
    if ( $_[0] =~ /^\d{13,19}$/) {
        return 1;
    }
    else {
        return undef;
    }
}

#----------INFO DISPLAY-------------------
print <<"HTML";
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab7B</title>

        <style>
            * { box-sizing: border-box;
                margin: 0px;
                padding: 0px;

                color: #2b2d42;
                font-family: "Lexend Exa", sans-serif;
                font-optical-sizing: auto;
                font-weight: 400;
                font-style: normal;
            }

            h1 {font-size: 5rem;}
            h2 {font-size: 3rem;}
            h3 {font-size: 2rem;}
            h4 {font-size: 1rem;}
            h5 {font-size: 1rem;
                color: #9b2226;
            }
            

            body {  display: grid;
                    grid-template-rows: 1fr 3fr 1fr;
                    background-color: #b0c4b1;
            }

            header {    display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
            }

            footer {    display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
            }

            main {  display: grid;
                    grid-template-columns: 1fr 7fr 1fr;
                    
            }

            #info { display: grid;
                    grid-template-columns: 1fr 1fr 1fr;
                    gap: 1vw;
                    padding: 0.5vw;

                    border-radius: 1vw;
                    border: 10px solid #4a5759;
                    box-shadow: 7.5px 5px 3px 2px #839484;
            }

            section div {   display: flex;
                            flex-direction: column;
                            padding: 0.5vw;
                            background-color: #dedbd2; 
                            border-radius: 1vw;
                            border: 3px solid #4a5759;
            }

            button {    padding: 0.5vw;
                        background-color: ;
                        border-radius: 0.5vw;
                        text-align: center;
                        font-size: 1.5rem;
                        font-weight: 600;

                        position:relative;
                        bottom: 2vw;
            }

        </style>
    </head>
    <body>
        <header>
             <h1>See You Soon $fullName !</h1>
             <h5>$nameError</h5>
        </header>
        <main>
            <div></div>
            <section id="info">
                <div id="GuestContact">
                    <h2>Contact Information</h2>
                    <br>
                    <h3 name="email">Email:</h3>
                    <h4>$email</h4>
                        <h5>$emailError</h5>
                    <br>
                    <h3 name="phone">Phone Number:</h3>
                    <h4>$tel</h4>
                        <h5>$telError</h5>
                </div>

                <div id="GuestAddres">
                    <br><br><br>
                    <h2>Addres</h2>
                    <br>
                        <h3 name="streetAd">Street Address:</h3>
                            <h4>$addres</h4>
                        <br>
                        <h3 name="postal">Postal Code:</h3>
                            <h4>$postal</h4>
                                <h5>$postalError</h5>
                </div>   

                <div id="GuestBilling">
                    <h2>Billing Information</h2>
                    <br>
                        <h3 name="type">Card Type:</h3>
                            <h4>$cardType</h4>
                            <br>
                        <h3 name="cardNum">Card Number:</h3>
                            <h4>$cardNum</h4> <!-- BONUS: censor it-->
                            <h5>$cardNumError</h5>
                            <br>
                        <h3 name="expiry">Expiry Date:</h3>
                            <h4>$cardExpiry</h4>
                            <br>
                </div>
            </section> 
            <div></div>     
        </main>
        <footer>
            <a href="../lab07/lab07b.html">
                <button>Go Back</button>
            </a>
        </footer>
    </body>
</html>
HTML
