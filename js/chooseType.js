var type = 'Коты'
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

$('#petType').on('change', function () {
    type = this.value
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
})