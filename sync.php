<?php

use Kaltura\Notification\Handler\SyncEntry;
use Kaltura\Notification\Processor;
use Kaltura\Output\Console;
use Kaltura\Notification\Exception;

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

//instantiation to prevent PHP storm warning
$handlerParams = array();
$entryid = '';
$pid    = '';
$userid = '';
$jobid  = '';
$eventtype = '';

require_once('session_config.php');
require_once('script_config.php');
require_once('lib/autoload.php');

// Create console in order to log activity
$console = new Console();
$console->startLog();

try {
    if (!count($_POST)) {
		$console->log('No notification params');
		$console->log();
		$console->log('=============');
		$console->log('  ALL DONE!');
		$console->endLog('=============');
	} else {
        $myparams = $_POST;
    }
		// Instantiate a notification processor object
		// First param is the notification parameters
		// Second param is validateSignature of the notification (make sure it comes from Kaltura)
		// Third param is the Kaltura admin secret
        $acounter = 0;
        foreach($myparams as $i){
            $acounter++;
            $console->log('param'.$acounter.': '.$i);
            //Building a preg match since unserialize is causing trouble >.<
            $starter = '/O:23:';
            $preentryid = 's:2:"id";s:10:"';
            $postentryid = '";s:4:"name"';
            $prepid = '";s:9:"partnerId";i:';
            $myregex = $starter.'.+?'.$preentryid.'([0-9a-z\_]{10})'.$postentryid.'.+?'.$prepid;
            $myregex .= '([0-9]+)/';
            if(strlen($i) > 20)
                $pregresult = preg_match($myregex, trim($i,'\n\t\r\v\0'), $matches);
            $console->log('regex'.$acounter.': '.$myregex);
            foreach($matches as $j)
                $console->log('matches: '.$j);
            if($pregresult)
            {
                $entryid = $matches[1];
                $pid    = $matches[2];
                $userid = $matches[3];
                $jobid  = time();
                $eventtype = 3;
            } else {
                $console->log('preg match failed');
            }
        }
        $params = array();
        $params['id'] = $jobid;
        $params['notification_type'] = $eventtype;
        $params['partnerId'] = $pid;
        $params['entry_id'] = $entryid;
        foreach($params as $i)
            $console->log('param:'.$i);

        // This will set up the notification client and check the notification signature
		$notificationProcessor = new Processor($params, false, KALTURA_ADMIN_SECRET);

		// Setting up handler for 'entry_update' notification type
        // LARS: ALL notification type
		$syncEntryHandler = new SyncEntry();//(Type::NOTIFICATION_TYPE_ENTRY_UPDATE);
		// Passing console to the handler, so it can log as well
		$syncEntryHandler->setConsole($console);
		// Passing extra parameters from the config to the handler
		$syncEntryHandler->addData($handlerParams);

		// Adding handler to the notification processor
		// Note that you can set up multiple handlers, the processor will execute them in order
		$notificationProcessor->addHandler($syncEntryHandler);

		// Processing notification handler(s)
		$notificationProcessor->execute();

		$console->log();
		$console->log('=============');
		$console->log('  ALL DONE!');
		$console->endLog('=============');
	//}
} catch (Exception $e) {
	$console->log();
	$console->timeLog("\n");
	$console->log('  /!\\ An error occurred!');
	$console->log('  '.$e->getCode().': '.$e->getMessage());
	$console->log('  '.$e->getTraceAsString());
	$console->log();
	$console->log('  ======================================');
	$console->log('  END WITH ERRORS');
	$console->endLog('  ======================================');
}

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
$console->log( 'Page generated in ' . $total_time . ' seconds.');