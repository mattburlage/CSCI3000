// function getShortLink () {
//     let url = $('#url_id').val();
//
//     if (!url.includes('http://') && !url.includes('https://')) {
//         url = 'https://' + url;
//     }
//
//     let apiUrl = "https://msb.pw/l/yourls-api.php?signature=79d0adc48e&action=shorturl&url="+url+"&format=json"
//
//     $.getJSON(apiUrl, data => {
//         if (data['statusCode'] === 200) {
//             $('#link_header').val('URL for ' + data['url']['url'])
//             $('#link_display').val(data['shorturl'])
//         }
//     })
//
// }
// $(document).ready(() => {
// new ClipboardJS('#link_display');
// })


function copyLink() {
    let str = $('#link_display').text();

    const el = document.createElement('textarea');
    el.value = str;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
    $("#link_display").notify("Copied to clipboard.", "success");

}


function getShortLink() {
    let url = $('#url_id').val();

    if (!url.includes('http://') && !url.includes('https://')) {
        url = 'https://' + url;
    }

    let linkRequest = {
        destination: url,
        domain: { fullName: "rebrand.ly" }
    }

    let requestHeaders = {
        "Content-Type": "application/json",
        "apikey": "049efd20e25e4a17b1ab7506a5cc4e63",
        "workspace": "c76a0b9fa1f74db8ae12cbe2f43d05a1"
    }

    $.ajax({
        url: "https://api.rebrandly.com/v1/links",
        type: "post",
        data: JSON.stringify(linkRequest),
        headers: requestHeaders,
        dataType: "json",
        error: (e) => {
            $('#link_header').text('');
            $('#link_display').text('');
            $('#link_input').val('')
            $('#link_footer').text('')
            $('#link_error').text('There was an error. Please check your URL and try again.')
        },
        success: (link) => {
            console.log(`Long URL was ${link.destination}, short URL is ${link.shortUrl}`);
            $('#link_header').text('URL for ' + link.destination);
            $('#link_display').text(link.shortUrl);
            $('#link_input').val(link.shortUrl)
            $('#link_footer').text("Click link to copy")
            $('#link_error').text('')
        }
    });
}