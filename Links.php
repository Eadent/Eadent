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
		<meta name="keywords" content="Eadent, Eamonn Duffy, Eamonn Anthony Duffy Enterprises, Software, Web, Design, Development" />
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
			&nbsp;&nbsp;0. <a target="_blank" href="https://www.Eadent.com/Videos/The National D-Day Memorial - 3 Overlord Cir, Bedford, VA 24523, United States - 20150417_133020.mp4">The National D-Day Memorial, Virginia 24523, United States (Video)</a>
		</p>
		<p>
			&nbsp;&nbsp;1. <a target="_blank" href="https://www.BritishLegion.org.uk/">The Royal British Legion</a>
		</p>
		<p>
			&nbsp;&nbsp;2. <a target="_blank" href="https://www.Canva.com/">Canva Design</a>
		</p>
		<p>
			&nbsp;&nbsp;3. <a target="_blank" href="https://www.Ghis.eu/">HSE EVE GHIS</a>
		</p>
		<p>
			&nbsp;&nbsp;4. <a target="_blank" href="https://Web.Ghis.eu/Index.html">Web Design at HSE EVE GHIS</a>
		</p>
		<p>
			&nbsp;&nbsp;5. <a target="_blank" href="https://Web.Ghis.eu/Portfolio_EAD.html">My Web Design Portfolio at HSE EVE GHIS</a>
		</p>
		<p>
			&nbsp;&nbsp;6. <a target="_blank" href="https://www.EamonnDuffy.com/">Eamonn Duffy's Web Site</a>
		</p>
		<p>
			&nbsp;&nbsp;7. <a target="_blank" href="https://EamonnAnthonyDuffy.WordPress.com/">Eamonn Duffy's Personal Blog</a>
		</p>
		<p>
			&nbsp;&nbsp;8. <a target="_blank" href="https://www.Duffy.global/">Duffy Web Site</a>
		</p>
		<p>
			&nbsp;&nbsp;9. <a target="_blank" href="https://www.GitHub.com/Eadent/">Eadent GitHub Repositories</a>
		</p>
		<p>
			10. <a target="_blank" href="https://www.GitHub.com/Rapture-Global/">Rapture Global GitHub Repositories</a>
		</p>
		<p>
			11. <a target="_blank" href="https://www.GitHub.com/BrownDuffys/">Brown Duffys GitHub Repositories</a>
		</p>
		<p>
			12. <a target="_blank" href="https://www.RaptureTherapy.global/">Rapture Therapy Web Site<a>
		</p>
		<p>
			13. <a target="_blank" href="https://www.Rapture.global/">Rapture Web Site</a>
		</p>
		<p>
			14. <a target="_blank" href="https://www.BrownDuffys.one/">Brown Duffys Web Site</a>
		</p>
		<p>
			15. <a target="_blank" href="https://www.LestWeForget.one/">Lest We Forget Web Site</a>
		</p>
		<p>
			16. <a target="_blank" href="https://www.CentralSecurityService.one/">Central Security Service Web Site</a>
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
