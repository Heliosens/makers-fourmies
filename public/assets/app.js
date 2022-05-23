let main = document.querySelector('main');
let h = document.querySelector('header').offsetHeight;
let f = document.querySelector('footer').offsetHeight;

main.style.minHeight = innerHeight - h - f + "px";

// show toast
const toastLiveExample = document.getElementById('liveToast');
if(toastLiveExample){
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

// verif register form
const registerBtn = document.getElementById('registerBtn');
// get register input
const inputPseudo = document.getElementById('inputPseudo');
const inputEmail = document.getElementById('inputEmail');
const inputPassword = document.getElementById('inputPassword');
const inputPassword2 = document.getElementById('inputPassword2');

if(registerBtn){
    registerBtn.addEventListener('click', function (e){
        // Checking fields length.
        if(!checklenght(inputPseudo, inputEmail, inputPassword, inputPassword2)){
            errorFrame("Merci de remplir tous les champs",e);
        }

        // Checking passwords are the same.
        if(inputPassword.value !== inputPassword2.value) {
            errorFrame("Les mots de passe ne correspondent pas",e);
        }
        console.log(inputPassword.value)
        // Checking password format (length, 1 upper, one lower, one digit, one special char).
        if(!inputPassword.value.match(/^(?=.*[!+@#$%^&*-\])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/)) {
            errorFrame("Le format du mot de passe n'est pas bon (majuscule, minuscule, nombre et caractère spécial",e);
        }

        let error = document.getElementById('errorFrame');
        setTimeout(()=> error.remove(), 3000);
    })
}

// check if input are empty
function checklenght (...input){
    input.forEach(item => {
        if(item.value === ""){
            return false;
        }
    })
    return true;
}

function errorFrame (text, e){
    let div = document.createElement('div');
    div.id = "errorFrame";
    div.classList.add('position-absolute');
    div.style.height = "5vh";
    div.style.width = "100%";
    div.style.paddingLeft = "5%";
    div.style.marginTop = "3px";
    div.style.background = "white";
    div.innerHTML = text;
    main.prepend(div);
    e.preventDefault();
}

