<?php

// activate full error reporting
//error_reporting(E_ALL & E_STRICT);

include 'XMPPHP/XMPP.php';

#Use XMPPHP_Log::LEVEL_VERBOSE to get more logging for error reports
#If this doesn't work, are you running 64-bit PHP with < 5.2.6?
$conn = new XMPPHP_XMPP('im.bangwo8.com', 7222, 'username', 'password', 'xmpphp', 'im.bangwo8.com', $printlog = false, $loglevel = XMPPHP_Log::LEVEL_INFO);

try {
  $conn->connect();
  $conn->processUntil('session_start');
  $conn->presence();
  $conn->message('kf_xmpp-show@im.bangwo8.com', 'This is a test message!');
  $conn->disconnect();
} catch (XMPPHP_Exception $e) {
  die($e->getMessage());
}
