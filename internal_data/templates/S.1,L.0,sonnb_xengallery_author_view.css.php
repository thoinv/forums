<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.sonnb_xengallery_author_albums .titleBar,
.sonnb_xengallery_author_photos .titleBar,
.sonnb_xengallery_author_tags .titleBar,
.sonnb_xengallery_author_videos .titleBar {
	display: none;
}

.userCover {    
	max-height: 400px;
	min-height: 200px; 
	position: relative; 
	margin-top: 10px; 
	overflow: hidden; 
	background: none repeat scroll 0 0 rgba(0, 0, 0, 0.4);
}
	.userCover .controls {
		position: absolute; 
		right: 10px; 
		top: 10px; 
		z-index: 10;
	}
		.userCover .controls li {
			float: left;
			padding: 3px 10px;
			position: relative;
		}
		.userCover .controls li.edit,
		.userCover .controls li.upload {
			margin-left: 5px;
		}
		.userCover .controls li.delete,
		.userCover .controls li.upload {
			display: none;
		}
		.userCover .controls li.delete.active,
		.userCover .controls li.upload.active {
			display: block;
		}
		.userCover .controls li.upload input[type="file"] {
			border: 0 none;
			cursor: pointer;
			left: -5px;
			position: absolute;
			top: -5px;
			width: 37px;
			opacity: 0;
			filter: alpha(opacity = 0);
		}

		.userCover .controls .icon {
			display: inline-block;
			cursor: pointer;
			width: 16px;
			height: 16px;
			background-image: url("styles/sonnb/XenGallery/cover.png");
		}
			.userCover .controls .icon.edit {
				background-position: 0 0;
			}
			.userCover .controls li.edit:hover .icon.edit,
			.userCover .controls li.edit.active .icon.edit {
				background-position: 0 -19px;
			}
			.userCover .controls .icon.upload {
				background-position: -32px 0;
			}
			.userCover .controls li.upload:hover .icon.upload {
				background-position: -32px -19px;
			}
			.userCover .controls .icon.delete {
				background-position: 0 0;
				background-image: url("styles/sonnb/XenGallery/trash-icons.png");
			}
			.userCover .controls li.delete:hover .icon.delete {
				background-position: -18px 0;
			}

	.userCover .CoverCropControl {
		max-height: 400px;
		min-height: 200px; 
		position: relative;
		display: block;
	}
		.userCover .CoverCropControl .coverImage {
			display: block;
			margin: auto;
			max-width: 100%;
			position: relative;
		}
	.userCover .avatar {
		bottom: 5px;
		left: 9px;
		position: absolute;
		z-index: 3;
	}
		.userCover .avatar img,
		.userCover .avatar .img {
			background: transparent;
			padding: 0;
			border: 0;
			border-radius: 0;
		}
	.userCover .person {
		position: absolute; 
		right: 0px; 
		text-align: left; 
		left: 130px; 
		bottom: 42px;
	}
		.userCover .person h1 {
			color: #FFFFFF;     
			font-size: 2.5em;     
			font-weight: normal;     
			padding-top: 0;     
			text-shadow: 0 1px 0 #000000;
		}
		.userCover .person .character-name-holder {
			position: relative;
		}

	.userCover .stats {
		bottom: 42px;
		line-height: 17px;
		position: absolute;
		right: 12px;
	}

		.userCover .stats .stat {
			display: inline-block;     
			margin: 0 0 0 40px;
		}

		.userCover .stats h1 {
			color: #FFFFFF;     
			font-size: 2.5em;     
			font-weight: normal;     
			padding-top: 0;     
			text-shadow: 0 1px 0 #000000;
			font-size: 1.5em;     
			line-height: 0.9em;     
			text-align: right;     
			white-space: nowrap;
		}
		.userCover .stats h2 {
			font-size: 0.7em;     
			text-align: right;     
			white-space: nowrap;
			color: #FFFFFF;     
			font-size: 0.89em;     
			font-weight: normal;     
			text-shadow: 0 1px 0 #000000;
		}

	.userCover .subnav-holder {
		bottom: 0px; 
		position: absolute; 
		width: 100%; 
		left: 0px; 
		max-height: 40px;
		box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.1) inset;
		background: -moz-linear-gradient(top,rgba(0,0,0,0.65),rgba(0,0,0,0.65));
		background: -webkit-gradient(linear,50% 0,50% 100%,color-stop(0%,rgba(0,0,0,0.65)),color-stop(100%,rgba(0,0,0,0.65)));
		background: -webkit-linear-gradient(top,rgba(0,0,0,0.65),rgba(0,0,0,0.65));
		background: -o-linear-gradient(top,rgba(0,0,0,0.65),rgba(0,0,0,0.65));
		background: linear-gradient(top,rgba(0,0,0,0.65),rgba(0,0,0,0.65));
	}

		.userCover .subnav-holder .tabs {
			height: 40px; 
			list-style: none outside none; 
			margin-left: 131px; 
			border: 0 none; 
			width: auto; 
			background: none repeat scroll 0 0 transparent;
		}

			.userCover .subnav-holder .tabs li {
				color: #FFF; 
				float: left; 
				font-size: inherit; 
				padding: 0px; 
				text-align: center; 
				white-space: nowrap; 
				width: auto; 
				border-left: 1px solid rgba(255, 255, 255, 0.2); 
				border-right: 1px solid black;
			}
				.userCover .subnav-holder .tabs li:first-child {
					border-left: medium none;
				}
				.userCover .subnav-holder .tabs li.active, 
				.userCover .subnav-holder .tabs li:hover {
					background: -moz-linear-gradient(top,rgba(0,0,0,0.7),rgba(0,0,0,0.7));
					background: -webkit-gradient(linear,50% 0,50% 100%,color-stop(0%,rgba(0,0,0,0.7)),color-stop(100%,rgba(0,0,0,0.7)));
					background: -webkit-linear-gradient(top,rgba(0,0,0,0.7),rgba(0,0,0,0.7));
					background: -o-linear-gradient(top,rgba(0,0,0,0.7),rgba(0,0,0,0.7));
					background: linear-gradient(top,rgba(0,0,0,0.7),rgba(0,0,0,0.7));
					background: none repeat scroll 0 0 #222222/;
					color: #FFFFFF;
				}				

				.userCover .subnav-holder .tabs li.active {
					font-weight: bold;
				}

					.userCover .subnav-holder .tabs li a {
						background: none repeat scroll 0 0 transparent; 
						cursor: pointer; 
						display: block; 
						line-height: 1em; 
						padding: 13px 20px 12px; 
						text-shadow: 1px 1px 2px #000; 
						margin: 0; 
						border: 0 none; 
						border-radius: 0 0 0 0; 
						height: 15px;
						color: #FFF;
						font-size: 15px;
					}
.profileContent .userCover {
	height: 40px;
	min-height: 40px;
}

	.profileContent .userCover .avatar,
	.profileContent .userCover .person,
	.profileContent .userCover .controls,
	.profileContent .userCover .CoverCropControl	{
		display: none;
	}
	
	.profileContent .userCover .stats {
		bottom: 0;
		z-index: 99;
		display: none;
	}
		.profileContent .userCover .stats .stat {
			margin-left: 20px;
		}
			.profileContent .userCover .subnav-holder .tabs {
				margin-left: 0;
				margin-top: 0;
				padding-left: 0;
			}
				.profileContent .userCover .subnav-holder .tabs li.profileTab {
					display: none;
				}
				.profileContent .userCover .tabs.mainTabs li.active a {
					background: none repeat scroll 0 0 transparent;
				}
				.profileContent .userCover .tabs.mainTabs li a:hover {
					background: none repeat scroll 0 0 transparent;
				}
				
@media only screen and (max-width: 500px), only screen and (max-device-width: 500px)
{
	.userCover .person {
		bottom: 72px;
	}
}				';
