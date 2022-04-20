<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    private $database;

    public function __construct()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=pdodb;port=3316;charset=UTF8', 'root', 'root');
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $this->database = $db;
    }

    // private function getDb()
    // {
    //     try {
    //         $db = new \PDO('mysql:host=localhost;dbname=pdodb;port=3316;charset=UTF8', 'root', 'root');
    //         $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    //         $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         echo "Erreur : " . $e->getMessage();
    //     }

    //     return $db;
    // }

    public function index()
    {
        
        $sql = "select * from emp";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        echo '<pre>';
        var_dump($results);
        echo '</pre>';
        // dd($results);
        return view('welcome');
    }

    public function show($n)
    {
        $d = $this->doSomething($n);
        
        $t = ['Philippe', 'Gilles', 'Julien'];
        return view('article')  ->with('value', $d)
                                ->with('prenoms', $t);
    }

    private function doSomething($b)
    {
        return $b;
    }
}
