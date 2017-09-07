wpmoly = window.wpmoly || {};

wpmoly.view.Library.ContentImport = wp.Backbone.View.extend({

	className : 'wpmoly library content-import inner-menu',

	template : wp.template( 'wpmoly-library-content-import' ),

	/**
	 * Initialize the View.
	 *
	 * @since    3.0
	 */
	initialize : function( options ) {

		var options = options || {};

		this.controller = options.controller || {};

	},

});
