$(document).ready(function(){
    $.getJSON( "team.json", function( data ) {
        var person=[]
        $.each( data, function( key, val ) {
            person.push(`<div class="single `+ key +`"><div class="social"> <img src="/assets/uploads/img/team/`+val.nome+`.jpg" alt="`+val.nome+'-'+val.cognome+`"> <div class="icons">`)
            if(val.ig!=""){
                person.push(`<a href="https://www.instagram.com/`+ val.ig +`" target="_blank"> <ion-icon name="logo-instagram"></ion-icon> </a>`)
            }
            if(val.fb!=""){
                person.push(`<a href="https://www.facebook.com/`+ val.fb +`" target="_blank"> <ion-icon name="logo-facebook"></ion-icon> </a>`)
            }
            person.push(`
            </div></div> <div class="info">
                <h2>`+ val.nome +' '+ val.cognome +`</h2>
                <h4>`+ val.title +`</h4>
                <p>`+ val.descr +`</p>
                <blockquote><i>`+ val.quote +`</i></blockquote>
            </div></div>`)
        });
        $( "<div/>", {
            "class": "team",
            html: person.join( "" )
          }).appendTo( ".list" );
    });
})