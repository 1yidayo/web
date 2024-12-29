<?php
$link = mysqli_connect("localhost", "root", "12345678", "users");
$sql = "select * from reservation";
$result = mysqli_query($link, $sql);

// 從前端接收表單數據
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$semester_reservation = $_POST['semester-reservation'];
$start_date = $_POST['start'];
$start_time = $_POST['start-time'];
$end_date = $_POST['end'];
$end_time = $_POST['end-time'];

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>", $row['name'], "</td>
    <td>", $row['email'], "</td>
    <td>", $row['phone'], "</td>
    <td>", $row['semester-reservation'], "</td>
    <td>", $row['start'], "</td>
    <td>", $row['start-time'], "</td>
    <td>", $row['end'], "</td>
    <td>", $row['end-time'], "</td>
    </tr>";
}
?>
