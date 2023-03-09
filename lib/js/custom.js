counter = 0;

function add_question(){
    counter++;
    let crtnamefield = document.createElement("input");
    crtnamefield.setAttribute('type', 'text');
    crtnamefield.setAttribute('name', 'question_no_'+counter);
    crtnamefield.setAttribute('required', '');
    crtnamefield.setAttribute('class', 'question_class');
    crtnamefield.setAttribute('size', '100');
    crtnamefield.setAttribute('placeholder', 'question_no_'+counter);
    document.getElementById('qusandans').appendChild(crtnamefield);


    for (let index = 1; index <= 4; index++) {
        let crtRadioField = document.createElement("input");
        crtRadioField.setAttribute('type', 'radio');
        crtRadioField.setAttribute('class', 'answerradio');
        crtRadioField.setAttribute('id', 'options_'+index+'_for_question_'+counter);
        crtRadioField.setAttribute('onclick', 'selectQuestonOptions(this.id)');
        crtRadioField.setAttribute('name', 'answer_for_question_'+counter);
        document.getElementById('qusandans').appendChild(crtRadioField);


        let crtOptionField = document.createElement('input');
        crtOptionField.setAttribute('type', 'text');
        crtOptionField.setAttribute('class', 'optionlist');
        crtOptionField.setAttribute('required', '');
        crtOptionField.setAttribute('name', 'options_'+index+'_for_question_'+counter);
        crtOptionField.setAttribute('id', 'answer_'+index+'_for_question_'+counter);
        crtOptionField.setAttribute('size', '70');
        crtOptionField.setAttribute('placeholder', 'options_'+index+'_for_question_'+counter);
        document.getElementById('qusandans').appendChild(crtOptionField);
    }

    let crtansrdiv = document.createElement("div");
    crtansrdiv.setAttribute("class","answer");
    crtansrdiv.setAttribute("id","correct_answer_for_question_"+counter);
    crtansrdiv.textContent = 'Answer: ';
    document.getElementById("qusandans").appendChild(crtansrdiv);


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

    // SELECT CORRECT ANSWER
    let selectAnswer = document.getElementById("answer_"+optionNo+"_for_question_"+qustionNo).value;
  
    // let putCrtAns = document.getElementById("correct_answer_for_question_"+qustionNo);

    let crtHdnIpt = document.createElement("input");
    crtHdnIpt.setAttribute("type", "button");
    crtHdnIpt.setAttribute("class", "answer_for_question");
    crtHdnIpt.setAttribute("name", "answer_for_question_no_"+qustionNo);
    crtHdnIpt.setAttribute("value", selectAnswer);
    document.getElementById("correct_answer_for_question_"+qustionNo).appendChild(crtHdnIpt);
}


function thisformcheck(){
// function checkingId(){
    // // WHEN SUBMIT THIS FORM, IT WILL CREATE A HIDDEN INPUT FIELD WHERE IT WILL SHOW HOW MANY QUESTION IS CREATE 
    // const crtTotalQustionNumber = document.createElement("input");
    // crtTotalQustionNumber.setAttribute("type", "hidden");
    // crtTotalQustionNumber.setAttribute("name", "totalNumlberOfQueston");
    // crtTotalQustionNumber.setAttribute("value", document.getElementsByClassName("question_class").length);
    // document.getElementById("qusandans").appendChild(crtTotalQustionNumber);



    

    /////////////////////////////////////////////////////////////////////////////////////////////
    

    // // CHECK ANY QUESTION FIELD IS EMPTY
    // let totalQuestonNo = document.getElementsByClassName("question_class").length;    
    // for (let index = 0; index <= totalQuestonNo; index++) {
    //     let inputValue = document.getElementsByClassName("question_class")[index].value;
    //     let removeWhiteSpaceFromValue = inputValue.trim();

    //     if(removeWhiteSpaceFromValue.length == 0){
    //         document.getElementsByClassName("question_class")[index].style.border = '2px solid red';
    //         return false;
    //     }
    // }

    // let totalOptionNo = document.getElementsByClassName("optionlist").length;    
    // for (let indexForOption = 0; indexForOption <= totalOptionNo; indexForOption++) {
    //     let inputValue = document.getElementsByClassName("optionlist")[indexForOption].value;
    //     let removeWhiteSpaceFromValue = inputValue.trim();

    //     if(removeWhiteSpaceFromValue.length == 0){
    //         document.getElementsByClassName("optionlist")[indexForOption].style.border = '2px solid red';
    //         return false;
    //     }
    // }



    


    // optionlist
    // document.getElementsByClassName("optionlist")
    // let totalOptionNo = document.getElementsByClassName("optionlist").length;    
    // for (let index = 0; index <= totalOptionNo; index++) {
    //     let inputValue = document.getElementsByClassName("optionlist")[index].value;
    //     let removeWhiteSpaceFromValue = inputValue.trim();

    //     if(removeWhiteSpaceFromValue.length == 0){
    //         document.getElementsByClassName("optionlist")[index].style.border = '2px solid red';
    //         return false;
    //     }
    //     // else{
        //     alert("not emtpy");
        // }
    // }






    // CHECK ANSWER OF ANY QUESTION IS EMPTY
    let totalNumberOfAnswerField = document.getElementsByClassName("answer_for_question").length;
    console.log(totalNumberOfAnswerField);
    if(totalNumberOfAnswerField){
        alert(totalNumberOfAnswerField);
    }
    else{
        alert("Please create option and select correct answer.");
        return false;
    }



        // console.log(document.getElementsByClassName("question_class")[index].value);

    ///////////////////////////////////////////////////////////////////////////////////////////////////
    

    
}


// CHECK ANY FIELD IS EMPTY OR NOT
// const addQuestionBtn = document.getElementById("add-question");

// function checkHasAnyField(){
//     const inputQuestionField = document.getElementById("ddd")
//     for (let index = 0; index < array.length; index++) {
//         const element = array[index];
        
//     }
// }
// addQuestionBtn.addEventListener(click,checkHasAnyField);

