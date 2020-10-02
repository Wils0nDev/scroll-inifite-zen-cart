<?php
 
$bmzConf = array();
$bmzConf['umask']       = 0111;              //set the umask for new files
$bmzConf['dmask']       = 0000;              //directory mask accordingly
//$bmzConf['cachetime']   = 60*60*24;         //maximum age for cachefile in seconds (defaults to a day)
$bmzConf['cachetime']   = 0;         //maximum age for cachefile in seconds (defaults to a day)
$bmzConf['cachedir']    = DIR_FS_CATALOG . 'bmz_cache';
$bmzConf['lockdir']     = DIR_FS_CATALOG . 'bmz_lock';

/* Safemode Hack */
$bmzConf['safemodehack'] = 0;               //read http://wiki.breakmyzencart.com/zen-cart:safemodehack !
$bmzConf['ftp']['host'] = 'localhost';
$bmzConf['ftp']['port'] = '21';
$bmzConf['ftp']['user'] = 'user';
$bmzConf['ftp']['pass'] = 'password';
$bmzConf['ftp']['root'] = DIR_FS_CATALOG;
