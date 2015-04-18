/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.Team_navigation = function($element) { this.__construct($element); };
	XenForo.Team_navigation.prototype = 
	{
		__construct: function($element)
		{
			var $html = $('html'),
				self = this;
			if (!$html.hasClass('NoResponsive'))
			{
				this.updateVisibleNavigationTabs();
			}

			var resizeTimer, htmlWidth = $html.width();
			$(window).on('resize orientationchange load', function(e) {
				if (resizeTimer)
					{
						return;
					}
					if (e.type != 'load' && $html.width() == htmlWidth)
					{
						return;
					}
					htmlWidth = $html.width();
					
					resizeTimer = setTimeout(function() {
						resizeTimer = 0;
						self.updateVisibleNavigationTabs();
					}, 20);
			});
		},

		updateVisibleNavigationTabs: function()
		{
			var $tabs = $('#Team_navigation').find('.Team_navTabs');
			if (!$tabs.length)
			{
				return;
			}

			var tabsCoords = $tabs.coords(),
				$publicTabs = $tabs.find('.Team_publicTabs'),
				$publicInnerTabs = $publicTabs.find('> .Team_navTab'),
				$visitorTabs = $tabs.find('.Team_visitorTabs'),
				$visitorInnerTabs = $visitorTabs.find('> .Team_navTab'),
				maxPublicWidth,
				$hiddenTab = $publicInnerTabs.filter('.Team_navigationHiddenTabs');
			
			$publicInnerTabs.show();
			$hiddenTab.hide();
	
			$visitorInnerTabs.show();

			maxPublicWidth = $tabs.width() - $visitorTabs.width();
			
			// fixed if screen to small		
			if (maxPublicWidth <= 160)
			{
				$('#Team_notifi, #Team_lor').css({'display': 'none'});
				$('#Team_notifi_responsive, #Team_lor_popup').show();
			}
			else
			{
				$('#Team_notifi, #Team_lor').css({'display': 'inline'});
				$('#Team_notifi_responsive, #Team_lor_popup').hide();
			}

			var hidePublicTabs = function()
				{
					var showSel = '.selected, .Team_navigationHiddenTabs';
				
					var $hideable = $publicInnerTabs.filter(':not(' + showSel + ')'),
						$hiddenList = $('<ul />'),
						hiddenCount = 0,
						overflowMenuShown = false;

					$.each($hideable.get().reverse(), function()
					{
						var $this = $(this);
						if (isOverflowing($publicTabs.coords(), true))
						{
							$hiddenList.prepend(
								$('<li />').html($this.find('.navLink').clone())
							);
							$this.hide();
							hiddenCount++;
						}
						else
						{
							if (hiddenCount)
							{
								$hiddenTab.show();

								if (isOverflowing($publicTabs.coords(), true))
								{
									$hiddenList.prepend(
										$('<li />').html($this.find('.navLink').clone())
									);
									$this.hide();
									hiddenCount++;
								}
								$('#Team_NavigationHiddenMenu').html($hiddenList).xfActivate();
								overflowMenuShown = true;
							}
							else
							{
								$hiddenTab.hide();
							}

							return false;
						}
					});
					
					if (hiddenCount && !overflowMenuShown)
					{
						$hiddenTab.show();
						$('#Team_NavigationHiddenMenu').html($hiddenList).xfActivate();
					}
					
				},
				hideVisitorTabs = function() {
					$visitorInnerTabs.hide();
				},
				isOverflowing = function(coords, checkMax) {
					if (
						coords.top >= tabsCoords.top + tabsCoords.height
						|| coords.height >= tabsCoords.height * 2
					)
					{
						return true;
					}

					if (checkMax && coords.width > maxPublicWidth)
					{
						return true;
					}

					return false;
				};

			if ($visitorTabs.length)
			{
				if (isOverflowing($visitorTabs.coords()))
				{
					hidePublicTabs();

					if (isOverflowing($visitorTabs.coords()))
					{
						//hideVisitorTabs(); *alway show!
					}
				}
				else if (isOverflowing($publicTabs.coords()))
				{
					hidePublicTabs();
				}
			}
			else if (isOverflowing($publicTabs.coords()))
			{
				hidePublicTabs();
			}
		}
	};

	XenForo.register('#Team_navigation', 'XenForo.Team_navigation');
}
(jQuery, this, document);