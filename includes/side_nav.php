<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
        <?php
        $db = Database::instance();
        $categories = $db->getAllCategories();
        foreach ($categories as $category) {
            $category_display = <<<CATEGORY
            
                  <a href="" class="list-group-item">$category->title</a>
CATEGORY;
            echo $category_display;
        }
        ?>
    </div>
</div>
