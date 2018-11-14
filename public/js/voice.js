var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = false; // allow partial recognition (faster, less accurate) // new P5.Speech object
var myVoice = new p5.Speech();
let stringArray = [];
var i = 0;
function setup(){
myRec.start();
 // start engine
}
$('defaultCanvas').remove();
var menuArray = ["login", "register", "home", "gallery", "contacts"];
var inputArray = ["name", "email", "password", "access", "submit"];
var commandsArray = ["down", "up", "hide", "show", "next", "previous"];

function parseResult(){
// recognition system will often append words into phrases.
// so hack here is to only use the last word:
var mostrecentword = myRec.resultString.split(' ').pop();
if(myRec.resultValue==true){
stringArray.push(myRec.resultString);
}
var checkInputArray = inputArray.includes(mostrecentword);
var chechMenuArray = menuArray.includes(mostrecentword);
if(chechMenuArray){
window.location.href = mostrecentword;
}
if(checkInputArray){
  let str =  myRec.resultString;
  var mapObj = {
     email:"",
     name:"",
     password:"",
     at:"@",
  };
  str = str.replace(/email|at|name|password/gi, function(matched){
    return mapObj[matched];
  });
  str = str.replace(/\s+/g, '');
  if(mostrecentword.indexOf("name")!==-1){
  document.getElementById("name").value = str;
}else if(mostrecentword.indexOf("email")!==-1){
  document.getElementById("email").value = str;
}else if(mostrecentword.indexOf("password")!==-1){
  document.getElementById("password").value = str;
  document.getElementById("password-confirm").value = str;
}
}
else if(mostrecentword.indexOf("submit")!==-1){
    document.getElementById("register").click();
}else if(mostrecentword.indexOf("access")!==-1){
    document.getElementById("login").click();
}
// Scroll up and down
if(mostrecentword.indexOf("down")!==-1){
window.scrollBy(0, 100);
}
else if(mostrecentword.indexOf("up")!==-1){
window.scrollBy(0, -100);
}
// Show / Hide the entire screen
else if(mostrecentword.indexOf("show")!==-1){
    document.body.style.opacity = "1";
}
else if(mostrecentword.indexOf("disappear")!==-1){
    document.body.style.opacity = "0";

}
// next and previous gallery
else if(mostrecentword.indexOf("next")!==-1){
  $(document).ready(function(){
var numItems = $('.next').length;

$('.next')[i].click();

if(i > numItems){
  i = 0;
}else{
i++;
}

  });
}else if(mostrecentword.indexOf("previous")!==-1){
  $(document).ready(function(){
var numItems = $('.prev').length;

$('.prev')[i].click();

if(i > numItems){
  i = 0;
}else{
i--;
}

  });
}
// Show commands
else if(mostrecentword.indexOf("hello")!==-1){
  var getUserName = document.getElementById("user-name").innerHTML;
  var userToString = getUserName.toString();

      var talk = commandsArray.toString();
      myVoice.speak("hello"+ userToString +" here is the command list I can do for now");
      document.getElementById("robot-voice").innerHTML = talk;
}
// Start writing
if(mostrecentword.indexOf("start")!==-1){
      myVoice.speak("Ok, tell me what you want me to write, say stop when you are done");
     stringArray = [];
}else if(mostrecentword.indexOf("stop" || "Stop")!==-1){
     var convertToString = stringArray.toString();
     var convertToLower = convertToString.toLowerCase();
     if(convertToLower.includes("kevin hello")){
       var edit = "kevin hello";
       var edit1 = "kevin with";
       var result1 = "";
        var text = convertToLower;
        var result = text.match(new RegExp(edit + '\\s(\\w+)'))[1];
        if(text.includes(edit1)){

        result1 = text.match(new RegExp(edit1 + '\\s(\\w+)'))[1];
    }
        var replaceFirst = convertToString.replace("kevin hello", "");
        var replace = convertToString.replace(result, result1);
        console.log(replace);
        document.getElementById("question").innerHTML = replace;
     }else{

    document.getElementById("question").innerHTML = convertToString;
  }
}

}
