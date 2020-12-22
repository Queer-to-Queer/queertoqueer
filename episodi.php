<?php

require_once('./project_files/initialize.php');

$page_title="Episodi";

include(PUBLIC_PATH.'header.php');
?>

<div class="inside episodi">

    <h2>Ascolta l'ultimo episodio!</h2>

    <div class="new_episode">
    </div>

    <h1 class="title">Episodi</h1>

    <div class="list episodi">
    </div>

</div>


<script type="text/javascript">

    var episodi = $('.list.episodi')
    var new_ep = $('.new_episode')

    $.getJSON( "episodi.json", function( data ) {

        var single_episode = []
        var new_data = data[data.length-1]
        var last_episode = []

        last_episode += '<div class="cover"><a href="/episodio?id='+ new_data.id +'">'
        last_episode += '<img src="/assets/uploads/img/uploads/episodi/'+ new_data.cover +'" alt="'+ new_data.titolo +' - Cover"></a></div>'
        last_episode += '<div class="info"><h3>' + new_data.titolo + '</h3><div class="durata"><p><ion-icon name="time"></ion-icon><b>'+ new_data.durata +'</b> min</p></div>'
        last_episode += '<p>' + new_data.descr + '</p><div class="button"><a href="/episodio?id= '+ new_data.id +'">Vai all\'episodio<ion-icon name="arrow-forward-outline"></ion-icon></a></div></div>'

        $.each( data.reverse(), function( key, val ) {
            single_episode += '<div class="single"><a href="/episodio?id=' + val.id +'">'
            single_episode += '<img src="/assets/uploads/img/uploads/episodi/' + val.cover + '" alt="' + val.titolo + ' - Cover">'
            single_episode += '<div class="info"><h3>'+ val.titolo + '</h3><div class="duration"><p><b>' + val.durata + '</b> min</p></div></div></a></div>'   
        });

        

        episodi.html(single_episode)
        new_ep.html(last_episode)

        
        
    });

</script>

<?php

include(PUBLIC_PATH.'footer.php');

?>
