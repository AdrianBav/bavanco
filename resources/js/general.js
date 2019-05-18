
// STICKY HEADER
// =============

window.onscroll = function() {
    if (window.pageYOffset > 1) {
        document.getElementById( "app-header" ).classList.add( "sticky" );
    } else {
        document.getElementById( "app-header" ).classList.remove( "sticky" );
    }
};
