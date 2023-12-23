let service = ''
let address = ''
let petType = ''
$('#services').on('change', function () {
    service = this.value
})
$('.addresses').on('change', function () {
    address = this.value
})
$('.types').on('change', function () {
    petType = this.value
})

$("#adding").on('submit', function (e) {
    e.preventDefault()
    let petType = petType
    let type = service.split('. ')[0]
    let serv = service.split('. ')[1]
    let address = address
    if (isEmpty()) {
        $.ajax({
            url: 'code/orderAdd.php',
            method: 'post',
            data: {
                petType: petType,
                type: type,
                serv: serv,
                address: address
            },
            success: function () {

            }
        })
    }
})

function isEmpty() {
    return (service !== '' && address !== '' && petType !== '')
}