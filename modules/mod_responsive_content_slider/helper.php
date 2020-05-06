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

class modCgResponsiveSliderHelper
{
	/**
	 * Method to get the images
	 * 
	 * @return	array	$data	An array with the images
	 */
    public static function getImages($params, $imagesToLoad)
    {
		$allParams = array(
			'path', 'title', 'url', 'external_url', 'content'
		);

		if ($params->get('slide_type') == 'images')
		{
			$requiredParams = array(
				'path'
			);
		}
		else
		{
			$requiredParams = array(
				'content'
			);
		}

		$images = array();
		for ($i = 1; $i <= $imagesToLoad; $i++)
		{
			// Get the image params
			$imageParams = self::imageParams($allParams, $requiredParams, $params, $i);

			// If some params were missing for the image
			if (!$imageParams)
			{
				// Then don't add the image
				continue;
			}

			$images[$i - 1] = $imageParams;
		}
		
		return $images;
    }

	/**
	 * Method to get the image params
	 *
	 * @param	array		$requiredParams		The keys of the required params for the image
	 * @params	JRegistry	$params				The params object from which the image params should be fetched
	 * @param	int			$imageNumber		The image number
	 *
	 * @return	array/bool						Returns an array with the image params on success, otherwise false
	 */
	private function imageParams($allParams, $requiredParams, $params, $imageNumber)
	{
		$imageParams = array();

		$requiredParamsDefined = true;
		foreach ($requiredParams as $requiredParam)
		{
			$imageParam = $params->get('slide_' . $requiredParam . '_' . $imageNumber);
			if (!$imageParam)
			{
				$requiredParamsDefined = false;
			}
		}

		// If all required params were defined
		if ($requiredParamsDefined)
		{
			// Load the params for the image
			foreach ($allParams as $param)
			{
				$imageParams[$param] = $params->get('slide_' . $param . '_' . $imageNumber);
			}

			return $imageParams;
		}

		return $requiredParamsDefined;
	}
}
