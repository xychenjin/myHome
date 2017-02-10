<?php
/**
 * Created by PhpStorm.
 * User: jim
 * Date: 2017/1/23
 * Time: 15:32
 */
return array(
    /**** CAPTCHA Appearance Options ****/

    'image_width'      => 110,       // width of captcha image in pixels
    'image_height'     => 36,        // height of captcha image in pixels
    'code_length'      => 4,         // # of characters for captcha code
    'font_ratio'       => 0.8,
    'image_bg_color'   => '#ffffff', // hex color for image background
    'text_color'       => '#707070', // hex color for captcha text
    'line_color'       => '#707070', // hex color for lines over text
    'num_lines'        => 5,         // # of lines to draw over text

    'wordlist_file'    => 'words/words.txt', // text file for word captcha
    'use_wordlist'     => false,             // true to use word list
    'wordlist_file_encoding' => null,        // character encoding of word file if other than ASCII (e.g. UTF-8, GB2312)

    // example UTF-8 charset (TTF file must support symbols being used
    // 'charset'          => "абвгдeжзийклмнопрстуфхцчшщъьюяАБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЬЮЯ",

//    'ttf_file'         => './AHGBold.ttf',   // TTF file for captcha text

    /**** Code Storage & Database Options ****/

    // true if you *DO NOT* want to use PHP sessions at all, false to use PHP sessions
    'no_session'       => false,

    // the PHP session name to use (null for default PHP session name)
    // do not change unless you know what you are doing
    'session_name'     => null,

    // change to true to store codes in a database
    'use_database'     => false,

    // database engine to use for storing codes.  must have the PDO extension loaded
    // Values choices are:
    // Securimage::SI_DRIVER_MYSQL, Securimage::SI_DRIVER_SQLITE3, Securimage::SI_DRIVER_PGSQL
    'database_driver'  => Securimage::SI_DRIVER_MYSQL,

    'database_host'    => 'localhost',     // database server host to connect to
    'database_user'    => 'root',          // database user to connect as
    'database_pass'    => '',              // database user password
    'database_name'    => 'securimage',    // name of database to select (you must create this first or use an existing database)
    'database_table'   => 'captcha_codes', // database table for storing codes, will be created automatically

    // Securimage will automatically create the database table if it is not found
    // change to true for performance reasons once database table is up and running
    'skip_table_check' => false,

);