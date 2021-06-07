<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use App\Models\Media;
use Intervention\Image\Facades\Image;


trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $filename = null, $disk = 'local')
    {
        $name = !is_null($filename) ? $filename : time();
        $ext = $uploadedFile->getClientOriginalExtension();

        $path = $this->imageSave($uploadedFile, $name, $ext, $disk);
        if(!$path){
            $path = $this->save($uploadedFile, $name, $ext, $disk);
        }
        $args = array(
            'name' => $name,
            'type' => $ext,
            'path' => $path
        );

        $media = Media::create($args);
        return $media;
    }

    public function moveFile($path, $disk = 'local'){
        $file = new File($path);

        $name = time();
        $ext = $file->guessExtension();

        $path = $this->save($file, $name, $ext, $disk);

        $args = array(
            'name' => $name,
            'type' => $ext,
            'path' => $path
        );

        $media = Media::create($args);
        return $media;
    }

    public function cloudSave($path, $folder, $disk = 's3'){
        $file = new File($path);
        $ext = $file->guessExtension();
        $name = time().'.'.$ext;

        $cloudFile = Storage::disk($disk)->putFileAs($folder, $file, $name, 'public');
        $s3 = Storage::disk('s3')->getAdapter()->getClient();
        $pathCloudFile = $s3->getObjectUrl( env('AWS_BUCKET'), $cloudFile );

        $args = array(
            'name' => $name,
            'type' => $ext,
            'path' => $pathCloudFile
        );
        $media = Media::create($args);
        return $pathCloudFile;
    }

    private function imageSave( $file, $name, $ext, $disk = 'local'){
        $max_width = 1500;
        $max_height = 1500;
        $path = false;
        $imageExtensions = ['jpg', 'jpeg', 'png'];
        if(in_array($ext, $imageExtensions)){
            $image = Image::make($file);
            $image->resize($max_width, $max_height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save();
            $saved_image_uri = $image->dirname.'/'.$image->basename;

            $path = $this->save(new File($saved_image_uri), $name, $ext, $disk);

            $image->destroy();
            unlink($saved_image_uri);
        }
        return $path;
    }

    private function save( $file, $filename = null, $ext = null, $disk = 'public' ){
        $year = date('Y');
        $month = date('m');
        $folder = 'uploads/'. $year .'/'.$month;
        $name = !is_null($filename) && $filename != '' ? $filename : time();
        $ext = !is_null($ext) && $ext != '' ? $ext : $file->getClientOriginalExtension();
        $save_name = $name .'.'. $ext;

        return Storage::disk($disk)->putFileAs($folder, $file, $save_name, 'public');
    }
}
