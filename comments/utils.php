<?php
    require("conn.php");

    function generateToken () {
        $s = '';
        for ($i = 0; $i <= 16; $i++) {
          $s .= chr(rand(65,90));
        }
        return $s;
    }

    function getUserFromToken($token) {
        global $conn;
        // 從 tokens 表取得 username
        $sql = sprintf(
            "select username from tokens where token = '%s'",
            $token
        );
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $username = $row['username'];

        $sql = sprintf(
            "select * from users where username = '%s'",
            $username
        );
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
?>