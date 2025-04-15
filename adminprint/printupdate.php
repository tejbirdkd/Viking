<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include('../connect.php');
// echo "<pre>"; print_r($_POST); die;

if (isset($_POST['tower_inspection_id'])) {
    $id = $_POST['tower_inspection_id'];

    $inspection_date = $_POST['inspection_date'];
    $inspector_name = $_POST['inspector_name'];
    $client_name = $_POST['client_name'];
    $tower_owner = $_POST['tower_owner'];
    $tower_location = $_POST['tower_location'];
    $tower_id_name = $_POST['tower_id_name'];
    $tower_type = $_POST['tower_type'];
    $tower_height = $_POST['tower_height'];
    $year_of_construction = $_POST['year_of_construction'];
    $structural_critical = $_POST['structural_critical'];
    $structural_non_critical = $_POST['structural_non_critical'];
    $maintenance_critical = $_POST['maintenance_critical'];
    $maintenance_non_critical = $_POST['maintenance_non_critical'];


    $sql = "UPDATE tower_inspection SET 
                inspection_date = '$inspection_date',
                inspector_name = '$inspector_name',
                client_name = '$client_name',
                tower_owner = '$tower_owner',
                tower_location = '$tower_location',
                tower_id_name = '$tower_id_name',
                tower_type = '$tower_type',
                tower_height = '$tower_height',
                year_of_construction = '$year_of_construction',
                structural_critical = '$structural_critical',
                structural_non_critical = '$structural_non_critical',
                maintenance_critical = '$maintenance_critical',
                maintenance_non_critical = '$maintenance_non_critical'
            WHERE id = '$id'";


    if (mysqli_query($conn, $sql)) {
        echo "<script>
            alert('Saved successfully');
            window.location.href = '../adminprint/print.php?id=" . base64_encode($id) . "';
        </script>";
    } else {
        echo "Error updating inspection: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // echo "No tower_inspection_id found.";
}


////////////////////////////////////Tower Inspection////////////////////////////////////////////


//////////////////////////////////--Maintaiance Issue--///////////////////////////////////////

if (isset($_POST['maintenance_ids'])) {
    $ids = $_POST['maintenance_ids'];
    $maintenance_inspection_id = $_POST['maintenance_inspection_id'];
    $observations = $_POST['observation'];
    $recommendations = $_POST['recommendation'];

    foreach ($ids as $index => $id) {
        $obs = mysqli_real_escape_string($conn, $observations[$index]);
        $rec = mysqli_real_escape_string($conn, $recommendations[$index]);

        $sql = "UPDATE maintenance_issues 
                SET observation = '$obs', recommendation = '$rec' 
                WHERE id = '$id'";

        mysqli_query($conn, $sql);
    }

    // echo "Maintenance issues updated successfully.";
            echo "<script>
            alert('Saved successfully');
            window.location.href = '../adminprint/print.php?id=" . base64_encode($maintenance_inspection_id) . "';
        </script>";
} else {
    // echo "No maintenance data found.";
}


//////////////////////////////////--structural Issue--///////////////////////////////////////

if (isset($_POST['structure_ids'])) {
    $ids = $_POST['structure_ids'];
    $structurerow_inspection_id = $_POST['structurerow_inspection_id'];
    $observations = $_POST['observation'];
    $recommendations = $_POST['recommendation'];

    foreach ($ids as $index => $id) {
        $obs = mysqli_real_escape_string($conn, $observations[$index]);
        $rec = mysqli_real_escape_string($conn, $recommendations[$index]);

        $sql = "UPDATE structural_issues 
                SET observation = '$obs', recommendation = '$rec' 
                WHERE id = '$id'";

        mysqli_query($conn, $sql);
    }

    // echo "structural_issues issues updated successfully.";
    echo "<script>
    alert('Saved successfully');
    window.location.href = '../adminprint/print.php?id=" . base64_encode($structurerow_inspection_id) . "';
</script>";
} else {
    // echo "structural_issues data found.";
}


///////////////////////////////////-Maintaince Issue--///////////////////////////

if (isset($_POST['category_ids'])) {

    foreach ($_POST['category_ids'] as $index => $id) {
    $maintenance_tower_inspection_id = $_POST['maintenance_tower_inspection_id'][$index]; 
        
        $category_description = $_POST['category_description'][$index];
        $non_compliant_item = $_POST['non_compliant_item'][$index];

        $category_description = mysqli_real_escape_string($conn, $category_description);
        $non_compliant_item = mysqli_real_escape_string($conn, $non_compliant_item);
        $id = (int)$id;

        $update = "UPDATE maintenance_issues_tower 
                   SET category_description = '$category_description', 
                       non_compliant_item = '$non_compliant_item' 
                   WHERE id = $id";

        mysqli_query($conn, $update);
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($maintenance_tower_inspection_id) . "';
        </script>";
    }

  
} else {
    // echo "No data to update.";
}


/////////////////////////--deficeny Schedule--//////////////////////////////////////

if (isset($_POST['deficiency_schedule_id'])) {
    $count = count($_POST['deficiency_schedule_id']);

    for ($i = 0; $i < $count; $i++) {
        $id         = $_POST['deficiency_schedule_id'][$i];
        $deficiency_schedule_inspection_id = $_POST['deficiency_schedule_inspection_id'][$i];
        $deficiency = $_POST['deficiency'][$i];
        $elevation  = $_POST['elevation'][$i];
        $location   = $_POST['location'][$i];
        $notes      = $_POST['notes'][$i];
        $category   = $_POST['category'][$i];

        $sql = "UPDATE deficiency_schedule SET 
                    deficiency = '" . mysqli_real_escape_string($conn, $deficiency) . "',
                    elevation = '" . mysqli_real_escape_string($conn, $elevation) . "',
                    location = '" . mysqli_real_escape_string($conn, $location) . "',
                    notes = '" . mysqli_real_escape_string($conn, $notes) . "',
                    category = '" . mysqli_real_escape_string($conn, $category) . "'
                WHERE id = " . (int)$id;

        mysqli_query($conn, $sql);
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($deficiency_schedule_inspection_id) . "';
        </script>";
    }

    // echo "Deficiency schedule updated successfully.";
} else {
    // echo "No deficiency_schedule_id found.";
}


///////////////////////////////////////--Site Condition--/////////////////////////////////

if (isset($_POST['id'])) {
    $count = count($_POST['id']);

    for ($i = 0; $i < $count; $i++) {
        $id = (int)$_POST['id'][$i];
        $site_condition_inspection_id = (int)$_POST['site_condition_inspection_id'][$i];
        $inspection_item = mysqli_real_escape_string($conn, $_POST['inspection_item'][$i]);
        $item_condition = mysqli_real_escape_string($conn, $_POST['item_condition'][$i]);
        $item_number_notes = mysqli_real_escape_string($conn, $_POST['item_number_notes'][$i]);

        $sql = "UPDATE site_condition_checklist SET 
                    inspection_item = '$inspection_item', 
                    item_condition = '$item_condition', 
                    item_number_notes = '$item_number_notes'
                WHERE id = $id";
        
        mysqli_query($conn, $sql);
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($site_condition_inspection_id) . "';
        </script>";
    }

    // echo "Site Condition Checklist updated successfully.";
} else {
    // echo "No data to update.";
}

/////////////////////////////////--Site Condition--///////////////////////////////

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ids = $_POST['id'];
    $site_condition_inspection_id = $_POST['site_condition_inspection_id'];
    $items = $_POST['inspection_item'];
    $conditions = $_POST['item_condition'];
    $notes = $_POST['item_number_notes'];

    foreach ($ids as $i => $id) {
        $item = mysqli_real_escape_string($conn, $items[$i]);
        $condition = mysqli_real_escape_string($conn, $conditions[$i]);
        $note = mysqli_real_escape_string($conn, $notes[$i]);

        $update_sql = "UPDATE site_condition_checklist 
                       SET inspection_item='$item', item_condition='$condition', item_number_notes='$note' 
                       WHERE id=$id";

        $conn->query($update_sql);
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($site_condition_inspection_id) . "';
        </script>";
    }

    // echo "Site Condition Checklist updated successfully.";
}



if (isset($_POST['update_structure_conditions'])) {
    $ids = $_POST['id'];
    $site_condition_inspection_id = $_POST['site_condition_inspection_id'];
    $items = $_POST['inspection_item'];
    $conditions = $_POST['item_condition'];
    $notes = $_POST['item_number_notes'];

    for ($i = 0; $i < count($ids); $i++) {
        $id = $conn->real_escape_string($ids[$i]);
        $condition = $conn->real_escape_string($conditions[$i]);
        $note = $conn->real_escape_string($notes[$i]);

        $update_sql = "UPDATE site_condition_checklist 
                       SET item_condition = '$condition', item_number_notes = '$note' 
                       WHERE id = '$id'";
        $conn->query($update_sql);
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($site_condition_inspection_id) . "';
        </script>";
    }

    // echo "Site Condition Checklist updated successfully.";
}


if (isset($_POST['update_anchor_guard'])) {
    $id = $conn->real_escape_string($_POST['record_id']);
    $record_inspection_id = $conn->real_escape_string($_POST['record_inspection_id']);
    $test_date = $conn->real_escape_string($_POST['test_date']);
    $test_performed_by = $conn->real_escape_string($_POST['test_performed_by']);
    $anode_condition = $conn->real_escape_string($_POST['anode_condition']);
    $protective_coating_integrity = $conn->real_escape_string($_POST['protective_coating_integrity']);

    $update_sql = "UPDATE anchor_guard_system 
                   SET test_date = '$test_date', 
                       test_performed_by = '$test_performed_by', 
                       anode_condition = '$anode_condition', 
                       protective_coating_integrity = '$protective_coating_integrity' 
                   WHERE id = '$id'";

    if ($conn->query($update_sql)) {
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($record_inspection_id) . "';
        </script>";
    } else {
        // echo "<script>alert('Failed to update.');</script>";
    }
}


if (isset($_POST['update_voltage_reading'])) {
    $id = $conn->real_escape_string($_POST['voltage_id']);
    $voltage_inspection_id = $conn->real_escape_string($_POST['voltage_inspection_id']);
    $anchor_one = $conn->real_escape_string($_POST['anchor_one']);
    $measurementAnchor1 = $conn->real_escape_string($_POST['measurementAnchor1']);
    $anchor_two = $conn->real_escape_string($_POST['anchor_two']);
    $measurementAnchor2 = $conn->real_escape_string($_POST['measurementAnchor2']);
    $anchor_three = $conn->real_escape_string($_POST['anchor_three']);
    $measurementAnchor3 = $conn->real_escape_string($_POST['measurementAnchor3']);
    $anchor_four = $conn->real_escape_string($_POST['anchor_four']);
    $measurementAnchor4 = $conn->real_escape_string($_POST['measurementAnchor4']);
    $anchor_five = $conn->real_escape_string($_POST['anchor_five']);
    $measurementAnchor5 = $conn->real_escape_string($_POST['measurementAnchor5']);
    $anchor_six = $conn->real_escape_string($_POST['anchor_six']);
    $measurementAnchor6 = $conn->real_escape_string($_POST['measurementAnchor6']);

    $observation = $conn->real_escape_string($_POST['observation']);
    $notes = $conn->real_escape_string($_POST['notes_of_system_performance']);
    $signs = $conn->real_escape_string($_POST['sign_of_degradation']);
    $conclusion = $conn->real_escape_string($_POST['conclusions_and_recommendation']);
    $summary = $conn->real_escape_string($_POST['summary_of_findings']);
    $corrective = $conn->real_escape_string($_POST['corrective_action_required']);

    $update_voltage_sql = "
        UPDATE dc_voltage_reading SET
            anchor_one = '$anchor_one',
            measurementAnchor1 = '$measurementAnchor1',
            anchor_two = '$anchor_two',
            measurementAnchor2 = '$measurementAnchor2',
            anchor_three = '$anchor_three',
            measurementAnchor3 = '$measurementAnchor3',
            anchor_four = '$anchor_four',
            measurementAnchor4 = '$measurementAnchor4',
            anchor_five = '$anchor_five',
            measurementAnchor5 = '$measurementAnchor5',
            anchor_six = '$anchor_six',
            measurementAnchor6 = '$measurementAnchor6',
            observation = '$observation',
            notes_of_system_performance = '$notes',
            sign_of_degradation = '$signs',
            conclusions_and_recommendation = '$conclusion',
            summary_of_findings = '$summary',
            corrective_action_required = '$corrective'
        WHERE id = '$id'
    ";

    if ($conn->query($update_voltage_sql)) {
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($voltage_inspection_id) . "';
        </script>";
    } else {
        // echo "<script>alert('Failed to update DC Voltage Reading');</script>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inspection_id = $_POST['inspection_id'];
    $tension_plumb_inspection_id = $_POST['tension_plumb_inspection_id'];
    $site_name = $_POST['site_name'];
    $site_id = $_POST['site_id'];
    $customer = $_POST['customer'];
    $site_address = $_POST['site_address'];
    $date_completed = $_POST['date_completed'];
    $temperature = $_POST['temperature'];
    $wind_speed = $_POST['wind_speed'];
    $wind_direction = $_POST['wind_direction'];
    $completed_by = $_POST['completed_by'];

    
        // Update
        $sql = "UPDATE tension_plumb_and_twist SET 
            site_name='$site_name',
            site_id='$site_id',
            customer='$customer',
            site_address='$site_address',
            date_completed='$date_completed',
            temperature='$temperature',
            wind_speed='$wind_speed',
            wind_direction='$wind_direction',
            completed_by='$completed_by'
            WHERE id='$inspection_id'";
  
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($tension_plumb_inspection_id) . "';
        </script>";
    } else {
        // echo "Error: " . mysqli_error($conn);
    }

  
}


//-----------------------------Anchor A-----------------------------------//

if (!empty($_POST['row_ids'])) {
    // echo "test"; die;
    foreach ($_POST['row_ids'] as $id) {

        $guy_elev = $conn->real_escape_string($_POST['guy_elev_' . $id]);
        $anchor_a_inspection_id = $conn->real_escape_string($_POST['anchor_a_inspection_id' . $id]);
        $wire_size = $conn->real_escape_string($_POST['wire_size_' . $id]);
        $anchor_distance = $conn->real_escape_string($_POST['anchor_distance_' . $id]);
        $initial_tension = $conn->real_escape_string($_POST['initial_tension_' . $id]);
        $desired_tension = $conn->real_escape_string($_POST['desired_tension_' . $id]);
        $measured_tension = $conn->real_escape_string($_POST['measured_tension_' . $id]);
        $guy_star = $conn->real_escape_string($_POST['guy_star_' . $id]);
        $result = $conn->real_escape_string($_POST['result_' . $id]);

        $update_sql = "
            UPDATE tbl_anchor_last SET
                guy_elev = '$guy_elev',
                wire_size = '$wire_size',
                anchor_distance = '$anchor_distance',
                initial_tension = '$initial_tension',
                desired_tension = '$desired_tension',
                measured_tension = '$measured_tension',
                guy_star = '$guy_star',
                result = '$result'
            WHERE id = '$id'
        ";

        if (!$conn->query($update_sql)) {
            echo "Error updating ID $id: " . $conn->error;
        }
    }

    echo "<script>
        alert('Saved successfully');
        window.location.href = '../adminprint/print.php?id=" . base64_encode($anchor_a_inspection_id) . "';
        </script>";
} else {
    echo "No data to update.";
}


mysqli_close($conn);
?>