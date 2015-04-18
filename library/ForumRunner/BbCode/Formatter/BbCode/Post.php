<?php
/*
 * Forum Runner
 *
 * Copyright (c) 2010-2011 to End of Time Studios, LLC
 *
 * This file may not be redistributed in whole or significant part.
 *
 * http://www.forumrunner.com
 */

class ForumRunner_BbCode_Formatter_BbCode_Post extends XenForo_BbCode_Formatter_Base
{
    public function getTags () 
    {
	$tags = parent::getTags();

	$tags['img']['callback'] = array($this, 'handleImgTag');
	$tags['quote']['callback'] = array($this, 'handleQuoteTag');
	$tags['tex']['callback'] = array($this, 'handleTexTag');

	return $tags;
    }

    public function handleImgTag (array $tag, array $rendererStates) 
    {
	$url = $this->stringifyTree($tag['children']);
	$text = $this->filterString($url, $rendererStates);
	return '<a href="' . $text . '">' . $text . '</a>';
    }

    public function handleTexTag (array $tag, array $rendererStates)
    {
	$tex = $this->stringifyTree($tag['children']);

	// Set MATHTEX_URL in <forum_root>/forumrunner/support/utils.php
	if (MATHTEX_URL == '') {
	    return 'MATHTEX_URL not configured.';
	}

	$tex = urlencode($tex);

	$url = MATHTEX_URL . '?formdata=' . $tex;

	return '<img src="' . $url . '"/>';
    }

    public function handleQuoteTag (array $tag, array $rendererStates)
    {
	$keys = array_keys($tag['children']);
	$first = reset($keys);
	$last = end($keys);

	if (is_string($tag['children'][$first])) {
	    $tag['children'][$first] = ltrim($tag['children'][$first]);
	}
	if (is_string($tag['children'][$last])) {
	    $tag['children'][$last] = rtrim($tag['children'][$last]);
	}

	$name = false;
	if ($tag['option']) {
	    $separator_pos = strrpos($tag['option'], ',');
	    if ($separator_pos) {
		$s = explode(':', substr($tag['option'], $separator_pos + 1), 2);
		if (count($s) == 2) {
		    $s[0] = trim($s[0]);
		    $s[1] = intval(trim($s[1]));

		    if ($s[1] && preg_match('/^[a-z0-9-_]+$/i', $s[0])) {
			$name = substr($tag['option'], 0, $separator_pos);
		    }
		}
	    }

	    if ($name === false) {
		$name = $tag['option'];
	    }

	    $name = $this->filterString($name, $rendererStates);
	}

	$pre = '<div style="margin:0px; margin-top:0px;"><table cellpadding="5" cellspacing="0" border="0" width="100%"><tr><td class="alt2" style="border:1px solid #777777;">';
	if ($name) {
	    $pre .= '<div> ' . $name . ' said:</div>';
	}
	$post = '</td></tr></table></div><br/>';

	return $pre . $this->renderSubTree($tag['children'], $rendererStates) . $post;
    }
}
