$(function() {
    $('.add-photo input').change(function() {
        let photo = $(this);
        let data = new FormData();
        data.append(photo.attr('name'), photo.prop('files')[0]);

        $.ajax({
            url: 'ajax/uploadPhoto.php',
            method: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data 
        }).done(function(data) {
            if(data.success) {
                alert('Photo uploaded successfully!');
            } else {
                alert(data.error);
            }
        });
    })
})
