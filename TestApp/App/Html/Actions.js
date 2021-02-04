"use strict"

let addBtn = document.getElementById('addElem')
addBtn.addEventListener('click', (ev) => {
    let test = document.getElementById('test')
    let newCustom = document.createElement('select-meta')
    test.appendChild(newCustom)
})


class MyComponent extends HTMLElement {
    connectedCallback() {
        let list = {'XMP': ['disabled', 'elem2', 'elem3', 'elem4'], 'File': 'Author', 'Exif': 'exiftool', 'Location': 'Directory', 'Other': 'Other'}

        let select = this.createSelect(list, 'metaType')
        this.appendChild(select)
    }

    createSelect(list, name) {
        let select = document.createElement('select')
        select.name = name

        for(let key in list) {
            let optgroup = this.createOptgroup(key, list[key])
            select.appendChild(optgroup)
        }

        return select
    }

    createOptgroup(label, val) {
        let optgroup = document.createElement('optgroup')
        optgroup.label = label

        if(Array.isArray(val)) {
            for(let k in val) {
                let option = this.createOption(val[k])
                optgroup.appendChild(option)
            }
        }
        else {
            let option = this.createOption(val)
            optgroup.appendChild(option)
        }

        return optgroup
    }

    createOption(value) {
        let option = document.createElement('option')
        option.value = value
        option.innerHTML = value

        return option
    }
}

customElements.define('select-meta', MyComponent);
