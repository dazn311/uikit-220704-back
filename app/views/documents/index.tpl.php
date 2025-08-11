<?php

    require VIEWS . '/incs/header.php';
?>

<main class="main py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($documents as $document) : ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h1><?= h($document['fileName']) ?></h1>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="name">
                                    Buyer:
                                    <img src="<?= h($document['avatar']) ?>" class="avatar" alt="">
                                    <?= h($document['name']) ?></div>
                            </h5>
                            <p class="card-text">createDate: <?= h($document['createDate']) ?></p>
                            <p class="card-text">idDoc: <?= $document['idDoc'] ?></p>
                            <p class="card-text">mode: <?= $document['mode'] ?></p>
                            <p class="card-text">name: <?= $document['name'] ?></p>
                            <p class="card-text">fileName: <?= $document['fileName'] ?></p>
                            <a href="/document/<?= $document['id'] ?>">Go document</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <?php require VIEWS . '/incs/sidebar.php' ?>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php' ?>