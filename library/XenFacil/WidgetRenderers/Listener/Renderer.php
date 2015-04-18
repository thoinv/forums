<?php
class XenFacil_WidgetRenderers_Listener_Renderer
{

	public static function XF_renderer(array &$renderers)
	{
		$options = XenForo_Application::get('options');
		$render = '';
		for ($i = 1; $i <= 10; $i++)
		{
			$render = 'XF_WF_Render_' . $i;
			if (!empty($options->$render)){
				$renderers[] = $options->$render;
				$render = '';
			}
		}
		
/*		$renderers[] = 'WidgetFramework_WidgetRenderer_VisitorPanel';
		$renderers[] = 'WidgetFramework_WidgetRenderer_ForumListOnly_AddOn_TaigaChat';
		$renderers[] = 'WidgetFramework_WidgetRenderer_ForumListOnly_AddOn_GpDonations';
		$renderers[] = 'WidgetFramework_WidgetRenderer_AddOn_XfShout';
		$renderers[] = 'LNBlog_WidgetRenderer';
*/		
		return $renderers;
	}
}
?>