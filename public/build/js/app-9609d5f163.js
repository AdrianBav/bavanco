/**
 * Bavanco website.
 * General application scripts.
 *
 * Company: Bavanco
 * Author: Adrian Bavister
 * Date: September 2016
 */

   
// STICKY HEADER
// =============          

window.onscroll = function() {

    if (window.pageYOffset > 1) {
        document.getElementById( "app-header" ).classList.add( "sticky" );
    } else {
        document.getElementById( "app-header" ).classList.remove( "sticky" );
    }

};
