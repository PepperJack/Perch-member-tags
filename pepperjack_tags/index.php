<?php
    # include the API
    include('../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'pepperjack_tags');

    # include your class files
    include('PepperjackTags_Tags.class.php');
    include('PepperjackTags_Tag.class.php');
    
    # Grab an instance of the Lang class for translations
    $Lang = $API->get('Lang');

    # Set the page title
    $Perch->page_title = $Lang->get('Manage Members Tags');


    # Do anything you want to do before output is started
    include('modes/tags_list.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('modes/tags_list.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
    