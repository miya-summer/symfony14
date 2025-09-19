<?php

/**
 * page actions.
 *
 * @package    myproject
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      // 何もしなければ templates/indexSuccess.php が自動で呼ばれる
      // 必要なら変数をテンプレートに渡せます
      $this->message = "Hello Page!";
  }
}
