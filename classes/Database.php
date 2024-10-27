<?php

class Database
{
    public static $conn;

    public static function connect()
    {
        self::$conn = mysqli_connect("localhost", "root", "", "vcare");
        if (!self::$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public static function getAll($tablename, $fildes = "*", $where = "", $limit = '')
    {

        $sql = "SELECT $fildes FROM `$tablename` $where $limit";
        $result = mysqli_query(self::$conn, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function count($tablename)
    {
        $sql = "SELECT COUNT(*) AS count FROM `$tablename` ";
        $result = mysqli_query(self::$conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public static function goinTable($tablenam_1, $fild_1, $tablenam_2, $fild_2, $additional_field = "*", $asname = "", $where = "")
    {
        $sql = "SELECT `$tablenam_1`.*, (`$tablenam_2`.`$additional_field`) $asname FROM `$tablenam_1` 
        INNER JOIN `$tablenam_2`
        ON
        `$tablenam_1`.$fild_1=`$tablenam_2`.$fild_2
        $where";
        $result = mysqli_query(self::$conn, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public static function checkId($tablename,$id )
    {
        $sql = "SELECT * FROM `$tablename` WHERE `id` = $id";
        $result = mysqli_query(self::$conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            return false;
        }
        return true;
    }

    public static function checkName($tablename,$fieldname ,$searchname , $check)
    {
        $sql = "SELECT `$fieldname` FROM `$tablename` WHERE `$searchname` = '$check' ";
        $result = mysqli_query(self::$conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            return false;
        }
        return true;
    }



    public static function isertInto($tablename, array $data)
    {
        $fildes = "`" . implode("`,`", array_keys($data)) . "`";
        $values = "'" . implode("','", array_values($data)) . "'";
        $sql = "INSERT INTO `$tablename` ($fildes) VALUES ($values)";
        $result = mysqli_query(self::$conn, $sql);
        return mysqli_insert_id(self::$conn);
    }

    public static function update($tablename, array $data, $id)
    {
        $updatecolumnsvaluesdata = "";
        foreach ($data as $columns => $values) {
            $updatecolumnsvaluesdata .= $columns . '=' . "'$values',";
        }

        $finalupdatedata = substr($updatecolumnsvaluesdata, 0, -1);

        $sql = "UPDATE `$tablename` SET $finalupdatedata WHERE id = $id ";
        $result = mysqli_query(self::$conn, $sql);
        return $result;
    }


    public static function checkLogin($tablename, $email, $password)
    {
        $email = mysqli_real_escape_string(self::$conn, $email);
        $sql = "SELECT * FROM `$tablename` WHERE `email`= '$email' AND `password`='$password'";
        $result = mysqli_query(self::$conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            return false;
        }
        return mysqli_fetch_assoc($result)["id"];
    }

    public static function checkType($tablename, $id)
    {
        $sql = "SELECT `type` FROM `$tablename` WHERE id =$id";
        $result = mysqli_query(self::$conn, $sql);
        $type = mysqli_fetch_assoc($result);
        
        if ($type["type"] ==="admin") {
            return false;
        }
        return true;
    }

    public static function deleteRow($tablename, $id)
    {
        $sql = "DELETE FROM `$tablename` WHERE id = $id";
        $result = mysqli_query(self::$conn, $sql);
        if ($result) {
            Session::set("success", "deleted successfully");
        }
    }
}
