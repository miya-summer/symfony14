<h1>ユーザー登録フォーム</h1>

<form action="<?php echo url_for('user/create') ?>" method="post">
    <?php echo $form ?>
    <input type="submit" value="保存">
</form>