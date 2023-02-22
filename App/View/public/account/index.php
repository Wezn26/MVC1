<p>Main Page</p>

<p align="right"><a href="./?ctrl=Admin">Админ Панель</a></p>
    <hr>
    <?php foreach ($news as $article): ?>
        <h2>
            <a href="./?ctrl=Article&id=<?= $article->id; ?>">
                <?= $article->title; ?>
            </a>
        </h2>

        <section>
            <?= $article->content; ?>
        </section>

        <p>Автор: <b><?= $article->author; ?></b></p>
    <?php endforeach; ?>
    