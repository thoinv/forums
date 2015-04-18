<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.xenOverlay.shareOverlay {
	width: 660px;
	max-width: 100%;
}
.xenOverlay.shareOverlay a.close {

}

.xenOverlay.shareOverlay .shareContainerOverlay,
.shareContainer {

}
	.shareContent{
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
		z-index: 1002;
	}
	.shareList {
		
	}

		.shareList .share-options{
			border-bottom: 1px solid #E3E3E3;
			overflow: hidden;
		}

			.shareList .share-options .share-options-header{
				background: none repeat scroll 0 0 ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
				border-radius: 0 0 0 0;
				color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
				cursor: pointer;
				font-weight: bold;
				overflow: hidden;
				padding: 0.5em 0 0.5em 5px;
				width: 100%;
			}
			
			.shareList .share-options .share-options-inner{
				margin: 0 0 10px;
				padding: 0 16px;
			}

				.shareList .share-options .share-options-inner input,
				.shareList .share-options .share-options-inner textarea {
					width: 580px;
					margin-top: 5px;
					resize: vertical;
				}
				
				.shareList .share-options .share-options-inner .share-services {
					text-align: center;
				}
				.shareList .share-options .share-options-inner .share-service {
					display: inline-block;
					margin: 0;
					position: relative;
					text-align: center;
					vertical-align: top;
					width: 88px;
					padding-top: 10px;
				}
					.shareList .share-options .share-options-inner .share-service .share-icon {
						display: inline-block;
						height: 45px;
						position: relative;
						text-indent: -9999em;
						vertical-align: bottom;
						width: 45px;
						background-image: url(\'styles/sonnb/XenGallery/share-icons.png\');
					}
					.shareList .share-options .share-options-inner .share-service .share-icon.facebook {
						background-position: -190px -19px;
					}
					.shareList .share-options .share-options-inner .share-service .share-icon.google {
						background-position: -20px -19px;
						border-radius: 9px;
					}
					.shareList .share-options .share-options-inner .share-service .share-icon.twitter {
						background-position: -105px -19px;
					}
					.shareList .share-options .share-options-inner .share-service .share-icon.tumblr {
						background-position: -357px -19px;
					}
					.shareList .share-options .share-options-inner .share-service .share-icon.pinterest {
						background-position: -440px -19px;
					}
					.shareList .share-options .share-options-inner .share-service .service-name {
						display: block;
						margin-bottom: 10px;
						padding-top: 4px;
					}';
