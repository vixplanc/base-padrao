<?php
namespace Vixplanc\BasePadrao\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\LazyCollection;
use Spatie\SimpleExcel\SimpleExcelReader;

trait FileHandler {
    public function processExcelFileRows(string $pathToFile, array $titles_in_order) : LazyCollection|null {
        $path = Storage::path($pathToFile);
        $file = SimpleExcelReader::create($path);
        $headers = $file->getOriginalHeaders();
        foreach ($titles_in_order as $indice_order => $title) {
            if($headers[$indice_order]!=$title)
                return null;
        }
        return $file->getRows();
    }


    public function processExcelFile(string $pathToFile, array $titles_in_order) : SimpleExcelReader|null {
        $path = Storage::path($pathToFile);
        $file = SimpleExcelReader::create($path);
        $headers = $file->getOriginalHeaders();
        foreach ($titles_in_order as $indice_order => $title) {
            if($headers[$indice_order]!=$title)
                return null;
        }
        return $file;
    }


    public function dowloadFile(string $path_to_file) {
        return Storage::download($path_to_file);
    }


    public function deleteFile(string $path_to_file) {
        return Storage::delete($path_to_file);
    }


    public function uploadFile($file, string $path_to_save):string{
        return $file->store($path_to_save);
    }



}
