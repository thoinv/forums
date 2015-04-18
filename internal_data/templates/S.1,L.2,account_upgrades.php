<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__extraData['title'] = '';
$__extraData['title'] .= 'Account Upgrades';
$__output .= '

';
$this->addRequiredExternal('css', 'account_upgrades');
$__output .= '

';
if ($available)
{
$__output .= '
	<div class="section">
		<h3 class="subHeading">' . 'Available Upgrades' . '</h3>
		<ul>
		';
foreach ($available AS $upgrade)
{
$__output .= '
			<li class="primaryContent upgrade">
					<form action="' . htmlspecialchars($payPalUrl, ENT_QUOTES, 'UTF-8') . '" method="post" class="upgradeForm">
						<div class="cost">' . htmlspecialchars($upgrade['costPhrase'], ENT_QUOTES, 'UTF-8') . '</div>
						';
if ($upgrade['length_unit'] AND $upgrade['recurring'])
{
$__output .= '
								
							<input type="hidden" name="cmd" value="_xclick-subscriptions" />
							<input type="hidden" name="a3" value="' . htmlspecialchars($upgrade['cost_amount'], ENT_QUOTES, 'UTF-8') . '" />
							<input type="hidden" name="p3" value="' . htmlspecialchars($upgrade['length_amount'], ENT_QUOTES, 'UTF-8') . '" />
							<input type="hidden" name="t3" value="' . htmlspecialchars($upgrade['lengthUnitPP'], ENT_QUOTES, 'UTF-8') . '" />
							<input type="hidden" name="src" value="1" />
							<input type="hidden" name="sra" value="1" />
							
							<input type="submit" value="' . 'Subscribe' . '" class="button" />
						';
}
else
{
$__output .= '
							<input type="hidden" name="cmd" value="_xclick" />
							<input type="hidden" name="amount" value="' . htmlspecialchars($upgrade['cost_amount'], ENT_QUOTES, 'UTF-8') . '" />
							
							<input type="submit" value="' . 'Purchase' . '" class="button" />
						';
}
$__output .= '
						
						<input type="hidden" name="business" value="' . htmlspecialchars($xenOptions['payPalPrimaryAccount'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" name="currency_code" value="' . htmlspecialchars($upgrade['currency'], ENT_QUOTES, 'UTF-8') . '" />
						<input type="hidden" name="item_name" value="' . 'Nâng cấp tài khoản' . ': ' . htmlspecialchars($upgrade['title'], ENT_QUOTES, 'UTF-8') . ' (' . htmlspecialchars($visitor['username'], ENT_QUOTES, 'UTF-8') . ')" />
						<input type="hidden" name="quantity" value="1" />
						<input type="hidden" name="no_note" value="1" />
						<input type="hidden" name="no_shipping" value="1" />
						<input type="hidden" name="custom" value="' . htmlspecialchars($visitor['user_id'], ENT_QUOTES, 'UTF-8') . ',' . htmlspecialchars($upgrade['user_upgrade_id'], ENT_QUOTES, 'UTF-8') . ',token,' . htmlspecialchars($visitor['csrf_token_page'], ENT_QUOTES, 'UTF-8') . '" />
						
						<input type="hidden" name="charset" value="utf-8" />
						<input type="hidden" name="email" value="' . htmlspecialchars($visitor['email'], ENT_QUOTES, 'UTF-8') . '" />
						
						<input type="hidden" name="return" value="' . XenForo_Template_Helper_Core::link('full:account/upgrade-purchase', '', array(
'utm_nooverride' => '1'
)) . '" />
						<input type="hidden" name="cancel_return" value="' . XenForo_Template_Helper_Core::link('full:account/upgrades', '', array(
'utm_nooverride' => '1'
)) . '" />
						<input type="hidden" name="notify_url" value="' . htmlspecialchars($xenOptions['boardUrl'], ENT_QUOTES, 'UTF-8') . '/payment_callback.php" />
					</form>
					
					<div class="upgradeMain">
						<h4 class="title">' . htmlspecialchars($upgrade['title'], ENT_QUOTES, 'UTF-8') . '</h4>
						';
if ($upgrade['description'])
{
$__output .= '
							<div class="description">' . $upgrade['description'] . '</div>
						';
}
$__output .= '
					</div>
			</li>
		';
}
$__output .= '
		</ul>
	</div>
';
}
$__output .= '

';
if ($purchased)
{
$__output .= '
	<div class="section">
		<h3 class="subHeading">' . 'Purchased Upgrades' . '</h3>
		<ul>
		';
foreach ($purchased AS $upgrade)
{
$__output .= '
			<li class="primaryContent">
				<div class="upgrade">					
					<div class="upgradeForm">
						';
if ($upgrade['record']['end_date'])
{
$__output .= '
							<div>' . 'Expires' . ': ' . XenForo_Template_Helper_Core::callHelper('datetimehtml', array($upgrade['record']['end_date'],array(
'time' => '$upgrade.record.end_date'
))) . '</div>
						';
}
$__output .= '
						';
if ($upgrade['length_unit'] AND $upgrade['recurring'])
{
$__output .= '
							<a href="' . htmlspecialchars($payPalUrl, ENT_QUOTES, 'UTF-8') . '?cmd=_subscr-find&amp;alias=' . urlencode($xenOptions['payPalPrimaryAccount']) . '" class="button">' . 'Cancel Subscription' . '</a>
						';
}
$__output .= '
					</div>
					
					<div class="upgradeMain">
						<h4 class="title">' . htmlspecialchars($upgrade['title'], ENT_QUOTES, 'UTF-8') . '</h4>
						';
if ($upgrade['description'])
{
$__output .= '
							<div class="description">' . $upgrade['description'] . '</div>
						';
}
$__output .= '
					</div>
				</div>
			</li>
		';
}
$__output .= '
		</ul>
	</div>
';
}
