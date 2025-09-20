<?php use_stylesheet('form.css') ?>
<h1>ユーザー登録フォーム</h1>

<form action="<?php echo url_for('user/create') ?>" method="post">
    <?php echo $form->renderHiddenFields() ?>

    <div class="form-group">
        <?php echo $form['name']->renderLabel('名前 <span class="required">★</span>') ?>
        <?php echo $form['name']->render(array('placeholder' => '名前を入力')) ?>
        <?php echo $form['name']->renderError() ?>
    </div>

    <div class="form-group">
        <?php echo $form['email']->renderLabel('Email <span class="required">★</span>') ?>
        <?php echo $form['email']->render(array('placeholder' => 'example@example.com')) ?>
        <?php echo $form['email']->renderError() ?>
    </div>

    <div class="form-actions">
        <input type="submit" value="送信" />
    </div>
</form>