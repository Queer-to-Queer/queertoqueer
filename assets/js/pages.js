function loadNewPage(url){
    $('main').load(url);
    $('html').scrollTop(0);
    history.pushState(null, null, url)
}