(function($){

	/*
	*  Page Settings - Background Image
	*
	*  @type	event
	*  @date	2/14/15
	*
	*/
	
	
	// reference
	var _media = {
		div : null,
		frame: null
	}
	
	
	fts_image = {
		
		$el : null,
		$input : null,
		
		o : {},
		
		//TODO: Come back to this.
		set : function( o ){
			
			// merge in new option
			$.extend( this, o );
			
			
			// find input
			this.$input = this.$el.find('input[type="hidden"]');
			
			
			// get options
			this.o = {};
			

			// wp library query
			this.o.query = {
				type : 'image'
			};
			
			
			// library
			if( this.o.library == 'uploadedTo' )
			{
				this.o.query.uploadedTo = acf.o.post_id;
			}
			
			// return this for chaining
			return this;
			
		},
		add : function( image ){
			
			// this function must reference a global div variable due to the pre WP 3.5 uploader
			// vars
			var div = _media.div;
			
			console.log(div);
			// set atts
			div.find('#fts_2015_preview_image').attr( 'src', image.url );
			div.find('#fts_2015_background_image').val( image.id ).trigger('change');
		 	
			
		 	// switch visibility
		 	$('div.has-image').show();
		 	$('div.no-image').hide();

		},
		edit : function(){
			
			// vars
			var id = this.$el.find('#fts_2015_background_image').val();
			
			// set global var
			div = this.$el;
			
			
			// create the media frame
			_media.frame = wp.media({
				title		:	'Page Background Image',
				multiple	:	false,
				button		:	{ text : 'Update Background Image' }
			});
			
						
			// open
			_media.frame.on('open',function() {
				
				// set to browse
				if( _media.frame.content._mode != 'browse' )
				{
					_media.frame.content.mode('browse');
				}
				
				
				// TODO: Determine what classes should be added or remove this block
				// add class
				_media.frame.$el.closest('.media-modal').addClass('acf-media-modal acf-expanded');
					
				
				// set selection
				var selection	=	_media.frame.state().get('selection'),
					attachment	=	wp.media.attachment( id );
				
				
				// to fetch or not to fetch
				if( $.isEmptyObject(attachment.changed) )
				{
					attachment.fetch();
				}
				

				selection.add( attachment );
						
			});
			
						// When an image is selected, run a callback.
			_media.frame.on( 'select', function() {
				
				// get selected images
				selection = _media.frame.state().get('selection');
				
				if( selection )
				{
					
					selection.each(function(attachment){
	
				    	// vars
				    	var image = {
					    	id		:	attachment.id,
					    	url		:	attachment.attributes.url
				    	};
				    	
				    	// is preview size available?
				    	if( attachment.attributes.sizes && attachment.attributes.sizes[ 'thumbnail' ] )
				    	{
					    	image.url = attachment.attributes.sizes[ 'thumbnail' ].url;
				    	}
				        
				        fts_image.add(image);

				    });
				    // selection.each(function(attachment){
				}
				// if( selection )
				
			});
 
			// close
			_media.frame.on('close',function(){
			
				//TODO: Adjust this code based on what I do above with addClass
				// remove class
				_media.frame.$el.closest('.media-modal').removeClass('acf-media-modal');
				
			});
			
							
			// Finally, open the modal
			_media.frame.open();
			
		},
		remove : function()
		{
			
			// set atts
		 	this.$el.find('#fts_2015_preview_image').attr( 'src', '' );
			this.$el.find('#fts_2015_background_image').val( '' ).trigger('change');
			
		 	// switch visibility
			this.$el.find('.has-image').hide();
			this.$el.find('.no-image').show();
			
		},
		popup : function()
		{
			// reference
			var t = this;
			
			// set global var
			_media.div = this.$el;
					
			
			 // Create the media frame
			 _media.frame = wp.media({
				states : [
					new wp.media.controller.Library({
						library		:	wp.media.query( t.o.query ),
						title		:	'Page Background',
						priority	:	20,
						filterable	:	'all'
					})
				]
			});
						
			// customize model / view
			_media.frame.on('content:activate', function(){

				// vars
				var toolbar = null,
					filters = null;
					
				
				// populate above vars making sure to allow for failure
				try
				{
					toolbar = _media.frame.content.get().toolbar;
					filters = toolbar.get('filters');
				} 
				catch(e)
				{
					// one of the objects was 'undefined'... perhaps the frame open is Upload Files
					//console.log( e );
				}
				
				
				// validate
				if( !filters )
				{
					return false;
				}
				
				
				// filter only images
				$.each( filters.filters, function( k, v ){
				
					v.props.type = 'image';
					
				});
				
				//TODO: Look into this deeper
				// no need for 'uploaded' filter
				if( t.o.library == 'uploadedTo' )
				{
					filters.$el.find('option[value="uploaded"]').remove();
					filters.$el.after('<span>' + acf.l10n.image.uploadedTo + '</span>')
					
					$.each( filters.filters, function( k, v ){
						
						v.props.uploadedTo = acf.o.post_id;
						
					});
				}
				
				
				// remove non image options from filter list
				filters.$el.find('option').each(function(){
					
					// vars
					var v = $(this).attr('value');
					
					
					// don't remove the 'uploadedTo' if the library option is 'all'
					if( v == 'uploaded' && t.o.library == 'all' )
					{
						return;
					}
					
					if( v.indexOf('image') === -1 )
					{
						$(this).remove();
					}
					
				});
				
				
				// set default filter
				filters.$el.val('image').trigger('change');
				
			});
			
			
			// When an image is selected, run a callback.
			_media.frame.on( 'select', function() {
				
				// get selected images
				selection = _media.frame.state().get('selection');
				
				if( selection )
				{
					
					selection.each(function(attachment){
	
				    	// vars
				    	var image = {
					    	id		:	attachment.id,
					    	url		:	attachment.attributes.url
				    	};
				    	
				    	// is preview size available?
				    	if( attachment.attributes.sizes && attachment.attributes.sizes[ 'thumbnail' ] )
				    	{
					    	image.url = attachment.attributes.sizes[ 'thumbnail' ].url;
				    	}
				        
				        fts_image.add(image);

				    });
				}
				
			});
					 
				
			// Finally, open the modal
			_media.frame.open();
				

			return false;
		},
		
		// temporary gallery fix		
		text : {
			title_add : "Select Background Image",
			title_edit : "Edit Background Image"
		}
		
	};
	
	
	/*
	*  Events
	*
	*  jQuery events for this field
	*
	*  @type	function
	*  @date	2/15/2015
	*
	*  @param	N/A
	*  @return	N/A
	*/
	
	$(document).on('click', '.fts_2015_edit_image', function( e ){
		
		e.preventDefault();
		
		fts_image.set({ $el : $(this).closest('.fts-image-upload') }).edit();
			
	});
	
	$(document).on('click', '.fts_2015_remove_image', function( e ){
		
		e.preventDefault();
		
		fts_image.set({ $el : $(this).closest('.fts-image-upload') }).remove();
			
	});
	
	
	$(document).on('click', '.fts_2015_add_image', function( e ){
		
		e.preventDefault();
		
		fts_image.set({ $el : $(this).closest('.fts-image-upload') }).popup();
		
	});

	/*
	*	onLoad
	*	
	*	Setup the admin screens onLoad
	*
	*	@type	function
	*	@date	2/15/2015
	*
	*	@param	N/A
	*	@return	N/A
	*/

	var preview = $('#fts_2015_preview_image').attr('src')
	if(preview == '' || preview == null){
		// set visibility
	 	$('div.has-image').hide();
	 	$('div.no-image').show();
	}else{
		// set visibility
	 	$('div.has-image').show();
	 	$('div.no-image').hide();
	}

})(jQuery);