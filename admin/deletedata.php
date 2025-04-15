<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


include('../connect.php');

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/vm_dev/";
$request_uri = $_SERVER['REQUEST_URI'];
$explode_uri = explode('?', $request_uri);
parse_str($explode_uri[1], $params);

$mainid = isset($params['id']) ? $params['id'] : null;

if ($mainid !== null) {
    $mainid = mysqli_real_escape_string($conn, $mainid); 

    $tables = [
        'anchor_guard_system',
        'coaxial_layout',
        'dc_voltage_reading',
        'deficiency_schedule',
        'guyed_anchor_compounds',
        'maintenance_issues',
        'maintenance_issues_tower',
        'site_condition_checklist',
        'structural_issues',
        'structure_conditions_checklist',
        'tbl_anchor_last',
        'tension_plumb_and_twist',

    ];

    foreach ($tables as $table) {
        $deleteSql = "DELETE FROM `$table` WHERE inspection_id = '$mainid'";
        if ($conn->query($deleteSql) !== TRUE) {
            echo "Error deleting from $table: " . $conn->error . "<br>";
        }
    }

    $deleteMainSql = "DELETE FROM tower_inspection WHERE id = '$mainid'";
    if ($conn->query($deleteMainSql) === TRUE) {
        header("Location: form-data.php?success=Data+deleted+successfully");
        exit();
    } else {
        echo "Error deleting from tower_inspection: " . $conn->error;
    }

} else {
    echo "Inspection ID not provided.";
}

?>