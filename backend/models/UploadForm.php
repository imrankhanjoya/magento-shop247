<?PHP

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;

class UploadForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $imageFile;
	public $thumb = [200, 200];
	public $medium = [300, 200];
	public $full = [500, 400];

	public function rules()
	{
		return [
			[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
		];
	}

	public function upload($size = 'full')
	{
		if ($this->validate()) {
			$fileName = time() . $this->imageFile->baseName . '.' . $this->imageFile->extension;
			$SizefileName = time() . $this->imageFile->baseName . $size . '.' . $this->imageFile->extension;
			$filePath = 'uploads/' . $fileName;
			$filePathSize = 'uploads/' . $SizefileName;
			$this->imageFile->saveAs($filePath);
			Image::thumbnail($filePath, $this->$size[0], $this->$size[1])
				->resize(new Box($this->$size[0], $this->$size[1]))
				->save($filePathSize, ['quality' => 70]);
			return $filePathSize;
		} else {
			return false;
		}
	}
}
