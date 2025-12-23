## assignment description 
> ###### Part A
> problem was  to make a simple perl script that displays "this is my first perl script" at the
> top/middle of the screen in not default font and color

> ###### Part B
> problem was to make a mock booking page, taking in a user's name,  payment details, address,
> and contact information, processs it with a perl script,  then display info back to the user,
> if some info was invalid, provide feedback and an option to go back and fix

> ###### Part C
> problem was to make a form that takes in an image file and text, process it with a perl script,
> and display sthe uploaded image with the entered text in a fun font on top of the image

## implementation notes
#### Part A
used ```qq()``` to print out HTML content, styled with ```<style>``` tag in ```<head>```
#### Part B
created form with ```<select>``` and text type inputs. form is processed with perl script, 
the form's action attribute points to the cgi script. the script 
#### Part C


## file structure:
> ###### folder A
> + scriptA.cgi

> ###### folder B
> + indexB.html : user input page
> + infoDisplayB.html : draft for the content display; printed in script
> + scriptB.cgi : processes the info entered by user

> ###### folder C
> + indexC.html : user input page
> + infoDisplayC.html : after input is proccesed, displays here
> + styleC.css : stylesheet for part C
