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
				jqTds[0].innerHTML = '<input type="text" class="form-control small" required value="' + aData[0] + '">';
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

          
		 var oTable =$('#slab_table').dataTable({
		"aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
				
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-12'T><'col-lg-6'p>>",
				
				"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "script/slab-view.php",
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
				
					"oTableTools": {
            "aButtons": [
                {
					"sExtends": "pdf",
					"mColumns": [0, 1,2,3,4,5,6,7,8],
					"sPdfOrientation": "landscape",
					"sPdfMessage": "Slab Details"
				},
                {
					"sExtends": "xls",
					"mColumns": [0, 1,2,3,4,5,6,7,8],
				}
             ],
			"sSwfPath": "assets/data-tables/copy_csv_xls_pdf.swf"
		
		}
				
            });
			

           jQuery('#slab_table_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
           jQuery('#slab_table_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

           var nEditing = null;
		   
		   // for adding new department
		   
         $('#add').live('click',function (e){
		 e.preventDefault();
		if($("#slab_name").val() == '')
			{ alert("Enter Slab Name");}
			else
			{
			$.ajax( {
                    type: "POST",
                    url: "script/slab-add.php",
                    cache: false,
                    data: $("#form_slab_add").serialize(),
					success: function(data) {
						if(data == "success")
						{
						jQuery('#add-slab').toggle('hide');
						$("#form_slab_add")[0].reset();
						$('#add').prop('disabled', true);
						oTable.fnDraw();
						}
						else 	
						alert("Duplicate Entry for Slab Name");
						}
                    
                } );
			}
			});


            $('#slab_table a.delete').live('click', function (e) {
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
                        url: "script/slab-del.php",
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

            $('#slab_table a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#slab_table a.edit').live('click', function (e) {
                e.preventDefault();

                var nTr = $(this).parents('tr')[0];
				var aData = oTable.fnGetData( nTr );
                /* Get the row as a parent of the link that was clicked on */
               var jqTds = $('>td', nTr);
			   //alert(jqTds[0].innerText);
			   jQuery.ajax( {
                    dataType: 'json',
                    type: "POST",
                    url: "script/slab-fill.php",
                    cache: false,
                    data: 'slab_name=' + jqTds[0].innerText,
					success: function(data) {
						$('#form_slab_edit').loadJSON(data);
						}
                    
                } );
            });
			
			
			$('#form_slab_edit').on('submit',function(e) {
		e.preventDefault();
		jQuery.ajax( {
                    type: "POST",
                    url: $(this).attr("action"),
                    cache: false,
                    data: $(this).serialize(),
					success: function(data) {
						if(data == "success")
						{$('.close').click()
						alert("Updated");
						oTable.fnDraw();
						}
						else 	
						alert("Duplicate Entry for Slab Name");
						}
                    
                } );	
			
		});
 }

    };

}();