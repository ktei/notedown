<?php

require_once (__DIR__ . '/TableMapping.php');

abstract class DAO {

    private $insertSQL;
    private $tableMapping;
    private static $host;
    private static $dbName;
    private static $username;
    private static $password;
    private static $pdo;

    public function __construct($tableName) {
        $this->tableMapping = new TableMapping($tableName);
    }

    public static function setHost($host) {
        self::$host = $host;
    }

    public static function setDbName($dbName) {
        self::$dbName = $dbName;
    }

    public static function setUsername($username) {
        self::$username = $username;
    }

    public static function setPssword($password) {
        self::$password = $password;
    }

    public function insert($vals) {
        $sql = $this->getInsertSQL();
        $stmt = DAO::getPDO()->prepare($sql);
        foreach ($vals as $k => $v) {
            if (!$this->tableMapping->hasColumn($k)) {
                throw new Exception("Column name does not exist:$k");
            }
        }

        foreach ($this->tableMapping->getColumns() as $colName => $col) {
            if (array_key_exists($colName, $vals)) {
                $stmt->bindValue(":$colName", $vals[$colName], self::mapToPdoType($col->getType()));
            } else if ($col->hasAttribute(Column::ATTR_AUTO_INCREAMENT)) {
                // Skip auto-inc columns
                continue;
            } else if ($col->isRequired()) {
                $default = $col->getDefault();
                if (isset($default)) {
                    $stmt->bindValue(":$colName", $default, self::mapToPdoType($col->getType()));
                } else if ($col->getType() == Column::DATA_TYPE_STR) {
                    $stmt->bindValue(":$colName", '', PDO::PARAM_STR);
                } else if ($col->getType() == Column::DATA_TYPE_INT || $col->getType() == Column::DATA_TYPE_BOOL) {
                    $stmt->bindValue(":$colName", 0, PDO::PARAM_INT);
                } // DATA_TYPE_DATE has been dealt with in buildInsertSQL method
            } else {
                // This column value is not provided but it's not required.
                // So we can use null for its value
                $stmt->bindValue(":$colName", null, PDO::PARAM_NULL);
            }
        }
        $stmt->execute();
        return DAO::getPDO()->lastInsertId();
    }

    public function update($vals) {
        $sql = $this->tableMapping->buildUpdateSQL($vals);
        return $this->executeWithVals($sql, $vals);
    }

    public function delete($vals) {
        $sql = $this->tableMapping->buildDeleteSQL($vals);
        return $this->executeWithVals($sql, $vals);
    }

    public static function first($sql, $params = null) {
        if (!self::startsWith($sql, 'select')) {
            throw new Exception('This method only supports SELECT sql.');
        }
        $stmt = self::getParamStatement($sql, $params);
        $stmt->execute();
        $data = $stmt->fetch();
        if (!empty($data)) {
            foreach ($data as $key => $var) {
                if (is_numeric($key)) {
                    unset($data[$key]);
                }
            }
        }
        return $data;
    }

    public static function query($sql, $params = null) {
        if (!self::startsWith($sql, 'select')) {
            throw new Exception('This method only supports SELECT sql.');
        }
        $stmt = self::getParamStatement($sql, $params);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $results = array();
        foreach ($data as $row) {
            foreach ($row as $key => $var) {
                if (is_numeric($key)) {
                    unset($row[$key]);
                }
            }
            $results[] = $row;
        }
        return $results;
    }

    public static function scalar($sql, $params = null) {
        if (!self::startsWith($sql, 'select')) {
            throw new Exception('This method only supports SELECT sql.');
        }
        $stmt = self::getParamStatement($sql, $params);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public static function execute($sql, $params = null) {
        if (self::startsWith($sql, 'select')) {
            throw new Exception('This method does not support SELECT sql.');
        }
        $stmt = self::getParamStatement($sql, $params);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function getPDO() {
        if (!isset(self::$pdo)) {
            $host = self::$host;
            $dbname = self::$dbName;
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", self::$username, self::$password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

    protected function addIntPK($name) {
        return $this->addPK($name)->setType(Column::DATA_TYPE_INT);
    }

    protected function addRequiredInt($name) {
        return $this->addRequired($name)->setType(Column::DATA_TYPE_INT);
    }

    protected function addRequired($name) {
        return $this->addColumn($name)->addAttribute(Column::ATTR_REQUIRED);
    }
    
    protected function addRequiredDate($name) {
        return $this->addRequired($name)->setType(Column::DATA_TYPE_DATE);
    }

    protected function addAutoIncPK($name) {
        return $this->tableMapping->addAutoIncPK($name);
    }

    protected function addPK($name) {
        return $this->addColumn($name)->addAttribute(Column::ATTR_PRIMARY_KEY);
    }

    protected function addColumn($name) {
        return $this->tableMapping->addColumn($name);
    }

    private function executeWithVals($sql, $vals) {
        $stmt = DAO::getPDO()->prepare($sql);
        $cols = $this->tableMapping->getColumns();
        foreach ($vals as $k => $v) {
            $c = $cols[$k];
            $stmt->bindValue(":$k", $v, self::mapToPdoType($c->getType()));
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    private function getInsertSQL() {
        if (!isset($this->insertSQL)) {
            $this->insertSQL = $this->tableMapping->buildInsertSQL();
        }
        return $this->insertSQL;
    }

    private static function getParamStatement($sql, $params) {
        $stmt = DAO::getPDO()->prepare($sql);
        if (isset($params)) {
            foreach ($params as $k => $v) {
                if (is_numeric($v)) {
                    $stmt->bindValue($k, $v, PDO::PARAM_INT);
                } else {
                    $stmt->bindValue($k, $v);
                }
            }
        }
        return $stmt;
    }

    private static function mapToPdoType($colType) {
        if ($colType == Column::DATA_TYPE_INT) {
            return PDO::PARAM_INT;
        }
        return PDO::PARAM_STR;
    }

    private static function startsWith($haystack, $needle) {
        $target = strtolower($needle);
        return !strncmp(strtolower($haystack), $target, strlen($target));
    }

}

