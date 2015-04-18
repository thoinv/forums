<?php if (!class_exists('XenForo_Application', false)) die(); $__output = '';
$__output .= '.avatarGallery {
	max-height: 200px;
	overflow: auto !important;
	overflow-y: auto !important;
}

	.avatarGallery ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

		.avatarGallery ul > li {
			display: inline-block;
			position: relative;
			float: left;
			width: 96px;
			height: 96px;
			margin: 8px;
			padding: 5px;
			transition: background-color .4s;
			-moz-transition: background-color .4s;
			-webkit-transition: background-color .4s;
			-o-transition: background-color .4s;
			background-color: rgba(0, 0, 0, 0.1);
		}

		dl.avatarGallery ul > li {
			background-color: rgba(128, 128, 128, 0.1);
		}

		.avatarGallery ul > li:hover {
			background-color: rgba(0, 0, 0, 0.4);
		}

		dl.avatarGallery ul > li:hover {
			background-color: rgba(128, 128, 128, 0.4);
		}

			.avatarGallery ul > li input {
				position: absolute;
				bottom: 2px;
				right: 2px;
			}

			.avatarGallery ul > li img {
				width: 96px;
				height: 96px;
				cursor: pointer;
			}

#ctrl_useGallery_Disabler {
	clear: both;
	width: 100%;
}';
