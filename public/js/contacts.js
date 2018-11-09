var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = true; // allow partial recognition (faster, less accurate) // new P5.Speech object



function setup(){
myRec.start(); // start engine
}


function contacts(){
// recognition system will often append words into phrases.
// so hack here is to only use the last word:
var mostrecentword = myRec.resultString.split(' ').pop();

if(mostrecentword.indexOf("no")!==-1){
    document.getElementsById("question").focus();
}


}
