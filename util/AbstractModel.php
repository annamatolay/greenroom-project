<?php

abstract class AbstractModel
{
    abstract function getAll();
    abstract function findBy($column, $keyword);
}