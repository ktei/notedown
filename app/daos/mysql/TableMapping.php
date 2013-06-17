<?php

require_once (__DIR__ . '/Column.php');

class TableMapping {

    private $tableName;
    private $columns = array();

    public function __construct($tableName) {
        $this->tableName = $tableName;
    }

    public function buildInsertSQL() {
        $tbName = $this->tableName;
        $sql = "insert into $tbName ";
        $cols = array();
        $params = array();
        foreach ($this->columns as $c) {
            if ($c->hasAttribute(Column::ATTR_AUTO_INCREAMENT)) {
                continue;
            }
            $cols[] = $c->getName();
            $default = $c->getDefault();
            if ($c->isRequired() && $c->getType() == Column::DATA_TYPE_DATE && empty($default)) {
                $params[] = 'NOW()';
            } else {
                $params[] = ':' . $c->getName();
            }
        }

        if (!empty($cols)) {
            $sql = $sql . '(' . implode(",", $cols) . ') values (';
            $sql = $sql . implode(",", $params) . ')';
        }
        return $sql;
    }

    public function buildUpdateSQL($vals) {
        if (empty($vals)) {
            throw new Exception('No column to update.');
        }
        $pkCount = $this->getPrimaryKeyCount();
        if ($pkCount == 0) {
            throw new Exception('No primary keys are found. Update cannnot continue.');
        }

        $tbName = $this->tableName;
        $sql = "update $tbName set ";
        $pks = array();
        $params = array();
        foreach ($vals as $k => $v) {
            $col = $this->findColumn($k);
            if ($col === false) {
                throw new Exception("Column name does not exist:$k");
            }
            if ($col->hasAttribute(Column::ATTR_PRIMARY_KEY)) {
                $colName = $col->getName();
                $pks[] = "$colName=:$colName";
                continue;
            }
            if ($col->hasAttribute(Column::ATTR_AUTO_INCREAMENT)) {
                throw new Exception("You are trying to update an auto-increment column: $k, which is not allowed.");
            }
            $params[] = "$k=:$k";
        }

        $realCount = count($pks);
        if ($pkCount != count($realCount)) {
            throw new Exception("Primary key numbers don't match for table: $tbName. Update cannot continue." .
                    "Provided:$realCount, Needed:$pkCount");
        }

        $sql = $sql . implode(',', $params) . ' where ';
        $sql = $sql . implode(' and ', $pks);
        return $sql;
    }

    public function buildDeleteSQL($vals) {
        if (empty($vals)) {
            throw new Exception('No primary keys are provided. Delete cannot continue.');
        }

        $pkCount = $this->getPrimaryKeyCount();
        if ($pkCount == 0) {
            throw new Exception('No primary keys were configured. Delete cannnot continue.');
        }

        $tbName = $this->tableName;
        $sql = "delete from $tbName where ";
        $pks = array();
        foreach ($vals as $k => $v) {
            $col = $this->findColumn($k);
            if ($col === false) {
                throw new Exception("Column name does not exist:$k");
            }
            if ($col->hasAttribute(Column::ATTR_PRIMARY_KEY)) {
                $colName = $col->getName();
                $pks[] = "$colName=:$colName";
            } else {
                throw new Exception("Cannot delete based on non-primary column: $k.");
            }
        }
        $sql = $sql . implode(' and ', $pks);
        return $sql;
    }

    public function hasColumn($colName) {
        return array_key_exists($colName, $this->columns);
    }

    public function getColumns() {
        return $this->columns;
    }

    public function addColumn($name) {
        $col = new Column($name);
        $this->columns[$name] = $col;
        return $col;
    }

    public function addAutoIncPK($name) {
        $this->addColumn($name)->setType(Column::DATA_TYPE_INT)->addAttribute(Column::ATTR_PRIMARY_KEY)
                ->addAttribute(Column::ATTR_AUTO_INCREAMENT);
    }

    public function findColumn($name) {
        if (array_key_exists($name, $this->columns)) {
            return $this->columns[$name];
        }
        return false;
    }

    private function getPrimaryKeyCount() {
        $count = 0;
        foreach ($this->columns as $col) {
            if ($col->hasAttribute(Column::ATTR_PRIMARY_KEY)) {
                $count++;
            }
        }
        return $count;
    }

}

