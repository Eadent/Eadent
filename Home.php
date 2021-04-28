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
// Purpose:	Home (originally "Overview") web page.
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
        <title>Eadent - Home</title>
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
		<span style="color: #A64500">(Eadent)</span></strong> - specialise in the Full Lifecycle Development of Products
		where a significant Software aspect is involved.
		</p>
		<p>							
		I can Co-Develop Products in certain circumstances.
		</p>
		<p>
		And I am willing to negotiate the provision of certain Consultancy Services. For example, I:
		</p>
		<ul>
			<li>
				Will collaborate with you to identify Issues and Requirements, and Develop
					Solutions.
			</li>
			<li>
				Have experience across a range of Industries, Platforms and Technologies.
			</li>
			<li>
				Have traditionally worked with Assembly Language, C and C++, Microsoft Windows, SQL, .Net (and .Net Core) and C# Platforms, and Real-Time (Hard, Embedded or otherwise)
					Environments.
			</li>
			<li>
				Have also worked with (amongst other things) Basic, Fortran, Forth, Java, HTML, CSS, JavaScript, JSON, TypeScript, XML, PHP, Xamarin, TeamCity, JetBrains YouTrack, Git and GitHub, Linux and Azure.
			</li>
			<li>
				Am currently available for Contract or Consultancy work.
			</li>
		</ul>
		<p>
		If you are a Company seeking Consultancy Services, and any of the following are true for you, I can help:
		</p>
		<ul>
			<li>
			Want to reduce the risk of Designing a poor System Architecture.
			</li>
			<li>
			Want to get two or more, new or existing, Independent Systems interacting with
			each other.
			</li>
			<li>
			No Software Development capability In-House and need help getting a Bespoke
			Solution Developed.
			</li>
			<li>
			Want to hire Software Developers and do not know how.
			</li>
			<li>
			Want to engage a large Consultancy for a Project and want help up-front doing
			so.
			</li>
			<li>
			Porting or rewriting an existing Application for a new Platform.
			</li>
			<li>
			Need assistance establishing Requirements.
			</li>
			<li>
			Need assistance with Software Design and Development Process.
			</li>
			<li>
			Need assistance with Application Architecture Design and Review.
			</li>
			<li>
			Need temporary assistance due to departure or illness of one or more key
			personnel.
			</li>
			<li>
			Software Development Project approaching a major deadline with a growing list
			of problems to be resolved.
			</li>
		</ul>
		<p>
		I can also help if you simply need "Hand-Holding" or regular, objective and external "Sanity-Check" Reviews. Examples:
		</p>
		<ul>
			<li>
			Developing Software in-house.
			</li>
			<li>
			Moving to a new Software Technology, Approach or Language.
			</li>
			<li>
			Moving to a newer Version of a Development Environment.
			</li>
			<li>
			Embarking on a major "Green-Field Site" Software Development Project.
			</li>
			<li>
			Have a relatively inexperienced or Junior Software Development Team.
			</li>
		</ul>
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
