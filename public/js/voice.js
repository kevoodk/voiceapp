var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = true; // allow partial recognition (faster, less accurate) // new P5.Speech object



function setup(){
myRec.start(); // start engine
}


function parseResult(){
// recognition system will often append words into phrases.
// so hack here is to only use the last word:
var mostrecentword = myRec.resultString.split(' ').pop();

  document.getElementById("robot-text").value = mostrecentword;
if(mostrecentword.indexOf("login")!==-1){
window.location.href = "login";
}else if(mostrecentword.indexOf("register")!==-1){
window.location.href = "register"
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

}else if(mostrecentword.indexOf("password")!==-1){
  let str =  myRec.resultString;
  let removeWords = 'password';
  re = new RegExp(removeWords, 'gi');
  str = str.replace(re, '');
  document.getElementById("password").value = str;
  document.getElementById("password-confirm").value = str;

}else if(mostrecentword.indexOf("hello")!==-1){
    document.getElementById("register").click();
}else if(mostrecentword.indexOf("access")!==-1){
    document.getElementById("login").click();
}


}
