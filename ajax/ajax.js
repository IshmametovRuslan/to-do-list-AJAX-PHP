$( document ).ready( function () {

	add_task();
	delete_task();
	update_task();

	function add_task() {

		$( '.add-new-task' ).submit( function () {

			let email     = $( '.add-new-task input[name=email]' ).val();
			let user_name = $( '.add-new-task input[name=user-name]' ).val();
			let new_task  = $( '.add-new-task input[name=new-task]' ).val();
			let url       = 'models/add-task.php';

			if ( new_task != '' ) {

				$.post( url, {
					task : new_task,
					name : user_name,
					email : email
				}, function ( data ) {

					$( '.add-new-task input[name=new-task], .add-new-task input[name=email],.add-new-task input[name=user-name]' ).val( '' );
					$( '.task-list ul' ).children( 'li' ).remove();
					$( '.task-list ul' ).prepend( data ).hide().fadeIn();

					delete_task();
				} );
			}

			return false; // Ensure that the form does not submit twice
		} );
	}

	function delete_task() {

		$( '.delete-button' ).click( function () {

			let id = $( this ).parent().attr( 'id' );

			$.post( 'models/delete-task.php', { task_id : id }, function () {

			} );
			$( this ).parent().fadeOut( "fast", function () {
				$( this ).remove();
			} );
		} );
	}

	function update_task() {

		$( '.edit-form' ).submit( function () {

			let current_element = $( this );
			let id              = $( this ).parent( 'li' ).attr( 'id' );
			let upd_task        = $( this ).children( 'input[name=update-task]' ).val();
			let status          = $( this ).children().children( 'p input[name=check-btn]' ).is(":checked");
			let url             = 'models/update-task.php';

			if ( upd_task != '' ) {

				$.post( url, {
					id : id,
					upd_task : upd_task,
					status : status,

				}, function ( data ) {

					$( '.edit-form input[name=update-task]' ).val( '' );
					current_element.parent( 'li' ).fadeOut( "fast", function () {
						$( this ).remove();
					} );
					$( '.task-list ul' ).prepend( data ).hide().fadeIn();

				} );
			}
			return false;
		} );
	}
} );
