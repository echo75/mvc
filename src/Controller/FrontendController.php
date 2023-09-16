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
        $this->frontendEngine->show('index', $this->db->fetchAll("SELECT * FROM users"));
    }
    public function hallo()
    {
        $this->frontendEngine->show('hallo', $this->db->fetchSingle("SELECT token,first,last FROM users WHERE first like 'Gregor'"));
    }
    public function page($getVariables)
    {
        if (!empty($getVariables)) {
            // The value I want is the first part after 'page/'
            $userId = $getVariables[0];
            $sql = "SELECT * FROM users WHERE token LIKE :token";
            $params = [':token' => $userId];
            $this->frontendEngine->show('page', $this->db->fetchSingle($sql, $params));
        } else {
            // Handle the case where no value is provided in the URL
            echo "User ID is missing from the URL.";
        }
    }
    public function user()
    {
        $this->frontendEngine->show('user', $this->db->fetchAll("SELECT first,last FROM users"));
    }
    public function bootstrap()
    {
        $directory = dirname(__FILE__);
        $array = [
            'directory' => $directory
        ];
        //$this->frontendEngine->show('bootstrap', $this->db->fetchAll("SELECT * FROM users"));
        $this->frontendEngine->show('bootstrap', $array);
    }
}
