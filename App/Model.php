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
     * @param $id // id of the table row
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
            echo 2;
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

    public function delete(): bool
    {

        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db();
        return $db->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else $this->insert();
    }

    public function fill(array $data)
    {
        foreach ($data as $key => $value) {
            if ($key == 'birthday') {
                $year = substr($value, -4) . '/';
                $monthAndDay = substr($value,0, 5);
                $this->$key = $year . $monthAndDay;
            } elseif ($key == 'photo') {
                $this->$key = $value;
            } else {
                $this->$key = $value;
            }
        }
    }

    public function getLastId()
    {
        $db = new Db();
        $sql = "SELECT MAX(id) FROM " . static::TABLE;
        $data = $db->query($sql);
        return $data;
    }

}