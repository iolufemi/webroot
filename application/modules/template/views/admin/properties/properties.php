
        <script src="<?php echo base_url(); ?>js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/table/table.js"></script>
    <script src="<?php echo base_url(); ?>js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
        
        <div class="grid_10">
            <div class="box round first fullpage">
                <h2>
                    Properties</h2>
                     <span class="headerlink"><?php echo anchor("properties/create","Add New"); ?></span>
                <div class="block ">
                <?php if(isset($alert_type)){
            
            $this->load->library('customhelper');
            
            if($alert_type == "error"){
                $this->customhelper->error($alert_message);
            }
            
            if($alert_type == "warning"){
                $this->customhelper->warning($alert_message);
            }
            
            if($alert_type == "info"){
                $this->customhelper->info($alert_message);
            }
            
            if($alert_type == "success"){
                $this->customhelper->success($alert_message);
            }
            
        } ?>
         <?php 
                    echo form_open('properties/search',array('name' => 'search', 'method' => 'post', 'style' => 'margin-right:20px;'));
                    echo form_label('Search: ');
                    echo form_input(array('name' => 'search'),@$search);
                    echo form_submit(array('class' => 'btn', 'name' => 'searchnow'),'Search');
                    echo form_close();
                     ?>
     <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
                            <!--<th>Number of Rooms</th>-->
                            <th>Price</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>User</th>
                            <th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
                    <?php 
                    $i = 0;
                    $ii = 1;
                    foreach($query->result() as $row){ ?>
						<tr class="<?php if($i == 0){echo "odd";}
                        if($i == 1){echo "even";} ?> gradeX">
							<td><?php echo $ii; ?></td>
							<td><?php echo anchor("properties/create/$row->id",$row->name,array('title' => 'Edit') );?></td>
							<!--<td><?php echo anchor("properties/create/$row->id",$row->no_of_rooms,array('title' => 'Edit') );?> </td>-->
	                         <td><?php echo anchor("properties/create/$row->id",$row->price,array('title' => 'Edit') );?> </td>  
                              
                             <?php 
                             $this->load->module('categories');
                             $statusq = $this->categories->read_by_id($row->category);
                              ?>
                             <td><?php 
                             foreach($statusq->result() as $stat_){ 
                                $status_ = $stat_->category;
                                }
                             echo anchor("properties/create/$row->id",$status_,array('title' => 'Edit') );
                             
                             ?> 
                             
                             </td>
                             <td><?php 
                             $this->load->module('locations');
                             $dbq = $this->locations->read_by_id($row->location);
                             foreach($dbq->result() as $resultr){
                                
                             
                             echo anchor("properties/create/$row->id",$resultr->location,array('title' => 'Edit') );
                             
                             }
                             ?> </td>
                             <td><?php 
                             $this->load->module('users');
                             $dbq = $this->users->read($row->user_id);
                             foreach($dbq->result() as $resultr){
                                
                             
                             echo $resultr->username;
                             
                             }
                             ?> </td>
                             
                               <td><a href="<?php echo base_url("/properties/delete/$row->id"); ?>" class="btn-mini btn-black btn-cross" title="Delete"><span></span>Delete</a></td>
                        </tr>
                        
                        <?php 
                        $ii++;
                        $i++;
                        if($i == 2){
                            unset($i);
                            $i = 0;
                        }
                        } ?>
					</tbody>
				</table>
                <p class="paginate"><?php echo @$pagination; ?></p>
                    
                    
        
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('form#register').validate();        
        </script>