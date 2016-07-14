<?php

namespace app\components;

use Yii;

class View extends \yii\web\View
{
    /**
     * Use this function to insert javascript from view. Make sure you put $this->endBlock() at the end of your script.
     * For example:
     *
     * <?php $this->beginJsBlock() ?>
     *     <script>
     *         // your script goes here
     *     </script>
     * <?php $this->endBlock() ?>
     */
    public function beginJsBlock()
    {
        Yii::$app->params['jsBlock'] += 1;

        $this->beginBlock('jsBlock' . Yii::$app->params['jsBlock']);
    }

    /**
     * Use this function to insert modal from view. Make sure you put $this->endBlock() at the end of your modal.
     * For example:
     *
     * <?php $this->beginModalBlock() ?>
     *     // your modal goes here
     * <?php $this->endBlock() ?>
     */
    public function beginModalBlock()
    {
        Yii::$app->params['modalBlock'] += 1;

        $this->beginBlock('modalBlock' . Yii::$app->params['modalBlock']);
    }

    /**
     * Finds the view file based on the given view name. Refer to parent::findViewFile() for full documentation.
     * This function basically here just to make parent::findViewFile() public. Original visibility is protected.
     *
     * @param string $view
     * @param object $context
     * @return string the view file path. Note that the file may not exist.
     */
    public function findViewFile($view, $context = null)
    {
        return parent::findViewFile($view, $context);
    }

}