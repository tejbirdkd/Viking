<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'connect.php';
// echo "<pre>"; print_r($_POST);
// print_r($_FILES);
//  die;
$user_id = $_SESSION['user_id'] ?? null;

$inspection_date = $_POST['inspection_date'] ?? null;
$inspector_name = $_POST['inspector_name'] ?? null;
$inspection_company = $_POST['inspection_company'] ?? null;
$client_name = $_POST['client_name'] ?? null;
$tower_owner = $_POST['tower_owner'] ?? null;
$tower_location = $_POST['tower_location'] ?? null;
$tower_id_name = $_POST['tower_id_name'] ?? null;
$tower_type = $_POST['tower_type'] ?? null;
$tower_height = $_POST['tower_height'] ?? null;
$year_of_construction = $_POST['year_of_construction'] ?? null;
$structural_critical = $_POST['structural_critical'] ?? null;
$structural_non_critical = $_POST['structural_non_critical'] ?? null;
$maintenance_critical = $_POST['maintenance_critical'] ?? null;
$maintenance_non_critical = $_POST['maintenance_non_critical'] ?? null;

$checkSql = "SELECT id FROM tower_inspection WHERE user_id = '$user_id' AND form_type = 'draft' LIMIT 1";
$result = $conn->query($checkSql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $inspection_id = $row['id'];
} else {
    $insertSql = "INSERT INTO tower_inspection (inspection_date, user_id, form_type) VALUES ('$inspection_date', '$user_id', 'draft')";
    if ($conn->query($insertSql) === TRUE) {
        $inspection_id = $conn->insert_id;
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
        exit;
    }
}
$tower_photo = '';
if (!empty($_FILES['tower_photo']['name'])) {
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $tower_photo = $upload_dir . time() . "_" . basename($_FILES['tower_photo']['name']);
    move_uploaded_file($_FILES['tower_photo']['tmp_name'], $tower_photo);
}

$updateSql = "UPDATE tower_inspection SET 
    inspection_date = '$inspection_date',
    inspector_name = '$inspector_name',
    inspection_company = '$inspection_company',
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
    maintenance_non_critical = '$maintenance_non_critical'";

if ($tower_photo !== '') {
    $updateSql .= ", tower_photo = '$tower_photo'";
}

$updateSql .= " WHERE id = '$inspection_id'";

if ($conn->query($updateSql) === TRUE) {
    echo json_encode(['status' => 'success', 'inspection_id' => $inspection_id]);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}

///////////////////////////////
///////////////////////////////-- Maintenance issues (Critical) --
///////////////////////////////
///////////////////////////////
function handle_maintenance_issues($conn, $inspection_id, $priority_key, $priority_name)
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_POST[$priority_key . '_observation']) || !is_array($_POST[$priority_key . '_observation'])) {
        return;
    }

    $conn->autocommit(false); // Start transaction

    try {
        foreach ($_POST[$priority_key . '_observation'] as $key => $observation_raw) {
            $observation = trim($observation_raw);
            if (empty($observation)) continue;

            $recommendation = isset($_POST[$priority_key . '_recommendation'][$key]) ? trim($_POST[$priority_key . '_recommendation'][$key]) : '';
            $observation = $conn->real_escape_string($observation);
            $recommendation = $conn->real_escape_string($recommendation);

            $uploaded_images = [];

            // 🔍 Check for new uploaded images
            if (!empty($_FILES[$priority_key . '_image']['name'][$key]) && is_array($_FILES[$priority_key . '_image']['name'][$key])) {
                foreach ($_FILES[$priority_key . '_image']['name'][$key] as $i => $img_name) {
                    $tmp_name = $_FILES[$priority_key . '_image']['tmp_name'][$key][$i];
                    $error = $_FILES[$priority_key . '_image']['error'][$key][$i];

                    if ($error === UPLOAD_ERR_OK && is_uploaded_file($tmp_name)) {
                        $ext = pathinfo($img_name, PATHINFO_EXTENSION);
                        $new_name = uniqid('img_', true) . '.' . strtolower($ext);
                        $upload_dir = 'uploads/';
                        $target_path = $upload_dir . $new_name;

                        if (!file_exists($upload_dir)) {
                            mkdir($upload_dir, 0755, true);
                        }

                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $uploaded_images[] = $target_path;
                        }
                    }
                }
            }

            // 🔄 Preloaded image fallback if no new image uploaded
            if (empty($uploaded_images)) {
                $preloadedKey = $priority_key === 'maintenance_critical' ? 'preloaded_image_critical' : 'preloaded_image_non_critical';
                if (isset($_POST[$preloadedKey][$key])) {
                    $image_str = $conn->real_escape_string(trim($_POST[$preloadedKey][$key]));
                } else {
                    $image_str = '';
                }
            } else {
                $image_str = implode('|', $uploaded_images);
            }

                        // Updated SELECT query using position
                        $stmt = $conn->prepare("SELECT id FROM maintenance_issues WHERE inspection_id = ? AND priority = ? LIMIT 1");
                        $stmt->bind_param("is", $inspection_id, $priority_name);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $issue_id = $row['id'];
                        
                            // 🔁 Update existing
                            $stmt = $conn->prepare("UPDATE maintenance_issues SET observation = ?, recommendation = ?, uploaded_image = ? WHERE id = ?");
                            $stmt->bind_param("sssi", $observation, $recommendation, $image_str, $issue_id);
                            $stmt->execute();
                        } else {
                            // ➕ Insert new
                            $stmt = $conn->prepare("INSERT INTO maintenance_issues (inspection_id, priority, observation, recommendation, uploaded_image, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
                            $stmt->bind_param("issss", $inspection_id, $priority_name, $observation, $recommendation, $image_str);
                            $stmt->execute();
                        }
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

handle_maintenance_issues($conn, $inspection_id, 'maintenance_critical', 'Critical');
handle_maintenance_issues($conn, $inspection_id, 'maintenance_non_critical', 'Non-Critical');

//////////////////////////////////////--Maintaince Non Critical--////////////////////////////////////////



///////////////////////////////
///////////////////////////////
///////////////////////////////-- Structural issues (Critical) --
///////////////////////////////
///////////////////////////////
///////////////////////////////
function handle_structural_issues($conn, $inspection_id, $priority_key, $priority_name)
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_POST[$priority_key . '_observation']) || !is_array($_POST[$priority_key . '_observation'])) {
        return;
    }

    $conn->autocommit(false); // Start transaction

    try {
        foreach ($_POST[$priority_key . '_observation'] as $key => $observation_raw) {
            $observation = trim($observation_raw);
            if (empty($observation)) continue;

            $recommendation = isset($_POST[$priority_key . '_recommendation'][$key]) ? trim($_POST[$priority_key . '_recommendation'][$key]) : '';
            $observation = $conn->real_escape_string($observation);
            $recommendation = $conn->real_escape_string($recommendation);

            $uploaded_images = [];

            // Handle new uploaded images
            if (!empty($_FILES[$priority_key . '_image']['name'][$key]) && is_array($_FILES[$priority_key . '_image']['name'][$key])) {
                foreach ($_FILES[$priority_key . '_image']['name'][$key] as $i => $img_name) {
                    $tmp_name = $_FILES[$priority_key . '_image']['tmp_name'][$key][$i];
                    $error = $_FILES[$priority_key . '_image']['error'][$key][$i];

                    if ($error === UPLOAD_ERR_OK && is_uploaded_file($tmp_name)) {
                        $ext = pathinfo($img_name, PATHINFO_EXTENSION);
                        $new_name = uniqid('img_', true) . '.' . strtolower($ext);
                        $upload_dir = 'uploads/';
                        $target_path = $upload_dir . $new_name;

                        if (!file_exists($upload_dir)) {
                            mkdir($upload_dir, 0755, true);
                        }

                        if (move_uploaded_file($tmp_name, $target_path)) {
                            $uploaded_images[] = $target_path;
                        }
                    }
                }
            }

            // Handle existing images
            $existing_images = [];
            if (isset($_POST['existing_' . $priority_key . '_images'][$key])) {
                if (is_array($_POST['existing_' . $priority_key . '_images'][$key])) {
                    $existing_images = $_POST['existing_' . $priority_key . '_images'][$key];
                } else {
                    $existing_images = [$_POST['existing_' . $priority_key . '_images'][$key]];
                }
            }

            // Combine existing and new images
            $all_images = array_merge($existing_images, $uploaded_images);
            $image_str = !empty($all_images) ? implode('|', $all_images) : '';

            // Check if record exists
            $stmt = $conn->prepare("SELECT id FROM structural_issues WHERE inspection_id = ? AND priority = ? LIMIT 1");
            $stmt->bind_param("is", $inspection_id, $priority_name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                // Record exists, update it
                $stmt = $conn->prepare("UPDATE structural_issues SET observation = ?, recommendation = ?, uploaded_image = ?, updated_at = NOW() WHERE inspection_id = ? AND priority = ?");
                $stmt->bind_param("sssis", $observation, $recommendation, $image_str, $inspection_id, $priority_name);
                $stmt->execute();
            } else {
                // No record exists, insert new record
                $stmt = $conn->prepare("INSERT INTO structural_issues (inspection_id, priority, observation, recommendation, uploaded_image, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
                $stmt->bind_param("issss", $inspection_id, $priority_name, $observation, $recommendation, $image_str);
                $stmt->execute();
            }
        }

        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollback();
        error_log("Structural Issues Error: " . $e->getMessage());
        return false;
    }
}

// Usage for non-critical and critical issues
handle_structural_issues($conn, $inspection_id, 'structural_critical', 'critical');
handle_structural_issues($conn, $inspection_id, 'structural_non_critical', 'non-critical');

///////////////////////////////
///////////////////////////////
///////////////////////////////-- maintenance_issues_tower --
///////////////////////////////
///////////////////////////////
///////////////////////////////
function handle_maintenance_issues_tower($inspection_id, $conn) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $conn->autocommit(false);
    
    try {
        $checkSql = "SELECT id, photo FROM maintenance_issues_tower WHERE inspection_id = ? ORDER BY id";
        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param("i", $inspection_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $existing_records = [];
        while ($row = $result->fetch_assoc()) {
            $existing_records[] = $row;
        }

        if (!empty($_POST['category_description'])) {
            foreach ($_POST['category_description'] as $key => $category_raw) {
                $non_compliant_item_raw = $_POST['non_compliant_item'][$key] ?? '';
                
                $category = trim($conn->real_escape_string($category_raw));
                $non_compliant_item = trim($conn->real_escape_string($non_compliant_item_raw));
                
                if (empty($category) && empty($non_compliant_item)) {
                    continue;
                }

                $existing_images = [];
                if (isset($existing_records[$key])) {
                    $existing_images = !empty($existing_records[$key]['photo']) ? 
                        array_filter(explode(',', $existing_records[$key]['photo'])) : 
                        [];
                }

                $uploaded_images = [];
                if (!empty($_FILES['photo']['name'][$key][0])) {  
                    // Properly handle multiple file uploads for the current row
                    $fileCount = count($_FILES['photo']['name'][$key]);
                    
                    for ($i = 0; $i < $fileCount; $i++) {
                        if ($_FILES['photo']['error'][$key][$i] === UPLOAD_ERR_OK) {
                            $tmp_name = $_FILES['photo']['tmp_name'][$key][$i];
                            $original_name = $_FILES['photo']['name'][$key][$i];
                            $unique_name = time() . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\.\-_]/', '', basename($original_name));
                            $target_path = "uploads/" . $unique_name;

                            if (!file_exists('uploads')) {
                                mkdir('uploads', 0755, true);
                            }

                            if (move_uploaded_file($tmp_name, $target_path)) {
                                $uploaded_images[] = $target_path;
                            }
                        }
                    }
                }

                $all_images = array_unique(array_merge($existing_images, $uploaded_images));
                $image_paths = !empty($all_images) ? implode(',', $all_images) : null;

                if (isset($existing_records[$key])) {
                    // Update existing record
                    $updateSql = "UPDATE maintenance_issues_tower SET 
                                  category_description = ?,
                                  non_compliant_item = ?,
                                  photo = ?
                                  WHERE id = ?";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("sssi", $category, $non_compliant_item, $image_paths, $existing_records[$key]['id']);
                    $stmt->execute();
                } else {
                    $insertSql = "INSERT INTO maintenance_issues_tower
                                (inspection_id, category_description, non_compliant_item, photo)
                                VALUES
                                (?, ?, ?, ?)";
                    $stmt = $conn->prepare($insertSql);
                    $stmt->bind_param("isss", $inspection_id, $category, $non_compliant_item, $image_paths);
                    $stmt->execute();
                }
            }
        }
        
        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollback();
        error_log("Error in handle_maintenance_issues_tower: " . $e->getMessage());
        return false;
    }
}

// Call the function when form is submitted
if (!empty($_POST['category_description'])) {
    handle_maintenance_issues_tower($inspection_id, $conn);
    
}
///////////////////////////////
///////////////////////////////
///////////////////////////////-- Deficiency Schedule --
///////////////////////////////
///////////////////////////////
///////////////////////////////
function handle_deficiency_schedule($inspection_id, $conn) {
    // Start transaction
    $conn->autocommit(false);
    
    try {
        $uploadDir = "uploads/";
        
        // Create upload directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Get all existing records with their images
        $checkSql = "SELECT id, image FROM deficiency_schedule WHERE inspection_id = ? ORDER BY id";
        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param("i", $inspection_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $existing_records = [];
        while ($row = $result->fetch_assoc()) {
            $existing_records[] = $row;
        }

        if (!empty($_POST['deficiency'])) {
            foreach ($_POST['deficiency'] as $key => $deficiency_raw) {
                // Sanitize inputs
                $deficiency = trim($conn->real_escape_string($deficiency_raw));
                $elevation = trim($conn->real_escape_string($_POST['elevation'][$key] ?? ''));
                $location = trim($conn->real_escape_string($_POST['location'][$key] ?? ''));
                $notes = trim($conn->real_escape_string($_POST['notes'][$key] ?? ''));
                $category = trim($conn->real_escape_string($_POST['category'][$key] ?? ''));

                // Initialize image paths for this specific record
                $existingImages = [];
                
                // Get existing images for this specific record if it exists
                if (isset($existing_records[$key]) && !empty($existing_records[$key]['image'])) {
                    $existingImages = array_filter(explode('|', $existing_records[$key]['image']));
                }

                // Handle new uploads for this specific record only
                $newImages = [];
                        if (!empty($_FILES['image']['name'][$key]) && is_array($_FILES['image']['name'][$key])) {
                            foreach ($_FILES['image']['name'][$key] as $i => $name) {
                                $tmpName = $_FILES['image']['tmp_name'][$key][$i] ?? null;
                                $error = $_FILES['image']['error'][$key][$i] ?? null;
                                $type = $_FILES['image']['type'][$key][$i] ?? null;

                                // Skip if no file or error in upload
                                if (empty($name) || $error !== UPLOAD_ERR_OK || empty($tmpName)) {
                                    continue;
                                }

                                // Validate file type
                                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                                if (!in_array($type, $allowedTypes)) {
                                    continue;
                                }

                                $filename = time() . "_" . uniqid() . "_" . preg_replace('/[^a-zA-Z0-9\.\-_]/', '', basename($name));
                                $targetPath = $uploadDir . $filename;

                                if (move_uploaded_file($tmpName, $targetPath)) {
                                    $newImages[] = $targetPath;
                                }
                            }
                        }

                // Combine existing and new images, ensuring no duplicates
                $allImages = array_unique(array_merge($existingImages, $newImages));
                $finalImagePath = !empty($allImages) ? implode('|', $allImages) : null;

                // Update or insert record
                if (isset($existing_records[$key])) {
                    $updateSql = "UPDATE deficiency_schedule SET 
                                deficiency = ?,
                                elevation = ?,
                                location = ?,
                                notes = ?,
                                category = ?,
                                image = ?
                                WHERE id = ?";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("ssssssi", $deficiency, $elevation, $location, $notes, $category, $finalImagePath, $existing_records[$key]['id']);
                    $stmt->execute();
                } else {
                    $insertSql = "INSERT INTO deficiency_schedule 
                                (inspection_id, deficiency, elevation, location, notes, category, image) 
                                VALUES 
                                (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($insertSql);
                    $stmt->bind_param("issssss", $inspection_id, $deficiency, $elevation, $location, $notes, $category, $finalImagePath);
                    $stmt->execute();
                }
            }
        }
        
        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollback();
        error_log("Error in handle_deficiency_schedule: " . $e->getMessage());
        return false;
    }
}

handle_deficiency_schedule($inspection_id, $conn);


///////////////////////////////
///////////////////////////////
///////////////////////////////-- Handle Site Condition --
///////////////////////////////
///////////////////////////////
///////////////////////////////
function handle_site_conditions($inspection_id, $conn, $type, $itemKey, $conditionKey, $noteKey) {
    // Start transaction
    $conn->autocommit(false);
    
    try {
        // Get existing rows for this inspection_id and type
        $sql = "SELECT id, inspection_item FROM site_condition_checklist 
                WHERE inspection_id = ? AND notes = ? 
                ORDER BY id";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $inspection_id, $type);
        $stmt->execute();
        $result = $stmt->get_result();

        $existing_records = [];
        while ($row = $result->fetch_assoc()) {
            $existing_records[] = $row;
        }

        if (!empty($_POST[$itemKey])) {
            foreach ($_POST[$itemKey] as $key => $inspection_item_raw) {
                $item_condition_raw = $_POST[$conditionKey][$key] ?? '';
                $item_number_notes_raw = $_POST[$noteKey][$key] ?? '';

                // Trim and escape inputs
                $inspection_item = trim($conn->real_escape_string($inspection_item_raw));
                $item_condition = trim($conn->real_escape_string($item_condition_raw));
                $item_number_notes = trim($conn->real_escape_string($item_number_notes_raw));

                // Skip empty records
                if (empty($inspection_item) && empty($item_condition) && empty($item_number_notes)) {
                    continue;
                }

                // Try to find matching existing record by content
                $existing_id = null;
                foreach ($existing_records as $record) {
                    if ($record['inspection_item'] === $inspection_item) {
                        $existing_id = $record['id'];
                        break;
                    }
                }

                if ($existing_id) {
                    // Update existing row
                    $updateSql = "UPDATE site_condition_checklist SET 
                                inspection_item = ?,
                                item_condition = ?,
                                item_number_notes = ?
                                WHERE id = ?";
                    $stmt = $conn->prepare($updateSql);
                    $stmt->bind_param("sssi", $inspection_item, $item_condition, $item_number_notes, $existing_id);
                    $stmt->execute();
                } else {
                    // Insert new row
                    $insertSql = "INSERT INTO site_condition_checklist 
                                (inspection_id, inspection_item, item_condition, item_number_notes, notes) 
                                VALUES 
                                (?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($insertSql);
                    $stmt->bind_param("issss", $inspection_id, $inspection_item, $item_condition, $item_number_notes, $type);
                    $stmt->execute();
                }
            }
        }
        
        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollback();
        error_log("Error in handle_site_conditions: " . $e->getMessage());
        return false;
    }
}

// Usage with error handling
handle_site_conditions($inspection_id, $conn, 'site_conditions', 'inspection_item', 'item_condition', 'item_number_notes');
handle_site_conditions($inspection_id, $conn, 'guyed_anchor_compounds', 'inspection_item_guyed', 'item_condition_guyed', 'item_number_notes_guyed');
handle_site_conditions($inspection_id, $conn, 'structure_conditions', 'inspection_item_Structure', 'item_condition_Structure', 'item_number_notes_Structure');


///////////////////////////////
///////////////////////////////
///////////////////////////////-- Coxial Image --
///////////////////////////////
///////////////////////////////
///////////////////////////////

if (!empty($_FILES['coaxial_image']['name'])) {
    $conn->autocommit(FALSE); // Start transaction
    
    try {
        $uploaded_image = "uploads/" . time() . "_" . basename($_FILES['coaxial_image']['name']);
        
        if (move_uploaded_file($_FILES['coaxial_image']['tmp_name'], $uploaded_image)) {
            $check = $conn->prepare("SELECT id FROM coaxial_layout WHERE inspection_id = ?");
            $check->bind_param("i", $inspection_id);
            $check->execute();
            
            if ($check->get_result()->num_rows > 0) {
                $stmt = $conn->prepare("UPDATE coaxial_layout SET image = ? WHERE inspection_id = ?");
                $stmt->bind_param("si", $uploaded_image, $inspection_id);
            } else {
                $stmt = $conn->prepare("INSERT INTO coaxial_layout (inspection_id, image) VALUES (?, ?)");
                $stmt->bind_param("is", $inspection_id, $uploaded_image);
            }
            
            $stmt->execute();
            $conn->commit();
            
            echo "Success! Rows affected: " . $stmt->affected_rows;
            
            $verify = $conn->query("SELECT * FROM coaxial_layout WHERE inspection_id = $inspection_id");
            echo "<pre>"; print_r($verify->fetch_all(MYSQLI_ASSOC)); die;
        }
    } catch (Exception $e) {
        $conn->rollback();
        die("Error: " . $e->getMessage());
    }
}
///////////////////////////////
///////////////////////////////
///////////////////////////////-- Anchor Guard System --
///////////////////////////////
///////////////////////////////
///////////////////////////////

if (!empty($_POST['test_date'])) {
    // Start transaction
    $conn->autocommit(FALSE);
    
    try {
        // Prepare data with proper escaping
        $test_date = $conn->real_escape_string($_POST['test_date']);
        $test_performed = $conn->real_escape_string($_POST['test_performed']);
        $anodeCondition = $conn->real_escape_string($_POST['anodeCondition']);
        $coatingIntegrity = $conn->real_escape_string($_POST['coatingIntegrity']);
        
        // Check if record exists using prepared statement
        $checkStmt = $conn->prepare("SELECT id FROM anchor_guard_system WHERE inspection_id = ?");
        $checkStmt->bind_param("i", $inspection_id);
        $checkStmt->execute();
        $exists = $checkStmt->get_result()->num_rows > 0;
        
        if ($exists) {
            // Update existing record
            $updateStmt = $conn->prepare("UPDATE anchor_guard_system 
                SET test_date = ?, 
                    test_performed_by = ?, 
                    anode_condition = ?, 
                    protective_coating_integrity = ? 
                WHERE inspection_id = ?");
            $updateStmt->bind_param("ssssi", 
                $test_date, 
                $test_performed, 
                $anodeCondition, 
                $coatingIntegrity, 
                $inspection_id);
            
            if (!$updateStmt->execute()) {
                throw new Exception("Update failed: " . $updateStmt->error);
            }
            
            echo "Record updated successfully";
        } else {
            // Insert new record
            $insertStmt = $conn->prepare("INSERT INTO anchor_guard_system 
                (inspection_id, test_date, test_performed_by, anode_condition, protective_coating_integrity) 
                VALUES (?, ?, ?, ?, ?)");
            $insertStmt->bind_param("issss", 
                $inspection_id, 
                $test_date, 
                $test_performed, 
                $anodeCondition, 
                $coatingIntegrity);
            
            if (!$insertStmt->execute()) {
                throw new Exception("Insert failed: " . $insertStmt->error);
            }
            
            echo "New record inserted successfully";
        }
        
        // Commit transaction
        $conn->commit();
        
        // Verify the operation
        $verifyStmt = $conn->prepare("SELECT * FROM anchor_guard_system WHERE inspection_id = ?");
        $verifyStmt->bind_param("i", $inspection_id);
        $verifyStmt->execute();
        $result = $verifyStmt->get_result();
        
        echo "<pre>Database contents after operation:\n";
        print_r($result->fetch_all(MYSQLI_ASSOC));
        
    } catch (Exception $e) {
        $conn->rollback();
        die("Error: " . $e->getMessage());
    } finally {
        $conn->autocommit(TRUE);
    }
}

// dc_voltage_reading

///////////////////////////////
///////////////////////////////
///////////////////////////////-- dc_voltage_reading --
///////////////////////////////
///////////////////////////////

if (!empty($_POST['anchor_one'])) { 
    $anchor_one = mysqli_real_escape_string($conn, $_POST['anchor_one']);
    $anchor_two = mysqli_real_escape_string($conn, $_POST['anchor_two']);
    $anchor_three = mysqli_real_escape_string($conn, $_POST['anchor_three']);
    $anchor_four = mysqli_real_escape_string($conn, $_POST['anchor_four']);
    $anchor_five = mysqli_real_escape_string($conn, $_POST['anchor_five']);
    $anchor_six = mysqli_real_escape_string($conn, $_POST['anchor_six']);

    $measurementAnchor1 = mysqli_real_escape_string($conn, $_POST['measurementAnchor1']);
    $measurementAnchor2 = mysqli_real_escape_string($conn, $_POST['measurementAnchor2']);
    $measurementAnchor3 = mysqli_real_escape_string($conn, $_POST['measurementAnchor3']);
    $measurementAnchor4 = mysqli_real_escape_string($conn, $_POST['measurementAnchor4']);
    $measurementAnchor5 = mysqli_real_escape_string($conn, $_POST['measurementAnchor5']);
    $measurementAnchor6 = mysqli_real_escape_string($conn, $_POST['measurementAnchor6']);

    $observations = mysqli_real_escape_string($conn, $_POST['observations']);
    $systemPerformance = mysqli_real_escape_string($conn, $_POST['systemPerformance']);
    $degradationSigns = mysqli_real_escape_string($conn, $_POST['degradationSigns']);
    $conclusions = mysqli_real_escape_string($conn, $_POST['conclusions']);
    $summary = mysqli_real_escape_string($conn, $_POST['summary']);
    $correctiveActions = mysqli_real_escape_string($conn, $_POST['correctiveActions']);

    // Check if a record exists
    $checkSql = "SELECT id FROM dc_voltage_reading WHERE inspection_id = '$inspection_id'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult && $checkResult->num_rows > 0) {
        // Update existing
        $updateSql = "UPDATE dc_voltage_reading SET 
            anchor_one = '$anchor_one',
            anchor_two = '$anchor_two',
            anchor_three = '$anchor_three',
            anchor_four = '$anchor_four',
            anchor_five = '$anchor_five',
            anchor_six = '$anchor_six',
            measurementAnchor1 = '$measurementAnchor1',
            measurementAnchor2 = '$measurementAnchor2',
            measurementAnchor3 = '$measurementAnchor3',
            measurementAnchor4 = '$measurementAnchor4',
            measurementAnchor5 = '$measurementAnchor5',
            measurementAnchor6 = '$measurementAnchor6',
            observation = '$observations',
            notes_of_system_performance = '$systemPerformance',
            sign_of_degradation = '$degradationSigns',
            conclusions_and_recommendation = '$conclusions',
            summary_of_findings = '$summary',
            corrective_action_required = '$correctiveActions'
            WHERE inspection_id = '$inspection_id'";
        $conn->query($updateSql);
    } else {
        // Insert new
        $insertSql = "INSERT INTO dc_voltage_reading (
            inspection_id, 
            anchor_one, anchor_two, anchor_three, anchor_four, anchor_five, anchor_six, 
            measurementAnchor1, measurementAnchor2, measurementAnchor3, measurementAnchor4, measurementAnchor5, measurementAnchor6, 
            observation, notes_of_system_performance, sign_of_degradation, conclusions_and_recommendation, 
            summary_of_findings, corrective_action_required
        ) 
        VALUES (
            '$inspection_id', 
            '$anchor_one', '$anchor_two', '$anchor_three', '$anchor_four', '$anchor_five', '$anchor_six', 
            '$measurementAnchor1', '$measurementAnchor2', '$measurementAnchor3', '$measurementAnchor4', '$measurementAnchor5', '$measurementAnchor6', 
            '$observations', '$systemPerformance', '$degradationSigns', '$conclusions', 
            '$summary', '$correctiveActions'
        )";
        $conn->query($insertSql);
    }
}


///////////////////////////////
///////////////////////////////
///////////////////////////////-- Tension, Plumb and Twist Report --
///////////////////////////////
///////////////////////////////

if (!empty($_POST['site_name'])) { 
    $site_name = mysqli_real_escape_string($conn, $_POST['site_name']);
    $site_id = mysqli_real_escape_string($conn, $_POST['site_id']);
    $customer = mysqli_real_escape_string($conn, $_POST['customer']);
    $site_address = mysqli_real_escape_string($conn, $_POST['site_address']);
    $date_completed = mysqli_real_escape_string($conn, $_POST['date_completed']);
    $temperature = mysqli_real_escape_string($conn, $_POST['temperature']);
    $wind_speed = mysqli_real_escape_string($conn, $_POST['wind_speed']);
    $wind_direction = mysqli_real_escape_string($conn, $_POST['wind_direction']);
    $completed_by = mysqli_real_escape_string($conn, $_POST['completed_by']);

    // Check if record already exists for this inspection_id
    $checkSql = "SELECT id FROM tension_plumb_and_twist WHERE inspection_id = '$inspection_id'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult && $checkResult->num_rows > 0) {
        // Update existing record
        $updateSql = "UPDATE tension_plumb_and_twist SET 
            site_name = '$site_name',
            site_id = '$site_id',
            customer = '$customer',
            site_address = '$site_address',
            date_completed = '$date_completed',
            temperature = '$temperature',
            wind_speed = '$wind_speed',
            wind_direction = '$wind_direction',
            completed_by = '$completed_by'
            WHERE inspection_id = '$inspection_id'";
        $conn->query($updateSql);
    } else {
        // Insert new record
        $insertSql = "INSERT INTO tension_plumb_and_twist (
            inspection_id, site_name, site_id, customer, site_address, 
            date_completed, temperature, wind_speed, wind_direction, completed_by
        ) VALUES (
            '$inspection_id', '$site_name', '$site_id', '$customer', '$site_address', 
            '$date_completed', '$temperature', '$wind_speed', '$wind_direction', '$completed_by'
        )";
        $conn->query($insertSql);
    }
}

///////////////////////////////
///////////////////////////////
///////////////////////////////-- tbl last anchor --
///////////////////////////////
///////////////////////////////
function insertOrUpdateAnchorData($conn, $inspection_id, $postData, $note) {
    // Fetch existing rows for this inspection and note
    $checkSql = "SELECT id FROM tbl_anchor_last WHERE inspection_id = '$inspection_id' AND note = '$note'";
    $result = $conn->query($checkSql);

    $existing_ids = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $existing_ids[] = $row['id'];
        }
    }

    if (!empty($postData['guy_elev'])) {
        foreach ($postData['guy_elev'] as $key => $guy_elev_raw) {
            $anchor_distance = mysqli_real_escape_string($conn, $postData['anchor_distance'][$key] ?? '');
            $initial_tension = mysqli_real_escape_string($conn, $postData['initial_tension'][$key] ?? '');
            $desired_tension = mysqli_real_escape_string($conn, $postData['desired_tension'][$key] ?? '');
            $measured_tension = mysqli_real_escape_string($conn, $postData['measured_tension'][$key] ?? '');
            $guy_star = mysqli_real_escape_string($conn, $postData['guy_star'][$key] ?? '');
            $result_val = mysqli_real_escape_string($conn, $postData['result'][$key] ?? '');
            $guy_elev = mysqli_real_escape_string($conn, $guy_elev_raw);

            if (isset($existing_ids[$key])) {
                // Update existing row
                $update_id = $existing_ids[$key];
                $updateSql = "UPDATE tbl_anchor_last SET 
                    guy_elev = '$guy_elev',
                    anchor_distance = '$anchor_distance',
                    initial_tension = '$initial_tension',
                    desired_tension = '$desired_tension',
                    measured_tension = '$measured_tension',
                    guy_star = '$guy_star',
                    result = '$result_val'
                    WHERE id = $update_id";
                $conn->query($updateSql);
            } else {
                // Insert new row
                $insertSql = "INSERT INTO tbl_anchor_last (
                    inspection_id, guy_elev, wire_size, anchor_distance, initial_tension, 
                    desired_tension, measured_tension, guy_star, result, note
                ) VALUES (
                    '$inspection_id', '$guy_elev', 'EHS', '$anchor_distance', '$initial_tension', 
                    '$desired_tension', '$measured_tension', '$guy_star', '$result_val', '$note'
                )";
                $conn->query($insertSql);
            }
        }
    }
}


insertOrUpdateAnchorData($conn, $inspection_id, [
    'guy_elev' => $_POST['guy_elev'] ?? [],
    'anchor_distance' => $_POST['anchor_distance'] ?? [],
    'initial_tension' => $_POST['initial_tension'] ?? [],
    'desired_tension' => $_POST['desired_tension'] ?? [],
    'measured_tension' => $_POST['measured_tension'] ?? [],
    'guy_star' => $_POST['guy_star'] ?? [],
    'result' => $_POST['result'] ?? []
], 'anchor_A');

// Repeat for anchor_B and anchor_C
insertOrUpdateAnchorData($conn, $inspection_id, [
    'guy_elev' => $_POST['guy_elev_anchorb'] ?? [],
    'anchor_distance' => $_POST['anchor_distance_anchorb'] ?? [],
    'initial_tension' => $_POST['initial_tension_anchorb'] ?? [],
    'desired_tension' => $_POST['desired_tension_anchorb'] ?? [],
    'measured_tension' => $_POST['measured_tension_anchorb'] ?? [],
    'guy_star' => $_POST['guy_star_anchorb'] ?? [],
    'result' => $_POST['result_anchorb'] ?? []
], 'anchor_B');

insertOrUpdateAnchorData($conn, $inspection_id, [
    'guy_elev' => $_POST['guy_elev_anchorc'] ?? [],
    'anchor_distance' => $_POST['anchor_distance_anchorc'] ?? [],
    'initial_tension' => $_POST['initial_tension_anchorc'] ?? [],
    'desired_tension' => $_POST['desired_tension_anchorc'] ?? [],
    'measured_tension' => $_POST['measured_tension_anchorc'] ?? [],
    'guy_star' => $_POST['guy_star_anchorc'] ?? [],
    'result' => $_POST['result_anchorc'] ?? []
], 'anchor_C');


////////////////////////////////////////////////////////////////--The End--//////////////////////////////////////////////

if ($conn->query($updateSql) === TRUE) {
    echo json_encode(['status' => 'success', 'inspection_id' => $inspection_id]);
} else {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}
?>
