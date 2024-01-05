function acceptOrder(id) {
    $.ajax({
        url: 'code/managementMaster.php',
        method: 'post',
        data: {
            id: id,
            status: 'accept'
        },
        success: function (rp) {
            if (rp === 'OK')
                window.location.reload()
        }
    })
}
function cancelOrder(id) {
    $.ajax({
        url: 'code/managementMaster.php',
        method: 'post',
        data: {
            id: id,
            status: 'cancel'
        },
        success: function (rp) {
            if (rp === 'OK')
                window.location.reload()
        }
    })
}