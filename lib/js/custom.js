counter = 0;

function add_question(){
    counter++;
    let crtnamefield = document.createElement("input");
    crtnamefield.setAttribute('type', 'text');
    crtnamefield.setAttribute('name', 'question_no_'+counter);
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