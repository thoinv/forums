<?php

class Waindigo_JokePoll_DataWriter_Helper_JokePoll
{

    public static function getJokePollInput(XenForo_Input $controllerInput)
    {
        $input['poll'] = $controllerInput->filterSingle('poll', XenForo_Input::ARRAY_SIMPLE);
        $pollInputHandler = new XenForo_Input($input['poll']);

        if (isset($input['poll']['joke'])) {
            $jokePollInputHandler = new XenForo_Input($input['poll']['joke']);
            $jokePollInput = $jokePollInputHandler->filter(
                array(
                    'first_choice' => XenForo_Input::UINT
                ));
        } else {
            $jokePollInput = array();
        }

        return $jokePollInput;
    } /* END getJokePollInput */

    public static function getCurrentJokePollIds()
    {
        $jokePollIds['first_choice'] = XenForo_Application::get('options')->waindigo_jokePoll_firstChoicePollIds;
        if ($jokePollIds['first_choice']) {
            $jokePollIds['first_choice'] = explode(',', $jokePollIds['first_choice']);
        } else {
            $jokePollIds['first_choice'] = array();
        }

        return $jokePollIds;
    } /* END getCurrentJokePollIds */

    public static function updateJokePollIdOptions(array $newJokePollIds)
    {
        $oldJokePollIds = self::getCurrentJokePollIds();

        $options = array(
            'first_choice' => 'waindigo_jokePoll_firstChoicePollIds'
        );

        foreach ($options as $jokePollIdsKey => $optionName) {
            array_unique($newJokePollIds[$jokePollIdsKey]);
            sort($newJokePollIds[$jokePollIdsKey]);

            if (self::fullArrayDiff($newJokePollIds[$jokePollIdsKey], $oldJokePollIds[$jokePollIdsKey])) {
                $dw = XenForo_DataWriter::create('XenForo_DataWriter_Option');
                $dw->setExistingData($optionName);
                $dw->set('option_value', implode(',', $newJokePollIds[$jokePollIdsKey]));
                $dw->save();
            }
        }
    } /* END updateJokePollIdOptions */

    public static function fullArrayDiff($left, $right)
    {
        return array_diff(array_merge($left, $right), array_intersect($left, $right));
    } /* END fullArrayDiff */
}