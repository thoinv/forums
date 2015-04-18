<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.sonnb_xengallery_photo_view .titleBar {
	margin-top: 10px;
}
.pvOverlayWrapper {
	width: 980px;
	top: 10px !important;
	padding: 10px;
}
	.pvContentWrapper {
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_contentWrapper') . '
	}
	.pvOverlayWrapper .pvContentWrapper {
		margin-top: 0;
	}
		.pvOverlayWrapper .heading {
			display:none;
		}
		.pvContentWrapper .pvContentInner {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_ContentInner') . '
		}
		.pvContentWrapper .pvContentInner > h4 {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_sectionHeader') . '
		}
		.pvOverlayWrapper .pvContentWrapper .pvContentInner {
			background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
			margin: 30px auto auto;
			padding: 10px;
			margin: 0 -10px;
			width: 960px;
			border-radius: 5px 5px 5px 5px;
		}
			.pvContentWrapper  .pvContentInner a.close.OverlayCloser {
				display: none;
			}
			.pvOverlayWrapper .pvContentWrapper .pvContentInner a.close.OverlayCloser {
				display: block;
				right: -17px;
				top: -17px;
			}
			.photoWrapper {
				' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoWrapper') . '
			}
				.pwPhoto {
					' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoContainer') . '
				}
				.pwPhoto.video {
					padding-bottom: 40%;
					margin-bottom: 34px;
				}
				.pwPhoto.loaded {
					background-image: none;
				}
				.pwPhoto.broken {
					background-image: url("styles/sonnb/XenGallery/broken.png");
					/*background-color: #be3730;*/
					background-position: center center;
					background-repeat: no-repeat;
				}
					.pwPhoto .prevPhoto,
					.pwPhoto .nextPhoto {
						top: 0;
						opacity: 0.1;
						position: absolute; 
						height: 48px; 
						width: 48px;
						top: 50%;
						margin-top: -24px; 
						transition: opacity 0.2s ease-in-out;a
						-webkit-transition: opacity 0.2s ease-in-out;
						-moz-transition: -moz-opacity 0.2s ease-in-out;
						z-index: 1;					
					}
					.pwPhoto .prevPhoto i,
					.pwPhoto .nextPhoto i {
						background-image: url("' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_iconsPath') . '");
						width: 48px;
						height: 48px;
						display: block;
					}
					.pwPhoto .prevPhoto i{
						background-position: -4px -178px;
					}
					.pwPhoto .nextPhoto i{
						background-position: -60px -178px;
					}
					.pwPhoto .prevPhoto:hover,
					.pwPhoto .nextPhoto:hover {
						opacity: 1;
					}
					.pwPhoto.video object,
					.pwPhoto.video iframe{
						width: 100%;
						height: 100%;
						left: 0;
						position: absolute;
						top: 0;
					}					
					';
if ($pageIsRtl)
{
$__output .= '
						.pwPhoto .prevPhoto {
							right: 24px;
						}
						.pwPhoto .nextPhoto {
							left: 24px;
						}
					';
}
else
{
$__output .= '
						.pwPhoto .prevPhoto {
							left: 24px;
						}
						.pwPhoto .nextPhoto {
							right: 24px;
						}
					';
}
$__output .= '
					
					.pwPhoto img {
						height: auto;
						max-width: 100%;
						margin: auto;
						vertical-align: middle;
					}
					.pwPhoto img.lazy {
						width: auto;
						margin: auto;
						display: none;
					}
					.hasJs .pwPhoto img.lazy {
						display: none;
					}
					
				.photoWrapper .pwPhotoActions{
					' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoActionContainer') . '
				}
				.photoWrapper .pwPhotoActions.video {
					background-color: transparent;
				}
					.photoWrapper .pwPhotoActions .action {
						' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoActionItem') . '
					}
					.photoWrapper .pwPhotoActions .action.share {
						float: right;
					}
					.photoWrapper .pwPhotoActions .action.like {
						
					}
					.photoWrapper .pwPhotoActions .action.comment {
						
					}
					.photoWrapper .pwPhotoActions .action.fullscreen {
						float: right;
					}
					.pvOverlayWrapper .photoWrapper .pwPhotoActions .action.fullscreen {
						display: none;
					}
						.photoWrapper .pwPhotoActions .action i {
							' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_photoActionIcon') . '
						}
						.photoWrapper .pwPhotoActions .action i {
							background-image: url("' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_iconsPath') . '");
						}
						.photoWrapper .pwPhotoActions .action.share i {
							background-position: -36px -44px;
						}
						.photoWrapper .pwPhotoActions .action.share:hover i,
						.photoWrapper .pwPhotoActions .action.share.active i {
							background-position: -36px -72px;
						}
						
						.photoWrapper .pwPhotoActions .action.like i {
							background-position: -92px -43px;
						}
						.photoWrapper .pwPhotoActions .action.like:hover i,
						.photoWrapper .pwPhotoActions .action.like.active i {
							background-position: -92px -71px;
						}
						
						.photoWrapper .pwPhotoActions .action.comment i {
							background-position: -120px -44px;
						}
						.photoWrapper .pwPhotoActions .action.comment:hover i,
						.photoWrapper .pwPhotoActions .action.comment.active i {
							background-position: -120px -72px;
						}
						
						.photoWrapper .pwPhotoActions .action.tag i {
							background-position: -65px 2px;
						}
						.photoWrapper .pwPhotoActions .action.tag:hover i,
						.photoWrapper .pwPhotoActions .action.tag.active i {
							background-position: -93px 2px;
						}
						
						.photoWrapper .pwPhotoActions .action.fullscreen i {
							background-position: -64px -44px;
						}
						.photoWrapper .pwPhotoActions .action.fullscreen:hover i,
						.photoWrapper .pwPhotoActions .action.fullscreen.active i {
							background-position: -64px -72px;
						}
			.commentWrapper {
				overflow: hidden;
				word-wrap: break-word;
			}
			.pvOverlayWrapper .commentWrapper {
				overflow: hidden;
				word-wrap: break-word;
			}
				.cwHeader {
					display: none;
				}	
					.cwhControls{
						padding: 7px 7px 0 15px;
						text-align: right;
					}
						.cwhControls a.close {
							display: inline-block;
							height: 12px;
							margin-left: 5px;
							vertical-align: top;
							width: 11px;
						}
					.commentContainer {
						width: 100%;
					}
						.commentContainer > .commentWrapper {
							float: left;
							margin-right: -260px;
							width: 100%;
						}
						.commentContainer .messageSimple{
							border-bottom: 0 none !important;
							margin-right: 260px;
							display: block;
							width: auto;
						}
							.commentContainer .messageSimple .messageInfo{ 
								padding-right: 20px;
							}
							.messageSimple .messageContent article, 
							.messageSimple .messageContent blockquote {
								display:block;
							}
								.messageSimple .messageContent dl {
									margin: 0; 
									display: inline-block; 
									width: 100%;
								}
								.messageSimple .messageContent dl dt {
									float: left;
								}
								.messageSimple .messageContent dl dd {
									float: left;
									margin-left: 5px;
								}
								.messageSimple .messageContent dl dd a{
									margin: 0;
									padding: 0;
								}
								.messageSimple .messageContent ul {
									margin: 0;
								}
								.messageSimple .messageContent li {
									list-style: none;
									margin: 0;
									padding: 0;
									float: left;
								}
								.messageSimple .messageContent li:first-child:before {
									content: "";
								}
								.messageSimple .messageContent li:before {
									content: ", ";
								}
							.messageSimple .messageContent .muted a {
								color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . '!important
							}	
							.messageSimple .comment .privateControls, 
							.messageSimple .comment .publicControls {
								opacity: 0.5
							}	
							.messageSimple .privateControls .item, 
							.messageSimple .publicControls .item {
								background-color: transparent !important;
								box-shadow: none !important;
							}	
							.messageSimple .messageResponse {
								font-size:12px;
								max-width: 100%;
							}	
							.messageSimple .messageResponse .comment:hover .messageMeta .privateControls, 
							.messageSimple .messageResponse .comment:hover .messageMeta .publicControls {
								opacity: 1;
							}	
								.messageSimple .messageResponse .commentMore span {
									float: right;
								}
							.messageSimple .comment textarea {
								min-height: 60px;
								max-height: 500px;
							}
							.commentContainer .commentControls {float: right; display: inline-block; width: 250px;font-size: 12px;}
								.commentContainer .commentControls h4 {border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . ';color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';margin: 20px -5px 6px;padding: 0 5px 6px;font-size:14px}
								.commentContainer .commentControls .albumInfo {}
									.commentContainer .commentControls .albumName, .commentContainer .commentControls .albumPrivacy {margin-bottom: 5px;}
										.commentContainer .commentControls .albumName span, .commentContainer .commentControls .albumPrivacy span {margin-bottom: 5px;margin-right: 5px;margin-top: 10px;}
								.commentContainer .commentControls .photoControls {}
									
									.commentContainer .commentControls .photoExif {
									
									}
									.commentContainer .commentControls .photoExif .viewExifLink {
										margin-top: 5px;
									}

									.commentContainer .commentControls .streamingHeader .editToggle {
										font-size: 11px; 
										float: right;
									}
									.commentContainer .commentControls .streaming {
									
									}
										.commentContainer .commentControls .streaming {
											display: inline-block;
										}
										.commentContainer .commentControls .streaming .streamList li {
											float: left;
											margin-right: 5px;
											margin-bottom: 5px;
											color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
										}
										.commentContainer .commentControls .streaming .streamList li a {
											color: ' . XenForo_Template_Helper_Core::styleProperty('mutedTextColor') . ';
											text-decoration: none;
										}
										.commentContainer .commentControls .streaming .streamItem:hover a {
											color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
										}
										.commentContainer .commentControls .streaming .streamList li .streamItem{
											padding: 1px 5px;
											display: block;
											border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . ';
											border-radius: 3px;
										}
										.commentContainer .commentControls .streaming .xenForm {
											width: 100%;
											margin-bottom: 0;
											display: none;
										}
											.commentContainer .commentControls .streaming .xenForm .explain {
												margin-top: 5px;
											}
											.commentContainer .commentControls .streaming .xenForm .button {
												display: block; 
												margin: 5px auto;
											}
											.commentContainer .commentControls .streaming .xenForm .textCtrl {
												background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
												border-color: #C0C0C0 #E9E9E9 #E9E9E9 #C0C0C0;
												border-radius: 4px 4px 4px 4px;
												border-style: solid;
												border-width: 1px;
												color: ' . XenForo_Template_Helper_Core::styleProperty('textCtrlText') . ';
												font-size: 13px;
												outline: 0 none;
												padding: 2px;
												width: 240px;
											}

								.commentContainer .commentInfo .commentContent .bbCodeImage {
									background: none repeat scroll 0 0 #FFFFFF;
									border: 1px solid #CCCCCC;
									display: block;
									margin: 5px 0;
									max-width: 100%;
									padding: 4px;
									vertical-align: middle;
								}
								.commentContainer .commentInfo .commentContent iframe {
									display: block;
									margin: 5px 0;
									max-width: 100%;
									vertical-align: middle;
								}
								.commentContainer .commentInfo .likesSummary.secondaryContent {border:1px solid ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . ';margin-top: 5px;}
								.commentContainer .commentInfo .messageNotices li {margin-top: 0;}
									
									.photoControls .iconActionLinks {border-bottom: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . '; padding-bottom: 7px; margin-bottom: 3px;}
										.photoControls .iconActionLinks > a , .photoControls > a {display:block;box-shadow: none !important;}
		
	span.exif-detail{
		border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . ';
		margin-right: 3px;
		padding: 1px 3px;
	}
	';
if ($pageIsRtl)
{
$__output .= '
	span.exif-detail{
		display: inline-block;
	}
	';
}
$__output .= '
	#exif-details, 
	span.exif-detail {
		border-radius: 3px 3px 3px 3px;
	}
	#exif-detail-container a:hover {
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
		color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
	}
	#exif-detail-container > a {
		border-radius: 3px;
		display: inline-block;
		padding: 4px 0 4px 4px;
		text-decoration: none;
	}

	.quickEditForm {
		display:none;
		border: 10px solid rgba(3, 42, 70, 0.5);
		border-radius: 10px;
		box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
		padding: 5px;
		position: absolute;
		width: 375px !important;
		background-color: ' . XenForo_Template_Helper_Core::styleProperty('contentBackground') . ';
		overflow: hidden;
		z-index: 1000;
	}
	.quickEditForm .ctrlUnit dd input.textCtrl {
		width: 330px;
	}
	.quickEditForm .submitUnit{
		margin-bottom: 0;
	}
	.quickEditForm .submitUnit dd {
		/*float: none;*/
	}	
	
	.clearfix:after {
		clear: both;
		content: ".";
		display: block;
		font-size: 0;
		height: 0;
		line-height: 0;
		visibility: hidden;
	}

	.relatedPhotos {
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_relatedPhotoWrapper') . '
	}
		.relatedPhotos .scrollable {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_relatedPhotoContainer') . '
		}
			.relatedPhotos .scrollable .items {
				width:20000em; 
				position:absolute;
				top: 0;
			}
				.relatedPhotos .scrollable .items div {
					float:left;
				}
				.relatedPhotos .scrollable .items img{
					width:60px; 
					height:60px;
					opacity: 0.5;
				}
				.relatedPhotos .scrollable .items img:hover,
				.relatedPhotos .scrollable .items a.active img{
					/*outline: 2px solid #217AB3;*/
					opacity: 1;
				}
		.relatedPhotos .prev.left {
			bottom: 0;
			height: 60px;
			top: 0;
			position: absolute;
			width: 20px;
		}
		.relatedPhotos .next.right{
			bottom: 0;
			height: 60px;
			position: absolute;
			right: 0;
			top: 0;
			width: 20px;
		}					
		';
if (!$pageIsRtl)
{
$__output .= '
			.relatedPhotos .prev.left {
				left: 0;
			}
			.relatedPhotos .next.right {
				right: 0;
			}
		';
}
else
{
$__output .= '
			.relatedPhotos .prev.left {
				right: 0;
			}
			.relatedPhotos .next.right {
				left: 0;
			}
		';
}
$__output .= '
		.relatedPhotos .prev.left:hover, 
		.relatedPhotos .next.right:hover{
			cursor:pointer;
			background:linear-gradient(to bottom, #468EE6 0px, #0063DC 100%) repeat scroll 0 0 #0063DC;
		}
			.relatedPhotos .prev.left span, 
			.relatedPhotos .next.right span {
				background-image: url("styles/sonnb/XenGallery/related-sprite.png");
				display: block;
				height: 18px;
				left: 5px;
				position: absolute;
				top: 22px;
				width: 10px;
			}
			.relatedPhotos .prev.left span {
				background-position: -7px -11px;
			}
			.relatedPhotos .next.right span {
				background-position: -47px -11px;
			}
			.relatedPhotos .prev.left:hover span {
				background-position: -7px -51px;
			}
			.relatedPhotos .next.right:hover span {
				background-position: -47px -51px;
			}


	@media only screen and (max-width: 710px), only screen and (max-device-width: 710px)
	{
		.commentContainer > .commentWrapper
		{
			float:none;margin-right:0;
		}
		.commentContainer .messageSimple {
			margin-right: 0;
		}
			.commentContainer .messageSimple .messageInfo{
				margin-left: 0;
				padding-right: 0;
			}
				.commentContainer .messageSimple .messageInfo .messageContent,
				.commentContainer .messageSimple .messageInfo .messageMeta {
					margin-left: 65px;
				}
				.commentContainer .messageSimple .messageInfo .messageResponse .messageMeta {
					margin-left: 0;
				}
		.commentContainer .commentControls {
			float:none;
			width:auto;
		}
	}

	.photoTag-tag {
		' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_tagWrapper') . '
	}
	html.phone .photoTag-tag,
	html.tablet .photoTag-tag {
		opacity: 0.8 !important;
	}
		.photoTag-tag .innerTag {
			' . XenForo_Template_Helper_Core::styleProperty('sonnbXG_view_taggingInner') . '
		}
		.photoTagForm {
			position: absolute;
			padding: 3px;
			line-height: normal;;
		}
			.photoTagForm .textCtrl {
				width: 98px;
			}
			.photoTagForm .button.primary {
				width: 50px;
			}
			.photoTagForm .button.primary[type="submit"] {
				margin-right: 3px;
			}
			.photoTag-tag .photoTag-delete {
				background: url("' . XenForo_Template_Helper_Core::styleProperty('imagePath') . '/xenforo/overlay/close.png") no-repeat scroll 0 0 transparent;
				cursor: pointer;
				display: inline;
				height: 36px;
				opacity: 1;
				position: absolute;
				right: -18px;
				top: -17px;
				width: 36px;
				z-index: 3200;
			}
		.photoTag-cpanel {
			-webkit-transition: opacity .3s;
			-moz-transition: opacity .3s;
			-ms-transition: opacity .3s;
			-o-transition: opacity .3s;
			transition: opacity .3s;

			-webkit-background-clip: padding-box;
			-moz-background-clip: padding-box;
			-ms-background-clip: padding-box;
			-o-background-clip: padding-box;

			-webkit-font-smoothing: antialiased;
			-moz-font-smoothing: antialiased;
			-ms-font-smoothing: antialiased;
			-o-font-smoothing: antialiased;

			filter: alpha(opacity=80);
			background-color: rgba(0, 0, 0, .8);
			bottom: 0;
			color: ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . ';
			font-size: 13px;
			left: 0;
			padding: 0;
			position: absolute;
			width: 100%;
			display: none;
			padding: 8px 0;
		}
			.photoTag-cpanel a {
				font-weight: bold;
				color: ' . XenForo_Template_Helper_Core::styleProperty('primaryMedium') . ';
			}

#XenForo .pac-container {
	background-color: ' . XenForo_Template_Helper_Core::styleProperty('pageBackground') . ';
	border: 1px solid ' . XenForo_Template_Helper_Core::styleProperty('faintTextColor') . ';
}

.xenOverlay .formOverlay a.button {
	color: ' . XenForo_Template_Helper_Core::styleProperty('contentText') . ';
}

.fieldListContainer {
	margin-top: 10px;
}
.locationContainer,
.cameraContainer {
	margin-top: 10px;
}';
