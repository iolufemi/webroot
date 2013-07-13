
        
        <div class="grid_3 aligncenter">
            <div class="box round first fullpage">
                <h2>
                    Request Verification Code.</h2>
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
                    <form action="<?php echo base_url('users/sendVerificationCode'); ?>" method="post" name="admin_login">
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Email: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="email" value="<?php echo(@$email); ?>" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td class="col1">
                                &nbsp;
                            </td>
                            <td class="col2">
                                <button class="btn" onclick="$(this).submit()">Request Verification Code</button>
                            </td>
                        </tr>
                  
                        
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
        