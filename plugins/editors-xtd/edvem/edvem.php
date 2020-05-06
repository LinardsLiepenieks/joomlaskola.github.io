<?php
/*
# -------------------------------------------------------------------------------------
# plg_edvem : Editor button plugin for the eXtro-media Embed Video Plugin
# -------------------------------------------------------------------------------------
# author    eXtro-media GbR
# copyright Copyright (C) 2015. All Rights Reserved
# license   GNU/GPL Version 3 or later - http://www.gnu.org/licenses/gpl-3.0.html
# website   www.eXtro-media.de
# technical support https://www.eXtro-media.de
# -------------------------------------------------------------------------------------
*/

defined('_JEXEC') or die;


class PlgButtonEdvem extends JPlugin
{

	protected $autoloadLanguage = true;


	public function onDisplay($name)
	{

		$css = '.icon-edvem-add:before { content:  "\56"; color: #93c64d; }';
		$js = "
		/*
		function jSelectEdvem()
		{
			var evt = document.iframe[0].document.getElementById('edvemtype').value;
			var tag = '{vembed =' + evt + '}'; 
			jInsertEditorText(tag, '" . $name . "');
			SqueezeBox.close();
		}
		*/
		function jSelectEdvemCancel()
		{
			SqueezeBox.close();
		}
		";

		$doc = JFactory::getDocument();
		$doc->addScriptDeclaration($js);
		$doc->addStyleDeclaration($css);

		JHtml::_('behavior.modal');
		
		$lang = JFactory::getLanguage();

		$app = JFactory::getApplication(); 
		$addslash = '';
		if($app->isSite()) { $addslash = '/'; }

		$link = $addslash.'../plugins/editors-xtd/edvem/dialog.php?ih_name='.$name.'&amp;' . JSession::getFormToken() . '=1&amp;lang=' . $lang->getTag();
    // 'index.php?option=com_emgallery&amp;view=emgallery&amp;layout=modal&amp;tmpl=component&amp;' . JSession::getFormToken() . '=1';

		$button = new JObject;
		$button->modal = true;
		$button->class = 'btn';
		$button->link = $link;
		$button->text = JText::_('PLG_EDVEM_ADDVEMTAG');
		$button->name = 'edvem-add';
		$button->options = "{handler: 'iframe', size: {x: 800, y: 500}}";
		
		return $button;
	}
}
