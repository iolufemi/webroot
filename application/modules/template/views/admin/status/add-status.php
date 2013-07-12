
        
        <div class="grid_3 aligncenter">
            <div class="box round first fullpage">
                <h2>
                    Add New Status</h2>
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
                    <form action="<?php echo base_url('status/submit'); ?>" method="post" name="addstatus" id="addstatus">
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Status Name: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="status" value="<?php echo(@$status); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Allow Access( 1 for Yes and 0 for No): </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large" name="allow" value="<?php echo(@$allow); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Description: </label>
                            </td>
                            <td class="col2">
                                <textarea class="large" cols="26" rows="7" name="description" ><?php echo(@$description); ?></textarea>
                            </td>
                        </tr>
                        <?php if(isset($id)){ ?>
                        <input type="hidden" name="id" value="<?php echo(@$id); ?>" />
                        <?php } ?>
                        <tr>
                            <td class="col1">
                                &nbsp;
                            </td>
                            <td class="col2">
                                <button class="btn" onclick="$(this).submit()">Add Status</button>
                            </td>
                        </tr>
                        
                        
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('form#addstatus').validate(
        {
            rules:{
                status: {
                            required:true
                            }
                  }
        }
        );        
        </script>
        
        