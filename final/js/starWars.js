
function madLibs (story) {
    console.log(story);

    const wordCount = 4;
    const title = $('#id_title').val()
    if (title !== '' || story) {

        if (story) {
            $('#subtitle').text(story['title'])
        } else {
            $('#subtitle').text(title)
        }

        for (let i = 1; i <= wordCount; i++) {
            let word;
            if (story) {
                word = story['data']['word'+1]
            } else {
                word = $('#id_word' + i).val();
            }
            const target = $('#word'+ i +'_tar');
            if (word !== '') {
                target.text(word)
            }
        }

        starWars();
    } else {
        $('#error_text').text('Must have valid title.')
    }
}

function pickStory (id) {
    console.log(jsonRes);
    let story = jsonRes.filter(item => item.id == id);
    if (story.length === 1) story = story[0];

    madLibs(story);
    return false;
}

function starWars() {
    const starWarsNav = $('.star-wars-nav');
    const bodyTag = $('body');

    const fadeOptions = {
        duration: 3500,
        easing: 'linear',
    }

    // Sets the number of stars we wish to display
    const numStars = 200;

    // For every star we want to display
    for (let i = 0; i < numStars; i++) {
        let star = document.createElement("div");
        star.className = "star";
        var xy = getRandomPosition();
        star.style.top = xy[0] + 'px';
        star.style.left = xy[1] + 'px';
        document.body.append(star);
    }

    $('.no-star-wars').fadeOut(2500);

    starWarsNav.removeClass('navbar-light', fadeOptions);
    starWarsNav.removeClass('bg-light', fadeOptions);
    starWarsNav.addClass('navbar-dark', fadeOptions);
    starWarsNav.addClass('bg-dark', fadeOptions);
    bodyTag.css('background-color', 'black');
    bodyTag.addClass('body-perf');

    $('.sw-trigger').removeClass('sw-trigger');
    $('#board').addClass('board');
    $('#intro').addClass('intro');
    $('#logo').addClass('logo');

    var audio = document.getElementById("sw-audio");
    audio.play();

    setInterval(undoStarWars, 90000)

    setInterval(() => {
        starWarsNav.removeClass('fade2500');
        bodyTag.removeClass('fade2500');
        starWarsNav.addClass('fade5000');
        bodyTag.addClass('fade5000');
    }, 10000)

}

function undoStarWars () {

    const starWarsNav = $('.star-wars-nav');
    const bodyTag = $('body');

    const fadeOptions = {
        duration: 5000,
        easing: 'linear',
    }

    starWarsNav.addClass('navbar-light', fadeOptions);
    starWarsNav.addClass('bg-light', fadeOptions);
    starWarsNav.removeClass('navbar-dark', fadeOptions);
    starWarsNav.removeClass('bg-dark', fadeOptions);
    bodyTag.css('background-color', 'white');
    bodyTag.removeClass('body-perf');

    $('.star').fadeOut(2500);

    setInterval(() => {
        $('#end-thanks').fadeIn();
    }, 3000)


}


// Gets random x, y values based on the size of the container
function getRandomPosition() {
    var y = window.innerWidth;
    var x = window.innerHeight;
    var randomX = Math.floor(Math.random()*x);
    var randomY = Math.floor(Math.random()*y);
    return [randomX,randomY];
}