const managements = document.getElementById('managements')
const photoManagements = document.getElementById('photoManagements')
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
            if (type === 'Лучшие' || type === 'Остальные')
                document.getElementById('photoTable').innerHTML = rp
            else
                document.getElementById('table').innerHTML = rp
        }
    })
    switch (type) {
        case 'Пользователи': {
            for (let i = 0; i < manageItems.length; i++)
                if (!manageItems[i].classList.contains('op') && !manageItems[i].classList.contains('bp'))
                    manageItems[i].style.display = 'none'
            users.style.display = 'block'
            break
        }
        case 'Мастера': {
            for (let i = 0; i < manageItems.length; i++)
                if (!manageItems[i].classList.contains('op') && !manageItems[i].classList.contains('bp'))
                    manageItems[i].style.display = 'none'
            master.style.display = 'block'
            break
        }
        case 'Заказчики': {
            for (let i = 0; i < manageItems.length; i++)
                if (!manageItems[i].classList.contains('op') && !manageItems[i].classList.contains('bp'))
                    manageItems[i].style.display = 'none'
            customer.style.display = 'block'
            break
        }
        case 'Услуги': {
            for (let i = 0; i < manageItems.length; i++)
                if (!manageItems[i].classList.contains('op') && !manageItems[i].classList.contains('bp'))
                    manageItems[i].style.display = 'none';
            service.style.display = 'block'
            break
        }
        case 'Заявки': {
            for (let i = 0; i < manageItems.length; i++)
                if (!manageItems[i].classList.contains('op') && !manageItems[i].classList.contains('bp'))
                    manageItems[i].style.display = 'none';
            order.style.display = 'block'
            break
        }
        case 'Типы услуг': {
            for (let i = 0; i < manageItems.length; i++)
                if (!manageItems[i].classList.contains('op') && !manageItems[i].classList.contains('bp'))
                    manageItems[i].style.display = 'none';
            salon.style.display = 'block'
            break
        }
        case 'Лучшие': {
            $('.bp p').css('color', '#5d548e')
            $('.op p').css('color', 'black')
            break
        }
        case 'Остальные': {
            $('.op p').css('color', '#5d548e')
            $('.bp p').css('color', 'black')
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
            clearForm()
            break
        }
    }
}
function clearForm() {
    $('.phonenum').val('')
    $('#surname').val('')
    $('#naming').val('')
    $('#service').val('')
    $('#typeName').val('')

    let roleRadios = document.getElementsByName('role');
    for (let i = 0; i < roleRadios.length; i++) {
        roleRadios[i].checked = false
    }
    let activeRadios = document.getElementsByName('active');
    for (let i = 0; i < activeRadios.length; i++) {
        activeRadios[i].checked = false
    }
    let photoRadios = document.getElementsByName('photo');
    for (let i = 0; i < photoRadios.length; i++) {
        photoRadios[i].checked = false
    }
    let typeRadios = document.getElementsByName('type');
    for (let i = 0; i < typeRadios.length; i++) {
        typeRadios[i].checked = false
    }
    let priceRadios = document.getElementsByName('price');
    for (let i = 0; i < priceRadios.length; i++) {
        priceRadios[i].checked = false
    }
    let dataRadios = document.getElementsByName('data');
    for (let i = 0; i < dataRadios.length; i++) {
        dataRadios[i].checked = false
    }
}

function acceptOrder(id, adm = false) {
    $.ajax({
        url: 'code/managementMaster.php',
        method: 'post',
        data: {
            id: id,
            status: 'accept'
        },
        success: function (rp) {
            if (adm)
                $("tr[data-id='" + id + "']").find("td").eq(6).text(rp);
            else
                $("tr[data-id='" + id + "']").find("td").eq(3).text(rp);
        }
    })
}
function cancelOrder(id, adm = false) {
    $.ajax({
        url: 'code/managementMaster.php',
        method: 'post',
        data: {
            id: id,
            status: 'cancel'
        },
        success: function (rp) {
            if (adm)
                $("tr[data-id='" + id + "']").find("td").eq(6).text(rp);
            else
                $("tr[data-id='" + id + "']").find("td").eq(3).text(rp);
        }
    })
}

function changeImage(element, newImageSrc) {
    $(element).find('img').attr('src', newImageSrc);
}

$('.phoneInput').on('keypress', function (e) {
    var charCode = (e.which) ? e.which : e.keyCode
    if (this.value.length === 0) {
        this.value = '+'
        return false
    } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false
    }
    return true
});

document.getElementById('usersForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    let phonenum = $('.phonenum').val()
    formData.append('phonenum', phonenum)
    formData.append('form', 'Пользователи')

    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});
document.getElementById('usersForm').addEventListener('reset', function (e) {
    $.ajax({
        url: 'code/showManageTable.php',
        method: 'post',
        data: {
            table: 'Пользователи'
        },
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});

document.getElementById('masterForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    let surname = $('#surname').val()
    formData.append('surname', surname)
    formData.append('form', 'Мастера')
    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});
document.getElementById('masterForm').addEventListener('reset', function (e) {
    $.ajax({
        url: 'code/showManageTable.php',
        method: 'post',
        data: {
            table: 'Мастера'
        },
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});

document.getElementById('custForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    let naming = $('#naming').val()
    formData.append('name', naming)
    formData.append('form', 'Заказчики')
    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        },
        error: function () {
            console.log('error!')
        }
    })
});
document.getElementById('custForm').addEventListener('reset', function (e) {
    $.ajax({
        url: 'code/showManageTable.php',
        method: 'post',
        data: {
            table: 'Заказчики'
        },
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});

document.getElementById('servForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    let service = $('#service').val()
    formData.append('service', service)
    formData.append('form', 'Услуги')

    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        },
        error: function () {
            console.log('error!')
        }
    })
});
document.getElementById('servForm').addEventListener('reset', function (e) {
    $.ajax({
        url: 'code/showManageTable.php',
        method: 'post',
        data: {
            table: 'Услуги'
        },
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});

document.getElementById('ordForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('form', 'Заявки')

    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        },
        error: function () {
            console.log('error!')
        }
    })
});
document.getElementById('ordForm').addEventListener('reset', function (e) {
    $.ajax({
        url: 'code/showManageTable.php',
        method: 'post',
        data: {
            table: 'Заявки'
        },
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});

document.getElementById('servtForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    let typeName = $('#typeName').val()
    formData.append('typeName', typeName)
    formData.append('form', 'Типы услуг')

    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        },
        error: function () {
            console.log('error!')
        }
    })
});
document.getElementById('servtForm').addEventListener('submit', function (e) {
    $.ajax({
        url: 'code/showManageTable.php',
        method: 'post',
        data: {
            table: 'Типы услуг'
        },
        success: function (rp) {
            document.getElementById('table').innerHTML = rp;
        }
    })
});

let tablesVisible = false
let editTablesVisible = false
let photosVisible = false
function tables() {
    if (!tablesVisible) {
        $('.tables').slideDown()
        $('.editTables').slideUp()
        $('.photos').slideUp()
        editTablesVisible = false
        photosVisible = false
    }
    else
        $('.tables').slideUp()
    tablesVisible = !tablesVisible
}
function editTables() {
    if (!editTablesVisible) {
        $('.editTables').slideDown()
        $('.tables').slideUp()
        $('.photos').slideUp()
        tablesVisible = false
        photosVisible = false
    }
    else
        $('.editTables').slideUp()
    editTablesVisible = !editTablesVisible
}
function photos() {
    if (!photosVisible) {
        $('.photos').slideDown()
        $('.editTables').slideUp()
        $('.tables').slideUp()
        tablesVisible = false
        editTablesVisible = false
    }
    else
        $('.photos').slideUp()
    photosVisible = !photosVisible
}

let tabInfo = {
    id: '',
    table: ''
}
function deleteRecord(id, table) {
    tabInfo.id = id
    tabInfo.table = table
    $('.notifyWindowDel').slideDown()
}
function deleteConfirm() {
    $('.notifyWindowDel').slideUp()
    $.ajax({
        url: 'code/deleteAccount.php',
        method: 'post',
        data: {
            id: tabInfo.id,
            table: tabInfo.table
        },
        success: function (rp) {
            console.log(rp)
            if (rp == 'OK')
                location.reload()
        },
        error: function () {
            console.log('error!')
        }
    })
}
function hideWindow() {
    $('.notifyWindowDel').slideUp()
}

function openAddWindow(table) {
    switch (table) {
        case 'Пользователи': {
            $('.addUser').show();
            break
        }
        case 'Мастера': {
            $('.addMaster').show();
            break
        }
        case 'Заказчики': {
            $('.addCust').show();
            break
        }
        case 'Услуги': {
            $('.addServ').show();
            break
        }
        case 'Типы услуг': {
            $('.addServt').show();
            break
        }
        case 'Типы услуг': {
            $('.addServt').show();
            break
        }
        case 'Фото': {
            $(".addPhoto").show()
            break
        }
    }
}

$('.addUser form').on('submit', function (e) {
    e.preventDefault()
    let errorPhone = document.getElementById('sayErrorPhoneA')
    let errorPass = document.getElementById('sayErrorPass')
    checkPhoneNum($('.addUser form .phonenum').val(), errorPhone)
    if (errorPass.innerHTML === '' && errorPhone.innerHTML === '') {
        var formData = new FormData(this)
        formData.append('table', 'Users')
        $.ajax({
            url: 'code/managementAdmin.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (rp) {
                if (rp == 'OK') {
                    location.reload()
                    closeForm()
                }
                else
                    console.log(rp)
            },
            error: function () {
                console.log('error!')
            }
        })
    }
})

let photo = null;
$('.input-file input[type=file]').on('change', function () {
    photo = this.files[0];
    photo.name = photo.name.replace(/ /g, "_");
    $(this).next().html(photo.name);
})
$('.addMaster form').on('submit', function (e) {
    e.preventDefault()
    let errorPhone = document.getElementById('sayErrorPhoneM')
    let errorPhoto = document.getElementById('sayErrorPhotoM')
    checkPhoneNum($('.addMaster form .phonenum').val(), errorPhone)
    checkPhoto(errorPhoto)
    if (errorPhone.innerHTML === '' && errorPhoto.innerHTML === '') {
        var formData = new FormData(this)
        formData.append('table', 'Masters')
        formData.append('file', photo)
        formData.append('pass', createPass(formData.get("name"), formData.get("surname")))
        $.ajax({
            url: 'code/managementAdmin.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (rp) {
                if (rp == 'OK') {
                    location.reload()
                    closeForm()
                }
                else
                    console.log(rp)
            },
            error: function () {
                console.log('error!')
            }
        })
    }
})
$('.addCust form').on('submit', function (e) {
    e.preventDefault()
    let errorPhone = document.getElementById('sayErrorPhoneC')
    let errorPass = document.getElementById('sayErrorPassC')
    checkPhoneNum($('.addCust form .phonenum').val(), errorPhone)
    if (errorPhone.innerHTML === '' && errorPass.innerHTML === '') {
        var formData = new FormData(this)
        formData.append('table', 'Customers')
        $.ajax({
            url: 'code/managementAdmin.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (rp) {
                if (rp == 'OK') {
                    location.reload()
                    closeForm()
                }
                else
                    console.log(rp)
            },
            error: function () {
                console.log('error!')
            }
        })
    }
})
$('.addServ form').on('submit', function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('table', 'Services')
    $.ajax({
        url: 'code/managementAdmin.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            if (rp == 'OK') {
                location.reload()
                closeForm()
            }
            else
                console.log(rp)
        },
        error: function () {
            console.log('error!')
        }
    })
})
$('.addServt form').on('submit', function (e) {
    e.preventDefault()
    if ($('#descr').val().length < 255) {
        var formData = new FormData(this)
        formData.append('table', 'ServicesTypes')
        $.ajax({
            url: 'code/managementAdmin.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (rp) {
                if (rp == 'OK') {
                    location.reload()
                    closeForm()
                }
                else
                    console.log(rp)
            },
            error: function () {
                console.log('error!')
            }
        })
    }
    else
        $('.sayErrorDescr').html('Длина текста должна быть меньше 255 символов')
})
$('.addPhoto form').on('submit', function (e) {
    e.preventDefault()
    let errorPhoto = document.getElementById('sayErrorPhotoP')
    checkPhoto(errorPhoto)
    if (errorPhoto.innerHTML === '') {
        var formData = new FormData(this)
        formData.append('table', 'Gallery')
        formData.append('file', photo)
        $.ajax({
            url: 'code/managementAdmin.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (rp) {
                if (rp == 'OK') {
                    location.reload()
                    closeForm()
                }
                else
                    console.log(rp)
            },
            error: function () {
                console.log('error!')
            }
        })
    }
})

function editRecord(id, table) {
    $.ajax({
        url: 'code/editRecord.php',
        method: 'post',
        data: {
            id: id,
            table: table,
            function: 'showEditWin'
        },
        success: function (rp) {
            if (rp !== 'ERROR') {
                $('.editForm').show()
                $('.editForm').html(rp)
            }
        },
        error: function () {
            console.log('error!')
        }
    })
}
$('.editForm').on('submit', '.editUser', function (e) {
    e.preventDefault()
    let errorPhone = $('.editUser .sayErrorPhone')
    let errorPass = $('.editUser .sayErrorPass')
    checkPhoneNum($('.editUser .phonenum'), errorPhone)
    if (errorPhone.html() === '' && errorPass.html() === '') {
        var formData = new FormData(this)
        formData.append('function', 'editing')
        formData.append('table', 'Users')
        $.ajax({
            url: 'code/editRecord.php',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (rp) {
                if (rp === 'OK') {
                    closeForm()
                    location.reload()
                }
            },
            error: function () {
                console.log('error!')
            }
        })
    }
})

$('.editForm').on('submit', '.editMaster', function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('function', 'editing')
    formData.append('table', 'Masters')
    $.ajax({
        url: 'code/editRecord.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            if (rp === 'OK') {
                closeForm()
                location.reload()
            }
        },
        error: function () {
            console.log('error!')
        }
    })
})

$('.editForm').on('submit', '.editCustomer', function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('function', 'editing')
    formData.append('table', 'Customers')
    $.ajax({
        url: 'code/editRecord.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            if (rp === 'OK') {
                closeForm()
                location.reload()
            }
        },
        error: function () {
            console.log('error!')
        }
    })
})

$('.editForm').on('submit', '.editService', function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('function', 'editing')
    formData.append('table', 'Services')
    $.ajax({
        url: 'code/editRecord.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            console.log(rp)
            if (rp === 'OK') {
                closeForm()
                location.reload()
            }
        },
        error: function () {
            console.log('error!')
        }
    })
})

$('.editForm').on('submit', '.editOrder', function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('function', 'editing')
    formData.append('table', 'Orders')
    $.ajax({
        url: 'code/editRecord.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            console.log(rp)
            if (rp === 'OK') {
                closeForm()
                location.reload()
            }
        },
        error: function () {
            console.log('error!')
        }
    })
})

$('.editForm').on('submit', '.editServt', function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('function', 'editing')
    formData.append('table', 'ServicesTypes')
    $.ajax({
        url: 'code/editRecord.php',
        method: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (rp) {
            if (rp === 'OK') {
                closeForm()
                location.reload()
            }
        },
        error: function () {
            console.log('error!')
        }
    })
})

function closeForm() {
    $('.addForm').hide()
    $('.editForm').hide()
    $('input').val('')
    $('select').val('')
    $('.input-file span').html('Выберите файл')
    photo = null
    $('input[type="file"]').val(null)
    let errs = Array.from(document.getElementsByClassName('sayError'))
    errs.forEach(err => {
        err.innerHTML = ''
    })
}

$('.phonenum').on('keypress', function (e) {
    var charCode = (e.which) ? e.which : e.keyCode
    if (this.value.length === 0) {
        this.value = '+'
        return false
    } else if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false
    return true
})

$('.pass').on('input', function (e) {
    let error = $('.sayErrorPass')
    let password = this.value;
    let hasNumber = /\d/.test(password)
    let hasLetter = /[a-zA-Z]/.test(password);
    let hasSpecialChar = /[!@#$%^&*_+=-`~]/.test(password)

    if (password.length < 6)
        error.html('Пароль должен быть длиннее 6 символов')
    else if (!hasNumber || !hasSpecialChar || !hasLetter)
        error.html('Пароль должен содержать хотя бы одну букву, цифру и спец. символ')
    else if (password.length >= 6 && hasNumber && hasSpecialChar && hasLetter)
        error.html('')
})
function checkPhoneNum(phonenum, error) {
    if (phonenum.length !== 13)
        error.innerHTML = ('Номер в неверном формате')
    else
        error.innerHTML = ''
}
function checkPhoto(error) {
    if (photo === null)
        error.innerHTML = ('Фото не выбрано')
    else
        error.innerHTML = ''
}
function transliterate(word) {
    var answer = ""
    var converter = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e',
        'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm',
        'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
        'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sch', 'ъ': '',
        'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya'
    }
    for (var i = 0; i < word.length; ++i) {
        if (converter[word[i]] == undefined)
            answer += word[i]
        else
            answer += converter[word[i]]
    }
    return answer
}

function createPass(name, surname) {
    var nameLatin = transliterate(name.toLowerCase());
    var surnameLatin = transliterate(surname.toLowerCase());
    return nameLatin[0] + surnameLatin
}

