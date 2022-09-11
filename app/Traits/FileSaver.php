<?php


namespace App\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

trait FileSaver
{
    // <!-- upload file -->
    public function upload_file($file, $model, $fieldName, $basePath)
    {

        // <!-- upload file -->
        if ($file) {

            // <!-- delete file if exist -->
            if(Storage::exists($model->$fieldName) && $model->$fieldName !== ''){
                Storage::delete($model->$fieldName);
            }
            // if (file_exists($model->$fieldName)) {
            //     unlink($model->$fieldName);
            // }

            // <!-- create unique file name -->
            $newFileName   = $fieldName .'-'. $model->id. '-' . time() . '.' . $file->getClientOriginalExtension();

            // <!-- create upload directory -->
            $directory   = 'uploads' . DIRECTORY_SEPARATOR . $basePath . DIRECTORY_SEPARATOR . date('Y');

            Storage::makeDirectory($directory);

            // if (!is_dir($directory)) {
            //     File::makeDirectory($directory);
            // }

            // $path = public_path().'/uploads/release/'.$request->get('reference');

            if (! File::exists($directory)) {
                Storage::makeDirectory($directory);
                // File::makeDirectory($directory, 775, true, true);
            }

            $filename = $directory . DIRECTORY_SEPARATOR . $newFileName;


            // return Storage::disk('public')->put($directory, $file);

            // Manually specify a filename...
            $path = Storage::putFileAs( $directory, $file, $newFileName);

            // Storage::put($directory . DIRECTORY_SEPARATOR . $newFileName, $file);

            // <!-- create store file to directory -->
            // $file->move($directory, $newFileName);

            // <!-- update file name to database -->
            $model->$fieldName = 'storage' .DIRECTORY_SEPARATOR . $filename;
            $model->save();
        }
    }


    public function uploadFileWithResize($file, $model, $database_field_name, $basePath)
    {
        if ($file) {

            try {
                $basePath = 'assets/uploads/' . $basePath;


                $image_name     = $database_field_name . '-' . time() . '.' . $file->getClientOriginalExtension();

                if (file_exists($basePath . '/' . $model->image) && $model->image != '') {
                    unlink($basePath . '/' . $model->image);
                }

                if (!is_dir($basePath)) {
                    \File::makeDirectory($basePath, 493, true);
                }

                $resize_image = Image::make($file->getRealPath());
                $image = $resize_image->resize(250, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($basePath . '/' . $image_name);

                $model->update([$database_field_name => ($basePath . '/' . $image_name)]);
            } catch (\Exception $ex) {}
        }
    }

    public function unlinkFile($model, $fieldName)
    {
        if (Storage::exists($model->$fieldName)) {
            Storage::delete($model->$fieldName);
        }
    }
}
