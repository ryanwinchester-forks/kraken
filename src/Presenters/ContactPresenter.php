<?php namespace Kraken\Presenters;

class ContactPresenter extends BasePresenter {

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @return String containing either just a URL or a complete image tag
     * @source http://gravatar.com/site/implement/images/php/
     */
    public function gravatar()
    {
        $size = 120;     // Size in pixels, defaults to 80px [ 1 - 2048 ]
        $d = 'mm';       // Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
        $r = 'g';        // Maximum rating (inclusive) [ g | pg | r | x ]
        $img = false;    // True to return a complete IMG tag False for just the URL
        $atts = array(); // Optional, additional key/value attributes to include in the IMG tag

        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $this->email ) ) );
        $url .= "?s={$size}&d={$d}&r=$r";

        if ( $img )
        {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }

        return $url;
    }

}