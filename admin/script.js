$(function() {
    // delete confirmation
    $('td.delete a').click(function(e) {
        if(!confirm("Are you sure you want to delete this photo?")) {
            e.preventDefault();
        }
    })

    // photo upload
    $('.add-photo input').change(function() {
        let photo = $(this);
        let data = new FormData();
        data.append(photo.attr('name'), photo.prop('files')[0]);

        $.ajax({
            url: '../ajax/uploadPhoto.php',
            method: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data 
        }).done(function(data) {
            if(data.success) {
                alert('Photo uploaded successfully!');
                location.reload();
            } else {
                alert(data.error);
            }
        });
    })
})
