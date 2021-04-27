<?php
//---------------------------------------------------------------------------
// Copyright © 2011-2011 Eamonn Duffy. All Rights Reserved.
//---------------------------------------------------------------------------
//
//  $RCSfile: $
//
// $Revision: $
//
// Created:	Eamonn A. Duffy, 20-Feb-2011. [PHP]
//
// Purpose:	Access Control (mainly Authentication and Authorisation) methods.
//
// Dependencies:
//
//		A relevant Configuration.class.php file will have been included before this class/file is parsed.
//		The Utility.class.php file will have been included before this class/file is parsed.
//
//---------------------------------------------------------------------------

//namespace EamonnDuffy
//{
    class AccessControl	// TODO: Place in a folder hierarchy that provides some namespace. 5.3 allegedly has native namespace support.
    {
		// Definitions.
        // Definitions.
        const SessionAuthenticated = "EadAuthenticated";
		const SessionLastAccess = "EadLastAccess";
		
		// Metaclass methods.
		
		// Check that we are as secure as we can be.
		// Out: false If HTTPS is available and we are not in HTTPS.
		//		true Otherwise.
		public static function CheckSecure()
		{
			$AsSecureAsPossible = true;

			if (Configuration::IsHttpsAvailable() && (! Utility::IsHttps()))
				$AsSecureAsPossible = false;

			return $AsSecureAsPossible;
		}
		
		// Ensure we are in HTTPS if it is available.
		public static function EnsureSecure()
		{
			if (! self::CheckSecure())	// We should be HTTPS and are not.
			{
				header("Location: " . Utility::GetHttpsUrl());
				exit(0);
			}
		}

		// Login.
		public static function Login()
		{
			session_regenerate_id();	// TODO: Analyse/Determine if this should also or only really happen following a successful Authentication.
			$_SESSION[self::SessionAuthenticated] = true;
			$_SESSION[self::SessionLastAccess] = time();
		}
		
		// Determine whether or not the user is Logged In.
		public static function IsLoggedIn()
		{
			return ($_SESSION[self::SessionAuthenticated] == true);
		}
		
		// Determine whether or not the user's session has timed out due to inactivity, and "stroke" the timer if not.
		public static function IsSessionTimedOut()
		{
			$TimedOut = false;
			
			if ((time() - $_SESSION[self::SessionLastAccess]) > Configuration::GetSessionTimeout())	// TODO: ">" or ">="?
				$TimedOut = true;
			else
				$_SESSION[self::SessionLastAccess] = time();

			return $TimedOut;
		}
		
		// Logout.
		public static function Logout()
		{
			session_destroy();
			session_regenerate_id();
		}
		
        // Lifetime.
        public function __construct()
        {
        }
    }
//}

//---------------------------------------------------------------------------
//                    End Of $RCSfile: $
//---------------------------------------------------------------------------
?>
