        
      
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                        <li><a class="menuitem" href="<?php echo base_url("users"); ?>">Users</a>
                            <ul class="submenu">
                                <li><a href="<?php echo base_url("users"); ?>">All Users</a> </li>
                                <li><a href="<?php echo base_url("roles"); ?>">User Roles</a> </li>
                                <li><a href="<?php echo base_url("status"); ?>">User Status</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem" href="<?php echo base_url("properties"); ?>">Properties</a>
                            <ul class="submenu">
                                <li><a href="<?php echo base_url("properties"); ?>">All Properties</a> </li>
                                <li><a href="<?php echo base_url("properties/myproperties"); ?>">My Properties</a> </li>
                                <li><a href="<?php echo base_url("locations"); ?>">Locations</a> </li>
                                <li><a href="<?php echo base_url("categories"); ?>">Categories</a> </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
          <script type="text/javascript">

       
            /*setupDashboardChart('chart1');*/
            setupLeftMenu();
			setSidebarHeight();


        
    </script>