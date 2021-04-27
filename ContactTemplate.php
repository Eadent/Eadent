<?php
//---------------------------------------------------------------------------
// Copyright © 2011-2011 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created: Eamonn A. Duffy, 8-Feb-2011. [PHP]
//
// Purpose: A Contact page template.
//
// Note:    Must do any checks before even a single character of HTML Page is emitted in case we
//          want to set cookies or redirect location.
//
//---------------------------------------------------------------------------

//---------------------------------------------------------------------------
// CONFIGURATION: BEGIN
//---------------------------------------------------------------------------
// Some Configuration.
// Change appropriately/as-required for each deployment.
//---------------------------------------------------------------------------
    $Domain = "www.Ghis.eu";
    $ToEMailAddress = "Eamonn@Duffy.name";
    $UseAccessCode = true;
//---------------------------------------------------------------------------
// CONFIGURATION: END
//---------------------------------------------------------------------------

    // Some definitions.
    $SendStateNotSent = "1";
    $SendStateSent    = "2";

    // Some other variables.
    $AccessCode = "";
    $DisplayedAccessCode = "";

    $TextName = "";
    $TextEMailAddress = "";
    $TextMessage = "";
    $TextAccessCode = "";
    $TextPageState = "";

    $Status = "";

    $MessageSubmitted = false;

    // Helper functions.

    // Create a New Guid.
    // Example: 9a2de96d761a475684b78ce34484f0dc
    // Credits: mimec 25-Aug-2006 08:36 at http://php.net/manual/en/function.uniqid.php [As of 11-Feb-2011].
    function NewGuid()
    {
        return sprintf( '%04x%04x%04x%04x%04x%04x%04x%04x',
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0fff ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
    }

    // Encode the Page State using the specified parameters as payload inputs.
    function EncodePageState(&$TextPageState, $Guid, $SendState)
    {
        $TextPageState = $Guid . $SendState;
    }

    // Decode the Page State using the specified parameters as payload outputs.
    function DecodePageState(&$Guid, &$SendState, $TextPageState)
    {
        $GuidLength = 32;   // e.g. 9a2de96d761a475684b78ce34484f0dc
        $Guid = substr($TextPageState, 0, $GuidLength);
        $SendState = substr($TextPageState, $GuidLength, 1);
    }

    // Generate the Access Code and Displayed Access Code from the specified GUID.
    function GenerateAccessCode(&$AccessCode, &$DisplayedAccessCode, $Guid)
    {
        $AccesssCode = "";
        $DisplayedAccessCode = "";
        
        // Example GUID: 9a2de96d761a475684b78ce34484f0dc

        $Char = substr($Guid, 17, 1);
        $AccessCode = $Char;
        $DisplayedAccessCode = $Char . "\n";
        $Char = substr($Guid, 5, 1);
        $AccessCode .= $Char;
        $DisplayedAccessCode .= $Char . "\n";
        $Char = substr($Guid, 30, 1);
        $AccessCode .= $Char;
        $DisplayedAccessCode .= $Char . "\n";
        $Char = substr($Guid, 22, 1);
        $AccessCode .= $Char;
        $DisplayedAccessCode .= $Char;
    }
    
    // Return the fully qualified URL for the current page.
    function GetUrl()
    {
        if ($_SERVER["HTTPS"] == "on")
            $Url = "https://";
        else
            $Url = "http://";

        $Url .= $_SERVER["HTTP_HOST"];
        $Url .= $_SERVER["REQUEST_URI"];

        return $Url;
    }

    // Determine whether or not we are in an HTTP Post Back.
    function IsPostBack()
    {
        $IsPostBack = false;

        if (strtolower($_SERVER['REQUEST_METHOD']) == "post")
            $IsPostBack = true;

        return $IsPostBack;
    }

    // Get the UTC Date and Time formatted as strings.
    function GetUtcDateAndTime(&$UtcDate, &$UtcTime)
    {
        $TimeStamp = time();

        $UtcDate = gmdate("j-M-Y", $TimeStamp);     // Example: "2-Jun-2010".
        $UtcTime = gmdate("g:i:s A", $TimeStamp);   // Example: "7:15:20 PM".
    }

    // Determine whether or not the specified String is a valid Name or E-Mail [Address].
    function IsValidNameOrEMail($String, &$Status)
    {
        $IsValid = false;

        $Length = strlen($String);

        if ($Length > 0)
        {
            if ($Length <= 100)  // TODO: Determine Max Length - e.g. Configuration?
                $IsValid = true;
            else
            {
                $IsValid = false;
                $Status = "Too many characters in the Name or E-Mail Address.";
            }
        }

        return $IsValid;
    }

    // Determine whether or not the specified String is a valid Message.
    function IsValidMessage($String, &$Status)
    {
        $IsValid = false;

        $Length = strlen($String);

        if ($Length > 0)
        {
            if ($Length <= 5000) // TODO: Determine Max Length - e.g. Configuration?
                $IsValid = true;
            else
            {
                $IsValid = false;
                $Status = "Too many characters in the Message.";
            }
        }
        
        return $IsValid;
    }

    // Determine whether or not the specified String is a valid Access Code.
    function IsValidAccessCode($String, &$Status)
    {
        $IsValid = false;

        $Length = strlen($String);

        if ($Length > 0)
        {
            if ($Length <= 4) // TODO: Determine Max Length - e.g. Configuration?
                $IsValid = true;
            else
            {
                $IsValid = false;
                $Status = "Too many characters in the Access Code.";
            }
        }

        return $IsValid;
    }

    // Get down to work.

    $Url = GetUrl();

    if (! IsPostBack()) // Not in PostBack, so first time, so initialise relevant items.
    {
        $Guid = NewGuid();
        EncodePageState($TextPageState, $Guid, $SendStateNotSent);
        GenerateAccessCode($AccessCode, $DisplayedAccessCode, $Guid);
    }
    else    // Else in PostBack, so validate the fields and then send e-mail if appropriate.
    {
        $TextName = trim($_POST["TextName"]);
        $TextEMailAddress = trim($_POST["TextEMailAddress"]);
        $TextMessage = trim($_POST["TextMessage"]);
        $TextAccessCode = trim($_POST["TextAccessCode"]);
        $TextPageState = trim($_POST["TextPageState"]);

        DecodePageState($Guid, $SendState, $TextPageState);
        GenerateAccessCode($AccessCode, $DisplayedAccessCode, $Guid);

        // Validate the data.
        $IsValid = false;
        $Status = "All fields are required.";

        if (IsValidNameOrEMail($TextName, $Status) && IsValidNameOrEMail($TextEMailAddress, $Status) &&
            IsValidMessage($TextMessage, $Status))
        {
            if ($UseAccessCode)
            {
                if (IsValidAccessCode($TextAccessCode, $Status))
                {
                    if ($TextAccessCode == $AccessCode)
                        $IsValid = true;
                    else
                    {
                        $IsValid = false;
                        $Status = "Invalid Access Code.";
                    }
                }
                else
                {
                    $IsValid = false;
                }
            }
            else
            {
                $IsValid = true;
            }
        }
        else
        {
            $IsValid = false;
        }

        if ($IsValid)   // If the data is valid we can attempt to send the e-mail, if it has not already been sent.
        {
            if ($SendState == $SendStateNotSent)  // The message has not been submitted yet.
            {
                $UtcDate = "";
                $UtcTime = "";
                GetUtcDateAndTime($UtcDate, $UtcTime);

                $Subject = "$Domain: Someone has sent a message from the web.";

                $Message =  "Name: $TextName\r\n" .
                            "E-Mail: $TextEMailAddress\r\n" .
                            "Date (UTC): $UtcDate\r\n" .
                            "Time (UTC): $UtcTime\r\n" .
                            "Domain: $Domain\r\n" .
                            "Url: $Url\r\n" .
                            "Guid: $Guid\r\n" .
                            "Message:\r\n\r\n$TextMessage";

                $Sent = mail($ToEMailAddress, $Subject, $Message);

                if ($Sent)
                {
                    $MessageSubmitted = true;
                    EncodePageState($TextPageState, $Guid, $SendStateSent);
                    $Status = "&nbsp;The message has been submitted.&nbsp;";
                }
                else
                    $Status = "The Server E-Mail system was unable to send the message.";
            }
            else    // Error case.
                $Status = "&nbsp;ERROR: The message has already been submitted.&nbsp";
        }
    }
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Contact</title>
        <!-- For the latest jQuery at Google (for https loading support), refer to: http://code.google.com/apis/libraries/devguide.html -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
        <!-- The following, whilst the original/main site, does not support https loading:
        <script src="http://code.jquery.com/jquery-latest.pack.js" type="text/javascript"></script>
        -->
	<script type="text/javascript">
	<!--
	// Perform relevant jQuery activity only when the Document and DOM are ready.
	$(document).ready(function()
	{
            // Cause the initial Input Focus to go to the relevant Text Box.
            $("#TextName").focus();
        });
        //-->
        </script>
    </head>
    <body>
        <form action='<?php echo $_SERVER[PHP_SELF]; ?>' method='post'>
        <div>
            Contact<br /><br />
            All fields are required: <?php echo $Status; ?><br /><br />
            Name:<br />
            <input id='TextName' name='TextName' type='text' maxlength='100' style='width: 700px;' value='<?php echo $TextName; ?>' /><br /><br />
            E-Mail Address:<br />
            <input id='TextEMailAddress' name='TextEMailAddress' type='text' maxlength='100' style='width: 700px;' value='<?php echo $TextEMailAddress; ?>' /><br /><br />
            Message (Max. 5000 characters):<br />
            <textarea id='TextMessage' name='TextMessage' rows='7' cols='85'><?php echo $TextMessage; ?></textarea><br /><br />
            <?php
            if ($UseAccessCode)
            {
            ?>
                Access Code:<br />
                <?php echo $DisplayedAccessCode; ?><br /><br />
                Enter Access Code (without spaces):<br />
                <input id='TextAccessCode' name='TextAccessCode' type='text' maxlength='4' style='width: 80px;' value='<?php echo $TextAccessCode; ?>' /><br /><br />
            <?php
            }
            ?>
            <input id="TextPageState" name="TextPageState" type="hidden" value="<?php echo $TextPageState; ?>" />
            (NOTE: A message may take an hour or more to arrive.)<br /><br />
            <input id='ButtonSubmit' name='ButtonSubmit' type='submit' value='Submit Message'
            <?php
            if ($MessageSubmitted)
                echo "disabled='disabled' ";
            ?>/><br />
            <p>
                <script type="text/javascript">
                <!--
                    document.write("<a href='http://validator.w3.org/check?uri=" + location.href + "'><img\n");
                    document.write("style='border:0;width:88px;height:31px'\n");
                    if (location.protocol == "https:")
                        document.write("src='https://www.w3.org/Icons/valid-xhtml10'\n");
                    else
                        document.write("src='http://www.w3.org/Icons/valid-xhtml10'\n");
                    document.write("alt='Valid XHTML 1.0 Strict' /></a>\n");
                    if (location.protocol == "https:")
                        document.write("<a href='http://jigsaw.w3.org/css-validator/validator?uri=" + location.href + "'>Validate CSS</a>\n");
                    else
                    {
                        document.write("<a href='http://jigsaw.w3.org/css-validator/validator?uri=" + location.href + "'><img\n");
                        document.write("style='border:0;width:88px;height:31px'\n");
                        document.write("src='http://jigsaw.w3.org/css-validator/images/vcss'\n");
                        document.write("alt='Valid CSS!' /></a>\n");
                    }
                //-->
                </script>
            </p>
        </div>
        </form>
    </body>
</html>

<?php
//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
