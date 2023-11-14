<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $comments = $_POST["comments"];

    // File uploads
    $idProofFileName = $_FILES["id_proof"]["name"];
    $photoFileName = $_FILES["photo"]["name"];

    // Move uploaded files to a desired folder (you may need to create this folder)
    move_uploaded_file($_FILES["id_proof"]["tmp_name"], "uploads/" . $idProofFileName);
    move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photoFileName);

    // Display collected data (you may want to store it in a database)
    echo "<h2>Admission Form Submission Successful</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Address: $address</p>";
    echo "<p>Email ID: $email</p>";
    echo "<p>Phone No.: $phone</p>";
    echo "<p>Additional Comments: $comments</p>";
    echo "<p>ID Proof: <a href='uploads/$idProofFileName' target='_blank'>$idProofFileName</a></p>";
    echo "<p>Photo: <a href='uploads/$photoFileName' target='_blank'>$photoFileName</a></p>";
} else {
    echo "<h2>Access Denied</h2>";
}
?>
