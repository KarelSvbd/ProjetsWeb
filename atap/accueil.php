<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

body{
    width: 1080px;

    height: 660px;
    margin: auto;
    border: 1px dotted black;
}
header{
    margin: 5px;
    width: 1070px;
    height: 100px;
    margin: auto;
    background-color: gray;
}
nav{
    margin: 5px;
    width: 1070px;
    height: 70px;
    margin: auto;
    background-color: gray;
}
#space{
    width: 1000px;
    height: 5px;
    color: white;
}
#spaceSide{
    width: 20px;
    float: left;
    color: white;

}
#spaceSide5{
    width: 5px;
    float: left;
    color: white;

}
#document{
    margin: 5px;
    margin-top: 1000px;
    width: 750px;
    height: 400px;
    margin: auto;
    background-color: gray;
    float: left;
}
#sidebar{
    float: left;
    margin: 5px;
    width: 300px;
    height: 350px;
    margin: auto;
    background-color: gray;
}
footer{
    margin: 5px;
    width: 1070px;
    height: 70px;
    margin: auto;
    background-color: gray;
    margin-top: 405px;
}
article{
    width: 450px;
    float: right;
    height: 200px;
    margin-right: 300;
    background-color: lightgray;
    border: 1px solid black;
}

h1{
    margin-left: 10px;
}

article > h2{
    margin-left: 30px;
}

#document > p{
    margin-left: 10px;
}

article > p, #sidebar > p{
    margin-left: 10px;
}

aside{
    float: right;
    background-color: lightgray;
    width: 200px;
    height: 120px;
    border: 1px solid black;
}

</style>
<body>
    <header>

    </header>
    <div id="space"></div>
    <nav>

    </nav>
    <div id="space"></div>
    <div id="spaceSide5">-</div>
    <section id="document">
        <h1 id="titreDocument">Document</h1>
        <p id="SousTitreDocument">section id="document"</p>
        <div id="spaceSide5" style="float:right;color:gray;width:5px;">-</div>
        <article>
            <h1>
                Article 1
            </h1>
            <p>article</p>
                <h2>            Main page content (article 1)</h2>
            <p>/article</p>

        </article>

    </section>
    <div id="spaceSide">-</div>
    <div id="sidebar">
        <p>div id="sidebar"</p>
        <div id="spaceSide5" style="float:right;color:gray;width:5px;">-</div>
        <aside>
        </aside>
        <div id="space" style="float:right">-</div>
        <div id="spaceSide5" style="float:right;color:gray;width:5px;">-</div>
        <aside>
        </aside>
    </div>
    
    <footer>

    </footer>
    
    <?php
        
        
    ?>
</body>
</html>