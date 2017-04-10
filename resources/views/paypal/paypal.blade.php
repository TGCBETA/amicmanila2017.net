@extends('layout.main')

@section('title')

@stop

@section('head')

@stop

@section('content')
<?php 
    $currency_code = 'USD';
    if(session('single_reg.reg_info')['currency'] == 'P')
        $currency_code = 'PHP';
?>

<div class="bg-white padding page-content" style="padding-top:10%;">
    <div>
        <h1 class="text-center">
            Please wait...<br />
            <small>
                You will be redirected to paypal shortly.
            </small>
        </h1>
    </div>
</div>
    <form id = "paypal_checkout" action = "https://www.paypal.com/cgi-bin/webscr" method = "post" style="display: none;">
        <input name = "cmd" value = "_cart" type = "hidden">
        <input name = "upload" value = "1" type = "hidden">
     
        <input name = "business" value = "info@amic.asia" type = "hidden">
        <input name = "currency_code" value = "{{ $currency_code }}" type = "hidden">
        <input name = "return" value = "{{ route('return-process-paypal') }}" type = "hidden">
        <input name = "cbt" value = "Return AMIC Website" type = "hidden">
        <input name = "cancel_return" value = "{{ route('cancel-process-paypal') }}" type = "hidden">
        <input name = "notify_url" value = "{{ route('paypal-postback') }}" type = "hidden">
        <input name = "custom" value = "{{ session('single_reg.id') }}" type = "hidden">
        <input name = "first_name" value = "{{ session('single_reg.reg_info')['firstname'] }}" type = "hidden">
        <input name = "last_name" value = "{{ session('single_reg.reg_info')['lastname'] }}" type = "hidden">
        <input name = "email" value = "{{ session('single_reg.reg_info')['email'] }}" type = "hidden">
        <input name = "address1" value = "{{ session('single_reg.reg_info')['address1'] }}" type = "hidden">
        <input name = "city" value = "{{ session('single_reg.reg_info')['city'] }}" type = "hidden">
        <input name = "state" value = "{{ session('single_reg.reg_info')['province'] }}" type = "hidden">
        <input name = "zip" value = "{{ session('single_reg.reg_info')['zipcode'] }}" type = "hidden">
        <input name = "country" value = "{{ session('single_reg.reg_info')['country'] }}" type = "hidden">
        <input type="hidden" name="landing_page" value="Billing" />
     
        <div id = "item_1" class = "itemwrap">
            <input name = "item_name_1" value = "AMIC 25th Annual Conference Registration Fee" type = "hidden">
            <input name = "quantity_1" value = "1" type = "hidden">
            <input name = "amount_1" value = "{{ session('single_reg.reg_info')['total_fee'] }}" type = "hidden">
            <input name = "shipping_1" value = "0" type = "hidden">
        </div>
        <input id = "ppcheckoutbtn" value = "Checkout" class = "button" type = "submit">
    </form>

@stop

@section('script')
    <script type="text/javascript">
        $('#paypal_checkout').submit();
    </script>
@stop








    