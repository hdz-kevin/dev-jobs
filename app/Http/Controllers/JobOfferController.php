<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(auth()->user()->role !== UserRole::RECRUITER, 403);

        return view('job-offers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(auth()->user()->role !== UserRole::RECRUITER, 403);

        return view('job-offers.create');
    }

    /**
     * Display the applicants for a job offer.
     *
     * @param JobOffer $jobOffer
     * @return \Illuminate\View\View
     */
    public function applicants(JobOffer $jobOffer)
    {
        return view('job-offers.applicants', compact('jobOffer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobOffer $jobOffer)
    {
        return view('job-offers.show', compact('jobOffer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOffer $jobOffer)
    {
        $this->authorize('update', $jobOffer);

        return view('job-offers.edit', compact('jobOffer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOffer $jobOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $jobOffer)
    {
        //
    }
}
