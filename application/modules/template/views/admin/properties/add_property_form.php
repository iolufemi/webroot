
        
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
                    <?php echo form_open_multipart('properties/create',array('method' => 'post', 'id' => 'prop')); ?>
                    <table class="form">
                        <tr>
                            <td class="col1">
                                <label>
                                    Property Name: </label>
                            </td>
                            <td class="col2">
                                <?php echo form_input('name',@$name,'class = "large required"'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Description: </label>
                            </td>
                            <td class="col2">
                                <?php echo form_textarea('description',@$description,'class = "large required" style="width: 85%; height: 100px;"'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Number of Rooms: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class = "large required" name="no_of_rooms" value="<?php echo(@$no_of_rooms); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Price: </label>
                            </td>
                            <td class="col2">
                                <input type="text" class = "large required" name="price" value="<?php echo(@$price); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Category: </label>
                            </td>
                            <td class="col2">
                            <?php $this->load->module('categories');
                            $query1 = $this->categories->read_all();
                             ?>
                            <select name="category" class = "large required">
                            <?php foreach($query1->result() as $row){ ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == @$category){ echo "selected='yes'";} ?> ><?php echo $row->category; ?></option>
                            <?php } ?>
                            </select>
                            </td>
                        </tr>
                      
                        <tr>
                            <td class="col1">
                                <label>
                                    Address: </label>
                            </td>
                            <td class="col2">
                                <textarea class = "large required" name="address" style="width: 85%; height: 100px;"><?php echo(@$address); ?></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="col1">
                                <label>
                                    Location: </label>
                            </td>
                            <td class="col2">
                            <?php $this->load->module('locations');
                            $query2 = $this->locations->read_all();
                             ?>
                            <select name="location" class = "large required">
                            <?php foreach($query2->result() as $row){ ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == @$location){ echo "selected='yes'";} ?> ><?php echo $row->location; ?></option>
                            <?php } ?>
                            </select>
                            </td>
                        </tr>
                        <?php //if(!isset($id) || @$id == ""){ ?>
                        <tr>
                            <td class="col1">
                                <label>
                                    Main Picture: </label>
                            </td>
                            <td class="col2">
                            <?php echo form_upload('mainpicture'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label>
                                    Other Pictures: </label>
                            </td>
                            <td class="col2">
                            <?php echo form_upload('otherpictures[]','','multiple'); ?>
                            </td>
                        </tr>
                      <?php // } ?>
                        <tr>
                            <td class="col1">
                                
                                &nbsp;<?php if(isset($id) || @$id != ""){ ?>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                <?php } ?>
                            </td>
                            <td class="col2">
                                <button class="btn" onclick="$(this).submit()" id="submit">Add Property</button>
                            </td>
                        </tr>
                                       
                        
                    </table>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('form#prop').validate();        
        </script>