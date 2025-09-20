<?php
include 'mysql.php';

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>
                <form action='update.php' method='GET' style='display:inline;'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit' class='btn primary small'>Edit</button>
                </form>

                <form action='delete.php' method='POST' style='display:inline;' onsubmit=\"return confirm('Delete this contact?')\">
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit' class='btn danger small'>Delete</button>
                </form>
            </td>
        </tr>
        ";
    }
} else {
    echo "
    <tr class='empty'>
        <td colspan='5'>No contacts yet. Add a contact using the form above.</td>
    </tr>
    ";
}

$conn->close();
?>