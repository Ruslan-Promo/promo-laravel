<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;

trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $filename = null, $disk = 'public')
    {
        $prefix_folder = 'uploads';
        $year = date('Y');
        $month = date('m');
        $folder = $prefix_folder .'/'. $year .'/'.$month;
        $name = !is_null($filename) ? $filename : time() . $uploadedFile->getClientOriginalExtension();
        $file = $uploadedFile->storeAs($folder, $name, $disk);

        $args = array(
            'name' => $name,
            'type' => $uploadedFile->getClientOriginalExtension(),
            'path' => $file
        );

        $media = Media::create($args);
        return $media;
    }
}
