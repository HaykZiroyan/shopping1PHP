<?php
    class DBase {
        protected $user = 'root';
        protected $password = 'root';
        protected $host = '127.0.0.1';
        protected $dbname = 'new-tasks';
        protected $dsn;
        public function getDb() {
            $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            return new PDO($this->dsn, $this->user, $this->password);
        }
        public function getTable($TableName) {
            $pdo = $this->getDb();
            return $pdo->query("SELECT * FROM `$TableName`");
        }
        
        public function inserttDb($table, $column1,$column2, $column3, $value1, $value2, $value3) {
            $pdo = $this->getDb();
            return $pdo->query("INSERT INTO `$table` (`$column1`, `$column2`, `$column3`) VALUES('$value1', '$value2', '$value3')");
       }
    }