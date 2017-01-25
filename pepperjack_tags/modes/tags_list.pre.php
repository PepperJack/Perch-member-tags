<?php

$HTML = $API->get('HTML');

$Tags = new PepperjackTags_Tags($API);

if (isset($_GET['status']) && $_GET['status'] == 'unused') {
    $status = 'unused';
    $tags = $Tags->get_zero_count();
} else {
    $status = 'all';
    $tags = $Tags->all();
}
