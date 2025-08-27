<?php
include "../connection.php";

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = intval($_GET['status']);

    $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("ii", $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Booking status updated successfully!'); window.location.href='reservations.php';</script>";
    } else {
        echo "<script>alert('Error updating status: " . addslashes($stmt->error) . "'); window.history.back();</script>";
    }

    $stmt->close();
}
$conn->close();
?>
