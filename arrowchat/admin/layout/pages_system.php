			<div class="title_bg"> 
				<div class="title">System</div> 
				<div class="module_content">
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?do=<?php echo $do; ?>" enctype="multipart/form-data">
					<!-- Nulled version from Social Engine Forum (www.socialengineforum.com) -->
					<div class="subtitle">Update ArrowChat</div>
                    <div class="subExplain">
                        <i>This process will update ArrowChat on your system to the latest version.  Please note that modifications to files may be overwritten and it is imperative that you backup your files and database before proceeding.</i>
                    </div>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="config_heart_beat">Your Version</label>
							</dt>
							<dd>
								<p class="explain" style="font-size:12px; margin-top: 4px;">
									<?php echo ARROWCHAT_VERSION; ?>
								</p>
							</dd>
						</dl>
                    </fieldset>
					<dl class="selectionBox submitBox">
						<dt>
                        </dt>
						<dd>
							<div class="floatr" style="float: right;">
								<a class="fwdbutton" onClick="window.open('http://www.socialengineforum.com/', 'new');return false;">
									<span>Download Latest Version from SEF</span>
								</a>
							</div>
							<!-- Better not to let it update automatically. Social Engine Forum (www.socialengineforum.com) -->
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "configsettings") 
	{
?>
					<div class="subtitle">Configuration Settings</div>
					<fieldset class="firstFieldset">
						<dl class="selectionBox">
							<dt>
								<label for="config_base_url">Base URL</label>
							</dt>
							<dd>
								<input type="text" id="config_base_url" class="selectionText" name="config_base_url" value="<?php echo $base_url; ?>" />
								<p class="explain">
									Enter the path to ArrowChat from your www or public_html directory.  In most cases, this is simply "/arrowchat/".  Be sure to include a trailing slash or it will automatically be added for you.
								</p>
							</dd>
						</dl>
					</fieldset>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="config_heart_beat">Message Heart Beat</label>
							</dt>
							<dd>
								<input type="text" id="config_heart_beat" class="selectionText" name="config_heart_beat" value="<?php echo $heart_beat; ?>" />
								<p class="explain">
									Making this value smaller will use more server resources but ArrowChat will retrieve new messages faster. This value cannot be greater than the online timeout.  Default: 3
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="config_buddy_list_heart_beat">Buddy List Heart Beat</label>
							</dt>
							<dd>
								<input type="text" id="config_buddy_list_heart_beat" class="selectionText" name="config_buddy_list_heart_beat" value="<?php echo $buddy_list_heart_beat; ?>" />
								<p class="explain">
									Making this value smaller will use more server resources but ArrowChat will update the buddy list more often.  Default: 60
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="config_online_timeout">Online Timeout</label>
							</dt>
							<dd>
								<input type="text" id="config_online_timeout" class="selectionText" name="config_online_timeout" value="<?php echo $online_timeout; ?>" />
								<p class="explain">
									The time in seconds that a user will be considered offline if inactive for this long. This value cannot be lower than the heart beat.  Default: 120
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="config_idle_time">Idle Timeout</label>
							</dt>
							<dd>
								<input type="text" id="config_idle_time" class="selectionText" name="config_idle_time" value="<?php echo $idle_time; ?>" />
								<p class="explain">
									The time in minutes that a user is considered idle after not moving their mouse or pressing a key. An idle user will use less resources.  Default: 3
								</p>
							</dd>
						</dl>
					</fieldset>
					<?php
						if (ARROWCHAT_EDITION == "business")
						{
					?>
					<fieldset>
						<dl class="selectionBox">
							<dt></dt>
							<dd>
								<ul>
									<li>
										<label for="push_on">
											<input type="checkbox" id="push_on" name="push_on" <?php if($push_on == 1) echo 'checked="checked"'; ?> value="1" />
											Turn Push Server On
										</label>
									</li>
								</ul>
								<p class="explain">
									Checking this will enable the push server. The publish, subscribe, and secrets keys below must be filled out correctly for this to work.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="push_publish">Push Publish Key</label>
							</dt>
							<dd>
								<input type="text" id="push_publish" class="selectionText" name="push_publish" value="<?php echo $push_publish; ?>" />
								<p class="explain">
									The publisher key for your push server account.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="push_subscribe">Push Subscribe Key</label>
							</dt>
							<dd>
								<input type="text" id="push_subscribe" class="selectionText" name="push_subscribe" value="<?php echo $push_subscribe; ?>" />
								<p class="explain">
									The subscriber key for your push server account.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="push_secret">Push Secret Key</label>
							</dt>
							<dd>
								<input type="text" id="push_secret" class="selectionText" name="push_secret" value="<?php echo $push_secret; ?>" />
								<p class="explain">
									The secret key for your push server account.
								</p>
							</dd>
						</dl>
					</fieldset>
					<?php
						} else {
					?>
						<fieldset>
							<div style="margin-top: 15px;">
								<a href="http://www.arrowchat.com/members/" target="_blank"><img src="./images/upgrade-to-business.png" border="0" alt="Upgrade to Business" /></a>
							</div>
							<input type="hidden" id="push_on" name="push_on" value="0" />
							<input type="hidden" id="push_publish" name="push_publish" value="" />
							<input type="hidden" id="push_subscribe" name="push_subscribe" value="" />
							<input type="hidden" id="push_secret" name="push_secret" value="" />
						</fieldset>
					<?php
						}
					?>
					<dl class="selectionBox submitBox">
						<dt></dt>
						<dd>
							<div class="floatr">
								<a class="fwdbutton" onclick="document.forms[0].submit(); return false">
									<span>Save Changes</span>
								</a>
								<input type="hidden" name="config_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "adminsettings") 
	{
?>
					<div class="subtitle">Administrator Settings</div>
					<fieldset class="firstFieldset">
						<dl class="selectionBox">
							<dt>
								<label for="admin_old_password">Old Password</label>
							</dt>
							<dd>
								<input type="password" class="selectionText" id="admin_old_password" name="admin_old_password" value="" />
								<p class="explain">
									You must first enter your old password to update these settings.
								</p>
							</dd>
						</dl>
					</fieldset>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="admin_new_password">New Password</label>
							</dt>
							<dd>
								<input type="password" class="selectionText" id="admin_new_password" name="admin_new_password" value="" />
								<p class="explain">
									Only enter if you wish to change your password.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="admin_confirm_password">Confirm Password</label>
							</dt>
							<dd>
								<input type="password" class="selectionText" id="admin_confirm_password" name="admin_confirm_password" value="" />
								<p class="explain">
									Confirm the password above.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="admin_email">Admin Email</label>
							</dt>
							<dd>
								<input type="text" class="selectionText" id="admin_email" name="admin_email" value="<?php echo $admin_email; ?>" />
								<p class="explain">
									Change the administration email for this installation.
								</p>
							</dd>
						</dl>
					</fieldset>
					<dl class="selectionBox submitBox">
						<dt></dt>
						<dd>
							<div class="floatr">
								<a class="fwdbutton" onclick="document.forms[0].submit(); return false">
									<span>Save Changes</span>
								</a>
								<input type="hidden" name="admin_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "repair") 
	{
?>
					<div class="subtitle">Repair ArrowChat</div>
                    <div class="subExplain">
                        <i>Clicking the repair button will attempt to repair your ArrowChat database. If your ArrowChat suddenly does not work after upgrading to a new version, this repair feature may fix it. It should not delete your exisiting information, but please backup your database just in case.<br /><br />

This feature will not overwrite any files or modification you've made; it attempts to repair the database only.</i>
                    </div>
					<dl class="selectionBox submitBox">
						<dt>
                        </dt>
						<dd>
							<div class="floatr" style="float: right;">
								<a class="fwdbutton" onclick="document.forms[0].submit(); return false">
									<span>Repair Database</span>
								</a>
								<input type="hidden" name="repair_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "language") 
	{
?>
					<div class="subtitle">Languages</div>
                    <div class="subExplain">
                        <i>If you'd like to add another language, copy the /language/en folder and rename the folder and filename to something else.  The folder and filename MUST be the same.  For example, language/french/french.php or language/fr/fr.php.</i>
                    </div>
					<table cellspacing="0" cellpadding="0" class="table_table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
<?php
		$folders = get_folders(AC_FOLDER_LANGUAGE);
		
		$result = $db->execute("
			SELECT config_value 
			FROM arrowchat_config
			WHERE config_name = 'language'
		");

		$row = $db->fetch_array($result);
		
		foreach ($folders as $folder) 
		{
?>
							<tr>
								<td><?php echo $folder['name']; ?></td>
<?php
			if (strtolower($row['config_value']) == strtolower($folder['name'])) 
			{
?>
								<td>Currently Activated</td>
<?php
			} 
			else 
			{
?>
								<td><a href="system.php?do=language&activate=<?php echo $folder['name']; ?>">Activate</a></td>
<?php
			}
?>
							</tr>
<?php
		}
?>
						</tbody>
					</table>
<?php
	}
?>
					</form>

				</div>
			</div>