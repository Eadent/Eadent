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
//          Eamonn A. Duffy, 3-Jun-2010. [PHP]
//
// Purpose:	Links web page.
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
        <title>Eadent - Links</title>
		<!-- For the latest jQuery at Google (for https loading support), refer to: http://code.google.com/apis/libraries/devguide.html -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<!-- The following, whilst the original/main site, does not support https loading:
		<script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
		-->
		<link rel="stylesheet" type="text/css" href="Css/Eadent.css" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="Css/EadentIe6.css" />
		<![endif]-->
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
			<a target="_blank" href="https://www.Rapture.global/">Rapture Global</a>
		</p>
		<p>
			<a target="_blank" href="https://Therapy.Rapture.global/">Rapture Global - Therapy</a>
		</p>
		<p>
			<a target="_blank" href="https://www.Okpal.com/rapture/">Rapture Global - First Funding Attmpt</a>
		</p>
		<p>
			<a target="_blank" href="https://www.Duffy.global/">Duffy Web Site</a>
		</p>
		<p>
			<a target="_blank" href="https://www.Boyle.global/">Boyle Web Site</a>
		</p>
		<p>
			<a target="_blank" href="https://www.Ghis.eu/">HSE EVE GHIS</a>
		</p>
		<p>
			<a target="_blank" href="https://Web.Ghis.eu/Index.html">Web Design at HSE EVE GHIS</a>
		</p>
		<p>
			<a target="_blank" href="https://Web.Ghis.eu/Portfolio_EAD.html">My Web Design Portfolio at HSE EVE GHIS</a>
		</p>
		<p>
			<a target="_blank" href="http://OrganisationalRescue.com/">Organisational Rescue</a>
		</p>
		<p>
			<a target="_blank" href="https://www.Canva.com/">Canva Design</a>
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
