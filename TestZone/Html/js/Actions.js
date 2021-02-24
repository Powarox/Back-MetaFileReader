"use strict"

let addBtn = document.getElementById('addElem')
addBtn.addEventListener('click', (ev) => {
    let modifyForm = document.querySelector('.modifyForm')
    
    let newArticle = document.createElement('article')
    newArticle.classList.add('card')

    let newCustom = document.createElement('select-meta')

    let newInput = document.createElement('input')
    newInput.id = 'modifyInput'
    newInput.type = 'text'
    newInput.value = 'méta of type selected'

    let btnSuppr = document.createElement('button')
    btnSuppr.type = 'button'
    btnSuppr.name = 'button'
    btnSuppr.innerHTML = 'Supprimer'
    btnSuppr.addEventListener('click', (ev) => {
        btnSuppr.remove()
        newInput.remove()
        newCustom.remove()
    })

    newArticle.appendChild(newCustom)
    newArticle.appendChild(newInput)
    newArticle.appendChild(btnSuppr)
    modifyForm.appendChild(newArticle)
})
