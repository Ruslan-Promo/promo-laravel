<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;

trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $type = '', $disk = 'public', $filename = null)
    {
        $prefix_folder = 'uploads/';
        $folder = 'others';
        switch($type){
            case 'image':
                $folder = 'images';
                break;
            case 'file':
                $folder = 'files';
                break;
            default:
                $folder = 'others';
                break;
        }
        $folder = $prefix_folder . $folder;
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
