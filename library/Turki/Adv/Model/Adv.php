<?php

class Turki_Adv_Model_Adv extends XenForo_Model
{

	public function getAdvById($advId)
	{
		return $this->_getDb()->fetchRow('
			SELECT *
			FROM xf_advxenforo
			WHERE adv_id = ?
		', $advId);
	}

	public function getAllAdv()
	{
		return $this->fetchAllKeyed('
			SELECT *
			FROM xf_advxenforo
			ORDER BY title
		', 'adv_id');
	}


	public function getSmiliesXml(array $smilieIds)
	{
		if ($smilieIds) {
			$smilies = $this->fetchAllKeyed('
				SELECT xf_smilie.*,
					xf_smilie_category.display_order AS smilie_category_order
				FROM xf_smilie
				LEFT JOIN xf_smilie_category ON
					(xf_smilie_category.smilie_category_id = xf_smilie.smilie_category_id)
				WHERE xf_smilie.smilie_id IN (' . $this->_getDb()->quote($smilieIds) . ')
				ORDER BY xf_smilie_category.display_order, xf_smilie.display_order, xf_smilie.title
			', 'smilie_id');
		} else {
			$smilies = array();
		}

		$document               = new DOMDocument('1.0', 'utf-8');
		$document->formatOutput = TRUE;

		$rootNode = $document->createElement('smilies_export');
		$document->appendChild($rootNode);

		$smiliesNode      = $document->createElement('smilies');
		$smilieCategories = array();
		foreach ($smilies AS $smilie) {
			$smilieNode = $document->createElement('smilie');

			if ($smilie['smilie_category_id']) {
				$smilieCategories[$smilie['smilie_category_id']] = $smilie['smilie_category_order'];
				$smilieNode->setAttribute('smilie_category_id', $smilie['smilie_category_id']);
			}

			$smilieNode->setAttribute('title', $smilie['title']);

			$smilieNode->appendChild($document->createElement('image_url', $smilie['image_url']));

			if ($smilie['sprite_mode']) {
				$spriteParamsNode = $document->createElement('sprite_params');

				foreach (unserialize($smilie['sprite_params']) AS $param => $value) {
					$spriteParamsNode->setAttribute($param, $value);
				}

				$smilieNode->appendChild($spriteParamsNode);
			}

			foreach (preg_split('/\r?\n/', $smilie['smilie_text'], -1, PREG_SPLIT_NO_EMPTY) AS $smilieText) {
				$smilieNode->appendChild($document->createElement('smilie_text', $smilieText));
			}

			$smilieNode->setAttribute('display_order', $smilie['display_order']);
			$smilieNode->setAttribute('display_in_editor', $smilie['display_in_editor']);

			$smiliesNode->appendChild($smilieNode);
		}

		$categoriesNode = $document->createElement('smilie_categories');
		foreach ($smilieCategories AS $smilieCategoryId => $displayOrder) {
			if ($smilieCategoryId) {
				$categoryNode = $document->createElement('smilie_category');
				$categoryNode->setAttribute('id', $smilieCategoryId);
				$categoryNode->setAttribute('title', $this->getSmilieCategoryMasterTitlePhraseValue($smilieCategoryId));
				$categoryNode->setAttribute('display_order', $displayOrder);

				$categoriesNode->appendChild($categoryNode);
			}
		}

		$rootNode->appendChild($categoriesNode);
		$rootNode->appendChild($smiliesNode);

		return $document;
	}


}