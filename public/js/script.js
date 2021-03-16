
const username = document.getElementById('username');
const password = document.getElementById('password');
const username2 = document.getElementById('username1');
const email = document.getElementById('email');
const password2 = document.getElementById('password1');
const password3 = document.getElementById('password2');
const loginButton = document.getElementById('login');
const registerButton = document.getElementById('register');
const errorUsername = document.getElementById('errorUsername');
const errorPassword = document.getElementById('errorPassword');
const errorRegUsername = document.getElementById('errorRegUsername');
const errorEmail = document.getElementById('errorEmail');
const errorRegPassword = document.getElementById('errorRegPassword');
const errorRegPasswordConf = document.getElementById('errorRegPasswordConf');
const forgotPasswordButton = document.getElementById('forgotPassWord');

let dontSubmit = true;

document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.content').classList.toggle('s--signup')


})

loginButton.addEventListener('click', () => {
    checkInputsForSignIn()
    console.log("Sign in button clicked")
}  )

registerButton.addEventListener('click', () => {
    checkInputsForSignUp()
    console.log("Sign up button clicked")
}  )


function checkInputsForSignIn(){
    const usernameValue = username.value;
    const passwordValue = password.value;

    const myHeaders = new Headers()
    myHeaders.append('Content-Type', 'application/json')
    const raw = JSON.stringify({
        email:usernameValue,
        password:passwordValue
    })


    const requestOptions = {
        method:'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    }

    fetch('http://localhost:8012/api/authenticate', requestOptions).then(response => response.json()).then(data => {
        authentication(data, usernameValue, passwordValue) //admin status accessed
    }) .catch(error => console.error(error))
}

function checkInputsForSignUp(){
    const usernameValue = username1.value;
    const emailValue = email.value;
    const passwordValue = password1.value;
    const passwordValue2 = password2.value;

    const myHeaders = new Headers()
    myHeaders.append('Content-Type', 'application/json')
    const raw = JSON.stringify({
        name:usernameValue,
        password:passwordValue,
        email:emailValue,
        admin:0
    })

    const requestOptions = {
        method:'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    }

    fetch('http://localhost:8012/api/register', requestOptions).then(response => response.json()).then(data => {
        console.log(data)
    //registration(data, usernameValue, passwordValue, emailValue) //user registered
    }) .catch(error => console.error(error))  
   
}


function checkErrorForSignIn(input, message){
    small.innerText = message;
}

function checkSuccess(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isEmail(email){
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function authentication(data, usernameValue, passwordValue){
    console.log(data)

    errorUsername.classList.remove('error')
    if(usernameValue == ''){
        //show error + error class
        errorUsername.innerText = "Username cannot be blank"
        errorUsername.classList.add('error')
        dontSubmit = true;
    }else {
        //success class
        checkSuccess(username);
        dontSubmit = false;
    }
    errorPassword.classList.remove('error')
    if(passwordValue === ''){
        //show error + error class
        errorPassword.innerText = "Password cannot be blank"
        errorPassword.classList.add('error')
        dontSubmit = true;
    }else {
        //success class
        checkSuccess(password);
        dontSubmit = false;
    }if(data.admin == 1){
        console.log('Redirect to admin page')
        //add page
    }else{
        console.log('Redirect to user page')
        //add page
    }
}

    function registration(data, usernameValue, passwordValue, emailValue, admin){

        errorRegUsername.classList.remove('error')
        if(usernameValue == ''){
            //show error + error class
            errorRegUsername.innerText = "Username cannot be blank"
            errorPassword.classList.add('error')
         
            dontSubmit = true;
        }else {
            //success class
            checkSuccess(username1);
            dontSubmit = false;
        }
    
        errorEmail.classList.remove('error')
        if(emailValue === ''){
            //show error + error class
            errorEmail.innerText = "Email cannot be blank"
            errorEmail.classList.add('error')
            dontSubmit = true;
        }else if(!isEmail(emailValue)){
            errorEmail.innerText = "Email must contain @, '.'"
            errorEmail.classList.add('error')
            dontSubmit = true;
        }else{
            checkSuccess(email);
            dontSubmit = false;
        }
    
        errorRegPassword.classList.remove('error')
        if(passwordValue === ''){
            //show error + error class
            errorRegPassword.innerText = "Password cannot be blank"
            errorRegPassword.classList.add('error')
            dontSubmit = true;
        }else {
            //success class
            checkSuccess(password1);
            dontSubmit = false;
        }
        
        errorRegPasswordConf.classList.remove('error')
        if(passwordValue === ''){
            //show error + error class
            errorRegPasswordConf.innerText = "Password cannot be blank"
            errorRegPasswordConf.classList.add('error')
            dontSubmit = true;
        }else {
            //success class
            checkSuccess(password2);
            dontSubmit = false;
        }
    }



