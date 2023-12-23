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
    let pType = petType
    let type = service.split('. ')[0]
    let serv = service.split('. ')[1]
    let adr = address
    if (isEmpty()) {
        $.ajax({
            url: 'code/orderAdd.php',
            method: 'post',
            data: {
                petType: pType,
                type: type,
                serv: serv,
                address: adr
            },
            success: function (rp) {
                console.log(rp)
            },
            error:function(){
                alert('aaaaaaaaaa')
            }
        })
    }
})

function isEmpty() {
    return (service !== '' && address !== '' && petType !== '')
}