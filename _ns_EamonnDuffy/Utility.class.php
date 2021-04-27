<?php
//---------------------------------------------------------------------------
// Copyright © 2009-2011 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created:	Eamonn A. Duffy, 29-Sep-2009. [C#]
//              Eamonn A. Duffy, 27-Apr-2010. [PHP]
//
// Purpose:	Utility methods.
//
//---------------------------------------------------------------------------

//namespace EamonnDuffy
//{
    class Utility   // TODO: Place in a folder hierarchy that provides some namespace. 5.3 allegedly has native namespace support.
    {
        // Instance Data.
        private $m_TimeStamp = null;  // A TimeStamp as returned by time().

        // Lifetime.
        public function __construct()
        {
            $this->m_TimeStamp = time();    // Returns the number of seconds since 1-Jan-1970 GMT (and hence UTC).
        }

        public function GetTimeStamp()
        {
            return $this->m_TimeStamp;
        }

        // Instance Helper methods.

        // Example: "Wednesday".
        public function GetDay()
        {
            return gmdate("l", $this->m_TimeStamp);
        }

        // Example: "2-Jun-2010".
        public function GetDate()
        {
            return gmdate("j-M-Y", $this->m_TimeStamp);
        }

        // Example: "7:15:20 PM".
        public function GetTime()
        {
            $Return = gmdate("g:i:s A", $this->m_TimeStamp);
            return $Return;
        }

        // Example: "Wednesday, 2-Jun-2010".
        public function GetLongDate()
        {
            return gmdate("l, j-M-Y", $this->m_TimeStamp);
        }

        // Example: "4:25:39 PM".
        public function GetLongTime()
        {
            $Return = gmdate("g:i:s A", $this->m_TimeStamp);
            return $Return;
        }

        // TODO: Review and Unit Test the various methods.
        // TODO: Consider limiting the lowest time to milliseconds not microseconds.

        // Example: "2010/06/02 19:16:52:123456".
        public static function GetPersistentDateTimeStatic($TimeStamp)
        {
            return gmdate("Y/m/d H:i:s:u", $TimeStamp);
        }

        // Example: "2010/06/02 19:16:52:123456".
        public function GetPersistentDateTime()
        {
            return GetPersistentDateTimeStatic($this->m_TimeStamp);
        }

        public function GetCopyrightYears()
        {
            // NOTE: The following relies on the fact that a relevant AssemblyInfo.class.php file will have
            //       been included before this class/file is parsed.
            $Years = AssemblyInfo::CopyrightStartYear;

            $ThisYear = (int)gmdate("Y", $this->m_TimeStamp);

            if ($ThisYear != AssemblyInfo::CopyrightStartYear)
                $Years .= "-".$ThisYear;

            return $Years;
        }

        public static function GetVersion()
        {
            // NOTE: The following relies on the fact that a relevant AssemblyInfo.class.php file will have
            //       been included before this class/file is parsed.
            return "V" . AssemblyInfo::VersionMajor . "." . AssemblyInfo::VersionMinor . "." . AssemblyInfo::VersionBuild;
        }

        public function GetEamonnNumYears()
        {
            $ThisYear = (int)gmdate("Y", $this->m_TimeStamp);
            $ThisMonth = (int)gmdate("n", $this->m_TimeStamp);

            $EamonnNumYears = 0;
            $PiersNumYears = 0;

            // I am choosing 1-Nov-1988 as the reference. This should give a month or so leeway for the "at least" qualification.
            if (($ThisMonth >= 1) && ($ThisMonth <= 10))
                $EamonnNumYears = $ThisYear - 1988 - 1;
            else
                $EamonnNumYears = $ThisYear - 1988;

            if ($EamonnNumYears < 0)
                $EamonnNumYears = 21;

            $PiersNumYears = $EamonnNumYears - 4;

            return trim($EamonnNumYears);
        }

        // Return the string representing the Consumer [or Client/Remote] Address.
        public static function GetConsumerAddress()
        {
            $ConsumerAddress = $_SERVER["REMOTE_ADDR"];

            if ($ConsumerAddress == null)
                $ConsumerAddress = "Unknown: REMOTE_ADDR is null.";
            else
            {
                $ConsumerAddress = Trim($ConsumerAddress);

                if (empty($ConsumerAddress))
                    $ConsumerAddress = "Unknown: REMOTE_ADDR is empty.";
            }

            return $ConsumerAddress;
        }

        // Return the string representing the Provider [or Server/Local] Address.
        public static function GetProviderAddress()
        {
            $ProviderAddress = $_SERVER["SERVER_ADDR"];

            if ($ProviderAddress == null)
                $ProviderAddress = "Unknown: SERVER_ADDR is null.";
            else
            {
                $ProviderAddress = Trim($ProviderAddress);

                if (empty($ProviderAddress))
                    $ProviderAddress = "Unknown: SERVER_ADDR is empty.";
            }

            return $ProviderAddress;
        }

        // Return the string representing the HTTP User Agent.
        public static function GetHttpUserAgent()
        {
            $HttpUserAgent = $_SERVER["HTTP_USER_AGENT"];

            if ($HttpUserAgent == null)
                $HttpUserAgent = "Unknown: HTTP_USER_AGENT is null.";
            else
            {
                $HttpUserAgent = Trim($HttpUserAgent);

                if (empty($HttpUserAgent))
                    $HttpUserAgent = "Unknown: HTTP_USER_AGENT is empty.";
            }

            return $HttpUserAgent;
        }

        // Determine whether or not we are in HTTPS.
		public static function IsHttps()
		{
			return ($_SERVER["HTTPS"] == "on");
		}
		
		// Determine whether or not we are in an HTTP Post Back.
        public static function IsPostBack()
        {
            $IsPostBack = false;

            if (strtolower($_SERVER['REQUEST_METHOD']) == "post")
                $IsPostBack = true;

            return $IsPostBack;
        }

        // Return the fully qualified URL for the current page.
        public static function GetUrl()
        {
            if ($_SERVER["HTTPS"] == "on")
                $Url = "https://";
            else
                $Url = "http://";

            $Url .= $_SERVER["HTTP_HOST"];
            $Url .= $_SERVER["REQUEST_URI"];

            return $Url;
        }
		
		// Return a fully qualified HTTPS version of the URL for the current page.
		public static function GetHttpsUrl()
		{
            $Url = "https://";
            $Url .= $_SERVER["HTTP_HOST"];
            $Url .= $_SERVER["REQUEST_URI"];

            return $Url;
		}
		
		// Redirect the user to the specified Url.
		public static function Redirect($Url)
		{
			header("Location: " . $Url);
			exit(0);
		}

        // Determine whether or not we are in Maintenance Mode and take appropriate action(s) accordingly.
        public static function CheckForMaintenanceMode()
        {
            // NOTE: The following relies on the fact that a relevant Configuration.class.php file will have
            //       been included before this class/file is parsed.
            if (Configuration::GetMaintenanceMode())
            {
				self::Redirect(Configuration::GetMaintenanceUrl());
            }
        }

        // Create a New Guid.
        // Example: 9a2de96d761a475684b78ce34484f0dc
        // Credits: mimec 25-Aug-2006 08:36 at http://php.net/manual/en/function.uniqid.php [As of 11-Feb-2011].
		public static function NewGuid()
		{
			//return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			return sprintf( '%04x%04x%04x%04x%04x%04x%04x%04x',
					mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
					mt_rand( 0, 0x0fff ) | 0x4000,
					mt_rand( 0, 0x3fff ) | 0x8000,
					mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
		}
    }
//}

//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
