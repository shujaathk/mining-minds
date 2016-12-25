<?php
include "functions.php";
$result= retrieveUserList();
$male=0;$female=0;
$agebelow24=0;$age25to32=0;$age33to40=0;$ageabove41=0;



$occupation="";
for($i=0;$i<count($result);$i++){

	
	$occupation[$i]=$result[$i]['occupationDescription'];
	$age=ageCalculator(substr($result[$i]['dateOfBirth'],0,10));
	
	if($age<24)
		$agebelow24++;
	else if($age>25&&$age<33)
		$age25to32++ ;
	else if($age>33&&$age<40)
		$age33to40++ ;
	else if($age>40)
		$ageabove41++ ;
	
	
	
	if($result[$i]['genderDescription']=="Male")
		$male++;
	else if($result[$i]['genderDescription']=="Female")
		$female++;
}

$commonagegroup=max($agebelow24,$age25to32,$age33to40,$ageabove41);
//echo $commonagegroup;exit;
$occupationDescription = array_count_values($occupation);
asort($occupationDescription);
end($occupationDescription);
$commonoccupation = key($occupationDescription);



$total=$male+$female;
$maleratio=$male/$total*100;
$femaleratio=$female/$total*100;



$printcommonagegroup=print_var_name($commonagegroup);



?>


<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Mining Minds Expert View(dashboard)</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- favicon -->
       

        <!-- bootstrap framework -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		
        <!-- icon sets -->
            <!-- elegant icons -->
                <link href="assets/icons/elegant/style.css" rel="stylesheet" media="screen">
            <!-- elusive icons -->
                <link href="assets/icons/elusive/css/elusive-webfont.css" rel="stylesheet" media="screen">
            <!-- flags -->
                <link rel="stylesheet" href="assets/icons/flags/flags.css">
            <!-- scrollbar -->
                <link rel="stylesheet" href="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">


        <!-- google webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <!-- main stylesheet -->
		<link href="assets/css/main.min.css" rel="stylesheet" media="screen" id="mainCss">

        <!-- moment.js (date library) -->
        <script src="assets/js/moment-with-langs.min.js"></script>

        <style type="text/css">
<!--
.style1 {font-size: 36px}
.style2 {
	color: #FFFFFF;
	font-size: 36px;
	background:#009F9F;
	w
	
}
.style3 {font-size:82px}

#agediv {
	width		: 100%;
	height		: 600px;
	font-size	: 18px;
}							
-->
        </style>
</head>
    <body class="side_menu_active side_menu_expanded">
        <div id="page_wrapper">

            <!-- header -->
              <?php include "header.php";?>

            <!-- breadcrumbs -->
            

            <!-- main content -->
            <div id="main_wrapper">
                <div class="container-fluid">
                    <?php include "uppermenu.php";?>
                    
                    <div class="row">
                        <div class="col-md-12">
<!--                            <div class="heading_a"><span class="heading_text">Users (location)</span></div>
-->                            <div class="row">
                                <!--<div class="col-md-8">
                                    <div id="world_map_vector" style="width:100%;height:300px">
                                        <script>
                                            countries_data = {
                                                "US": 2320,
                                                "BR": 1945,
                                                "IN": 1779,
                                                "AU": 1486,
                                                "TR": 1024,
                                                "CN": 753
                                            };
                                        </script>
                                    </div>
                                </div>-->
                                <div class="col-md-6">
                                     <div class="heading_a">Users by Age group</div>
                            <div id="agediv" style="height:220px"></div>
                                </div>
                                <div class="col-md-6">
                                <div class="col-md-12 ">
                                     <div class="heading_a">
                                <span class="heading_text"></span>
                            </div>
<div class="message-box">
                <p> There are <?php echo count($result);?> users in the mining minds application.  <strong><?php echo $commonagegroup?> users</strong> are <?php  echo print_var_name($commonagegroup); ?>   </p>
                
</div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                     <div class="heading_a">
                                <span class="heading_text"></span>
                            </div>
<div class="message-box color1">
                <p> The most common job among users are <?php echo $commonoccupation;?>.</p>
                <p> <?php echo $maleratio;?>% of the users are male. </p>
         
</div>

</div>
                                
                
                
                
                            </div>
                        </div>
                    </div>
                   
                   
                   
                   
                   <div class="row">
                   <div class="col-md-12 ">
                   
                   
                   <div class="col-md-6 col-md-offset-3">
                                     <div class="heading_a">
                                <span class="heading_text"></span>
                            </div>
               <img src="images/female.PNG"><span class="style3"> <?php echo $femaleratio;?>%</span> <img src="images/male.PNG"><span class="style3"> <?php echo $maleratio;?>%</span>
                                
                
                
                
                     </div>
                   
                   
                     
                   
                   </div>
                   <div >
                   
                   
                   </div>
                   
                    
            </div>
            
            <!-- main menu -->
              <?php include "leftmenudashboard.php";?>

        </div>



<style type="text/css">
#chartdiv {
	width		: 100%;
	height		: 300px;
	font-size	: 11px;
}					
</style>
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- jQuery Cookie -->
        <script src="assets/js/jqueryCookie.min.js"></script>
        <!-- Bootstrap Framework -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- retina images -->
        <script src="assets/js/retina.min.js"></script>
        <!-- switchery -->
        <script src="assets/lib/switchery/dist/switchery.min.js"></script>
        <!-- typeahead -->
        <script src="assets/lib/typeahead/typeahead.bundle.min.js"></script>
        <!-- fastclick -->
        <script src="assets/js/fastclick.min.js"></script>
        <!-- match height -->
        <script src="assets/lib/jquery-match-height/jquery.matchHeight-min.js"></script>
        <!-- scrollbar -->
        <script src="assets/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>


<!-- amCharts javascript sources --> 
<script src="assets/js/amcharts.js" type="text/javascript"></script> 
<script src="assets/js/serial.js" type="text/javascript"></script> 

<script src="assets/js/pie.js"></script>
<script src="assets/js/light.js"></script>
        <!-- Yukon Admin functions -->
        <script src="assets/js/yukon_all.min.js"></script>

	    <!-- page specific plugins -->

            <!-- c3 charts -->
            <script src="assets/lib/d3/d3.min.js"></script>
            <script src="assets/lib/c3/c3.min.js"></script>
            <!-- vector maps -->
            <script src="assets/lib/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="assets/lib/jvectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
            <!-- countUp animation -->
            <script src="assets/js/countUp.min.js"></script>
            <!-- easePie chart -->
            <script src="assets/lib/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

            <script>
                $(function() {
                    // c3 charts
                    yukon_charts.p_dashboard();
                    // countMeUp
                    yukon_count_up.init();
                    // easy pie chart
                    yukon_easyPie_chart.p_dashboard();
                    // vector maps
                    yukon_vector_maps.p_dashboard();
                    // match height
                    yukon_matchHeight.p_dashboard();
                })
            </script>
		
        
  <script src="assets/js/bubble.js"></script>    
   
    <script src="assets/js/div.js"></script>     
    <?php // include "divdata.php";?>   
    <?php  include "agejs.php";?>  
    <?php  include "footer.php";?>  
   
    </body>
</html>
