$(document).ready(() => {
    let myCards = $('.card');
    myCards.each(i => {
        const card = $('#card-' + i);
        const bgColor = card.css("background-color").replace('rgb(', '').replace(')', '');
        const r = bgColor.split(', ')[0]
        const g = bgColor.split(', ')[1]
        const b = bgColor.split(', ')[2]

        const brightness = Math.round(((parseInt(r) * 299) +
            (parseInt(g) * 587) +
            (parseInt(b) * 114)) / 1000);

        const textColour = (brightness > 125) ? 'black' : 'white';

        card.css('color', textColour);
    })
})