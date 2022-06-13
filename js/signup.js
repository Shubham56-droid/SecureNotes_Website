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

let conpass = document.getElementById('conpass');
let conlock = document.getElementById('conlock');

let phone = document.getElementById('phone');
let number = document.getElementById('number');

let locate = document.getElementById('locate');
let address = document.getElementById('address');

email.addEventListener("click",()=>{
    person.classList.add('active');
    lock.classList.remove('active');
    conlock.classList.remove('active');
    phone.classList.remove('active');
    locate.classList.remove('active');
})

pass.addEventListener("click",()=>{
    lock.classList.add('active');
    person.classList.remove('active');
    conlock.classList.remove('active');
    phone.classList.remove('active');
    locate.classList.remove('active');
})

conpass.addEventListener('click',()=>{
    conlock.classList.add('active');
    person.classList.remove('active');
    lock.classList.remove('active');
    phone.classList.remove('active');
    locate.classList.remove('active');
})

number.addEventListener('click',()=>{
    conlock.classList.remove('active');
    person.classList.remove('active');
    lock.classList.remove('active');
    phone.classList.add('active');
    locate.classList.remove('active');
})

address.addEventListener('click',()=>{
    conlock.classList.remove('active');
    person.classList.remove('active');
    lock.classList.remove('active');
    phone.classList.remove('active');
    locate.classList.add('active');
})


btn.addEventListener("click",()=>{
    lock.classList.remove('active');
    person.classList.remove('active');
    conlock.classList.remove('active');
    phone.classList.remove('active');
    locate.classList.remove('active');
})

removeeffect.addEventListener("click",()=>{
    lock.classList.remove('active');
    person.classList.remove('active');
    conlock.classList.remove('active');
    phone.classList.remove('active');
    locate.classList.remove('active');
})