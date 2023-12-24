function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkRegCookie() {
  let user = getCookie("id")
  if (user != "") {
    window.location.replace('../php/me.php')
  }
  else {
    window.location.replace('registration.php')
  }
}

function exit() {
  document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  window.location.replace('main.php')
}

function deleteAccount(agreed = false) {
  $('.delete').show();
  if (agreed) {
    $.ajax({
      url: 'code/deleteAccount.php',
      method: 'post',
      data: {
        id: getCookie("id")
      },
      success: function () {
        window.location.replace('authorization.php')
        $('.delete').hide();
      },
      error: function () {
        console.log('error!')
      }
    })
  }
}

function hideWindow(){
  $('.delete').hide();
}