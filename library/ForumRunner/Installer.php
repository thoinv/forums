<?php
/*
 * Forum Runner
 *
 * Copyright (c) 2010-2011 to End of Time Studios, LLC
 *
 * This file may not be redistributed in whole or significant part.
 *
 * http://www.forumrunner.com
 */

class ForumRunner_Installer
{
    public static function installCode($existingAddOn, $addOnData)
    {
	$db = XenForo_Application::get('db');

	// 1.0.0
	if (!$existingAddOn) {
	    $db->query("
		CREATE TABLE xf_forumrunner_push_data (
		    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		    user_id INT UNSIGNED NOT NULL DEFAULT '0',
		    conversation_id INT UNSIGNED NOT NULL DEFAULT '0',
		    thread_id INT NOT NULL DEFAULT '0',
		    threadread INT NOT NULL DEFAULT '0',
		    subsent TINYINT UNSIGNED NOT NULL DEFAULT '0',
		    PRIMARY KEY (id)
		)
	    ");

	    $db->query("
		CREATE TABLE xf_forumrunner_push_users (
		    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		    user_id INT UNSIGNED NOT NULL,
		    fr_username VARCHAR(45) NOT NULL,
		    last_login DATETIME DEFAULT NULL,
		    b TINYINT UNSIGNED NOT NULL DEFAULT '0',
		    PRIMARY KEY (id)
		)
	    ");
	} else {
	    // Upgrading!
	    $prev_version_string = $existingAddOn['version_string'];
	    $prev_version_id = $existingAddOn['version_id'];

	    $new_version_string = $addOnData['version_string'];
            $new_version_id = $addOnData['version_id'];

            if (version_compare($new_version_string, '1.1.3') < 0) {
                // Upgrading to 1.1.3

                $db->query("
                    ALTER TABLE xf_forumrunner_push_users
                    ADD token TINYTEXT
                ");
            }
	}
    }

    public static function removeCode()
    {
	$db = XenForo_Application::get('db');

	$db->query("DROP TABLE IF EXISTS xf_forumrunner_push_data");
	$db->query("DROP TABLE IF EXISTS xf_forumrunner_push_users");
    }
}

?>
