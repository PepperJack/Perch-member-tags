<?php
    # Side panel
    echo $HTML->side_panel_start();

    echo $HTML->side_panel_end();
    
    # Main panel
    echo $HTML->main_panel_start();
	
	include('_subnav.php');

    # Title panel
    echo $HTML->heading1('Listing Members Tags');

    if (isset($message)) echo $message; 


    /* ----------------------------------------- SMART BAR ----------------------------------------- */
    if (PerchUtil::count($tags)) { ?>

    <ul class="smartbar">
        <li class="<?php echo ($status=='all'?'selected':''); ?>"><a href="<?php echo PerchUtil::html($API->app_path()); ?>/?status=all"><?php echo $Lang->get('All'); ?></a></li>
        <!--<li class="<?php echo ($status=='unused'?'selected':''); ?>"><a href="<?php echo PerchUtil::html($API->app_path()); ?>/?status=unused"><?php echo $Lang->get('Unused'); ?></a></li>-->
    </ul>

    <?php
        }else{
            $Alert->set('notice', $Lang->get('There are no tags assigned to Members.'));
        }

    echo $Alert->output();

    /* ----------------------------------------- /SMART BAR ---------------------------------------- */

  
    if (PerchUtil::count($tags)) {
        
        echo '<table class="d itemlist">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>Tag</th>';
                    echo '<th>Display Text</th>';
                    echo '<th>Usage Count</th>';
                    echo '<th class="last action"></th>';
                echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
            $i = 1;
            foreach($tags as $Tag) {
                $item = $Tag->to_array();
                echo '<tr>';
                    echo '<td class="primary">';
                    echo '<a href="'.$HTML->encode($API->app_path()).'/edit/?id='.$HTML->encode(urlencode($item['tagID'])).'">'.$item['tag'].'</a></td>';
                    echo '<td>'.$item['tagDisplay'].'</td>';
                    echo '<td>'.$item['count'].'</td>';
                    echo '<td>';
                        echo ($item['count'] == 0 ? '<a href="'.$HTML->encode($API->app_path()).'/delete/?id='.$HTML->encode(urlencode($item['tagID'])).'" class="delete inline-delete">'.PerchLang::get('Delete').'</a>' : '');
                    echo '</td>';
                echo '</tr>';
                $i++;
            }
            echo '</tbody>';
        
        echo '</table>';

    }  // if tags

    echo $HTML->main_panel_end();
