<?php

// Utils/PdoDatabaseHelper.php

class PdoHelper{

    private $_pdo = null;

    public function __construct() {
        $dbname = 'u697824263_eventIO';
        $host = 'sql480.main-hosting.eu';
        $dsn = "mysql:dbname=$dbname;host=$host";
        $username = 'u697824263_adminEventIO';
        $password = 'No;WaC3TW4@';
        $this->_pdo = new PDO($dsn, $username, $password);
    }

    public function GetPDO() {
        return $this->_pdo;
    }
}

?>