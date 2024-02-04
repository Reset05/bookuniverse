const gamethroneMini = document.querySelector('.gamethrone__mini')
const gamethroneOver = document.querySelector('.gamethrone__over')
const lordringsMini = document.querySelector('.lordrings__mini')
const lordringsOver = document.querySelector('.lordrings__over')
const hpMini = document.querySelector('.hp__mini')
const hpOver = document.querySelector('.hp__over')
const sumerkiMini = document.querySelector('.sumerki__mini')
const sumerkiOver = document.querySelector('.sumerki__over')

gamethroneMini.addEventListener('click',function(){
    gamethroneOver.classList.remove('none')
    lordringsOver.classList.add('none')
    hpOver.classList.add('none')
    sumerkiOver.classList.add('none')
})

lordringsMini.addEventListener('click',function(){
    gamethroneOver.classList.add('none')
    lordringsOver.classList.remove('none')
    hpOver.classList.add('none')
    sumerkiOver.classList.add('none')
})

hpMini.addEventListener('click',function(){
    gamethroneOver.classList.add('none')
    lordringsOver.classList.add('none')
    hpOver.classList.remove('none')
    sumerkiOver.classList.add('none')
})

sumerkiMini.addEventListener('click',function(){
    gamethroneOver.classList.add('none')
    lordringsOver.classList.add('none')
    hpOver.classList.add('none')
    sumerkiOver.classList.remove('none')
})
