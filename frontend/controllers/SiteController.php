<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\helpers\VarDumper;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 1])->cache(3600)->one();
        $sliders = \common\models\Slider::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->cache(3600)->all();
        $testimonials = \common\models\Testimonials::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->cache(3600)->all();
        $products = \common\models\Products::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->limit(8)->cache(3600)->all();
        $clients = \common\models\Clients::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->cache(3600)->all();
        $brands = \common\models\Brands::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->cache(3600)->all();
        $news_and_events = \common\models\NewsEvents::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->cache(3600)->all();
        $special_services = \common\models\SpecialServices::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->cache(3600)->all();
        $about_content = \common\models\About::find()->where(['id' => 1])->cache(3600)->one();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        if (!empty($sliders[0])) {
            $lcp = Yii::$app->homeUrl . 'uploads/sliders/' . $sliders[0]->id . '/image.' . $sliders[0]->image;
            \Yii::$app->view->registerLinkTag(['rel' => 'preload', 'as' => 'image', 'href' => $lcp, 'fetchpriority' => 'high']);
        }
        return $this->render('index', [
                    'sliders' => $sliders,
                    'testimonials' => $testimonials,
                    'products' => $products,
                    'clients' => $clients,
                    'meta_tags' => $meta_tags,
                    'brands' => $brands,
                    'news_and_events' => $news_and_events,
                    'special_services' => $special_services,
                    'about_content' => $about_content,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 2])->cache(3600)->one();
        $about = \common\models\About::findOne(1);
        $clients = \common\models\WeDealsWith::find()->where(['status' => 1])->orderBy(['id' => SORT_ASC])->cache(3600)->all();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('about', [
                    'about' => $about,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
                    'clients' => $clients,
        ]);
    }

    /**
     * Displays brand page.
     *
     * @return mixed
     */
    /*public function actionBrand() {
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 5])->one();
        $brands = \common\models\Brands::find()->where(['status' => 1])->all();
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('brand', [
                    'brands' => $brands,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
        ]);
    }*/

    /**
     * Displays products page.
     *
     * @return mixed
     */
    public function actionBrands($brand = NULL) {
        $brand_info = [];
        $searchModel = new \common\models\ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status' => 1]);
        if (isset($brand) && $brand != '') {
            $brand_info = \common\models\Brands::find()->where(['canonical_name' => $brand])->one();
            $dataProvider->query->andWhere(['status' => 1, 'brand' => $brand_info->id]);
        }
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 3])->one();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        \Yii::$app->view->registerMetaTag(['name' => 'other_meta_tags', 'content' => $meta_tags->other_meta_tags]);
        return $this->render('brands', [
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
                    'brand' => $brand,
                    'brand_info' => $brand_info,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays products page.
     *
     * @return mixed
     */
    public function actionProducts($category = NULL, $subcategory = NULL, $brand = NULL) {
        $searchModel = new \common\models\ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status' => 1]);
        $category_details = '';
        $subcategory_details = '';
        $brand_details = $meta_tags = '';
        if (isset($category) && $category != '') {
            $category_details = \common\models\Category::find()->where(['canonical_name' => $category])->one();
            $dataProvider->query->andWhere(['status' => 1, 'category' => $category_details->id]);
            $meta_tags = $category_details;
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $category_details->meta_keyword]);
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $category_details->meta_description]);
        }
        if (isset($subcategory) && $subcategory != '') {
            $subcategory_details = \common\models\SubCategory::find()->where(['canonical_name' => $subcategory])->one();
            $dataProvider->query->andWhere(['status' => 1, 'sub_category' => $subcategory_details->id]);
            $meta_tags = $subcategory_details;
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $subcategory_details->meta_keyword]);
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $subcategory_details->meta_description]);
        }
        if (isset($brand) && $brand != '') {
            $brand_details = \common\models\Brands::find()->where(['canonical_name' => $brand])->one();
            $dataProvider->query->andWhere(['status' => 1, 'brand' => $brand_details->id]);
            $meta_tags = $brand_details;
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $brand_details->meta_keyword]);
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $brand_details->meta_description]);
        }
        $baner_image = \common\models\BanerImages::findOne(1);
        $dataProvider->pagination->pageSize = 100;
        return $this->render('products', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
                    'category' => $category,
                    'subcategory' => $subcategory,
                    'brand' => $brand,
                    'category_details' => $category_details,
                    'subcategory_details' => $subcategory_details,
                    'brand_details' => $brand_details,
        ]);
    }
    
    public function actionProductsList($category,$type) {
        $searchModel = new \common\models\ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['status' => 1]);
        $category_details = '';
        $subcategory_details = '';
        $brand_details = '';
        $categoryTitle = $subcategory = $brand = '';
        if (isset($category) && $category == 'category') {
            $category_details = \common\models\Category::find()->where(['canonical_name' => $type])->one();
            // echo "<pre>";print_r($meta_tags);die;
            $dataProvider->query->andWhere(['status' => 1, 'category' => $category_details->id]);
            $meta_tags = $category_details;
            $this->view->params['other_meta_tags'] = $category_details->other_meta_tags;
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $category_details->meta_keyword]);
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $category_details->meta_description]);
        }
        if (isset($category) && $category == 'subcategory') {
            $subcategory_details = \common\models\SubCategory::find()->where(['canonical_name' => $type])->one();
            $dataProvider->query->andWhere(['status' => 1, 'sub_category' => $subcategory_details->id]);
            $meta_tags = $subcategory_details;
            $this->view->params['other_meta_tags'] = $subcategory_details->other_meta_tags;
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $subcategory_details->meta_keyword]);
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $subcategory_details->meta_description]);
        }
        if (isset($category) && $category == 'brand') {
            $brand_details = \common\models\Brands::find()->where(['canonical_name' => $type])->one();
            $dataProvider->query->andWhere(['status' => 1, 'brand' => $brand_details->id]);
            $meta_tags = $brand_details;
            $this->view->params['other_meta_tags'] = $brand_details->other_meta_tags;
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $brand_details->meta_keyword]);
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $brand_details->meta_description]);
        }
        // echo "<pre>";print_r($meta_tags);die;
        $baner_image = \common\models\BanerImages::findOne(1);
        $dataProvider->pagination->pageSize = 100;
        return $this->render('products', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
                    'category' => $categoryTitle,
                    'subcategory' => $subcategory,
                    'brand' => $brand,
                    'category_details' => $category_details,
                    'subcategory_details' => $subcategory_details,
                    'brand_details' => $brand_details,
        ]);
    }

    /**
     * Displays products page.
     *
     * @return mixed
     */
    public function actionProduct($subcategory = NULL) {
        if (isset($subcategory) && $subcategory != '') {
            $subcategory_details = \common\models\SubCategory::find()->where(['canonical_name' => $subcategory])->one();
            $products = \common\models\Products::find()->where(['status' => 1, 'sub_category' => $subcategory_details->id])->all();
        } else {
            $products = \common\models\Products::find()->where(['status' => 1])->all();
        }
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 3])->one();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('products', [
                    'products' => $products,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
                    'subcategory_details' => $subcategory_details,
        ]);
    }

    /**
     * Displays products page.
     *
     * @return mixed
     */
    // public function actionProductDetails($product = NULL) {
       
    // //     var_dump(Yii::$app->request->isAjax);
    // //   var_dump(isset($_POST['name']) && !empty($_POST['name']));
    //     $enquiry = 0;
    //     if (isset($product) && $product != '') {
    //         if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
    //              $product_details = \common\models\Products::find()->where(['status' => 1, 'id' => $_POST['product_id']])->one();
    //         }else{
    //         $product_details = \common\models\Products::find()->where(['status' => 1, 'canonical_name' => $product])->one();
    //         }
           
    //         $meta_title = $product_details->meta_title ?? '';
    //         $this->view->params['other_meta_tags'] = $product_details->other_meta_tags ?? '';
    //     } else {
    //         $product_details = [];
    //         $meta_title = '';
    //     }
    //     $model = new \common\models\ProductEnquiry();
        
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         $model->sent_from_url = Yii::$app->request->url;
    //         $model->date = date('Y-m-d');
    //         if ($model->save()) {
    //             $this->sendProductMail($model);
    //             return $this->redirect(['enquiry-success', 'product' => $product_details->canonical_name]);
    //         }
    //     }
    //     $baner_image = \common\models\BanerImages::findOne(1);
    //     // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
    //     \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $product_details->meta_keyword ??'']);
    //     \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $product_details->meta_description ?? '']);
        
    //     return $this->render('pro_detail', [
    //                 'product_details' => $product_details,
    //                 'meta_title' => $meta_title,
    //                 'baner_image' => $baner_image,
    //                 'enquiry' => $enquiry,
    //                 'model' => $model,
    //     ]);
    // }
    
    public function actionProductDetails($product = null)
{
    $enquiry = 0;
    $meta_title = '';
    $product_details = null;

    if (!empty($product)) {
        if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
            $product_details = \common\models\Products::find()
                ->where(['status' => 1, 'id' => $_POST['product_id']])
                ->one();
        } else {
            $product_details = \common\models\Products::find()
                ->where(['status' => 1, 'canonical_name' => $product])
                ->one();
        }

        // ✅ If product not found, show 404
        if ($product_details === null) {
            return $this->redirect(['error']); 
        }

        $meta_title = $product_details->meta_title ?? '';
        $this->view->params['other_meta_tags'] = $product_details->other_meta_tags ?? '';
    } else {
        // If no product slug is passed at all
        return $this->redirect(['error']); 
    }

    $model = new \common\models\ProductEnquiry();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        $model->sent_from_url = Yii::$app->request->url;
        $model->date = date('Y-m-d');

        if ($model->save()) {
            $this->sendProductMail($model);
            return $this->redirect(['enquiry-success', 'product' => $product_details->canonical_name]);
        }
    }

    $baner_image = \common\models\BanerImages::findOne(1);

    Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $product_details->meta_keyword ?? '']);
    Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $product_details->meta_description ?? '']);

    return $this->render('pro_detail', [
        'product_details' => $product_details,
        'meta_title' => $meta_title,
        'baner_image' => $baner_image,
        'enquiry' => $enquiry,
        'model' => $model,
    ]);
}

    public function actionEnquirySuccess($product) {
        $this->layout = 'success';
        return $this->render('enquiry-success');
    }

    /**
     * Displays products page.
     *
     * @return mixed
     */
    public function actionProductEnquiry($product = NULL) {
        $enquiry = 1;
        if (isset($product) && $product != '') {
            $product_details = \common\models\Products::find()->where(['status' => 1, 'canonical_name' => $product])->one();
            $meta_title = $product_details->meta_title;
        } else {
            $product_details = [];
            $meta_title = '';
        }
        $model = new \common\models\ProductEnquiry();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->sent_from_url = Yii::$app->request->url;
            $model->date = date('Y-m-d');
            if ($model->save()) {
                $this->sendProductMail($model);
                return $this->redirect(['enquiry-success', 'product' => $product_details->canonical_name]);
            }
        }
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 3])->one();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('pro_detail', [
                    'product_details' => $product_details,
                    'meta_title' => $meta_title,
                    'baner_image' => $baner_image,
                    'enquiry' => $enquiry,
                    'model' => $model,
        ]);
    }

    /**
     * Displays services page.
     *
     * @return mixed
     */
    public function actionServices() {
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 4])->one();
        $services = \common\models\Services::find()->where(['status' => 1])->all();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('services', [
                    'services' => $services,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
        ]);
    }

    /**
     * Displays news and events page.
     *
     * @return mixed
     */
    public function actionNewsAndEvents() {
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 6])->one();
        $events = \common\models\NewsEvents::find()->where(['status' => 1])->all();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('news', [
                    'events' => $events,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
        ]);
    }

    /**
     * Displays event details page.
     *
     * @return mixed
     */
    public function actionEventDetails($event) {
        $baner_image = \common\models\BanerImages::findOne(1);
        $event_details = \common\models\NewsEvents::find()->where(['canonical_name' => $event])->one();
        if(!empty($event_details)){
        $events = \common\models\NewsEvents::find()->where(['status' => 1])->andWhere(['!=', 'id', $event_details->id])->limit(10)->all();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $event_details->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $event_details->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $event_details->meta_description]);
        $this->view->params['other_meta_tags'] = $event_details->other_meta_tags;
        return $this->render('news_detail', [
                    'event_details' => $event_details,
                    'baner_image' => $baner_image,
                    'events' => $events,
        ]);
        } else{
		    return $this->redirect(['error']); 
		}
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $baner_image = \common\models\BanerImages::findOne(1);
        $contact_info = \common\models\ContactsInfo::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 7])->one();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('contact', [
                    'meta_tags' => $meta_tags,
                    'contact_info' => $contact_info,
                    'baner_image' => $baner_image,
        ]);
    }

    /**
     * Displays blog page.
     *
     * @return mixed
     */
    public function actionBlog() {
        $baner_image = \common\models\BanerImages::findOne(1);
        $meta_tags = \common\models\MetaTags::find()->where(['id' => 8])->one();
        $blogs = \common\models\Blogs::find()->where(['status' => 1])->all();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $meta_tags->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $meta_tags->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $meta_tags->meta_description]);
        return $this->render('blog', [
                    'blogs' => $blogs,
                    'meta_tags' => $meta_tags,
                    'baner_image' => $baner_image,
        ]);
    }

    /**
     * Displays blog details page.
     *
     * @return mixed
     */
    public function actionBlogDetails($event) {
        $baner_image = \common\models\BanerImages::findOne(1);
        $blog_details = \common\models\Blogs::find()->where(['canonical_name' => $event])->one();
        $blogs = \common\models\Blogs::find()->where(['status' => 1])->andWhere(['!=', 'id', $blog_details->id])->limit(10)->all();
        // \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $blog_details->meta_title]);
        \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $blog_details->meta_keyword]);
        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $blog_details->meta_description]);
        $this->view->params['other_meta_tags'] = $blog_details->other_meta_tags;
        return $this->render('blog-dtl', [
                    'blog_details' => $blog_details,
                    'baner_image' => $baner_image,
                    'blogs' => $blogs,
        ]);
    }

    /*
     * Contact Enquiry submission through jquery
     */

    public function actionContactEnquiry() {
        if (Yii::$app->request->isAjax) {
            $model = new \common\models\ContactEnquiry();
            $model->name = $_POST['name'];
            $model->email = $_POST['email'];
            $model->phone = $_POST['phone'];
            $model->company = $_POST['company'];
            $model->message = $_POST['message'];
            $model->date = date('Y-m-d');
            if ($model->save()) {
                $this->sendContactMail($model);
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        }
    }

    /*
     * Contact Enguery mail function
     */

    public function sendContactMail($model) {
        $message = Yii::$app->mailer->compose('enquiry-mail', ['model' => $model]) // a view rendering result becomes the message body here
                ->setFrom('no-reply@astropackgulf.com')
                ->setTo([
                    'info@astropackgulf.com',
                    'projects@pentacodes.com'
                ])
                ->setSubject('Enquiry From Astropack');
        $message->send();
        return TRUE;
    }

    /*
     * News Letter Subscription
     */

    public function actionNewsLetter() {
        if (Yii::$app->request->isAjax) {
            $exist = \common\models\NewsLetter::find()->where(['email' => $_POST['email']])->one();
            if (empty($exist)) {
                $model = new \common\models\NewsLetter();
                $model->email = $_POST['email'];
                $model->date = date('Y-m-d');
                if ($model->save()) {
                    $this->sendNewsLetterMail($model);
                    echo 1;
                    exit;
                } else {
                    echo 0;
                    exit;
                }
            } else {
                echo 2;
                exit;
            }
        }
    }

    public function sendNewsLetterMail($model) {
        $message = Yii::$app->mailer->compose('news-letter-mail', ['model' => $model]) // a view rendering result becomes the message body here
                ->setFrom('no-reply@astropackgulf.com')
                ->setTo([
                    'info@astropackgulf.com',
                    'projects@pentacodes.com'
                ])
                ->setSubject('Newsletter Subscription From Astropack');

        $message->send();
        return TRUE;
    }

    /*
     * Contact Enquiry submission through jquery
     */

    public function actionProductsEnquiry() {
        if (Yii::$app->request->isAjax) {
            $model = new \common\models\ProductEnquiry();
            $model->name = $_POST['name'];
            $model->email = $_POST['email'];
            $model->phone = $_POST['phone'];
            $model->product = $_POST['product'];
            $model->message = $_POST['message'];
            $model->date = date('Y-m-d');
            if ($model->save()) {
                $this->sendProductMail($model);
                echo 1;
                exit;
            } else {
                echo 0;
                exit;
            }
        }
    }

    /*
     * Contact Enguery mail function
     */

    public function sendProductMail($model) {
        $message = Yii::$app->mailer->compose('product-mail', ['model' => $model]) // a view rendering result becomes the message body here
                ->setFrom('no-reply@astropackgulf.com')
                ->setTo([
                    'info@astropackgulf.com',
                    'projects@pentacodes.com'
                ])
                ->setSubject('Enquiry From Astropack');

        $message->send();
        return TRUE;
    }

    public function actionBrochureDownload() {
       
        if (Yii::$app->request->isAjax) {
            $product = \common\models\Products::find()->where(['id' => $_POST['product_id']])->one();
            if (!empty($product)) {
                $model = new \common\models\BrochureDownload();
                $model->product_id = $_POST['product_id'];
                $model->name = $_POST['name'];
                $model->email = $_POST['email'];
                $model->phone = $_POST['phone'];
                $model->message = $_POST['message'];
                $model->date = date('Y-m-d');
                if ($model->save()) {
                    $this->sendBrochureMail($model);
                    $path = Yii::$app->homeUrl . 'uploads/products/brochure/' . $product->id . '/brochure.' . $product->brochure;
                    echo $path;
                    exit;
                } else {
                    echo 0;
                    exit;
                }
            } else {
                echo 0;
                exit;
            }
        }
    }

    public function sendBrochureMail($model) {
        $message = Yii::$app->mailer->compose('brochure-mail', ['model' => $model]) // a view rendering result becomes the message body here
                ->setFrom('no-reply@astropackgulf.com')
                ->setTo([
                    'info@astropackgulf.com',
                    'projects@pentacodes.com'
                ])
                ->setTo('info@astropackgulf.com')
                 ->setTo('projects@pentacodes.com')
                ->setSubject('Brochure Download From Astropack');

        $message->send();
        return TRUE;
    }
      public function actionBrochureEnquirySubmit()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // read POST data, save, send email, etc...

        return ['status' => 'ok'];
    }
    
    public function actionPrivacyPolicy()
{
    return $this->render('privacy-policy');
}
public function actionTermsConditions()
{
    return $this->render('terms-conditions');
}
}
