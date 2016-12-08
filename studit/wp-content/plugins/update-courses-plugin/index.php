<?php
/**
 * Plugin Name: Update Courses
 * Plugin URI: None
 * Description: Allows forums to updates when there's changes in courses.
 * Version: 1.0
 * Author: Rikhart Bekkevold
 * Author URI: None
 */
 //initialize the page content here for when user selects our plugin admin panel

/*
 include( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
 require_wp_db();
 */


 //if search button is clicked
 if(isset($_POST['updateBtn'])){
/*
    //get string
    $json = file_get_contents('http://www.ime.ntnu.no/api/course/-');   //add / after -?   //ini_set("allow_url_fopen", 1);
    //decode string to object
    $obj = json_decode($json);
    //loop course array to get name of all courses
    foreach($obj->course as $item) {
      echo $item->englishName;
      echo "<br><br>";
    }
*/

$results = $GLOBALS['wpdb']->get_results( 'SELECT * FROM wp_posts WHERE post_type = "forum" ', OBJECT );

/*
global $wpdb;
$query="SELECT * FROM bb_topics WHERE topic_status=0 ORDER BY topic_time DESC LIMIT 10";

$results=$wpdb->get_results($query, OBJECT);
*/

//$results = $bbdb->get_results("SELECT * FROM bb_forums");
//var_dump($results);

foreach ($results as $result) {

  echo "<li>" . $result->post_name . "/ " . $result->post_type . "</li>";

}


//ignore thrashed eller slett thrasehd? kan gjøres av admin i panelet, vi bare ignorerer
//WHERE PARENT =
//loop alle courses coder. for hver code send en ny $json = file_get_contents('http://www.ime.ntnu.no/api/course/' . <?php course.code ?); med course coden i
//dette med linker kan bli vanskelig? gjelder bare forsida siden under kategorier? men de på forsida skal ikke røres. må vite hvordan det funker.
//"even if cant do it, something to write, and must do test."

//forum id = post id?
//match og bytt ut basert på course code. ikke navn.
//if $result->post_name == course.code {


//}

//må sette alle verdiene for hver forum post i tabellen. finn ett sted hvor man ser hvordan de settes inn i dben og hvilke verdier som settes inn.
//bytt navn på index fila i plugin
//backup/import db først
//resultater var kommet. viste bare feil verdier? verider fra en annen tabell?

//bare bytt en liten del. der hvor parent er Economics for eksempel

//wp_posts WHERE post_type = ‘forum’




  //  bbp_list_forums(); //bbp-forums-list is the css selctor

//bruk hook her isteden eller filter
//execute rekkefølge

//do_action('bbp_list_forums');


/*
bbp_list_forums(array (
        'before'              => '<ul class="bbp-forums-list">',
        'after'               => '</ul>',
        'link_before'         => '<li class="bbp-forum">',
        'link_after'          => '</li>',
        'count_before'        => ' (',
        'count_after'         => ')',
        'count_sep'           => ', ',
        'separator'           => ', ',
        'forum_id'            => '',
        'show_topic_count'    => true,
        'show_reply_count'    => true,
      ));
*/
/*
bbp_list_forums(array (
        'before' => '<tr>',
        'after' => '</tr>',
        'link_before' => '<td>',
        'link_after' => '</td>',
        'separator' => '',
        'count_before' => '',
        'count_after' => '',
));
*/
    //var_dump($obj['course']);

    //$obj['course'].name
    //print info about object
    //var_dump($obj);

    //need as array first
    //loop all

    //get all the forums here and display so you can see that you got them
    //then you can replace the names

    //get all forum id's


    //can get all existing courses and delete them and then create the new ones because
    //each semester has totally new courses
    //if already exists dont delete

    //bbp_get_forum(); //needs forum id

    //henter til feil side?

 }

function rvb_update_forums() {

//if exists dont do anything, if missing delete

}


 function rvb_plugin_init() {
   ?>
   <head>

          <style>
            li {
             margin-left: 200px;
            }
          </style>
   </head>
   <body>

   <?php
       echo "<h1>Clicking will update the forum rooms for the semester</h1>
       <p>(removes forums for old classes and adds for new ones)</p>";
       echo "<br><br>";
       ?>

       <form method="post" action="">
          <input type="submit" name="updateBtn" value="Update" title="Choice one: 'string' AND 'string'. Returnes news items where both strings occurs. Choice two: no AND provided. Automatic OR search. Returns any news items where the string occurs.">
       </form>

       <div id="coursesDiv" style="margin-left: 200px"></div>
       <div id="forumsDiv" style="margin-left: 200px"></div>

   </body> <!-- dette gir ikke mening -->
   <?php
 }

function update_courses_plugin_setup_menu() {
    add_menu_page( 'Test Plugin Page', 'Update Courses', 'manage_options', 'update-courses-plugin', 'rvb_plugin_init' );
}

//must be in global space to be recoqnized by wordpress
add_action('admin_menu', 'update_courses_plugin_setup_menu');


//står ikke hvilken studieområde faget tilhører.



?>
