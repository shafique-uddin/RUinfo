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
        crtRadioField.setAttribute('name', 'answer_for_question_'+counter);
        document.getElementById('qusandans').appendChild(crtRadioField);


        let crtOptionField = document.createElement('input');
        crtOptionField.setAttribute('type', 'text');
        crtOptionField.setAttribute('class', 'optionlist');
        crtOptionField.setAttribute('required', '');
        crtOptionField.setAttribute('name', 'options_'+index+'_for_question_'+counter);
        crtOptionField.setAttribute('size', '70');
        crtOptionField.setAttribute('placeholder', 'options_'+index+'_for_question_'+counter);
        document.getElementById('qusandans').appendChild(crtOptionField);
    }



    // let crtAddOptionField = document.createElement("button");
    // crtAddOptionField.setAttribute('value', 'question_no_'+counter);
    // crtAddOptionField.setAttribute('onclick', 'add_options_btn()');
    // const btnvalue = document.createTextNode("This is a paragraph.");
    // crtAddOptionField.appendChild(btnvalue);
    // document.getElementById('qusandans').appendChild(crtAddOptionField);
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

function validateForm(){

    console.log(document.querySelectorAll('modeltestform'));

    // Get the radio buttons by name
    let radios = document.getElementsByName("answer_for_question_");


// Loop through the radio buttons
for(let i = 0; i <= 4; i++) {
  // Check if the radio button is checked
  if(radios[i].checked) {
    // Output the value of the checked radio button
    let radios = document.getElementsByName("answer_for_question_"+radios[i]);
    console.log("Selected option: " + radios[i].value);
  }
}

}