<?php
// functions for database

session_start();
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

// posts with author for admin panel
function selectAllFromPostsWithUsers(string $table1, string $table2)
{
    global $pdo;

    $sql = "SELECT
    t1.id, t1.title, t1.picture, t1.content, t1.status, t1.id_topic, t1.created_date, t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// published posts with author for main page
function selectPublishFromPostsWithUsers(string $table1, string $table2, int $limit, int $offset)
{
    global $pdo;

    $sql = "SELECT p.*, u.username 
        FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status = 1
        LIMIT $limit OFFSET $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// published posts with author for main page
function selectTopFromPosts(string $table)
{
    global $pdo;

    $sql = "SELECT * FROM $table WHERE id_topic = 7";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// title and content search
function searchInTitleAndContent(string $term, string $table1, string $table2)
{
    global $pdo;

    $text = trim(strip_tags(stripcslashes(htmlspecialchars($term))));

    $sql = "SELECT p.*, u.username 
        FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id 
        WHERE p.status = 1
        AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// post with author for single page
function selectPostWithUser(string $table1, string $table2, int $id)
{
    global $pdo;

    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

// post with author for single page
function countRow(string $table)
{
    global $pdo;

    $sql = "SELECT COUNT(*) FROM $table AS p WHERE p.status = 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}
