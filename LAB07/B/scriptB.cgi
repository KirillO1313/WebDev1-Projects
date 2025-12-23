#!/usr/bin/perl -T
use warnings;     
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
print "Content-type: text/html\n\n";

#---------VARIABLES---------------
my $firtName = param(`firstName`);
my $lastNam = param(`lastName`);

my $province = param(`province`);
my $city = param(`city`);
my $postal = param(`postal`);
my $Addres = param(`streetAdrs`);

my $tel = param(`tel`);
my $email = param(`email`);

my $cardNum = param(`cardNum`);
my $cardType = param(`cardType`);
my $cardExpiry = param(`cardExpiry`);

    #------BONUS-------
    my $startDate = param(`startDate`);
    my $endDate = param(`endDate`);
    my $guestNum = param(`guestNum`);


#------UNTAINTING/CLEANING--------------
    #clean name
    $firstName = onlyAlpha($firstName);
    $lastName = onlyAlpha($lastName);
    #OR????
    # my $firstName = onlyAlpha(param(`firstName`));

   
    #clean addres
    $city = onlyAlpha($city);

    #clean contact info


    #clean card info



#----------HELPERS----------------



sub onlyAlpha {
    my $str = $_[0];
    if ( $str =~ /^([a-z]+)$/i ) { 
        $str = $1; 
    } 
    else { 
        $str = "Name can only contain alpha characters"; 
    }
    return $str;
}




sub cleanPostCode { 
    
}

sub cleanAdrs {}

sub cleanCity {}

sub cleanTelNum { }

sub cleanEmail { }


    #----BONUS---------
    sub getStayLenght {    }

    sub getStayCost {    }


#----------INFO DISPLAY-------------------
print <<"HTML";


HTML