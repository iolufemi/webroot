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
                    Status</h2>
                    <span class="headerlink"><?php echo anchor("status/create","Add New"); ?></span>
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
                    
                    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Status</th>
							<th>Description</th>
                            <th>Allow Access?</th>
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
							<td><?php echo $ii/*anchor("status/create/$row->id",$row->id,array('title' => 'Edit') )*/;?></td>
							<td><?php echo anchor("status/create/$row->id",$row->status,array('title' => 'Edit') );?></td>
							<td><?php echo anchor("status/create/$row->id",$row->description,array('title' => 'Edit') );?> </td>
                            <td><?php echo anchor("status/create/$row->id",$row->allow,array('title' => 'Edit') );?> </td>
						      <td><a href="<?php echo base_url("/status/delete/$row->id"); ?>" class="btn-mini btn-black btn-cross" title="Delete"><span></span>Delete</a></td>
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
                    
                    
                    
                </div>
            </div>
        </div>