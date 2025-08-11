<?php

use Utils\Validator;

require VIEWS . '/incs/header.php';

/**
 * @var Validator $validation
 */

?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>New document</h1>

                <form action="/documents" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fileName" class="form-label">Document name</label>
                        <input id="fileName" name="fileName" type="text" class="form-control" placeholder="invrpt-new-edit-Krampsup-250807" value='<?= old('fileName') ?>'>
                        <?= isset($validation) ? $validation->listErrors('fileName') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <label for="idDoc" class="form-label">Id</label>
                        <input id="idDoc" name="idDoc" type="text" class="form-control" placeholder="1250807" value='<?= old('idDoc') ?>'>
                        <?= isset($validation) ? $validation->listErrors('idDoc') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <label for="typeDoc" class="form-label">Тип документ</label>
                        <input id="typeDoc" name="typeDoc" type="text"  class="form-control"  placeholder="invrpt|desadv" value="<?= old('typeDoc') ?>" ><?= old('typeDoc') ?>
                        <?= isset($validation) ? $validation->listErrors('typeDoc') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <label for="userName" class="form-label">Имя заказчика</label>
                        <select name="userName" id="userName"  class="form-control" >
                            <option value="">--Please choose an option--</option>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user['name'] ?>"  selected="<?= $user['name'] == old('userName') ? 'selected' : ''  ?>"><?= $user['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= isset($validation) ? $validation->listErrors('userName') : ''  ?>
                    </div>
                    <div class="mb-3">
                        <label for="docFile" class="form-label">Файл</label>
                        <input name="docFile" class="form-control" type="file" id="docFile" accept=".json, application/json" >
                        <?= isset($validation) ? $validation->listErrors('docFile') : ''  ?>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input  id="readMode" name="readMode" class="form-check-input" type="checkbox" <?=oldCheck('readMode') ?> >
                            <label class="form-check-label" for="readMode">
                                файл для редактирования : <?=oldCheck('readMode') ?>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create Document</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</main>
<script type="text/javascript" >
    document.addEventListener('DOMContentLoaded', function() {
        // Your JavaScript code to manipulate the DOM goes here
        console.log('DOM is fully loaded and parsed!');
        // let placeholder="invrpt-new-edit-Krampsup-250807";
        function getValue(type,newDoc,mode,userName) {
            const date = new Date(Date.now());
            const y = String(date.getFullYear());
            const m = String(date.getMonth() + 1);
            const mm = m.length === 1 ? `0${m}` : m;
            const d = String(date.getDate());
            const dd = d.length === 1 ? `0${d}` : d;
            return `${type}${newDoc}-${mode}-${userName}-${y.slice(2)}${mm}${dd}`;
        }

        const fileName = document.getElementById('fileName');
        const typeDoc = document.getElementById('typeDoc');
        const userName = document.getElementById('userName');
        const idDoc = document.getElementById('idDoc');
        const readMode = document.getElementById('readMode');

        typeDoc?.addEventListener('change', (event) => {
            console.log('event:',event);
            console.log('fileName:',fileName);
            const newDoc = idDoc.value === 'new' ? '-new' : idDoc.value;
            const mode = !readMode.checked || idDoc.value === 'new' ? 'edit' : 'read';
            fileName.value = getValue(event.target.value,newDoc,mode,userName?.value);
        });

    });

</script>
<?php require VIEWS . '/incs/footer.php' ?>