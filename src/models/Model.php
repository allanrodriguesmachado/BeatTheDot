<?php


class Model
{
    /**
     * @var string
     */
    protected static $tableName = '';
    /**
     * @var array
     */
    protected static $columns = [];
    /**
     * @var array
     */
    protected $values = [];

    /**
     * Model constructor.
     * @param $arr
     */
    function __construct($arr)
    {
        $this->loadFromArray($arr);
    }

    /**
     * @param $arr
     */
    public function  loadFromArray($arr)
    {
        if($arr){
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }
    }

    /**
     * @param $key
     * @return array
     */
    public function __get($key)
    {
        return $this->values;
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public static function getSelect($filters = [], $columns = '*')
    {
        $sql = "SELECT ${columns} FROM" . static::$tableName . static::getFilters($filters) ;
        return $sql;
    }

    private static function getFilters($filters)
    {
        $sql = '';
        if(count($filters) > 0){
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $column => $value) {
                $sql .=" AND ${column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    private static function getFormatedValue($value)
    {
        if(is_null($value)){
            return "null";
        }else if(gettype($value) === 'string'){
            return "'${value}'";
        }else{
            return $value;
        }
    }
}