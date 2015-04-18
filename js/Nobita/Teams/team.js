/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.TeamMasonryContainer = function($container)
	{
		this.__construct($container);
	};

	XenForo.TeamMasonryContainer.prototype = 
	{
		__construct: function($container)
		{
			this.$container = $container;
			this.width = 0;

			this.checkWindowSize(null, false);

			$container.masonry({
                itemSelector: '.groupItem',
                isAnimated: !Modernizr.csstransitions,
                easing: 'linear',
                gutterWidth: 10
            }).imagesLoaded(function(){
            	$container.masonry('reload');
            });

            $(window).bind('orientationchange resize', $.context(this, 'windowResize'));
		},

		windowResize: function (e)
        {
            this.checkWindowSize(null, false);
            this.$container.masonry();
        },

        checkWindowSize: function(windowSize, force)
        {
            if (windowSize === null)
            {
                windowSize = $(window).width();
            }

            if (this.width === windowSize && force === false)
            {
                return true;
            }

            this.width = windowSize;

            var $items = $('.groupItem', this.$container),
           		containerSize = this.$container.outerWidth(),
                marginRight = parseInt($items.css('margin-right')),
                itemSize = 0;

            if (marginRight < 1)
            {
                marginRight = 10;
            }

            if (this.width <= 320 && containerSize <= 320)
            {
                itemSize = Math.floor(containerSize);
                $items.width(itemSize)
                      .css({'max-width': 'none'})
                      .find('img').css({'max-width': '100%', 'width': itemSize});
            }
            else if (this.width <= 500 && containerSize <= 500)
            {
                itemSize = Math.floor((containerSize - marginRight)/2);
                $items.width(itemSize);
            }
            else
            {
                var itemNum = Math.floor(containerSize/240);
                itemSize = Math.floor((containerSize - (itemNum-1)*marginRight)/itemNum);

                if (itemSize > 280)
                {
                	imgWidth = itemSize;
                }
                else
                {
                	imgWidth = '100%';
                }

                $items
                    .width(itemSize)
                    .css({'min-width': '0', 'max-width': 'none'}).
                    find('img').css({'max-width': '100%', 'width': imgWidth});
            }
        }
	};

	XenForo.register('.TeamMasonry', 'XenForo.TeamMasonryContainer');
}
(jQuery, this, document);