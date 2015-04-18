<?php
class XenTrCom_TodayBirthday_Model_XTodayBirthday{
    public static function XenTrCom_TodayBirthdayArray() {
        $db = XenForo_Application::get('db');
        $userModel = XenForo_Model::create('XenForo_Model_User');
		$setDateModel = XenForo_Model::create('XenTrCom_TodayBirthday_Model_SetDate');
        $XenTrCom_TodayBirthday = array();
        $options = XenForo_Application::get('options');

        $count = 0;
        $limit = $options->xentrcom_todaybirthday_limit;

        $defaultDate = time('UTC');
		$setDate = $setDateModel->getSetDate();
	
		
        $day = gmdate("j", $defaultDate + $setDate * 3600);
        $month = gmdate("n", $defaultDate + $setDate * 3600);
        $year = gmdate("Y", $defaultDate + $setDate * 3600);

        $bannedexcluded = '';
        if ($options->xentrcom_todaybirthday_bannedexcluded){
            $bannedexcluded = "AND user.is_banned NOT IN (1)";
        }

        $excludedusergroup = '';
        if ($options->xentrcom_todaybirthday_excludedusergroup){
            $excludedusergroup = $options->xentrcom_todaybirthday_excludedusergroup;
            $excludedusergroup = "AND user.user_group_id NOT IN ($excludedusergroup)";
        }

        $userprivacy_date = '';
        if ($options->xentrcom_todaybirthday_userprivacy_date){
            $userprivacy_date = "AND user_option.show_dob_date IN (1)";
        }

        $userstate = "''";
        if ($options->xentrcom_todaybirthday_userstate1){
			$userstate .= ",'valid'";
        }
        if ($options->xentrcom_todaybirthday_userstate2){
            $userstate .= ",'email_confirm'";
        }
        if ($options->xentrcom_todaybirthday_userstate3){
            $userstate .= ",'email_confirm_edit'";
        }
        if ($options->xentrcom_todaybirthday_userstate4){
            $userstate .= ",'moderated'";
        }

        if ($options->xentrcom_todaybirthday_enable){
            $TBArray = $db->fetchAll("SELECT
                                        user_profile.*,
                                        user_option.show_dob_year,
                                        user_option.show_dob_date
                                    FROM xf_user_profile as user_profile
                                    INNER JOIN xf_user_option AS user_option ON
				                        (user_option.user_id = user_profile.user_id)
                                        JOIN xf_user AS user ON
                                        (user.user_id = user_profile.user_id)
                                    WHERE NOT ISNULL(user_profile.user_id) AND user_profile.dob_month IN ($month) AND user_profile.dob_day IN ($day) $userprivacy_date $bannedexcluded $excludedusergroup AND user.user_state NOT IN ($userstate) ORDER BY user_id ASC");

            if(sizeof($TBArray) != 0){
                foreach($TBArray as $TBX){
                    $TBIds[] = $TBX['user_id'];
                }
                $userInfo = $userModel->getUsersByIds($TBIds,array());

                foreach($TBArray as $TB){
                    $count++;
                    $more = $count - $limit;
                    $age = $year - $TB['dob_year'];
                    $XenTrCom_TodayBirthday[] = array("user" => $userInfo[$TB['user_id']], "dob_day" => $TB['dob_day'], "dob_month" => $TB['dob_month'], "count" => $count, "dob_year" => $TB['dob_year'], "show_dob_year" => $TB['show_dob_year'], "age" => $age);
                }
            }
            return $XenTrCom_TodayBirthday;
        }
    }
}