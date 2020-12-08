<?php

namespace App\Http\Controllers;

use App\Admin;
use App\BuyMoney;
use App\ExchangeMoney;
use App\Provider;
use App\SellMoney;
use App\Message;
use App\Trx;
use App\User;
use App\Lib\BlockIo;
use Illuminate\Http\Request;
use Auth;
use App\Coinmarket;
use App\Coinmarketpay;
use App\GeneralSettings;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use File;
use Image;
class MarketController extends Controller
{
	public function __construct(){
		$Gset = GeneralSettings::first();
		$this->sitename = $Gset->sitename;
		$this->middleware('auth:admin');
	}



    public function activeoffer()
    {
        $data['market'] = Coinmarket::where('status', '=',1)->latest()->get();
        $data['page_title'] = 'Active Market';
        return view('admin.market.market', $data);
	}


    public function inactiveoffer()
    {
        $data['market'] = Coinmarket::where('status', '=',0)->latest()->get();
        $data['page_title'] = 'Inactive Market';
        return view('admin.market.market', $data);
	}


    public function actdeal($id)
    {    $market = Coinmarket::whereId($id)->first();
          $market->status = 1;
          $market->save();
          return back()->with('success', 'Market Offer Has Been Activated Successfully');

    }

     public function deactdeal($id)
    {    $market = Coinmarket::whereId($id)->first();
          $market->status = 0;
          $market->save();
          return back()->with('success', 'Market Offer Has Been Deactivated Successfully');

    }

       public function dealapp($id)
    {    $market = Coinmarketpay::whereId($id)->first();
          $market->paid = 1;
          $market->save();
           $basic = GeneralSettings::first();

            Message::create([
                    'user_id' => $market->seller,
                    'title' => 'Payment Made',
                    'details' => 'Your '.$market->marketcode.'  market deal with transaction number '.$market->trx.' has been approved by the admin and fund disbursed to your account  We hope you love trading with us, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);


          return back()->with('success', 'Market Deal Has Been Verified and User Has Been Paid Successfully');

    }


       public function dealrej($id)
    {    $market = Coinmarketpay::whereId($id)->first();
          $market->paid = 2;
          $market->save();

            $basic = GeneralSettings::first();

            Message::create([
                    'user_id' => $market->seller,
                    'title' => 'Deal Rejected By Admin',
                    'details' => 'Your '.$market->marketcode.'  market deal with transaction number '.$market->trx.' has been rejected by the admin. Please send us a message if you feel this is wrong , Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);


          return back()->with('success', 'Market Deal Has Been Rejected and User Has Been Notified Successfully');

    }


      public function deldeal($id)
    {    $market = Coinmarket::whereId($id)->first();

          $market->delete();
          return back()->with('success', 'Market Offer Has Been Deleted Successfully');

    }


    public function orderpend()
    {
        $data['market'] = Coinmarketpay::where('paid', '=',0)->latest()->paginate(10);
        $data['page_title'] = 'Pending Market Order';
        return view('admin.market.payment', $data);
	}


    public function viewdeal($id)
    {
        $data['data'] = Coinmarketpay::whereId($id)->first();
        $data['page_title'] = 'View Market Order';
        return view('admin.market.view', $data);
	}


    public function orderprocessed()
    {
        $data['market'] = Coinmarketpay::where('paid', '=',1)->latest()->paginate(10);
        $data['page_title'] = 'Processed Market Order';
        return view('admin.market.payment', $data);
	}


    public function orderrej()
    {
        $data['market'] = Coinmarketpay::where('paid', '=',2)->latest()->paginate(10);
        $data['page_title'] = 'Declined Market Order';
        return view('admin.market.payment', $data);
	}


    public function buyLog()
    {
        $data['exchange'] = Trx::whereStatus(2)->whereType(1)->latest()->get();
        $data['page_title'] = 'Processed Purchase';
        return view('admin.currency.buy-list', $data);
    }
    public function pendingbuyLog()
    {
        $data['exchange'] = Trx::whereStatus(1)->whereType(1)->latest()->get();
        $data['page_title'] = 'Pending Purchase';
        return view('admin.currency.buy-list', $data);
    }
    public function declinedbuyLog()
    {
        $data['exchange'] = Trx::whereStatus(-2)->whereType(1)->latest()->get();
        $data['page_title'] = 'Declined Purchase';
        return view('admin.currency.buy-list', $data);
    }
    public function buyInfo($id)
    {
        $get = Trx::where('id',$id)->where('status','!=',0)->first();
        if($get)
        {
            $data['exchange'] = $get;
            $data['page_title'] = ' Buy Log Details';
            return view('admin.currency.buy-info', $data);
        }
        abort(404);
    }

    public function buyapprove($id)
    {
        $data = Trx::find($id);
        $basic = GeneralSettings::first();
              $data->status= 2;

        $data->save();
         Message::create([
                    'user_id' => $data->user_id,
                    'title' => 'Coin Purchase Approved',
                    'details' => 'Your cryptocurrency purchase with transaction number '.$data->trx.'  was approved. Your account has been credited as required, Thank you for choosing '.$basic->sitename.'',
                    'admin' => 1,
                    'status' =>  0
                ]);



        $notification =  array('message' => 'Approved Successfully !!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function buyreject(Request $request)
    {

        $data = Trx::find($request->id);
        $basic = GeneralSettings::first();
        $user = User::findOrFail($data->user_id);



                      Message::create([
                    'user_id' => $data->user_id,
                    'title' => 'Purchase Rejected',
                    'details' => 'Your cryptocurrency purchase with transaction number '.$data->trx.' was rejected. Please send us a message for complaints or clarifications on purchase rejection',
                    'admin' => 1,
                    'status' =>  0
                ]);

                $msg =  ' Buy Declined ' . $data->main_amo . ' ' . $basic->currency;
                send_email($user->email, $user->username, 'Buy Amount return ', $msg);

                 $data->status= -2;

                  $data->save();

        $notification =  array('message' => 'Cryptocurrency Purchase Was Rejected Successfully !!', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function sellLog()
    {
        $data['exchange'] = Trx::whereStatus(2)->whereType(0)->latest()->get();
        $data['page_title'] = 'Processed Sales';
        return view('admin.currency.sell-list', $data);
    }
    public function pendingsellLog()
    {
        $data['exchange'] = Trx::whereStatus(1)->whereType(0)->latest()->get();
        $data['page_title'] = 'Pending Sales';
        return view('admin.currency.sell-list', $data);
    }
    public function declinedsellLog()
    {
        $data['exchange'] = Trx::whereStatus(-2)->whereType(0)->latest()->get();
        $data['page_title'] = 'Declined Sales';
        return view('admin.currency.sell-list', $data);
    }
    public function sellInfo($id)
    {
        $get = Trx::where('id',$id)->where('status','!=',0)->first();
        if($get)
        {
            $data['exchange'] = $get;
            $data['page_title'] = ' Sell Log Details';
            return view('admin.currency.sell-info', $data);
        }
        abort(404);
    }

    public function sellapprove($id)
    {

        $data = Trx::find($id);
        $basic = GeneralSettings::first();
        $data->status= 2;

                     Message::create([
                    'user_id' => $data->user_id,
                    'title' => 'Sales Approved',
                    'details' => 'Your cryptocurrency sales with transaction number '.$data->trx.' has been approved. You fund has been credited to your account as required. Thank you for choosing us',
                    'admin' => 1,
                    'status' =>  0
                ]);

                $user = User::find($data->user_id);
                $msg =  ' Sell Amount  ' . $data->get_amount . ' ' . $basic->currency;
                send_email($user->email, $user->username, 'Sell Amount  ', $msg);

        $data->save();

        $notification =  array('message' => 'Sales Approved Successfully !!', 'alert-type' => 'success');
        return back()->with($notification);
    }


 public function sellreject($id)
    {

        $data = Trx::find($id);
        $basic = GeneralSettings::first();

                     Message::create([
                    'user_id' => $data->user_id,
                    'title' => 'Sale Rejected',
                    'details' => 'Your cryptocurrency sales was rejected. Please send us a message to facilitate a refund if your money is not refunded in 24hours',
                    'admin' => 1,
                    'status' =>  0
                ]);

           $data->status= -2;
          $data->save();

        $notification =  array('message' => 'Rejected Successfully !!', 'alert-type' => 'success');
        return back()->with($notification);
    }



	public function socialLogin()
    {
        $data['page_title'] = 'Manage Social Login';
        $data['providers'] = Provider::all();
        return view('admin.social-login.index', $data);
    }

    public function socialLoginUpd(Request $request)
    {
        $data =  Provider::find($request->id);
        $data->client_id =  $request->name;
        $data->client_secret =  $request->account;
        $data->save();

        $notification =  array('message' => 'Updated Successfully !!', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function dashboard()
    {
        $data['page_title'] = 'DashBoard';
        return view('admin.dashboard', $data);
    }


    public function changePassword()
    {
        $data['page_title'] = "Change Password";
        return view('admin.change_password',$data);
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $user = Auth::guard('admin')->user();

        $oldPassword = $request->old_password;
        $password = $request->new_password;
        $passwordConf = $request->password_confirmation;

        if (!Hash::check($oldPassword, $user->password) || $password != $passwordConf) {
            $notification =  array('message' => 'Password Do not match !!', 'alert-type' => 'error');
            return back()->with($notification);
        }elseif (Hash::check($oldPassword, $user->password) && $password == $passwordConf)
        {
            $user->password = bcrypt($password);
            $user->save();
            $notification =  array('message' => 'Password Changed Successfully !!', 'alert-type' => 'success');
            return back()->with($notification);
        }
    }


    public function profile()
    {
        $data['admin'] = Auth::user();
        $data['page_title'] = "Profile Settings";
        return view('admin.profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $data = Admin::find($request->id);
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|max:50|unique:admins,email,'.$data->id,
            'mobile' => 'required',
        ]);

        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'admin_'.time().'.jpg';
            $location = 'assets/admin/img/' . $filename;
            Image::make($image)->resize(300,300)->save($location);
            $path = './assets/admin/img/';
            File::delete($path.$data->image);
            $in['image'] = $filename;
        }
        $data->fill($in)->save();

        $notification =  array('message' => 'Admin Profile Update Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }


    public function blockchainwallet($id)
    {
        $auth = Auth::user();
        $data['page_title'] = "Blockchain Wallet";
        $data['id'] = $id;
        $data['coin'] = Coin::whereId($id)->first();
        $data['wallet'] = Coinwallet::whereCoin_id($id)->whereUser_id($auth->id)->get();
        return view('user.blockhain.index', $data);
     }

      public function createwallet($id)
	{

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

        $user = User::find(Auth::id());
        $wallet = Coinwallet::whereAddress($id)->first();
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
        $block_io = new BlockIo($apiKey, $pin, $version);

        $user = User::find(Auth::id());

        $fee = $block_io->get_network_fee_estimate(array('amounts' => $request->amount, 'to_addresses' => $request->toid));

        $tranfee = $fee->data->estimated_network_fee;

        $total =  $tranfee + $request->amount;

          $block_io->withdraw_from_addresses(array('amounts' => $request->amount, 'from_addresses' =>  $request->coin, 'to_addresses' => $request->toid));

            session()->flash('success', 'Coin Sent Successfully. ');

         return redirect()->route('home');


        }



        public function walletsent($id)
    {
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








    public function logout()    {
		Auth::guard('admin')->logout();
		session()->flash('message', 'Just Logged Out!');
		return redirect('/admin');
	}

}
