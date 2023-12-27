$("#adding").on('submit', function (e) {
    e.preventDefault();
    let phonenum = $('#phonenum').val()
    let pass = $('#pass').val()
    $.ajax({
        url: 'code/author.php',
        method: 'post',
        data: {
            phonenum: phonenum,
            pass: pass
        },
        success: function (resp) {
            console.log(resp)
            if (resp == 'OK') {
                let user = getCookie("id")
                if (user !== undefined) {
                    $.ajax({
                        url: 'code/meRoute.php',
                        method: 'post',
                        data: {
                            id: getCookie("id")
                        },
                        success: function (rp) {
                            confirm(rp)
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
            else {
                sayError(resp)
            }
        }
    })
})


function sayError(err) {
    let sayError = document.getElementById('sayError')
    sayError.innerHTML = (err)
}

function getCookie(cname) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + cname.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}