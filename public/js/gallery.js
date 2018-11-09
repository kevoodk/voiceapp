var myRec = new p5.SpeechRec('en-US', gallery); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = true; // allow partial recognition (faster, less accurate) // new P5.Speech object



function setup(){
myRec.start(); // start engine
}


function gallery(){
// recognition system will often append words into phrases.
// so hack here is to only use the last word:
var mostrecentword = myRec.resultString.split(' ').pop();

if(mostrecentword.indexOf("next")!==-1){
  document.querySelectorAll("next").click();
}


}
