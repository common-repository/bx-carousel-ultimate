/* Advance TinyMCE for wordpress */
(function($) {
	"use strict";
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			icon: 'my-mce-icon',
			type: 'menubutton',
			menu: [
				{
					text: 'Bx Carousel Ultimate',
					onclick: function() {
						editor.windowManager.open( {
							title: 'Bx Carousel Shortcode Bundle',
							classes: 'myAwesomeClass-panel',
							body: [
								{
									type: 'listbox',
									name: 'shortcode',
									tooltip: 'Enable four difference style',
									label: 'Carousel style',
									'values': [
										{text: 'Style One Shortcode', value: 'bx_carousel_image_only'},
										{text: 'Style Two Shortcode', value: 'bx_carousel_bx'},
										{text: 'Style three Shortcode', value: 'bx_carousel_content'},
										{text: 'Style Four Shortcode', value: 'bx_carousel_lateast'}
									]
								},
								{
									type: 'textbox',
									name: 'unickID',
									tooltip: 'Input difference carousel ID',
									label: 'Carousel ID',
									value: '1',
								},
								{
									type: 'listbox',
									name: 'postname',
									tooltip: 'Enable two post type',
									label: 'Carousel Post Type',
									'values': [
										{text: 'bx-carousel', value: 'bx-carousel'},
										{text: 'post', value: 'post'}
									]
								},
								{
									type: 'textbox',
									name: 'categoryname',
									tooltip: 'Input category',
									label: 'carousel Category',
									value: ''
								}
								
							],
							onsubmit: function( e ) {
								editor.insertContent( '[' + e.data.shortcode + ' id="' + e.data.unickID + '" posttype="' + e.data.postname + '" category="' + e.data.categoryname + '"]');
							}
						});
						
					}
				}
			]
		});
	});
})();