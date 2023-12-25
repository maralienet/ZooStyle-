let petType = 'Коты'
let service = 'Обрезание когтей. Коты'

$('#services').on('change', function () {
    service = this.value
})
$('#petType').on('change', function () {
    petType = this.value
    if (petType === 'Коты')
        service = 'Обрезание когтей. Коты'
    else if (petType === 'Собаки')
        service = 'Обрезание когтей. Собаки'
})

function setMinDate() {
    let today = new Date()
    let dd = String(today.getDate()).padStart(2, '0')
    let mm = String(today.getMonth() + 1).padStart(2, '0')
    let yyyy = today.getFullYear()

    today = yyyy + '-' + mm + '-' + dd
    $('#orderDate').attr('min', today)
}
setMinDate();
$("#adding").on('submit', function (e) {
    e.preventDefault()
    let pType = petType
    let type = service.split('. ')[0]
    let serv = service.split('. ')[1]
    let orderDate = $('#orderDate').val()
    if (isEmpty()) {
        $.ajax({
            url: 'code/orderAdd.php',
            method: 'post',
            data: {
                petType: pType,
                type: type,
                serv: serv,
                orderDate: orderDate
            },
            success: function (rp) {
                console.log(rp)
                if (rp === 'OK')
                    $('.accepted').show()
                else if (rp === 'acc err')
                    $('.canceled').show()
            },
            error: function () {
                console.log('error!')
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
        window.location.replace('authorization.php')
    if (btn === 'accepted') {
        $('#name').val('')
        document.getElementById("petType").selectedIndex = "0";
        document.getElementById("services").selectedIndex = "0";
    }
}