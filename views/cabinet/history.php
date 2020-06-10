<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <h1>Ваші закази</h1>

            <div class="col-sm-8 col-sm-offset-2 padding-right">
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID заказа</th>
                        <th>Покупець</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Статус</th>
                    </tr>
                    <?php foreach ($ordersList as $order): ?>
                        <tr>
                            <td>
                                <a href="/admin/order/view/<?php echo $order['id']; ?>">
                                    <?php echo $order['id']; ?>
                                </a>
                            </td>
                            <td><?php echo $order['user_name']; ?></td>
                            <td><?php echo $order['user_phone']; ?></td>
                            <td><?php echo $order['date']; ?></td>
                            <td><?php echo Order::getStatusText($order['status']); ?></td>    
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
