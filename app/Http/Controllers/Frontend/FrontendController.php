<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\Process;
use App\Models\Project;
use App\Models\ProjectDetails;
use App\Models\Service;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


    public function index()
    {
        $sliders = Project::whereType('slider')->whereShowIn('home_slider')->whereStatus(1)->orderBy('id' ,'desc')->get();

        $services = Service::whereType('services')->whereStatus(1)->orderBy('id' ,'desc')->get();

        $projects = Project::whereType('project')->whereShowIn('home_project')->whereStatus(1)->orderBy('id' ,'desc')->get();

        $topProjects = ProjectDetails::whereStatus(1)->whereTop(1)->orderBy('id' ,'desc')->paginate(8);

        return view('frontend.index', compact('sliders','services', 'projects', 'topProjects'));
    }

    public function ourWork()
    {
        $allProjects = ProjectDetails::whereStatus(1)->orderBy('id' ,'desc')->paginate(16);
        return view('frontend.ourWork', compact('allProjects'));
    }

    public function aboutUs()
    {
        $projects = About::whereStatus(1)->orderBy('id' ,'desc')->get();
        return view('frontend.aboutUs', compact('projects'));
    }

    public function projectDetails(ProjectDetails $projectDetail)
    {
        return view('frontend.projectDetails', compact('projectDetail'));
    }
    public function homeServices(Service $service)
    {
        return view('frontend.homeServicesDetails', compact('service'));
    }
    public function process()
    {
        $processes = Process::whereStatus(1)->orderBy('id' ,'desc')->get();

        return view('frontend.process', compact('processes'));
    }


    ///////////////////////////////////////////////////////////////
    public function contact()
    {
        return view('frontend.contact');
    }

    public function sendContactMessage(Request $request)
    {
        try {
            $input['full_name'] = $request->full_name;
            $input['company']   = $request->company;
            $input['country']      = $request->country;
            $input['mobile']         = $request->mobile;
            $input['note']   = $request->note;
            $contactMessage = ContactMessage::create($input);
            Alert::success('Success', 'Your Form Sent Successfully');
            return redirect()->back();
        }catch (\Exception $e) {
            Alert::error('Error Message', 'SomeThing Wrong, Please Try Again');
            return redirect()->back();
        }
    }


    public function sendMessage(Request $request)
    {
        try {
            $input['name']    = $request->name;
            $input['mobile']     = $request->mobile;
            $input['speciality']         = $request->speciality;
            $input['address']        = $request->address;
            $input['note']         = $request->note;
            $input['type']        = $request->type;

            Message::create($input);

            Alert::success('Success', 'Your Message Sent Successfully');
            return redirect()->back();

        }catch (\Exception $e) {
            Alert::error('Error Message', 'SomeThing Wrong, Please Try Again');
            return redirect()->back();
        }
    }

}
