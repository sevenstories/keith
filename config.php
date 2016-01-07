<?php

/**
 * Change this to be the hostname
 */
define("HOST", "localhost");

/**
 * Change this to be the username
 */
define("USER","user");

/**
 * Change this to be the password
 */
define("PASS","password");

/**
 * Change this to be the name of database
 */
define("DATABASE","clients");

/**
 * Change this to be the name of table getting queried
 */
define("TABLE","clients");

/**
 * Change this to be the name of the post variable holding the serial number
 */
define("POST_SERIAL","sn");

/**
 * Change this to be the name of the post variable holding the client id
 */
define("POST_CLIENT","cliid");

/**
 * Change this to be the name customer id field in the database
 */
define("DB_CUSTOMER","customer_id");

/**
 * Change this to be the name of serial number field in the database
 */
define("DB_SERIAL","serial");

/**
 * Change this to be the name of the expiry field in the database
 */
define("DB_EXPIRY","expiry");

/**
 * Change this to be good reponse (integer)
 */
define("GOOD_RESPONSE",600);
/**
 * Change this to be the bad response (integer)
 */
define("BAD_RESPONSE",601);

/**
 * Dont change this one. It's here just because
 */
define("QUERY", "SELECT * FROM %s WHERE %s='%s' AND %s='%s' AND %s >= CURDATE();");

function Query($client, $serial, $link)
{
    $qry =  sprintf(QUERY, TABLE, DB_CUSTOMER,mysqli_real_escape_string($link,$client),DB_SERIAL,mysqli_real_escape_string($link,$serial),DB_EXPIRY);
    $result = mysqli_query($link,$qry);
    return mysqli_num_rows($result);
}

function check($post_data)
{
    $link = mysqli_connect(HOST, USER, PASS, DATABASE);
    mysqli_select_db ($link , DATABASE);
    $result = Query($post_data[POST_CLIENT], $post_data[POST_SERIAL], $link);
    if($result > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}