<?php
class Upload
{
    const KB = 1024;
    const MB = 1048576;
    const GB = 1073741824;
    const TB = 1099511627776;

    protected $_file_info = [];

    protected function unitSign($unit){
        switch ($unit) {
            case self::KB:
                return "KB";
            break;
            case self::MB:
                return "MB";
            break;
            case self::GB:
                return "GB";
            break;
            case self::TB:
                return "TB";
            break;
        }
    }

    public function fileInfo($files)
    {
        if (is_array($files["name"]) || is_object($files["name"])) {
            // for multiple input
            $num_selected = count($files["name"]);
            for ($i = 0; $i < $num_selected; $i++) {
                array_push($this->_file_info, [
                    "name"       => $files['name'][$i],
                    "temp_name"  => $files['tmp_name'][$i],
                    "size"       => $files['size'][$i],
                    "doc_name"   => strtolower($files['name'][$i]),
                    "doc_ext"    => pathinfo(strtolower($files['name'][$i]), PATHINFO_EXTENSION),
                    // "input_name" => $_POST['file_name'][$i],
                     "store_name" => rand(100, 999) . time() . "." . pathinfo(strtolower($files['name'][$i]), PATHINFO_EXTENSION),
                ]);
            }
        } else {
            // for single input
            array_push($this->_file_info, [
                "name"       => $files['name'],
                "temp_name"  => $files['tmp_name'],
                "size"       => $files['size'],
                "doc_name"   => strtolower($files['name']),
                "doc_ext"    => pathinfo(strtolower($files['name']), PATHINFO_EXTENSION),
                // "input_name" => isset($_POST['file_name']) ? $_POST['file_name'] : "",
                 "store_name" => rand(100, 999) . time() . "." . pathinfo(strtolower($files['name']), PATHINFO_EXTENSION),
            ]);
        }

        return $this->_file_info;
    }

/**
 * Function for checking file
 * @param $files is $_FILES
 * @param array $valid_extension is array of valid extension
 * @param int $valid_size is integer value
 * @param $unit is a constant of Upload class (KB,MB,GB,TB)
 * @param boolean $required_name is required name for stored name
 * @return array
 *
 */

    public $valid_extension = [];
    public $valid_size      = 2;
    public $unit            = self::MB;

    public function checkFile($file, $required_name = false)
    {
        $file_err = [];
        $result   = [];
        $file_err = [];

        if ($this->valid_size * $this->unit < $file['size']) {
            $file_err["err_size"] = "File to large, alowed size is: " . $this->valid_size . $this->unitSign($this->unit);
        }
        if (!in_array($file['doc_ext'], $this->valid_extension)) {
            $file_err["err_ext"] = "Your file format not alowed, alow format is: " . implode(",", $this->valid_extension);
        }
        if (empty($file['input_name']) && $required_name) {
            $file_err["err_name"] = "File name is required.";
        }
        if (count($this->_file_info) == 1) {
            // $result = ["info" => $file, "errors" => $file_err];
            array_push($result, ["info" => $file, "errors" => $file_err]);
        } else {
            // $result = [];
            array_push($result, ["info" => $file, "errors" => $file_err]);
        }
        return $result;
    }

    /**
     * Function for checking file
     * @param $files is file data
     * @param string $destination path where to store file
     * @return mixed if success return string of stored file name or false 
     */

    public function uploads($file, $destination)
    {
        if(move_uploaded_file($file["temp_name"],$destination . "/" . $file["store_name"])){
            return $file["store_name"];
        }else{
            return false;
        };
    }

}