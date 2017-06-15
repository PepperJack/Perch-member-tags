<?php
    # Main panel

    # Title panel
    echo $HTML->title_panel([
            'heading' => 'Listing Members Tags',
    ], $CurrentUser);

    if (isset($message)) echo $message; 


    /* ----------------------------------------- SMART BAR ----------------------------------------- */
    if (PerchUtil::count($tags)) {

        $Smartbar = new PerchSmartbar($CurrentUser, $HTML, $Lang);

        $Smartbar->add_item([
                'active' => ($status=='all'),
                'title' => $Lang->get('All'),
                'link'  => $API->app_nav().'/?status=all',
        ]);

        /*$Smartbar->add_item([
                'active' => ($status=='unused'),
                'title' => $Lang->get('Unused'),
                'link'  => $API->app_nav().'/?status=unused',
        ]);*/

        echo $Smartbar->render();

    }else{
        $Alert->set('notice', $Lang->get('There are no tags assigned to Members.'));
    }

    echo $Alert->output();

    /* ----------------------------------------- /SMART BAR ---------------------------------------- */

  
    if (PerchUtil::count($tags)) {
        
        echo '<div class="inner"><table>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>Tag</th>';
                    echo '<th>Display Text</th>';
                    echo '<th>Usage Count</th>';
                    echo '<th class="action"></th>';
                echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
            $i = 1;
            foreach($tags as $Tag) {
                $item = $Tag->to_array();
                echo '<tr>';
                    echo '<td data-label="Tag">';
                    echo '<a class="primary" href="'.$HTML->encode($API->app_path()).'/edit/?id='.$HTML->encode(urlencode($item['tagID'])).'">'.$item['tag'].'</a></td>';
                    echo '<td data-label="Display Text">'.$item['tagDisplay'].'</td>';
                    echo '<td data-label="Usage Count">'.$item['count'].'</td>';
                    echo '<td>';
                        echo ($item['count'] == 0 ? '<a class="button button-small action-alert" href="'.$HTML->encode($API->app_path()).'/delete/?id='.$HTML->encode(urlencode($item['tagID'])).'" data-delete="confirm" data-msg="Are you sure you wish to delete the tag '.$item['tag'].'?">'.PerchLang::get('Delete').'</a>' : '');
                    echo '</td>';
                echo '</tr>';
                $i++;
            }
            echo '</tbody>';
        
        echo '</table></div>';

    }  // if tags
