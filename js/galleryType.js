function sendType(type="Коты"){
    let elements = $('b');
    elements.each(function() {
        if ($(this).text() === type) {
            $(this).addClass('active');
        }
        else
            $(this).removeClass('active');
    });
    $.ajax({
        url: 'code/showGallery.php',
        method: 'post',
        data: {
            type: type
        },
        success: function (resp) {
            document.getElementById('photoArr').innerHTML=''
            $('#photoArr').append(resp)
        }
    })
}
$.ajax({
    url: 'code/showGallery.php',
    method: 'post',
    data: {
        type: "Коты"
    },
    success: function (resp) {
        document.getElementById('photoArr').innerHTML=''
        $('#photoArr').append(resp)
    }
})