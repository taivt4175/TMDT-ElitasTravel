<?php
    require('../connector/connect.php');
    $sql = "SELECT * FROM dichvu WHERE id_user LIKE 'KS%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="product">
                <div class="product-image">
                    <img src="../img/phongks.jpg" alt="" style="width: 200px; height: 200px;">
                </div>
                <div class="product-info">
                    <div class="company-name">Khách sạn:';
                            $sql1 = "SELECT * FROM user WHERE id_user = '".$row['id_user']."'";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    echo $row1['hoten'];
                                }
                            } else {
                                echo "0 results";
                            }
                echo '</div>';
                echo '<h2 class="product-name">'. $row['tendichvu'].'</h2>';
                echo '<div class="product-price">Giá:'.$row['gia'].'VNĐ/'.$row['donvitinh'].'</div>';
                echo '<div class="product-description">'.$row['motadichvu'].'</div>';
                echo '<div class="product-button">';
                echo '<a href="chitietdichvu.php?id='.$row['madichvu'].'"<button>Xem chi tiết</button></a>';
                echo '<a href=""><button>Thêm vào danh sách yêu cầu</button></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
        }
    } else {
        echo "0 results";
    }
?>