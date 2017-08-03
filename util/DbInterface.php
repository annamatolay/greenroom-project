<?php
interface DbInterface
{
    function connect($sql);

    function run_query($query);
}