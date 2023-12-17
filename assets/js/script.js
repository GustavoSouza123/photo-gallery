$(function() {
    // photo upload
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
                getPhotos(); // display uploaded photo
            } else {
                alert(data.error);
            }
        });
    })

    // displaying uploaded photos
    function getPhotos() {
        $.ajax({
            url: 'ajax/getPhotos.php',
            method: 'post',
            dataType: 'json',
        }).done(function(data) {
            if(data.success) {
                $('.gallery').empty();
                let photo = '';
                for(let i = 0; i < data.photos.length; i++) {
                    photo = data.photos[i].photo;
                    $('.gallery').append(`<a data-fancybox="gallery" data-src="${photo}"><img src="${photo}" /></a>`); 
                }
            } else {
                $('.gallery').append(data.error);
            }
        });
    }

    getPhotos();

    // activating fancybox
    Fancybox.bind('[data-fancybox="gallery"]', {

    });
})
