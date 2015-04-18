<?php

class bdSocialShare_BbCode_Formatter_ImageCollect extends XenForo_BbCode_Formatter_Base
{
	protected $_imageTemplate = '%1$s';

	protected $_found = array();

	public function getFound()
	{
		return $this->_found;
	}

	public function getTags()
	{
		if ($this->_tags !== null)
		{
			return $this->_tags;
		}

		return array(
			'img' => array(
				'hasOption' => false,
				'plainChildren' => true,
				'callback' => array(
					$this,
					'renderTagImage'
				)
			),

			'quote' => array(
				'plainChildren' => true,
				'trimLeadingLinesAfter' => 2,
				'callback' => array(
					$this,
					'renderTagQuote'
				)
			),

			'media' => array(
				'hasOption' => true,
				'plainChildren' => true,
				'callback' => array(
					$this,
					'renderTagMedia'
				)
			),

			'attach' => array(
				'plainChildren' => true,
				'callback' => array(
					$this,
					'renderTagAttach'
				)
			),
		);
	}

	public function renderTagImage(array $tag, array $rendererStates)
	{
		$rendered = parent::renderTagImage($tag, $rendererStates);

		if (Zend_Uri::check($rendered))
		{
			$this->_found[] = array(
				'image',
				$rendered
			);
		}

		return '';
	}

	public function renderTagMedia(array $tag, array $rendererStates)
	{
		$mediaKey = trim($this->stringifyTree($tag['children']));
		$mediaSiteId = strtolower($tag['option']);

		$this->_found[] = array(
			'media',
			$mediaSiteId,
			$mediaKey
		);

		return '';
	}

	public function renderTagAttach(array $tag, array $rendererStates)
	{
		$attachmentId = trim($this->stringifyTree($tag['children']));

		if (!empty($attachmentId))
		{
			$this->_found[] = array(
				'attach',
				$attachmentId
			);
		}

		return '';
	}

}
