const managements = document.getElementById('managements')
const manageItems = document.getElementsByClassName('manageItem')
const users = document.getElementById('invisUSERS')
const service = document.getElementById('invisSERVICE')
const order = document.getElementById('invisORDER')
const salon = document.getElementById('invisSALON')


function show(type) {
    switch (type) {
        case 'Пользователи': {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'none';
            }

            users.style.display = 'block'
            break
        }
        case 'Услуги': {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'none';
            }

            service.style.display = 'block'
            break
        }
        case 'Заявки': {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'none';
            }

            order.style.display = 'block'

            break
        }
        case 'Салоны': {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'none';
            }

            salon.style.display = 'block'

            break
        }
        default: {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'block';
            }

            users.style.display = 'none'
            service.style.display = 'none'           
            order.style.display = 'none'           
            salon.style.display = 'none'           

            break
        }
    }
}