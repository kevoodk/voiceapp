var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = false; // allow partial recognition (faster, less accurate) // new P5.Speech object
var myVoice = new p5.Speech();
let stringArray = [];
var i = 1;
var readArray = [];
var imageCount = 0;
var keyword = "dog";
var newCount = 0;
var commandlist;
function setup() {
    myRec.start();
    // start engine

}

// console.log(window.location.href.toString());
var menuArray = ["in", "register", "home", "gallery", "contacts", "about", "game", "blog"];
var inputArray = ["name", "email", "password", "access", "submit", "title", "out"];
var commandsArray = ["down", "up", "hide", "show", "next", "previous", "choose"];
getPageWelcome(menuArray);

function parseResult() {
    mostrecentstring = myRec.resultString;
    $('.robot-text-block').text(mostrecentstring);
    // recognition system will often append words into phrases.
    // so hack here is to only use the last word:
    var mostrecentword = myRec.resultString.split(' ').pop();
    if (myRec.resultValue == true) {
        stringArray.push(myRec.resultString);
    }
    console.log(mostrecentword);
    var checkInputArray = inputArray.includes(mostrecentword);
    var chechMenuArray = menuArray.includes(mostrecentword);
    if (chechMenuArray) {
        if (mostrecentword.indexOf("in") !== -1) {
            window.location.href = "login";
        } else if (mostrecentword.indexOf("blog") !== -1) {
            window.location.href = "posts";
        } else {
            window.location.href = mostrecentword;
        }
    }
    if (checkInputArray) {
        let str = myRec.resultString;
        var mapObj = {
            email: "",
            name: "",
            title: "",
            password: "",
            at: "@",
        };
        str = str.replace(/email|at|name|title|password/gi, function(matched) {
            return mapObj[matched];
        });
        str = str.replace(/\s+/g, '');
        if (mostrecentword.indexOf("name") !== -1) {
            document.getElementById("name").value = str;
        } else if (mostrecentword.indexOf("title") !== -1) {
            document.getElementById("title").value = str;
        } else if (mostrecentword.indexOf("email") !== -1) {
            document.getElementById("email").value = str;
        } else if (mostrecentword.indexOf("password") !== -1) {
            document.getElementById("password").value = str;
            document.getElementById("password-confirm").value = str;
        } else if (mostrecentword.indexOf("submit") !== -1) {
            document.getElementById("register").click();
        } else if (mostrecentword.indexOf("access") !== -1) {
            document.getElementById("login").click();
        } else if(mostrecentword.indexOf("out") !== -1) {
          document.getElementById("logout").click();
        }
    }
    if (mostrecentword.indexOf("create") !== -1) {
        window.location.href = "post/create";
    }
    if (mostrecentword.indexOf("posted") !== -1) {
        $('.btn').click();
    }

    // Scroll up and down
    if (mostrecentword.indexOf("down") !== -1) {
        window.scrollBy(0, 500);
    } else if (mostrecentword.indexOf("up") !== -1) {
        window.scrollBy(0, -500);
    }
    // Show / Hide the entire screen
    else if (mostrecentword.indexOf("show") !== -1) {
        document.body.style.opacity = "1";
    } else if (mostrecentword.indexOf("disappear") !== -1) {
        document.body.style.opacity = "0";

    } else if (mostrecentword.indexOf("choose") !== -1) {
        var x = $('#big-image img').attr('src');
        $('#getsrc').val(x);
        console.log()
    } else if(mostrecentword.indexOf("command") !==-1){
      myVoice.speak(commandlist);
    }

    // next and previous gallery
    else if (mostrecentword.indexOf("next") !== -1) {
        next();

    } else if (mostrecentword.indexOf("read") !== -1) {
        var arrOfPtags = document.getElementsByTagName("p");
        for (var j = 0; j < arrOfPtags.length; j++) {
            readArray.push(arrOfPtags[j].textContent);
        }
        myVoice.speak(readArray.toString());
    }

    function next() {
        i++;
        console.log(i);
        var prev = i - 1;
        var getClass = $('.images');
        var addBorder = $(getClass[i]).addClass("selected");
        var removeBorder = $(getClass[prev]).removeClass("selected");
        var getSrc = $('.find-image');
        var findSrc = $(getSrc[i]).attr('src');
        console.log(i);
        console.log(getClass.length);
        if (i >= getClass.length - 1) {

            newImage();
        }

        document.getElementById("big-image").innerHTML = "<img src=" + findSrc + "/>";
    }

    if (mostrecentword.indexOf("previous") !== -1) {
        prev();
    }

    function prev() {
        i--;
        var next = i + 1;
        var getClass = $('.images');
        var addBorder = $(getClass[i]).addClass("selected");
        var removeBorder = $(getClass[next]).removeClass("selected");
        var getSrc = $('.find-image');
        var findSrc = $(getSrc[i]).attr('src');
        console.log(i);

        document.getElementById("big-image").innerHTML = "<img src=" + findSrc + "/>"
    }
    // Show commands
    if (mostrecentword.indexOf("hello") !== -1) {
        var getUserName = document.getElementById("user-name").innerHTML;
        var userToString = getUserName.toString();

        var talk = commandsArray.toString();
        myVoice.speak("hello" + userToString + " here is the command list I can do for now");
        document.getElementById("robot-voice").innerHTML = talk;
    }
    if (mostrecentword.indexOf("post") !== -1) {
        blog();
    }

    function blog() {
        var convertToString = stringArray.toString();
        var convertToLower = convertToString.toLowerCase();

        var find = "open";
        var text = convertToLower;
        keyword = text.match(new RegExp(find + '\\s(\\w+)'))[1];
        stringArray = [keyword];
        $('.btn')[stringArray.toString() - 1].click()



        console.log(stringArray.toString());
    }
    if (mostrecentword.indexOf("search") !== -1) {
        search();
    }

    function search() {
        var convertToString = stringArray.toString();
        var convertToLower = convertToString.toLowerCase();

        var find = "find";
        var text = convertToLower;
        keyword = text.match(new RegExp(find + '\\s(\\w+)'))[1];
        stringArray = [];
        for (i = 0; i < 10; i++) {
            newImage();

        }
        i = 0;

        console.log(keyword);
    }

    // Start writing
    if (mostrecentword.indexOf("start") !== -1) {
        myVoice.speak("Ok, tell me what you want me to write, say stop when you are done");
        stringArray = [];
    } else if (mostrecentword.indexOf("stop" || "Stop") !== -1) {
        var convertToString = stringArray.toString();
        var convertToLower = convertToString.toLowerCase();
        convertToLower = convertToLower.replace(/stop/g, '');
        document.getElementById("question").innerHTML = convertToLower;
        // if (convertToLower.includes("bob hello")) {
        //     var line = "new line";
        //     var find = "bob hello";
        //     var result = convertToString.replace(new RegExp(find + '\\s(\\w+)'), "$1" + "\n");
        //
        // }
        // if (convertToLower.includes("bob switch")) {
        //     var find = "bob switch";
        //     var edit = "bob with";
        //
        //     var result1 = "";
        //     var text = convertToLower;
        //     var result = text.match(new RegExp(find + '\\s(\\w+)'))[1];
        //     console.log(result);
        //     if (text.includes(edit)) {
        //
        //         result1 = text.match(new RegExp(edit + '\\s(\\w+)'))[1];
        //     }
        //
        //     var replace = convertToString.replace(result, result1);
        //     var remove = replace.indexOf('stop');
        //     replace = replace.substring('stop', '');
        //     console.log(replace);
        //     document.getElementById("question").innerHTML = replace;
        //
        // } else {
        //     convertToString.replace('stop', '');
        //     document.getElementById("question").innerHTML = convertToString;
        // }
        // result;
        // result1;
    }

}

function bigImage() {
    console.log('bigImage search');
    var getSrc = $('.find-image');
    var findSrc = $(getSrc[0]).attr('src');
    document.getElementById("big-image").innerHTML = "<img src=" + findSrc + "/>";
}



function newImage() {
    $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?", {
            tags: keyword,
            tagmode: "any",
            format: "json"
        },
        function(data) {
            var rnd = Math.floor(Math.random() * data.items.length);
            var image_src = data.items[rnd]['media']['m'].replace("_m", "_b");
            var html1 = "<div class=\" images\"><img class=\"find-image\" style=\"width:100%;\" src=\"" + image_src + "\"></div>";
            document.getElementById("images").innerHTML += html1;
        });
    imageCount++;
    setTimeout(bigImage, 2000);
}

function getPageWelcome(menuArray) {
    var location = window.location.href;
    window.onload = function() {
        var menu = menuArray.toString();
        commandlist = "<span style=\"font-weight:700;\">Here is my commands for this page :</span></br></br> <span style=\"font-weight:700; color:#fff;\">Down, Up</span> - Scroll the page. </br> <span style=\"font-weight:700; color:#fff;\">Hide, Show</span> - Hide or show the content of the page. </br> <span style=\"font-weight:700; color:#fff;\">Read</span> - Read the content of the page. </br> <span style=\"font-weight:700; color:#fff;\">Navigate in the menu by saying the page names.</span>";

        if (location.includes("home")) {

        } else if (location.includes("about")) {

        } else if (location.includes("gallery")) {
            commandlist = commandlist + "</br>To search the picture - Say: <span style=\"font-weight:700; color:#fff;\">Find</span> - \"the <span style=\"font-weight:700; color:#fff;\">object</span> what you are looking for</span>\" - <span style=\"font-weight:700; color:#fff;\">search.</span> </br> Say <span style=\"font-weight:700; color:#fff;\">Next</span> or <span style=\"font-weight:700; color:#fff;\">Previous</span> to navigate in the gallery.";

        } else if (location.includes("game")) {
            commandlist = commandlist + "</br> Move the snake by saying <span style=\"font-weight:700; color:#fff;\">Up</span>, <span style=\"font-weight:700; color:#fff;\">Down</span>, <span style=\"font-weight:700; color:#fff;\">Left</span>, <span style=\"font-weight:700; color:#fff;\">Right</span>";
        } else if (location.includes("posts")) {
          commandlist = commandlist + "</br> Say <span style=\"font-weight:700; color:#fff;\">create</span> to make a blog. </br> say <span style=\"font-weight:700; color:#fff;\">open</span>, and the <span style=\"font-weight:700; color:#fff;\">number</span> post you want to open, and end with <span style=\"font-weight:700; color:#fff;\">post</span>";
        } else if (location.includes("contacts")) {
            commandlist = commandlist + "</br> Say your name, followed by <span style=\"font-weight:700; color:#fff;\">\"name\"</span> </br> Say your email followed by <span style=\"font-weight:700; color:#fff;\">\" email.\"</span> Say <span style=\"font-weight:700; color:#fff;\">'at'</span> for getting <span style=\"font-weight:700; color:#fff;\">@</span> </br> Say <span style=\"font-weight:700; color:#fff;\">start</span> to start writing, Say <span style=\"font-weight:700; color:#fff;\">stop</span> when you are done.";
        } else if (location.includes("userprofile")) {
            console.log('profile page')
        } else if (location.includes("profile")) {
            console.log('admin page')
        }
        else if (location.includes("register")) {
           commandlist = commandlist + "<span style=\"font-weight:700; color:#fff;\">'Your name' + name </span> - To write your name </br> <span style=\"font-weight:700; color:#fff;\">'Your email' + name (Say 'AT' for @)</span> - To write your email </br> <span style=\"font-weight:700; color:#fff;\">'Say your password' + name </span> To write your password </br> <span style=\"font-weight:700; color:#fff;\">Say submit</span> - To register";
       }
        document.getElementById("robot-test").innerHTML = commandlist;
    }

}
