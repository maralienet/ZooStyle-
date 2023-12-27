function getCookie(cname) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + cname.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function checkRegCookie() {
  let user = getCookie("id")
  if (user !== undefined) {
    $.ajax({
      url: 'code/meRoute.php',
      method: 'post',
      data: {
        id: getCookie("id")
      },
      success: function (rp) {
        switch (rp) {
          case 'Администратор': {
            window.location.replace('manage.php');
            break;
          }
          case 'Мастер': {
            window.location.replace('meMaster.php');
            break;
          }
          case 'Заказчик': {
            window.location.replace('me.php');
            break;
          }
        }
      }
    })
  }
  else
    window.location.replace('registration.php')
}

function exit() {
  document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
  window.location.replace('main.php');
}

function deleteAccount(agreed = false) {
  $('.delete').show()
  if (agreed) {
    $.ajax({
      url: 'code/deleteAccount.php',
      method: 'post',
      data: {
        id: getCookie("id")
      },
      success: function () {
        window.location.replace('authorization.php')
        $('.delete').hide()
      },
      error: function () {
        console.log('error!')
      }
    })
  }
}

const nameSaved = $('#name').val()
const phoneSaved = $('#phonenum').val()

function hideWindow(edit = false) {
  $('.delete').hide()
  if (edit) {
    $('#name').val(nameSaved)
    $('#phonenum').val(phoneSaved)
    $('#pass').val('')
    $('input[type="file"]').val(null)
    $('#sayErrorPhone').text('')
    $('#sayErrorPass').text('')

    $('.edit').hide()
  }
}
function unconfirm() {
  $('.confirm').hide()
}

function showEditWin(agreed = false) {
  $('.edit').show()
  if (agreed && document.getElementById('sayErrorPhone').innerHTML === '')
    $('.confirm').show()
}

let file = '';
$('.input-file input[type=file]').on('change', function () {
  file = this.files[0];
  $(this).next().html(file.name);
})

function sendEditInfo() {
  let name = checkName()
  let phonenum = $('#phonenum').val()
  let pass = $('#pass').val()

  var formData = new FormData()
  formData.append('id', getCookie("id"))
  if (name) formData.append('name', name)
  if (phonenum) formData.append('phonenum', phonenum)
  if (pass) formData.append('pass', pass)
  if (file) formData.append('file', file)
  formData.append('functionname', 'editing')

  $.ajax({
    url: 'code/editAccount.php',
    method: 'post',
    data: formData,
    processData: false,
    contentType: false,
    success: function (rp) {
      if (rp === 'OK') {
        location.reload()
        $('.edit').hide()
      }
      else {
        console.log(rp)
      }
    },
    error: function () {
      console.log('error!')
    }
  })
}

function confirmPass() {
  let confPass = $('#confPass').val()
  $.ajax({
    url: 'code/editAccount.php',
    method: 'post',
    data: {
      functionname: 'confirmation',
      confPass: confPass
    },
    success: function (rp) {
      if (rp === 'OK') {
        document.getElementById('sayErrorConfPass').innerHTML = ''
        sendEditInfo()
      }
      else
        document.getElementById('sayErrorConfPass').innerHTML = rp
    }
  })
}


//!!!!!!!!!!!!!!!!СКОПИРОВАННЫЕ ФУНКЦИИ. НЕ В ЛИСТИНГ!!!!!!!!!!!!!!!!
function checkName() {
  return $('#name').val()[0].toUpperCase() + $('#name').val().slice(1)
}

function checkPhone(phonenum) {
  let error = document.getElementById('sayErrorPhone')
  if (phonenum.length !== 13) {
    error.innerHTML = ('Номер в неверном формате')
    return false
  }
  else {
    error.innerHTML = ''
    return true
  }
}