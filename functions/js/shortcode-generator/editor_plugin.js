function tmnf_js_querystring(ji) {

	hu = window.location.search.substring(1);
	gy = hu.split( "&" );
	for (i=0;i<gy.length;i++) {
	
		ft = gy[i].split( "=" );
		if (ft[0] == ji) {
		
			return ft[1];
		
		} // End IF Statement
		
	} // End FOR Loop
	
} // End tmnf_js_querystring()
	
(
	
	function(){
	
		// Get the URL to this script file (as JavaScript is loaded in order)
		// (http://stackoverflow.com/questions/2255689/how-to-get-the-file-path-of-the-currenctly-executing-javascript-code)
		
		var scripts = document.getElementsByTagName( "script"),
		src = scripts[scripts.length-1].src;
		
		if ( scripts.length ) {
		
			for ( i in scripts ) {

				var scriptSrc = '';
				
				if ( typeof scripts[i].src != 'undefined' ) { scriptSrc = scripts[i].src; } // End IF Statement
	
				var txt = scriptSrc.search( 'shortcode-generator' );
				
				if ( txt != -1 ) {
				
					src = scripts[i].src;
				
				} // End IF Statement
			
			} // End FOR Loop
		
		} // End IF Statement

		var framework_url = src.split( '/js/' );
		
		var icon_url = framework_url[0] + '/images/shortcode-icon.png';
	
		tinymce.create(
			"tinymce.plugins.ThemnificThemesShortcodes",
			{
				init: function(d,e) {
						d.addCommand( "", function(){ window.open( "" ) } );
						
						d.addCommand( "tmnfOpenDialog",function(a,c){
							
							// Grab the selected text from the content editor.
							selectedText = '';
						
							if ( d.selection.getContent().length > 0 ) {
						
								selectedText = d.selection.getContent();
								
							} // End IF Statement
							
							tmnfSelectedShortcodeType = c.identifier;
							tmnfSelectedShortcodeTitle = c.title;
							
							
							jQuery.get(e+"/dialog.php",function(b){
								
								jQuery( '#tmnf-options').addClass( 'shortcode-' + tmnfSelectedShortcodeType );
								jQuery( '#tmnf-preview').addClass( 'shortcode-' + tmnfSelectedShortcodeType );
								
								// Skip the popup on certain shortcodes.
								
								switch ( tmnfSelectedShortcodeType ) {
							
									// Highlight
									
									case 'highlight':
								
									var a = '[highlight]'+selectedText+'[/highlight]';
									
									tinyMCE.activeEditor.execCommand( "mceInsertContent", false, a);
								
									break;
									
									// Dropcap
									
									case 'dropcap':
								
									var a = '[dropcap]'+selectedText+'[/dropcap]';
									
									tinyMCE.activeEditor.execCommand( "mceInsertContent", false, a);
								
									break;
							
									default:
									
									jQuery( "#tmnf-dialog").remove();
									jQuery( "body").append(b);
									jQuery( "#tmnf-dialog").hide();
									var f=jQuery(window).width();
									b=jQuery(window).height();
									f=720<f?720:f;
									f-=80;
									b-=84;
								
								tb_show( "Insert "+ tmnfSelectedShortcodeTitle +" Shortcode", "#TB_inline?width="+f+"&height="+b+"&inlineId=tmnf-dialog" );jQuery( "#tmnf-options h3:first").text( "Customize the "+c.title+" Shortcode" );
								
									break;
								
								} // End SWITCH Statement
							
							}
													 
						)
						 
						} 
					);
						
						// d.onNodeChange.add(function(a,c){ c.setDisabled( "themnific_shortcodes_button",a.selection.getContent().length>0 ) } ) // Disables the button if text is highlighted in the editor.
					},
					
				createControl:function(d,e){
				
						if(d=="themnific_shortcodes_button"){
						
							d=e.createMenuButton( "themnific_shortcodes_button",{
								title:"Insert Theme Shortcodes",
								image:icon_url,
								icons:false
								});
								
								var a=this;d.onRenderMenu.add(function(c,b){
								
									c=b.addMenu({title:"Layout"});
											a.addWithDialog(c,"Portfolio Featured","portfolio_featured" );
											a.addWithDialog(c,"Portfolio Latest","portfolio_latest" );
											a.addWithDialog(c,"Carousel Featured","carousel_featured" );
											a.addWithDialog(c,"Slider Featured","slider_featured" );
											a.addWithDialog(c,"Blog Latest","blog_latest" );
											a.addImmediate(c,"Services Box","[services] " );
											a.addImmediate(c,"Staff","[staff] " );
											a.addImmediate(c,"Pricing Tabs 3col","[pricing_tabs3] " );
											a.addImmediate(c,"Pricing Tabs 4col","[pricing_tabs4] " );
											a.addImmediate(c,"Clients","[clients] " );
											a.addImmediate(c,"Social Networks","[social_networks] " );
											a.addImmediate(c,"Homepage Video","[home_video][/home_video]" );
											b.addSeparator();
									a.addWithDialog(b,"Button","button" );
									a.addWithDialog(b,"Icon Link","ilink" );b.addSeparator();
									a.addWithDialog(b,"Info Box","box" );
									c=b.addMenu({title:"Typography"});
										a.addWithDialog(c,"Dropcap","dropcap" );
										a.addWithDialog(c,"Quote","quote" );
										a.addWithDialog(c,"Highlight","highlight" );
										a.addWithDialog(c,"Abbreviation","abbr" );
									a.addWithDialog(b,"Content Toggle","toggle" );
									a.addWithDialog(b,"Contact Form","contactform" );
									b.addSeparator();
									a.addWithDialog(b,"Column Layout","column" );
									b.addSeparator();
										c=b.addMenu({title:"List Generator"});
											a.addWithDialog(c,"Unordered List","unordered_list" );
											a.addWithDialog(c,"Ordered List","ordered_list" );
										c=b.addMenu({title:"Dividers"});
											a.addImmediate(c,"Horizontal Rule","[hr] " );
											a.addImmediate(c,"Divider","[divider] " );
											a.addImmediate(c,"Flat Divider","[divider_flat] " );
										c=b.addMenu({title:"Social Buttons"});
											a.addWithDialog(c,"Social Profile Icon","social_icon" );
											c.addSeparator();
											a.addWithDialog(c,"Twitter","twitter" );
											a.addWithDialog(c,"Twitter Follow Button","twitter_follow" );
											a.addWithDialog(c,"Tweetmeme","tweetmeme" );
											a.addWithDialog(c,"Digg","digg" );
											a.addWithDialog(c,"Like on Facebook","fblike" );
											a.addWithDialog(c,"Share on Facebook","fbshare" );
											a.addWithDialog(c,"Share on LinkedIn","linkedin_share" );
											a.addWithDialog(c,"Google +1 Button","google_plusone" );
		 });
							return d
						
						} // End IF Statement
						
						return null
					},
		
				addImmediate:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand( "mceInsertContent",false,a)}})},
				
				addWithDialog:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand( "tmnfOpenDialog",false,{title:e,identifier:a})}})},
		
				getInfo:function(){ return{longname:"Shortcode Generator",author:"VisualShortcodes.com",authorurl:"http://visualshortcodes.com",infourl:"http://visualshortcodes.com/shortcode-ninja",version:"1.0"} }
			}
		);
		
		tinymce.PluginManager.add( "ThemnificThemesShortcodes",tinymce.plugins.ThemnificThemesShortcodes)
	}
)();
