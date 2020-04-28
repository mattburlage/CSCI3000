const wordCount = 9;
let intervalObj;
let intervalObj2;

function madLibs (story) {

    let storyData;

    if (story) {
        storyData = JSON.parse(story['data'])
    } else {
        saveStory();
    }

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
                word = storyData['word'+i]
            } else {
                word = $('#id_word' + i).val();
            }
            const target = $('#word'+ i +'_tar');
            if (word !== '') {
                target.text(word)
            }
        }
        $(document).scrollTop(0, 0);

        intervalObj = setInterval(starWars, 500);
    } else {
        $('#error_text').text('Must have valid title.')
    }
}

function saveStory() {
    const wordData = {};
    const title = $('#id_title').val();

    for (let i = 1; i <= wordCount; i++) {
        const wordNum = 'word' + i
        const word = $('#id_' + wordNum).val();

        wordData[wordNum] = word;
    }

    const data = {
        title: title,
        data: JSON.stringify(wordData),
    }

    $.post('ajax/sw-ajax.php', data, res => {
        res = JSON.parse(res);
        if (res['status'] === 'ok') $('#status-msg-div').text('Your story saved.');
        else $('#status-msg-div').text('Your story did not save.');
    })
}

function pickStory (id) {
    let story = jsonRes.filter(item => {
        return item.id == id
    });
    if (story.length === 1) story = story[0];

    $('#status-msg-div').text('');
    madLibs(story);
    return false;
}

function starWars() {
    clearInterval(intervalObj);

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

    intervalObj = setInterval(undoStarWars, 90000)

    intervalObj2 = setInterval(() => {
        clearInterval(intervalObj2);
        starWarsNav.removeClass('fade2500');
        bodyTag.removeClass('fade2500');
        starWarsNav.addClass('fade5000');
        bodyTag.addClass('fade5000');
    }, 10000)

}

function undoStarWars () {
    clearInterval(intervalObj);

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
    $('.vanish-at-end').fadeOut(2500);


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