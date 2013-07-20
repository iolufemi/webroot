        <div class="grid_3 aligncenter">
            <div class="box round first fullpage">
                <h2>
                    Update Avatar</h2>
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
                    
                    <?php echo form_open_multipart(base_url('users/addAvi')) ?>
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Picture: </label>
                            </td>
                            <td class="col2">
                                <?php echo form_upload(array('name' => 'userfile')); ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="col1">
                                &nbsp;
                            </td>
                            <td class="col2">
                                <button class="btn" onclick="$(this).submit()">Update Avatar</button>
                            </td>
                        </tr>
                    
                    
                        
                        
                    </table>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        