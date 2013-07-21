
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
            <div class="box round first grid">
                <h2 class="_left">
                    Users</h2>
                    <span class="headerlink"><?php echo anchor("users/register","Add New"); ?></span>
                <div class="block">
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
                    echo form_open('users/search',array('name' => 'search', 'method' => 'post', 'class' => 'floatleft', 'style' => 'margin-right:20px;'));
                    echo form_label('Search by Username: ');
                    echo form_input(array('name' => 'search'),@$search);
                    echo form_submit(array('class' => 'btn', 'name' => 'searchnow'),'Search');
                    echo form_close();
                     ?>
                    <?php 
                    echo form_open('users/searchemail',array('name' => 'searchemail', 'method' => 'post' , 'class' => 'floatleft'));
                    echo form_label('Search by Email: ');
                    echo form_input(array('name' => 'email'),@$email);
                    echo form_submit(array('class' => 'btn', 'name' => 'searchnow'),'Search');
                    echo form_close();
                     ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
                            <th>Username</th>
                            <th>Sex</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Status</th>
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
							<td><?php echo anchor("roles/create/$row->id",$row->id,array('title' => 'Edit') );?></td>
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