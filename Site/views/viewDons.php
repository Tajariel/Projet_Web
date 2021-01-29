<?php

/**
 * Class viewDons
 *
 * Class extended from view
 * Used to display the Dons page
 *
 * @author Manuel FURTER-ALPHAND
 * (and a bit Gaëtan PUPET)
 */
class viewDons extends view
{
    /**
     * @function echoPaypal
     *
     * Echo the content of the Dons page, wich is just a link to a paypal service
     */
    public function echoPaypal()
    {
    echo '

            <!-- Start of the center_square div, used to contain everything-->
            <div id="center_square">
                <!-- That paypal plug-in -->
                <form action="https://www.paypal.com/donate" method="post" target="_top">
                    <input type="hidden" name="hosted_button_id" value="DV5LZ4AYQSC3G" />
                    <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1" />
                </form>
            </div>
            <!-- End of the center_square div-->';
    }
}