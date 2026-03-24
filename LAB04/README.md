## Assignment Description

This lab consisted of two problems, both requiring the creation of SVG images.

###### Problem 1: 
Create a curved line separating a first and last name. The first name was required to match the font used in the provided example, while the last name could use any non-default font.

###### Problem 2: 
Create the shapes for playing card suits and fill them with their required colors.

## My Experience

The SVGs were created using the <svg> element and path-based shapes.

For the curved text in Problem 1, I used a custom path created with the Q (quadratic Bézier) command and applied the text to it using <textPath>. The block-style first name was styled using fill: white and stroke: black in an external CSS file, along with negative letter-spacing to create overlapping characters.

For Problem 2, I planned the paths for the heart, tail, and club “clover” shapes on graph paper before refining them in an SVG viewer. The heart and tail paths were reused with the <use> element and transformed through rotation, scaling, and translation to construct the spade symbol.

## File Structure
+ index.html
+ style.css

