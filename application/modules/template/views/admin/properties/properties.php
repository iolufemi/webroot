
        
        <div class="grid_10">
            <div class="box round first fullpage">
                <h2>
                    Properties</h2>
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
                            <th>Number of Rooms</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Location</th>
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
							<td><?php echo anchor("users/register/$row->id",$row->firstname,array('title' => 'Edit') );?></td>
							<td><?php echo anchor("users/register/$row->id",$row->lastname,array('title' => 'Edit') );?> </td>
	                         <td><?php echo anchor("users/register/$row->id",$row->username,array('title' => 'Edit') );?> </td>  
                             <td><?php echo anchor("users/register/$row->id",$row->sex,array('title' => 'Edit') );?> </td>  
                             <td><?php echo anchor("users/register/$row->id",$row->email,array('title' => 'Edit') );?> </td>
                             <td><?php echo anchor("users/register/$row->id",$row->phone,array('title' => 'Edit') );?> </td>
                             <td><?php echo anchor("users/register/$row->id",$row->address,array('title' => 'Edit') );?> </td>
                             <td><?php 
                             $this->load->module('roles');
                             $dbq = $this->roles->read($row->role);
                             foreach($dbq->result() as $resultr){
                                
                             
                             echo anchor("users/updateUserRole/$row->id/$row->role",$resultr->role,array('title' => 'Edit') );
                             
                             }
                             ?> </td>
                             <?php 
                             $this->load->module('status');
                             $statusq = $this->status->read($row->status);
                              ?>
                             <td><?php 
                             foreach($statusq->result() as $stat_){ 
                                $status_ = $stat_->status;
                                }
                             echo anchor("users/updateUserStatus/$row->id/$row->status",$status_,array('title' => 'Edit') );
                             
                             ?> 
                             
                             </td>
                               <td><a href="<?php echo base_url("/users/delete/$row->id"); ?>" class="btn-mini btn-black btn-cross" title="Delete"><span></span>Delete</a></td>
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