<?php

declare(strict_types=1);

namespace TestProjekt\Controller;

use TestProjekt\DB\DB;
use TestProjekt\Frontend\FrontendEngine;

include(__DIR__ . '/../Frontend/FrontendEngine.php');
include(__DIR__ . '/../DB/db.php');
class FrontendController
{

    /**
     * @var FrontendEngine
     */
    private $frontendEngine;
    /**
     * @var DB
     */
    private $db;


    public function __construct()
    {
        $this->frontendEngine = new FrontendEngine;
        $this->db = new DB;
    }
    public function index()
    {
        // $users = [
        //     [
        //         'first' => 'Johan',
        //         'last' => 'Hedman',
        //     ],
        //     [
        //         'first' => 'Gregor',
        //         'last' => 'Wiggert',
        //     ]
        // ];
        //$this->frontendEngine->show('index', $users);
        $this->frontendEngine->show('index', $this->db->fetchAll("SELECT first,last FROM users"));
    }
    public function hallo()
    {
        // $var = [
        //     'first' => 'Johan',
        //     'last' => 'Hedman',
        // ];
        // $this->frontendEngine->show('hallo', $var);
        $this->frontendEngine->show('hallo', $this->db->fetchSingle("SELECT first,last FROM users WHERE first like 'Gregor'"));
    }
    public function user()
    {
        // $users = [
        //     [
        //         'first' => 'Johan',
        //         'last' => 'Hedman',
        //     ],
        //     [
        //         'first' => 'Gregor',
        //         'last' => 'Wiggert',
        //     ]
        // ];

        //$this->frontendEngine->show('user', $users);
        $this->frontendEngine->show('user', $this->db->fetchAll("SELECT first,last FROM users"));
    }
}
