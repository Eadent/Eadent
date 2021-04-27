<?php
//---------------------------------------------------------------------------
// Copyright © 2009-2011 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created:	Eamonn A. Duffy,    Oct-2009. [C#]
//			Eamonn A. Duffy, 20-Feb-2011. [PHP]
//
// Purpose:	Login web page.
//
//---------------------------------------------------------------------------

    require_once("_ns_Eadent/Configuration.class.php");
    require_once("_ns_Eadent/AssemblyInfo.class.php");

	require_once("_ns_EamonnDuffy/Utility.class.php");
    require_once("_ns_EamonnDuffy/AccessControl.class.php");

    Utility::CheckForMaintenanceMode();

    $Utility = new Utility();

    $TextLoginName = "";
	$TextPlainPassword = "";
	$Salt = Configuration::GetSalt();
	$Challenge = "";
	$SessionChallenge = "EadChallenge";

    $Status = "";

    // Helper functions.

    // Determine whether or not the specified String is a valid Login Name.
    function IsValidLoginName($String, &$Status)
    {
        $IsValid = false;

        $Length = strlen($String);

        if ($Length > 0)
        {
            if ($Length <= 30)  // TODO: Determine Max Length - e.g. Configuration?
                $IsValid = true;
            else
            {
                $IsValid = false;
                $Status = "Too many characters in the Login Name.";
            }
        }

        return $IsValid;
    }

    // Determine whether or not the specified String is a valid Password.
    function IsValidPassword($String, &$Status)
    {
        $IsValid = false;

        $Length = strlen($String);

        if ($Length > 0)
        {
            if ($Length <= 30)  // TODO: Determine Max Length - e.g. Configuration?
                $IsValid = true;
            else
            {
                $IsValid = false;
                $Status = "Too many characters in the Password.";
            }
        }

        return $IsValid;
    }

    // Get down to work.

	session_start();
	
    if (! $Utility->IsPostBack()) // Not in PostBack, so first time, so initialise relevant items.
    {
		AccessControl::EnsureSecure();	// Ensure we are in HTTPS if it is available.
		
		$Challenge = Utility::NewGuid();
		$_SESSION[$SessionChallenge] = $Challenge;
    }
    else    // Else in PostBack, so validate the fields and then login if appropriate.
    {
		if (AccessControl::CheckSecure())	// Only continue if we are as Secure as we can be, Otherwise suggests tampering.
		{
			$TextLoginName = trim($_POST["TextLoginName"]);
			$TextPlainPassword = $_POST["TextPlainPassword"];
			$TextPasswordType = $_POST["HiddenPasswordType"];
			$TextHashedPassword = $_POST["HiddenPassword"];
			$Challenge = $_SESSION[$SessionChallenge];
			
			// Validate the data.
			$IsValid = false;
			$Status = "All fields are required.";

			switch ($TextPasswordType)
			{
			case "1" :	// Plain Password.
			
				if (IsValidLoginName($TextLoginName, $Status) && IsValidPassword($TextPlainPassword, $Status))	// If the data is valid we can attempt to Login.
				{
					if (($TextLoginName == "q") && ($TextPlainPassword == "q"))	// Authenticated.
					{
						$IsValid = true;
					}
					else
					{
						$Status = "Authentication Failed.";
					}
				}
				break;
				
			case "2" :	// SHA-512 Hashed Password.
			
				if (IsValidLoginName($TextLoginName, $Status))
				{
					if ($TextLoginName == "q")
					{
						$ValidHashedPassword = strtoupper(hash("SHA512", strtoupper(hash("SHA512", "q" . $Salt)) . $Challenge));
						
						if ($TextHashedPassword == $ValidHashedPassword)	// Authenticated.
							$IsValid = true;
					}
					
					if (! $IsValid)
						$Status = "Authentication Failed.";
				}
				break;
				
			default :	// Invalid => Tampering?
			
				$IsValid = false;
				$Status = "Authentication Failed.";
				break;
			}
			
			if ($IsValid)
			{
				AccessControl::Login();
				Utility::Redirect(Configuration::GetPostLoginPage());
			}
		}
		else	// Pretend that all Authentication fails, in case tampering is involved.
		{
			$Status = "Authentication Failed.";
		}
    }
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
        <title>Eadent - Login</title>
		<!-- For the latest jQuery at Google (for https loading support), refer to: http://code.google.com/apis/libraries/devguide.html -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
		<!-- The following, whilst the original/main site, does not support https loading:
		<script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
		-->
		<script src="JavaScript/UtilityHashC.js" type="text/javascript"></script>
		<script src="JavaScript/UtilityHash.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="Css/Eadent.css" />
		<script type="text/javascript">
		<!--
		// Perform relevant jQuery activity only when the Document and DOM are ready.
		$(document).ready(function()
		{
			// Change the Login Button Text, now that JavaScript is enabled.
			$("#ButtonLogin").val("Login");
			
			// Cause the initial Input Focus to go to the relevant Text Box.
			$("#TextLoginName").focus();
		});

		var Salt = "<?php echo $Salt; ?>";
		var Challenge = "<?php echo $Challenge; ?>";
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
        <form action='<?php echo $_SERVER[PHP_SELF]; ?>' method='post'>
        <div>
			<p>
            All fields are required: <?php echo $Status; ?>
			</p>
            Login Name:
            <input id='TextLoginName' name='TextLoginName' type='text' maxlength='30' style='width: 300px;' value='<?php echo $TextLoginName; ?>' /><br /><br />
            Password:
            <input id='TextPlainPassword' name='TextPlainPassword' type='password' maxlength='30' style='width: 300px;' value='<?php echo $TextPlainPassword; ?>' /><br /><br />
			<input id="HiddenPasswordType" name="HiddenPasswordType" type="hidden" value="1" />
			<input id="HiddenPassword" name="HiddenPassword" type="hidden" />
			<noscript><p>WARNING: If you continue with the Login, your password will be sent in plain text format.<br /></p></noscript>
            <input id='ButtonLogin' name='ButtonLogin' type='submit' value='Login With Plain Text Password' onclick="PerformHash();" /><br />
        </div>
        </form>
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
