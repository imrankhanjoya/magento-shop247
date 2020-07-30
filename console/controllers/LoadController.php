<?PHP

namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\Category;
use common\models\Brand;

class LoadController extends Controller
{

    public function actionCategory()
    {

        $url = 'https://api.jsonbin.io/b/5ede8db31f9e4e578819d9e7';
        $result = $this->curlget($url);
        $cat = json_decode($result);
        foreach ($cat as $key => $val) {
            $findModel = new Category();
            $fval = $findModel->find()->where(['title' => $val->Category])->one();
            print_r($fval);
            if (empty($fval)) {
                $model = new Category();
                $model->parent = 0;
                $model->title = $val->Category;
                $model->description = $val->Category;
                $model->updated_at = time();
                $model->created_at = time();
                $model->save();
                print_r($model->errors);
            }
        }
    }

    public function actionBrand()
    {

        $url = 'https://api.jsonbin.io/b/5ede951a655d87580c465ff1';
        $result = $this->curlget($url);
        $cat = json_decode($result);
        foreach ($cat as $key => $val) {
            $findModel = new Brand();
            $fval = $findModel->find()->where(['title' => $val->Brand])->one();
            print_r($fval);
            if (empty($fval)) {
                $model = new Brand();
                $model->title = $val->Brand;
                $model->description = $val->Brand;
                $model->updated_at = time();
                $model->created_at = time();
                $model->save();
                print_r($model->errors);
            }
        }
    }

    public function curlget($url)
    {
        $headers[] = "Accept: */*";
        $headers[] = "secret-key: $2b$10$1Osl1Um3SVO98xFT95c1iubgP.j/5omEVgZWgAsgkOtkv6m5SwWtq";
        $headers[] = "Connection: Keep-Alive";
        $headers[] = "Content-type: application/json";
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($cSession, CURLOPT_COOKIESESSION, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_POST, false);
        ob_start();
        curl_exec($cSession);
        $result = ob_get_contents();
        ob_end_clean();
        curl_close($cSession);
        return $result;
    }
}
