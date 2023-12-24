let service = ''
let petType = ''
$('#services').on('change', function () {
    service = this.value
})
$('#petType').on('change', function () {
    petType = this.value
})

$("#adding").on('submit', function (e) {
    e.preventDefault()
    let pType = petType
    let type = service.split('. ')[0]
    let serv = service.split('. ')[1]
    if (isEmpty()) {
        $.ajax({
            url: 'code/orderAdd.php',
            method: 'post',
            data: {
                petType: pType,
                type: type,
                serv: serv
            },
            success: function (rp) {
                console.log(rp)
                if (rp === 'OK')
                    $('.accepted').show()
                else if (rp === 'acc err')
                    $('.canceled').show()
            }
        })
    }
})

function isEmpty() {
    return (service !== '' && petType !== '')
}

function closeWindow(btn) {
    $(`.${btn}`).hide()
    if (btn === 'canceled')
        window.location.replace('registration.php')
    if (btn === 'accepted') {
        $('#name').val('')
        document.getElementById("petType").selectedIndex = "-1";
        document.getElementById("services").selectedIndex = "-1";
    }
}