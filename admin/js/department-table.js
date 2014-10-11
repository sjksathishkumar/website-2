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
				//jqTds[0].innerHTML = '<input type="text" class="form-control small" required value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" class="form-control small" required value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[3].innerHTML = '<a class="cancel" href="">Cancel</a>';
				
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
				//alert(jqInputs[1].value);
                //oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[0].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 2, false);
                oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 3, false);
				var row_id = nRow.id;
                //alert(row_id);
				var mydata = 'id=' + row_id.substring(4,10) +
                    '&d_name=' +  jqInputs[0].value ;
                //alert(mydata);
					

                $.ajax( {
                    dataType: 'html',
                    type: "POST",
                    url: "script/department-update.php",
                    cache: false,
                    data: mydata,
                    success: function(data) {
						if(data == "success")
						{
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
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
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
		"sAjaxSource": "script/department-view.php",
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
                        { "sName": "dept_code"},
                        { "sName": "dept_name", "sClass": "center" },
                        { "bSortable": false },
                        { "bSortable": false }
                    ],
					"oTableTools": {
            "aButtons": [
                {
					"sExtends": "pdf",
					"mColumns": [0, 1],
					"sPdfMessage": "Department Details"
				},
                {
					"sExtends": "xls",
					"mColumns": [0, 1],
				}
             ],
			"sSwfPath": "assets/data-tables/copy_csv_xls_pdf.swf"
		
		}
				
            });
			

           jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
           jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

           var nEditing = null;
		   
		   // for adding new department
		   
         $('#add').live('click',function (e){
		 e.preventDefault();
			if($("#dname").val() == '')
			{ alert("Enter Department Name");}
			else
			{
			
			var d_name = $("#dname").val();
			var adddata ='d_name=' +  d_name;
			$.ajax( {
                    dataType: 'html',
                    type: "POST",
                    url: "script/department-add.php",
                    cache: false,
                    data: adddata,
					success: function(data) {
						if(data == "success")
						{
						jQuery('#add-department').toggle('hide');
						}
						else 	
						alert("Error on query");
						}
                    
                } );
			}
			});


            $('#editable-sample a.delete').live('click', function (e) {
                e.preventDefault();
				
                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }
				var nRow = $(this).parents('tr')[0];
				var row_id =nRow.id;
				var mydata = 'id=' +row_id.substring(4,10);
				$.ajax( {
                        dataType: 'html',
                        type: "POST",
                        url: "script/department-del.php",
                        cache: false,
                        data: mydata,
                        success: function(data) {
						if(data == "success")
						{
						oTable.fnDeleteRow( nRow );
                        oTable.fnDraw();
						alert("Deleted");
						}
						else 	
						alert("Error on query!");
					}
					  } ) ;
				
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

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {

                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
					nEditing = null;
                   // alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
 }

    };

}();