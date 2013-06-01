!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
html xmlns="http://www.w3.org/1999/xhtml">
head>
    meta http-equiv="content-type" content="text/html; charset=utf-8" />
    title>?php echo $pagetitle; ?>/title>
    link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/reset.css" media="screen" />
    link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/text.css" media="screen" />
    link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/grid.css" media="screen" />
    link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/layout.css" media="screen" />
    link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/nav.css" media="screen" />
    !--[if IE 6]>link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/ie6.css" media="screen" />![endif]-->
    !--[if IE 7]>link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/ie.css" media="screen" />![endif]-->
    link href="?php echo base_url(); ?>css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
    !--Jquery UI CSS-->
    link href="?php echo base_url(); ?>css/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
    !-- BEGIN: load jquery -->
    script src="?php echo base_url(); ?>js/jquery-1.6.4.min.js" type="text/javascript">/script>
    script type="text/javascript" src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.core.min.js">/script>
    script src="?php echo base_url(); ?>js/jquery.validate.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.effects.core.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript">/script>
    !-- END: load jquery -->
    !--jQuery Date Picker-->
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript">/script>
    !-- jQuery dialog related-->
    script src="?php echo base_url(); ?>js/jquery-ui/external/jquery.bgiframe-2.1.2.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.draggable.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.position.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.resizable.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.dialog.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.effects.core.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.effects.blind.min.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.effects.explode.min.js" type="text/javascript">/script>
    !-- jQuery dialog end here-->
    script src="?php echo base_url(); ?>js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript">/script>
    !--Fancy Button-->
    script src="?php echo base_url(); ?>js/fancy-button/fancy-button.js" type="text/javascript">/script>
    script src="?php echo base_url(); ?>js/setup.js" type="text/javascript">/script>
    !-- Load TinyMCE -->
    script src="?php echo base_url(); ?>js/tiny-mce/jquery.tinymce.js" type="text/javascript">/script>
    !-- BEGIN: load jqplot -->
    link rel="stylesheet" type="text/css" href="?php echo base_url(); ?>css/jquery.jqplot.min.css" />
    !--[if lt IE 9]>script language="javascript" type="text/javascript" src="?php echo base_url(); ?>js/jqPlot/excanvas.min.js">/script>![endif]-->
    script language="javascript" type="text/javascript" src="?php echo base_url(); ?>js/jqPlot/jquery.jqplot.min.js">/script>
    script language="javascript" type="text/javascript" src="?php echo base_url(); ?>js/jqPlot/plugins/jqplot.barRenderer.min.js">/script>
    script language="javascript" type="text/javascript" src="?php echo base_url(); ?>js/jqPlot/plugins/jqplot.pieRenderer.min.js">/script>
    script language="javascript" type="text/javascript" src="?php echo base_url(); ?>js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js">/script>
    script language="javascript" type="text/javascript" src="?php echo base_url(); ?>js/jqPlot/plugins/jqplot.highlighter.min.js">/script>
    script language="javascript" type="text/javascript" src="?php echo base_url(); ?>js/jqPlot/plugins/jqplot.pointLabels.min.js">/script>
    !-- END: load jqplot -->
    script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setupProgressbar('progress-bar');
            setDatePicker('date-picker');
            setupDialogBox('dialog', 'opener');
            /*$('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();*/
        });
    /script>
    

    !-- /TinyMCE -->
    style type="text/css">
        #progress-bar
        {
            width: 400px;
        }
    /style>
/head>
body>
    div class="container_12">
        div class="grid_12 header-repeat">
            div id="branding">
                div class="floatleft">
                    img src="?php echo base_url(); ?>img/logo.png" alt="Logo" />/div>
                
                div class="clear">
                /div>
            /div>
        /div>
        div class="clear">
        /div>
        
        div class="clear">
        /div>