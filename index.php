<?php

/**
 * Put this file in the web root and the config file outside of the web root
 * Change the line below to point to the config file
 */
include 'config.php';
check(filter_input_array(INPUT_POST, array(POST_CLIENT=>FILTER_SANITIZE_STRING,POST_SERIAL=>FILTER_SANITIZE_STRING))) ? header('HTTP/1.1 '.GOOD_RESPONSE.' Accepted', true) : header('HTTP/1.1 '.BAD_RESPONSE.' Not Authorised', true);