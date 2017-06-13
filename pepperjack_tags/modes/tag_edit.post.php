<?php
    # Side panel
    echo $HTML->side_panel_start();

    echo $HTML->side_panel_end();
    
    # Main panel
    echo $HTML->main_panel_start();
	
	include('_subnav.php');

    # Title panel
    echo $HTML->heading1('Editing Tag');

    if ($message) echo $message;

    echo $HTML->heading2('Tag Details');


    echo $Form->form_start(false, 'magnetic-save-bar');

        echo '<p class="formnotes">Be careful editing the Tag name - especially if the tags are used in page code - just use this to add capital letters to the Display Text, if necessary.</p>';
        echo '<p class="formnotes">Changing the Tag Display Text will also change the Tag name.</p>';
        echo $Form->text_field('tag', 'Tag', isset($details['tag'])?$details['tag']:false, 'm',false,' disabled="disabled"');
        echo $Form->text_field('tagDisplay', 'Tag Display Text', isset($details['tagDisplay'])?$details['tagDisplay']:false, 'm');

        echo $Form->submit_field('btnSubmit', 'Save', $API->app_path());
    
    echo $Form->form_end();


    if (PerchUtil::count($members)) {
        echo $HTML->heading2('List of Members Using Tag');
        
        echo '<table class="d itemlist">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Tag Expiry</th>';
                    echo '<th class="last action"></th>';
                echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
            $i = 1;
            foreach($members as $member) {
                echo '<tr>';
                    echo '<td class="primary">';
                    echo '<a href="'.$HTML->encode(PERCH_LOGINPATH).'/addons/apps/perch_members/edit/?id='.$HTML->encode(urlencode($member['memberID'])).'">'.$member['fullname'].'</a></td>';
                    echo '<td>'.PerchUtil::html($member['tagExpires'] ? strftime('%d %b %Y', strtotime($member['tagExpires'])) : '-').'</td>';
                    echo '<td></td>';
                echo '</tr>';
                $i++;
            }
            echo '</tbody>';
        
        echo '</table>';

    }  // if members

    echo $HTML->main_panel_end();