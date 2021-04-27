<?php
//---------------------------------------------------------------------------
// Copyright © 2011-2011 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created:	Eamonn A. Duffy, 19-Feb-2011. [PHP]
//
// Purpose:	Eadent Left section.
//
//---------------------------------------------------------------------------
?>
	<div id="Left">
	<ul>
		<li><a href="Home.php">Home</a></li>
		<li><a href="About.php">About</a></li>
		<li><a href="Contact.php">Contact</a></li>
		<li><a href="Links.php">Links</a></li>
	</ul>
	<div id="Information">
	<h3>Today</h3>
	<p>
	<strong><span style="color: #A64500;">[Server UTC]</span><br /></strong>
<?php
	echo $Utility->GetDay() . "<br />\n";
	echo $Utility->GetDate() . "<br />\n";
	echo $Utility->GetTime() . "<br />\n";
?>
	</p>
	<p>
	<script type="text/javascript">
	<!--
		document.write("<strong><span style='color: #A64500;'>[Browser]</span></strong><br />" + BrowserNow.toDateString() + "<br />" + BrowserNow.toTimeString() +"<br />");
	//-->
	</script>
	</p>
	<h3>Web Site</h3>
	<strong>
	<span><?php echo $Utility->GetVersion(); ?></span>
	</strong>
	</div>	<!-- Information -->
	</div>	<!-- Left -->
<?php
//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
