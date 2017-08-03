<?php
include "util/AbstractModel.php";
include "controller/DbController.php";

/**
 * Class Tractor represent a model and responsible for searching in database via DbController.
 */
class Tractor extends AbstractModel
{
    /**
     * @var DbController object
     */
    private $db;

    /**
     * Default model attributes
     */
    private $id;
    private $brand;
    private $type;
    private $price;
    private $performance;
    private $description;

    /**
     * Tractor constructor initialize a new MySQL connection.
     */
    public function __construct()
    {
        $this->db = new DbController("mysql");
    }

    /**
     * Tractor destructor close the MySQL connection.
     */
    function __destruct()
    {
        unset($this->db);
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param int $performance
     */
    public function setPerformance($performance)
    {
        $this->performance = $performance;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getPerformance()
    {
        return $this->performance;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get back all stored record in Database.
     * @return array with Tractor objects
     */
    function getAll()
    {
        $tractors = [];

        $sql = "SELECT * FROM tractors";
        $result = $this->db->run_query($sql);
        while($row = $result->fetch()) {
            $tractor = new Tractor();
            $tractor->setId($row['id']);
            $tractor->setBrand($row['brand']);
            $tractor->setType($row['type']);
            $tractor->setPrice($row['price']);
            $tractor->setPerformance($row['performance']);
            $tractor->setDescription($row['description']);
            array_push($tractors, $tractor);
        }
        return $tractors;
    }

    /**
     * Get all record based on the given column and keyword.
     * @param string $column
     * @param string $keyword
     */
    function findBy($column, $keyword)
    {
        // TODO: Implementation
    }
}