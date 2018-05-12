<?php

namespace io\clonalejandro;

include ("assets/json.php");

use Simple\json;

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

class Status {


    /** SMALL CONSTRUCTORS **/

    private $uri, $port, $jsonManager, $status, $online;

    public function __construct($uri, $port = 80)
    {
        $this->uri = $uri;
        $this->port = $port;
        $this->jsonManager = new json();
        $this->manageStatus();
    }


    /** REST **/

    /**
     * This function make and send the json request
     */
    public function send()
    {
        $this->jsonManager->domain = $this->uri;
        $this->jsonManager->port = $this->port;
        $this->jsonManager->online = $this->isOnline();
        $this->jsonManager->send();
    }


    /**
     * This function returns a web status
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }


    /** OTHERS **/

    /**
     * This function manage the status process
     */
    private function manageStatus()
    {
        $this->updateStatus();
        $this->checkStatus();
    }


    /**
     * This function check the web status
     */
    private function checkStatus()
    {
        $res = $this->parseBoolean(
            json_encode($this->getStatus()["timed_out"])
        );

        if ($this->getStatus() == null)
            $this->setOnline(false);
        else if ($res)
            $this->setOnline(false);
        else
            $this->setOnline(true);
    }


    /**
     * This function returns if web is online
     * @return boolean
     */
    private function isOnline()
    {
        return $this->online;
    }


    /**
     * This function update the status
     */
    private function updateStatus()
    {
        $this->setStatus(
            socket_get_status(pfsockopen($this->uri, $this->port))
        );
    }


    /**
     * This function sets the web status in the response
     * @param array $status
     */
    private function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * This function sets online the web page in the response
     * @param boolean $online
     */
    private function setOnline($online)
    {
        $this->online = $online;
    }


    /**
     * This function parse from String as Boolean
     * @param string $str
     * @return boolean
     */
    private function parseBoolean($str)
    {
        return $str == "true" ? true : false;
    }


}