const form = document.getElementById('form');
const nomPavillon = document.getElementById('nomPavillon');
const nbrEtage = document.getElementById('nbrEtage');
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
/* function checknbrEtage(input) {//Tester si l'nbrEtage est valide :  javascript : valid nbrEtage
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
    } else {
        showError(input,`nbrEtage is not valid!`);
    }
} */
//
function checkRequired(inputArray){// Tester si les champs ne sont pas vides
    var bool =false;
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
           showError(input,`${getFieldName(input)} est obligatoire`);
        }else if(input.value === '0'){
            showError(input,`${getFieldName(input)} est obligatoire`);
        }else{
            showSuccess(input);
            bool=true;
        }

    });
    return bool;
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
        bool= true;
    }
    return bool;
}
// 
function checkNameStringMatch(input) {
    const  regex="^[A-Za-z]{1,20}, [A-Za-z]{1,20}, [A-Za-z]{1,20}";
    var bool = true;
    if (regex.test(input.value.trim())) {
        showSuccess(input);
    }else{
        showError(input,"le nom est invalide!!");
        bool = false;
    }
    return bool;
}
function CheckNumberMatch(input) {
    const rg  = /^[0-9]+$/;
    var bool =false;
    if (rg.test(input.value.trim())==false) {
        showError(input,"le Numero est invalide!!");
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
form.addEventListener('submit',function(e){    
    var nb = CheckNumberMatch(nbrEtage);

   var rq= checkRequired([nomPavillon, nbrEtage]);
 //  var str = checkNameStringMatch(nomPavillon);
 //  var lg = checkLength(nomPavillon,4,20);
/*  if (!nb) {
    e.preventDefault();   
   }  */
   if (!rq) {
     e.preventDefault();
   }

   
   /* if (!str) {
        e.preventDefault(); 
   }
   if (!lg) {
    e.preventDefault();   
   }
   if (!nb) {
    e.preventDefault();   
   } */
    //

  


    
  /*   function isValidnbrEtage(nbrEtage) {//Tester si l'nbrEtage est valide
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(nbrEtage).toLowerCase());
}
    if (nomPavillon.value === '') {
       showError(nomPavillon,'nomPavillon is required!'); 
    }else{
        showSuccess(nomPavillon);
    }

    if (nbrEtage.value === '') {
       showError(nbrEtage,'nbrEtage is required!'); 
    }else if(!isValidnbrEtage(nbrEtage.value)){
        showError(nbrEtage,'nbrEtage is not valid!');
    }else{
        showSuccess(nbrEtage);
    } */

  /*   if (password.value === '') {
       showError(password,'password is required!'); 
    }else{
        showSuccess(password);
    }

    if (password2.value === '') {
       showError(password2,'Password 2 is required!'); 
    }else{
        showSuccess(password2);
    } */
});