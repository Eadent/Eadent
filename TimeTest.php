<?php
//---------------------------------------------------------------------------
// Copyright © 2011-2011 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created: Eamonn A. Duffy, 10-Feb-2011. [PHP]
//
// Purpose: A Time and Date Testing page.
//
//---------------------------------------------------------------------------

    require_once("_ns_Eadent/Configuration.class.php");
    require_once("_ns_Eadent/AssemblyInfo.class.php");

    require_once("_ns_EamonnDuffy/Utility.class.php");

    Utility::CheckForMaintenanceMode();

    $Utility = new Utility();
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Time Test</title>
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
        });
        //-->
        </script>
    </head>
    <body>
        <form action='<?php echo $_SERVER[PHP_SELF]; ?>' method='post'>
        <div>
            [Server UTC]
            <?php
                    echo $Utility->GetLongDate();
                    echo " - ";
                    echo $Utility->GetLongTime();
            ?>
            <script type="text/javascript">
            <!--
                var BrowserNow = new Date();
                document.write(" - [Browser] " + BrowserNow.toDateString() + " - " + BrowserNow.toTimeString());
            //-->
            </script>
            <br /><br />
            <p style="font-family: Courier New, monospace;">
            <?php
                $TimeStamp = time();

                echo "TimeStamp = $TimeStamp<br />\n";
                echo "<br />\n";
                echo "gmdate(\"l\", TimeStamp) = " . gmdate("l", $TimeStamp) . "<br />\n";
                echo "&nbsp;&nbsp;date(\"l\", TimeStamp) = " . date("l", $TimeStamp) . "<br />\n";
                echo "<br />\n";
                echo "gmdate(\"j-M-Y\", TimeStamp) = " . gmdate("j-M-Y", $TimeStamp) . "<br />\n";
                echo "&nbsp;&nbsp;date(\"j-M-Y\", TimeStamp) = " . date("j-M-Y", $TimeStamp) . "<br />\n";
                echo "<br />\n";
                echo "gmdate(\"g:i:s A\", TimeStamp) = " . gmdate("g:i:s A", $TimeStamp) . "<br />\n";
                echo "&nbsp;&nbsp;date(\"g:i:s A\", TimeStamp) = " . date("g:i:s A", $TimeStamp) . "<br />\n";
                echo "<br />\n";
            ?>
            </p>
            <br />
            Copyright &copy; 2011<script type="text/javascript">
            <!--
                if (BrowserNow.getFullYear() > 2011)
                    document.write("-" + BrowserNow.getFullYear());
            //-->
            </script>
            Eamonn Duffy. All Rights Reserved.
            <p>
                <script type="text/javascript">
                <!--
                    document.write("<a href='http://validator.w3.org/check?uri=" + location.href + "'><img\n");
                    document.write("style='border:0;width:88px;height:31px'\n");
                    document.write("src='https://www.w3.org/Icons/valid-xhtml10'\n");
                    document.write("alt='Valid XHTML 1.0 Strict' /></a>\n");
                    if (location.protocol == "https:")
                    {
                        document.write("<a href='http://jigsaw.w3.org/css-validator/validator?uri=" + location.href + "'>Validate CSS</a>\n");
                    }
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
    include_once("HostingFooter.php");

//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
