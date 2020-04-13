<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>AJAX Assignment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(() => {
            const htmlAjax = $('#htmlAJAX');
            const htmlAjaxContent = $("#htmlAJAXContent");

            htmlAjax.on('keydown', () => {
                htmlAjaxContent.html("Loading...")
            });
            htmlAjax.on('keyup', () => {
                htmlAjaxContent.html("Loading...");

                $.ajax({
                    url: "send.php?name=" + htmlAjax.val(),
                    context: document.body,
                }).done(data => {
                    htmlAjaxContent.html(data)
                })
            });


            const jsonAjax = $('#jsonAJAX');
            const jsonAjaxContent = $("#jsonAJAXContent");

            jsonAjax.on('keydown', () => {
                jsonAjaxContent.html("Loading...")
            });
            jsonAjax.on('keyup', function() {
                jsonAjaxContent.html("Loading...");

                $.getJSON("send.php?format=json&name=" + jsonAjax.val(), function(data) {
                    console.log(data);
                    const items = [];

                    $.each(data, function (key, row) {
                        console.log(row);
                        let temp = "<li>Row " + key + "<ul>";

                        $.each(row, function (col, text) {
                            temp += "<li>" + col + ": " + text + "</li>"
                        });

                        temp += "</ul></li>";
                        items.push(temp);
                    });

                    console.log(items);

                    $("<ul/>", {
                        "class": "thisULClass",
                        html: items.join("")
                    }).appendTo(jsonAjaxContent)
                })
            })

        })
    </script>
</head>
<body>

    <br>
    <label for="jsonAJAX">JSON Search: </label><input type="text" name="jsonAJAX" id="jsonAJAX" /> <br/>
    <div id="jsonAJAXContent"></div>
</body>
</html>