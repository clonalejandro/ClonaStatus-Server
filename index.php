<?php

include "utils/Status.php"; include "utils/StringUtil.php"; include "utils/IpUtil.php";
use io\clonalejandro\Status; use io\clonalejandro\StringUtil; use io\clonalejandro\IpUtil;

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

/** @DataBuilder **/
$domain = new IpUtil(new StringUtil($_GET["domain"]));
$port = $_GET["port"];


/** @RequestBuilder **/
$req = new Status($domain->validate(), $port);


/** @RequestSender **/
$req->send();