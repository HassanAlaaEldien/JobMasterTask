<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResumeRequest;
use App\Models\Resume;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ResumesController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $resumes = request()->search_query ? Resume::search() : [];

        return view('resumes.index', compact('resumes'));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('resumes.create');
    }

    /**
     * @param StoreResumeRequest $request
     * @return RedirectResponse
     */
    public function store(StoreResumeRequest $request)
    {
        /*  @var Resume $resume */
        $resume = Resume::create($request->only('file'));

        // Fetch and set file data.
        $resume->fetchAndSaveFileContent();

        return redirect()->back()->with(['status' => 'success', 'message' => 'Resume Uploaded Successfully!']);
    }
}
