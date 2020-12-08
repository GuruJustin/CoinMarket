<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BuyMoney;
use App\Currency;
use App\Deposit;
use App\ExchangeMoney;
use App\PaymentMethod;
use App\Gateway;
use App\GeneralSettings;
use App\SellMoney;
use App\Coinmarket;
use App\Coinmarketpay;
use App\Trx;
use App\Faq;
use App\Ticket;
use App\Coin;
use App\Coinwallet;
use App\Verification;
use App\WithdrawLog;
use App\Banky;
use App\Message;
use App\Transfer;
use App\UserLogin;
use App\Post;
use App\Testimonial;
use App\WithdrawMethod;
use Illuminate\Http\Request;
use App\Cryptowallet;
use App\Lib\coinPayments;
use App\Lib\CoinPaymentHosted;
use Auth;
use App\User;
use App\Lib\BlockIo;
use App\Lib\GoogleAuthenticator;
use App\Neto737\BitGoSDK\BitGoSDK;
use App\Neto737\BitGoSDK\Enum\CurrencyCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Session;
use Image;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $data['page_title'] = "Dashboard";
        $user = Auth::user();
         $data['trx'] = Trx::whereUser_id($user->id)->whereStatus(0)->latest()->paginate(5);
        $data['approved'] = Deposit::where('user_id', Auth::id())->whereStatus(1)->select('amount')->sum('amount');;
        $data['pending'] = Deposit::where('user_id', Auth::id())->whereStatus(0)->select('amount')->sum('amount');;
        $data['declined'] = Deposit::where('user_id', Auth::id())->whereStatus(-2)->select('amount')->sum('amount');;
        $data['buy'] = Trx::where('user_id', Auth::id())->whereStatus(2)->whereType(1)->select('main_amo')->sum('main_amo');;
        $data['bpend'] = Trx::where('user_id', Auth::id())->whereStatus(1)->whereType(1)->select('main_amo')->sum('main_amo');;
        $data['bcharge'] = Trx::where('user_id', Auth::id())->whereStatus(1)->whereType(1)->select('charge')->sum('charge');;
        $data['bacharge'] = Trx::where('user_id', Auth::id())->whereStatus(2)->whereType(1)->select('charge')->sum('charge');;
        $data['bdeccharge'] = Trx::where('user_id', Auth::id())->whereStatus(-2)->whereType(1)->select('charge')->sum('charge');;
        $data['bdecline'] = Trx::where('user_id', Auth::id())->whereStatus(-2)->whereType(1)->select('main_amo')->sum('main_amo');;
        $data['sell'] = Trx::where('user_id', Auth::id())->whereStatus(2)->whereType(0)->select('main_amo')->sum('main_amo');;
        $data['spend'] = Trx::where('user_id', Auth::id())->whereStatus(1)->whereType(0)->select('main_amo')->sum('main_amo');;
        $data['sdecline'] = Trx::where('user_id', Auth::id())->whereStatus(-2)->whereType(0)->select('main_amo')->sum('main_amo');;
        $data['time'] = Carbon::now();
        $crypt = Currency::all();

        $user->lastseen = Carbon::now();
        $user->save();




    	     $basic = GeneralSettings::first();
    	       if($basic->maintain == 1){
        return view('front.maintain', $data);
        }

        return view('home', $data);
    }


    public function daily()
    {
        $user = Auth::user();
		$settings = GeneralSettings::first();
        $now = Carbon::now();

         if ($user->verified != 2 ){

          session()->flash('alert', 'You are not eligible for daily bonus. Please proceed to verify your account first. ');

         return redirect()->route('user.authorization');

        }

        if ($user->time < $now ){

            $user->time = $now->addHours(24);
            $user->save();
            $user->bonus = $user->bonus + $settings->bonus;
            $user->save();

            return back()->withSuccess('You have Successfuly Claimed your daily '.$settings->currency.''.$settings->bonus.' bonus. ');

        }



        return back()->withAlert('You have Alredy Claimed your '.$settings->currency.''.$settings->bonus.' daily rewards already. Please come back tomorrow for more');

    }

    public function authCheck()
    {
        $basic = GeneralSettings::first();
        if($basic->maintain == 1){
        return view('front.maintain', $data);
        }


        if (Auth()->user()->status == '1' && Auth()->user()->email_verify == '1' && Auth()->user()->verified  > 0 && Auth()->user()->sms_verify == '1') {
            return redirect()->route('home');
        } else {
            $data['docs'] = Verification::where('user_id', Auth::id())->latest()->first();
            $data['page_title'] = "Authorization";
            return view('user.authorization', $data);
        }
    }

    public function sendVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->phone_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->phone_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('danger', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->phone_time = Carbon::now();
            $user->sms_code = $code;
            $user->save();
            send_sms($user->phone, $code);

            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function smsVerify(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user->sms_code == $request->sms_code) {
            $user->phone_verify = 1;
            $user->save();
            session()->flash('success', 'Your Phone Number has been verfied successfully');
            return redirect()->route('home');
        } else {
            session()->flash('danger', 'Verification Code Does not match');
        }
        return back();
    }

    public function sendEmailVcode(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (Carbon::parse($user->email_time)->addMinutes(1) > Carbon::now()) {
            $time = Carbon::parse($user->email_time)->addMinutes(1);
            $delay = $time->diffInSeconds(Carbon::now());
            $delay = gmdate('i:s', $delay);
            session()->flash('danger', 'You can resend Verification Code after ' . $delay . ' minutes');
        } else {
            $code = strtoupper(Str::random(6));
            $user->email_time = Carbon::now();
            $user->verification_code = $code;
            $user->save();
            send_email($user->email, $user->username, 'Verificatin Code', 'Your Verification Code is ' . $code);
            session()->flash('success', 'Verification Code Send successfully');
        }
        return back();
    }

    public function postEmailVerify(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if ($user->verification_code == $request->email_code) {
            $user->email_verify = 1;
            $user->save();
            session()->flash('success', 'Your Profile has been verfied successfully');
            return redirect()->route('home');
        } else {
            session()->flash('danger', 'Verification Code Does not matched');
        }
        return back();
    }


    public function faqs()
    {
        $auth = Auth::user();
        $data['page_title'] = "FAQs";
        $data['faq'] = Faq::all();
        return view('user.faq', $data);
    }


    public function Profile()
    {
        $auth = Auth::user();
        $data['page_title'] = "Profile";
        $data['user'] = User::findOrFail($auth->id);
        return view('user.profile', $data);
    }


    public function security()
    {
        $auth = Auth::user();
        $data['page_title'] = "Security";
        $data['user'] = User::findOrFail($auth->id);
        return view('user.security', $data);
    }

    public function submitProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if(isset($request->updateadd)){
        $request->validate([
            'city' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
//
        ], [
            'country.required' => 'Country Name must not be empty',
            'address.required' => 'Address must not be empty',
        ]);


        }
         if(isset($request->updateprof)){
         $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'phone' => 'required|string',
//
        ], [
            'fname.required' => 'First Name must not be empty',
            'lname.required' => 'Last Name must not be empty',
        ]);

        }

        $in = Input::except('_method', '_token', 'updateprof', 'updateadd');
        $in['reference'] = $request->username;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $request->username . '.jpg';
            $location = 'assets/images/user/' . $filename;
            $in['image'] = $location;
            if ($user->image != 'user-default.png') {
                $path = './assets/images/user/';
                $link = $path . $user->image;
                if (file_exists($link)) {
                    @unlink($link);
                }
            }
            Image::make($image)->resize(800, 800)->save($location);
        }
        $user->fill($in)->save();
        return back()->with('success', 'Your Profile Has Been Updated Successfully.');

    }


    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->passchange = Carbon::now();
                $user->save();

                return back()->with('success', 'Password Changes Successfully.');
            } else {
                return back()->with('danger', 'Current Password Not Match');
            }

        } catch (\PDOException $e) {
            return back()->with('danger', $e->getMessage());
        }
    }
    
    
    public function submitPin(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:4|confirmed'
        ]);
        try {
            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {

                $password = Hash::make($request->password);
                $user->transpin = $password;
                $user->pinchange = Carbon::now();
                $user->save();

                return back()->with('success', 'Trasnaction Pin Changed Successfully.');
            } else {
                return back()->with('danger', 'Account Password Not Correct');
            }

        } catch (\PDOException $e) {
            return back()->with('danger', $e->getMessage());
        }
    }
    
    
    
      public function startgfa(Request $request)
    {
                 $user = User::find(Auth::id());
                $user->gfa = 1;
                $user->save();

                return back()->with('success', 'Two Factor Authentication Enabled Successfully.');
            
    }

      public function stopgfa(Request $request)
    {
                 $user = User::find(Auth::id());
                $user->gfa = 0;
                $user->save();

                return back()->with('success', 'Two Factor Authentication Disabled Successfully.');
            
    }

   public function submitPin2(Request $request)
    {
       
            $user = User::find(Auth::id());
           

                
                $user->setpin = $request->setpin == 'on' ? '1' : '0'; 
                $user->save();

                return back()->with('success', 'Trasnaction Pin Settings Has Been Update Successfully.');
           
        
    }

  public function logtoggle(Request $request)
    {
       
            $user = User::find(Auth::id());
           

                 
                $user->log = $request->log == 'on' ? '1' : '0';
                $user->save();

                return back()->with('success', 'Activities Log Settings Has Been Updated Successfully.');
           
        
    }




    public function depositcrypto()
    {
        $data['page_title'] = "Deposit Methods";
        $data['gates'] = Gateway::whereStatus(1)->get();
        return view('user.depositcrypto', $data);
    }


    public function depositfiat()
    {
        $data['page_title'] = "Deposit Methods";
        $data['gates'] = Gateway::whereStatus(1)->get();
        return view('user.deposit', $data);
    }


    public function activitylog()
    {
        $data['page_title'] = " Activities";
        $data['activity'] = UserLogin::where('user_id', Auth::id())->orderBy('id','desc')->paginate(10);
        return view('user.activity-log', $data);
    }


    public function referral()
    {   $data['referral'] =  User::whereRefer(Auth::user()->id)->get();
        $data['page_title'] = "Referral Log";
        return view('user.referral-log', $data);
    }



    public function kyc()
    {   $data['user'] =  Auth::user()->id;
        $data['page_title'] = "Account Verification";
        $data['docs'] = Verification::where('user_id', Auth::id())->latest()->first();
        return view('user.account-verification', $data);
    }



    public function kyc2(Request $request)
    {

     $this->validate($request,
            [
            'lname' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'address' => 'required',
            'fname' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'type' => 'required',
            'date' => 'required',
            'number' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'photo2' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        $docm['user_id'] = Auth::id();
        $docm['type'] = $request->type;
        $docm['date'] = $request->date;
        $docm['number'] = $request->number;
        $docm['status'] = 0;
        if($request->hasFile('photo'))
            {
                $docm['image1'] = uniqid().'.jpg';
                $request->photo->move('kyc',$docm['image1']);
            }
          if($request->hasFile('photo2'))
            {
                $docm['image2'] = uniqid().'.jpg';
                $request->photo2->move('kyc',$docm['image2']);
            }

        Verification::create($docm);

        $user = User::find(Auth::id());
        $user['fname'] = $request->fname ;
        $user['lname'] = $request->lname ;
        $user['gender'] = $request->gender ;
        $user['dob'] = $request->dob ;
        $user['country'] = $request->country ;
        $user['state'] = $request->state ;
        $user['city'] = $request->city ;
        $user['zip_code'] = $request->zip ;
        $user['address'] = $request->address ;
        $user['verified'] = 1 ;

        $user->save();


         Message::create([
                    'user_id' => $user->id,
                    'title' => 'KYC Submited',
                    'details' =>'Your KYC submission has been received. Please wait while we verify your submissin. You will receive a message once your submission has been approved',
                    'admin' => 1,
                    'status' =>  0
                ]);




          session()->flash('success', 'Account Verification Request Sent Successfully. ');

         return redirect()->route('home');
    }



    public function bank()
    {   $data['user'] =  Auth::user()->id;
        $data['page_title'] = "Bank Account";
        return view('user.bank', $data);
    }


    public function postbank(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if(isset($request->wallet)){

        if(isset($request->paypal)){
        $user->paypal = $request->paypal;
        $user->save();
        }

        if(isset($request->btc)){
        $user->btcwallet = $request->btc;
        $user->save();
        }
         return back()->with('success', 'online Payment Account Updated Successfuly');

        }

        $gate = Gateway::whereId(107)->first();
        $bankCode = $request->bank;
        $bank = Banky::whereCode($request->bank)->first();




        if($request->bank == "other"){
         $user->bank = $request->bankname;
         $user->accountname = $request->acctname;
         $user->accountno = $request->actnumber;
         $user->save();
         return back()->with('success', 'Bank Account Updated Successfuly');
         }

         if($request->bank == "none"){
          return back()->with('success', 'Bank Account Updated Successfuly');
         }

        $acctnumber = $request->acctnumber;
        $AccountID = "$request->actnumber";
        $baseUrl = "https://api.paystack.co";
        $endpoint = "/bank/resolve?account_number=".$AccountID."&bank_code=".$bankCode;
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $authorization = "$gate->val2"; //gotten from paystack dashboard


        $headers = array (
            "Content-Type: $contentType",
            "Authorization: Bearer $authorization"
        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );

            curl_close($ch);

            if($content['status']) {
                        $acctname = $content['data']['account_name'];
                        $bname = $bank->bank;

                        $user->bank = $bname;
                        $user->accountname = $acctname;
                        $user->accountno = $request->actnumber;
                        $user->save();
                        return back()->with('success', 'Bank Account Updated Successfuly');

             }
             else {

             return back()->with('danger', 'Account Number Not Registered With '.$bank->bank.'');
             }


    }

     public function veribank(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $gate = Gateway::whereId(107)->first();
        $bankCode = $request->bank;
        $bank = Banky::whereCode($request->bank)->first();
        $bankname = $bank->bank;

        $AccountID = "$request->accountno";
        $baseUrl = "https://api.paystack.co";
        $endpoint = "/bank/resolve?account_number=".$AccountID."&bank_code=".$bankCode;
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $authorization = "$gate->val2"; //gotten from paystack dashboard


        $headers = array (
            "Content-Type: $contentType",
            "Authorization: Bearer $authorization"
        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );

            curl_close($ch);

            if($content['status']) {
                     $response['account_name'] = $content['data']['account_name'];
                     $bname =  $response['account_name'];

                      $user->bank = $bank->bank;
                      $user->accountno = $AccountID;
                      $user->accountname = $bname;
                      $user->save();
              session()->flash('ready', 'Verification Code Did not matched');
              return back()->with('success', 'Account Number Is Valid');

             }
             else {

             return back()->with('danger', 'Account Number Not Registered With '.$bank->bank.'');
             }


    }

        public function validatebank($id)
    {    $user = User::whereAccountno($id)->first();
         $user->bankyes= 1;
         $user->save();
        return back()->with('success', 'Bank Details Addes Successfully');


    }



    public function depositDataInsert(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'gateway' => 'required',
        ]);
          $basic = GeneralSettings::first();
        if ($request->amount <= 0) {
            return back()->with('danger', 'Invalid Amount Entered');
        }
        $trx = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 6 );
        if($request->gateway == "bank"){
         $usdamo = ($request->amount + 0) / $basic->rate;

         $depo['user_id'] = Auth::id();
                    $depo['gateway_id'] = 0;
                    $depo['amount'] = $request->amount;
                    $depo['charge'] = 0;
                    $depo['usd'] = round($usdamo, 2);
                    $depo['trx'] = $trx;
                    $depo['status'] = 0;
                    Deposit::create($depo);

                    Session::put('Track', $depo['trx']);

                    return redirect()->route('user.deposit.preview');


        }

        else {
            $gate = Gateway::findOrFail($request->gateway);

            if (isset($gate)) {
if ($gate->minamo <= $request->amount && $gate->maxamo >= $request->amount) {
$charge = $gate->fixed_charge + ($request->amount * $gate->percent_charge / 100);
                    $usdamo = ($request->amount + $charge) / $basic->rate;


                    $depo['user_id'] = Auth::id();
                    $depo['gateway_id'] = $gate->id;
                    $depo['amount'] = $request->amount;
                    $depo['charge'] = $charge;
                    $depo['usd'] = round($usdamo, 2);
                    $depo['trx'] = $trx;
                    $depo['status'] = 0;
                    Deposit::create($depo);

                    Session::put('Track', $depo['trx']);

                    return redirect()->route('user.deposit.preview');

                } else {
                    return back()->with('danger', 'Please Follow Deposit Limit');
                }
            } else {
                return back()->with('danger', 'Please Select Deposit gateway');
            }
        }
    }

    public function depositPreview()
    {

        $track = Session::get('Track');
        $data = Deposit::where('status', 0)->where('trx', $track)->first();
        $page_title = "Deposit Preview";
        $auth = Auth::user();
        return view('user.payment.preview', compact('data', 'page_title'));
    }


    public function wallet()
    {
        $data['page_title'] = "Crypto Wallets";
        $data['wallet'] = Cryptowallet::where('user_id', Auth::id())->orderBy('name','asc')->get();
        return view('user.wallet', $data);
    }


    public function updatewallet(Request $request)
    {
        $wallet = Cryptowallet::findOrFail($request->wallet);
        $wallet->address = $request->address;
        $wallet->save();

         return back()->with('success', 'Wallet Address Updated Successfully.');


        return view('user.wallet', $data);
    }





    public function convertbonus()
    {
        $data['page_title'] = "Convert Bonus";
        return view('user.convert', $data);
    }



    public function updateconvert(Request $request)
    {
       $basic = GeneralSettings::first();
           $this->validate($request, [
           'amount' => 'required|numeric|min:'.$basic->minbonus.'',
        ], [
             'amount.required' => 'The minimum amount you can convert is '.$basic->currency.''.$basic->minbonus.' '
        ]);
        $user = Auth::user();

         if ($request->amount > $user->bonus) {
            return back()->with('alert', 'You Cant Convert An Amount Greater Than Your Current Bonus Balance.');
        }



        $user->balance = $user->balance + $request->amount;
        $user->bonus = $user->bonus - $request->amount;
        $user->save();
        return back()->with('success', 'Bonus Cpnverted Successfuly.');

    }

      public function transfer()
    {
        $data['page_title'] = "Transfer Fund";
        return view('user.transfer', $data);
    }


 public function updatetransfer(Request $request)
    {
        $user = Auth::user();
        
        
         if(isset($request->pin)){
         try {
            $c_password = Auth::user()->transpin;
             if (Hash::check($request->pin, $c_password)) {
 
            } else {
                return back()->with('danger', 'Transaction Pin Not Correct');
            }  
            
        } catch (\PDOException $e) {
            return back()->with('danger', $e->getMessage());
        }
            
        }
        
        $basic = GeneralSettings::first();
         if ($request->amount > $user->balance) {
            return back()->with('alert', 'You Cant Transfer An Amount Greater Than Your Current Balance.');
        }

        $count = User::whereUsername($request->username)->count();
         if($count < 1){
         return back()->with('alert', 'There is no username with such username on '.$basic->sitename.' Please re-check and try again.');
         }

        if($count > 0){
        $receiver = User::whereUsername($request->username)->first();

        if($user->username == $request->username){
         return back()->with('alert', 'You cant transfer fund to the same deposit wallet.  Please re-check and try again.');
         }



        $receiver->balance = $receiver->balance + $request->amount;
        $receiver->save();
         }

         $tr = strtoupper(str_random(20));
            $w['amount'] = $request->amount;
            $w['transaction_id'] = $tr;
            $w['user_id'] = Auth::user()->id;
            $w['send_details'] = $request->username;
            $w['status'] = 2;
            $trr =Transfer::create($w);




        $user->balance = $user->balance - $request->amount;
        $user->save();
        return back()->with('success', 'Fund transfered to '.$request->username.' successfully.');

    }
      public function transferlog()
    {
        $data['transfer'] = Transfer::where('user_id', Auth::id())->orderBy('id','desc')->paginate(5);
        return view('user.transfer-log', $data);
    }




    public function withdrawMoney()
    {
        $data['withdrawMethod'] = WithdrawMethod::where('status', '=' ,1)->orderBy('name','asc')->get();
        $data['page_title'] = "Withdraw Money";
        $data['wallet'] = Cryptowallet::where('user_id', Auth::id())->orderBy('name','asc')->get();
        return view('user.withdraw-money', $data);
    }

    public function requestcrypto(Request $request)
    {
        $this->validate($request, [
            'method_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'wallet' => 'required'
        ]);
        $basic = GeneralSettings::first();
        $wallet = Cryptowallet::findOrFail($request->wallet);


        $method = WithdrawMethod::findOrFail($request->method_id);
        $currency = Currency::findOrFail($wallet->coin_id);
        $ch = $method->fix + round(($request->amount * $method->percent) / 100, $basic->decimal);
        $reAmo = $request->amount + $ch;
         if ($wallet->address == 0) {
            return back()->with('alert', 'You need to update your '.$wallet->name.' wallet details before you can withdraw from your '.$wallet->name.' wallet.');
        }
        if ($reAmo < $method->withdraw_min) {
            return back()->with('alert', 'The Requested Amount is Smaller Than Withdraw Minimum Amount.');
        }
        if ($reAmo > $method->withdraw_max) {
            return back()->with('alert', 'The Requested Amount is Larger Than Withdraw Maximum Amount.');
        }
        if ($reAmo > $wallet->balance) {
            return back()->with('alert', 'The Request Amount is More Than Your '.$wallet->name.' Wallet Current Balance.');
        }

            $tr = strtoupper(str_random(20));
            $w['amount'] = $request->amount;
            $w['method_id'] = $request->method_id;
            $w['charge'] = $ch;
            $w['transaction_id'] = $tr;
            $w['net_amount'] = $reAmo;
            $w['user_id'] = Auth::user()->id;
            $w['currency_id'] = $currency->id;
            $w['wallet_id'] = $request->wallet;
            $trr = WithdrawLog::create($w);
            $data['withdraw'] = $trr;
            Session::put('wtrx', $trr->transaction_id);

            $data['method'] = $method;
            $data['amount'] = $request->amount;
            $data['charge'] = $ch;
            $data['wallet'] = Cryptowallet::findOrFail($request->wallet);;

            $data['page_title'] = "Withdraw Preview";
            return view('user.withdraw-crypto', $data);

    }


    public function requestwithdrawal(Request $request)
    {
        $this->validate($request, [
            'method_id' => 'required|numeric',
            'amount' => 'required|numeric|min:1',

        ]);
        
        if(isset($request->pin)){
         try {
            $c_password = Auth::user()->transpin;
             if (Hash::check($request->pin, $c_password)) {
 
            } else {
                return back()->with('danger', 'Transaction Pin Not Correct');
            }  
            
        } catch (\PDOException $e) {
            return back()->with('danger', $e->getMessage());
        }
            
        }
        
        
        $basic = GeneralSettings::first();
        $user = Auth::user();
        $method = WithdrawMethod::findOrFail($request->method_id);
        $ch = $method->fix + round(($request->amount * $method->percent) / 100, $basic->decimal);
        $reAmo = $request->amount + $ch;

        if($request->method_id == 2){
         if ($user->paypal == "Not Set") {
            return back()->with('alert', 'You need to update your Paypal Account details before you can withdraw using Paypal.');
        } }
       if($request->method_id == 3){
         if ($user->bank == "Not Set") {
            return back()->with('alert', 'You need to update your Bank Account details before you can withdraw using Bank Transfer.');
        } }
        if ($reAmo < $method->withdraw_min) {
            return back()->with('alert', 'The Requested Amount is Smaller Than Withdraw Minimum Amount.');
        }
        if ($reAmo > $method->withdraw_max) {
            return back()->with('alert', 'The Requested Amount is Larger Than Withdraw Maximum Amount.');
        }
        if ($reAmo > $user->balance) {
            return back()->with('alert', 'The Request Amount is More Than Your Deposit Wallet Current Balance.');
        }

            $tr = strtoupper(str_random(20));
            $w['amount'] = $request->amount;
            $w['method_id'] = $request->method_id;
            $w['charge'] = $ch;
            $w['transaction_id'] = $tr;
            $w['net_amount'] = $reAmo;
            $w['status'] = 0;
            $w['user_id'] = Auth::user()->id;
            $trr = WithdrawLog::create($w);
            $data['withdraw'] = $trr;
            Session::put('wtrx', $trr->transaction_id);

            $data['method'] = $method;
            $data['amount'] = $request->amount;
            $data['charge'] = $ch;

           return back()->with('success', 'Withdrawal Has Been Received. Please wait while we verify your request');

    }


    public function requestSubmit(Request $request)
    {
        $basic = GeneralSettings::first();
        $this->validate($request, [
            'withdraw_id' => 'required|numeric',
            'send_details' => 'required'
        ]);

        $ww = WithdrawLog::findOrFail($request->withdraw_id);
        $ww->send_details = $request->send_details;
        $ww->message = $request->message;
        $ww->status = 1;
        $ww->save();

        $user = Auth::user();
        $user->balance = $user->balance - $ww->net_amount;
        $user->save();


        $text = $ww->amount . " - " . $basic->currency . " Withdraw Request Send via " . $ww->method->name . ". <br> Transaction ID Is : <b>#$ww->transaction_id</b>";
        notify($user, 'Withdraw Via ' . $ww->method->name, $text);
        return redirect()->route('user.withdrawLog')->with('success', 'Withdraw request has been successfully submitted. Please Wait For Confirmation.');
    }



    public function activity()
    {
        $user = Auth::user();
        $data['invests'] = Trx::whereUser_id($user->id)->latest()->paginate(15);
        $data['page_title'] = "Transaction Log";
        return view('user.trx', $data);
    }

    public function depositLog()
    {
        $user = Auth::user();

        $data['page_title'] = "Deposit Log";
        $data['deposit'] = Deposit::whereUser_id($user->id)->latest()->paginate(5);
        return view('user.deposit-log', $data);
    }
    public function withdrawLog()
    {
        $user = Auth::user();
        $data['withdraw'] = WithdrawLog::whereUser_id($user->id)->where('status', '!=', 0)->latest()->paginate(5);
        $data['page_title'] = "Withdraw Log";
        return view('user.withdraw-log', $data);
    }


      public function buycoin()
    {    $auth = Auth::user();
         if ($auth->verified != 2 ){
         return back()->withAlert('You are not eligible to buy cryptocurrency. Please verify your account first');
        }

        $get['currency'] = Currency::whereStatus(1)->orderBy('name','desc')->get();
        $get['method'] = PaymentMethod::whereStatus(1)->orderBy('name','asc')->get();
        $get['bank'] = Bank::whereStatus(1)->orderBy('name','asc')->get();
        $get['page_title'] = " Buy E-Currency";
        return view('user.buy', $get);
    }
       public function buylog()
    {    $auth = Auth::user();
         if ($auth->verified != 2 ){
         return back()->withAlert('You are not eligible to buy cryptocurrency. Please verify your account first');
        }
        $get['trx'] = Trx::whereUser_id($auth->id)->whereType(1)->orderBy('id','desc')->paginate(7);
        $get['page_title'] = "Purchase Log";
        return view('user.buy-log', $get);
    }
      public function buymartlog()
    {    $auth = Auth::user();
         if ($auth->verified != 2 ){
         return back()->withAlert('You are not eligible to buy cryptocurrency. Please verify your account first');
        }
        $get['trx'] = Coinmarketpay::whereBuyer($auth->id)->orderBy('id','desc')->paginate(7);
        $get['page_title'] = "Market Trade Log";
        return view('user.buy-mart-log', $get);
    }
    public function sellcoin()
    {


        $get['page_title'] = "Sell Currency";
        $get['currency'] = Currency::whereStatus(1)->orderBy('name','asc')->get();
        $get['method'] = PaymentMethod::whereStatus(1)->orderBy('name','asc')->get();
        $get['bank'] = Bank::whereStatus(1)->orderBy('name','asc')->get();
       return view('user.sell', $get);
    }
        public function sellog()
    {    $auth = Auth::user();
         if ($auth->verified != 2 ){

         return back()->withAlert('You are not eligible to sell cryptocurrency. Please verify your account first');
        }
        $get['trx'] = Trx::whereUser_id($auth->id)->whereType(0)->orderBy('id','desc')->paginate(7);
        $get['page_title'] = "Sales Log";
        return view('user.sell-log', $get);
    }



  public function sellmarket()
    {
        $auth = Auth::user();
         if ($auth->verified != 2 ){
         return back()->withAlert('You are not eligible to sell cryptocurrency on the market place yet. Please verify your account first');
        }

        $get['page_title'] = "Create Offer";
        $get['currency'] = Currency::whereStatus(1)->orderBy('name','asc')->get();
        $get['method'] = PaymentMethod::whereStatus(1)->orderBy('name','asc')->get();
        $get['bank'] = Bank::whereStatus(1)->orderBy('name','asc')->get();
       return view('user.sellmarket', $get);
    }



  public function buymarket()
    {
        $auth = Auth::user();
        $get['page_title'] = "Buy Currency";
        $get['currency'] = Currency::whereStatus(1)->orderBy('name','asc')->get();
        $get['method'] = PaymentMethod::whereStatus(1)->orderBy('name','asc')->get();
        return view('user.buymarket', $get);
    }



  public function buymarketpost(Request $request)
    {
        $auth = Auth::user();
        $coin = Currency::findOrFail($request->coin);
        $get['deal'] = Coinmarket::whereStatus(1)->whereCoin($request->coin)->orderBy('id','desc')->get();
        $basic = GeneralSettings::first();
        Session::put('Track', $request->coin);
        Session::put('Amount', $request->amount);
        return redirect()->route('coinmarket');

    }

  public function coinmarket()
    {
        $auth = Auth::user();
        $track = Session::get('Track');
        $coin = Currency::findOrFail($track);
        $get['page_title'] = "".$coin->name." Market Place";
        $get['amount'] = Session::get('Amount');
        $get['deal'] = Coinmarket::whereStatus(1)->whereCoin($track)->orderBy('id','desc')->paginate(5);
       return view('user.coinstore', $get);
    }


    public function paymarket(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
            'gateway' => 'required',
        ]);
          $basic = GeneralSettings::first();
        if ($request->amount <= 0) {
            return back()->with('danger', 'Invalid Amount Entered');
        }
         $market = Coinmarket::findOrFail($request->market);
         if ($request->amount > $market->balance) {
            return back()->with('danger', 'Error Making Payment. You are trying to purchace unit more than the merchant market balance');
        }

            $gate = Gateway::findOrFail($request->gateway);


                    $pay['buyer'] = Auth::id();
                    $pay['gateway'] = $gate->id;
                    $pay['seller'] = $market->user_id;
                    $pay['wallet'] = $request->wallet;
                    $pay['amount'] = round($request->amount, 2);
                    $pay['coin'] = $market->coin;
                    $pay['marketcode'] = $market->code;
                    $pay['trx'] = strtoupper(Str::random(6));
                    $pay['status'] = 0;
                    Coinmarketpay::create($pay);

                    Session::put('Track', $pay['trx']);

                    return redirect()->route('market.paypreview');
        }

        public function marketpaypreview()
    {

        $track = Session::get('Track');
        $data = Coinmarketpay::where('status', 0)->where('trx', $track)->first();
        $page_title = "Deposit Preview";
        $auth = Auth::user();
        return view('user.marketpay', compact('data', 'page_title'));
    }

          public function marketpay(Request $request)
    {
         $auth = Auth::user();
         $market = Coinmarketpay::whereTrx($request->trx)->whereBuyer($auth->id)->first();
         $market->status = 1;
         $market->save();


         $marketplace = Coinmarket::whereCode($market->marketcode)->first();
         $sold = $marketplace->sold + $market->amount;
         $bal = $marketplace->balance - $sold;
         $marketplace->sold = $sold;
         $marketplace->balance = $bal;
         $marketplace->save();
        $basic = GeneralSettings::first();
         $coin = Currency::findOrFail($market->coin);

              Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Purchased on Market Place',
                    'details' => 'Your '.$coin->name.' purchase request of '.$market->amount.'$ with transaction number '.$market->trx.' has been purchased on the market place with market code '.$market->marketcode.' successful. , Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);

             Message::create([
                    'user_id' => $market->seller,
                    'title' => 'Coin Sold on Market Place',
                    'details' => 'You just sold '.$coin->name.' valued at '.$market->amount.'$ with transaction number '.$market->trx.' on your store with market code '.$market->marketcode.' Please treat as required. , Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);


        return redirect()->route('home')->with("success", "You cryptocurrency has been purchased on the market place successful");


    }








  public function activedeal()
    {
        $auth = Auth::user();
        $get['page_title'] = "Active Deal";
        $get['deal'] = Coinmarket::whereStatus(1)->whereUser_id($auth->id)->orderBy('id','desc')->paginate(5);
       return view('user.mystore', $get);
    }



  public function mystore()
    {
        $auth = Auth::user();
        $get['page_title'] = "My Store";
        $get['deal'] = Coinmarket::whereUser_id($auth->id)->orderBy('id','desc')->paginate(5);
       return view('user.mystore', $get);
    }

 public function viewdeal($id)
    {
        $auth = Auth::user();
        $get['page_title'] = "My Deal";
        $get['store'] = Coinmarket::whereUser_id($auth->id)->whereCode($id)->first();
        $get['deal'] = Coinmarketpay::whereSeller($auth->id)->whereMarketcode($id)->where('status', '>', '0')->orderBy('id','desc')->paginate(5);
        $get['pend'] = Coinmarketpay::whereSeller($auth->id)->whereMarketcode($id)->whereStatus(1)->orderBy('id','desc')->get();
       return view('user.mystoredeal', $get);
    }

 public function vieworder(Request $request)
    {

        $this->validate($request, [
            'order' => 'required',
        ]);
        $auth = Auth::user();
        $get['page_title'] = "My Deal";
        $deal = Coinmarketpay::whereSeller($auth->id)->whereTrx($request->order)->orderBy('id','desc')->first();

        Session::put('Track', $deal['trx']);
        return redirect()->route('vieworder');

    }
       public function viewtrx($id)
    {
        $auth = Auth::user();
        $get['deal'] = Coinmarketpay::whereSeller($auth->id)->where('trx', $id)->where('status' ,'>' , '1')->first();
        $count = Coinmarketpay::whereSeller($auth->id)->where('trx', $id)->where('status' ,'>' , '1')->count();
         if($count < 1){
         return back()->with('alert', 'Please verify this payment order first, themt come back to view order.');
         }

        $order = Coinmarketpay::whereSeller($auth->id)->where('trx', $id)->where('status' ,'>', '1')->first();
        $get['page_title'] = "View Order";
        $basic = GeneralSettings::first();
        $get['commission'] = $order->amount*$basic->escrow/100;

        return view('user.viewdeal', $get);
    }


      public function vieworder2()
    {
        $auth = Auth::user();
        $track = Session::get('Track');
        $get['deal'] = Coinmarketpay::whereSeller($auth->id)->where('trx', $track)->first();
        $order = Coinmarketpay::whereSeller($auth->id)->where('trx', $track)->first();
        $get['page_title'] = "View Order";
        $basic = GeneralSettings::first();
        $get['commission'] = $order->amount*$basic->escrow/100;

        return view('user.viewdeal', $get);
    }


       public function approvemarketsale(Request $request, $id)
      {
          $this->validate($request, [
            'password' => 'required',
            'trx' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
          $auth = Auth::user();
          $c_password = Auth::user()->password;
          if (Hash::check($request->password, $c_password)) {
          $market = Coinmarketpay::whereTrx($id)->whereSeller($auth->id)->first();
          $market->status = 2;
          $market->hashtrx = $request->trx;

          if($request->hasFile('image'))
            {
                $market['image'] = uniqid().'.jpg';
                $request->image->move('market',$market['image']);
            }

          $market->save();

          $mark = Coinmarket::whereCode($market->marketcode)->whereUser_id($auth->id)->first();
          $mark->amount = $mark->amount - $market->amount;
          $mark->sold = $mark->sold + $market->amount;
          $mark->balance = $mark->amount;


          $mark->save();

          $coin = Currency::findOrFail($market->coin);
          $basic = GeneralSettings::first();

            Message::create([
                    'user_id' => $market->buyer,
                    'title' => 'Transction Approved ',
                    'details' => 'Your '.$coin->name.' purchase with transaction number '.$market->trx.' from the market place has been approved by the seller. If you didnt receive any '.$coin->name.' or the seller sent a lower '.$coin->name.', please open a ticket, Else if all is good, please click the approve button form your transaction log to approve receipt , Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);
          return back()->with('success', 'Transaction Has Been Approved Successfully');

            } else {
                return back()->with('danger', 'You have entered a wrong password');
            }


    }

        public function approvemarketsale2(Request $request, $id)
      {
          $this->validate($request, [
            'password' => 'required',
        ]);
          $auth = Auth::user();
          $c_password = Auth::user()->password;
          if (Hash::check($request->password, $c_password)) {
          $market = Coinmarketpay::whereTrx($id)->whereBuyer($auth->id)->first();
          $market->buyer_reply = 1;
          $market->save();

          $coin = Currency::findOrFail($market->coin);
          $basic = GeneralSettings::first();

            Message::create([
                    'user_id' => $market->seller,
                    'title' => 'Deal Sealed & Accepted ',
                    'details' => 'Your '.$coin->name.' deal with transaction number '.$market->trx.' on the market place has been approved and accepted by the buyer, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);
          return back()->with('success', 'Deal Has Been Accepted Successfully');

            } else {
                return back()->with('danger', 'You have entered a wrong password');
            }


    }



    public function rejectmarketsale2(Request $request, $id)
      {
          $this->validate($request, [
            'password' => 'required',
        ]);
          $auth = Auth::user();
          $c_password = Auth::user()->password;
          if (Hash::check($request->password, $c_password)) {
          $market = Coinmarketpay::whereTrx($id)->whereBuyer($auth->id)->first();
          $market->buyer_reply = 2;
          $market->save();

          $coin = Currency::findOrFail($market->coin);
          $basic = GeneralSettings::first();

            Message::create([
                    'user_id' => $market->seller,
                    'title' => 'Deal Disputed ',
                    'details' => 'Your '.$coin->name.' deal with transaction number '.$market->trx.' on the market place has been disputed by the buyer, Please contact buyer for appropriate closure or create a ticket to request assistance Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);
          return back()->with('success', 'Deal Has Been Rejected Successfully');

            } else {
                return back()->with('danger', 'You have entered a wrong password');
            }


    }

   public function messagebuyer(Request $request, $id)
      {
          $this->validate($request, [
            'details' => 'required',
            'subject' => 'required',
        ]);
          $auth = Auth::user();
          $market = Coinmarketpay::whereTrx($id)->whereSeller($auth->id)->first();
          $basic = GeneralSettings::first();

            Message::create([
                    'user_id' => $market->buyer,
                    'title' => $request->subject,
                    'details' => $request->details,
                    'sender' => $market->seller,
                    'admin' => 1,
                    'status' =>  0
                ]);
          return back()->with('success', 'Message has been sent to the buyer successfully');

    }


       public function rejectmarketsale(Request $request, $id)
      {
          $this->validate($request, [
            'password' => 'required',
        ]);
          $auth = Auth::user();
          $c_password = Auth::user()->password;
          if (Hash::check($request->password, $c_password)) {
          $market = Coinmarketpay::whereTrx($id)->whereSeller($auth->id)->first();
          $market->status = 3;
          $market->save();
          $basic = GeneralSettings::first();
          $coin = Currency::findOrFail($market->coin);

            Message::create([
                    'user_id' => $market->buyer,
                    'title' => 'Transction Rejected ',
                    'details' => 'Your '.$coin->name.' purchase with transaction number '.$market->trx.' from the market place has been rejected by the seller. Please open a ticket if you feel this is wrong , Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);

          return back()->with('success', 'Transaction Has Been Rejected Successfully');

            } else {
                return back()->with('danger', 'You have entered a wrong password');
            }


    }




  public function closeddeal()
    {
        $auth = Auth::user();
        $get['page_title'] = "Closed Deal";
        $get['deal'] = Coinmarket::whereStatus(0)->whereUser_id($auth->id)->orderBy('id','desc')->paginate(5);
       return view('user.mystore', $get);
    }

    public function searchmarket(Request $request)
    {
        $auth = Auth::user();
        $get['page_title'] = "Search Result";
        $count = Coinmarket::whereCode($request->code)->whereUser_id($auth->id)->orderBy('id','desc')->count();

        if($count < 1){
         return back()->with('alert', 'There is no deal with this code Please check and try again.');
         }
        $get['deal'] = Coinmarket::whereCode($request->code)->whereUser_id($auth->id)->orderBy('id','desc')->paginate(5);
       return view('user.mystore', $get);
    }

  public function searchmarketplace(Request $request)
    {
        $auth = Auth::user();
        $get['page_title'] = "Search Result";
        $count = Coinmarket::whereCode($request->code)->whereUser_id($auth->id)->orderBy('id','desc')->count();

        if($count < 1){
         return back()->with('alert', 'There is no deal with this code Please check and try again.');
         }
        $get['deal'] = Coinmarket::whereCode($request->code)->orderBy('id','desc')->paginate(5);
       return view('user.coinstore', $get);
    }


        public function closemarket(Request $request, $id)
    {
         $this->validate($request, [
            'password' => 'required',
        ]);
         $auth = Auth::user();

          $c_password = Auth::user()->password;
          if (Hash::check($request->password, $c_password)) {
          $market = Coinmarket::whereId($id)->whereUser_id($auth->id)->first();
          $market->status = 0;
          $market->save();
          return back()->with('success', 'Market Offer Has Been Closed Successfully');

            } else {
                return back()->with('danger', 'You have entered a wrong password');
            }




    }


        public function openmarket(Request $request, $id)
      {
          $this->validate($request, [
            'password' => 'required',
        ]);
         $auth = Auth::user();
         $market = Coinmarket::whereId($id)->whereUser_id($auth->id)->first();
         if($market->balance < 1){
         return back()->with('alert', 'You cant reactivate a deal with 0.00 remaining balance. please create another deal');
         };

          $c_password = Auth::user()->password;
          if (Hash::check($request->password, $c_password)) {
          $market = Coinmarket::whereId($id)->whereUser_id($auth->id)->first();
          $market->status = 1;
          $market->save();
          return back()->with('success', 'Market Offer Has Been Activated Successfully');

            } else {
                return back()->with('danger', 'You have entered a wrong password');
            }


    }



  public function sellmarketpost(Request $request)
    {

       $this->validate($request, [
            'buyer' => 'required',
            'coin' => 'required',
            'details' => 'required',
            'amount' => 'required',
        ]);

        $code = strtoupper(Str::random(6));
        $coin = Currency::findOrFail($request->coin);
        $basic = GeneralSettings::first();
        $auth = Auth::user();
        $sell['buyer'] = $request->buyer;
        $sell['coin'] = $request->coin;
        $sell['details'] = $request->details;
        $sell['amount'] = $request->amount;
        $sell['value'] = $request->amount;
        $sell['balance'] = $request->amount;
        $sell['status'] = 1;
        $sell['user_id'] = $auth->id;
        $sell['code'] = $code;
        $data = Coinmarket::create($sell)->Coinmarket;

            Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Placed on Market Place',
                    'details' => 'Your '.$coin->name.' of amount '.$request->amount.'$ with transaction number '.$code.' has been placed on the market place successful. , Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);



        return redirect()->route('home')->with("success", "You cryptocurrency has been posted on the market place successful");
     }





      public function buyecoin(Request $request)
    {
         $this->validate($request, [
            'wallet' => 'required',
            'rewallet' => 'required',
            'amount' => 'required',
            'payment' => 'required',
        ]);


        $auth = Auth::user();
        $basic = GeneralSettings::first();
        $currency = Currency::whereId($request->coin)->first();
        $trx = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 6 );



        if($request->wallet != $request->rewallet){
        return back()->with("alert", "Please confirm you have entered same payment addresss");
        }

        if($request->payment == 2){


        $charge = $basic->transcharge;
        $usd = $request->amount * $currency->buy;
        $topay = $usd + $charge;
        $get = $request->amount/$currency->price;

        $buy['currency_id'] = $currency->id;
        $buy['amount'] =  $request->amount;
        $buy['main_amo'] = $topay;
        $buy['charge'] = $charge;
        $buy['price'] = $currency->price;
        $buy['getamo'] = $get;
        $buy['user_id'] = Auth::id();
        $buy['type'] = 1;
        $buy['method'] = $request->method;
        $buy['wallet'] = $request->wallet;
        $buy['rate'] = $currency->sell;
        $buy['bank'] = $request->bank;
        $buy['remark'] = $request->comment;
        $buy['status'] = 0;
        $buy['trx'] = $trx;
        $data = Trx::create($buy)->trx;

        Session::put('Track', $buy['trx']);
        return redirect()->route('user.ebuy'); }

        elseif($request->payment == 3){

        if($request->gateway ==  107){
        $gate = Gateway::whereId(107)->first();
         }


        if($request->gateway == 103){
        $gate = Gateway::whereId(103)->first();
         }


        if($request->gateway == 100){
        $gate = Gateway::whereId(100)->first();
         }

        if($request->gateway == 99){
        $gate = Gateway::whereId(99)->first();

        if($request->local > $auth->balance){
        return back()->with("alert", "You dont have enough fund in your deposit wallet.Please deposit more fund or try using another payment gateway");
        }




         }

        $charge = $basic->transcharge;
        $usd = $request->amount * $currency->buy;
        $topay = $usd + $charge;
        $get = $request->amount/$currency->price;

        $buy['currency_id'] = $currency->id;
        $buy['amount'] =  $request->amount;
        $buy['main_amo'] = $topay;
        $buy['charge'] = $charge;
        $buy['price'] = $currency->price;
        $buy['getamo'] = $get;
        $buy['user_id'] = Auth::id();
        $buy['type'] = 1;
        $buy['wallet'] = $request->wallet;
        $buy['rate'] = $currency->sell;
        $buy['gateway'] = $gate->id;
        $buy['remark'] = $request->comment;
        $buy['status'] = 0;
        $buy['trx'] = $trx;
        $data = Trx::create($buy)->trx;

        Session::put('Track', $buy['trx']);
        return redirect()->route('user.ebuy');

         }



    }

       public function ebuyonlinePreview()
    {

        $track = Session::get('Track');
        $data = Trx::where('status', 0)->where('trx', $track)->first();
        $page_title = "Purchase Preview";
        $auth = Auth::user();


        $basic = GeneralSettings::first();
        date_default_timezone_set($auth->timezone);
        $d=strtotime("+$basic->trxcancel minutes");
        $timeout = date("Y-m-d h:i:sa", $d);


        $start = $data->created_at;
        $time = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($start)));


        $start2 = $time;
        $timeout = date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($start2)));

        $data['timeout'] = $timeout;
        $data->save();


        return view('user.ebuy', compact('data', 'page_title'));
    }

    public function ebuyonlinepay($id)
    {
        $data = Trx::where('status', 0)->where('trx', $id)->first();
        $page_title = "Purchase Preview";
        $auth = Auth::user();
        return view('user.ebuypay', compact('data', 'page_title'));
    }

    public function ebuydel($id)
     {
        $data = Trx::where('status', 0)->where('trx', $id)->first();
        $page_title = "Purchase Preview";
        $auth = Auth::user();
        $data->delete();
        return redirect()->route('home')->with("success", "Unpaid Transaction Was Deleted successful");
    }



       public function ebuyonlinepost($id)
    {
         $data = Trx::where('status', 0)->where('trx', $id)->first();
         Session::put('Track', $data->trx);
         return redirect()->route('ebuypost2');
    }


     public function ebuyonlinepost2()
    {
         $track = Session::get('Track');
         $data = Trx::where('status', 0)->where('trx', $track)->first();
         $method = PaymentMethod::all();
         $page_title = "Purchase Coin";
         $auth = Auth::user();
         return view('user.ebuypay', compact('data','method', 'page_title'));

    }



     public function ebuyupload(Request $request)
    {

         $this->validate($request,
            [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        $basic = GeneralSettings::first();
        $data = Trx::where('status', 0)->where('trx', $request->trx)->first();
        $page_title = "Purchased Coin";
         $auth = Auth::user();

         $data->amountpaid = $request->amount;
         $data->depositor = $request->payer;
         $data->tnum = $request->tnum;
         $data->method = $request->method;
         $data->status = 1;
          if($request->hasFile('photo'))
            {
                $data['image'] = uniqid().'.jpg';
                $request->photo->move('uploads/payments',$data['image']);
            }


             Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Purchased',
                    'details' => 'Your '.$basic->currency_sym.''.$request->amount.' with transaction number '.$data->trx.'cryptocurrency purchase was successful. Please wait while our server verifies your purchase. Your account will be credited once payment is confirmed by our server, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);

         $data->save();
         return redirect()->route('home')->with("success", "  Your coin purchase was successful");

    }
      public function trxdel($id)
     {
        $data = Trx::where('status', 0)->where('id', $id)->first();
        $page_title = "Purchase Preview";
        $data->delete();
        return redirect()->route('home')->with("success", "Unpaid Transaction Was Deleted successful");
    }






        public function sellecoin(Request $request)
    {
         $this->validate($request, [
            'coin' => 'required',
            'bank' => 'required',
            'usd' => 'required',
        ]);


        $auth = Auth::user();
        $basic = GeneralSettings::first();
        $currency = Currency::whereId($request->coin)->first();
        $trx = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890') , 0 , 6 );

        $gate = Gateway::whereId(107)->first();
        $bankCode = $request->bank;
        $bank = Banky::whereCode($request->bank)->first();


        if($request->bank == "other"){
        $bname = $request->bankname;
        $acctname = $request->acctname;
        $acctnumber = $request->actnumber;
        }

        else {

         if($request->bank == "Choose..."){

         return back()->with('danger', 'Please select your bank to proceed with sales');


         }



        $acctnumber = $request->acctnumber;
        $AccountID = "$request->actnumber";
        $baseUrl = "https://api.paystack.co";
        $endpoint = "/bank/resolve?account_number=".$AccountID."&bank_code=".$bankCode;
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $authorization = "$gate->val2"; //gotten from paystack dashboard


        $headers = array (
            "Content-Type: $contentType",
            "Authorization: Bearer $authorization"
        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );

            curl_close($ch);

            if($content['status']) {
                     $acctname = $content['data']['account_name'];
                     $bname = $bank->bank;


             }
             else {

             return back()->with('danger', 'Account Number Not Registered With '.$bank->bank.'');
             }}


        $charge = $basic->transcharge;
        $usd = $request->usd * $currency->buy;
        $topay = $usd ;


        $buy['currency_id'] = $currency->id;
        $buy['amount'] =  $request->usd;
        $buy['main_amo'] = $topay;
        $buy['charge'] = $charge;
        $buy['price'] = $currency->price;
        $buy['user_id'] = Auth::id();
        $buy['type'] = 0;
        $buy['bank'] = 0;
        $buy['bankname'] = $bname;
        $buy['accountname'] = $acctname;
        $buy['accountnumber'] = $request->actnumber;
        $buy['rate'] = $currency->buy;
        $buy['status'] = 0;
        $buy['trx'] = $trx;
        $data = Trx::create($buy)->trx;

        Session::put('Track', $buy['trx']);
        return redirect()->route('user.esell');

    }

          public function esellonlinePreview()
    {

        $track = Session::get('Track');
        $data = Trx::where('status', 0)->where('trx', $track)->first();
        $page_title = "Purchase Preview";
        $auth = Auth::user();

        $basic = GeneralSettings::first();
        date_default_timezone_set($auth->timezone);
        $d=strtotime("+$basic->trxcancel minutes");
        $timeout = date("Y-m-d h:i:sa", $d);


        $start = $data->created_at;
        $time = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($start)));


        $start2 = $time;
        $timeout = date('Y-m-d H:i:s',strtotime('+30 minutes',strtotime($start2)));

        $data['timeout'] = $timeout;
        $data->save();


        return view('user.esell', compact('data', 'page_title'));
    }

    public function esellonlinepay()
    {
        $track = Session::get('Track');
        $data = Trx::where('status', 0)->where('trx', $track)->first();
        $page_title = "Sales Preview";
        $auth = Auth::user();
        return view('user.esellpay', compact('data', 'page_title'));
    }

    public function esellscan()
    {
        $track = Session::get('Track');
        $data = Trx::where('status', 0)->where('trx', $track)->first();
        $page_title = "Sales Preview";
        $auth = Auth::user();
        return view('user.esellscan', compact('data', 'page_title'));
    }


    public function esellscan2($id)
    {
        $data = Trx::where('status', 0)->where('trx', $id)->first();
        $page_title = "Sales Preview";
        $auth = Auth::user();
        return view('user.esellscan', compact('data', 'page_title'));
    }

    public function eselldel($id)
     {
        $data = Trx::where('status', 0)->where('trx', $id)->first();
        $page_title = "Sale Preview";
        $auth = Auth::user();
        $data->delete();
        return redirect()->route('home')->with("success", "Unpaid Transaction Was Deleted successful");
    }



       public function esellonlinepost($id)
    {
         $data = Trx::where('status', 0)->where('trx', $id)->first();
         Session::put('Track', $data->trx);
         return redirect()->route('esellpost2');
    }


     public function esellupload(Request $request)
    {
           $this->validate($request,
            [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'trxx' => 'required',
            ]);

        $basic = GeneralSettings::first();
        $data = Trx::where('status', 0)->where('trx', $request->trx)->first();
        $page_title = "Sold Coin";
         $auth = Auth::user();

         $data->tnum = $request->trxx;
         $data->status = 1;
          if($request->hasFile('photo'))
            {
                $data['image'] = uniqid().'.jpg';
                $request->photo->move('uploads/payments',$data['image']);
            }


             Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Sold',
                    'details' => 'Your USD'.$data->amount.' sale with transaction number '.$data->trx.' was successful. Please wait while our server verifies your sale. Your account will be credited once payment is confirmed by our server, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);

         $data->save();
         return redirect()->route('home')->with("success", "  Your coin sale was successful");

    }







    public function buyonline(Request $request)
    {
        $auth = Auth::user();
        $basic = GeneralSettings::first();
        $currency = Currency::whereId($request->coin)->first();
        $wallet = Cryptowallet::whereUser_id($auth->id)->whereCoin_id($request->coin)->first();
        $trx = rand(000000, 999999) . rand(000000, 999999);

        $lenght = strlen($request->address);


        if($request->radio ==  "paystack"){
        $gate = Gateway::whereId(107)->first();
         }


        if($request->radio == "stripe"){
        $gate = Gateway::whereId(103)->first();
         }


        if($request->radio == "rave"){
        $gate = Gateway::whereId(100)->first();
         }




        if($wallet->address == "0"){
        return back()->with("alert", "Please setup your $wallet->name wallet addres first before you make withdrawal");
        }


        if($lenght < 10){
        return back()->with("alert", "You have setup a wrong $wallet->name wallet address. Please update your walletaddress");
        }


        $buy['currency_id'] = $currency->id;
        $buy['enter_amount'] =  round($request->amount, $basic->decimal);
        $buy['get_amount'] = $request->unit;
        $buy['buy_charge'] = round($request->charge, $basic->decimal);
        $buy['buy_price'] = $currency->price;
        $buy['user_id'] = Auth::id();
        $buy['type'] = 1;
        $buy['status'] = 0;
        if($request->radio == "bank"){
        $buy['gateway'] = 999; }
        else{
        $buy['gateway'] = $gate->id; }
         if($request->radio == "bank"){
        $buy['info'] = "Bought ".$wallet->name." using Bank Transfer"; }
        else{
        $buy['info'] = "Bought ".$wallet->name." using Credit Card"; }
        $buy['account'] = $request->address;
        $buy['trx'] = $trx;
        $data = BuyMoney::create($buy)->trx;

        Session::put('Track', $buy['trx']);
        return redirect()->route('user.onlinebuy');

    }

     public function buyonlinePreview()
    {

        $track = Session::get('Track');
        $data = Buymoney::where('status', 0)->where('trx', $track)->first();
        $page_title = "Purchase Preview";
        $auth = Auth::user();
        return view('user.onlinebuy', compact('data', 'page_title'));
    }

      public function sellwallet(Request $request)
    {
        $this->validate($request, [
            'radio2' => 'required',
        ], [
             'radio2.required' => 'Please select a method to payment '
        ]);
        $auth = Auth::user();
        $basic = GeneralSettings::first();
        $currency = Currency::whereId($request->coin)->first();
        $wallet = Cryptowallet::whereUser_id($auth->id)->whereCoin_id($request->coin)->first();
        $trx = rand(000000, 999999) . rand(000000, 999999);

        $lenght = strlen($request->radio2);
        if($wallet->balance < $request->unit){
        return back()->with("alert", "You dont have enough balance in your ".$wallet->name." wallet");
        }

        if($wallet->address == "0"){
        return back()->with("alert", "Please setup your payment account first before your make sales");
        }


        if($lenght < 5){
        return back()->with("alert", "You have setup a wrong payment account. Please update your payment account");
        }

        $wallet->balance = $wallet->balance - 3;
        $wallet->save();

        $buy['currency_id'] = $currency->id;
        $buy['enter_amount'] =  round($request->amount, $basic->decimal);
        $buy['get_amount'] = $request->unit;
        $buy['sell_charge'] = round($request->charge, $basic->decimal);
        $buy['sell_price'] = $currency->price;
        $buy['user_id'] = Auth::id();
        $buy['type'] = 0;
        $buy['status'] = 1;
        if($request->radio2 == "Deposit Wallet"){
        $buy['payout'] = 1;
        }
        $buy['email'] = $request->radio2;
        $buy['trx'] = $trx;
        $data = SellMoney::create($buy)->trx;

        Trx::create([
        'user_id' => $auth->id,
        'amount' => $request->amount,
        'main_amo' => round($auth->balance, $basic->decimal),
        'charge' => $request->charge,
        'type' => '-',
        'action' => 'Sales',
        'title' => ' Sold ' . $request->unit . ' ' . $currency->symbol,
         'trx' => $trx
          ]);

            Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Sold',
                    'details' => 'Your '.$request->unit.'' . $currency->symbol.' cryptocurrency sales valued at '.$basic->currency.''.round($request->amount-$request->charge, $basic->decimal).' was successful. '.$request->unit.'' . $currency->symbol.' was debited from your '.$basic->sitename.'  ' . $currency->name.' wallet. Please wait while our server verifies your sale. Your account will be credited once coin is confirmed by our server, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);



        $txt = $request->amount . ' ' . $currency->symbol . ' Sold Amount  ';
        send_email($auth->email, $auth->username, 'Sold Amount', $txt);
        return redirect()->route('home')->with("success", "  Your coin sales was successful");

    }

      public function sellonline(Request $request)
    {
          $this->validate($request, [
            'radio' => 'required',
        ], [
             'radio.required' => 'Please select a method to payment '
        ]);
        $auth = Auth::user();
        $currency = Currency::whereId($request->coin)->first();
        $basic = GeneralSettings::first();
        $trx = rand(000000, 999999) . rand(000000, 999999);
        $sell['currency_id'] = $currency->id;
        $sell['enter_amount'] =  round($request->amount, $basic->decimal);
        $sell['get_amount'] = $request->unit;
        $sell['sell_charge'] = round($request->charge, $basic->decimal);
        $sell['sell_price'] = $currency->price;
        $sell['user_id'] = Auth::id();
        $sell['type'] = 1;
        $sell['status'] = 0;
         if($request->radio2 == "Deposit Wallet"){
        $buy['payout'] = 1;
        }

        $sell['account'] = $request->account;
        $sell['email'] = $request->radio;
        $sell['trx'] = $trx;
        $sell = SellMoney::create($sell)->trx;

        Trx::create([
        'user_id' => $auth->id,
        'amount' => $request->amount,
        'main_amo' => round($auth->balance, $basic->decimal),
        'charge' => $request->charge,
        'type' => '-',
        'action' => 'Sales',
        'title' => ' Sold ' . $request->unit . ' ' . $currency->symbol,
         'trx' => $trx
          ]);



        $auth = Auth::user();
        $sell = SellMoney::where('trx', $trx)->where('user_id', $auth->id)->whereStatus(0)->first();
        $basic = GeneralSettings::first();
         Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Sold',
                    'details' => 'Your '.$request->unit.'' . $currency->symbol.' cryptocurrency sales valued at '.$basic->currency.''.round($request->amount-$request->charge, $basic->decimal).' was successful. Please wait while our server verifies your sale. Your account will be credited once coin is confirmed by our server, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);



        if ($sell) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $sell->trx . '.jpg';
                $location = 'sales/' . $filename;
                $sell->image = $filename;
                Image::make($image)->save($location);
            }
            $sell->account = $request->account;
            $sell->info = $request->info;
            $sell->status = 1;
            $sell->save();
            return redirect()->route('home')->with("success", "  Your Coin Sale Was Successful");
        }
        abort(404);
    }


    public function exchange()
    {
        $get['page_title'] = "Exchange Currency";
        $get['currency'] = Currency::whereStatus(1)->orderBy('name','asc')->get();
        $get['currency2'] = Currency::whereStatus(1)->orderBy('name','asc')->get();
        return view('user.exchange', $get);
    }

     public function exchangewallet(Request $request)
    {
        $this->validate($request, [
            'radio2' => 'required',
        ], [
             'radio2.required' => 'Please select a method of payment '
        ]);
        $auth = Auth::user();
        $basic = GeneralSettings::first();
        $hwallet = Cryptowallet::whereUser_id($auth->id)->whereCoin_id($request->hcoin)->first();
        $gwallet = Cryptowallet::whereUser_id($auth->id)->whereCoin_id($request->gcoin)->first();
        $trx = rand(000000, 999999) . rand(000000, 999999);

        $lenght = strlen($request->radio);
        if($hwallet->balance < $request->hhave){
        return back()->with("alert", "You dont have enough balance in your ".$hwallet->name." wallet");
        }

        if($request->radio2 == 0){
        if($gwallet->address == "0"){
        return back()->with("alert", "Please setup your payment account first before your make exchange");
        } }

        if($request->gcoin == $request->hcoin){
        return back()->with("alert", "You cant exchange the same type of coin. Please check and try again later");
        }

       if($request->radio2 == 0){
        $hwallet->balance = $hwallet->balance - $request->hhave;
        $gwallet->balance = $gwallet->balance + $request->gget;
        $hwallet->save();
        $gwallet->save();
        }
        else {
        $hwallet->balance = $hwallet->balance - $request->hhave;
        $hwallet->save();
        }


        $data['user_id'] = Auth::id();
        $data['trx'] = $trx;
        $data['transaction_number'] = $trx;
        if($request->radio2 == 0){
        $data['info'] = "".$basic->sitename." Wallet";
        $data['status'] = 2;
        }
        else {
        $data['info'] = $hwallet->address;
        $data['status'] = 1;
        }

        $data['from_amount'] = round($request->hhave, 6);
        $data['from_amount_charge'] = $request->charge;
        $data['from_currency_id'] = $request->hcoin;
        $data['receive_amount'] = round($request->gget, 6);
        $data['receive_currency_id'] = $request->gcoin;

        $data['type'] = 0;
        $getTrx = ExchangeMoney::create($data)->trx;


        Trx::create([
        'user_id' => $auth->id,
        'amount' => $request->hamount,
        'main_amo' => round($auth->balance, $basic->decimal),
        'charge' => $request->charge,
        'type' => '-',
        'action' => 'Exchange',
        'title' => ' Exchange ' . $request->unithave . ' ' . $hwallet->name,
         'trx' => $trx
          ]);


            Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Exchanged',
                    'details' => 'Your '.$request->hhave.'' . $hwallet->name.' cryptocurrency exchange was successful. '.$request->gget.'' . $gwallet->name.' will be credited to your '.$gwallet->name.' wallet. Please wait while our server verify your exchange. Your account will be credited once coin exchange is confirmed by our server, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);




        $txt = $request->hhave . ' ' . $hwallet->name . ' Exchange Amount  ';
        send_email($auth->email, $auth->username, 'Exchange Amount', $txt);
        return redirect()->route('home')->with("success", "  Your coin sales was successful");

    }




          public function exchangeonline(Request $request)
    {
        $this->validate($request, [
            'radio2' => 'required',
        ], [
             'radio2.required' => 'Please select a method of payment '
        ]);
        $auth = Auth::user();
        $basic = GeneralSettings::first();
        $hwallet = Cryptowallet::whereUser_id($auth->id)->whereCoin_id($request->hcoin)->first();
        $gwallet = Cryptowallet::whereUser_id($auth->id)->whereCoin_id($request->gcoin)->first();
        $trx = rand(000000, 999999) . rand(000000, 999999);

        $lenght = strlen($request->radio);

        if($request->radio2 == 0){
        if($gwallet->address == "0"){
        return back()->with("alert", "Please setup your payment account first before your make exchange");
        } }

        if($request->gcoin == $request->hcoin){
        return back()->with("alert", "You cant exchange the same type of coin. Please check and try again later");
        }


        $data['user_id'] = Auth::id();
        $data['trx'] = $trx;
        $data['transaction_number'] = $request->account;
        if($request->radio2 == 0){
        $data['info'] = "".$basic->sitename." Wallet";
        }
        else {
        $data['info'] = $hwallet->address;
        }
        $data['status'] = 1;

        $data['type'] = 1;
        $data['from_amount'] = round($request->hhave, 6);
        $data['from_amount_charge'] = $request->charge;
        $data['from_currency_id'] = $request->hcoin;
        $data['receive_amount'] = round($request->gget, 6);
        $data['receive_currency_id'] = $request->gcoin;
         if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $request->account . '.jpg';
                $location = 'exchange/' . $filename;
                $data['image'] = $filename;
                Image::make($image)->save($location);
            }
        $getTrx = ExchangeMoney::create($data)->trx;


        Trx::create([
        'user_id' => $auth->id,
        'amount' => $request->hamount,
        'main_amo' => round($auth->balance, $basic->decimal),
        'charge' => $request->charge,
        'type' => '-',
        'action' => 'Exchange',
        'title' => ' Exchange ' . $request->unithave . ' ' . $hwallet->name,
         'trx' => $trx
          ]);


            Message::create([
                    'user_id' => $auth->id,
                    'title' => 'Coin Exchanged',
                    'details' => 'Your '.$request->hhave.'' . $hwallet->name.' cryptocurrency exchange was successful. '.$request->gget.'' . $gwallet->name.' will be credited to your '.$gwallet->name.' wallet. Please wait while our server verify your exchange. Your account will be credited once coin exchange is confirmed by our server, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);

        $auth = Auth::user();
        $exchange = ExchangeMoney::where('transaction_number', $request->account)->where('user_id', $auth->id)->whereStatus(0)->first();
        $basic = GeneralSettings::first();


            return redirect()->route('home')->with("success", "  Your Exchange Request Was Successful. Please wait while our server verify your transaction");

    }


    public function transactions()
    {
        $auth = Auth::user();
        $data['page_title'] = "My Trade";
        $data['sell']=  Trx::where('user_id', $auth->id)->whereType(0)->latest()->get();
        $data['buy']=  Trx::where('user_id', $auth->id)->latest()->whereType(1)->get();

        return view('user.mytrade',$data);

    }




    public function notifications()
    {     $auth = Auth::user();
        $data['page_title'] = "Notifications";
        $data['notify']=  Post::whereNotify(1)->latest()->get();
         return view('user.notifications', $data);
    }



    public function inbox()
    {     $auth = Auth::user();
        $data['page_title'] = "Inbox";
        $data['code'] = strtoupper(Str::random(6));
        $data['inbox']=  Message::where('user_id', $auth->id)->whereAdmin(1)->orderBy('created_at','desc')->paginate(7);
         return view('user.inbox', $data);
    }



    public function tickets()
    {     $auth = Auth::user();
        $data['page_title'] = "Support Ticket";
        $data['inbox']=  Message::where('user_id', $auth->id)->whereAdmin(0)->orderBy('created_at','desc')->paginate(7);
         return view('user.ticket', $data);
    }




    public function ticketview($id)
    {
        $auth = Auth::user();
        $data['page_title'] = "Ticket View";
        $data['tickets']=  Message::where('user_id', $auth->id)->whereCode($id)->orderBy('created_at','desc')->get();
        $data['ticket']=  Ticket::where('user_id', $auth->id)->whereCode($id)->first();
        $inbox =  Message::where('user_id', $auth->id)->whereCode($id)->first();
        $inbox->status = 1;
        $inbox->save();
         return view('user.ticket-view', $data);
    }



    public function inboxview($id)
    {
        $auth = Auth::user();
        $data['page_title'] = "Inbox View";
        $data['inbox']=  Message::where('user_id', $auth->id)->whereId($id)->first();
        $inbox =  Message::where('user_id', $auth->id)->whereId($id)->first();
        $data['code'] = strtoupper(Str::random(6));

        $inbox->status = 1;
        $inbox->save();
         return view('user.inbox-view', $data);
    }


    public function inboxdelete($id)
    {
        $auth = Auth::user();
        $data['page_title'] = "Inbox Delete";
        $data['inbox']=  Message::where('user_id', $auth->id)->whereId($id)->first();
        $inbox =  Message::where('user_id', $auth->id)->whereId($id)->first();
         $inbox->delete();
         return back()->with("message", "Message Deleted successfully");
    }



    public function postticket(Request $request)
    {
        $code = strtoupper(Str::random(6));
        $data['user_id'] = Auth::id();
        $data['title'] = $request->subject;
        $data['details'] = $request->body;
        $data['desk'] = $request->desk;
        $data['code'] = $code;
        $data['status'] = 0;
        $data['type'] = 1;
        if($request->hasFile('image'))
        {

         $this->validate($request,
            [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);


        $data['image'] = uniqid().'.jpg';
        $request->image->move('uploads/messages',$data['image']);
        }


        Message::create($data);

        $data1['user_id'] = Auth::id();
        $data1['title'] = $request->subject;
        $data1['details'] = $request->body;
        $data1['desk'] = $request->desk;
        $data1['code'] = $code;
        $data1['status'] = 0;

        Ticket::create($data1);

     return back()->with("success", "Ticket Created successfully");
    }

  public function replyticket(Request $request)
    {

        $auth = Auth::user();
        $ticket =  Ticket::where('user_id', $auth->id)->whereCode($request->code)->first();
        $data['user_id'] = Auth::id();
        $data['title'] = $ticket->title;
        $data['details'] = $request->body;
        $data['desk'] = $ticket->desk;
        $data['code'] = $ticket->code;
        $data['status'] = 0;
        $data['type'] = 1;
        if($request->hasFile('image'))
        {

         $this->validate($request,
            [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);


        $data['image'] = uniqid().'.jpg';
        $request->image->move('uploads/messages',$data['image']);
        }


        Message::create($data);

     return back()->with("success", "Ticket Replied successfully");
    }


    public function usertest()
    {    $data['page_title'] = "Create Testimonial";
         $data['code'] = strtoupper(Str::random(6));
         return view('user.create_testimonial', $data);
    }


    public function posttestimonial(Request $request)
    {
        $data['user_id'] = Auth::id();
        $data['details'] = $request->body;
        $data['code'] = $request->code;
        $data['status'] = 0;

        Testimonial::create($data);

     return back()->with("success", "Your testimonial has been created successfully. Your testimonial will appear on the front page once testimonial is approved");
    }


    public function blockchainwallet($id)
    {
            $basic = GeneralSettings::first();
        if ($basic->blockallow == 0) {
				return back()->with('alert', 'Blockchain feature has been disabled'); }
        $auth = Auth::user();
        $data['page_title'] = "Blockchain Wallet";
        $data['id'] = $id;
        $data['coin'] = Coin::whereId($id)->first();
        $data['wallet'] = Coinwallet::whereCoin_id($id)->whereUser_id($auth->id)->get();
        return view('user.blockhain.index', $data);
     }

      public function createwallet($id)
	{
	    
	     $basic = GeneralSettings::first();
	    if ($basic->blockcreate == 0) {
				return back()->with('alert', 'This feature has been disabled by admin to prevent abuse of our Blcokchain Gateway API.'); }
	
            $basic = GeneralSettings::first();
        if ($basic->blockallow == 0) {
				return back()->with('alert', 'Blockchain feature has been disabled'); }

	    $coin = Coin::find($id);
	    $user = User::find(Auth::id());

	    $gnl = GeneralSettings::first();
    	if ($id == 1){
    	$key = $gnl->dogapi;
    	}
          if ($id == 2){
    	$key = $gnl->ltcapi;
    	}
          if ($id == 3){
    	$key = $gnl->btcapi;
         }


	    $baseUrl = "https://block.io";
        $endpoint = "/api/v2/get_new_address/?api_key=".$key."";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );

            curl_close($ch);

            if($content['status'] == "success") {
                     $response['address'] = $content['data']['address'];
                     $address =  $response['address'];
                     $network = $content['data']['network'];


					$wallet['address'] =  $address;
					$wallet['coin_id'] =  $id;
					$wallet['user_id'] =  Auth::id();
					$wallet['name'] =  $coin->name;
					$wallet['pending'] =  0.00;
					$wallet['balance'] =  0.00;
					Coinwallet::create($wallet);


            return back()->with('success', 'New '.$network.' Wallet Address Has Been Created & Activated.');


            }

            if($content['status']  == "fail") {
                     $response['error_message'] = $content['data']['error_message'];
                     $reply =  $response['error_message'];
            return back()->with('alert', ''.$reply.'');

            }


	}


	   public function viewwallets($id)
    {
             $basic = GeneralSettings::first();
        if ($basic->blockallow == 0) {
				return back()->with('alert', 'Blockchain feature has been disabled'); }

        $user = User::find(Auth::id());
        $wallet = Coinwallet::whereAddress($id)->whereUser_id($user->id)->first();
         $coin = Coin::find($wallet->coin_id);
	    $gnl = GeneralSettings::first();
    	if ($coin->id == 1){
    	$key = $gnl->dogapi;
    	}
          if ($coin->id == 2){
    	$key = $gnl->ltcapi;
    	}
          if ($coin->id == 3){
    	$key = $gnl->btcapi;
         }
         if($wallet->status == 0){

          return back()->with('alert', 'This wallet has been disabled or blocked by the administrator. Contact the admin for support');
         }

        $baseUrl = "https://api.coingate.com/v2";
        $endpoint = "/rates/merchant/BTC/USD";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );

            curl_close($ch);
           $btcrate = $content;

        $baseUrl = "https://block.io";
        $endpoint = "/api/v2/get_address_balance/?api_key=".$key."&addresses=".$id."";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );

            curl_close($ch);

            if($content['status'] == "success") {
             $bal = $content['data']['available_balance'];
             $pend =  $content['data']['pending_received_balance'];
              $wallet['balance'] =  $bal;
              $wallet['pending'] =  $pend;
	          $wallet->save();
	          $network = $content['data']['network'];
	          $address = $content['data']['balances'][0]['address'];

            }
            else { $network = 1;
                    $bal = 0;
                    $pend = 0; }

        $baseUrl = "https://block.io";
        $endpoint = "/api/v2/get_transactions/?api_key=".$key."&type=sent&addresses=".$id."";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $strx = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );
        	curl_close($ch);
        	 if($strx['status'] == "success") {
        	 $count = count($strx['data']['txs']);

        	 if ( $count > 0 ){

        	$date = $strx['data']['txs'][0]['time'];
        	$sdate = date("D,d-M.Y", $date); }
        	else{
        	$sdate =  "00-00-0000 00:00";        	}

            }

        $baseUrl = "https://block.io";
        $endpoint = "/api/v2/get_transactions/?api_key=".$key."&type=received&addresses=".$id."";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $rtrx = json_decode(curl_exec( $ch ),true);
            $trtrx = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );
        	curl_close($ch);
        	 if($rtrx['status'] == "success") {
        	 $count = count($trtrx['data']['txs']);
        	 if ( $count > 0 ){
        	$date = $rtrx['data']['txs'][0]['time'];
        	$rdate = date("D,d-M.Y", $date); }
        	else{
        	$rdate = "00-00-0000 00:00";
        	}
            }
        $rate = 350;

        return view('user.blockhain.wallet', compact('btcrate','address','sdate','rdate','rate','strx','rate','trtrx','rtrx','rnetwork','trx','network','pend','bal','bala','user','wallet', 'coin', 'logs','all','lastra','gnl'));
    }


       public function sendpreview(Request $request)
	{
	         $basic = GeneralSettings::first();
        if ($basic->blockallow == 0) {
				return back()->with('alert', 'Blockchain feature has been disabled'); }
				
				 $basic = GeneralSettings::first();
        if ($basic->blocksend == 0) {
				return back()->with('alert', 'Sending Cryptocurrency has been  feature has been disabled on the system'); }
				
        $gnl = GeneralSettings::first();
        $coin = Coin::find($request->coin);
    	if ($coin->id == 1){
    	$key = $gnl->dogapi;
    	}
          if ($coin->id == 2){
    	$key = $gnl->ltcapi;
    	}
          if ($coin->id == 3){
    	$key = $gnl->btcapi;
         }
        $baseUrl = "https://block.io";
        $endpoint = "/api/v2/get_network_fee_estimate/?api_key=".$key."&amounts=".$request->amount."&to_addresses=".$request->toid."";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );

            curl_close($ch);

             if($content['status']  == "fail") {
             $response['error_message'] = $content['data']['error_message'];
             $reply =  $response['error_message'];
             return back()->with('alert', ''.$reply.'');

            }

            if($content['status'] == "success") {
            $response['estimated_network_fee'] = $content['data']['estimated_network_fee'];
            $network = $content['data']['network'];
            $response['estimated_tx_size'] = $content['data']['estimated_tx_size'];
            $fee =  $response['estimated_network_fee'];
            $size =  $response['estimated_tx_size'];
             }
             $amount = $request->amount;
             $receiver = $request->toid;
             $sender = $request->sender;
             $user = User::find(Auth::id());
           return view('user.blockhain.preview-send', compact('id','network','size','user','prior','logo','fee','amount','receiver','sender','coin'));


	}



		 public function sendcoin(Request $request)
    {
             $basic = GeneralSettings::first();
        if ($basic->blockallow == 0) {
				return back()->with('alert', 'Blockchain feature has been disabled'); }
				
				     $basic = GeneralSettings::first();
        if ($basic->blocksend == 0) {
				return back()->with('alert', 'Sending Cryptocurrency has been  feature has been disabled on the system'); }
				
        $gnl = GeneralSettings::first();
        $coin = Coin::find($request->coin);
    	if ($coin->id == 1){
    	$key = $gnl->dogapi;
    	}
          if ($coin->id == 2){
    	$key = $gnl->ltcapi;
    	}
          if ($coin->id == 3){
    	$key = $gnl->btcapi;
         }

        $pin = $gnl->apikey;
        $version = 2;
        $block_io = new BlockIo($key, $pin, $version);

        $user = User::find(Auth::id());

        $fee = $block_io->get_network_fee_estimate(array('amounts' => $request->amount, 'to_addresses' => $request->toid));

        $tranfee = $fee->data->estimated_network_fee;

        $total =  $tranfee + $request->amount;

          $block_io->withdraw_from_addresses(array('amounts' => $request->amount, 'from_addresses' =>  $request->sender, 'to_addresses' => $request->toid));

            session()->flash('success', 'Coin Sent Successfully. ');

         return redirect()->route('home');


        }



        public function walletsent($id)
    {
             $basic = GeneralSettings::first();
        if ($basic->blockallow == 0) {
				return back()->with('alert', 'Blockchain feature has been disabled'); }
        $user = User::find(Auth::id());
        $gnl = GeneralSettings::first();
        $wallet = Coinwallet::whereUser_id($user->id)->whereAddress($id)->first();
        $coin = Coin::find($wallet->coin_id);
    	if ($coin->id == 1){
    	$key = $gnl->dogapi;
    	}
          if ($coin->id == 2){
    	$key = $gnl->ltcapi;
    	}
          if ($coin->id == 3){
    	$key = $gnl->btcapi;
         }

        $baseUrl = "https://block.io";
        $endpoint = "/api/v2/get_transactions/?api_key=".$key."&type=sent&addresses=".$id."";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $trx = json_decode(curl_exec( $ch ),true);
            $strx = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );
        	curl_close($ch);
        	 if($trx['status'] == "success") {
        	$response['txs'] = $trx['data']['txs'];
        	$network = $trx['data']['network'];
        	$count = count($trx['data']['txs']);

            }

             return view('user.blockhain.sent', compact('count','strx','rate','trtrx','rtrx','trx','network','pend','bal','bala','user','wallets', 'coin', 'logs','all','lastra','gnl'));
    }


       public function walletreceived($id)
    {
             $basic = GeneralSettings::first();
        if ($basic->blockallow == 0) {
				return back()->with('alert', 'Blockchain feature has been disabled'); }
        $user = User::find(Auth::id());
        $gnl = GeneralSettings::first();
        $wallet = Coinwallet::whereUser_id($user->id)->whereAddress($id)->first();
        $coin = Coin::find($wallet->coin_id);
    	if ($coin->id == 1){
    	$key = $gnl->dogapi;
    	}
          if ($coin->id == 2){
    	$key = $gnl->ltcapi;
    	}
          if ($coin->id == 3){
    	$key = $gnl->btcapi;
         }
        $baseUrl = "https://block.io";
        $endpoint = "/api/v2/get_transactions/?api_key=".$key."&type=received&addresses=".$id."";
        $httpVerb = "GET";
        $contentType = "application/json"; //e.g charset=utf-8
        $headers = array (
            "Content-Type: $contentType",

        );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $baseUrl.$endpoint);
            curl_setopt($ch, CURLOPT_HTTPGET, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $trx = json_decode(curl_exec( $ch ),true);
            $strx = json_decode(curl_exec( $ch ),true);
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );
        	curl_close($ch);
        	 if($trx['status'] == "success") {
        	$response['txs'] = $trx['data']['txs'];
        	$network = $trx['data']['network'];
        	$count = count($trx['data']['txs']);

            }


        return view('user.blockhain.received', compact('count','strx','rate','trtrx','rtrx','rnetwork','trx','network','pend','bal','bala','user','wallets', 'coin', 'logs','all','lastra','gnl'));
    }





}
