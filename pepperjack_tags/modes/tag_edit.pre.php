<?php

    $Tags = new PepperjackTags_Tags($API);

    $Form = $API->get('Form');
	
	$message = false;

    if (isset($_GET['id']) && $_GET['id']!='') {
	    $Tag = $Tags->find($_GET['id']);
	}
	
	if (!is_object($Tag)) PerchUtil::redirect($API->app_path());

    $details = $Tag->to_array();

    $Form->require_field('tagDisplay', 'Required');

    if ($Form->submitted()) {
        $postvars = ['tagDisplay'];
    	$data = $Form->receive($postvars);
        $data['tag'] = PerchUtil::urlify(trim($data['tagDisplay']));

        if (is_object($Tag)) $result = $Tag->update($data);

        if ($result) {
            $message = $HTML->success_message('The tag has been successfully updated. Return to %stag listing%s', '<a href="'.$API->app_path() .'">', '</a>');  
        }else{
            if (!$message) $message = $HTML->failure_message('Sorry, that tag could not be updated, or no changes were made.');
        }
        
        if (is_object($Tag)) {
            $details = $Tag->to_array();
        }else{
            $details = array();
        }
    }

    $members = [];
    $members_by_tag = $Tags->get_members_by_tag($_GET['id']);
    foreach ($members_by_tag as $member) {
        $properties = PerchUtil::json_safe_decode($member['memberProperties']);
        $member['fullname'] = $properties->first_name . ' ' . $properties->last_name;
        $members[] = $member;
    }