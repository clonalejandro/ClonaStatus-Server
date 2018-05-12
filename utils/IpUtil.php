<?php

namespace io\clonalejandro;

/**
 * Created by alejandrorioscalera
 * 12/05/2018
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

class IpUtil {


    /** SMALL CONSTRUCTORS **/

    private $ip;

    public function __construct($ip)
    {
        $this->ip = $ip->make();
    }


    /** REST **/

    /**
     * This function validates the ip
     * @return mixed
     */
    public function validate()
    {
        if ($this->isPrivate() || $this->isSpecial()) return null;
        else return $this->ip;
    }


    /** OTHERS **/

    /**
     * This function returns if the ip is private
     * @return boolean || @return null
     */
    private function isPrivate()
    {
        $subnet = substr($this->ip, 0, 3);
        $private = null;

        switch ($subnet){
            default:
                $private = false;
                break;
            case "10": case "172": case "192": case "169":
                $private = true;
                break;
        }

        return $private;
    }


    /**
     * This function returns if the ip is special
     * @return boolean || @return null
     */
    private function isSpecial()
    {
        $subnet = substr($this->ip, 0, 3);
        $special = null;

        switch ($subnet){
            default:
                $special = false;
                break;
            case "0": case "127":
                $special = true;
                break;
        }

        if (strpos($this->ip, "localhost") !== false)
            $special = true; //Check if contains

        return $special;
    }


}