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

          $('#enquiry_table thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#enquiry_table tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#enquiry_table').dataTable( {
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
    "sAjaxSource": "script/contact_view.php",
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
                        { "sName": "post_id", "sWidth": "7%"},
                        { "sName": "post_title", "sWidth": "20%"},
                        { "sName": "author", "sWidth": "20%"},
                        { "sName": "post_date"},
                        { "sName": "post_da"},
                        { "sName": "post_dat"} 
            
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
          $('#enquiry_table tbody td img').live('click', function () {
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
              sOut += '<tr valign="top"><td width="5%"></td><td width="95%"><b>Description : </b>'+aData[8]+'</td></tr>';
              sOut += '<tr valign="top"><td width="5%"></td><td width="95%"><b>Address : </b>'+aData[7]+'</td></tr>';
              sOut += '<tr valign="top"><td width="5%"></td><td width="95%"><b>Email : </b>'+aData[9]+'</td></tr>';
              sOut += '<tr valign="top"><td width="10%">Ref ID : '+aData[1]+'</td><td><a href="#edit_enquiry" class="edit" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</button></a></td><td><a href="" class="delete" data-toggle="modal"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Delete</button></a></td></tr>';
              sOut += '</table>';
              return sOut;
          }
    
      
    $('#enquiry_table a.edit').live('click', function (e) {
    e.preventDefault();
    var nTr = $(this).parents('tr')[0];
    var jqTds = $('>td', nTr);
    var value = jqTds[0].innerText;
    var id = value.substring(9, 12);
       jQuery.ajax( {
                    dataType: 'json',
                    type: "POST",
                    url: "script/contact_fill.php",
                    cache: false,
                    data: 'id=' + id,
            success: function(data) {
            $('#enquiry_detail').loadJSON(data);
            }
                    
                  } );
       
    });


    $('#enquiry_table a.delete').live('click', function (e) {
          e.preventDefault();
    if (confirm("Are you sure to delete this row ?") == false) {
            return;
      }
    var nTr = $(this).parents('tr')[0];
    var jqTds = $('>td', nTr);
    var value = jqTds[0].innerText;
    var id = value.substring(9, 12);
          jQuery.ajax( {
            dataType: 'html',
            type: "POST",
            url: "script/contact_delete.php",
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


        
    $('#enquiry_detail').on('submit',function(e) {
      e.preventDefault();
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
      
    });

      $('#new_post_detail').on('submit',function(e) {
      e.preventDefault();
  var messageLength = CKEDITOR.instances['post_content'].getData();
  if( !messageLength ) {
            alert( 'Please Enter Contents!');
        }
  else
  {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    var formData = new FormData($("#new_post_detail")[0]);
    jQuery.ajax( {
                    type: "POST",
                    url: $(this).attr("action"),
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                success: function(msg) {
          if(msg == "success")
          {$('.close').click()
          alert("Post Published!");
          oTable.fnDraw();
          }
          else if(msg == 'empty')
          {
            alert("Please Enter Tag !");
          }
          else if(msg == 'file')
          {
            alert("Please Select valid File !");
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