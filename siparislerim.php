<?php include 'header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bigtitle">Ordering Information</div>
                            <p>You list your orders</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
        <div class="row">
            <div class="col-md-12">
                <div class="title-bg">
                    <div class="title">Ordering Information</div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered chart">
                        <thead>
                            <tr>
                                < <th>Order number</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Payment Type</th>
                                    <th>Status</th>
                                    <th></th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $kullanici_id = $kullanicicek['kullanici_id'];
                            $siparissor = $db->prepare("SELECT * FROM siparis where kullanici_id=:id");
                            $siparissor->execute(array(
                                'id' => $kullanici_id
                            ));

                            while ($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>

                                    <td><?php echo $sipariscek['siparis_id']; ?></td>
                                    <td><?php echo $sipariscek['siparis_zaman']; ?></td>
                                    <td><?php echo $sipariscek['siparis_toplam']; ?></td>
                                    <td><?php echo $sipariscek['siparis_tip']; ?></td>
                                    <td>durum</td>

                                    <td><a href=""><button class="btn btn-primary btn-xs">Detay</button></a></td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>











            </div>

        </div>
</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>