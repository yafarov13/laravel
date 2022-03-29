<div class="category">
    <h3>Категории новостей</h3>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li><a href="<?= route('category.showNews', ['category' => $category]) ?>"><?= $category ?></a></li><br>
        <?php endforeach; ?>
    </ul>
</div>