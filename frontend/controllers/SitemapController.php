<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\Products;




class SitemapController extends Controller
{
    public function actionIndex()
    {

        $ProductsModel = new Products();

        $totalProducts = $ProductsModel->find()->count();

        for ($i = 0; $i < $totalProducts; $i = $i + 10000) {

            $products = $ProductsModel->find()->select('id,title')->offset($i)->limit(10000)->orderby('id asc')->all();
            $out = '<?xml version="1.0" encoding="UTF-8"?>';
            $out .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            foreach ($products as $product) {
                $date = date("Y-m-d\TH:i:s.000\Z");
                $title = $product['title'];
                $url = "http://www.shop-247.in" . Url::to(['product/detail', 'title' => $title]);
                $title = trim($title);
                $title = urlencode($title);
                $out .= '<url>';
                $out .= '<loc>' . $url . '</loc>';
                $out .= '<lastmod>' . $date . '</lastmod>';
                $out .= '<changefreq>daily</changefreq>';
                $out .= '<priority>0.8</priority>';
                $out .= '</url>';
            }
            $out .= '</urlset>';

            $filename = 'sitemap/product-' . $i . '.xml';
            $fopen = fopen($filename, 'w');
            fwrite($fopen, $out);
            fclose($fopen);
        }
        exit;
    }



    public function actionRecent()
    {
        $judgements = $scJudgementModel->find()->select('id,link')->where(['not', ['link' => '']])->offset($i)->limit(60)->orderby('id asc')->all();
        $out = '<?xml version="1.0" encoding="UTF-8"?>';
        $out .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($judgements as $judgement) {
            $date = date("Y-m-d\TH:i:s.000\Z");
            $out .= '<url>';
            $out .= '<loc>https://www.lawsfeed.com/supreme-court-judgement/' . $judgement['link'] . '</loc>';
            $out .= '<lastmod>' . $date . '</lastmod>';
            $out .= '<changefreq>hourly</changefreq>';
            $out .= '<priority>0.8</priority>';
            $out .= '</url>';
        }
        $out .= '</urlset>';

        $filename = 'sitemap/recent-judgement.xml';
        $fopen = fopen($filename, 'w');
        fwrite($fopen, $out);
        fclose($fopen);
    }
}
