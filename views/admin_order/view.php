<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінпанель</a></li>
                    <li><a href="/admin/order">Закази</a></li>
                    <li class="active">Перегляд заказу</li>
                </ol>
            </div>


            <h4>Перегляд заказу #<?php echo $order['id']; ?></h4>
            <br/>




            <h5>Інформація про заказ</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказу</td>
                    <td><?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Покупецб</td>
                    <td><?php echo $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон</td>
                    <td><?php echo $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>Коментар</td>
                    <td><?php echo $order['user_comment']; ?></td>
                </tr>
                <?php if ($order['user_id'] != 0): ?>
                    <tr>
                        <td>ID покупця</td>
                        <td><?php echo $order['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Статус заказу</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?php echo $order['date']; ?></td>
                </tr>
            </table>

            <h5>Товари в заказі</h5>

            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>ID товару</th>
                    <th>Код товару</th>
                    <th>Назва</th>
                    <th>Ціна</th>
                    <th>Колькістьо</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>


</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

