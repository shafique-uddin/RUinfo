counter = 0;        // COUNTER FOR QUESTION AND OPTION SETTINGS
divSection = 0;     // DIV SECTION FOR REGENERATE DIV CLASS

function add_question(){
    let crtdiv = document.createElement("div");
    crtdiv.setAttribute("class", "question_section");
    document.getElementById("qusandans").appendChild(crtdiv);




    counter++;      // COUNTER FOR QUESTION AND OPTION SETTINGS
    let crtnamefield = document.createElement("input");
    crtnamefield.setAttribute('type', 'text');
    crtnamefield.setAttribute('name', 'question_no_'+counter);
    crtnamefield.setAttribute('required', '');
    crtnamefield.setAttribute('class', 'question_class');
    crtnamefield.setAttribute('size', '100');
    crtnamefield.setAttribute('placeholder', 'question_no_'+counter);
    // document.getElementById('qusandans').appendChild(crtnamefield);
    document.getElementsByClassName('question_section')[divSection].appendChild(crtnamefield);


    for (let index = 1; index <= 4; index++) {
        let crtRadioField = document.createElement("input");
        crtRadioField.setAttribute('type', 'radio');
        crtRadioField.setAttribute('class', 'answerradio');
        crtRadioField.setAttribute('id', 'options_'+index+'_for_question_'+counter);
        crtRadioField.setAttribute('required', '');
        crtRadioField.setAttribute('onclick', 'selectQuestonOptions(this.id)');
        crtRadioField.setAttribute('name', 'answer_for_question_'+counter);
        // document.getElementById('qusandans').appendChild(crtRadioField);
        document.getElementsByClassName('question_section')[divSection].appendChild(crtRadioField);


        let crtOptionField = document.createElement('input');
        crtOptionField.setAttribute('type', 'text');
        crtOptionField.setAttribute('class', 'optionlist');
        crtOptionField.setAttribute('required', '');
        crtOptionField.setAttribute('name', 'options_'+index+'_for_question_'+counter);
        crtOptionField.setAttribute('id', 'answer_'+index+'_for_question_'+counter);
        crtOptionField.setAttribute('size', '70');
        crtOptionField.setAttribute('placeholder', 'options_'+index+'_for_question_'+counter);
        // document.getElementById('qusandans').appendChild(crtOptionField);
        document.getElementsByClassName('question_section')[divSection].appendChild(crtOptionField);
    }

    let crtansrdiv = document.createElement("div");
    crtansrdiv.setAttribute("class","answer");
    crtansrdiv.setAttribute("id","correct_answer_for_question_"+counter);
    crtansrdiv.textContent = 'Answer: ';
    // document.getElementById("qusandans").appendChild(crtansrdiv);
    document.getElementsByClassName('question_section')[divSection].appendChild(crtansrdiv);


    divSection++;     // DIV SECTION FOR REGENERATE DIV CLASS


    // let crtAddOptionField = document.createElement("button");
    // crtAddOptionField.setAttribute('value', 'question_no_'+counter);
    // crtAddOptionField.setAttribute('onclick', 'add_options_btn()');
    // const btnvalue = document.createTextNode("This is a paragraph.");
    // crtAddOptionField.appendChild(btnvalue);
    // document.getElementById('qusandans').appendChild(crtAddOptionField);
}

function selectQuestonOptions(id){
        let splitFrmId = id.split("_");
        let qustionNo = splitFrmId[splitFrmId.length-1];
        let optionNo = splitFrmId[splitFrmId.length-4];

    if(document.getElementById("answer_for_question_no_"+qustionNo)){
        // SELECT CORRECT ANSWER
        let catchAnswer = document.getElementById("answer_"+optionNo+"_for_question_"+qustionNo).value;

        document.getElementById("answer_for_question_no_"+qustionNo).value = catchAnswer;
    } else{

        // SELECT CORRECT ANSWER
        let selectAnswer = document.getElementById("answer_"+optionNo+"_for_question_"+qustionNo).value;
    

        let crtBtnForAns = document.createElement("input");
        crtBtnForAns.setAttribute("type", "button");
        crtBtnForAns.setAttribute("class", "answer_for_question");
        crtBtnForAns.setAttribute("id", "answer_for_question_no_"+qustionNo);
        // crtBtnForAns.setAttribute("name", "answer_for_question_no_"+qustionNo);
        crtBtnForAns.setAttribute("value", selectAnswer);
        document.getElementById("correct_answer_for_question_"+qustionNo).appendChild(crtBtnForAns);


        let crtHdnIpt = document.createElement("input");
        crtHdnIpt.setAttribute("type", "hidden");
        crtHdnIpt.setAttribute("class", "answer_for_question");
        // crtHdnIpt.setAttribute("id", "answer_for_question_no_"+qustionNo);
        crtHdnIpt.setAttribute("name", "answer_for_question_no_"+qustionNo);
        crtHdnIpt.setAttribute("value", selectAnswer);
        document.getElementById("correct_answer_for_question_"+qustionNo).appendChild(crtHdnIpt);
    }    
}


function thisformcheck(){
    if(document.getElementsByClassName("answerradio").length <= 0){
        alert("Please Make Questions and Then Finished.");
        return false;
    }
    else {
        // WHEN SUBMIT THIS FORM, IT WILL CREATE A HIDDEN INPUT FIELD WHERE IT WILL SHOW HOW MANY QUESTION IS CREATE 
        const crtTotalQustionNumber = document.createElement("input");
        crtTotalQustionNumber.setAttribute("type", "hidden");
        crtTotalQustionNumber.setAttribute("name", "totalNumlberOfQueston");
        crtTotalQustionNumber.setAttribute("value", document.getElementsByClassName("question_class").length);
        document.getElementById("qusandans").appendChild(crtTotalQustionNumber);
    }
}


//////////////////////////////////////////////////////////////////////
let inPt = document.getElementById("routineStatus").value;
console.log(inPt);
////////////////////////////////////////////////////////////////////

document.getElementById("routineStatus").setAttribute("value","Off");
counter = 0;

function routineStatusFun(x){
    
    if(Number.isInteger(counter/2)){
        document.getElementById("routineStatus").setAttribute("value","On");
        document.getElementById("examStatusValue").setAttribute("value","On");

    }
    else{
        document.getElementById("routineStatus").setAttribute("value","Off");
        document.getElementById("examStatusValue").setAttribute("value","Off");
    }
    counter++;
}
