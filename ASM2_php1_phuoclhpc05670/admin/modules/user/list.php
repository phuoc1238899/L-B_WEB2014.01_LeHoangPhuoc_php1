<?php
include "../models/database.php";

// Xử lý khi có yêu cầu xóa người dùng
if (isset($_GET['action']) && $_GET['action'] == 'xoa') {
    if (isset($_GET['id'])) {
        // Lấy id cần xóa
        $id = $_GET['id'];
        // Câu truy vấn
        $query = "DELETE FROM users WHERE `id` = $id";
        // Thực hiện câu truy vấn
        if (mysqli_query($connection, $query)) {
            echo 'Xóa người dùng thành công';
        } else {
            echo "Có lỗi khi xóa người dùng";
        }
    }
}

// Lấy danh sách người dùng từ cơ sở dữ liệu
$query_select_users = "SELECT * FROM users";
$result_users = $connection->query($query_select_users);
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách người dùng</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result_users->num_rows > 0) {
                            while ($row = $result_users->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["phone"] . "</td>";
                                echo "<td>" . $row["address"] . "</td>";
                                echo "<td>
                                          <a href='/admin/?pages=user&action=edit&id=" . $row['id'] . "' class='btn btn-warning'>Sửa</a>
                                          <a href='/admin/?pages=user&action=xoa&id=" . $row['id'] . "' class='btn btn-danger'>Xóa</a>
                                      </td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
