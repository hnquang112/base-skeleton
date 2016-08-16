<?php
/**
 * Created by IntelliJ IDEA.
 * User: hnquang
 * Date: 16/08/2016
 * Time: 14:29
 */

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\File;

class FileController extends ApiController {
    protected $absolutePath;
    protected $relativePath;

    public function __construct() {
        $this->absolutePath = storage_path() . '/app/uploads/';
        $this->relativePath = '/app/uploads/';
    }

    public function index() {
        return view('demo.upload.create');
    }

    public function store(Request $request) {
        $res = [];

        if (count($request->file('files')) >= 1) {
            foreach ($request->file('files') as $file) {
                $f = new File;
                $f->type = File::TYP_INTERNAL;

                if ($file->isValid()) {
                    $newName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($this->absolutePath, $newName);

                    $f->name = $newName;
                    $f->path = $this->relativePath . $newName;
                    $f->client_name = $file->getClientOriginalName();
                    $f->client_mime = $file->getClientMimeType();
                    $f->size = $file->getClientSize();
                    $f->save();

                    $res[] = [
                        'fileId' => $f->id,
                        'name' => $newName,
                        'size' => $f->size,
                        'url' => route('api.files.show', $newName),
                        'thumbnailUrl' => route('api.files.show', $newName),
                        'deleteUrl' => route('api.files.destroy', $newName),
                        'deleteType' => 'DELETE',
                    ];
                } else {
                    $f->description = $file->getErrorMessage();
                    $f->save();

                    $res[] = [
                        'name' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'error' => $file->getErrorMessage(),
                    ];
                }
            }
        }

        return response()->json(['files'=> $res], 200);
    }

    public function show($name) {
        $path = $this->absolutePath . $name;

        if (\File::exists($path)) {
            return response()->file($this->absolutePath . $name);
        }

        abort(404);
    }

    public function destroy($name) {
        $path = $this->absolutePath . $name;

        if (File::where('meta->name', $name)->delete() && \File::exists($path) && \File::delete($path)) {
            return $name;
        }

        abort(404);
    }

}