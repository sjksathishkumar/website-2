var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {
         
		 

          // jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
          // jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

		   
		 



			var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '<img src="assets/advanced-datatable/examples/examples_support/details_open.png">';
          nCloneTd.className = "center";

          $('#kc_table thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#kc_table tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#kc_table').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']],
			  "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
				
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-12'T><'col-lg-6'p>>",
				
				"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "script/knowledge_view.php",
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
                        { "sName": "button", "bSortable": false, "sWidth": "5%"},
                        { "sName": "post_id", "sWidth": "10%"},
                        { "sName": "post_title", "sWidth": "45%"},
						            { "sName": "author", "sWidth": "20%"},
						            { "sName": "post_date", "sWidth": "15%"}
						
                    ],
					"oColVis": {
			"aiExclude": [ 0 ]
		},
					"oTableTools": {
            "aButtons": [
                
             ]
		
		}
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#kc_table tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
		  
		  
		  
	function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table width="100%" height="17%" border="0" cellspacing="0" cellpadding="5">';
          sOut += '<tr valign="top"><td width="10%"></td><td width="100%"><p align="center"><b>'+aData[2]+'</b></p></td></tr>';
          sOut += '<tr valign="top"><td width="10%"></td><td width="100%">'+aData[5]+'</td></tr>';
	  sOut += '<tr valign="top"><td></td><td><b>Category</b> - '+aData[3]+'</td></tr>';
          sOut += '<tr valign="top"><td><b>Ref ID - '+aData[1]+'</b></td><td><a href="#edit_blog" class="edit" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a></td><td><a href="" class="delete" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-trash-o"></i> Delete</button></a></td></tr>';
          sOut += '</table>';

          return sOut;
      }
    
   		
		$('#kc_table a.edit').live('click', function (e) {
                e.preventDefault();
		var nTr = $(this).parents('tr')[0];
		var jqTds = $('>td', nTr);
		var value = jqTds[0].innerText;
                var final_data = value.substring(8,12);
                alert(final_data);
		jQuery.ajax( {
                    dataType: 'json',
                    type: "POST",
                    url: "script/knowledge_fill.php",
                    cache: false,
                    data: 'id=' + final_data,
					success: function(data) {
						$('#update_knowledge').loadJSON(data);
						CKEDITOR.instances.kc_content.setData( data );
						}
                    
                } );
			   
		});
		

      		$('#kc_table a.delete').live('click', function (e) {
        	e.preventDefault();
		if (confirm("Are you sure to delete this row ?") == false) {
				    return;
			}
		var nTr = $(this).parents('tr')[0];
		var jqTds = $('>td', nTr);
		var value = jqTds[0].innerText;
                var id = value.substring(8, 12);
                //alert(id);
			    jQuery.ajax( {
				    dataType: 'html',
				    type: "POST",
				    url: "script/knowledge_delete.php",
				    cache: false,
				    data: 'id=' + id,
				    success: function(msg) {
					    if(msg == "success")
					    {
					    //alert("Deleted Successfully!");
					    //oTable.fnDeleteRow( nTr );    
					    oTable.fnDraw();
					    //location.reload(true);
					    }
					    else  
					    {
					      //location.reload(true);
					    //alert("Faild !");
					    oTable.fnDraw();
					    }
			     }       
		        } );  
				   
		});		


		$('#update_knowledge').on('submit',function(e) {
		e.preventDefault();
		var messageLength = CKEDITOR.instances['kc_content'].getData();
		if( !messageLength ) {
		    alert( 'Please Enter Contents!');
		}
		
		else
		{
			for (instance in CKEDITOR.instances) {
			    CKEDITOR.instances[instance].updateElement();
			}
			jQuery.ajax( {
		            type: "POST",
		            url: $(this).attr("action"),
		            cache: false,
		            data: $(this).serialize(),
		  	    success: function(msg) {
				    if(msg == "success")
				    {$('.close').click()
				    alert("Updated Successfully!");
				    oTable.fnDraw();
				    }
				    else  
				    alert("Failed to Update!");
			    }
		            
		    } );  	
		}
			
		});

      $('#add_knowledge').on('submit',function(e) {
    	e.preventDefault();
    /*jQuery.ajax( {
                    type: "POST",
                    url: $(this).attr("action"),
                    cache: false,
                    data: $(this).serialize(),
          success: function(msg) {
            if(msg == "success")
            {$('.close').click()
            alert("Post Published!");
            oTable.fnDraw();
            }
            else  
            alert("Publish Failed!");
            }
                    
            } );  
     //e.preventDefault(); */
	//var messageLength = CKEDITOR.instances['kc_content'].getData().replace(/<[^>]*>/gi, '').length;
	var messageLength = CKEDITOR.instances['kc_content'].getData();
	if( !messageLength ) {
            alert( 'Please Enter Contents!');
        }
	else
	{
		for (instance in CKEDITOR.instances) {
		    CKEDITOR.instances[instance].updateElement();
		}
		jQuery.ajax( {
                    type: "POST",
                    url: $(this).attr("action"),
                    cache: false,
                    data: $(this).serialize(),
          success: function(msg) {
            if(msg == "success")
            {$('.close').click()
            alert("Post Published!");
            oTable.fnDraw();
            }
            else  
            alert("Publish Failed!");
            }
                    
            } );  	
	}
    });
			
 }

    };

}();
