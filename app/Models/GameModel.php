<?php

namespace P5universFabuleux\Models;

use P5universFabuleux\Utils\Database;
use PDO;

class GameModel
{
    private $id;
    private $name;
    private $type;
    private $recommended_age;
    private $difficulty_level;

    /**
     * findAll.
     */
    public static function findAll()
    {
        $sql = '
            SELECT id, name, type, recommended_age, difficulty_level
            ORDER BY name 
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // Récupération des résultats sous forme de tableau d'objet
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // On retourne les résultats
        return $results;
    }

    /**
     * findPagination.
     */
    public static function findAllByPagination($page, $nbPostByPage)
    {
        $start = ($page - 1) * $nbPostByPage;
        $sql = '
            SELECT id, name, type, recommended_age, difficulty_level
            FROM game
            ORDER BY name DESC
            LIMIT '.$start.', '.$nbPostByPage.'
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // Récupération des résultats sous forme de tableau d'objet
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // On retourne les résultats
        return $results;
    }

    /**
     * find.
     *
     * @param mixed $id
     */
    public static function find($id)
    {
        $sql = '
            SELECT id, name, type, recommended_age, difficulty_level
            FROM game
            WHERE id = (:id)
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchObject(self::class);
    }

    /**
     * Get the value of id.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type.
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of recommended_age.
     */
    public function getRecommended_age()
    {
        return $this->recommended_age;
    }

    /**
     * Set the value of recommended_age.
     *
     * @return self
     */
    public function setRecommended_age($recommended_age)
    {
        $this->recommended_age = $recommended_age;

        return $this;
    }

    /**
     * Get the value of difficulty_level.
     */
    public function getDifficulty_level()
    {
        return $this->difficulty_level;
    }

    /**
     * Set the value of difficulty_level.
     *
     * @return self
     */
    public function setDifficulty_level($difficulty_level)
    {
        $this->difficulty_level = $difficulty_level;

        return $this;
    }
}
