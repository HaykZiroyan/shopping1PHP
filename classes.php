<?php
    class DBase {
        public $user = 'root';
        public $password = 'root';
        public $host = '127.0.0.1';
        public $dbname = 'new-tasks';
        protected $dsn;
        public function getDb() {
            $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            return new PDO($this->dsn, $this->user, $this->password);
        }
        public function inserttDb($table, $column1,$column2, $column3, $value1, $value2, $value3) {
            $pdo = $this->getDb();
            return $pdo->query("INSERT INTO `$table` (`$column1`, `$column2`, `$column3`) VALUES('$value1', '$value2', '$value3')");
       }
    }