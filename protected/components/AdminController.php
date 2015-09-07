<?php
class AdminController extends CController
{
    public $layout='//layouts/column1';
    //public $layout='application.views.admin.layouts.column1';
    public $menu=array();
    public $breadcrumbs=array();

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    // public function accessRules()
    // {
    //     return array(
    //         array('allow',
    //             'users'=>array('*'),
    //             'actions'=>array('login'),
    //         ),
    //         array('allow',
    //             'users'=>array('@'),
    //         ),
    //         array('deny',
    //             'users'=>array('*'),
    //         ),
    //     );
    // }

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
    // public function getViewPath()
    // {
    //     if(($module=$this->getModule())===null)
    //         $module=Yii::app();
    //     return $module->getViewPath().DIRECTORY_SEPARATOR.$this->getId();
    // }
    // public function getViewFile($viewName)
    // {
    //     if(($theme=Yii::app()->getTheme())!==null && ($viewFile=$theme->getViewFile($this,$viewName))!==false)
    //         return $viewFile;
    //     $moduleViewPath=$basePath=Yii::app()->getViewPath();
    //     if(($module=$this->getModule())!==null)
    //         $moduleViewPath=$module->getViewPath();
    //     return $this->resolveViewFile($viewName,$this->getViewPath(),$basePath,$moduleViewPath);
    // }
	// public function getViewPath()
	// {
	//   $actionId = Yii::app()->controller->getAction()->getId();
	//   $parentActions = array('parentActionOne', 'parentActionTwo');
	//   if(in_array($actionId, $parentActions)){
	//     return 'protected/modules/library/views/book';
	//   }
	// }
}
?>
