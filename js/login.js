tmode = document.getElementById('tmode');
iconval = document.getElementById('iconval');
body = document.getElementById('main');
formContent = document.getElementById('formContent');

tmode.addEventListener("click",()=>{
    tmode.classList.toggle("active");
    body.classList.toggle("active");
    formContent.classList.toggle("active");

    
    console.log(tmode.className);
    if(tmode.className == 'modebar active'){
        iconval.innerHTML = '<ion-icon name="bulb"></ion-icon>';

    }else{
        iconval.innerHTML = '<ion-icon name="moon-outline"></ion-icon>';

    }
})


let email = document.getElementById('email');
let pass = document.getElementById('pass');
let person = document.getElementById('person');
let lock = document.getElementById('lock');
let btn = document.getElementById('btnsub');
let removeeffect = document.getElementById('removeeffect');

email.addEventListener("click",()=>{
    person.classList.add('active');
    lock.classList.remove('active');
})

pass.addEventListener("click",()=>{
    lock.classList.add('active');
    person.classList.remove('active');
})

btn.addEventListener("click",()=>{
    lock.classList.remove('active');
    person.classList.remove('active');
})

removeeffect.addEventListener("click",()=>{
    lock.classList.remove('active');
    person.classList.remove('active');
})

/* -----------------------------------
time out function to remove alert 
-------------------------------------*/
let alertmess = document.getElementById('alert-rem');
let clsbtn = document.getElementById('clsbtn');
let check = false;

clsbtn.addEventListener("click",()=>{
    alertmess.classList.add('inactive');
    check = true;
})

if(check == false){
    setTimeout(() => {
        alertmess.classList.add('inactive');
    },5000);
}