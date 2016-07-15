<?php

namespace app\components;

use app\helpers\Url;
use Yii;
use yii\web\View as BaseView;

class View extends BaseView
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
	
	public function registerLinkAlternate($key=null)
	{
		$this->registerLinkTag([
			'rel'=>'alternate', 
			'media'=>'only screen and (max-width: 640px)',
			'href'=>Yii::$app->params['mobileDomain'].Yii::$app->request->url,
			], $key);
	}
	
	public function registerLinkCanonical($key=null)
	{
		$this->registerLinkTag(['rel'=>'canonical', 'href'=>Url::canonical()], $key);
	}
	
	public function registerMetaTitle($content=null, $key=null)
	{
		$this->registerMetaTag([
			'name' => 'title',
			'content' => ($content!=null) ? $content : $this->title,
		], $key);
	}
	
	public function registerMetaKeywords($content, $key=null)
	{
		$this->registerMetaTag([
			'name' => 'keywords',
			'content' => $content,
		], $key);
	}
	
	public function registerMetaDescription($content, $key=null)
	{
		$this->registerMetaTag([
			'name' => 'description',
			'content' => $content,
		], $key);
	}
	
	/**
	 * register meta tag for social media
	 * ------------
	 * $content = [
	 *		'title' => <title>,
	 *		'type' => ..., //optional
	 *		'url' => <url>,
	 *		'image' => <imageUrl>,
	 *		'description' => <description of the article>,
	 * ];
	 * ------------
	 * 
	 * @param type $content array
	 */
	public function registerMetaSocialMedia($content)
	{
		$title = $this->title;
		$type = 'article';
		$url = Yii::$app->getUrlManager()->createAbsoluteUrl(Yii::$app->request->url);
		$image = Url::to(Yii::$app->params['defaultWebPictureUrl'], true);
		$description = Yii::$app->bioProfile->data->metadesc;
		
		/** Twitter card data **/
		$this->registerMetaTag([
			'name' => 'twitter:card',
			'value' => 'summary',
		]);
		
		/** Open Graph **/
		$this->registerMetaTag([
			'property' => 'og:title',
			'content' => array_key_exists('title', $content) ? $content['title'] : $title,
		]);
		$this->registerMetaTag([
			'property' => 'og:type',
			'content' => array_key_exists('type', $content) ? $content['type'] : $type,
		]);
		$this->registerMetaTag([
			'property' => 'og:url',
			'content' => array_key_exists('url', $content) ? $content['url'] : $url,
		]);
		$this->registerMetaTag([
			'property' => 'og:image',
			'content' => array_key_exists('image', $content) ? $content['image'] : $image,
		]);
		$this->registerMetaTag([
			'property' => 'og:description',
			'content' => array_key_exists('description', $content) ? $content['description'] : $description,
		]);
	}

}