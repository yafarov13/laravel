<div class="news">
    <h3><?=$news['title']?></a></h3>
    <img src="<?=$news['image']?>">
    <br>
    <p>Статус: <em><?=$news['status']?></em></p>
    <p>Автор: <em><?=$news['author']?></em></p>
    <p><?=$news['description']?></p>
    <p>Категория новости: <?= $category['category'] ?></p>
</div>