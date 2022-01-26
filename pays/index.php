<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<title>Call WS</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<button id="btnCallWSJS" type="button">Call WS using JS</button>
<button id="btnCallWSAJAX" type="button">Call WS using AJAX</button>
<button id="btnCallWSFetch" type="button">Call WS using Fetch</button>
<br>
<button id="btnCallWSS" type="button">Call WSS</button>
<div id="resultWS"></div>
<script type="text/javascript">
    document.getElementById("btnCallWSJS").addEventListener("click", function(e) {
        callWSJS();
    });
    document.getElementById("btnCallWSAJAX").addEventListener("click", function(e) {
        callWSAJAX();
    });
    document.getElementById("btnCallWSFetch").addEventListener("click", function(e) {
        callWSFetch();
    });
    document.getElementById("btnCallWSS").addEventListener("click", function(e) {
        callWSS();
    });

    function callWSJS() {

        console.clear();

        const URL = "https://restcountries.com/v3/all";
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == XMLHttpRequest.DONE) {
        // https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest/readyState
        if (this.status === 200) {
        // http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
            let data = JSON.parse(this.responseText);
            console.log(data);
        // use data
        } else {
                console.error(this.status + " when call " + URL);
                alert(this.status);
            }   
        }
    };
        xhttp.open("GET", URL, true);
        xhttp.send();
    }

    function callWSAJAX(){

        console.clear();

        $.ajax({
        type: "GET",
        url: "https://restcountries.com/v3/all",
        success: function (data) {
        console.log(data);
        },
            error: function(jqXHR, textStatus, errorThrown) {
            alert("Error " + textStatus);
        }
        });

    }

    function callWSFetch(){

        console.clear();

        fetch("https://restcountries.com/v3/all", { method: "GET"}).then(function(response) {
            if (response.status !== 200) {
                alert('Error ' + response.status);
                return;
            }
            response.json().then(function(data) {
                console.log(data);
            });
        })
    .catch(function(e) {
            alert('Error ' + e);
        });
    }
    

</script>
</body>
</html>
