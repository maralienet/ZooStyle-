var type = 'Коты'
sendType(type)

$('#petType').on('change', function () {
    type = this.value
    sendType(type)
})

function sendType(type){
    $.ajax({
        url: 'code/servicesSelect.php',
        method: 'post',
        data: {
            type: type
        },
        success: function (resp) {
            document.getElementById('services').innerHTML=(resp)
        }
    })
}