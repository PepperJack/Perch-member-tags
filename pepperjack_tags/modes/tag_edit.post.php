<?php
    # Main panel

    # Title panel
    echo $HTML->title_panel([
            'heading' => 'Editing a Tag',
    ], $CurrentUser);

    if (isset($message)) echo $message;

    echo $HTML->heading2('Tag Details');

    echo $Form->form_start(false);

        echo '<div role="alert" class="notification notification-warning">Be careful editing the Tag name - especially if the tags are used in page code - just use this to add capital letters to the Display Text, if necessary.<br />Changing the Tag Display Text will also change the Tag name.</div>';
        echo $Form->text_field('tag', 'Tag', isset($details['tag'])?$details['tag']:false, 'm',false,' disabled="disabled"');
        echo $Form->text_field('tagDisplay', 'Tag Display Text', isset($details['tagDisplay'])?$details['tagDisplay']:false, 'm');

        echo $Form->submit_field('btnSubmit', 'Save', $API->app_path());
    
    echo $Form->form_end();


    if (PerchUtil::count($members)) {
        echo '<br />';
        echo $HTML->heading2('List of Members Using Tag');
        
        echo '<div class="inner"><table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Tag Expiry</th>';
                    echo '<th class="action"></th>';
                echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
            $i = 1;
            foreach($members as $member) {
                echo '<tr>';
                    echo '<td data-label="Name">';
                    echo '<a class="primary" href="'.$HTML->encode(PERCH_LOGINPATH).'/addons/apps/perch_members/edit/?id='.$HTML->encode(urlencode($member['memberID'])).'">'.$member['fullname'].'</a></td>';
                    echo '<td data-label="Tag Expiry">'.PerchUtil::html($member['tagExpires'] ? strftime('%d %b %Y', strtotime($member['tagExpires'])) : '-').'</td>';
                    echo '<td></td>';
                echo '</tr>';
                $i++;
            }
            echo '</tbody>';
        
        echo '</table></div>';

    }  // if members