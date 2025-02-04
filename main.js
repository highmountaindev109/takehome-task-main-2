'use strict';

( function () {
	// NOTE: Please do not use any third-party libraries to implement the
	// following as we want to keep the JS payload as small as possible. You may
	// use ES6. There is no need to support IE11.
	//
	// TODO A: Improve the readability of this file through refactoring and
	// documentation. Make any changes you think are necessary.
	//
	// TODO B: When typing in the "title" field, we want to auto-complete based on
	// article titles that already exist. You may use the
	// api.php?prefixsearch={search} endpoint for auto-completion. To avoid
	// hitting the server endpoint excessively, please also add JavaScript code
	// that ensures at least 200ms has passed between requests. Check the
	// `design-spec/auto-complete-hover.png` file for the design spec.
	// Also, you don't need to make the autocomplete list disappear when the input
	// has lost focus in this TODO. That will be handled as part of TODO D.
	//
	// TODO C: When the user selects an item from the auto-complete list, we want
	// the textarea to populate with that article's contents. You may use the
	// api.php?title={title} endpoint to get the article's contents. Check the
	// `design-spec/auto-complete-select.png` file for the design spec.
	//
	// TODO D: The autocomplete list should only be shown when the input receives
	// focus. The list should be hidden after the user selects an item from the
	// list or after the input loses focus.
	//
	// TODO E: Figure out how to make multiple requests to the server as the user
	// scrolls through the autocomplete list.
	//
	// TODO F: Add error-handling requirements, such as displaying error messages
	// to the user when API requests fail and provide a graceful degradation of
	// functionality.

	function getFormButtonToWork() {
		const submitButton = document.querySelector( '.submit-button' );
		const form = document.querySelector( 'form' );

		// Make form submit button work when submit is clicked.
		submitButton.addEventListener( 'click', (e) => {
			e.preventDefault();
			form.submit();
		} );
	}

	// Waiting for page to load which takes about 1.5 seconds on my machine.
	setTimeout( getFormButtonToWork, 1500);
}() )
