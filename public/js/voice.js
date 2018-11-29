var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = false; // allow partial recognition (faster, less accurate) // new P5.Speech object
var myVoice = new p5.Speech();
let stringArray = [];
var i = 1;
var readArray = [];
var imageCount = 0;
function setup(){
myRec.start();
 // start engine

}

// console.log(window.location.href.toString());
var menuArray = ["in", "register", "home", "gallery", "contacts", "about" , "game"];
var inputArray = ["name", "email", "password", "access", "submit", "title"];
var commandsArray = ["down", "up", "hide", "show", "next", "previous", "choose"];
getPageWelcome(menuArray);
function parseResult(){
mostrecentstring = myRec.resultString;
$('.robot-text-block').text(mostrecentstring);
// recognition system will often append words into phrases.
// so hack here is to only use the last word:
var mostrecentword = myRec.resultString.split(' ').pop();
if(myRec.resultValue==true){
stringArray.push(myRec.resultString);
}
console.log(mostrecentword);
var checkInputArray = inputArray.includes(mostrecentword);
var chechMenuArray = menuArray.includes(mostrecentword);
if(chechMenuArray){
  if(mostrecentword.indexOf("in")!==-1){
    window.location.href = "login";
  }else{
window.location.href = mostrecentword;
}
}
if(checkInputArray){
  let str =  myRec.resultString;
  var mapObj = {
     email:"",
     name:"",
     title: "",
     password:"",
     at:"@",
  };
  str = str.replace(/email|at|name|title|password/gi, function(matched){
    return mapObj[matched];
  });
  str = str.replace(/\s+/g, '');
  if(mostrecentword.indexOf("name")!==-1){
  document.getElementById("name").value = str;
}else if(mostrecentword.indexOf("title")!==-1){
  document.getElementById("title").value = str;
}else if(mostrecentword.indexOf("email")!==-1){
  document.getElementById("email").value = str;
}else if(mostrecentword.indexOf("password")!==-1){
  document.getElementById("password").value = str;
  document.getElementById("password-confirm").value = str;
}

else if(mostrecentword.indexOf("submit")!==-1){
    document.getElementById("register").click();
}else if(mostrecentword.indexOf("access")!==-1){
    document.getElementById("login").click();
}
}
if(mostrecentword.indexOf("create")!==-1){
window.location.href = "post/create";
}
if(mostrecentword.indexOf("posted")!==-1){
  $('.btn').click();
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
else if(mostrecentword.indexOf("choose")!==-1){
  var x = $('#big-image img').attr('src');
  $('#getsrc').val(x);
  console.log()
}

// next and previous gallery
else if(mostrecentword.indexOf("next")!==-1){
  next();

}
else if(mostrecentword.indexOf("read")!==-1){
var arrOfPtags = document.getElementsByTagName("p");
for (var j = 0;j < arrOfPtags.length; j++){
    readArray.push(arrOfPtags[j].textContent);
}
myVoice.speak(readArray.toString());
}
function next(){
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
if(i >= getClass.length - 1){

  newImage();
}

document.getElementById("big-image").innerHTML = "<img src="+ findSrc +"/>";
}

if(mostrecentword.indexOf("previous")!==-1){
  prev();
}
function prev(){
i--;
  var next = i + 1;
var getClass = $('.images');
var addBorder = $(getClass[i]).addClass("selected");
var removeBorder = $(getClass[next]).removeClass("selected");
var getSrc = $('.find-image');
var findSrc = $(getSrc[i]).attr('src');
console.log(i);

document.getElementById("big-image").innerHTML = "<img src="+ findSrc +"/>"
}
// Show commands
if(mostrecentword.indexOf("hello")!==-1){
  var getUserName = document.getElementById("user-name").innerHTML;
  var userToString = getUserName.toString();

      var talk = commandsArray.toString();
      myVoice.speak("hello"+ userToString +" here is the command list I can do for now");
      document.getElementById("robot-voice").innerHTML = talk;
}
if(mostrecentword.indexOf("search")!==-1){
  search();
}
function search(){
var convertToString = stringArray.toString();
var convertToLower = convertToString.toLowerCase();

      var find = "find";
      var text = convertToLower;
      keyword = text.match(new RegExp(find + '\\s(\\w+)'))[1];
      stringArray = [];
      for(i = 0; i < 10; i++){
      newImage();

    }
    i = 0;

   console.log(keyword);
}

// Start writing
if(mostrecentword.indexOf("start")!==-1){
      myVoice.speak("Ok, tell me what you want me to write, say stop when you are done");
     stringArray = [];
}else if(mostrecentword.indexOf("stop" || "Stop")!==-1){
     var convertToString = stringArray.toString();
     var convertToLower = convertToString.toLowerCase();
     if(convertToLower.includes("bob hello")){
       var line = "new line";
       var find = "bob hello";
       var result = convertToString.replace(new RegExp(find + '\\s(\\w+)'), "$1" + "\n");

     }
     if(convertToLower.includes("bob switch")){
       var find = "bob switch";
       var edit = "bob with";

       var result1 = "";
        var text = convertToLower;
        var result = text.match(new RegExp(find + '\\s(\\w+)'))[1];
        console.log(result);
        if(text.includes(edit)){

        result1 = text.match(new RegExp(edit + '\\s(\\w+)'))[1];
    }

        var replace = convertToString.replace(result, result1);
        var remove = replace.indexOf('stop');
        replace = replace.substring(0, remove)
        console.log(replace);
        document.getElementById("question").innerHTML = replace;

     }else{

    document.getElementById("question").innerHTML = convertToString;
  }  result;
    result1;
}

}
setTimeout(function bigImage(){
  console.log('bigImage search');
  var getSrc = $('.find-image');
  var findSrc = $(getSrc[0]).attr('src');
  document.getElementById("big-image").innerHTML = "<img src="+ findSrc +"/>";
}, 7000);

var keyword = "dog";
var newCount = 0;
   function newImage(){

       $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
       {
           tags: keyword,
           tagmode: "any",
           format: "json"
       },



       function (data) {
           var rnd = Math.floor(Math.random() * data.items.length);

           var image_src = data.items[rnd]['media']['m'].replace("_m", "_b");
           var html1 = "<div class=\" images\"><img class=\"find-image\" style=\"width:100%;\" src=\""+  image_src +"\"></div>";
           document.getElementById("images").innerHTML += html1;



       });

       imageCount ++;


   }
   function getPageWelcome(menuArray){
      var location = window.location.href;
      window.onload = function(){
      var menu = menuArray.toString();
      var commandlist = "Here is my commands for this page </br> Down, Up </br> Hide, Show </br> Read </br>" + menu;

      if(location.includes("home")){
      document.getElementById("robot-test").innerHTML = commandlist;
      myVoice.speak(commandlist);
      }else if(location.includes("about")){
      document.getElementById("robot-test").innerHTML = commandlist;
      }else if(location.includes("gallery")){
        document.getElementById("robot-test").innerHTML = commandlist + "</br> Say:\"Find 'what you are looking for' search \" </br> Say Next or Previous to navigate in the gallery";
      }else if(location.includes("game")){
        document.getElementById("robot-test").innerHTML = commandlist + "</br> Move the snake by saying Up, Down, Left, Right";
      }else if(location.includes("posts")){
        document.getElementById("robot-test").innerHTML = commandlist + "</br> Say create to make a blog";
      }else if(location.includes("contacts")){
        document.getElementById("robot-test").innerHTML = commandlist + "</br> Say your name, followed by \"name\" </br> Say your email followed by \" email.\" Say 'at' for getting @ </br> Say start to start writing, Say stop when you are done";
      }else if(location.includes("userprofile")){
        console.log('profile page')
      }else if(location.includes("profile")){
        console.log('admin page')
      }
}

   }
