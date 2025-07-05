<?php

namespace App\Http\Controllers;

use App\BookAppointment;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $data = [];
        $data['items'] = [
            [
                'name' => $request->doctor_name ?? '',
                'price' => $request->appointment_fees ?? '',
                'desc'  => 'Doctor Payment Fee',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
//        if($data['return_url']){
//            $bookAppointment = BookAppointment::where('id',$request->appointment_id)->update([
//                'paypal_id'=>1,
//                'fees' => $request->appointment_fees,
//                'status'=>'paid',
//            ]);
//        }
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $request->appointment_fees  ?? '';

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);


        return redirect($response['paypal_link']);
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
//        return $request->all();
        $provider = new ExpressCheckout;  // Instantiate the provider inside this method

      $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return redirect(url('patient_appointments'))->with(['type'=>'success','title'=>'Done!','message'=>'Your payment was successfully']);
        }

        dd('Something is wrong.');
    }
}
