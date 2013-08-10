
        
        <div class="<?php if(!$this->session->userdata('token')){ ?> grid_12 <?php }else{ ?> grid_10 <?php } ?>">
            <div class="box round first fullpage">
                <h2>
                    <?php if(!@$id){ ?> Register <?php }else{ ?> Modify User <?php } ?></h2>
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
                    <form action="<?php echo base_url('users/registration_submit'); ?>" method="post" name="registration" id="register">
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
                                <input type="password" class="large" name="password" id="password" value="<?php echo (@$password); ?>" />
                                <input type="password" class="large" name="password2" value="<?php echo (@$password2); ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Firstname: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="firstname" value="<?php echo(@$firstname); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Lastname: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="lastname" value="<?php echo(@$lastname); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Sex: </label>
                            </td>
                            <td class="col2">
                                Male <input type="radio" name="sex" value="male" <?php if(@$sex == 'male'){ ?> checked="yes" <?php }  ?> /> Female <input type="radio" name="sex" value="female" <?php if(@$sex == 'female'){ ?> checked="yes" <?php }  ?>  />
                            </td>
                        </tr>
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
                                <label>
                                    Phone Number: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="phone" value="<?php echo(@$phone); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Address: </label>
                            </td>
                            <td class="col2">
                                <textarea class="large" name="address" style="width: 85%; height: 100px;" ><?php echo(@$address); ?></textarea>
                            </td>
                        </tr>
                      
                        <tr>
                            <td class="col1">
                                <input type="hidden" name="role" value="<?php if(!isset($role)){echo 3;}else{ echo $role;} ?>" />
                                &nbsp;<?php if(isset($id) || @$id != ""){ ?>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <?php } ?>
                            </td>
                            <td class="col2">
                                <button class="btn" onclick="$(this).submit()" id="submit">Register</button>
                            </td>
                        </tr>
                                       
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('form#register').validate(
        {
            rules:{
                username: {
                            required:true
                            },
                  password: {
                            required:true,
                            minlength:6
                            },
                  password2: {
                            required:true,
                            equalTo:"#password"
                            }
                  }
        }
        );        
        </script>