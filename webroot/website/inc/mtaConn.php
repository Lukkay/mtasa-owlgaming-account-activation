<?php
    require_once('vendor/autoload.php');

    use MultiTheftAuto\Sdk\Mta;
    use MultiTheftAuto\Sdk\Model\Server;
    use MultiTheftAuto\Sdk\Model\Authentication;

    $server = new Server('TVÁ_IP_SERVERU', 22005);
    $auth = new Authentication('website', 'TVÉ_HESLO_ÚČTU_K_WEBU');
    $mta = new Mta($server, $auth);

?>