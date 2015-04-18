<?php
class OpenFire_LiveSearch_ViewPublic_LiveResults extends XenForo_ViewPublic_Base {
	/* Function name says all, lets render our json */
	public function renderJson() {
		$output = $this->_renderer->getDefaultOutputArray ( get_class ( $this ), $this->_params, 'openfire_livesearch_results' );
		
		return XenForo_ViewRenderer_Json::jsonEncodeForOutput ( $output );
	}
}

?>