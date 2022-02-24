const form = document.getElementById('form');
const nom = document.getElementById('nom');
const prenom = document.getElementById('prenom');
const email = document.getElementById('email');
const telephone = document.getElementById('telephone');
const date = document.getElementById('dateNaissance');
const myRadio = document.getElementById('myRadio');
const adresse = document.getElementById('adresse');
const bourse = document.getElementById('bourse');
const radio1 = document.getElementById('myRadio1');
const radio2 = document.getElementById('myRadio2');



//Functions-------------------------------------------------------------
function showError(input, message) {//Afficher les messages d'erreur
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}
///
function Valide(){
    const small = querySelector('small');
    if (small.style.visibility='hidden') {
        return true;
    }else{
        return false;
    }
}
//
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success'; 
}
function checkNameStringMatch(input) {
    const  regex="/^[A-Za-z ]+$/";
    var bool = false;
    if(!regex.test(input.value.trim())) {
        showError(input,`${getFieldName(input)} est invalide`);
    }else{
        showSuccess(input);
        bool = true;
    }
  
    return bool;
}
function CheckNumberMatch(input) {
   // const rg = new RegExp('^[0-9]+$');
   const reg = /^(33|77|78|75|76)[0-9]{7}/;
   var bool =false;
    if (!reg.test(input.value.trim())) {
        showError(input,"le Numero est invalide!!");
    }else{
        showSuccess(input);
        bool = true;
    }

    return bool;
}
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

//
function CheckRadio(radio1,radio2) {//
    var bool = false;
    if (radio1.checked===false && radio2.checked===false) {
        showError(radio1,`C'est obligatoire`);
    }else{
        bool = true;
    }
    return bool;
}
function getFieldName(input) {//Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//
function checkLength(input, min, max) {//Tester la longueur de la valeur  d'un input
    if(input.value.length < min){
        showError(input, `${getFieldName(input)} must be at least ${min} characters!`)
    }else if(input.value.length > max){
        showError(input, `${getFieldName(input)} must be less than ${max} characters !`);
    }else{
        showSuccess(input);
    }
}
function checkEmail(input) {//Tester si l'email est valide :  javascript : valid email
    var bool = false;
     if(!isValidEmail(input.value)){
         showError(input,'email is not valid!');
     }else{
         showSuccess(input);
         bool = true;
     } 
     return bool;
}

function CheckEle(ele){
    if (ele.checked == false) {
        
    }
}
/* function checkCheckBox(ele) {
 
    if (ele.checked == false ) {
        var div = document.getElementById("ajout");
        div.removeChild(div.firstChild);
    return false;
    }
    else {
        var input = document.createElement("input");
        input.type = "text";
        input.name = "name_de_l_input";
        document.getElementById("ajout").appendChild(input);
    }
    return true;
     
} */

function isValidEmail(email) {//Tester si l'email est valide
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function handleClick(myRadio) {
    if (myRadio.value==='bourse') {
        document.getElementById('fcb').style.display='block';
        document.getElementById('fca').style.display='none';
    }else if(myRadio.value==='notbourse') {
        document.getElementById('fca').style.display='block';
        document.getElementById('fcb').style.display='none';

    }
}

//Even listeners--------------------------------------------------------
form.addEventListener('submit',function(e){
   //Bloquer la soumission du formulaire
   //var rq=Boolean;
   var rd = CheckRadio(radio1,radio2);
 var bool = checkRequired([date,adresse,bourse,prenom,nom,telephone,email]);
 var Tl = CheckNumberMatch(telephone);
 var b = checkEmail(email);


 if (!bool) {
    e.preventDefault();
 }
 /// var bN1 = checkNameStringMatch(nom);
 if (!rd) {
    e.preventDefault();
 }
 if (!Tl) {
    e.preventDefault();
}

if (!b) {
    e.preventDefault();
}


    //CheckRadio(myRadio);
 /*    checkRequiredSelect(bourse);
    checkNameStringMatch(nom);
    checkNameStringMatch(prenom);
    checkEmail(email);
    CheckNumberMatch(telephone)
    CheckNumberMatch(date); */
   
   //document.getElementById('button').onsubmit();
});
