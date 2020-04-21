// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    $.getJSON('ajax/ajax.php', jsonData => {
        let rows = [];
        for (let i = 0; i < jsonData.length; i++) {
            const cur_row = jsonData[i];
            let new_row = {
                c: [{v: cur_row['label'], f: null}, {v: cur_row['count'], f: null}]
            }
            rows.push(new_row)
        }

        let procData = {
            "cols": [
                {"id":"","label":"Page","pattern":"","type":"string"},
                {"id":"","label":"Views","pattern":"","type":"number"}
            ],
            "rows": rows,
        }

        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(procData);

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        let options = {
            'title':'Page Views by Page',
            legend: {position: 'none'},
        };
        chart.draw(data, options);
    })
}
