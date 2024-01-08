function acceptOrder(id) {
    $.ajax({
        url: 'code/managementMaster.php',
        method: 'post',
        data: {
            id: id,
            status: 'accept'
        },
        success: function (rp) {
            $("tr[data-id='" + id + "']").find("td").eq(3).text(rp);
            console.log(22)
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
            $("tr[data-id='" + id + "']").find("td").eq(3).text(rp);
            console.log(11)
        }
    })
}

function changeImage(element, newImageSrc) {
    $(element).find('img').attr('src', newImageSrc);
}