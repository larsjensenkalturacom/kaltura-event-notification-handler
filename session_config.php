<?php

/*********************** ACCOUNT CONFIGURATION START ***********************/

// Kaltura account ID (partner ID)
const KALTURA_PARTNER_ID = YOUR_PARTNER_ID; // Replace with your own partner id

// Kaltura account admin secret
const KALTURA_ADMIN_SECRET = 'YOUR_ADMIN_SECRET'; // Replace with your own key

// Kaltura service URL (can be changed to work with on-prem deployments)
const KALTURA_SERVICE_URL = 'https://www.kaltura.com/';

/************************ ACCOUNT CONFIGURATION END ************************/

/**
 * Generic helper function that returns a Kaltura API client
 * 
 * @param Kaltura\Client\Enum\SessionType $sessionType
 * @param String $userId
 * @param Int $sessionExpiry
 * @param String $sessionPrivileges
 * 
 * @return Kaltura\Client\Client object with a valid KS according to the supplied parameters
 */
function getClient($sessionType, $userId = '', $sessionExpiry = 86400, $sessionPrivileges = '') {
	
	// Create KalturaClient object using the account configuration
	$config = new Kaltura\Client\Configuration();
	$config->setServiceUrl(KALTURA_SERVICE_URL);
	$client = new Kaltura\Client\Client($config);
	
	// Generate KS string locally, without calling the API
	$ks = $client->generateSession(
		KALTURA_ADMIN_SECRET,
		$userId,
		$sessionType,
        KALTURA_PARTNER_ID,
		$sessionExpiry,
		$sessionPrivileges
	);
	
	// Sets the generated KS to be used for future API calls from this Kaltura\Client\Client object
	$client->setKs($ks);
	
	// Returns the KalturaClient object
	return $client;
}