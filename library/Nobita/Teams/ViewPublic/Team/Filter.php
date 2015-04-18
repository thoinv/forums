<?php

class Nobita_Teams_ViewPublic_Team_Filter extends XenForo_ViewPublic_Base
{
	public function renderJson()
	{
		$teams = $this->_params['teams'];

		if (empty($teams))
		{
			$content = new XenForo_Phrase('Teams_there_currently_no_teams_to_display');
			$description = '
				<dt><label for="ctrl_team_id">' . new XenForo_Phrase('Teams_team') . ':</label></dt>
					<dd>
						' . $content . '
					</dd>';
		}
		else
		{
			$notFound = new XenForo_Phrase('no_results_found');
			$openTag = '
				<script>
					$(document).ready(function()
					{
						$(".choosen").chosen(
						{
							disable_search_threshold: 10,
							no_results_text: "' . $notFound->render() . '",
							width: "100%"
						});
					});
				</script>
				<dt><label for="ctrl_team_id">' . new XenForo_Phrase('Teams_team') . ':</label></dt>
					<dd>
						<select name="team_id" class="textCtrl choosen" id="ctrl_team_id">
			';
			$closeTag = '</select></dd>';

			$content = '';

			foreach ($teams as $team)
			{
				$content .='<option value="' . $team['team_id'] . '">' . $team['title'] . '</option>';
			}

			$description = $openTag . $content . $closeTag;
		}

		return array(
			'description' => $description
		);
	}
}