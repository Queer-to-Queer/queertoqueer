<?php
require_once('./project_files/initialize.php');

$id = $_GET['id'];

$page_title = $episodio->title;
include(PUBLIC_PATH . 'header.php');
?>

<div class="inside single_episode">


    <div class="first_block">
        <h1 class="title">
        </h1>
        <div class="cover">
            <div class="img_cover">
                <!--<ion-icon name="play" id="play"></ion-icon>-->
            </div>
            <div class="player"></div>
            <div class="listen">
                <h2>Ascoltaci su: </h2>
                <div class="icons">
                    <a href="https://open.spotify.com/show/1iMQheTy541oOELjQJdOLV" target="_blank" rel="noopener noreferrer">
                        <svg width="40px" viewBox="0 0 427.7 427.7">
                            <path d="M214 0a214 214 0 100 428 214 214 0 000-428zm93 310a15 15 0 01-20 6c-39-23-83-26-113-26-34 1-59 8-59 8a15 15 0 01-8-28 304 304 0 01127-4c25 4 48 13 68 24 7 4 9 13 5 20zm27-56a17 17 0 01-24 6c-45-27-98-31-134-30-40 2-69 9-69 9a17 17 0 01-10-33 361 361 0 01151-5c30 6 56 15 80 29 8 5 11 16 6 24zm17-51c-4 0-8-1-11-3-108-64-248-26-250-26a21 21 0 11-11-41 442 442 0 01185-6c36 7 69 19 98 36a21 21 0 01-11 40z" fill="currentColor" />
                        </svg>
                    </a>

                    <a href="https://www.spreaker.com/show/queer-to-queer" target="_blank" rel="noopener noreferrer">
                        <svg width="40px" viewBox="0 0 16 16" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.4">
                            <path fill="currentColor" d="M10 0L6 4 0 3l6 5-6 5 6-1 4 4v-6l6-2-6-2V0z" fill-rule="nonzero" />
                        </svg>
                    </a>

                    <a href="https://podcasts.apple.com/it/podcast/queer-to-queer/id1501870867" target="_blank" rel="noopener noreferrer">
                        <svg width="40px" viewBox="0 0 840.4 926.4">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: currentColor
                                    }
                                </style>
                            </defs>
                            <g id="Livello_2" data-name="Livello 2">
                                <g id="Capa_1" data-name="Capa 1">
                                    <g id="kIz4XG.tif">
                                        <path class="cls-1" d="M518 667c-1 59-7 117-26 172-9 27-20 51-41 71-24 22-44 22-68-1-26-25-38-57-47-90-17-64-21-130-20-196 1-55 47-99 101-99 52 0 96 40 101 94v49zM315 393c0-58 48-105 107-104 51 0 98 48 98 102 1 56-46 103-103 104-55 0-102-46-102-102z" />
                                        <path class="cls-1" d="M838 375a420 420 0 10-550 442l-9-57c-5-6-12-11-22-16a362 362 0 11517-248 362 362 0 01-205 256c-4 2-10 3-13 7-2 20-6 41-10 61a416 416 0 00292-445z" />
                                        <path class="cls-1" d="M685 360a278 278 0 00-285-211 278 278 0 00-257 226c-25 132 55 247 127 281l-1-70a31 31 0 00-4-5 220 220 0 01196-373c84 19 142 70 166 153 25 85 3 160-60 222a22 22 0 01-2 1v57l-1 15c84-45 152-167 121-296z" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="descr">
            <div class="premessa"></div>
            <div class="interventi">
                <h2 class="title">
                    Interventi
                </h2>
                <ul class="people fa-ul">
                </ul>
            </div>
        </div>
        <div class="player"></div>
    </div>
    

    <div class="disclosure">
        <h4>Queer to queer vuole dare voce alle minoranze del mondo LGBT+, e vuole che <b>tutte e tutti</b> possano sentire questa voce.<br>
            Crediamo nella <b>piena accessibilità</b> dei nostri contenuti e per questo motivo troverai per ogni episodio il testo completo.</h4>
    </div>

    <div class="testo"></div>


</div>

<script type="text/javascript">
    var ul = $('ul.people')
    var premessa = $('.premessa')
    var player_spreaker = $('.player')
    var h1_title = $('h1.title')
    var testo_completo = $('.testo')
    var img_ep = $('.cover .img_cover')
    $.getJSON("episodi.json", function(data) {
        var ep = data[<?php echo $_GET['id'] - 1 ?>]
        var titolo_ep = []
        var descr = []
        var interventi = []
        var embed = []
        var cover = []
        var testo = []

        titolo_ep += ep.titolo

        descr = '<p>' + ep.descr + '</p>'

        cover += '<img src="/assets/uploads/img/uploads/episodi/' + ep.cover + '" alt="' + ep.titolo + ' - Cover">'

        $.each(ep.intervistati, function(key, val) {
            interventi += '<li data-key="' + key + '"><span class="fa-li"><i class="fas fa-microphone-alt"></i></span>'
            interventi += '<p class="nome ' + key + '" >' + val.nome + ' ' + val.cognome + '</p>'
            interventi += '<p class="descr">' + val.descr + '</p></li>'
        });

        $.each(ep.testo, function(key, val) {
            testo += val.testo
        });

        embed += ep.embed

        h1_title.html(titolo_ep)
        img_ep.html(cover)
        premessa.html(descr)
        ul.html(interventi)
        player_spreaker.html(embed)
        testo_completo.html(testo)

    });
</script>





<?php
include(PUBLIC_PATH . 'footer.php');
?>