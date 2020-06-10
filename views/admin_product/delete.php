<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Адмінка</a></li>
                    <li><a href="/admin/product">Товари</a></li>
                    <li class="active">Видалення товару</li>
                </ol>
            </div>


            <h4>Видалити товар #<?php echo $id; ?></h4>


            <p>Ви дійсно хотите видалити цей товар?</p>

            <form method="post">
                <input type="submit" name="submit" value="Видалити" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

