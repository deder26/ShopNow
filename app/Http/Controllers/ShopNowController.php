<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use App\ProductType;
use App\Product;
use App\User;
use Session;
use Image;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\OrderDetail;
use App\AdditionalInformation;

class ShopNowController extends Controller
{

    public function index()
    {
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = DB::table('products')->orderby('id', 'desc')->paginate(15);
        return view('front-end.home.index', [
            'catagories' => $catagories,
            'productTypes' => $productTypes,
            'products' => $products
        ]);
    }

    public function afterLogIn()
    {
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = DB::table('products')->orderby('id', 'desc')->paginate(15);
        Session::put('user_name', Auth::user()->name);
        Session::put('user_id', Auth::user()->id);
        return view('front-end.home.index', [
            'catagories' => $catagories,
            'productTypes' => $productTypes,
            'products' => $products
        ]);
    }

    public function productViewCatagory($name, $id)
    {
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = DB::table('products')->orderby('id', 'desc')
            ->where('catagory_id', $id)
            ->paginate(15);
        // return $products;
        return view('front-end.productView', [
            'catagories' => $catagories,
            'productTypes' => $productTypes,
            'products' => $products
        ]);
    }

    public function productView($cname, $pname, $id)
    {
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = DB::table('products')->orderby('id', 'desc')
            ->where('productType_id', $id)
            ->paginate(15);
        // return $products;
        return view('front-end.productView', [
            'catagories' => $catagories,
            'productTypes' => $productTypes,
            'products' => $products
        ]);
    }

    public function productInfo($id)
    {
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $product = Product::find($id);

        return view('front-end.singleProduct', [
            'catagories' => $catagories,
            'productTypes' => $productTypes,
            'product' => $product
        ]);
    }

    public function aboutUs()
    {
        $catagories = Catagory::all();
        $productTypes = ProductType::all();

        $about = DB::table('additional_information')->first();
        return view('front-end.aboutUs.about_us', [
            'about' => $about,
            'catagories' => $catagories,
            'productTypes' => $productTypes
        ]);
    }

    public function contact()
    {
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $contact = DB::table('additional_information')->first();
        return view('front-end.contact.contact', [
            'contact' => $contact,
            'catagories' => $catagories,
            'productTypes' => $productTypes
        ]);
    }

    public function login()
    {
        return view('front-end.login.login');
    }

    public function dashboard()
    {
        $cnt = DB::table('users')->count();
        $msgCnt = DB::table('messages')->where('status',1)->count();
        $ordCnt =DB::table('orders')->count();
        if (Auth::user()->isAdmin)
            return view('admin.UserDashBoard',['cnt'=>$cnt,'msgCnt'=>$msgCnt,'ordCnt'=>$ordCnt]);
        else
            return redirect('/dashboard');
    }

    public function UserDashboard()
    {
        return view('front-end.users.UserDash');
    }

    public function Profile()
    {
        return view('front-end.users.user');
    }

    public function UserInfo()
    {
        return view('admin.UserInfo');
    }

    public function PurchasedList()
    {
        $purchasedProducts = Order::where('customer_id', Session::get('user_id'))->get();
        $productDetails = OrderDetail::all();
        // return "yoo";

        return view('front-end.users.PurchaseList', [
            'purchasedProducts' => $purchasedProducts,
            'productDetails' => $productDetails
        ]);
    }

    public function AdditionalInfo()
    {
        $info = AdditionalInformation::all();
        if ($info->isEmpty()) {
            $info = new AdditionalInformation();
            $info->company_name = 'ShopNow';
            $info->company_description = 'Write Description Here';
            $info->company_contact = 'Write contact Here';
            $info->company_email = 'Write email Here';
            $info->company_address = 'Write address Here';
            $info->company_logo = 'product-image/logo.jpg';
            $info->save();
        }
        $info = AdditionalInformation::first();
        return view('admin.additionalInfoView', [
            'info' => $info
        ]);
    }

    public function UpdateAdditionalInfo($id)
    {
        $info = AdditionalInformation::find($id);
        return view('admin.AdditionalInfo', [
            'info' => $info
        ]);
    }

    public function SaveInfo(Request $request)
    {
        $this->validate($request, [

            'company_name' => 'required',
            'company_description' => 'required',
            'company_contact' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
            'company_logo' => 'required'
        ]);
        $companyLogo = $request->file('company_logo');
        $ImageName = $companyLogo->getClientOriginalName();
        $directory = 'product-image/';
        $ImageUrl = $directory . $ImageName;
        // $productImage ->move($directory,$ImageName);
        Image::make($companyLogo)->resize(500, 500)->save($ImageUrl);

        $info = AdditionalInformation::find($request->id);

        $info->company_name = $request->company_name;
        $info->company_description = $request->company_description;
        $info->company_contact = $request->company_contact;
        $info->company_email = $request->company_email;
        $info->company_address = $request->company_address;
        $info->company_logo = $ImageUrl;

        $info->save();

        return redirect('/additional-info')->with('message', 'Successfully Updated');
    }
}
