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

          $('#employee_table thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#employee_table tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#employee_table').dataTable( {
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
		"sAjaxSource": "script/employee-view.php",
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
                        { "bSortable": false},
                        { "sName": "emp_id"},
                        { "sName": "emp_name"},
						{ "sName": "desig"},
						{ "sName": "branch_loc"},
						{ "sName": "salary"},
						{ "sName": "doj"}
						
                    ],
					"oColVis": {
			"aiExclude": [ 0 ]
		},
					"oTableTools": {
            "aButtons": [
                {
					"sExtends": "pdf",
					"mColumns": [1,2,3,4,5,6],
					"sPdfOrientation": "landscape",
					"sPdfMessage": "Employee Details"
				},
                {
					"sExtends": "xls",
					"mColumns": [1,2,3,4,5,6],
				}
             ],
			"sSwfPath": "assets/data-tables/copy_csv_xls_pdf.swf"
		
		}
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#employee_table tbody td img').live('click', function () {
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
		 //for(i=0;i<30;i++){if(aData[i]=" "){aData[i]='-'}}
		  if(aData[19]='1'){aData[19]='Applied'}else{aData[19]='Not Applied'}
          var sOut = '<table width="100%" height="17%" border="0" cellspacing="0" cellpadding="5">';
          sOut += '<tr valign="top"><td width="7$"><b>DOB </b></td><td>'+aData[8]+'</td><td width="10%"><b>Address </b></td><td width="21%" height="9%">'+aData[11]+'<br>'+aData[20]+'<br>'+aData[21]+' '+aData[22]+'</td><td width="7%"><b>PF No </b></td><td>'+aData[15]+'</td><td width="11%"><b>Salary Slab </b></td><td width="11%">'+aData[18]+'</td></tr><tr>';
          sOut += '<tr valign="top"><td height="5%"><b>Mail ID </b></td><td width="14%">'+aData[9]+'</td><td><b>Job Status </b></td><td>'+aData[12]+'</td><td><b>ESI NO </b></td><td width="16%">'+aData[16]+'</td><td><b>PF Limit </b></td><td>'+aData[19]+'</td></tr>';
          sOut += '<tr valign="top"><td><b>Mobile </b></td><td>'+aData[10]+'</td><td><b>Bank A/C </b></td><td>'+aData[13]+' '+aData[14]+'</td><td><b>PAN No </b></td><td>'+aData[17]+'</td><td><p style="color:#D6D6D6"> '+aData[7]+'</p></td><td><a href="#edit_employee" class="edit" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a></td></tr>';
          sOut += '</table>';

          return sOut;
      }
		
		$('#employee_table a.edit').live('click', function (e) {
                e.preventDefault();
				var nTr = $(this).parents('tr')[0];
				var aData = oTable.fnGetData( nTr );
                /* Get the row as a parent of the link that was clicked on */
               var jqTds = $('>td', nTr);
			   jQuery.ajax( {
                    dataType: 'json',
                    type: "POST",
                    url: "script/employee-fill.php",
                    cache: false,
                    data: 'id=' + jqTds[6].innerText,
					success: function(data) {
						$('#employee_details').loadJSON(data);
						}
                    
                } );
			   
				});
				
		$('#employee_details').on('submit',function(e) {
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
						alert("Error on query");
						}
                    
                } );	
			
		});
			
 }

    };

}();