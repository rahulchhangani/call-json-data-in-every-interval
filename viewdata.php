<script>

$(document).ready(function(){
	setInterval(function() {
		$.ajax({ 
		type: 'POST',
		url: "<?php echo base_url();?>index.php/.../controller_function_name",
        async:true,
		cache:false,
		dataType: 'JSON',
        success: function(response){
			$('#display_table').empty();
			var tableData = "<thead>"
							+"<tr><th></th>"
							+"<th>Name</th>"
							+"<th>Departure On</th>"							
							+"<th>Status</th>"
							+"<th colspan=2 style='text-align:center;'>Action</th>"
						 +"</thead>";
			tableData = tableData.toUpperCase();	 
			var sno = 0;
			//alert(response);
			if(response.length != 0)
			{
				for (i in response){
						++sno;
						if(response[i]['status']!="0"){
						tableData += "<tr>"
									+"<td><center><img src=<?php echo base_url();?>"+response[i]['param_1']+" style='height:120px;'></center></td>"
									+"<td><center><h3>"+response[i]['param_2']+"</h3><h5>"+response[i]['param_3']+"</h5></center></td>"
									+"<th><center><h3>"+response[i]['param_4']+","+response[i]['param_5']+"</h3></center></th>"
									+"<td><center><div>&nbsp;</div><div class='list light-grey-xbg center-align-text'><h3 class='no-margin no-padding'>"+response[i]['param_6']+"</h3></div></td>"
									+"<td><center><div>&nbsp;</div><a href=<?php echo base_url();?>index.php/..../controller_function_name/"+response[i]['param_7']+"/0 class='btn btn-danger'>Action</a></center></td>"
									+"<td></td></tr>";									
						}else if(response[i]['status']=="1")
						{
						tableData += "<tr>"
									+"<td><center><img src=<?php echo base_url();?>"+response[i]['param_1']+" style='height:120px;'></center></td>"
									+"<td><center><h3>"+response[i]['param_2']+"</h3><h5>"+response[i]['param_3']+"</h5></center></td>"
									+"<th><center><h3>"+response[i]['param_4']+","+response[i]['param_5']+"</h3></center></th>"
									+"<td><center><div>&nbsp;</div><div class='list light-grey-xbg center-align-text'><h3 class='no-margin no-padding'>"+response[i]['param_6']+"</h3></div></td>"
									+"<td></td>"
									+"<td><center><div>&nbsp;</div><a href=<?php echo base_url();?>index.php/...../controller_function_name/"+response[i]['param_7']+"/1 class='btn btn-success'>Check In</a></center></td></tr>";
									//alert(response[i]['user_id']);	
						}
				}
				$("#display_table").empty().append(tableData);				
			}
        }});
	}, 3000);
  });
  
  </script>
  
  
 <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper-lg">
		<!-- Left Row starts -->
			
		<!-- Row Start -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="widget sales-overview">
                <div class="widget-body no-padding">

                <ul id="myTab" class="nav nav-tabs">
                      <li class="active"><a href="#automated" data-toggle="tab">Automated</a></li>                      
                    </ul>

                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade in active" id="automated">
                        <table class="table table-condensed table-striped table-bordered table-hover no-margin" id="display_table">
                        </table>
                      </div>
                     </div>

                </div>
              </div>
            </div>
          </div>
          <!-- Row End -->
				
