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

class Controller
{
    function __construct()
    {
    }

    protected function loadView($file)
    {
        require_once VIEWS_DIR.'/'.$file.'.php';
        return true;
    }

    protected function loadAjax($params = array())
    {
        header('Content-Type: application/json');
        echo json_encode($params, true);
        return true;
    }
}