<?php
/**
* @package Responsive Content Slider
* @copyright 2016 ComponentGenerator.com
* @author 2016 ComponentGenerator(mail@componentgenerator.com)
* @license GNU General Public License version 2 or later
* @description Slide HTML conten or images with the Responsive Content Slider
*/

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the functions only once
JLoader::register('ModCgResponsiveSliderHelper', __DIR__ . '/helper.php');

$document = JFactory::getDocument();

$document->addStyleSheet("modules/mod_responsive_content_slider/css/default.css");
$document->addStyleSheet("modules/mod_responsive_content_slider/js/bxslider/jquery.bxslider.css");

$document->addScript("modules/mod_responsive_content_slider/js/bxslider/jquery.bxslider.min.js");
$document->addScript("modules/mod_responsive_content_slider/js/default.js");

$imagesToLoad = 20;
$images  = modCgResponsiveSliderHelper::getImages($params, $imagesToLoad);

if (!count($images))
{
    echo JText::_('MOD_RESPONSIVE_CONTENT_SLIDER_NO_SLIDES');
    return;
}

require(JModuleHelper::getLayoutPath('mod_responsive_content_slider'));
