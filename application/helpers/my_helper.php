<?php
//buat set nilai inputan
function set_value($key = null, $default = null){
    global $_POST;
    if(isset($_POST[$key]))
        return $_POST[$key];

    //if(isset($_GET[$key]))
      //  return $_GET[$key];

    return $default;
}

//buat kode otomatis
function kode_otomatis($field, $table, $prefix, $length){
    $CI = & get_instance();
    $var = $CI->query("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if($var){
        return $prefix . substr( str_repeat('0', $length) . (substr($var, - $length) + 1), - $length );
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function get_periode_option($selected = ''){
    $CI =& get_instance();
    $rows = $CI->query("SELECT kode_periode, tanggal FROM periode ORDER BY kode_periode");
    foreach($rows as $row){
        if($row->kode_periode==$selected)
            $a.="<option value='$row->kode_periode' selected>$row->tanggal</option>";
        else
            $a.="<option value='$row->kode_periode'>$row->tanggal</option>";
    }
    return $a;
}
