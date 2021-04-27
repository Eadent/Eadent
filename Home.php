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
		<span style="color: #A64500">(Eadent)</span></strong> - specialise in the full lifecycle development of products
		where a significant software aspect is involved.
		</p>
		<p>							
		I can co-develop products in certain circumstances.
		</p>
		<p>
		And I am willing to negotiate the provision of certain consultancy services. For example, I:
		</p>
		<ul>
			<li>
				Will collaborate with you to identify issues and requirements, and develop
					solutions.
			</li>
			<li>
				Have experience across a range of industries, platforms and technologies.
			</li>
			<li>
				Have traditionally worked with Microsoft Windows, .NET platforms and real-time (embedded or otherwise)
					environments, although have now also started working with Java, XML and PHP.
			</li>
			<li>
				Am currently available for permanent, contract or consultancy work.
			</li>
		</ul>
		<p>
		If you are a small to medium sized company seeking consultancy services, and any of the following are true for you, I can help:
		</p>
		<ul>
			<li>
			Want to reduce the risk of designing a poor system architecture.
			</li>
			<li>
			Want to get two or more, new or existing, independent systems interacting with
			each other.
			</li>
			<li>
			No software development capability in-house and need help getting a bespoke
			solution developed.
			</li>
			<li>
			Want to hire software developers and do not know how.
			</li>
			<li>
			Want to engage a large consultancy for a project and want help up-front doing
			so.
			</li>
			<li>
			Porting or rewriting an existing application for a new platform.
			</li>
			<li>
			Need assistance establishing requirements.
			</li>
			<li>
			Need assistance with software design and development process.
			</li>
			<li>
			Need assistance with application architecture design and review.
			</li>
			<li>
			Need temporary assistance due to departure or illness of one or more key
			personnel.
			</li>
			<li>
			Software development project approaching a major deadline with a growing list
			of problems to be resolved.
			</li>
		</ul>
		<p>
		I can also help if you simply need "hand-holding" or regular, objective and external "sanity-check" reviews. Examples:
		</p>
		<ul>
			<li>
			Developing software in-house.
			</li>
			<li>
			Moving to a new software technology, approach&nbsp;or language.
			</li>
			<li>
			Moving to a newer version of a compiler or development environment.
			</li>
			<li>
			Embarking on a major "green-field site" software development project.
			</li>
			<li>
			Have a relatively inexperienced or junior software development team.
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
