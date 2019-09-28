$( document ).ready( function () {
	$( '.edit-btn' ).click( function () {
		$( this ).next( '.edit-form' ).toggleClass( 'visible' );
	} )
} );