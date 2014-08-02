<?php

/*
 * This file is a part of the ChZ-PHP package.
 *
 * (c) François LASSERRE <choiz@me.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Engine;

class Db extends PDO {

    const FETCH_ASSOC = PDO::FETCH_ASSOC;
    const FETCH_NUM = PDO::FETCH_NUM;
    const FETCH_OBJ = PDO::FETCH_OBJ;
    const FETCH_BOTH = PDO::FETCH_BOTH;

    const PARAM_INT = PDO::PARAM_INT;
    const PARAM_STR = PDO::PARAM_STR;

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host='.DB_SERVER.';dbname'.DB_NAME, DB_USER, DB_PASS,
                    array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'.ENCODING.\'',
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    )
                );
            } catch (PDOException $e) {
                die('Database error.');
            }
        }

        return self::$instance;

    }

    public function query($query) {

        return self::$instance->query($query);

    }

}