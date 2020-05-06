<?php
/**
* @package Responsive Content Slider
* @copyright 2016 ComponentGenerator.com
* @author 2016 ComponentGenerator(mail@componentgenerator.com)
* @license GNU General Public License version 2 or later
* @description Slide HTML conten or images with the Responsive Content Slider
*/

// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div id="responsive-content-slider-settings" data-auto="<?php echo $params->get('auto'); ?>"
     data-touchenabled="<?php echo $params->get('touch_enabled'); ?>"
     data-pause="<?php echo $params->get('pause_between_slides'); ?>"
     data-speed="<?php echo $params->get('speed'); ?>"
     data-captions="<?php echo $params->get('titles_as_captions'); ?>"
     data-randomstart="<?php echo $params->get('random_start'); ?>"
     data-controls="<?php echo $params->get('image_controls'); ?>"></div>
<ul id="responsive-content-slider">
    <?php foreach ($images as $image) : ?>
    <li>
        <?php if ($params->get('slide_type') == 'images') : ?>
            <?php if ($image['url']) : ?>
            <?php $targetAttribute = $image['external_url'] ? ' target="_blank"' : ''; ?>
            <a href="<?php echo $image['url']; ?>"<?php echo $targetAttribute; ?>>
            <?php endif; ?>
                <img src="<?php echo $image['path']; ?>"
                     alt="<?php echo $image['title']; ?>"
                     title="<?php echo $image['title']; ?>"
                     class="img-responsive">
            <?php if ($image['url']) : ?>
            </a>
            <?php endif; ?>
        <?php else: ?>
        <?php echo $image['content']; ?>
        <?php endif; ?>
    </li>
    <?php endforeach; ?>
</ul>
