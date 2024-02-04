const signin = document.querySelector('.link__signin')
const modalSign = document.querySelector('.modal__signin')
const modalLogin = document.querySelector('.modal__login')
const exit = document.querySelector('.exit')
const exit2 = document.querySelector('.exit2')
const login = document.querySelector('.registration')
const loginModal = document.querySelector('.login__inmodal')

signin.addEventListener('click',function(e){
    e.preventDefault()
    modalSign.classList.remove('none')
})

exit.addEventListener('click',function(){
    modalSign.classList.add('none')
})

login.addEventListener('click',function(e){
    e.preventDefault()
    modalSign.classList.add('none')
    modalLogin.classList.remove('none')
})

loginModal.addEventListener('click',function(e){
    e.preventDefault()
    modalLogin.classList.add('none')
    modalSign.classList.remove('none')
})

exit2.addEventListener('click',function(){
    modalLogin.classList.add('none')
})