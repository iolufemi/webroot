
        
        <div class="grid_12">
            <div class="box round first fullpage">
                <h2>
                    Register</h2>
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
        
        
        
         ?>
         <!-- TODO: Finish Building this form and the validation. -->
                    <form action="<?php echo base_url('users/registration_submit'); ?>" method="post" name="registration">
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Username: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="username" value="<?php echo(@$username); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Password: </label>
                            </td>
                            <td class="col2">
                                <input type="password" class="large" name="password" value="<?php echo (@$password); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                &nbsp;
                            </td>
                            <td class="col2">
                                <button class="btn" onclick="$(this).submit()">Login</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                &nbsp;
                            </td>
                            <td class="col2">
                                <?php echo form_checkbox("rememberme","rememberme","FALSE"); ?> <label>Remember Me.</label> | <?php echo anchor("users/register","Register Now","title=Register") ?>
                            </td>
                        </tr>
                        
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>