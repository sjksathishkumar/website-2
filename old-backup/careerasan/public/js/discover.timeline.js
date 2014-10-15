//<----- Title
function TimeLine()
{	
	var param = /^[0-9]+$/i;
	var _FirstId  = $('li.hoverList:first').attr('data');
	var _list    = $('.content').html();
	
	if( !param.test( _FirstId ) )
	{
		return false;
	}
	
	if( _list != '' )
	{
		$.get("public/ajax/timeline.discover.php", { since_id:_FirstId }, function( data ){	
		if ( data )
		{
			
			var total_data = data.posts.length;
			
			for( var i = 0; i < total_data; i++ )
				{
					$( data.posts[i] ).hide().prependTo( '.posts' ).fadeIn( 500 );
				}
						
					jQuery("span.timeAgo").timeago();				
		   }//<-- DATA
	     	
		},'json');
	}//<<<-- _List
}//End Function TimeLine
	
timer = setInterval("TimeLine()", 10000);
