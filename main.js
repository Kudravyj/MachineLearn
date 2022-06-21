const container = document.querySelector('.container')
const sizeEl = document.querySelector('.size')
let size = sizeEl.value
let hiddenInput = document.querySelector('.input')
const color = document.querySelector('.color')
const resetBtn = document.querySelector('.btn')
const sendBtn = document.querySelector('.send')
var result = new Array()

let draw = false

function populate(size) {
  container.style.setProperty('--size', size)
  for (let i = 0; i < size * size; i++) {
    const div = document.createElement('div')
    div.classList.add('pixel')
    div.addEventListener('mouseover', function(){
        if(!draw) return
        div.style.backgroundColor = color.value
        result[i] = 1
    })
    div.addEventListener('mousedown', function(){
        div.style.backgroundColor = color.value
        result[i] = 1
    })

    container.appendChild(div)
  }
}

window.addEventListener("mousedown", function(){
    draw = true
})
window.addEventListener("mouseup", function(){
    draw = false
})

function reset(){
    container.innerHTML = ''
    populate(size)
}


function send(){
    for(let i = 0; i < size * size; i++){
        if(result[i] != null){
            result[i] = 1
        }
        else{
            result[i] = 0
        }
    }
    hiddenInput.value = result
    reset()
}

resetBtn.addEventListener('click', reset)
sendBtn.addEventListener('click', send)

sizeEl.addEventListener('keyup', function(){
    size = sizeEl.value
    reset()
})

populate(size)