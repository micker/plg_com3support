<?php
/**
 * @package Com3support
 * @author Com3elles
 * @copyright (C) 2019 - Com3elles
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined('_JEXEC') or die;
use Joomla\CMS\Factory;

/**
 * Crisp plugin.
 *
 * @package  [PACKAGE_NAME]
 * @since    1.0
 */
class plgSystemCom3support extends JPlugin
{
  /**
   * Application object
   *
   * @var    JApplicationCms
   * @since  1.0
   */
  protected $app;

  /**
   * Database object
   *
   * @var    JDatabaseDriver
   * @since  1.0
   */
  protected $db;

  /**
   * Affects constructor behavior. If true, language files will be loaded automatically.
   *
   * @var    boolean
   * @since  1.0
   */
  protected $autoloadLanguage = true;

  /**
   * onAfterInitialise.
   *
   * @return  void.
   *
   * @since   1.0
   */
  public function onBeforeCompileHead()
  {
    $app = Factory::getApplication();
    $doc = Factory::getDocument();
    $user = Factory::getUser();

    if ($app->isClient('site'))
      return;
// Are we in a modal?
$input   = Factory::getApplication()->input;
if ($input->get('tmpl', '', 'cmd') === 'component')
{
  return;
}


    $website_id = 'fe8ce151-db3b-4dc4-ba60-233e5b8d95e7';

    $script = "
      window.CRISP_WEBSITE_ID = '" . $website_id . "';
      window.\$crisp=[];
      (function(){
        d=document;s=d.createElement('script');
        s.src='https://client.crisp.chat/l.js';
        s.async=1;d.getElementsByTagName('head')[0].appendChild(s);
      })();
    ";
    if (JFactory::getApplication()->input->get('tmpl') !=='component'){
    $doc->addScriptDeclaration($script, $type = 'text/javascript');
      }

    if (!$user->guest) {
      $script = '$crisp.push(["set", "user:email", "' . $user->email . '"]);';
      $script = '$crisp.push(["set", "user:nickname", "' . $user->name . '"]);';
      $doc->addScriptDeclaration($script, $type = 'text/javascript');
    }
  }

  /**
   * onAfterRoute.
   *
   * @return  void.
   *
   * @since   1.0
   */
  public function onAfterRoute()
  {

  }

  /**
   * onAfterDispatch.
   *
   * @return  void.
   *
   * @since   1.0
   */
  public function onAfterDispatch()
  {

  }

  /**
   * onAfterRender.
   *
   * @return  void.
   *
   * @since   1.0
   */
  public function onAfterRender()
  {

  }

  /**
   * onAfterCompileHead.
   *
   * @return  void.
   *
   * @since   1.0
   */
  public function onAfterCompileHead()
  {

  }

  /**
   * OnAfterCompress.
   *
   * @return  void.
   *
   * @since   1.0
   */
  public function onAfterCompress()
  {

  }

  /**
   * onAfterRespond.
   *
   * @return  void.
   *
   * @since   1.0
   */
  public function onAfterRespond()
  {

  }
}
