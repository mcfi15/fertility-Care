<?php

namespace App\Http\Controllers\Frontend;

use App\Models\AdminNotification;
use App\Models\Job;
use App\Models\About;
use App\Models\Board;
use App\Models\Offer;
use App\Models\Orders;
use App\Models\Slider;
use App\Models\Faq;
use App\Models\Setting;
use App\Mail\ContactUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Application;
use App\Models\Appointment;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OrderFormRequest;
use App\Http\Requests\SubscribeFormRequest;
use App\Http\Requests\ApplicationFormRequest;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', '0')->latest()->get();
        $products = Product::orderBy('id', 'DESC')->limit(3)->get();
        $offers = Offer::latest()->limit(3)->get();
        $about = About::where('id','1')->first();
        if (!$about) {
            $about = (object) ['description' => $appSetting->meta_description ?? 'Providing compassionate fertility care.'];
        }
        $faqs = Faq::where('status', true)->orderBy('position', 'ASC')->get();
        return view('frontend.index', compact('sliders', 'products', 'offers', 'about', 'faqs'));
    }

    public function about(){
        $about = About::where('id', '1')->first();
        $boards = Board::orderBy('id', 'DESC')->get();
        return view('frontend.about', compact('about', 'boards'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function appointment(){
        return view('frontend.appointment');
    }

    public function storeAppointment(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'location' => 'required|string',
            'appointment_date' => 'required|string',
            'appointment_time' => 'required|string',
            'duration' => 'required|string',
            'appointment_type' => 'required|string',
            'reason' => 'required|string',
            
        ]);

        $appointment = new Appointment;

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->location = $request->location;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->duration = $request->duration;
        $appointment->appointment_type = $request->appointment_type;
        $appointment->reason = $request->reason;

        $appointment->save();

        $notification = new AdminNotification;
        $notification->title = "A new appointment booking have been made";
        $notification->is_read = 0;
        $notification->user_id = 0;
        $notification->click_url = "/admin/notifications/read/".$appointment->id;
        $notification->save();

        return redirect()->back()->with('message','Your book have been submitted successfully. You will be contacted via email when due.');
    }

    public function offer(){
        $offers = Offer::latest()->get();
        return view('frontend.offers', compact('offers'));
    }

    public function testimonials(){
        $testimonials = Testimonial::latest()->get();
        return view('frontend.testimonial', compact('testimonials'));
    }

    public function worker(){
        // $offers = Offer::latest()->get();
        return view('frontend.worker');
    }

    public function hrservice(){
        // $offers = Offer::latest()->get();
        return view('frontend.hr-services');
    }

    public function jobs(){
        $jobs = Job::where('status', '0')->latest()->paginate(10);
        return view('frontend.jobs', compact('jobs'));
    }

    public function jobView(string $slug){
        // $jobs = Job::findOrFail($slug);
        $jobs = Job::where('slug', $slug)->first();
        return view('frontend.view', compact('jobs'));
    }

    public function jobApplication(string $slug){
        // $jobs = Job::findOrFail($slug);
        $jobs = Job::where('slug', $slug)->first();
        return view('frontend.application', compact('jobs'));
    }

    public function storeApplication(ApplicationFormRequest $request){
        $validatedData = $request->validated();

        $application = new Application;

        $application->name = $validatedData['job_title'];
        $application->firstname = $validatedData['firstname'];
        $application->middlename = $validatedData['middlename'];
        $application->lastname = $validatedData['lastname'];
        $application->email = $validatedData['email'];
        $application->phone = $validatedData['phone'];
        $application->position = $validatedData['position'];
        $application->coverletter = $validatedData['coverletter'];

        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/cv/',$filename);
            $application->cv = 'uploads/cv/'.$filename;
        }

        if($request->hasFile('other')){
            $file = $request->file('other');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/other/',$filename);
            $application->other = 'uploads/cv/'.$filename;
        }

        $application->save();

        return redirect()->back()->with('message','Your Application have been submitted successfully. You will be contacted via email when due.');
    }



    public function product($category_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $products = $category->products()->where('status','0')->paginate('9');
            return view('frontend.categories', compact('products', 'category'));
        }else{
            return redirect()->back();
        }
        
    }

    public function proView(string $category_slug, string $product_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if ($product) {
                return view('frontend.view2', compact('product', 'category'));
            }else{
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
    }
    

    public function productView(string $category_slug, string $product_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if ($product) {
                return view('frontend.view', compact('product', 'category'));
            }else{
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
    }

    public function placeOrder(string $category_slug, string $product_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $product = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if ($product) {
                return view('frontend.order', compact('product', 'category'));
            }else{
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
    }



    public function storeOrder(OrderFormRequest $request){
        $validatedData = $request->validated();

        $order = new Orders;

        $order->name = $validatedData['name'];
        $order->email = $validatedData['email'];
        $order->phone = $validatedData['phone'];
        $order->quantity = $validatedData['quantity'];
        $order->product_code = $validatedData['product_code'];
        $order->price = $validatedData['price'];
        $order->title = $validatedData['title'];
        $order->save();

        return redirect()->back()->with('message','Your order has been created successfully');
    }

    public function searchProducts(Request $request){
        if($request->search){

            $searchProducts = Product::where('title','LIKE', '%'.$request->search.'%')->latest()->paginate(12);
            return view('frontend.search', compact('searchProducts'));
        }else{
            return redirect()->back()->with('alert', 'empty search');
        }
    }

    public function storeEmail(SubscribeFormRequest $request){
        $validatedData = $request->validated();

        $sub = new Subscriber;

        $sub->subemail = $validatedData['subemail'];
        $sub->save();

        return redirect()->back()->with('alert','You have successfully subscribe to our newsletter.');
    }

    public function sitemap()
    {
        $products = Product::where('status', '0')->latest()->get();
        $categories = Category::all();
        $jobs = Job::where('status', '0')->latest()->get();
        $setting = Setting::first();

        $content = '<?xml version="1.0" encoding="UTF-8"?>';
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $content .= '<url><loc>' . url('/') . '</loc><priority>1.0</priority></url>';
        $content .= '<url><loc>' . url('/about') . '</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . url('/contact') . '</loc><priority>0.8</priority></url>';
        $content .= '<url><loc>' . url('/testimonials') . '</loc><priority>0.8</priority></url>';
        $content .= '<url><loc>' . url('/appointment') . '</loc><priority>0.7</priority></url>';
        $content .= '<url><loc>' . url('/offers') . '</loc><priority>0.7</priority></url>';
        $content .= '<url><loc>' . url('/jobs') . '</loc><priority>0.7</priority></url>';

        foreach ($categories as $cat) {
            $content .= '<url><loc>' . url($cat->slug) . '</loc><priority>0.6</priority></url>';
        }

        foreach ($products as $product) {
            if ($product->category) {
                $content .= '<url><loc>' . url($product->category->slug . '/' . $product->slug) . '</loc><priority>0.5</priority></url>';
            }
        }

        foreach ($jobs as $job) {
            $content .= '<url><loc>' . url('view/' . $job->slug) . '</loc><priority>0.5</priority></url>';
        }

        $content .= '</urlset>';

        return response($content, 200)->header('Content-Type', 'application/xml');
    }

    public function postMessage(Request $request){

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:filter|string',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        Mail::to('test@mdaaelectricalengineering.com')->send(new ContactUs($data));

        return redirect()->back()->with('message','Message Sent Successfully.');

       
    }
}
