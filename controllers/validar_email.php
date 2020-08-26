<?php 
    $csv = array();
    // check there are no errors
    if($_FILES['csv']['error'] == 0){
        $name = $_FILES['csv']['name'];
        $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
        $type = $_FILES['csv']['type'];
        $tmpName = $_FILES['csv']['tmp_name'];

        // check the file is a csv
        if($ext === 'csv'){
            if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                set_time_limit(0);
                while ($line = fgetcsv($handle, 1000, ",")) {
                    $emails[] = [
                        'email' => $line[0]
                    ];
                }
                fclose($handle);    
            }
        }
    }
?>