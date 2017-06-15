<?php
    # Main panel

    # Title panel
    echo $HTML->title_panel([
            'heading' => 'Delete a Tag',
    ], $CurrentUser);

    
    if ($message) {
        echo $message;
    }else{
        echo $HTML->warning_message('Are you sure you wish to delete the tag "%s"?', $details['tag']);
        echo $Form->form_start();
		echo $Form->submit_field('btnSubmit', 'Delete', $API->app_path());


        echo $Form->form_end();
    }