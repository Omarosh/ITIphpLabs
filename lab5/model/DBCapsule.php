<?php


use DbHandler;
use Illuminate\Database\Capsule\Manager as Capsule;

class MYSQLHandler implements DbHandler
{
    var $db;

    public function __construct()
    {
    }

    public function connect()
    {
        try {
            $capsule = new Capsule();
            $capsule->addConnection([
                "driver" => _driver_,
                "host" => _host_,
                "database" => _database_,
                "username" => _username_,
                "password" => _password_
            ]);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            if (Capsule::getDatabaseName() == null) {
                throw new \PDOException();
            }
            $items = Capsule::table('items')->select('product_name')->get();
            if (_DEBUG_MODE_) {
                Capsule::enableQueryLog();
            }
            return true;
        } catch (\PDOException $EX) {
            return false;
        }
    }

    public function get_data($fields = array(),  $start = 0)
    {
        //if empty array is given then select all cols 
        $fields = (count($fields) > 0) ? $fields : '*';
        if (count($fields) > 0)
            $fields[] = 'id';
        $fields[] = 'Photo';
        //query starting from an index and to the length of a pre define rows numer
        $items = Capsule::table('items')->skip($start)
            ->take(_Pager_size_)
            ->select($fields)
            ->get();
        return $items;
    }
    public function get_record_by_id($id,$primary_key)
    {
        $items = Capsule::table('items')->select('*')->find($primary_key);
        // var_dump($items);
        // echo "<pre>";
        // print_r(Capsule::getQueryLog());
        // echo "<pre>";
        return $items;
    }
    public function search($pname)
    {
        $found = Capsule::table('items')
            ->select('*')
            ->where('product_name', 'like', "%$pname%")
            ->orWhere('PRODUCT_code', 'like', "%$pname%")
            ->get();
        // var_dump($found);
        // echo "<pre>";
        // print_r(found);
        // echo "<pre>";
        return $found;
    }
    public function disconnect()
    {
        Capsule::disconnect();
        $this->capsule = null;
    }
}
