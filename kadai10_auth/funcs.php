<?php
// XSS対応関数
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続関数
function db_conn(){
    try {
        $db_name = "kadai_db";    // データベース名
        $db_id   = "root";        // アカウント名
        $db_pw   = "";            // パスワード
        $db_host = "localhost";   // ホスト名
        return new PDO("mysql:dbname=$db_name;charset=utf8;host=$db_host", $db_id, $db_pw);
    } catch (PDOException $e) {
        exit("DB Connection Error: " . $e->getMessage());
    }
}

// SQLエラー関数
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError: " . $error[2]);
}

// リダイレクト関数
function redirect($file_name){
    header("Location: " . $file_name);
    exit();
}

// セッションチェック
function sessChk() {
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
        exit("LOGIN ERROR");
    } else {
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}
?>
