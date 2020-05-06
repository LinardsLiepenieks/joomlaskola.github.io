<?php

/*
# -------------------------------------------------------------------------
# plg_extrolb - eXtro Video embedding Plugin
# -------------------------------------------------------------------------
# author     eXtro-media.de
# copyright  Copyright (C) 2013 eXtro-media.de. All Rights Reserved.
# license - http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
# Websites:  http://www.eXtro-media.de
# Technical Support:  Forum - http://www.extro-media.de/en/forum.html
# -------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class plgSystemVembed extends JPlugin
{

	public function onAfterRender()
	{
		$app = JFactory::getApplication();
		if ($app->getName() == 'administrator' ) {
			return true;
		}      

    $body = JResponse::getBody();
    $pattern = '`{vembed(.*?)}`';
    $replacement = '';
    $script = '';
    $style = '';
    
    $lang = JFactory::getLanguage();
    $l1 = str_replace('-', '_', $lang->getTag());

    while(preg_match($pattern,$body) == 1) {
    $vid = ''; $pf = ''; $replacement = '<div class="embed-responsive embed-responsive-16by9">';
    preg_match($pattern, $body, $matches);
    $vid = substr($matches[0],10,-1);
    $pf = substr($matches[0],8,1);
    
    switch($pf) {
    	case 'Y' : // Youtube
    	  $replacement .= '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'V' : // Vimeo
    	  $replacement .= '<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'M' : // mp4
    	  $replacement .= '<video class="embed-responsive-item" controls><source src="'.$vid.'" type="video/mp4">'.JText::_('NO_MP4').'</video>';
    	break;
    	case 'D' : // Dailymotion
    	  $replacement .= '<iframe class="embed-responsive-item" src="//www.dailymotion.com/embed/video/'.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'o' : // Dotsub
    	  $replacement .= '<iframe class="embed-responsive-item" src="https://dotsub.com/media/'.$vid.'/embed/" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'f' : // Funnyordie
    	  $replacement .= '<iframe class="embed-responsive-item" src="http://www.funnyordie.com/embed/'.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'l' : // Liveleak
    	  $replacement .= '<iframe class="embed-responsive-item" src="http://www.liveleak.com/ll_embed?f='.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'm' : // Metacafe
    	  $replacement .= '<iframe class="embed-responsive-item" src="http://www.metacafe.com/embed/'.$vid.'/" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 's' : // Screenr
    	  $replacement .= '<iframe class="embed-responsive-item" src="https://www.screenr.com/embed/'.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 't' : // Stupidvideos
    	  $replacement .= '<iframe class="embed-responsive-item" src="http://www.stupidvideos.com/embed/?video='.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'a' : // Traileraddict
    	  $replacement .= '<iframe class="embed-responsive-item" src="//v.traileraddict.com/'.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
    	case 'y' : // Myvideo.de
    	  $replacement .= '<iframe class="embed-responsive-item" src="http://www.myvideo.de/embed/'.$vid.'" frameborder="0" allowfullscreen scrolling="no"></iframe>';
    	break;
      case 'F' : // Facebook Video
        $replacement .= '<script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/'.$l1.'/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));</script><div class="fb-video" data-allowfullscreen="1" data-href="https://www.facebook.com/video.php?v='.$vid.'"></div>';
      break;
    }

    $replacement .= '</div>';
    $body = str_replace($matches[0], $replacement, $body);

    }
    
    JResponse::setBody($body);

		return true;
	}

	public function onBeforeRender () { /*onContentPrepare($context, &$article, &$params, $limitstart){*/
	 static $included_extrotips_css;

		$app = JFactory::getApplication();
		if ($app->getName() == 'administrator' ) {
			return true;
		}
			
	 if (!$included_extrotips_css) {
		$document = JFactory::getDocument();
		$url='plugins/system/vembed/vembed.css';
		$document->addStyleSheet($url);
    $included_extrotips_css++;
	 }

   }

}
