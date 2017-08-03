<?php
include "util/DbInterface.php";

/**
 * Class DbController: Responsible for database connection and query executing.
 */
class DbController implements DbInterface
{
    private $connection;

    function __construct($sql) {
        self::connect($sql);
    }

    /**
     * Make a new PDO connection based on the config.ini file and the give sql type.
     * Otherwise catch the error and stop running the script.
     *
     * @param string $sql type
     */
    function connect($sql)
    {
        try {
            $config = parse_ini_file('./config.ini');
            // Define the PDO error mode to exception
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $this->connection =
                new PDO($sql.":host=".$config['host'].";dbname=".$config['dbname'],
                    $config['username'],
                    $config['password'],
                    $pdo_options);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    /**
     * Execute and sql query, if it possible.
     * Otherwise catch the error and stop running the script.
     *
     * @param string $query
     */
    public function run_query($query)
    {
        try {
            return $this->connection->query($query);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}