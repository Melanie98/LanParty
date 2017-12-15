<?php

include 'DBConf.php';

class Crud extends DBConf
{
    private $_table;
    private $_columns;
    private $_values;

    public function __construct()
    {
        $this->openConnection();
    }

    /////////////////////////////////////////////////////////////Methods
    /////////////////////////////////////////////////////////////Select
    public function selectFromTable($table, $columns, $where = null, $id = null, $row = null, $coupleTable = null, $orderBy, $columnSort)
    {
        $aantal = count($columns);
        $teller = 1;

        //Opbouw van een select query
        $query = "SELECT ";
        if ($columns != null)
        {
            foreach ($columns as $column)
            {
                $query .= $column;

                ////Het aantal ", "  toevoegen van wat er in een array zit
                if ($teller < $aantal)
                {
                    $query .= ", ";
                    $teller++;
                }
            }
        }

        else
        {
            $query .="*";
        }

        $query .= " FROM ";
        $query .= $table;

        if ($where != null)
        {
            $aantal = count($where);
            //$teller = 1;

            $query .= " WHERE ";

            for ($i = 0; $i < $aantal; $i += 2)
            {
                $query .= $where. " = ";
                $query .= $id;

                //$aantal - 2 wegens het anders toevoegen van een AND aan het einde
                if($aantal > 2 && $i != ($aantal - 2))
                {
                    $query .= " AND ";
                }
            }
        }

        if($row != null)
        {
            $aantal = count($row);
            $query .= " JOIN ";

            for ($i = 0; $i < $aantal; $i += 2)
            {
                $query .= $coupleTable . " ON ";
                $query .= $coupleTable . ".". $row[$i]. "=";
                $query .= $table . "." . $row[$i+1];
            }
        }

        $query .= " ORDER BY ". $columnSort . " " . $orderBy;

        $this->setQuery($this->getConn()->prepare($query));

        $this->getQuery()->execute();
        return $this->getQuery();
    }


    /////////////////////////////////////////////////////////////Insert
    public function insertIntoTable($table, $columns, $values)
    {
        $aantal1 = count($columns);
        $aantal2 = count($columns);
        $teller1 = 1;
        $teller2 = 1;
        //Opbouw van een select query
        $query = "INSERT INTO";
        $query .= " ".$table. " ";

        $query .= "(";

        foreach ($columns as $column)
        {

            $query .= $column;

            ////Het aantal ", "  toevoegen van wat er in een array zit
            if ($teller1 < $aantal1)
            {
                $query .= ", ";
                $teller1++;
            }
        }
        $query .= ")";
        $query .= " VALUES ";
        $query .= "(";

        foreach ($columns as $column)
        {
            $query .= ":";
            $query .= $column;
            ////Het aantal ", "  toevoegen van wat er in een array zit
            if ($teller2 < $aantal2)
            {
                $query .= ", ";
                $teller2++;

            }
        }
        $query .= ")";

        $this->setQuery($this->getConn()->prepare($query));

        //Aanmaken van de bindParam
        foreach (array_combine($columns, $values) as $column => &$value)
        {
            $this->getQuery()->bindParam(':'.$column, $value);
        }

        $this->getQuery()->execute();

        //return $query;
    }

    /////////////////////////////////////////////////////////////Update
    public function updateTable($table, $columns, $values2, $columnId, $id)
    {
        $aantalColumns = count($columns);
        $tellerColumns = 1;

        //Opbouw van een select query
        $query = "UPDATE ";
        $query .= $table;
        $query .= " SET ";

        foreach ($columns as $column)
        {

            $query .= $column . " = :" . $column;

            ////Het aantal ", "  toevoegen van wat er in een array zit
            if ($tellerColumns < $aantalColumns)
            {
                $query .= ", ";
                $tellerColumns++;

            }
        }

        $query .= " WHERE ";

        $query .= $columnId ." = ". $id;

        $query .= ";";

        $this->setQuery($this->getConn()->prepare($query));

        //Het combineren van 2 arrays de & staat er voor omdat hij EN value moet mee nemen
        foreach (array_combine($columns, $values2) as $column => &$value)
        {
            $this->getQuery()->bindParam(':'.$column, $value);
        }

        $this->getQuery()->execute();
        //return $query;
    }


    /////////////////////////////////////////////////////////////Delete
    public function deleteFromTable($table, $columnId, $id)
    {
        //Opbouw van een select query
        $query = "DELETE FROM";
        $query .= " ".$table;

        $query .= " WHERE ";
        $query .= $columnId;
        $query .= " = ";
        $query .= $id;

        $this->setQuery($this->getConn()->prepare($query));
        $this->getQuery()->execute();
        //return $query;
    }




    ////////////////////////////////////////////////////////////Getters en setters
    public function getTable()
    {
        return $this->_table;
    }

    public function setTable($table)
    {
        $this->_table = $table;
    }

    public function getColumns()
    {
        return $this->_columns;
    }

    public function setColumns($columns)
    {
        $this->_columns = $columns;
    }

    public function getValues()
    {
        return $this->_values;
    }

    public function setValues($values)
    {
        $this->_values = $values;
    }

}