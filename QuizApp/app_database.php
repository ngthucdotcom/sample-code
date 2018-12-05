<?php
// Lớp database
class DB
{
    // Các biến thông tin kết nối
    private $hostname = 'localhost',
            $username = 'root',
            $password = 'mysql',
            $dbname = 'sample';
    // Biến lưu trữ kết nối
    public $cn = NULL;
    // Hàm kết nối
    public function connect()
    {
        $this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }
    // Hàm ngắt kết nối
    public function close()
    {
        if ($this->cn)
        {
            mysqli_close($this->cn);
        }
    }
    // Hàm truy vấn
    public function query($sql = null)
    {
        if ($this->cn)
        {
            return mysqli_query($this->cn, $sql);
        }
    }

    // Hàm insert data
    public function insert_row($table,$data)
    {
        if ($this->cn)
        {
            $field = null;
            $field_value = null;
            foreach ($data as $key => $value) {
              // code...
              if($field == null) $field = $key;
              else $field = $field.','.$key;
            }

            foreach ($data as $key => $value) {
              // code...
              if($field_value == null) {
                if(is_numeric($value)) $field_value = $value;
                else $field_value = '"'.$value.'"';
              } else {
                if(is_numeric($value)) $field_value = $field_value.','.$value;
                else $field_value = $field_value.','.'"'.$value.'"';
              }
            }
            $insert = 'INSERT INTO '.$table.'('.$field.') VALUES ('.$field_value.')';
            return mysqli_query($this->cn, $insert);
        }
    }

    // Hàm insert data
    public function update_row($table,$data,$where,$at)
    {
        if ($this->cn)
        {
            $set = null;
            foreach ($data as $key => $value) {
              // code...
              if($set == null) {
                if(is_numeric($value)) $set = $key.'='.$value.'';
                else $set = $key.'="'.$value.'"';
              } else {
                if(is_numeric($value)) $set = $set.', '.$key.'='.$value.'';
                else $set = $set.', '.$key.'="'.$value.'"';
              }
            }
            $update = 'UPDATE '.$table.' SET '.$set.' WHERE '.$where.'='.$at;
            return mysqli_query($this->cn, $update);
        }
    }

    // Hàm đếm số hàng
    public function num_rows($sql = null)
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                $row = mysqli_num_rows($query);
                return $row;
            }
        }
    }
    // Hàm lấy dữ liệu
    public function fetch_assoc($sql = null, $type)
    {
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            if ($query)
            {
                if ($type == 0)
                {
                    // Lấy nhiều dữ liệu gán vào mảng
                    while ($row = mysqli_fetch_assoc($query))
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
                else if ($type == 1)
                {
                    // Lấy một hàng dữ liệu gán vào biến
                    $data = mysqli_fetch_assoc($query);
                    return $data;
                }
            }
        }
    }
    // Hàm lấy ID cao nhất
    public function insert_id()
    {
        if ($this->cn)
        {
            $count = mysqli_insert_id($this->cn);
            if ($count == '0')
            {
                $count = '1';
            }
            else
            {
                $count = $count;
            }
            return $count;
        }
    }
    // Hàm charset cho database
    public function set_char($uni)
    {
        if ($this->cn)
        {
            mysqli_set_charset($this->cn, $uni);
        }
    }
}
?>
