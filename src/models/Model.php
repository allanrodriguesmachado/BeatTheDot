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
    public function loadFromArray($arr)
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
        return $this->values[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    /**
     * @param array $filters
     * @param string $columns
     * @return mixed|null
     */
    public static function getOne($filters = [], $columns = '*')
    {
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    /**
     * @param array $filters
     * @param string $columns
     * @return array
     */
    public static function get($filters = [], $columns = '*')
    {
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result){
            $class = get_called_class();
            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    /**
     * @param array $filters
     * @param string $columns
     * @return bool|mysqli_result|null
     */
    public static function getResultSetFromSelect($filters = [], $columns = '*')
    {
        $sql = "SELECT ${columns} FROM "
            . static::$tableName
            . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }

    /**
     * @param $filters
     * @return string
     */
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

    /**
     * @param $value
     * @return mixed|string
     */
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