<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Assignment 6</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script>


        function submitMessage () {
            const myName = $('#name_id');
            const myText = $('#text_id');

            localStorage.setItem('msb-chat-name', myName.val());

            const data = {
                name: myName.val(),
                text: myText.val(),
            };

            $.post('send.php', data, getMessages);

            myText.val('');

            return false;
        }

        function getMessages () {
            const chatContent = $('#chat_content');
            chatContent.html = "Loading...";

            $.getJSON("send.php", function(data) {
                console.log(data);
                const items = [];

                $.each(data, function (key, row) {
                    console.log(row);
                    let msg = "" + row.name + ": " + row.text;
                    items.push(msg);
                });

                chatContent.empty();
                $("<ul/>", {
                    "class": "list-unstyled",
                    html: items.join("<br/>")
                }).appendTo(chatContent)
            })
        }

        $(document).ready(() => {
            const myName = $('#name_id');
            myName.val(localStorage.getItem('msb-chat-name'));

            getMessages();

        })
    </script>
    <style>

    </style>
</head>
<body>
<form onsubmit="return submitMessage()">
    <div class="container">
        <div class="row mt-5">
            <div class="col-3">
                <input type="text" name="name" id="name_id" class="form-control" />
            </div>
            <div class="col-6">
                <input type="text" name="text" id="text_id" class="form-control" />
            </div>
            <div class="col-3">
                <button class="btn btn-primary btn-block">Send</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div id="chat_content" class="border p-3"></div>
            </div>
        </div>
    </div>
</form>
</body>
</html>