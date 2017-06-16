<?php
    # include the API
    include('../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'pepperjack_tags');
    $HTML = $API->get('HTML');

    # Grab an instance of the Lang class for translations
    $Lang = $API->get('Lang');

    # Set the page title
    $Perch->page_title = $Lang->get('Edit Members Tag');


    # Do anything you want to do before output is started
    include('../modes/_subnav.php');
    include('../modes/tag_edit.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../modes/tag_edit.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');