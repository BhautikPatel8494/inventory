<?php require_once 'includes/header.php';

$companyId = $_SESSION['company_id'];

$sql = "SELECT token FROM company_details WHERE id = $companyId";
$result = $connect->query($sql);
$value1 = $result->fetch_assoc();

echo $value1["token"];
?>

<?php require_once 'includes/footer.php'; ?>
