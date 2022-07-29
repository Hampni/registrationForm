<?php

namespace App;

use App\Config;

class Db
{
    protected \PDO $dbh;

    public function __construct()
    {
        $config = new Config();
        return $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'], $config->data['db']['username'], $config->data['db']['password']);
    }

    /**
     * @param string $sql // request, command to database
     * @param $params // array of parameters for request
     * @param string|null $class // class of the returned objects from table
     * @return array // array of objects
     */
    public function query(string $sql, array $params = [], string $class = null): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $data = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return $data;
    }

    /**
     * @param $query // request to database
     * @param $params // array of parameters for request
     * @return bool // succesful or not execution of request
     */
    public function execute($query, $params = []): bool
    {
        $sth = $this->dbh->prepare($query);

        return $sth->execute($params);
    }

    /**
     * @return false|string // id of last row inserted into table
     */
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
