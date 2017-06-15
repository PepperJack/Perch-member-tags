<?php
    
    $Tags = new PepperjackTags_Tags($API);

    $Form = $API->get('Form');
	
	$message = false;
	
	if (isset($_GET['id']) && $_GET['id']!='') {
	    $Tag = $Tags->check_usage_and_find($_GET['id']);
	}
	
	if (!is_object($Tag)) PerchUtil::redirect($API->app_path());
	
	$Form->set_name('delete');

    if ($Form->submitted()) {
    	if (is_object($Tag)) {
    	    $Tag->delete();
    	    
    	    if ($Form->submitted_via_ajax) {
    	        echo $API->app_path().'/';
    	        exit;
    	    }else{
    	       PerchUtil::redirect($API->app_path().'/'); 
    	    }
    	    
            
        }else{
            $message = $HTML->failure_message('Sorry, that member could not be deleted.');
        }
    }

    $details = $Tag->to_array();