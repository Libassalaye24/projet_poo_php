const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

//Functions-------------------------------------------------------------
function showError(input, message) {//Afficher les messages d'erreur
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}
//
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success'; 
}
//
function checkEmail(input) {//Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var bool = true;
    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
    } else {
        showError(input,`Email is not valid!`);
        bool = false;
    }
    return bool;
}
//
function checkRequired(inputArray) {// Tester si les champs ne sont pas vides
    var bool = false;
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            showError(input,`${getFieldName(input)} is required`);
        }else{
            showSuccess(input);
            bool = true;
        }
        return bool;
    });
}
//
function getFieldName(input) {//Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//
function checkLength(input, min, max) {//Tester la longueur de la valeur  d'un input
    var bool = false;
    if(input.value.length < min){
        showError(input, `${getFieldName(input)} must be at least ${min} characters!`)
    }else if(input.value.length > max){
        showError(input, `${getFieldName(input)} must be less than ${max} characters !`);
    }else{
        showSuccess(input);
        bool = true;
    }
    return bool;
}
//
function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Passwords do not match!');
    }
}





//Even listeners--------------------------------------------------------
/* form.addEventListener('submit',function(e){
   
   // e.preventDefault();

   var check = checkRequired([email, password]);
   var mail =  checkEmail(email);
   if (!check) {
    e.preventDefault();

   }

}); */