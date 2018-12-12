<?php
/**
 * Created by PhpStorm.
 * User: f16008040
 * Date: 10/12/2018
 * Time: 14:53
 */

class BD {

    private $pdo;
    private $stmt;

    /**
     * BD constructor.
     * @param $pdo
     */
    public function __construct()
    {
        $this->pdo = NULL;
        $this->stmt = NULL;

    }

    /**
     * @return null
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param null $pdo
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return null
     */
    public function getStmt()
    {
        return $this->stmt;
    }

    /**
     * @param null $stmt
     */
    public function setStmt($stmt)
    {
        $this->stmt = $stmt;
    }

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }


    function connect($host,$dbname,$username,$password){
        try {
            $dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'error';
        }
    }

    function prepare($query){
        $this->stmt = $this->pdo->prepare($query);
    }

    function query($queryParameters){
        try {
            $this->stmt->execute($queryParameters);
        } catch (PDOException $e) { ?>
            <strong>Caught <?= get_class($e) ?></strong>: <?= $e->getMessage() ?><br />
            Query <?= $this->stmt ?><br />
            Query parameters: <pre><?= var_export($queryParameters, true) ?></pre><br />
            Exception trace: <pre><?= $e->getTraceAsString() ?></pre>
            <?php
            die();
        }
    }

    function fetch(){
        //if ($this->stmt->rowCount() == 1){
        //    if ($result = $this->stmt->fetch()) {
        //        return $result;
        //    }
        //}
        if ($this->stmt->rowCount()) {
            // $stmt->setFetchMode(PDO::FETCH_OBJ);
            $array = array();
            return $this->stmt->fetchAll();
        } else {
            ?>
            Pas de résultats<br />
            <?php
        }
        return -1;
    }


}