<?php

/**
 * user actions.
 *
 * @package    myproject
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new UserForm();

        // post送信されたら
        if ($request->isMethod('post'))
        {
            // フォームに入力された値 と アップロードされたファイル を Symfony の UserForm にbindで結びつける。
            // Symfony1.x の Form::bind($taintedValues, $taintedFiles) は 2つの配列を渡すのが決まりなので、
            // ファイルアップロードがなくてもgetFilesをbindする
            $this->form->bind(
                $request->getParameter($this->form->getName()), // 入力系
                $request->getFiles($this->form->getName())  // ファイルアップロードがあった場合
            );

            // Validationに成功したらif以下を実行
            if ($this->form->isValid())
            {
                // 保存
                $user = $this->form->save();

                $this->redirect('user/show?id='.$user->getId());
            }
        }
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod('post'));

        $this->form = new UserForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid()) {
            $user = $form->save();
            $this->redirect('user/show?id=' . $user->getId());
        }
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->user = Doctrine_Core::getTable('User')->find($request->getParameter('id'));
        $this->forward404Unless($this->user);
    }
}
