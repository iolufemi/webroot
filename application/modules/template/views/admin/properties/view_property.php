
        <div class="grid_10">
            <div class="box round first fullpage">
                <h2>
                    Properties Images</h2>
                    
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
               
                    
                    
        
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('form#register').validate();        
        </script>