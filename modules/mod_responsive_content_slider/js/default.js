jQuery(document).ready(function(){

	// Define the default settings
	var settings = {
		auto: true,
		touchEnabled: false,
		pause: 3000,
		speed: 1000,
		captions: false,
		randomStart: false,
		controls: true,
		pager: false
	};

	// Loop to override the default settings with attributes
	for (var key in settings)
	{
		var value = settings[key];

		// Load the settings data attributes
		var attributeValue = jQuery('#responsive-content-slider-settings').data(key.toLowerCase())

		// If the attribute value is defined
		if (typeof attributeValue !== 'undefined')
		{
			// Update the settings object
			settings[key] = attributeValue;
		}
	}

	jQuery('#responsive-content-slider').bxSlider(settings);
});
