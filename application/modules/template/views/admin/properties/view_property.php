<link href="<?php echo base_url('/') ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('/') ?>js/pretty-photo/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="<?php echo base_url('/') ?>js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupPrettyPhoto();
            setupLeftMenu();
			setSidebarHeight();


        });
    </script>
        <div class="grid_10">
            <div class="box round first fullpage">
                <h2>
                    The Property</h2>

                <div class="block">
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
                    <div class="stat-col">
                        <span>Target</span>
                        <p class="purple">
                            70,000</p>
                    </div>
                    <div class="stat-col">
                        <span>Last Month Sales</span>
                        <p class="yellow">
                            32,729</p>
                    </div>
                    <div class="stat-col">
                        <span>Current Month Sales</span>
                        <p class="green">
                            63,829</p>
                    </div>
                    <div class="stat-col">
                        <span>Change</span>
                        <p class="blue">
                            99.9%</p>
                    </div>
                    <div class="stat-col">
                        <span>Difference</span>
                        <p class="red">
                            693.00</p>
                    </div>
                    <div class="stat-col">
                        <span>Stats with Icon</span>
                        <p class="purple">
                            <img src="<?php echo base_url('/') ?>img/icon-direction.png" alt="" />&nbsp;65,000</p>
                    </div>
                    <div class="stat-col last">
                        <span>Total</span>
                        <p class="darkblue">
                            70,000</p>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            
<div class="clear" style="margin:10px;">
&nbsp;
        </div>
                <h2>
                    Description</h2>
                <div class="block">
                    <p class="start">
                        <img src="<?php echo base_url('/') ?>img/horizontal.jpg" alt="Ginger" class="left" />Lorem ipsum dolor sit
                        amet, consectetur <a href="">adipisicing</a> elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur..</p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>
                </div>

<div class="clear" style="margin:10px;">
&nbsp;
        </div>
                    <h2>Gallery</h2>
                    <div class="block">
                    <ul class="prettygallery clearfix">
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item1-full.jpg" rel="prettyPhoto[gallery2]"
                            title="">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item1.jpg" alt="This is a pretty long title" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item2-full.jpg" rel="prettyPhoto[gallery2]"
                            title="Description on a single line.">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item2.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item3-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item3.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item4-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item4.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item5-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item5.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item6-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item6.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item7-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item7.jpg"  alt="" /></a></li>
                            
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item8-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item8.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item9-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item9.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item10-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item10.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item11-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item11.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item12-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item12.jpg"  alt="" /></a></li>
                            
                        <li><a href="<?php echo base_url('/') ?>img/pretty-photo/fullscreen/item13-full.png" rel="prettyPhoto[gallery2]">
                            <img src="<?php echo base_url('/') ?>img/pretty-photo/thumbnails/item13.jpg"  alt="" /></a></li>
                            
                    </ul>
                </div>
            <div class="clear" style="margin:10px;">
            &nbsp;
        </div>
        </div>
        </div>
        <script type="text/javascript">
        $('form#register').validate();        
        </script>