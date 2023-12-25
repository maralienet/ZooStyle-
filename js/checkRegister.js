function getCookie(cname) {
  let name = cname + "="
  let ca = document.cookie.split('')
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i]
    while (c.charAt(0) == ' ') {
      c = c.substring(1)
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length)
    }
  }
  return ""
}

function checkRegCookie() {
  let user = getCookie("id")
  console.log
  if (user != "") {
    window.location.replace('me.php')
  }
  else {
    window.location.replace('registration.php')
  }
}

function exit() {
  document.cookie = "id= expires=Thu, 01 Jan 1970 00:00:00 UTC path=/"
  window.location.replace('main.php')
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

function hideWindow() {
  $('.delete').hide()
  $('.edit').hide()
}
function unconfirm() {
  $('.confirm').hide()
}

function showEditWin(agreed = false) {
  $('.edit').show()
  if (agreed)
    $('.confirm').show()
}
function editAccount(agreed) {
  if (agreed) {
    let name = $('#name').val()
    let phonenum = $('#phonenum').val()
    let pass = $('#pass').val()

    let data = {
      id: getCookie("id")
    }

    if (name) data.name = name
    if (phonenum) data.phonenum = phonenum
    if (pass) data.pass = pass
    if (confirmPass()) {
      $.ajax({
        url: 'code/editAccount.php',
        method: 'post',
        data: data,
        success: function (rp) {
          if (rp === 'OK') {
            location.reload()
            $('.edit').hide()
          }
          else {

          }
        },
        error: function () {
          console.log('error!')
        }
      })
    }
  }
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
      if (rp === 'OK')
        return true
      else
        document.getElementById('sayErrorConfPass').innerHTML = rp;
    }
  })
  return false
}