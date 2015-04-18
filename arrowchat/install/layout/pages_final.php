			   <script type="text/javascript">
					function selectText(select_id) {
						if (document.selection) {
						var range = document.body.createTextRange();
							range.moveToElementText(document.getElementById(select_id));
						range.select();
						}
						else if (window.getSelection) {
						var range = document.createRange();
						range.selectNode(document.getElementById(select_id));
						window.getSelection().addRange(range);
						}
					}
					function clearSelection() {
						if ( document.selection ) {
							document.selection.empty();
						} else if ( window.getSelection ) {
							window.getSelection().removeAllRanges();
						}
					}
				</script>
				<div class="step">
					<img src="./images/step1.png" alt="" /><strong> Change the file permissions</strong>
				</div>
				<div style="margin-left: 34px;">
					<div>Change your <b><i>includes folder</i></b> to not be writable (CHMOD 755)</div>
					<div>Change your <b><i>includes/config.php file</i></b> to not be writable (CHMOD 644)</div>
				</div>
				<div class="step" style="margin-top: 20px;">
					<img src="./images/step2.png" alt="" /><strong> Add our script code</strong>
				</div>
				<div style="margin-left: 34px;">
					<b><i>Add this code to your page's header right after the &lt;head&gt; tag:</i></b>
				</div>
				<div style="margin-left: 34px; margin-top: 10px; overflow: auto; padding:10px; border: 1px dotted #888;">
					<pre id="header-code"><?php echo $header; ?></pre>
				</div>
				<div style="margin-left:34px; float: left;">
					<a href="javascript:;" onClick="clearSelection();selectText('header-code')">Select Code</a>
				</div>
				<div style="margin-left: 34px; margin-top:30px;">
					<b><i>Add this code to your page's footer right before the &lt;/body&gt; tag:</i></b>
				</div>
				<div style="margin-left: 34px; margin-top: 10px; overflow: auto; padding:10px; border: 1px dotted #888;">
					<pre id="footer-code"><?php echo $footer; ?></pre>
				</div>
				<div style="margin-left:34px; float: left;">
					<a href="javascript:;" onClick="clearSelection();selectText('footer-code')">Select Code</a>
				</div>
				<div style="margin-left: 34px; margin-top:30px;">
					<b>How to add this code to your template:</b>
				</div>
				<div style="margin-left: 34px; margin-top:10px;">
					<?php echo getFinalInstructions($_SESSION['version']); ?>
				</div>
				<div class="step" style="margin-top: 20px;">
					<img src="./images/step3.png" alt="" /><strong> Extra small steps to take</strong>
				</div>
				<div style="margin-left: 34px;">
					<div>Delete the <b><i>install folder</i></b> immediately</div>
		<?php
			if ($_SESSION['version'] == "drupal") 
			{
		?>
				<div style="margin-top:10px;">We detected that you are using Drupal so another step is required.  Browse to your <b><i>drupal/sites/default/settings.php file</i></b> and uncomment (by deleting the "//") and set the $base_url variable to your website URL.</div>
		<?php
			}
		?>
		
		<?php
			if ($_SESSION['version'] == "vbulletin")
			{
		?>
				<div style="margin-top:10px;">We detected that you are using vBulletin so another step is required to get avatars working.  <a href="http://www.arrowchat.com/support/downloads/vb_avatars.zip" target="_blank">Download this file</a> from ArrowChat and extract it to your vBulletin root folder.</div>
		<?php
			}
		?>
		
		<?php
			if (!$rename) 
			{
		?>
				<div style="margin-top:10px;">The installer was unable to rename your integration file.  You must go to your <b><i>includes/functions/integration folder</i></b> and rename/move the functions_<?php echo $_SESSION['version']; ?>.php file to includes/integration.php.</div>
		<?php
			}
		?>
				</div>