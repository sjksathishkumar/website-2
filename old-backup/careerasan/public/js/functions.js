/*$("body").each(function() {
  $(this).html($(this).html().replace('View Video', 'Просмотр видео'));
});*/
var urlbase    = $('base').attr('href');
$("input").attr('autocomplete','off');
//<<<-- POPOUT --->>>>
$('.popout').click(function(){
	$(this).fadeOut();
});
//=========== TRIM
function trim ( cadena )
{
	return cadena.replace(/^\s+/g,'').replace(/\s+$/g,'')
}

//================= * SCROLL ELEMENT * ===================//
				function scrollElement( element ) 
				{
					var offset = $(element).offset().top;
 					$('html, body').animate({scrollTop:offset}, 500);
				};
				
//==================================================//
//=               *  TOOGLE MENU *               =//
//==================================================//
	$('.toogle').click(function() {
		$('.boxLogin').slideToggle(2);
		$(this).addClass('active');
		$('#user').focus();
		return false
	});
	
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if ( !$clicked.parents().hasClass("toogle") && !$clicked.parents().hasClass("form_login") && !$clicked.hasClass("form_login") )
		{
			$(".boxLogin").slideUp(1);
			$('.toogle').removeClass('active');
		}
	});
	
	$('.reply-button').click(function() {
		
		scrollElement( '#reply_post' );
		$('#reply_post').focus().height(100);
	});
	//==================================================//
//=               *  TOOGLE MENU *               =//
//==================================================//
	$('.settings_user').live('click',function() {
		$('#boxSettings').slideToggle(2);
		$(this).addClass('activeClass');
		//return false
	});
	
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if ( !$clicked.parents().hasClass("settings_user") && !$clicked.parents().hasClass("options_toogle") && !$clicked.hasClass("options_toogle") )
		{
			$("#boxSettings").slideUp(1);
			$('.settings_user').removeClass('activeClass');
		}
	});
	
$('.follow_active').live('mouseenter',function(){
	
	$(this).html('Unfollow');
	$(this).addClass('unfollow_button');
	 })
	 .live('mouseleave',function()
	 {
	 	$(this).html('Following');
	 	$(this).removeClass('unfollow_button');
	 });

//====================================//
/*               ALERT                */
//===================================//
(function($) {
	
	$.alerts = {
		
		// These properties can be read/written by accessing $.alerts.propertyName from your scripts at any time
		
		verticalOffset: -75,                // vertical offset of the dialog from center screen, in pixels
		horizontalOffset: 0,                // horizontal offset of the dialog from center screen, in pixels/
		repositionOnResize: true,           // re-centers the dialog on window resize
		overlayOpacity: .8,                // transparency level of overlay
		overlayColor: '#000',               // base color of overlay
		draggable: true,                    // make the dialogs draggable (requires UI Draggables plugin)
		okButton: '&nbsp;Accept&nbsp;',         // text for the OK button
		cancelButton: '&nbsp;Cancel&nbsp;', // text for the Cancel button
		dialogClass: null,                  // if specified, this class will be applied to all dialogs
		
		// Public methods
		
		alert: function(message, title, callback) {
			if( title == null ) title = 'Alert';
			$.alerts._show(title, message, null, 'alert', function(result) {
				if( callback ) callback(result);
			});
		},
		
		confirm: function(message, title, callback) {
			if( title == null ) title = 'Confirm';
			$.alerts._show(title, message, null, 'confirm', function(result) {
				if( callback ) callback(result);
			});
		},
			
		prompt: function(message, value, title, callback) {
			if( title == null ) title = 'Prompt';
			$.alerts._show(title, message, value, 'prompt', function(result) {
				if( callback ) callback(result);
			});
		},
		
		// Private methods
		
		_show: function(title, msg, value, type, callback) {
			
			$.alerts._hide();
			$.alerts._overlay('show');
			
			$("BODY").append(
			  '<div id="popup_container">' +
			    '<h1 id="popup_title"></h1>' +
			    '<div id="popup_content">' +
			      '<div id="popup_message"></div>' +
				'</div>' +
			  '</div>');
			
			if( $.alerts.dialogClass ) $("#popup_container").addClass($.alerts.dialogClass);
			
			// IE6 Fix
			var pos = ($.browser.msie && parseInt($.browser.version) <= 6 ) ? 'absolute' : 'fixed'; 
			
			$("#popup_container").css({
				position: pos,
				zIndex: 99999,
				padding: '35px 15px 20px',
				margin: 0
			});
			
			$("#popup_title").text(title);
			$("#popup_content").addClass(type);
			$("#popup_message").text(msg);
			$("#popup_message").html( $("#popup_message").text().replace(/\n/g, '<br />') );
			
			$("#popup_container").css({
				minWidth: $("#popup_container").outerWidth(),
				maxWidth: $("#popup_container").outerWidth()
			});
			
			$.alerts._reposition();
			$.alerts._maintainPosition(true);
			
			switch( type ) {
				case 'alert':
					$("#popup_message").after('<div id="popup_panel"><input type="button" value="' + $.alerts.okButton + '" id="popup_ok" /></div>');
					$("#popup_ok").click( function() {
						$.alerts._hide();
						callback(true);
					});
					$("#popup_ok").focus().keypress( function(e) {
						if( e.keyCode == 13 || e.keyCode == 27 ) $("#popup_ok").trigger('click');
					});
				break;
				case 'confirm':
					$("#popup_message").after('<div id="popup_panel"><input type="button" value="' + $.alerts.okButton + '" id="popup_ok" /> <input type="button" value="' + $.alerts.cancelButton + '" id="popup_cancel" /></div>');
					$("#popup_ok").click( function() {
						$.alerts._hide();
						if( callback ) callback(true);
					});
					$("#popup_cancel").click( function() {
						$.alerts._hide();
						if( callback ) callback(false);
					});
					$("#popup_ok").focus();
					$("#popup_ok, #popup_cancel").keypress( function(e) {
						if( e.keyCode == 13 ) $("#popup_ok").trigger('click');
						if( e.keyCode == 27 ) $("#popup_cancel").trigger('click');
					});
				break;
				case 'prompt':
					$("#popup_message").append('<br /><input type="text" size="30" id="popup_prompt" />').after('<div id="popup_panel"><input type="button" value="' + $.alerts.okButton + '" id="popup_ok" /> <input type="button" value="' + $.alerts.cancelButton + '" id="popup_cancel" /></div>');
					$("#popup_prompt").width( $("#popup_message").width() );
					$("#popup_ok").click( function() {
						var val = $("#popup_prompt").val();
						$.alerts._hide();
						if( callback ) callback( val );
					});
					$("#popup_cancel").click( function() {
						$.alerts._hide();
						if( callback ) callback( null );
					});
					$("#popup_prompt, #popup_ok, #popup_cancel").keypress( function(e) {
						if( e.keyCode == 13 ) $("#popup_ok").trigger('click');
						if( e.keyCode == 27 ) $("#popup_cancel").trigger('click');
					});
					if( value ) $("#popup_prompt").val(value);
					$("#popup_prompt").focus().select();
				break;
			}
			
			// Make draggable
			if( $.alerts.draggable ) {
				try {
					$("#popup_container").draggable({ handle: $("#popup_title") });
					$("#popup_title").css({ cursor: 'move' });
				} catch(e) { /* requires jQuery UI draggables */ }
			}
		},
		
		_hide: function() {
			$("#popup_container").remove();
			$.alerts._overlay('hide');
			$.alerts._maintainPosition(false);
		},
		
		_overlay: function(status) {
			switch( status ) {
				case 'show':
					$.alerts._overlay('hide');
					$("BODY").append('<div id="popup_overlay"></div>');
					$("#popup_overlay").css({
						position: 'absolute',
						zIndex: 99998,
						top: '0px',
						left: '0px',
						width: '100%',
						height: $(document).height(),
						background: $.alerts.overlayColor,
						opacity: $.alerts.overlayOpacity
					});
				break;
				case 'hide':
					$("#popup_overlay").remove();
				break;
			}
		},
		
		_reposition: function() {
			var top = (($(window).height() / 2) - ($("#popup_container").outerHeight() / 2)) + $.alerts.verticalOffset;
			var left = (($(window).width() / 2) - ($("#popup_container").outerWidth() / 2)) + $.alerts.horizontalOffset;
			if( top < 0 ) top = 0;
			if( left < 0 ) left = 0;
			
			// IE6 fix
			if( $.browser.msie && parseInt($.browser.version) <= 6 ) top = top + $(window).scrollTop();
			
			$("#popup_container").css({
				top: top + 'px',
				left: left + 'px'
			});
			$("#popup_overlay").height( $(document).height() );
		},
		
		_maintainPosition: function(status) {
			if( $.alerts.repositionOnResize ) {
				switch(status) {
					case true:
						$(window).bind('resize', $.alerts._reposition);
					break;
					case false:
						$(window).unbind('resize', $.alerts._reposition);
					break;
				}
			}
		}
		
	}
	
	// funciones de acceso directo
	jAlert = function(message, title, callback) {
		$.alerts.alert(message, title, callback);
	}
	
	jConfirm = function(message, title, callback) {
		$.alerts.confirm(message, title, callback);
	};
		
	jPrompt = function(message, value, title, callback) {
		$.alerts.prompt(message, value, title, callback);
	};
	
})(jQuery);	
//==================================================//
//=               *  logout *               =//
//==================================================//
$('.logout').click(function(){
	
	var time = 250;
	var out  = 'logout=out';
	
	
	$('body').keydown(function (event) {

	    if( event.which  == 116 || event.which  == 27  )
	    {
	     	return false;   
	    }
   });//======== FUNCTION 
   
	setTimeout(function(){
	$.ajax({
		
		type: 'GET',
		url: 'public/ajax/logout.php',
		data: out,
		success:function( msj )
		{
			if ( msj == 'OK' )
			{
				window.location.reload();
			}
		},// success
		error:function(){
				alert('Error');
			}
	});
	
	},time);
});
//===================================================//
//=                  LIVEQUERY                      =//
//===================================================//
(function($) {
$.extend($.fn, {
	livequery: function(type, fn, fn2) {
		var self = this, q;

		// Handle different call patterns
		if ($.isFunction(type))
			fn2 = fn, fn = type, type = undefined;

		// See if Live Query already exists
		$.each( $.livequery.queries, function(i, query) {
			if ( self.selector == query.selector && self.context == query.context &&
				type == query.type && (!fn || fn.$lqguid == query.fn.$lqguid) && (!fn2 || fn2.$lqguid == query.fn2.$lqguid) )
					// Found the query, exit the each loop
					return (q = query) && false;
		});

		// Create new Live Query if it wasn't found
		q = q || new $.livequery(this.selector, this.context, type, fn, fn2);

		// Make sure it is running
		q.stopped = false;

		// Run it immediately for the first time
		q.run();

		// Contnue the chain
		return this;
	},

	expire: function(type, fn, fn2) {
		var self = this;

		// Handle different call patterns
		if ($.isFunction(type))
			fn2 = fn, fn = type, type = undefined;

		// Find the Live Query based on arguments and stop it
		$.each( $.livequery.queries, function(i, query) {
			if ( self.selector == query.selector && self.context == query.context &&
				(!type || type == query.type) && (!fn || fn.$lqguid == query.fn.$lqguid) && (!fn2 || fn2.$lqguid == query.fn2.$lqguid) && !this.stopped )
					$.livequery.stop(query.id);
		});

		// Continue the chain
		return this;
	}
});

$.livequery = function(selector, context, type, fn, fn2) {
	this.selector = selector;
	this.context  = context;
	this.type     = type;
	this.fn       = fn;
	this.fn2      = fn2;
	this.elements = [];
	this.stopped  = false;

	// The id is the index of the Live Query in $.livequery.queries
	this.id = $.livequery.queries.push(this)-1;

	// Mark the functions for matching later on
	fn.$lqguid = fn.$lqguid || $.livequery.guid++;
	if (fn2) fn2.$lqguid = fn2.$lqguid || $.livequery.guid++;

	// Return the Live Query
	return this;
};

$.livequery.prototype = {
	stop: function() {
		var query = this;

		if ( this.type )
			// Unbind all bound events
			this.elements.unbind(this.type, this.fn);
		else if (this.fn2)
			// Call the second function for all matched elements
			this.elements.each(function(i, el) {
				query.fn2.apply(el);
			});

		// Clear out matched elements
		this.elements = [];

		// Stop the Live Query from running until restarted
		this.stopped = true;
	},

	run: function() {
		// Short-circuit if stopped
		if ( this.stopped ) return;
		var query = this;

		var oEls = this.elements,
			els  = $(this.selector, this.context),
			nEls = els.not(oEls);

		// Set elements to the latest set of matched elements
		this.elements = els;

		if (this.type) {
			// Bind events to newly matched elements
			nEls.bind(this.type, this.fn);

			// Unbind events to elements no longer matched
			if (oEls.length > 0)
				$.each(oEls, function(i, el) {
					if ( $.inArray(el, els) < 0 )
						$.event.remove(el, query.type, query.fn);
				});
		}
		else {
			// Call the first function for newly matched elements
			nEls.each(function() {
				query.fn.apply(this);
			});

			// Call the second function for elements no longer matched
			if ( this.fn2 && oEls.length > 0 )
				$.each(oEls, function(i, el) {
					if ( $.inArray(el, els) < 0 )
						query.fn2.apply(el);
				});
		}
	}
};

$.extend($.livequery, {
	guid: 0,
	queries: [],
	queue: [],
	running: false,
	timeout: null,

	checkQueue: function() {
		if ( $.livequery.running && $.livequery.queue.length ) {
			var length = $.livequery.queue.length;
			// Run each Live Query currently in the queue
			while ( length-- )
				$.livequery.queries[ $.livequery.queue.shift() ].run();
		}
	},

	pause: function() {
		// Don't run anymore Live Queries until restarted
		$.livequery.running = false;
	},

	play: function() {
		// Restart Live Queries
		$.livequery.running = true;
		// Request a run of the Live Queries
		$.livequery.run();
	},

	registerPlugin: function() {
		$.each( arguments, function(i,n) {
			// Short-circuit if the method doesn't exist
			if (!$.fn[n]) return;

			// Save a reference to the original method
			var old = $.fn[n];

			// Create a new method
			$.fn[n] = function() {
				// Call the original method
				var r = old.apply(this, arguments);

				// Request a run of the Live Queries
				$.livequery.run();

				// Return the original methods result
				return r;
			}
		});
	},

	run: function(id) {
		if (id != undefined) {
			// Put the particular Live Query in the queue if it doesn't already exist
			if ( $.inArray(id, $.livequery.queue) < 0 )
				$.livequery.queue.push( id );
		}
		else
			// Put each Live Query in the queue if it doesn't already exist
			$.each( $.livequery.queries, function(id) {
				if ( $.inArray(id, $.livequery.queue) < 0 )
					$.livequery.queue.push( id );
			});

		// Clear timeout if it already exists
		if ($.livequery.timeout) clearTimeout($.livequery.timeout);
		// Create a timeout to check the queue and actually run the Live Queries
		$.livequery.timeout = setTimeout($.livequery.checkQueue, 20);
	},

	stop: function(id) {
		if (id != undefined)
			// Stop are particular Live Query
			$.livequery.queries[ id ].stop();
		else
			// Stop all Live Queries
			$.each( $.livequery.queries, function(id) {
				$.livequery.queries[ id ].stop();
			});
	}
});
// Register core DOM manipulation methods
$.livequery.registerPlugin('append', 'prepend', 'after', 'before', 'wrap', 'attr', 'removeAttr', 'addClass', 'removeClass', 'toggleClass', 'empty', 'remove', 'html');

// Run Live Queries when the Document is ready
$(function() { $.livequery.play(); });

})(jQuery);

//===============================================================//
//=                         PHOTO UPLOAD                        =//
//===============================================================//
(function($){$.fn.filestyle=function(options)
{
	var settings = {width:250};
	if(options){$.extend(settings,options);};return this.each(function()
    {var self=this;
    var wrapper=$("<div class='file-btn'>")
    .css({"width":settings.imagewidth+"px","height":settings.imageheight+"px","background-position":"right",
    "display":"block","float":"right","overflow":"hidden","cursor":"pointer"});
     $(self).wrap(wrapper);$(self)
     .css({"position":"relative","height":settings.imageheight+"px","width":settings.width+"px","display":"block",
     "cursor":"pointer","opacity":"0.0"});if($.browser.mozilla)
     {if(/Win/.test(navigator.platform)){$(self).css("margin-left","0");}
     else{$(self).css("margin-left","0");};}
     });};})(jQuery);
     
    //<--- * UPLOAD * --->
    $("input#upload, input#uploadAvatar, input#uploadCover, #upload_bg").filestyle({
        imageheight: 30,
        imagewidth: 45,
        width: 45
    });

//===========================================//
//=               MODAL MESSAGE             =//
//===========================================//
// MODAL WINDOW
	$(function() {
        $(".modal").dialog({
            autoOpen: false,
            closeText: '',
            resizable: false,
			modal: true,
			show: "fade",
			hide: "fade",
            width: 'auto',//700,
			height: 'auto'//392
        });
 });
        $('#media_galery').live('click',function()
        {
        	

        	var _document = $('body');

            //$(".modal").dialog('open');
            
            _document.addClass('scroll_none');
            
            _document.keydown(function (event) {
             if( event.which  == 27  )
             {
             _document.removeClass('scroll_none').removeAttr('class');
             }
     		});//======== FUNCTION 
     	
	     	$(document).bind('click', function(e) {
			var $clicked = $(e.target);
			if ( !$clicked.parents("#cboxContent") )
			{
				_document.removeClass('scroll_none').removeAttr('class');
			}
		  });
	
     	$('#cboxClose').click(function(){
     		_document.removeClass('scroll_none').removeAttr('class');
     	  });//<----
            return false;
        });
	

	
	//==================== EXPAND ========================//
	$('a.expand').live('click',function()
	{
		$(this).addClass('activeSpan');
		$(this).parent().find('.details-post').slideDown(); 
		$(this).parents('li').find('.grid-reply').slideDown(); 
		$(this).parents('li').find('.spanReply').slideDown();		
		$(this).parent().find('.textEx').html('Hide'); 
		$(this).removeClass('expand');
		
		if( $(this).hasClass( 'reply' ) )
		{
			$(this).parent().find('#reply_post').focus();
		}
	});
	
	$('a.activeSpan').live('click',function()
	{
		
		$(this).addClass('expand');
		$(this).parent().find('.details-post').slideUp();
		$(this).parents('li').find('.grid-reply').slideUp();
		$(this).parents('li').find('.spanReply').slideUp(); 
		$(this).parent().find('.textEx').html('Expand'); 
		$(this).removeClass('activeSpan');
	});
	
	$('.optionsUser > li:last').css({'border':'none'});
	
	//========== EXPAND REPLY
	$('.sendMessage').click(function()
	{
		var element      = $(this);
		var _thisUser    = $(this).attr('data-username');
		var id_user     = $(this).attr( 'data-id' );
		var _document    = $('body');
		
		$('#boxSettings').slideUp(1);
		$('.settings_user').removeClass('activeClass');
		
		$('.ui-dialog-title').html( ' Send message to &rsaquo; @' + _thisUser );
		$('#content_modal').html('<div id="grid_post"> <form action="" method="post" accept-charset="UTF-8" id="send_msg_profile"><input type="hidden" name="id_user" id="id_user" value="'+id_user+'" /><textarea name="message" id="message"></textarea> <button id="button_message" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Send message</button> <div data-max="140" id="counter"></div> </form> <span class="notfound" style="display:none; width: 500px; padding: 0; overflow: hidden; text-align: center;"></span></div><!-- grid_post -->');
			
		
		$(".modal").dialog('open');
                 
            _document.addClass('scroll_none');
            
            _document.keydown(function (event) {
             if( event.which  == 27  )
             {
             	$('.ui-dialog-title').html('');
             	_document.removeClass('scroll_none').removeAttr('class');
             }
     		});//======== FUNCTION 
     	
	     	$(document).bind('click', function(e) {
			var $clicked = $(e.target);
			if ( !$clicked.parents().hasClass("ui-dialog") && !$clicked.hasClass("ui-dialog") )
			{
				$(".modal").dialog('close');
				$('.ui-dialog-title').html('');
				_document.removeClass('scroll_none').removeAttr('class');
			}
		  });
		  
		  $('.ui-dialog-titlebar-close').click(function(){
		  	$('.ui-dialog-title').html('');
     		_document.removeClass('scroll_none').removeAttr('class');
     	  });//<----
            
     	  return false;
	});
	
			/*=============== SEND REPLY ===================*/	
			$('#button_reply').live('click',function(s){
				
				s.preventDefault();
				
				var element     = $(this);
				var error       = false;
				var _reply_post = element.parents('li').find('#reply_post').val();
				
				if( _reply_post == '' && trim( _reply_post ).length  == 0 ){
					var error = true;
					return false;
				}
				

				if( error == false ){
					element.parents('li').find('#button_reply').attr({'disabled' : 'true'}).html('Sending...').css({'opacity':'0.5','cursor':'default'});
					
					$.post("public/ajax/replyPost.php", element.parents('li').find("#form_reply_post").serialize(), function(msg){
						
						if( msg.length != 0 ){
							element.parents('li').find( '.grid-reply' ).before( msg );
							 jQuery("span.timeAgo").timeago();
							 element.parents('li').find('#reply_post').val('');
							 element.parents('li').find('#button_reply').html('Reply');
						}
						else
						{
							$('.popout').html('Error occurred').fadeIn(500).delay(4000).fadeOut();
						}
					});//<-- END DE $POST AJAX
				}//<-- END ERROR == FALSE
			});//<<<-------- * END FUNCTION CLICK * ---->>>>
			
			
			/*=============== SEND REPLY ===================*/	
			$('#button-reply-status').click(function(s){
				
				s.preventDefault();
				
				var element     = $(this);
				var error       = false;
				var _reply_post = $('#reply_post').val();
				
				if( _reply_post == '' && trim( _reply_post ).length  == 0 ){
					var error = true;
					return false;
				}
				

				if( error == false ){
					$('#button-reply-status').attr({'disabled' : 'true'}).html('Sending...').css({'opacity':'0.5','cursor':'default'});
					
					$.post("public/ajax/replyPost.php", $("#form_reply_post").serialize(), function(msg){
						
						if( msg.length != 0 ){
							$( msg ).hide().appendTo('#reply-status-wrap').fadeIn( 500 );
							 jQuery("span.timeAgo").timeago();
							 $('#reply_post').val('');
							 $('#button-reply-status').html('Reply');
						}
						else
						{
							$('#button-reply-status').attr({'disabled' : 'true'});
							$('.popout').html('Error occurred').fadeIn(500).delay(4000).fadeOut();
						}
					});//<-- END DE $POST AJAX
				}//<-- END ERROR == FALSE
			});//<<<-------- * END FUNCTION CLICK * ---->>>>
			
			
			$('#button_message').live('click',function(s){
				s.preventDefault();
				
				var element     = $(this);
				var error       = false;
				var _message    = $('#message').val();
				
				if( _message == '' && trim( _message ).length  == 0 )
				{
					var error = true;
					return false;
				}
				

				if( error == false ){
					$('#button_message').attr({'disabled' : 'true'}).html('Sending...').css({'opacity':'0.5','cursor':'default'});
					
					$.post("public/ajax/send_message.php", $("#send_msg_profile").serialize(), function(msg){
						
						if( msg.length != 0 ){
							 $('#message').val('');
							 $('#button_message').html('Send message');
							 $(".modal").dialog('close');
							 $('.popout').html('Successfully sent').fadeIn(500).delay(4000).fadeOut();
							 $('body').removeClass('scroll_none').removeAttr('class');
						}
						else
						{
							$('.popout').html('Error occurred').fadeIn(500).delay(4000).fadeOut();
						}
						
					});//<-- END DE $POST AJAX
				}//<-- END ERROR == FALSE
			});//<<<-------- * END FUNCTION CLICK * ---->>>>
			
			
	//=========== ADD POST
	$('textarea#add_post').keyup(function(){
		
		var $allowed = $('body').attr('data-max');
		var _videoLink = $('input#video_link').val();
		var _photoId   = $('input#photoId').val();
		
		if ( trim( $(this).val() ).length >= 1 && trim( $(this).val() ).length <= $allowed  )
		{
			$('#button_add').removeAttr('disabled').css({'opacity':'1','cursor':'pointer'});
			return false;
		}
		else if( trim( $(this).val() ).length == 0 && _videoLink.length != 0 || _photoId.length != 0 )
		{
			$('#button_add').removeAttr('disabled').css({'opacity':'1','cursor':'pointer'});
			return false;
		}
		else
		{
			$('#button_add').attr({'disabled' : 'true'}).css({'opacity':'0.5','cursor':'default'});
			return false;
		}
	});
	
	//=========== REPLY POST
	$('textarea#reply_post, textarea#reply_msg').live('keyup',function(){
		
		var $allowed   = $('body').attr('data-max');
		
		if ( trim( $(this).val() ).length >= 1 && trim( $(this).val() ).length <= $allowed )
		{
			$(this).parent().find('#button_reply, #button-reply-status, #button-reply-msg').removeAttr('disabled').css({'opacity':'1','cursor':'pointer'});
			return false;
		}
		else
		{
			$(this).parent().find('#button_reply, #button-reply-status, #button-reply-msg').attr({'disabled' : 'true'}).css({'opacity':'0.5','cursor':'default'});
			return false;
		}
	});
	
	//=========== MESSAGE
	$('textarea#message').live('keyup',function(){
		
		var $allowed   = $('body').attr('data-max');
		
		if ( trim( $(this).val() ).length >= 1 && trim( $(this).val() ).length <= $allowed )
		{
			$(this).parent().find('#button_message').removeAttr('disabled').css({'opacity':'1','cursor':'pointer'});
			return false;
		}
		else
		{
			$(this).parent().find('#button_message').attr({'disabled' : 'true'}).css({'opacity':'0.5','cursor':'default'});
			return false;
		}
	});
	
	function isValidURL(url){
    	var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

	    if(RegExp.test(url)){
	        return true;
	    }else{
	        return false;
	    }
	    }
	    
	    var $thtml = $('#add_post').html();
	//=========== VIDEO TRUE
	$('input#video_link').live('keyup',function(){
		
		var value = $(this).val();
		
		if ( trim( $(this).val() ).length != 0 && isValidURL($(this).val()) )
		{
			
			$('#button_add').removeAttr('disabled').css({'opacity':'1','cursor':'pointer'});
			$(value).appendTo( '#add_post' );
			return false;
		}
		else
		{
			$('#button_add').attr({'disabled' : 'true'}).css({'opacity':'0.5','cursor':'default'});
			return false;
		}
	});

//============= VIDEO
//========== EXPAND
	$('div.video_post').click(function()
	{
		$("#video_link").each(function() {
        _display = $(this).css("display");
        
        if( _display == "block") {
          $(this).slideUp('fast',function() {
           $(this).css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
			$("#video_link").focus();
          });
        }
      });
		//$('#video_link').fadeIn( 1000 );
	});
	
   $('textarea#add_post, #reply_post, #reply_msg').live('click',function(){
   	
   		$(this).animate({ height:100},{ duration: 200, easing: 'easeOutQuart' });
   	
   });
   
   $(document).bind('click', function(e) 
   {
			var $clicked = $(e.target);
			var $data    = $('#add_post').val();
			if ( !$clicked.parents().hasClass("post_add") && !$clicked.hasClass("post_add") && $data == 0 )
			{
				$('textarea#add_post').animate({ height:30},{ duration: 150, easing: 'easeInQuart' });
			}
		  });
		  

$(document).ready(function(){
	
	/*= DELETE POST =*/
	$(".trash").live('click',function(){
	var element   = $(this);
	var id        = element.attr("data");
	var token_id  = element.attr("data-token");
	var image     = element.attr("data-image");
	var info      = 'id=' + id + '&token=' + token_id + '&image=' + image;
	
	jConfirm("Sure you want to delete this post? ", 'Confirm', function( r ){
	
	     if( r == true )
	     {
	
		 $.ajax({
		   type: "POST",
		   url: "public/ajax/delete_post.php",
		   data: info,
		   success: function( result ){
		   if( result == 'true' )
		   { 
		   	element.parents('li').fadeTo(200,0.00, function(){
   		        element.parents('li').slideUp(200, function(){
   		  	     element.parents('li').remove();
   		       });
   		      });
		   }//<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 }//END IF R TRUE 
	 
	  }); //Jconfirm  
	      
});//<--- Click
	  
	  /*= DELETE POST =*/
	$(".trashStatus").click(function(){
	var element   = $(this);
	var id        = element.attr("data");
	var token_id  = element.attr("data-token");
	var image     = element.attr("data-image");
	var info      = 'id=' + id + '&token=' + token_id + '&image=' + image;
	var url       = $('.detail_top > a').attr('href');
	
	jConfirm("Sure you want to delete this post? ", 'Confirm', function( r ){
	
	     if( r == true )
	     {
	
		 $.ajax({
		   type: "POST",
		   url: "public/ajax/delete_post.php",
		   data: info,
		   success: function( result ){
		   if( result == 'true' )
		   { 
		   	  window.location.href = url;
		   }//<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 }//END IF R TRUE 
	 
	  }); //Jconfirm  
	      
});//<--- Click
	  
	  /*= ADD_FAV =*/
	$(".favorite").live('click',function(){
	var element   = $(this);
	var id        = element.attr("data");
	var token_id  = element.attr("data-token");
	var info      = 'id=' + id + '&token=' + token_id;
	var timeQuery = 1000;
	
	element.removeClass( 'favorite' );
	$('.popout').html('Wait...').fadeIn();
	
	setTimeout(function(){
		
		 $.ajax({
		   type: "GET",
		   url: "public/ajax/favorites.php",
		   data: info,
		   success: function( result ){
		   if( result == '1' )
		   { 
		   	 element.addClass( 'favorite' );
		   	 $('.popout').html('Successfully added.').fadeIn().delay(2500).fadeOut();
		   	  element.find('i').addClass('iconfavorited');
		   	  element.find('span').addClass('favorited');
		   	  element.find('span').html('Favorited');
		   	  element.parents('li').append('<span class="add_fav"></span>');
		   	  $('.statusProfile').append('<span class="add_fav"></span>');
		   	 
		   }
		   else if(  result == '2' )
		   {
		   	element.addClass( 'favorite' );
		   	$('.popout').html('Successfully deleted.').fadeIn().delay(2500).fadeOut();
		   	 element.find('i').removeClass('iconfavorited');
		   	  element.find('span').removeClass('favorited');
		   	  element.parents('li').find('.add_fav').remove();
		   	  element.find('span').html('Favorite');
		   	  $('.statusProfile').find('.add_fav').remove();
		   }
		   
		   else if(  result == '3' )
		   {
		   	element.addClass( 'favorite' );
		   	$('.popout').html( 'Successfully added.' ).fadeIn().delay(2500).fadeOut();
		   	element.find('i').addClass('iconfavorited');
		   	  element.find('span').addClass('favorited');
		   	   element.find('span').html('Favorited');
		   	    element.parents('li').append('<span class="add_fav"></span>');
		   	     $('.statusProfile').append('<span class="add_fav"></span>');
		   	
		   }
		   //<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   	 $('.popout').fadeOut();
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 
	},timeQuery );
	      
});//<----- CLICK

    /*= FOLLOW =*/
	$(".whofollow").live('click',function(){
	var element   = $(this);
	var id        = element.attr("data-id");
	var username  = element.attr('data-username');
	var info      = 'id=' + id;
	var timeQuery = 1000;
	
	element.removeClass( 'whofollow' );
	$('.popout').html('Wait...').fadeIn();
	
	setTimeout(function(){
		
		 $.ajax({
		   type: "POST",
		   url: "public/ajax/follow.php",
		   data: info,
		   success: function( result ){
		   if( result == '1' )
		   { 
		   	 element.addClass( 'whofollow' );
		   	 $('.popout').html('Following @' + username ).fadeIn().delay(2500).fadeOut();
		   	 element.html('Following to @' + username );
		   }
		   else if(  result == '2' )
		   {
		   	 element.addClass( 'whofollow' );
		   	 $('.popout').html('Unfollow success').fadeIn().delay(2500).fadeOut();
		     element.html('Follow @' + username );
		   }
		   else if(  result == '3' )
		   {
		   	 element.addClass( 'whofollow' );
		   	 $('.popout').html( 'Following to @' + username ).fadeIn().delay(2500).fadeOut();
		   	 element.html('Following @' + username );
		   }
		   //<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   	 $('.popout').fadeOut();
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 
	},timeQuery );
	      
});//<----- CLICK
	  
	  $('.getData').live('click',function(){
	  	
	  	
	  	var element = $(this);
	  	element.removeClass( 'getData' );
	  	$postId     = element.attr('data');
	  	$tokenId    = element.attr('data-token');
	  	$data       = 'postId='+ $postId +'&token=' + $tokenId;
	  	
	  	$.ajax({ 
	  		  
	  		  type     : 'GET',
	  		  url      : 'public/ajax/getData.php',
	  		  dataType : 'json',
	  		  data     : $data
	  		  }).done( function( data )
	  		  { 
	  		  	if( data )
	  		  	{
	  				
	  		  		 element.removeAttr('data').removeAttr('data-token');
	  		  		//<--- PHOTOS Y FAVORITOS ----->
	  		  		if( data.media != '' )
	  		  		{
	  		  			element.parents('li').find( '.details-post' ).append( data.media );
	  		  		}
	  		  		if( data.replys != '' )
	  		  		{
	  		  			var total_data_reply = data.replys.length;
						
						for( var i = 0; i < total_data_reply; i++ )
							{
								element.parents('li').find( '.details-post' ).after( data.replys[i] );
							}
							
							jQuery("span.timeAgo").timeago();
	  		  		}
	  		  		if( data.favs != '' )
	  		  		{
	  		  			var total_data = data.favs.length;
						
						for(var i = 0; i < total_data; i++ )
							{
								element.parents('li').find( '.favs_title' ).after( data.favs[i] );
								
							}
	  		  			
	  		  		}
	  		  		
	  		  	}
	  		  	});//<--- Done
	  		  	
	  		  //<---- * end ajax * ---->
	  	 });//<---- * end click * ---->
	  	 
	  	 //<---------- * Remove Reply * ---------->
	  	 $('.removeReply').live('click',function(){
	  	 	
	  	 	var element = $(this);
	  	 	var data    = element.attr('data');
	  	 	var query   = '_replyId='+data;
	  	 	
	  	 	$.ajax({
	  	 		type : 'GET',
	  	 		url  : urlbase+'public/ajax/delete_reply.php',
	  	 		data : query,
	  	 		
	  	 	}).done(function( result ){
	  	 		
	  	 		if( result == 1 )
	  	 		{
	  	 			element.parents('span.spanReply').fadeTo( 200,0.00, function(){
   		             element.parents('span.spanReply').slideUp( 200, function(){
   		  	           element.parents('span.spanReply').remove();
   		              });
   		           });
	  	 		}
	  	 		else
	  	 		{
	  	 			element.removeClass('removeReply');
	  	 			return false;
	  	 		}
	  	 		
	  	 	});//<--- Done
	  	 	
	  	 });//<---- * end click * ---->
	  	 
	  	  //<---------- * Remove Reply * ---------->
	  	 $('.removeMsg').live('click',function(){
	  	 	
	  	 	var element = $(this);
	  	 	var data    = element.attr('data');
	  	 	var query   = '_msgId='+data;
	  	 	
	  	 	$.ajax({
	  	 		type : 'POST',
	  	 		url  : urlbase+'public/ajax/delete_msg.php',
	  	 		data : query,
	  	 		
	  	 	}).done(function( result ){
	  	 		
	  	 		if( result == 1 )
	  	 		{
	  	 			element.parents('li').fadeTo( 200,0.00, function(){
   		             element.parents('li').slideUp( 200, function(){
   		  	           element.parents('li').remove();
   		              });
   		           });
	  	 		}
	  	 		else
	  	 		{
	  	 			element.removeClass('removeMsg');
	  	 			return false;
	  	 		}
	  	 		
	  	 	});//<--- Done
	  	 	
	  	 });//<---- * end click * ---->
	  	 
	//<<<--- * Report Post ---->>>>/
	$(".reportPost").live('click',function(){
	var element   = $(this);
	var id        = element.attr("data");
	var token     = element.attr('data-token');
	var info      = '_postId=' + id+'&_token='+token;
	var timeQuery = 1000;
	
	element.removeClass( 'reportPost' );
	$('.popout').html('Wait...').fadeIn();
	
	setTimeout(function(){
		
		 $.ajax({
		   type: "POST",
		   url: "public/ajax/report_post.php",
		   data: info,
		   success: function( result ){
		   	
		   if( result == '1' )
		   { 
		   	 $('.popout').html('Successfully reported').fadeIn().delay(2500).fadeOut();
		   }
		   else if(  result == '2' )
		   {
		   	 $('.popout').html('Error occurred').fadeIn().delay(2500).fadeOut();
		   }
		   else if(  result == '3' )
		   {
		   	 $('.popout').html( '¡Already reported!' ).fadeIn().delay(2500).fadeOut();
		   }
		   //<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   	 $('.popout').fadeOut();
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 
	},timeQuery );
	      
});//<----- CLICK

//<<<--- * Report User ---->>>>/
	$(".report_user_spam").live('click',function(){
	var element   = $(this);
	var id        = element.attr("data-id");
	var info      = '_userId=' + id;
	var timeQuery = 1000;
	
	element.removeClass( 'report_user_spam' );
	$('.popout').html('Wait...').fadeIn();
	
	setTimeout(function(){
		
		 $.ajax({
		   type: "POST",
		   url: "public/ajax/report_user.php",
		   data: info,
		   success: function( result ){
		   	
		   if( result == '1' )
		   { 
		   	 $('.popout').html('Successfully reported').fadeIn().delay(2500).fadeOut();
		   }
		   else if(  result == '2' )
		   {
		   	 $('.popout').html('Error occurred').fadeIn().delay(2500).fadeOut();
		   }
		   else if(  result == '3' )
		   {
		   	 $('.popout').html( '¡Already reported!' ).fadeIn().delay(2500).fadeOut();
		   }
		   //<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   	 $('.popout').fadeOut();
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 
	},timeQuery );
	      
});//<----- CLICK

//<<<--- * Block User ---->>>>/
	$(".block_user_id").live('click',function(){
	var element   = $(this);
	var id        = element.attr("data-id");
	var info      = '_userId=' + id;
	var timeQuery = 1000;
	
	element.removeClass( 'block_user_id' );
	$('.popout').html('Wait...').fadeIn();
	
	setTimeout(function(){
		
		 $.ajax({
		   type: "POST",
		   url: "public/ajax/block_user.php",
		   data: info,
		   success: function( result ){
		   	
		   if( result == '1' )
		   { 
		   	 $('.popout').html('Successfully Blocked').fadeIn().delay(2500).fadeOut();
		   	  window.location.reload();
		   }
		   else if(  result == '2' )
		   {
		   	 $('.popout').html('Unlocked success').fadeIn().delay(2500).fadeOut();
		   	 window.location.reload();
		   }
		   else if(  result == '3' )
		   {
		   	 $('.popout').html( 'Successfully Blocked' ).fadeIn().delay(2500).fadeOut();
		   	 window.location.reload();
		   }
		   //<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   	 $('.popout').fadeOut();
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 
	},timeQuery );
	      
});//<----- CLICK


/*= FOLLOW =*/
	$(".followBtn").live('click',function(){
	var element   = $(this);
	var id        = element.attr("data-id");
	var username  = element.attr("data-username");
	var info      = 'id=' + id;
	var timeQuery = 1000;
	
	element.removeClass( 'followBtn' );
	$('.popout').html('Wait...').fadeIn();
	
	setTimeout(function(){
		
		 $.ajax({
		   type: "POST",
		   url: "public/ajax/follow.php",
		   data: info,
		   success: function( result ){
		   if( result == '1' )
		   { 
		   	 element.addClass( 'followBtn follow_active' );
		   	 $('.popout').html('Following @' + username ).fadeIn().delay(2500).fadeOut();
		   	  element.html('Following' );
		   }
		   else if(  result == '2' )
		   {
		   	 element.addClass( 'followBtn' );
		   	 $('.popout').html('Unfollow success').fadeIn().delay(2500).fadeOut();
		   	  element.removeClass( 'follow_active unfollow_button' );
		   	  element.html('Follow' );
		   }
		   else if(  result == '3' )
		   {
		   	 element.addClass( 'followBtn' );
		   	 $('.popout').html( 'Following to @' + username ).fadeIn().delay(2500).fadeOut();
		   	  element.addClass( 'follow_active' );
		   	  element.html('Following' );
		   }
		   //<-- IF
			   else
			   {
			   	 jAlert('Error occurred');
			   	 window.location.reload();
			   	 $('.popout').fadeOut();
			   }
		 }//<-- RESULT 
	   });//<--- AJAX

	 
	},timeQuery );
	      
});//<----- CLICK
		
		//<--------- * See MSG * ------>
		$('.see_msg').live('click',function(e){
			
			e.preventDefault();
			
			var _this     = $(this);
			var id        = _this.attr("data");
			var info      = '_userId=' + id;
			var titleInit = $('.titleBar').attr('data-title');
			var username  = _this.parents('li').find('.usernameClass').html();
			
			$('.titleBar').html('<a href="'+urlbase+'messages/">'+titleInit+'</a> &rsaquo; ' + username);
			
			 $('.posts').html('');
			 
			 $.ajax({
			   type: "POST",
			   url: "public/ajax/get_message_id.php",
			   data: info,
			   success: function( result ){
			   if( result.length > 1 )
			   { 
			   	 $('.posts').append(result);
			   	 $('<span class="spanStatus replyStatus" style="border: none; padding-top: 0;"> <div class="grid-reply"> <form action="" method="post" accept-charset="UTF-8" id="form_reply_post"> <input type="hidden" name="id_reply" id="id_reply" value="'+id+'"> <textarea name="reply_msg" id="reply_msg"></textarea><div class="counter"></div> <div class="counter"></div> <button id="button-reply-msg" disabled="disabled" style="opacity: 0.5; cursor: default;" type="submit">Reply</button> </form> </div> </span>').insertAfter('.posts');
			   	 
			   	 jQuery("span.timeAgo").timeago();
			   	 
			   	 var _numElement =  $('.posts > li').length;
			   	 if( _numElement > 5 )
			   	 {
			   	 	scrollElement( '#reply_msg' );
			   	 }
			   	    $('#reply_msg').focus();
			   }
			   //<-- IF
				   else
				   {
				   	 jAlert('Error occurred');
				   	 setTimeout(function(){
				   	 	window.location.reload();
				   	 },1000);
				    	 
				   	 $('.popout').fadeOut();
				   }
			 }//<-- RESULT 
		   });//<--- AJAX
			});
	  
	  
	  $('#button-reply-msg').live('click',function(s){
				s.preventDefault();
				
				var element     = $(this);
				var error       = false;
				var _message    = $('#reply_msg').val();
				
				if( _message == '' && trim( _message ).length  == 0 )
				{
					var error = true;
					return false;
				}
				

				if( error == false ){
					$('#button-reply-msg').attr({'disabled' : 'true'}).html('Sending...').css({'opacity':'0.5','cursor':'default'});
					
					$.post("public/ajax/send_message_id.php", $("#form_reply_post").serialize(), function(msg){
						
						if( msg.length != 0 ){
							$(msg).hide().appendTo('.posts').fadeIn( 800 );
							 $('#reply_msg').val('');
							 $('#button-reply-msg').html('Reply');
							 jQuery("span.timeAgo").timeago();
						}
						else
						{
							$('.popout').html('Error occurred').fadeIn(500).delay(4000).fadeOut();
						}
						
					});//<-- END DE $POST AJAX
				}//<-- END ERROR == FALSE
			});//<<<-------- * END FUNCTION CLICK * ---->>>>
	
});//<------------ * DOM * ------------>
