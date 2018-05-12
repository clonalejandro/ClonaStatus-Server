<?php

namespace io\clonalejandro;

/**
 * Created by alejandrorioscalera
 * 11/05/2018
 *
 * -- SOCIAL NETWORKS --
 *
 * GitHub: https://github.com/clonalejandro or @clonalejandro
 * Website: https://clonalejandro.me/
 * Twitter: https://twitter.com/clonalejandro11/ or @clonalejandro11
 * Keybase: https://keybase.io/clonalejandro/
 *
 * -- LICENSE --
 *
 * All rights reserved for clonalejandro ©statusapi 2017 / 2018
 */


class StringUtil {


    /** SMALL CONSTRUCTORS **/

    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }


    /** REST **/

    /**
     * This function sanitize the string
     * @return string
     */
    public function make()
    {
        $_str = str_replace("https://", "", $this->str);
        $_str = str_replace("http://", "", $_str);
        return $_str;
    }


}