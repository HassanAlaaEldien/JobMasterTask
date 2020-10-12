<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Spatie\PdfToText\Pdf;

class Resume extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'resumes';

    /**
     * @var string[]
     */
    protected $fillable = ['file', 'data'];

    /**
     * @param $query
     * @param int $pagination
     * @return mixed
     */
    public function scopeSearch($query, $pagination = 10)
    {
        $search_query = request()->search_query;

        $query->where('data', 'like', "%$search_query%");

        return $query->paginate($pagination)->appends(request()->query());
    }

    /**
     * @param $value
     */
    public function setFileAttribute($value)
    {
        if (!is_string($value) && $value) {
            $this->file ? Storage::delete($this->file) : null;
            $value = Storage::disk('public')->putFile('resumes', $value);
        }
        $this->attributes['file'] = $value;
    }

    /**
     * Fetch and save the content of file.
     */
    public function fetchAndSaveFileContent()
    {
        if (Str::contains($this->file, '.pdf'))
            $this->update(['data' => Pdf::getText(storage_path('app/public/' . $this->file))]);
        else
            $this->update(['data' => $this->getWordContent()]);
    }

    /**
     * @param PhpWord $phpWord
     * @return string|null
     */
    private function getWordContent()
    {
        $text = null;
        $phpWord = IOFactory::load(storage_path('app/public/' . $this->file));
        $sections = $phpWord->getSections();

        foreach ($sections as $key => $value) {
            $sectionElement = $value->getElements();
            foreach ($sectionElement as $elementKey => $elementValue) {
                if ($elementValue instanceof \PhpOffice\PhpWord\Element\TextRun) {
                    $secondSectionElement = $elementValue->getElements();
                    foreach ($secondSectionElement as $secondSectionElementKey => $secondSectionElementValue) {
                        if ($secondSectionElementValue instanceof \PhpOffice\PhpWord\Element\Text) {
                            $text .= $secondSectionElementValue->getText();
                        }
                    }
                }
            }
        }

        return $text;
    }
}
