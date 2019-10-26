<?php

namespace App\Controller;

use App\Entity\TestTable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/api/test", name="test")
     */
    public function index()
    {
        $dbconn = pg_connect("host=localhost dbname=admin_sibchudo user=admin_sibchudo password=TimGerVit98*")
        or die('Не удалось соединиться: ' . pg_last_error());

        $query = 'SELECT * FROM test_table';
        $result = pg_query($dbconn, $query) or die('Ошибка запроса: ' . pg_last_error());

        while ($line = pg_fetch_object($result)) {
            if($line instanceof TestTable){
                $line->printSelf();
            }
            else{
                echo "sorre";
            }
        }
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestController.php',
            'db' => $result
        ]);
    }
}
