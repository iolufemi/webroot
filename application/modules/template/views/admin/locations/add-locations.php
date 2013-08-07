
        
        <div class="grid_3 aligncenter">
            <div class="box round first fullpage">
                <h2>
                    Add New Location</h2>
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
                    <form action="<?php echo base_url('locations/create'); ?>" method="post" name="addlocation" id="addlocation">
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Location: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class="large required" name="location" value="<?php echo(@$location); ?>" />
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
                                <button class="btn" onclick="$(this).submit()">Add Location</button>
                            </td>
                        </tr>
                        
                        
                        
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('form#addlocation').validate();        
        </script>
        
        