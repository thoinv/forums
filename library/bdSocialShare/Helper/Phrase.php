<?php

class bdSocialShare_Helper_Phrase extends XenForo_Phrase
{
	protected $_instanceLanguageId;
	protected static $_phraseLanguageToLoad = array();

	public function __construct($languageId, $phraseName, array $params = array(), $insertParamsEscaped = true)
	{
		parent::__construct(self::getCachePhraseName($languageId, $phraseName), $params, $insertParamsEscaped);

		self::preloadPhraseOfLanguageId($languageId, $phraseName);

		$this->_instanceLanguageId = $languageId;
	}

	public function render($phraseNameOnInvalid = null)
	{
		self::loadPhrasesOfLanguageId($this->_instanceLanguageId);

		return parent::render($phraseNameOnInvalid);
	}

	public static function preloadPhraseOfLanguageId($languageId, $phraseName)
	{
		if (!isset(XenForo_Phrase::$_phraseCache[self::getCachePhraseName($languageId, $phraseName)]))
		{
			self::$_phraseLanguageToLoad[$languageId][$phraseName] = true;
		}
	}

	public static function loadPhrasesOfLanguageId($languageId)
	{
		if (empty(self::$_phraseLanguageToLoad[$languageId]))
		{
			return;
		}

		$db = XenForo_Application::getDb();

		$phrases = $db->fetchPairs('
			SELECT title, phrase_text
			FROM xf_phrase_compiled
			WHERE language_id = ?
				AND title IN (' . $db->quote(array_keys(self::$_phraseLanguageToLoad[$languageId])) . ')
		', $languageId);

		foreach ($phrases as $title => $text)
		{
			XenForo_Phrase::$_phraseCache[self::getCachePhraseName($languageId, $title)] = $text;
		}

		self::$_phraseLanguageToLoad[$languageId] = array();
	}

	public static function getCachePhraseName($languageId, $title)
	{
		return sprintf('__%d__%s', $languageId, $title);
	}

}
