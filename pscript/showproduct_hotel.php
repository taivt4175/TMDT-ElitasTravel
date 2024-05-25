<?php
    require('../connector/connect.php');
    $sql = "SELECT * FROM dichvu WHERE id_user LIKE 'KS%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <div class="product">
                <div class="product-image">
                    <img src="../img/phongks.jpg" alt="" style="width: 200px; height: 200px;">
                </div>
                <div class="product-info">
                    <div class="company-name">Khách sạn:
                        <?php
                            $sql1 = "SELECT * FROM user WHERE id_user = '".$row['id_user']."'";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    echo $row1['hoten'];
                                }
                            } else {
                                echo "0 results";
                            }
                        ?>
                    </div>
                    <h2 class="product-name"><?php echo $row['tendichvu']; ?></h2>
                    <div class="product-price">Giá: <?php echo $row['gia']; ?> VNĐ/<?php echo $row['donvitinh']; ?></div>
                    <div class="product-description"><?php echo $row['motadichvu']; ?></div>
                    <div class="product-button">
                        <button>Xem chi tiết</button>
                        <button>Thêm vào danh sách yêu cầu</button>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        echo "0 results";
    }
?>