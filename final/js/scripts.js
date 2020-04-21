function getShortLink () {
    let url = $('#url_id').val();

    if (!url.includes('http://') && !url.includes('https://')) {
        url = 'https://' + url;
    }

    $.post('https://rel.ink/api/links/', {"url": url}, data => {
        console.log(data)
        $('#link_header').text('Short link for ' + data['url'])
        $('#link_display').text('https://rel.ink/' + data['hashid'])
    })

}

