<?php
	echo $HTML->subnav($CurrentUser, array(
		array('page'=>array(
					'pepperjack_tags',
					'pepperjack_tags/delete',
					'pepperjack_tags/edit',
			), 'label'=>'Tags'),
	));
