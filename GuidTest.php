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

/*
http://php.net/manual/en/function.uniqid.php

dholmes at cfdsoftware dot net 09-May-2006 03:26 
WARNING : I believe there are a couple of mistakes in the function provided just below by maciej dot strzelecki at gmail dot com. Namely, that in the two substr_replace() calls, the third parameters should respectively be 12 (instead of 11) and 6 (instead of 5).

Considering the importance of this function, I went to read RFC 4122 myself, and found the discrepancy. I therefore chose to write my own function, inspired by the previous one, but with a few enhancements detailed in the comments. On the downside, it might be slightly less easy to understand at first glance.

Please feel free to use it yourself. Thank you also in advance for any feedback at dholmes at cfdsoftware.net .
*/
/**
 * Generates a Universally Unique IDentifier, version 4.
 * 
 * RFC 4122 (http://www.ietf.org/rfc/rfc4122.txt) defines a special type of Globally
 * Unique IDentifiers (GUID), as well as several methods for producing them. One
 * such method, described in section 4.4, is based on truly random or pseudo-random
 * number generators, and is therefore implementable in a language like PHP.
 * 
 * We choose to produce pseudo-random numbers with the Mersenne Twister, and to always
 * limit single generated numbers to 16 bits (ie. the decimal value 65535). That is
 * because, even on 32-bit systems, PHP's RAND_MAX will often be the maximum *signed*
 * value, with only the equivalent of 31 significant bits. Producing two 16-bit random
 * numbers to make up a 32-bit one is less efficient, but guarantees that all 32 bits
 * are random.
 * 
 * The algorithm for version 4 UUIDs (ie. those based on random number generators)
 * states that all 128 bits separated into the various fields (32 bits, 16 bits, 16 bits,
 * 8 bits and 8 bits, 48 bits) should be random, except : (a) the version number should
 * be the last 4 bits in the 3rd field, and (b) bits 6 and 7 of the 4th field should
 * be 01. We try to conform to that definition as efficiently as possible, generating
 * smaller values where possible, and minimizing the number of base conversions.
 * 
 * @copyright   Copyright (c) CFD Labs, 2006. This function may be used freely for
 *              any purpose ; it is distributed without any form of warranty whatsoever.
 * @author      David Holmes <dholmes@cfdsoftware.net>
 * 
 * @return  string  A UUID, made up of 32 hex digits and 4 hyphens.
 */

	function dholmes_uuid() {
		
		// The field names refer to RFC 4122 section 4.1.2

		return sprintf('%04x%04x-%04x-%03x4-%04x-%04x%04x%04x',
			mt_rand(0, 65535), mt_rand(0, 65535), // 32 bits for "time_low"
			mt_rand(0, 65535), // 16 bits for "time_mid"
			mt_rand(0, 4095),  // 12 bits before the 0100 of (version) 4 for "time_hi_and_version"
			bindec(substr_replace(sprintf('%016b', mt_rand(0, 65535)), '01', 6, 2)),
				// 8 bits, the last two of which (positions 6 and 7) are 01, for "clk_seq_hi_res"
				// (hence, the 2nd hex digit after the 3rd hyphen can only be 1, 5, 9 or d)
				// 8 bits for "clk_seq_low"
			mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535) // 48 bits for "node"  
		);  
	}

/*
mimec 25-Aug-2006 08:36 
Here is the correct version of a function generating a pseudo-random UUID according to RFC 4122:
*/
	function mimec_uuid()
	{
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
	}

?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>GUID Test</title>
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
            <?php
				$Guid = "";
				
				echo "<table style='font-family: Courier New, monospace;'>";

				echo "<tr><td>dholmes</td><td></td><td>mimec</td></tr>\n";
				
				for ($Index = 0; $Index < 40; $Index++)
				{
					echo "<tr>";
					echo "<td>" . dholmes_uuid() . "</td>";
					echo "<td>&nbsp;&nbsp;</td>";
					echo "<td>" . mimec_uuid() . "</td>";
					echo "</tr>\n";
				}

				echo "</table>";

				echo "<p style='font-family: Courier New, monospace;'>\n";
					
				function exception_error_handler($errno, $errstr, $errfile, $errline )
				{
					throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
				}
				set_error_handler("exception_error_handler");

				// TODO: c.f.: http://www.php.net/manual/en/class.errorexception.php
				// TODO: Especially re. set_error_handler().
				try
				{
					if (function_exists("uuid_create"))
						uuid_create($Guid);

					$Result = 3 / 0;
				}
				catch (Exception $Exception)
				{
					echo "<br />Exception = " . $Exception->getMessage() . "<br />\n";
				}
				
				echo "</p>\n";
            ?>
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
