<?php require VIEWS . '/incs/header.php' ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
              <?php foreach ($users as $user) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><a href="posts?id=<?= $user['id'] ?>"><?= h($user['name']) ?></a></h5>
                            <p class="card-text"><?= $user['email'] ?></p>
                            <a href="posts?id=<?= $user['id'] ?>">Go user</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php foreach ($documents as $document) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><a href="posts?id=<?= $document['id'] ?>"><?= h($document['type']) ?></a></h5>
                            <p class="card-text"><?= $document['idDoc'] ?></p>
                            <p class="card-text"><?= $document['mode'] ?></p>
                            <p class="card-text"><?= $document['createDate'] ?></p>
                            <p class="card-text"><?= $document['userId'] ?></p>
                            <p class="card-text"><?= $document['fileName'] ?></p>
                            <a href="posts?id=<?= $document['id'] ?>">Go document</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <?php require VIEWS . '/incs/sidebar.php' ?>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php' ?>