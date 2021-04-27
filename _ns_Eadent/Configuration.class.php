<?php
//---------------------------------------------------------------------------
// Copyright © 2010-2010 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created:	Eamonn A. Duffy, 11-Oct-2009. [C#]
//              Eamonn A. Duffy,  3-Jun-2010. [PHP]
//
// Purpose:	Provide Configuration for the following namespace:
//
//		Eadent
//
//---------------------------------------------------------------------------

    require_once("AssemblyInfo.class.php");

//namespace Eadent
//{
    class Configuration
    {
        // Definitions.
        const MaintenanceFile = "Maintenance.config";
		const HttpsAvailable = true;
		const Salt = "Orange";
		const LoginPage = "Login.php";
		const PostLoginPage = "Admin.php";
		const LogoutPage = "Logout.php";
		const SessionTimeout = 10;	// In seconds. TODO: Determine a suitable non-test value.

        // Instance Data.
        private $m_MaintenanceMode = false;
        private $m_MaintenanceUrl = "Maintenance.php";
        private $m_MaintenanceDurationMessage = "Please try again in a few moments.";

        // Metaclass Data.
        private static $m_Instance = null;

        // Lifetime.
        public function __construct()
        {
            if (file_exists(self::MaintenanceFile))
                $this->m_MaintenanceMode = true;
            else
                $this->m_MaintenanceMode = false;

            // TODO: Read items from the configuration file above if/when it exists.

            if ($this->m_MaintenanceMode)
            {
                $Dom = new DomDocument();

                if ($Dom)
                {
                    if ($Dom->load(self::MaintenanceFile))
                    {
                      if (true)
                      {
                        $Nodes = $Dom->getElementsByTagName("MaintenanceFile");

                        if ($Nodes && ($Nodes->length > 0))
                        {
                            $Node = $Nodes->item(0);

                            if ($Node)
                            {
                                $Node = $Node->firstChild;

                                while ($Node)
                                {
                                    //echo "Node Name = :{$Node->nodeName}: Node Value = :{$Node->nodeValue}: <br />";
                            
                                    if (strcasecmp($Node->nodeName, "Url") == 0)
                                        $this->m_MaintenanceUrl = $Node->nodeValue;
                                    elseif (strcasecmp($Node->nodeName, "DurationMessage") == 0)
                                        $this->m_MaintenanceDurationMessage = $Node->nodeValue;

                                    $Node = $Node->nextSibling;
                                }
                            }
                        }
                      }
                      else
                      {
                        // TODO: Learn more about XML DOM and it navigation/usage.
                        // I Do not like the following approach BUT it seems to work. Seems to.

                        $Nodes = $Dom->getElementsByTagName("Url");

                        if ($Nodes && ($Nodes->length > 0))
                        {
                            $Node = $Nodes->item(0);

                            if ($Node)
                            {
                                $this->m_MaintenanceUrl = $Node->nodeValue;
                            }
                        }

                        $Nodes = $Dom->getElementsByTagName("DurationMessage");

                        if ($Nodes && ($Nodes->length > 0))
                        {
                            $Node = $Nodes->item(0);

                            if ($Node)
                            {
                                $this->m_MaintenanceDurationMessage = $Node->nodeValue;
                            }
                        }
                      }
                    }
                }
            }
        }

        // Metaclass Helper methods.
        
        private static function SingletonInitialise()
        {
            if (self::$m_Instance == null)
                self::$m_Instance = new self();
        }

        public static function GetMaintenanceMode()
        {
            self::SingletonInitialise();

            return self::$m_Instance->m_MaintenanceMode;
        }

        public static function GetMaintenanceUrl()
        {
            self::SingletonInitialise();

            return self::$m_Instance->m_MaintenanceUrl;
        }

        public static function GetMaintenanceDurationMessage()
        {
            self::SingletonInitialise();

            return self::$m_Instance->m_MaintenanceDurationMessage;
        }
		
		// Return whether or not we have https.
		public static function IsHttpsAvailable()
		{
			return self::HttpsAvailable;
		}
		
		// Return the site Salt.
		public static function GetSalt()
		{
			return self::Salt;
		}
		
		// Return the name of the Login page.
		public static function GetLoginPage()
		{
			return self::LoginPage;
		}
		
		// Return the name of the [first] page that should appear following a successful Authentication/Login.
		public static function GetPostLoginPage()
		{
			return self::PostLoginPage;
		}
		
		// Return the name of the Logout page.
		public static function GetLogoutPage()
		{
			return self::LogoutPage;
		}
		
		// Return the [User] Session Timeout (in seconds).
		public static function GetSessionTimeout()
		{
			return self::SessionTimeout;
		}
    }
//}

//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
