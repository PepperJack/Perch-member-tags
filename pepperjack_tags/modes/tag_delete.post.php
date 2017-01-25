<?php
   
    # Side panel
    echo $HTML->side_panel_start();

    echo $HTML->side_panel_end();
    
    # Main panel
    echo $HTML->main_panel_start(); 

    include('_subnav.php');

    # Title panel
    
    echo $HTML->heading1('Delete a Tag');

    
    if ($message) {
        echo $message;
    }else{
        echo $HTML->warning_message('Are you sure you wish to delete the tag "%s"?', $details['tag']);
        echo $Form->form_start();
		echo $Form->submit_field('btnSubmit', 'Delete', $API->app_path());


        echo $Form->form_end();
    }
    
    echo $HTML->main_panel_end();