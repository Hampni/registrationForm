<?php

namespace App;

abstract class Model
{
    protected const TABLE = '';
    public int $id;

    /**
     * @return array // returns array of objects from the table
     */
    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        $data = $db->query($sql, [], static::class);
        return $data;
    }

    /**
     * @param  $id // id of the table row
     * @return mixed|void // row of the table
     */
    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        if ($data == true) {
            return $data[0];
        } else {
            echo 'not found';
        }
    }

    /**
     * @param $email
     * @return mixed|string
     */
    public static function findByEmail($email)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE email=:email';
        $data = $db->query($sql, [':email' => $email], static::class);
        if ($data == true) {
            return $data[0];
        } else {
            return 'not found';
        }
    }

    /**
     * @return void
     */
    public function insert()
    {
        $props = [];
        $binds = [];
        $data = [];

        foreach (get_object_vars($this) as $prop => $value) {
            $props[] = $prop;
            $binds[] = ':' . $prop;
            $data[':' . $prop] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $props) . ') 
        VALUES (' . implode(', ', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->lastInsertId();
    }

    /**
     * @return void
     */
    public function update()
    {
        $props = [];
        $data = [];
        foreach (get_object_vars($this) as $prop => $value) {
            $props[] = $prop . ' = ' . ':' . $prop;
            $data[':' . $prop] = $value;
        }
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $props) . ' WHERE id = :id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    /**
     * @return void
     */
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * @param array $data
     * @return void
     */
    public function fill(array $data)
    {
        foreach ($data as $key => $value) {
            if ($key == 'birthday') {
                $year = substr($value, -4) . '-';
                $month = substr($value, 3, 2) . '-';
                $day = substr($value, 0, 2);
                $this->$key = $year . $month . $day;
            } elseif ($key == 'photo') {
                $this->$key = $value;
            } else {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return mixed
     */
    public static function countUsers()
    {
        $db = new Db();
        $sql = 'SELECT COUNT(*) as count FROM ' . static::TABLE;
        $data = $db->query($sql);
        return $data[0]->count;
    }


    public static function getPaginatedData($offset, $amountOfContent)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' LIMIT ' . $offset . ', ' . $amountOfContent;
        $data = $db->query($sql);
        return $data;
    }
}
