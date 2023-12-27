let phoneOK = false, passOK = false, passAgOK = false;
$(document).ready(function () {
    $("#adding").on('submit', function (e) {
        e.preventDefault()
        let name = checkName()
        let phonenum = $('#phonenum').val()
        let pass = $('#passAg').val()
        console.log(OK())
        if (OK()) {
            $.ajax({
                url: 'code/register.php',
                method: 'post',
                data: {
                    name: name,
                    phonenum: phonenum,
                    pass: pass
                },
                success: function (rp) {
                    if (rp === 'OK')
                        setTimeout(() => {
                            window.location.replace('me.php')
                        }, 1000)
                    else {
                        let error = document.getElementById('sayErrorPhone')
                        error.innerHTML = (rp)
                    }
                }
            })
        }
    })
});

function isNumber(value) {
    return typeof value === 'number'
}

$('#name').on('input', function () {
    if (this.value.length === 1 && /\d/.test(this.value)) {
        this.value = ''
    }
})

$('#phonenum').on('keypress', function (e) {
    var charCode = (e.which) ? e.which : e.keyCode
    if (this.value.length === 0) {
        this.value = '+'
        return false
    } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false
    }
    return true
})

$('#pass').on('input', function (e) {
    let error = document.getElementById('sayErrorPass')
    let password = this.value;
    let hasNumber = /\d/.test(password)
    let hasLetter = /[a-zA-Z]/.test(password);
    let hasSpecialChar = /[!@#$%^&*_+=-`~]/.test(password)

    if (password.length < 6) {
        error.innerHTML = 'Пароль должен быть длиннее 6 символов'
        passOK = false
    }
    else if (!hasNumber || !hasSpecialChar || !hasLetter) {
        error.innerHTML = 'Пароль должен содержать хотя бы одну букву, цифру и спец. символ'
        passOK = false
    }
    else if (password.length >= 6 && hasNumber && hasSpecialChar && hasLetter) {
        error.innerHTML = ''
        passOK = true
    }
})

$('#passAg').on('input', function (e) {
    let error = document.getElementById('sayErrorPassAg')
    let password = document.getElementById('pass').value
    let passwordAg = this.value;

    if (password !== passwordAg)
        error.innerHTML = 'Пароли не совпадают'
    else
        error.innerHTML = ''
})

function checkPassAg(p1, p2) {
    let error = document.getElementById('sayErrorPassAg')

    if (p1 !== p2) {
        error.innerHTML = 'Пароли не совпадают'
        passAgOK = false
    }
    else {
        error.innerHTML = ''
        passAgOK = true
    }
}

function checkName() {
    return $('#name').val()[0].toUpperCase() + $('#name').val().slice(1)
}

function checkPhone(phonenum) {
    let error = document.getElementById('sayErrorPhone')
    if (phonenum.length !== 13) {
        error.innerHTML = ('Номер в неверном формате')
        phoneOK = false
    }
    else {
        error.innerHTML = ''
        phoneOK = true
    }
}


function OK() {
    phonenum=($('#phonenum').val())
    let error = document.getElementById('sayErrorPhone')
    if (phonenum.length !== 13) {
        error.innerHTML = ('Номер в неверном формате')
        phoneOK = false
    }
    else {
        error.innerHTML = ''
        phoneOK = true
    }
    checkPassAg($('#pass').val(), $('#passAg').val())

    console.log(`phoneOK: ${phoneOK}\npassOK: ${passOK}\npassAgOK: ${passAgOK}`)
    if (phoneOK && passOK && passAgOK) {
        return true
    }
    return false
}
