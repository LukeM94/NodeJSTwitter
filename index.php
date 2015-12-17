<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Consuming Twitter Webserver</title>

    <link rel= StyleSheet href="css.css" type="text/css"/>

    <script>
        window.onload = function() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    var tweets = JSON.parse(xhttp.responseText);

                    var tweetstring = "";

                    for (var i =0; i< tweets.length ; i++)
                    {
                        tweetstring += "<h3>" + tweets[i].name + "</h3> </br>";
                        tweetstring += "<p>"  + tweets[i].text + "</p>"
                    }

                    document.getElementById("twitter").innerHTML = tweetstring;

                }
            };

            xhttp.open("GET", "http://node1301651.azurewebsites.net?q=<?php echo $_GET["searchTerm"]; ?>", true);

            xhttp.send();
        }

    </script>



</head>
<body>
<header>
    <h1>Twitter Search</h1>
</header>
<main>
    <h2>Enter a term to search Twitter for and hit enter</h2>

    <form method="get">
        <input style="font-size:18pt;height:22pt;" title="Enter a search term" type="text" name="searchTerm"><br>
    </form>
</main>
<aside id="twitter" >

</aside>
</body>
</html>
