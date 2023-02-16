<?php
session_start();
date_default_timezone_set("Asia/Taipei");

// $User = new DB('user');
$Th = new DB('th');
$Order = new DB('order');
$Member = new DB('member');
$Admin = new DB('admin');
$Bottom = new DB('bottom');
$News = new DB('news');

class DB
{
    protected $dsn = "mysql:host=localhost;charest=utf8;dbname=db04";
    protected $table;
    protected $pdo;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    protected function arrayToSqlArray($array)
    {
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        return $tmp;
    }

    public function all(...$args)
    {
        $sql = " SELECT * FROM `$this->table` ";
        if (isset($args[0])) {
            if (is_array($args[0])) {
                $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($args[0]));
            } else {
                $sql .= $args[0];
            }
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($find)
    {
        $sql = " SELECT * FROM `$this->table` WHERE ";

        if (is_array($find)) {
            $sql .= join(" && ", $this->arrayToSqlArray($find));
        } else {
            $sql .= " `id` = " . $find;
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function save($save)
    {
        if (isset($save['id'])) {
            $id = $save['id'];
            unset($save['id']);
            $sql = " UPDATE `$this->table` SET " . join(",", $this->arrayToSqlArray($save)) . " WHERE `id` = $id ";
        } else {
            $keys = [];
            $values = [];
            foreach ($save as $key => $value) {
                $keys[] = "`$key`";
                $values[] = "'$value'";
            }
            $sql = " INSERT INTO `$this->table`( " . join(",", $keys) . " ) VALUES ( " . join(",", $values) . " ) ";
        }
        return $this->pdo->exec($sql);
    }

    public function del($del)
    {
        $sql = " DELETE FROM `$this->table` WHERE ";
        if (is_array($del)) {
            $sql .= join(" && ", $this->arrayToSqlArray($del));
        } else {
            $sql .= $del;
        }
        return $this->pdo->exec($sql);
    }

    protected function math($math, $field, $condition)
    {
        $sql = " SELECT $math($field) FROM `$this->table` ";
        if ($condition !== 1) {
            if (is_array($condition)) {
                $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($condition));
            } else {
                $sql .= $condition;
            }
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    public function sum($field, $condition)
    {
        return $this->math('SUM', $field, $condition);
    }

    public function min($field, $condition)
    {
        return $this->math('MIN', $field, $condition);
    }

    public function max($field, $condition)
    {
        return $this->math('MAX', $field, $condition);
    }

    public function count($condition)
    {
        return $this->math('COUNT', '*', $condition);
    }
}

function prr($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function free($sql)
{
    $dsn = "mysql:host=localhost;charest=utf8;dbname=db04";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url)
{
    header("location:$url");
}
