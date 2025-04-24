<div class="status-order">
    <div class="container-status-order">
        <div class="status-success">
            <div class="img-status">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#a7c957" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                </svg>
                <h1>Order Success</h1>
            </div>
            <div class="info-order-status">
                <table class="table-info-order">
                    <tr>
                        <th>ID ORDER:</th>
                        <td><?= $order[0]['ID_Don_Hang'] ?></td>
                    </tr>
                    <tr>
                        <th>USERNAME:</th>
                        <td><?= $_SESSION['username']?></td>
                    </tr>
                    <tr>
                        <th>DATE CREATE:</th>
                        <td><?= $order[0]['Ngay_Dat']?></td>
                    </tr>
                    <tr>
                        <th>ADDRESS:</th>
                        <td><?= $order[0]['dia_chi_giao']?></td>
                    </tr>
                    <tr>
                        <th>TOTAL:</th>
                        <td><?= $order[0]['tong_tien']?> USD</td>
                    </tr>
                    
                </table>
            </div>
            <a class="continue-shopping-btn" href="/The-Ordinary/shop">Continue shopping</a>
        </div>
    </div>
</div>