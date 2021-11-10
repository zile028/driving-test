<?php
class Upload
{
    public $files;
    public $valid_extension = [];
    public $valid_size      = 0;
    public $unit            = null;

    protected $_file_info = [];

    public function fileInfo()
    {
        if (is_array($this->files["name"]) || is_object($this->files["name"])) {
            // for multiple input
            $num_selected = count($this->files["name"]);
            for ($i = 0; $i < $num_selected; $i++) {
                array_push($this->_file_info, [
                    "name"       => $this->files['name'][$i],
                    "temp_name"  => $this->files['tmp_name'][$i],
                    "size"       => $this->files['size'][$i],
                    "doc_name"   => strtolower($this->files['name'][$i]),
                    "doc_ext"    => pathinfo(strtolower($this->files['name'][$i]), PATHINFO_EXTENSION),
                    // "input_name" => $_POST['file_name'][$i],
                     "store_name" => rand(100, 999) . time() . "." . pathinfo(strtolower($this->files['name'][$i]), PATHINFO_EXTENSION),
                ]);
            }
        } else {
            // for single input
            array_push($this->_file_info, [
                "name"       => $this->files['name'],
                "temp_name"  => $this->files['tmp_name'],
                "size"       => $this->files['size'],
                "doc_name"   => strtolower($this->files['name']),
                "doc_ext"    => pathinfo(strtolower($this->files['name']), PATHINFO_EXTENSION),
                // "input_name" => isset($_POST['file_name']) ? $_POST['file_name'] : "",
                 "store_name" => rand(100, 999) . time() . "." . pathinfo(strtolower($this->files['name']), PATHINFO_EXTENSION),
            ]);
        }

        return $this->_file_info;
    }

    public function checkFile($file_info, $valid_ext, $valid_size, $required_name = true)
    {
        $file_err = [];
        for ($i = 0; $i < count($file_info); $i++) {
            $file_err[$i] = [];

            if ($valid_size * MB < $file_info[$i]['size']) {
                $file_err[$i]["err_size"] = "File to large, " . $valid_size . "MB";
            }
            if (!in_array($file_info[$i]['doc_ext'], $valid_ext)) {
                $file_err[$i]["err_ext"] = "Your file format not alowed, alow format is: " . implode(",", $valid_ext);
            }
            if (empty($file_info[$i]['input_name']) && $required_name) {
                $file_err[$i]["err_name"] = "File name is required.";
            }
            if (count($file_info) == 1) {
                $result = ["info" => $file_info[$i], "errors" => $file_err[$i]];
            } else {
                $result = [];
                array_push($result, ["info" => $file_info[$i], "errors" => $file_err[$i]]);
            }

        }

        return $result;
    }
}