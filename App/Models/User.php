<?php

namespace App\Models;

class User
{

    private static $table = 'user';

    public static function get(int $cpf)
    {
        $connPDO = new \PDO(
            DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME,
            DBUSER,
            DBPASS
        );

        $sql = 'SELECT *
                    FROM ' . self::$table . '
                    WHERE cpf = :cpf';

        $stmt = $connPDO->prepare($sql);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }
    }

    public static function getAll()
    {
        $connPDO = new \PDO(
            DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME,
            DBUSER,
            DBPASS
        );

        $sql = 'SELECT *
                    FROM ' . self::$table;
        $stmt = $connPDO->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum usuário encontrado!");
        }
    }

    public static function insert($data)
    {
        $connPDO = new \PDO(
            DBDRIVE . ': host=' . DBHOST . '; dbname=' . DBNAME,
            DBUSER,
            DBPASS
        );

        $sql = 'INSERT INTO '. self::$table.
               ' VALUES (:cpf, :name, :birthdate)';
        $stmt = $connPDO->prepare($sql);
        $stmt->bindValue(':cpf', $data['cpf']);
        $stmt->bindValue(':name', $data['name']);
        $stmt->bindValue(':birthdate', $data['birthdate']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Usuário inserido com sucesso!';
        } else {
            throw new \Exception("Falha ao inserir usuário!");
        }
    }
}
