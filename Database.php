<?php

class Database
{


    public $connection;

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

        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}
