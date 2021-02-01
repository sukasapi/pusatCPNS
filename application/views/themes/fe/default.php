
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">


    <title>Pusat CPNS</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/fontello.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/lnr-icon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/trumbowyg.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/fe/'); ?>css/style.css">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/fe/'); ?>images/favicon.png">
    
    <?php
		/** -- Copy from here -- */
		if(!empty($meta))
		foreach($meta as $name=>$content){
			echo "\n\t\t";
			?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
				 }
		echo "\n";

		if(!empty($canonical))
		{
			echo "\n\t\t";
			?><link rel="canonical" href="<?php echo $canonical?>" /><?php

		}
		echo "\n\t";

		foreach($css as $file){
			echo "\n\t\t";
			?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
		} echo "\n\t";

		foreach($js as $file){
				echo "\n\t\t";
				?><script src="<?php echo $file; ?>"></script><?php
		} echo "\n\t";

		/** -- to here -- */
	?>
</head>

<body class="preload home1 mutlti-vendor">

  <?php $this->load->view('includes/fe/menu'); ?>

    
  <?php echo $output;?>


  <?php $this->load->view('includes/fe/footer'); ?>

    <!--//////////////////// JS GOES HERE ////////////

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>////-->
   <script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    });    
</script>
    <!-- inject:js -->
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery/jquery-1.12.3.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery/popper.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery/uikit.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/chart.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/grid.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery.barrating.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/jquery.easing1.3.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/slick.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/tether.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/trumbowyg.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/vendor/waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/dashboard.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/main.js"></script>
    <script src="<?php echo base_url('assets/fe/'); ?>js/map.js"></script>
    <!-- endinject -->
</body>

</html>