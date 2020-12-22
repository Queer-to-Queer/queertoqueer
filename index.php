<?php
require_once('./project_files/initialize.php');
include(PUBLIC_PATH.'header.php');
?>


<div class="inside home">

    <div class="first_block">
        <div class="intro">
            <div class="title">
                <h1>Queer</h1>
                <h4>to</h4>
                <h1 class="second">Queer</h1>
            </div>
            <div class="sub">
                <h4>Oltre i soliti cliché</h4>
            </div>
            <div class="button">
                <a href="<?php echo url_for('/episodi')?>">Ascolta gli episodi <ion-icon name="arrow-forward-outline"></ion-icon></a>
            </div>
        </div>

        <div class="logo">
            <img src="<?php echo url_for('/assets/uploads/img/uploads/queer_to_queer_home.png')?>"
                alt="Queer to Queer project logo">
        </div>
    </div>
    <div class="second_block">
        <div class="img">
            <img src="<?php echo url_for('/assets/uploads/img/uploads/giulio_nicola.png')?>" alt="Giulio e Nicola">
        </div>
        <div class="text">
            <h2>Il nostro progetto</h2>
            <p>
                Queer to queer è un progetto che vuole dare voce alle minoranze nel mondo LGBT+.
                Parla di lesbiche, gay, bisessuali e trans, ma racconta le storie di cui non parla nessuno. Ascoltale
                con noi!
            </p>
            <div class="button">
                <a href="<?php echo url_for('/progetto')?>">Scopri di più<ion-icon name="arrow-forward-outline"></ion-icon></a>
            </div>
        </div>
    </div>
    <div class="third_block">
        <h2>Parlano <br> di noi</h2>
        <p>Alcuni siti hanno voluto raccontare il nostro progetto, se vuoi conoscerci meglio puoi andare a leggere i loro articoli</p>
        <div class="main-carousel mentions">  
        </div>
    </div>
</div>

<script type="text/javascript">

    var mentions = $('.mentions')

    $.getJSON( "mentions.json", function( data ) {

        var articolo = []

        $.each( data.reverse(), function( key, val ) {
            articolo += '<div class="carousel-cell">'
            articolo += `<div class="cover" style="background-image: url('/assets/uploads/img/mentions/` + val.cover + `');">`
            articolo += '<div class="info"><h4>' + val.titolo + '</h4><p> - '+val.blog+'</p><p>'+val.data+'</p></div></div>'
            articolo += '<div class="descr"><p>' + val.descr + '</p></div><div class="button"><a href="'+val.link+'" target="_blank">Leggi di più<ion-icon name="arrow-forward-outline"></ion-icon></a></div></div>'   
        });
        
        mentions.html(articolo)
        
    });

</script>


<?php
include(PUBLIC_PATH.'footer.php');
?>