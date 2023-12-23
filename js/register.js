$("#adding").on('submit', function (e) {
    e.preventDefault();
    let name = $('#name').val()
    let phonenum = $('#phonenum').val()
    let pass = $('#passAg').val()
    console.log(name + '\n' + phonenum + '\n' + pass)
    $.ajax({
        url: 'code/register.php',
        method: 'post',
        data: {
            name: name,
            phonenum: phonenum,
            pass: pass
        },
        success: function () {
            $.ajax({
                url: 'me.php',
                method: 'post',
                data: {
                    name1: name,
                    phonenum1: phonenum,
                    sale: 0
                },
                success: function () {
                    window.location.replace('me.php');
                }
            });
        }
    });
});