<?php

if (isset($_SESSION['auth'])) {

    $categories = UserAction::readCategoryTable();
    $brands = UserAction::readBrandTable();
    ?>


<div class="main py-5">
    <div class="container" id="filtration">
    <div class="accordion" id="accordionExample">
    <div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <img class="icon2" src="../pic/icons/icon_funnel.svg">
            Фильтрация поиска
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <form action="filterPage.php" method="GET">
            <div class="mini_container" id="price_container">
                <div class="row">
                    <h5>Цена, ₽</h5>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">от</span>
                    <input type="text" class="form-control" name="filter_priceFrom" id="filter_priceFrom" value="<?php echo isset($_GET['filter_priceFrom']) && is_numeric($_GET['filter_priceFrom']) ? htmlspecialchars($_GET['filter_priceFrom']) : ''; ?>">
                    <span class="input-group-text">до</span>
                    <input type="text" class="form-control" name="filter_priceTo" id="filter_priceTo" value="<?php echo isset($_GET['filter_priceTo']) && is_numeric($_GET['filter_priceTo']) ? htmlspecialchars($_GET['filter_priceTo']) : ''; ?>">
                </div>
            </div>
            
            <div class="mini_container" id="category_container">
                <div class="row">
                    <h5>Категория</h5>
                </div>
                    <select name="filter_category" id="filter_category" class="form-control" value="<?php echo isset($_GET['filter_category']) ? htmlspecialchars($_GET['filter_category']) : ''; ?>">
                    <option value="" selected="">Выберите категорию товара</option>
                        <?php
                        foreach ($categories as $category) { ?>
                            <option value="<?=$category['id']?>" <?php echo (isset($_POST['category']) && $_POST['category'] == $category['id']) ? 'selected' : ''; ?>><?=$category['name']?></option>
                        <?php }?>
                    </select>
            </div>

            <div class="mini_container" id="brand_container">
                <div class="row">
                    <h5>Производитель</h5>
                </div>

                <select name="filter_brand" id="filter_brand" class="form-control" >
                <option value="" selected="">Выберите производителя</option>
                    <?php
                    foreach ($brands as $brand) { ?>
                        <option value="<?=$brand['id']?>" <?php echo (isset($_POST['brand']) && $_POST['brand'] == $brand['id']) ? 'selected' : ''; ?>><?=$brand['name']?></option>
                    <?php }?>
                </select>
            </div>

            <div class="mini_container" id="name_container">
                <div class="row">
                    <h5>Название</h5>
                </div>

                <input type="text" class="form-control" name="filter_name" id="filter_name" value="<?php echo isset($_GET['filter_name']) ? htmlspecialchars($_GET['filter_name']) : ''; ?>">
            </div>

            <div class="mini_container" id="name_container">
            <div class="input-group">
                <span class="input-group-text">Описание</span>
                <textarea type="text" class="form-control" name="filter_description" id="filter_description"><?php echo isset($_GET['filter_description']) ? htmlspecialchars($_GET['filter_description']) : ''; ?></textarea>
            </div>
            </div>
        
            <div class="row justify-content-center" id="button-container">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary" name="filterButton" id="filterButton">Применить фильтры</button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-outline-primary" onclick="document.location = 'filterTable.php'" name="clearButton" id="clearButton">Очистить фильтры</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
   
</div>  

<?php
}
else{
    header('Location: loginForm.php');
    exit();
}
?>