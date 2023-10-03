<?php
//---------------------------------------------------------------------------
// Copyright © 2009-2011 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created:	Eamonn A. Duffy,   Sep-2009. [C#]
//          Eamonn A. Duffy, 2-Jun-2010. [PHP]
//
// Purpose:	About web page.
//
//---------------------------------------------------------------------------

    require_once("_ns_Eadent/Configuration.class.php");
    require_once("_ns_Eadent/AssemblyInfo.class.php");

    require_once("_ns_EamonnDuffy/Utility.class.php");

    Utility::CheckForMaintenanceMode();

    $Utility = new Utility();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- 13-Feb-2011: IE 8 at least insists on the DOCTYPE appearing as the very first line. And Validation does not allow the xml line to be second. Microsoft ... why? -->
<!-- Created: Eamonn A. Duffy, 18-Feb-2011. http://www.Eadent.com/ -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
		<meta name="description" content="Eadent specialises in Software and Web Design and Development" />
		<meta name="keywords" content="Eadent, Eamonn Duffy, Eamonn Anthony Duffy Enterprises, Software, Web, Design, Development" />
        <title>Eadent - About</title>
		<!-- For the latest jQuery at Google (for https loading support), refer to: http://code.google.com/apis/libraries/devguide.html -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<!-- The following, whilst the original/main site, does not support https loading:
		<script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
		-->
		<link rel="stylesheet" type="text/css" href="Css/Eadent.css" />
		<script type="text/javascript">
		<!--
		var BrowserNow = new Date();
		//-->
		</script>
    </head>
    <body>
	<div id="Wrapper">
<?php
		require_once("Include/EadentHeader.php");
?>
		<div id="Container">
<?php
		require_once("Include/EadentLeft.php");
?>
		<div id="Middle">
		<p>
			I - <strong><span style="color: #F10804">Eamonn Duffy</span>
			<span style="color: #A64500">(Eadent - Eamonn Anthony Duffy Enterprises)</span></strong>
			- have over
			<?php
				echo $Utility->GetEamonnNumYears();
			?>
			years of Software Development experience, ranging in
			scope from Small Embedded Real-Time to Small-Enterprise Systems, including
			custom Systems Integration work.
		</p>
		<p>
			I have extensive experience of 'Green-Field
			Site' Software Developments, including Systems where the Hardware and
			Mechanical aspects have also been developed concurrently from scratch.
		</p>
		<p>
		I currently live in Dublin, Ireland.
		</p>
		<p>
			My main skills have traditionally been used in Assembly Language, C and C++, Microsoft Windows, SQL, .Net (and .Net Core) and C# Platforms, and Real-Time (Hard, Embedded or otherwise)
			Environments.
		</p>
		<p>
			I have also worked with (amongst other things) Basic, Fortran, Forth, Java, HTML, CSS, JavaScript, JSON, TypeScript, XML, PHP, Xamarin, TeamCity, JetBrains YouTrack, Git and GitHub, Linux and Azure.
		</p>
		<p>
		<a target="_blank" href="https://www.Eadent.com/EamonnDuffyCV-Long.pdf">Eamonn Duffy's Long CV/R&eacute;sum&eacute; [PDF]</a>
			<br /><br />
		<a target="_blank" href="https://www.Eadent.com/EamonnDuffyCV-Long.docx">Eamonn Duffy's Long CV/R&eacute;sum&eacute; [MS Word Document, Virus Scanned]</a>
		</p>
		<p style="margin: 0; padding: 0;">
		<br />
		</p>
		</div>	<!-- Middle -->
<?php
		require_once("Include/EadentRight.php");
?>
		</div>	<!-- Container -->
<?php
		require_once("Include/EadentFooter.php");
		require_once("Include/EadentValidation.php");
?>
	</div>	<!-- Wrapper -->
	</body>
</html>

<?php
    if (file_exists("HostingFooter.php"))
		include_once("HostingFooter.php");

//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
