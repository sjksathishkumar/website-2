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

          $('#value_table thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#value_table tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#value_table').dataTable( {
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
		"sAjaxSource": "script/add_value.php",
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
                        { "sName": "value_id", "sWidth": "10%"},
                        { "sName": "question", "sWidth": "45%"},
						            { "sName": "user", "sWidth": "20%"},
						            { "sName": "date", "sWidth": "15%"}
						
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
          $('#value_table tbody td img').live('click', function () {
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
          sOut += '<tr valign="top"><td width="20%"><b>ID: </b>'+aData[1]+'</td><td width="60%"><b>Value Points : </b>'+aData[5]+'</td><td width="20%"><b>Status: </b>'+aData[6]+'</td></tr>';
          sOut += '<tr valign="top"><td></td><td width="60%"><b>Email: </b>'+aData[7]+'</td><td width="20%"><b>Notes: </b>'+aData[8]+'</td></tr>';
          sOut += '<tr valign="top"><td></td><td><a href="#edit_blog" class="edit" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a></td><td><a href="" class="delete" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Delete</button></a></td></tr>';
          sOut += '</table>';

          return sOut;
      }
    
   		
		$('#value_table a.edit').live('click', function (e) {
                e.preventDefault();
		var nTr = $(this).parents('tr')[1];
        //var nRow = $(this).parents('tr')[0];
        //var row_id =nTr.id;
        //var aData = oTable.fnGetData( nTr );
				//var aData = oTable.fnGetData( nTr );
                /* Get the row as a parent of the link that was clicked on */
               var jqTds = $('>td', nTr);
          //     alert(aData[2]);
               //console.log(jqTds[1]);
               //alert(jqTds[0].innerText);
               var value = jqTds[0].innerText;
               var final_data = value.substring(4, 7);
               //alert(final_data);
		    jQuery.ajax( {
                    dataType: 'json',
                    type: "POST",
                    url: "script/add_value_fill.php",
                    cache: false,
                    data: 'value_id=' + final_data,
					success: function(data) {
						$('#value_detail').loadJSON(data);
						}
                    
                } );
			   
				});

    $('#value_table a.delete').live('click', function (e) {
        e.preventDefault();
        if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }
        var nTr = $(this).parents('tr')[1];
        //var nRow = $(this).parents('tr')[0];
        //var row_id =nTr.id;
        //var aData = oTable.fnGetData( nTr );
        //var aData = oTable.fnGetData( nTr );
                /* Get the row as a parent of the link that was clicked on */
               var jqTds = $('>td', nTr);
          //     alert(aData[2]);
               //console.log(jqTds[1]);
               var value = jqTds[0].innerText;
               //alert(data);
               
               var final_data = value.substring(4, 7);
               //alert(final_data);
         jQuery.ajax( {
                    dataType: 'html',
                    type: "POST",
                    url: "script/value_delete.php",
                    cache: false,
                    data: 'value_id=' + final_data,
          success: function(data) {
            if(data == "success")
            {
            oTable.fnDeleteRow( nTr );    
            oTable.fnDraw();
            //alert("Updated");
            location.reload(true);
            }
            else  
            {
              location.reload(true);
            //alert("Error on query");
            }
             }       
                } );  
         
        });

				
		$('#value_detail').on('submit',function(e) {
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
              { 
              $('.close').click()	
  						alert("Error on query");
              oTable.fnDraw();
              }
						}
                    
                } );	
			
		});

  
			
 }

    };

}();
