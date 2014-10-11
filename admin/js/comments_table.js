var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
				for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }
				oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
/*                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" class="form-control small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" class="form-control small" value="' + aData[3] + '">';*/
                jqTds[4].innerHTML = '<input type="text" class="form-control small" value="' + aData[4] + '">';
                jqTds[5].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[6].innerHTML = '<a class="cancel" href=""><button type="button" class="btn btn-danger">Cancel</button></a>';


				
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
//                alert(jqInputs[0].value);
               /* oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);*/
                oTable.fnUpdate(jqInputs[0].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 5, false);
                oTable.fnUpdate('<a class="delete" href=""><button type="button" class="btn btn-danger">Delete</button></a>', nRow, 6, false);
                oTable.fnDraw();
				var row_id = nRow.id;
                //alert(row_id);
                //alert(row_id);
				var mydata = 'comment_id=' + row_id.substring(4,10) +
                    '&status=' +  jqInputs[0].value ;
                //alert(mydata);
					

                $.ajax( {
                    dataType: 'html',
                    type: "POST",
                    url: "script/comment_update.php",
                    cache: false,
                    data: mydata,
                    success: function(data) {
						if(data == "success")
						{
                        oTable.fnDraw();
						alert("Updated");
						}
						else 	
						alert("Error on query");
					}
					
                } );
              // oTable.fnDraw();
			}

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                /*oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);*/
                //alert(jqInputs[0]);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 5, false);
                oTable.fnDraw();
            }

          
		 var oTable =$('#editable-sample').dataTable({
		"aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
				
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-12'T><'col-lg-6'p>>",
				
				"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "script/comments_view.php",
		"sServerMethod": "POST",
	  
         "sPaginationType": "bootstrap",
         "oLanguage": {
         "sLengthMenu": "_MENU_ records per page",
          "oPaginate": {
          "sPrevious": "Prev",
          "sNext": "Next"
                    }
                },
		"oColReorder": {
                        "iFixedColumns": 1
                    },
		"aoColumns": [                           //Row control
                        { "sName": "comment_id", "bSortable": false, "sWidth": "10%"},
                        { "sName": "post_title", "sClass": "center", "sWidth": "30%" },
                        { "sName": "comment_id", "bSortable": false, "sWidth": "25%"},
                        { "sName": "author", "bSortable": false, "sWidth": "10%"},
                        { "sName": "status", "sWidth": "10%"},
                        { "sName": "edit", "bSortable": false, "sWidth": "7%" },
                        { "sName": "delete", "bSortable": false, "sWidth": "7%" }
                    ],
		"oTableTools": {
        "aButtons": [
                
             ]
		
		}
				
            });
			

           jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
           jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

           var nEditing = null;
		   

		
            $('#editable-sample a.delete').live('click', function (e) {
                e.preventDefault();
				
                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }
				var nRow = $(this).parents('tr')[0];
				var row_id =nRow.id;
                //alert(row_id);
				var mydata = 'comment_id=' +row_id.substring(4,10);
                //alert(mydata);
				$.ajax( {

                        dataType: 'html',
                        type: "POST",
                        url: "script/comment_delete.php",
                        cache: false,
                        data: mydata,
                        success: function(data) {
                            if(data == "success")
                            {
                            oTable.fnDeleteRow( nRow );    
                            oTable.fnDraw();
                            alert("Deleted!");
                            }
                            else    
                            alert("Error on query");
                        } 

                     /*   dataType: 'html',
                        type: "POST",
                        url: "script/comment_delete.php",
                        cache: false,
                        data: mydata,
                        success: function(data) {
						if(data == "success")
						{
						oTable.fnDeleteRow( nRow );
                        
						alert("Deleted");
						}
						else 	
						alert("Error on query!");

					}*/
					  } ) ;
                    oTable.fnDraw();
				
                	});

            $('#editable-sample a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

           $('#editable-sample a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];
                var row_id =nRow.id;
                //alert(row_id);

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
 }

    };

}();