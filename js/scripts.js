
jQuery(document).ready(function() {
	

	jQuery(".kento-social-share").mouseenter(function()
		{
			
			for(i=0; i<=11;i++)
				{
					 jQuery(".kento-social-share .button-"+i).fadeIn(i*100);
				}

		})

	jQuery(".kento-social-share").mouseleave(function()
		{

			for(i=11; i>=0;i--)
				{
					 jQuery(".kento-social-share .button-"+i).fadeOut(i*100);

				}

		})	

				});	







