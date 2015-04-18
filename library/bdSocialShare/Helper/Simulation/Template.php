<?php

class bdSocialShare_Helper_Simulation_Template extends XenForo_Template_Public
{
	public static $bdSocialShare_Helper_styleId = 0;
	public static $bdSocialShare_Helper_languageId = 0;
	public static $bdSocialShare_Helper_visitor = null;

	public function __construct($templateName, array $params = array())
	{
		if (self::$bdSocialShare_Helper_visitor !== null)
		{
			$params['visitor'] = self::$bdSocialShare_Helper_visitor;
		}

		$params['xenOptions'] = XenForo_Application::getOptions()->getOptions();

		parent::__construct(sprintf('__%s_%d_%d', $templateName, self::$bdSocialShare_Helper_styleId, self::$bdSocialShare_Helper_languageId), $params);
	}

	protected function _getTemplatesFromDataSource(array $templateList)
	{
		$db = XenForo_Application::getDb();

		$templateNames = array();
		foreach ($templateList as $template)
		{
			if (preg_match('#^__(?<name>.+)_(\d+)_(\d+)$#', $template, $matches))
			{
				$templateNames[] = $matches['name'];
			}
		}

		$results = array();

		$templates = $db->fetchAll('
			SELECT *
			FROM xf_template_compiled
			WHERE title IN (' . $db->quote($templateNames) . ')
		');

		foreach ($templates as $template)
		{
			$results[sprintf('__%s_%d_%d', $template['title'], $template['style_id'], $template['language_id'])] = $template['template_compiled'];
		}

		return $results;
	}

	protected function _loadTemplateFilePath($templateName)
	{
		if ($this->_usingTemplateFiles() AND preg_match('#^__(?<name>.+)_(?<style>\d+)_(?<language>\d+)$#', $templateName, $matches))
		{
			return XenForo_Template_FileHandler::get($matches['name'], $matches['style'], $matches['language']);
		}
		else
		{
			return '';
		}
	}

}
