
        
        <div class="grid_3 aligncenter">
            <div class="box round first fullpage">
                <h2>
                    Update User Status</h2>
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
                    <form action="<?php echo base_url('users/updateUserStatus'); ?>" method="post" name="updateuserstatus">
                    <table class="form">
                    <tr>
                            <td class="col1">
                                <label>
                                    Index. </label>
                            </td>
                            <td class="col2">
                                <?php 
                                
                                $this->load->module('status');
                                $query = $this->status->read_all(); 
                                foreach($query->result() as $status_){
                                    echo '<b>ID: </b>'.$status_->id.' <b>STATUS: </b>'.$status_->status.' <b>DESCRIPTION: </b>'.$status_->description.'<br />';
                                }
                                
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Status </label>
                            </td>
                            <td class="col2">
                            <select name="status" class="large">
                            
                            <?php 
                                
                                $this->load->module('status');
                                $query = $this->status->read_all(); 
                                foreach($query->result() as $status_){ ?>
                                
                                <option value="<?php echo $status_->id; ?>" <?php if($status_->id == $status){ echo "selected='yes'";} ?> ><?php echo $status_->status; ?></option>
                                    
                               <?php  }
                                
                                ?>
                                
                                </select>
                                
                                
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="col1">
                                &nbsp;
                                <input type="hidden" name="id" value="<?php echo(@$id); ?>" />
                            </td>
                            <td class="col2">
                                <button name="statusupdate" value="update" class="btn" onclick="$(this).submit()">Update User Status</button>
                            </td>
                        </tr>
                      
                        
                        
                        
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
        