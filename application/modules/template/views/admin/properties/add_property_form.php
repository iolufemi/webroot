
        
        <div class="grid_10">
            <div class="box round first fullpage">
                <h2>
                    Add Property</h2>
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
        
   
         <!-- TODO: Finish Building this form and the validation. -->
                    <?php echo form_open_multipart('properties/create'); ?>
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Property Name: </label>
                            </td>
                            <td class="col2">
                                <?php echo form_input('name',@$name,'class = "large"'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Description: </label>
                            </td>
                            <td class="col2">
                                <?php echo form_textarea('description',@$description,'class = "large" style="width: 85%; height: 100px;"'); ?>
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
                                <textarea class="large" name="address" style="width: 85%; height: 100px;" >
                                <?php echo(@$address); ?>
                                </textarea>
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
                    <?php echo form_close(); ?>
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