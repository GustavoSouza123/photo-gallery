$(function() {
    // displaying uploaded photos
    function getPhotos() {
        $.ajax({
            url: 'ajax/getPhotos.php',
            method: 'post',
            dataType: 'json',
        }).done(async function(data) {
            if(data.success) {
                $('.gallery').empty();
                let photo = '';
                let curDate = '';
                let lastDate = '';
                for(let i = 0; i < data.photos.length; i++) {
                    photo = data.photos[i].photo;
                    curDate = data.photos[i].creation_date.split(' ')[0];
                    if(curDate != lastDate) {
                        await $.ajax({
                            url: 'ajax/formatDate.php',
                            method: 'post',
                            dataType: 'json',
                            data: {date: curDate}
                        }).done(function(data) {
                            $('.gallery').append(`<div class="date-${curDate}"><div class="date">${data.date}</div><div class="photos"></div></div>`);
                        });
                    }
                    $(`.date-${curDate} .photos`).append(`<a data-fancybox="gallery" data-src="${photo}"><img src="${photo}" /></a>`);
                    lastDate = curDate;
                }
            } else {
                $('.gallery').append(data.error);
            }
        });
    }

    getPhotos();

    // activating fancybox
    Fancybox.bind('[data-fancybox="gallery"]', {
        Thumbs: {
            type: 'classic',
            showOnStart: false,
        },
        Images: {
            Panzoom: {
                maxScale: 2,
            },
        },
    });
})
