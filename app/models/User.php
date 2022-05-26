<?php

require_once(realpath(MODEL_PATH) . '/Model.php');

class User extends Model
{
    protected static string $tableName = 'users';
    protected static array $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin'
    ];
}