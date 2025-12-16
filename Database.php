<?php

class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $user = "root", $password = "")
    {

        //dsn -> data source name
        //string that decrales connection to your database
        $dsn = "mysql:" . http_build_query($config, '', ';');

        //PDO -> PHP Data objects
        $this->connection = new PDO($dsn, $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }


    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function fetchOrAbort()
    {

        $result = $this->fetch();

        if (! $result) {
            abort();
        }

        return $result;
    }

    public function getAll()
    {
        return $this->statement->fetchAll();
    }
}
