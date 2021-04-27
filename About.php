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
		<meta name="keywords" content="Eadent, Eamonn Duffy, Software, Web, Design, Development" />
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
		<span style="color: #A64500">(Eadent)</span></strong>
		- have over
		<?php
			echo $Utility->GetEamonnNumYears();
		?>
		years of software development experience, ranging in
		scope from small embedded real-time to small-enterprise systems, including
		custom Systems Integration work. I have extensive experience of 'green-field
		site' software developments, including systems where the hardware and
		mechanical aspects have also been developed concurrently from scratch.
		</p>
		<p>
		I currently live in Dublin, Ireland.
		</p>
		<p>
		My main skills have traditionally been used in Microsoft Windows, .NET platforms and real-time
		(embedded or otherwise) environments.
		</p>
		<p>
		In more recent times, I have moved into the role of a Principal Software Engineer.
		I officially (rather than de-facto) Mentor colleagues. I combine this with my up to date in-depth Technical Knowledge.
		For example, I have recently Architected an Angular 6 Web Site with a .NET Framework 4.7.2 Web Service, developing software whilst
		mentoring two colleagues and code reviewing their work, all done with the aid of Jira and TeamCity and Octopus Deploy CI/CD tools.
		</p>
		<p>
		<a href="http://www.Eadent.com/EamonnDuffyCV-Long.html">Eamonn Duffy's Long CV/R&eacute;sum&eacute; [HTML Page]</a>
			<br /><br />
		<a href="http://www.Eadent.com/EamonnDuffyCV-Long.doc">Eamonn Duffy's Long CV/R&eacute;sum&eacute; [MS Word Document, Virus Scanned]</a>
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
