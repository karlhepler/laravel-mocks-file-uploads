<?php

namespace OldTimeGuitarGuy\Laravel;

use Illuminate\Http\UploadedFile;

trait MocksFileUploads
{
    /**
     * Get a mocked file upload.
     * This would be inserted into request data during a test.
     *
     * @param  string $path
     * @return \Illuminate\Http\UploadedFile
     */
    public function uploadedFile($path)
    {
        $this->assertFileExists($path);

        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($fileInfo, $path);

        return new UploadedFile(
            $path, null, $mime, null, null, true
        );
    }
}
