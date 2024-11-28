
<div class="main py-5">
    <div class="container" id="filtration">
        <h4>Фильтрация поиска</h4>
        <form action="table.php" method="GET">
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
                    <option value="" selected="">Выберите бренд</option>
                        <option value="1" <?php echo (isset($_GET['filter_category']) && $_GET['filter_category'] == '1') ? 'selected' : ''; ?>>Компьютеры</option>
                        <option value="2" <?php echo (isset($_GET['filter_category']) && $_GET['filter_category'] == '2') ? 'selected' : ''; ?>>Ноутбуки</option>
                        <option value="3" <?php echo (isset($_GET['filter_category']) && $_GET['filter_category'] == '3') ? 'selected' : ''; ?>>Аксессуары</option>
                        <option value="4" <?php echo (isset($_GET['filter_category']) && $_GET['filter_category'] == '4') ? 'selected' : ''; ?>>SSD-накопители</option>
                        <option value="5" <?php echo (isset($_GET['filter_category']) && $_GET['filter_category'] == '5') ? 'selected' : ''; ?>>Видеокарты</option>
                        <option value="6" <?php echo (isset($_GET['filter_category']) && $_GET['filter_category'] == '6') ? 'selected' : ''; ?>>Процессоры</option>
                    </select>
            </div>

            <div class="mini_container" id="brand_container">
                <div class="row">
                    <h5>Производитель</h5>
                </div>

                <select name="filter_brand" id="filter_brand" class="form-control" >
                <option value="" selected="">Выберите производителя</option>
                    <option value="1" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '1') ? 'selected' : ''; ?>>Acer</option>
                    <option value="2" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '2') ? 'selected' : ''; ?>>ADATA</option>
                    <option value="3" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '3') ? 'selected' : ''; ?>>AMD</option>
                    <option value="4" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '4') ? 'selected' : ''; ?>>Defender</option>
                    <option value="5" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '5') ? 'selected' : ''; ?>>GIGABYTE</option>
                    <option value="6" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '6') ? 'selected' : ''; ?>>Intel</option>
                    <option value="7" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '7') ? 'selected' : ''; ?>>Lenovo</option>
                    <option value="8" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '8') ? 'selected' : ''; ?>>MSI</option>
                    <option value="9" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '9') ? 'selected' : ''; ?>>Xiaomi</option>
                    <option value="10" <?php echo (isset($_GET['filter_brand']) && $_GET['filter_brand'] == '10') ? 'selected' : ''; ?>>X-Computers</option>
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
                    <button type="button" class="btn btn-outline-primary" onclick="document.location = 'index.php'" name="clearButton" id="clearButton">Очистить фильтры</button>
                </div>
            </div>
        </form>
    </div>
    
   
</div>  

</body>
<script src="bootstrap-5.3.3/bootstrap.bundle.js"></script>

</html>