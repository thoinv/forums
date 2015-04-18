$(function()
{
	$(window).on('load resize orientationchange', function()
	{
		if ($('#groupProfileCover').width() > 1010)
		{
			width = $('#groupProfileCover').width();
			ratio = width / 1010;

			height = 315 * ratio;
		}
		else
		{
			width = 1010;
			height = 315;
		}
		$('div.coverPhotoCropControl, a.coverImage').css({
			'height': height,
			'max-height': height
		});

		$('img.coverPhotoImg').cropbox(
		{
			width: width, // expected width
			height: height, // expected height
			showControls: 'never'
		})
		.on('cropbox', function(e, result)
		{
			$('input[name=crop_x]').val(result.cropX);
			$('input[name=crop_y]').val(result.cropY);
			$('input[name=crop_w]').val(result.cropW);
			$('input[name=crop_h]').val(result.cropH);
		});


	});
});