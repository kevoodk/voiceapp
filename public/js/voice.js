var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = true; // allow partial recognition (faster, less accurate) // new P5.Speech object
var myVoice = new p5.Speech();

function setup(){
myRec.start();
 // start engine
}
var menuArray = ["login", "register", "home", "gallery", "contacts"];
var inputArray = ["name", "email", "password", "access", "submit"];
var commandsArray = ["down", "up", , "hide", "show"];
function parseResult(){
// recognition system will often append words into phrases.
// so hack here is to only use the last word:
var mostrecentword = myRec.resultString.split(' ').pop();
var chechMenuArray = menuArray.includes(mostrecentword);
if(chechMenuArray){
window.location.href = mostrecentword;
}else if(mostrecentword.indexOf("down")!==-1){
window.scrollBy(0, 100);
}
else if(mostrecentword.indexOf("up")!==-1){
window.scrollBy(0, -100);
}
else if(mostrecentword.indexOf("name")!==-1){
  let str =  myRec.resultString;
  let removeWords = 'name';
  re = new RegExp(removeWords, 'gi');
  str = str.replace(re, '');
  document.getElementById("name").value = str;

}else if(mostrecentword.indexOf("email")!==-1){
  let str =  myRec.resultString;
  var mapObj = {
     email:"",
     at:"@",
  };
  str = str.replace(/email|at/gi, function(matched){
    return mapObj[matched];
  });
  str = str.replace(/\s+/g, '');

  document.getElementById("email").value = str;

}else if(mostrecentword.indexOf("clear")!==-1){
  document.getElementById("email").value = "";
}
else if(mostrecentword.indexOf("password")!==-1){
  let str =  myRec.resultString;
  let removeWords = 'password';
  re = new RegExp(removeWords, 'gi');
  str = str.replace(re, '');
  document.getElementById("password").value = str;
  document.getElementById("password-confirm").value = str;

}else if(mostrecentword.indexOf("submit")!==-1){
    document.getElementById("register").click();
}else if(mostrecentword.indexOf("access")!==-1){
    document.getElementById("login").click();
}else if(mostrecentword.indexOf("hide")!==-1){
    document.body.style.opacity = "0";

}else if(mostrecentword.indexOf("show")!==-1){
    document.body.style.opacity = "1";
}else if(mostrecentword.indexOf("hello")!==-1){
  var getUserName = document.getElementById("user-name").innerHTML;
  var userToString = getUserName.toString();

      var talk = commandsArray.toString();
      myVoice.speak("hello"+ userToString +" here is the command list I can do for now");
      document.getElementById("robot-voice").innerHTML = talk;
}


}
