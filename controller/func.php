<?php

/**
 * @return mixed|PDO
 */
function pdo()
{
    static $pdo;

    if (!$pdo) {
        $config = include 'config.php';
        $sql = 'mysql:dbname=' . $config['DATABASE'] . ';host=' . $config['DBSERVER'];
        $pdo = new PDO($sql, $config['DBUSER'], $config['DBPASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return $pdo;
}

/**
 * @param array $data
 */
function showErrorMessage($data)
{
    $err = '<ul>' . "\n";

    if (is_array($data)) {
        foreach ($data as $val)
            $err .= '<li style="color:red;">' . $val . '</li>' . "\n";
    } else
        $err .= '<li style="color:red;">' . $data . '</li>' . "\n";

    $err .= '</ul>' . "\n";

    return $err;
}