<?php

// Open the session
session_name('nonblocking_sessions');
session_start();

if (isset($_GET['primer'])) {
  // First AJAX call just to create the session, quit now.
  die();
}

$counter = (int) $_GET['div'];

// Read all the data from the session and close it
$username = $_SESSION['username'];

// Release the session lock: behold, fast ajax calls!
// (just don't try to write to the session after this, changes will be lost)
session_write_close();

// Do all the application logic: call 3rd party APIs, do queries,
// run all kind of wrong ORM-for-loops, ...
sleep(4);

// And done!
// No need to explicitly close the session, that's done automatically.
echo 'AJAX '. $counter;
?>
