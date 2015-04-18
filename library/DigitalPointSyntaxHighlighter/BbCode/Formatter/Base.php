<?php

include_once(XenForo_Application::getInstance()->getRootDir() . '/library/DigitalPointSyntaxHighlighter/geshi.php');

class DigitalPointSyntaxHighlighter_BbCode_Formatter_Base extends XFCP_DigitalPointSyntaxHighlighter_BbCode_Formatter_Base
{
	public function renderTagPhp(array $tag, array $rendererStates)
	{
		$content = $this->stringifyTree($tag['children']);
		$content = XenForo_Helper_String::censorString($content);

		$geshi = new GeSHi($content, $tag['tag']);
	
		if (XenForo_Application::get('options')->get('dpSyntaxHighlighterShowLines'))
        {
            $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
        }
         
		$geshi->set_link_target('_blank" rel="nofollow'); 
		$geshi->set_header_type(GESHI_HEADER_NONE); 
		$geshi->set_tab_width(4);
		$content = $geshi->parse_code();

		if ($this->_view)
		{
			$template = $this->_view->createTemplateObject('bb_code_tag_php', array(
				'content' => $content
			));
			return $template->render();
		}
		else
		{
			return '<div style="margin: 1em auto" title="PHP">' . $content . '</div>';
		}
	}

	public function renderTagHtml(array $tag, array $rendererStates)
	{

		$content = $this->stringifyTree($tag['children']);
		$content = XenForo_Helper_String::censorString($content);

		$geshi = new GeSHi($content, 'html5');
	
		if (XenForo_Application::get('options')->get('dpSyntaxHighlighterShowLines'))
        {
            $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
        }
         
		$geshi->set_link_target('_blank" rel="nofollow'); 
		$geshi->set_header_type(GESHI_HEADER_NONE); 
		$geshi->set_tab_width(4);
		$content = $geshi->parse_code();

		if ($this->_view)
		{
			$template = $this->_view->createTemplateObject('dp_bb_code_tag_html', array(
				'content' => $content
			));
			return $template->render();
		}
		else
		{
			return '<div style="margin: 1em auto" title="HTML">' . $content . '</div>';
		}
	}

	public function renderTagCode(array $tag, array $rendererStates)
	{
		if (strtolower(strval($tag['option'])) == 'html') $tag['option'] = 'html5';
		if (!$tag['option']) $tag['option'] = 'text';
		
		$content = $this->stringifyTree($tag['children']);
		$content = XenForo_Helper_String::censorString($content);

		$geshi = new GeSHi($content, $tag['option']);

		if (XenForo_Application::get('options')->get('dpSyntaxHighlighterShowLines'))
        {
            $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
        }
         
		$geshi->set_link_target('_blank" rel="nofollow'); 
		$geshi->set_header_type(GESHI_HEADER_NONE); 
		$geshi->set_tab_width(4);
		$content = $geshi->parse_code();

		if ($this->_view)
		{
			$template = $this->_view->createTemplateObject('dp_bb_code_tag_code', array(
				'content' => $content,
				'language' => $geshi->get_language_name()
			));
			return $template->render();
		}
		else
		{
			return '<div style="margin: 1em auto" title="Code">' . $content . '</div>';
		}
	}

	public function parseValidateTagCode(array $tagInfo, $tagOption)
	{
		$response = parent::parseValidateTagCode($tagInfo, $tagOption);
		if ($response !== true) {
			if (strlen($tagOption)) {
				$response['language'] = strtolower($tagOption);
			}
		}
		return $response;
	}


}