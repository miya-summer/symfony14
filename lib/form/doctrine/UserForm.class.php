<?php

/**
 * User form.
 *
 * @package    myproject
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
      // 不要なフィールドを削除
      // templateで echo $form って書くと、そのモデルに対応する全フィールドが自動で出力されてしまうので、
      // 作成日と更新日は表示したくないので、ここでunsetすることで表示されなくなる
      unset(
          $this['created_at'],
          $this['updated_at']
      );

      // プレースホルダ設定
      $this->widgetSchema['name']->setAttribute('placeholder', '例: 山田太郎');
      $this->widgetSchema['email']->setAttribute('placeholder', '例: example@example.com');

      // ラベルに必須印を付けたい場合
      $this->widgetSchema['name']->setLabel('名前 <span style="color:red">*</span>');
      $this->widgetSchema['email']->setLabel('Email <span style="color:red">*</span>');

      // 名前は必須（空は不可）
      $this->validatorSchema['name'] = new sfValidatorString(array(
          'required' => true,
          'max_length' => 255,
      ));

      // メールは必須 + メール形式チェック
      $this->validatorSchema['email'] = new sfValidatorAnd(array(
          new sfValidatorString(array('required' => true, 'max_length' => 255)),
          new sfValidatorEmail(array('required' => true)),
      ));

      // 任意で、エラーメッセージをカスタマイズ
      $this->validatorSchema['name']->setMessage('required', '名前を入力してください。');
      $this->validatorSchema['email']->setMessage('required', 'メールアドレスを入力してください。');
      $this->validatorSchema['email']->setMessage('invalid', '有効なメールアドレスを入力してください。');
  }
}
