const cartIcon = document.querySelector('.cart')
const cartModal = document.querySelector('.carts')
const exitCart = document.querySelector('.exit__cart')
const cartitem = document.querySelector('.container-cartitem')

cartIcon.addEventListener('click',function(e){
    e.preventDefault()
    cartModal.classList.remove('none')
})

exitCart.addEventListener('click',function(){
    cartModal.classList.add('none')
})

const btnMinus = document.querySelector('.btn-minus')
btnMinus.addEventListener('click',function(e){
    e.preventDefault()
})