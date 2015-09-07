<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	//public $layout='application.views.front.layouts.column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 * Manage theme layout is overriden.
	 * If given layout is overriden, use it instead of protected folder one. Else, use protected folder one.
	 * @see CController::beforeAction()
	 */
	public function beforeAction($action)
	{
	    // If application is using a theme, replace default layout controller variable that start with '//layouts/' with a theme link
	    if(empty(Yii::app()->theme->name) == false && isset($this->layout) == true && strpos($this->layout, '//layouts/') === 0)
	    {
	        // Replace path with slash by dot.
	        $sThemeLayout = 'webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'.str_replace('/', '.', substr($this->layout,10));

	        // If theme override given layout, get it from theme
	        if($this->getLayoutFile($sThemeLayout) !== false)
	            $this->layout = $sThemeLayout;
	    }
	    return true;
	}
}
