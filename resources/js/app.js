require('./bootstrap');

$('.user-link').click(function(e) {
    var linkId = $(this).data('link-id');
    var linkUrl = $(this).attr('href');
    axios.post('/visit/' + linkId, {
        link: linkUrl
    }).then(console.log('response was sent')).catch();
});
