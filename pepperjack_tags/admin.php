<?php
    if (file_exists(PERCH_PATH.'/addons/apps/perch_members/')) {
        if ($CurrentUser->logged_in() && $CurrentUser->has_priv('perch_members')) {
            $this->register_app('pepperjack_tags', 'Members Tags', 3, 'App to manage Members Tags', 0.9);
            $this->require_version('pepperjack_tags', '2.8.29');
        }

        spl_autoload_register(function($class_name){
            if (strpos($class_name, 'PepperjackTags')===0) {
                include(__DIR__.'/'.$class_name.'.class.php');
                return true;
            }
            return false;
        });
    }

    // Fieldtypes
    #include_once(__DIR__.'/fieldtypes.php');
