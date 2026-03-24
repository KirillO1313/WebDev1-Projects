
//--------------------------------------PROBLEM 1---------------------------------------------------
    window.onload = function() { 
        //creating list item object array
        let siteList = [];  
            siteList[0] = {name: "CPS530 Docs", url: "https://cs.torontomu.ca/~cps530/documents.php"};
            siteList[1] = {name: "HTTP Forever", url: "http://httpforever.com/"};
            siteList[2] = {name: "My Lab 3", url: "https://cs.torontomu.ca/~poparina/lab03/lab03a.html"};
            siteList[3] = {name: "Color Palette", url: "https://coolors.co/palette/ffffff-3b413c-9db5b2-daf0ee-94d1be"};
    
        loadList(siteList); 
    }

    function loadList(siteList) {   //adds all list elements
        let listElem = document.getElementById("siteList");
        //setting css for list
        listElem.style.display = "flex";
        listElem.style.flexDirection = "column";
        listElem.style.gap = "1vw";
        
        for (const item of siteList) { 
            item.connectionType = 0; //adding connectionType property to each objectect
            if (item.url.search("https") > -1 )  item.connectionType = 1;

            listElem.appendChild(createSiteListItem(item)); //adding each sire objects <lil> representation to doc
        }
    }
    function createSiteListItem(item) { //returns an html <li> 
        let siteItem = document.createElement("li");
        
        let IconPath = "/assets/lock.png"; //assigning correct lock icon
        if (item.connectionType <  1) IconPath = "/assets/lock_open.png";
        
        //making the content
        siteItem.innerHTML = `
            <img src= ${IconPath}>
            <p>${item.name}</p>
            <a href=${item.url}>${item.url}</a>`

        //setting css
        siteItem.style.display = "flex";
        siteItem.style.flexDirection = "row";
        siteItem.style.gap = "1vw";
        siteItem.style.alignItems = "flex-start";

        return siteItem;
    }

//---------------------------------------PROBLEM 2-----------------------------------------------
    var itsPalindromeMsg = "Yes, \"#\" is a palindrome";
    var notPalindromeMsg = "No, \"#\" is not a palindrome";
    var emptyFeildMsg = "Please enter a word or phrase";
    var hasNumsMsg = "input may not contains number characters"

    function checkPalindrome(elem) { 
        if (notEmpty(elem.value)) { 
            if (!containsNum(elem.value)){
                //preparing string
                const inputOrig = elem.value;
                let input = elem.value;
                    //console.log("input: ", input);
                input = stripWhitespace(input);
                    //console.log("input after stripWhitespace(): ", input);
                input = stripPunctuation(input);
                    console.log("input after stripPunctuation(): ", input);
                input = input.toLowerCase();
                    // console.log("input after toLowerCase(): ", input);

                //palindrome check and anwser display
                let msg;
                if (isPalindrome(input)) {
                    msg = itsPalindromeMsg.replace("#", inputOrig);
                } else {
                    msg = notPalindromeMsg.replace("#", inputOrig);
                }
                document.getElementById("palindromeResult").innerHTML = msg;
                return true
            }
            else {
                document.getElementById("palindromeResult").innerHTML = hasNumsMsg;
                return false;
            }
        } else {
            document.getElementById("palindromeResult").innerHTML = emptyFeildMsg;
            return false;
        }
    }
    //------------------HELPERS-------------------------
    function notEmpty(str) { //returns bool
        if (str.length > 0) { 
            return true; }
        else { 
            return false;
        }
    }
    function containsNum(str) { //returns bool
        if (str.search(/[0-9]/g) > -1) {return true}
        else {return false}
    }
    function stripWhitespace(str) { //returns string 
        return str.replace(/\s/g,"");
    }
    function stripPunctuation(str) {  //returns string
        return str.replace(/\W/g,"");
    }
    function isPalindrome(str){ //returns bool
        let inputArray = str.split("");
            //console.log("inputArray: ", inputArray);
        let reverseInputArray = [... inputArray].reverse();
            //console.log("reverseInputArray: ", reverseInputArray)
            //console.log("comparison result: ", (reverseInputArray.toString() == inputArray.toString()));
        return (inputArray.toString() == reverseInputArray.toString()) ;
    }

