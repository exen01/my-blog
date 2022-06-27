<?php
// functions for database

require("connect.php");

// database query execution check
function dbCheckError($query)
{
    $errorInfo = $query->errorInfo();

    if ($errorInfo[0] !== PDO::ERR_NONE) {
        echo $errorInfo[2];
        exit();
    }

    return true;
}

// query to get data from table
function select(string $table, $params = [], bool $oneRow = false)
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql .= " WHERE $key = $value";
            } else {
                $sql .= " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();

    dbCheckError($query);

    if ($oneRow) {
        return $query->fetch();
    } else {
        return $query->fetchAll();
    }
}

// insert data in table
function insert(string $table, $params)
{
    global $pdo;
    $i = 0;
    $column = "";
    $mask = "";
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $column .= $key;
            $mask .= "'" . $value . "'";
        } else {
            $column .= ", $key";
            $mask .= ", '" . $value . "'";
        }

        $i++;
    }

    $sql = "INSERT INTO $table ($column) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $pdo->lastInsertId();
}

// update data in table by id
function update(string $table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = "";
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str .= $key . " = '" . $value . "'";
        } else {
            $str .= ", " . $key . " = '" . $value . "'";
        }

        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// delete data from table by id
function delete(string $table, $id)
{
    global $pdo;

    $sql = "DELETE FROM $table WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
