<?php
/**
 * ClientScript manages Javascript and CSS.
 */
Yii::import('ext.packagecompressor.PackageCompressor');
class DClientScript extends PackageCompressor {
	public $scriptLevels = array();

	public function registerScriptFile($url, $position = null, $level = 1) {
		$this->scriptLevels[$url] = $level;
		return parent::registerScriptFile($url, $position, array());
	}

	/**
	 * Renders the registered scripts.
	 * Overriding from CClientScript.
	 * @param string $output the existing output that needs to be inserted with script tags
	 */
	protected function unifyScripts(){
        $this->rearrangeLevels();
        parent::unifyScripts();
    }

	/**
	 * Rearrange the script levels.
	 */
	public function rearrangeLevels() {
		$scriptLevels = $this->scriptLevels;
		foreach ($this->scriptFiles as $position => $scriptFiles) {
			$newscriptFiles = array();
			$tempscript = array();
			foreach ($scriptFiles as $id => $script) {
				$level = isset($scriptLevels[$id]) ? $scriptLevels[$id] : 1;
				$tempscript[$level][$id] = $script;
			}
			ksort($tempscript);
			foreach ($tempscript as $s) {
				foreach ($s as $id => $script) {
					$newscriptFiles[$id] = $script;
				}
			}
			$this->scriptFiles[$position] = $newscriptFiles;
		}
	}
}
