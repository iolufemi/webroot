
        
        <div class="grid_3 aligncenter">
            <div class="box round first fullpage">
                <h2>
                    Add New Role</h2>
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
                    <form action="<?php echo base_url('roles/submit'); ?>" method="post" name="addrole" id="addrole">
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Role Name: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="role" value="<?php echo(@$role); ?>" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="col1">
                                &nbsp;
                            </td>
                            <td class="col2">
                                <button class="btn" onclick="$(this).submit()">Add Role</button>
                            </td>
                        </tr>
                        
                        
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('form#addrole').validate(
        {
            rules:{
                role: {
                            required:true
                            }
                  }
        }
        );        
        </script>
        
        