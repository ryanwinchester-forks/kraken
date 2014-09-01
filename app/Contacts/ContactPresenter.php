<?php namespace Kraken\Contacts;

use Kraken\Core\Presenting\Presenter;

class ContactPresenter extends Presenter {

    public function name()
    {
        return $this->first_name .' '. $this->last_name;
    }

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

    /**
     * Get the address formatted for profile page.
     *
     * @return String  The html for an address.
     */
    public function address()
    {
        // Open tag
        $html = "<address>";

        // full name
        $html  .= "<strong>". $this->name() ."</strong><br>";

        // address1 and address2
        $html .= $this->address1 ?: "";
        $html .= ($this->address1 and !$this->address2) ? "<br>" : "";
        $html .= ($this->address2 and $this->address1) ? ", " : "";
        $html .= $this->address2 ? $this->address2 ."<br>" : "";

        // city, province, postal code
        $html .= $this->city ?: "";
        $html .= ($this->city and !$this->province) ? "<br>" : "";
        $html .= ($this->city and $this->province) ? ", " : "";
        $html .= $this->province ? $this->province ."<br>" : "";

        // country and postal code
        $html .= $this->country ?: "";
        $html .= ($this->country and !$this->postal_code) ? "<br>" : "";
        $html .= ($this->country and $this->postal_code) ? " " : "";
        $html .= $this->postal_code ? $this->postal_code ."<br>" : "";

        $html .= ($this->phone_home or $this->phone_business or $this->phone_mobile) ? "<br>" : "";

        // phone numbers
        $html .= $this->phone_home ? "<abbr title=\"Home Phone\">P:</abbr> ". $this->phone_home ."<br>" : "";
        $html .= $this->phone_business ? "<abbr title=\"Business Phone\">B:</abbr> ". $this->phone_business ."<br>" : "";
        $html .= $this->phone_mobile ? "<abbr title=\"Mobile Phone\">M:</abbr> ". $this->phone_mobile ."<br>" : "";

        // close tag
        $html .= "</address>";

        return $html;

    }

}