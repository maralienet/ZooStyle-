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
            if(resp=='OK'){
                setTimeout(()=>{
                    window.location.replace('me.php')
                }, 1000)            
            }
            else{
                sayError(resp)
            }
        }
    })
})


function sayError(err){
    let sayError = document.getElementById('sayError')
    sayError.innerHTML=(err)
}