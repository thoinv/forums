/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	
	XenForo.RatingEditor = function($form)
	{
		var $output = $($form.data('rating-output')),

			$url     = $form.find('input[name="image_url"]'),
			$sprite  = $form.find('input[name="sprite_mode"]'),
			$w       = $form.find('input[name="sprite_params[w]"]'),
			$h       = $form.find('input[name="sprite_params[h]"]'),
			$x       = $form.find('input[name="sprite_params[x]"]'),
			$y       = $form.find('input[name="sprite_params[y]"]');

		if (!$output.length)
		{
			console.warn('Unable to locate the smiley output element as specified by data-smiley-output on the form %o', $form);
			return;
		}

		$form.find('input').not('input[type=button]').not('input[type=submit]').bind('change', function(e)
		{
			console.log('Form interaction... width = %d', $form.find('#ctrl_sprite_paramswidth').val());

			var $url = $form.find('input[name="name"]')

			if ($sprite.is(':checked'))
			{
				$output.attr('src', 'styles/default/xenforo/clear.png').css(
				{
					width: $w.val(),
					height: $h.val(),
					background: 'url(styles/dark/ratings/' + $url.val() + ') no-repeat ' + $x.val() + 'px ' + $y.val() + 'px'
				});
			}
			else
			{
				$output.attr('src', "styles/dark/ratings/"+$url.val()).css(
				{
					width: 'auto',
					height: 'auto',
					background: 'none'
				});
			}
		});
	};

	XenForo.register('form.RatingEditor', 'XenForo.RatingEditor');
}
(jQuery, this, document);
