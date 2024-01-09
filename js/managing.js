const managements = document.getElementById('managements')
const manageItems = document.getElementsByClassName('manageItem')
const users = document.getElementById('invisUSERS')
const service = document.getElementById('invisSERVICE')
const order = document.getElementById('invisORDER')
const salon = document.getElementById('invisSALON')
const master = document.getElementById('invisMASTERS')
const customer = document.getElementById('invisCUSTS')


function show(type) {
    $.ajax({
        url: 'code/showManageTable.php',
        method: 'post',
        data: {
            table: type
        },
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
    switch (type) {
        case 'Пользователи': {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'none';
            }

            users.style.display = 'block'
            break
        }
        case 'Мастера': {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'none';
            }

            master.style.display = 'block'
            break
        }
        case 'Заказчики': {
            for (let i = 0; i < manageItems.length; i++) {
                manageItems[i].style.display = 'none';
            }

            customer.style.display = 'block'
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
        case 'Типы услуг': {
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
            master.style.display = 'none'
            customer.style.display = 'none'
            salon.style.display = 'none'

            break
        }
    }
}

function acceptOrder(id) {
    $.ajax({
        url: 'code/managementMaster.php',
        method: 'post',
        data: {
            id: id,
            status: 'accept'
        },
        success: function (rp) {
            $("tr[data-id='" + id + "']").find("td").eq(3).text(rp);
            console.log(22)
        }
    })
}
function cancelOrder(id) {
    $.ajax({
        url: 'code/managementMaster.php',
        method: 'post',
        data: {
            id: id,
            status: 'cancel'
        },
        success: function (rp) {
            $("tr[data-id='" + id + "']").find("td").eq(3).text(rp);
            console.log(11)
        }
    })
}

function changeImage(element, newImageSrc) {
    $(element).find('img').attr('src', newImageSrc);
}

$('.phoneInput').on('keypress', function (e) {
    if (!/[0-9]/.test(String.fromCharCode(e.which))) {
        e.preventDefault();
    }
});

document.getElementById('usersForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    let phonenum = $('#phonenum').val()
    if (phonenum) formData.append('phonenum', phonenum)
    
    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            console.log(rp)
        },
        error: function () {
          console.log('error!')
        }
      })
});
