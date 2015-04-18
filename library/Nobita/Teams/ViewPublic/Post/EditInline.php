<?php

class Nobita_Teams_ViewPublic_Post_EditInline extends XenForo_ViewPublic_Base
{
	public function renderHtml()
	{
		$this->_params['messageEditor'] = XenForo_ViewPublic_Helper_Editor::getEditorTemplate(
			$this, 'message', $this->_params['post']['message'],
			array(
				'json' => array(
					'buttonConfig' => $this->_params['customEditor']
				),
				'editorId' => 'message' . $this->_params['post']['post_id'] . '_' . substr(md5(microtime(true)), -8)
			)
		);
	}

}