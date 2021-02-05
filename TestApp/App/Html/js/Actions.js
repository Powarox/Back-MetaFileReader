"use strict"

let addBtn = document.getElementById('addElem')
addBtn.addEventListener('click', (ev) => {
    let test = document.getElementById('test')
    let newCustom = document.createElement('select-meta')
    test.appendChild(newCustom)

    let newInput = document.createElement('input')
    newInput.id = 'modifyInput'
    newInput.type = 'text'
    newInput.value = 'méta of type selected'

    let btnAdd = document.createElement('button')

    let btnSuppr = document.createElement('button')

})

<input id="modifyInput" type="text" name="" value="méta of type selected">

<button id="addElem" type="button" name="button">Ajouter</button>

<button type="button" name="button">Supprimer</button>
