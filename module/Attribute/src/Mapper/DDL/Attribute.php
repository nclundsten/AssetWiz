<?php

namespace Attribute\Mapper\DDL;

use Zend\Db\Sql\Ddl;
use Zend\Db\Sql\Ddl\Column;
use Zend\Db\Sql\Sql;

class Attribute
{
    public function create($adapter)
    {
        $table = new Ddl\CreateTable('attribute');
        $table->addColumn(new Column\Integer('id'));

        $sql = new Sql($adapter);
        $adapter->query(
            $sql->getSqlStringForSqlObject($ddl),
            $adapter::QUERY_MODE_EXECUTE
        );
    }

    public function remove($adapter)
    {
        die('todo remove table');
    }
}
