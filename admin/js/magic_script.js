$(function() {

    $('#tag').magicSuggest({
        data: 'script/get_tags.php',
        valueField: 'tag_id',
        displayField: 'tag_name'
    });


    $('#tags').magicSuggest({
        data: 'script/get_tags.php',
        valueField: 'tag_id',
        displayField: 'tag_name'
    });
	
});
