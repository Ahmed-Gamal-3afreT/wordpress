( function( api ) {

	// Extends our custom "coffee-cafeteria" section.
	api.sectionConstructor['coffee-cafeteria'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );