 <p align="right">
        <a href="/" style="font-weight: bold; font-size: large; color: palevioletred">
            На Главную
        </a>
    </p>

    <h2>Админ Панель</h2>
    <hr>

    <h3>Список статей</h3>

    <ul>
        <?php foreach ($news as $article): ?>
            <li>
                <a href="./?ctrl=AdminArticle&id=<?= $article->id; ?>">
                    <?= $article->title; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <hr>

    <p align="center">
        <a href="./?ctrl=Create">Добавить статью</a>
    </p>
    
    