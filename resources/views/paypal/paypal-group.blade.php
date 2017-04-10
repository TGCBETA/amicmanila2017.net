@extends('layout.main')

@section('title')

@stop

@section('head')

@stop

@section('content')
<?php 
    $currency_code = 'USD';
    if(session('group_reg.currency') == 'P')
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
    <form id = "paypal_checkout" action = "https://www.sandbox.paypal.com/cgi-bin/webscr" method = "post" style="display: none;">
        <input name = "cmd" value = "_cart" type = "hidden">
        <input name = "upload" value = "1" type = "hidden">
     
        <input name = "business" value = "r.tuazon-facilitator@amic.asia" type = "hidden">
        <input name = "currency_code" value = "{{ $currency_code }}" type = "hidden">
        <input name = "return" value = "{{ route('return-process-paypal') }}" type = "hidden">
        <input name = "cbt" value = "Return AMIC Website" type = "hidden">
        <input name = "cancel_return" value = "{{ route('cancel-process-paypal') }}" type = "hidden">
        <input name = "notify_url" value = "{{ route('paypal-postback-group') }}" type = "hidden">
        <input name = "custom" value = "{{ session('group_reg.id') }}" type = "hidden">
        <input name = "email" value = "{{ session('group_reg.group_email') }}" type = "hidden">
        <input name = "country" value = "{{ session('group_reg.country') }}" type = "hidden">
        <input type="hidden" name="landing_page" value="Billing" />
     
        <div id = "item_1" class = "itemwrap">
            <input name = "item_name_1" value = "AMIC 25th Annual Conference Registration Fee" type = "hidden">
            <input name = "quantity_1" value = "1" type = "hidden">
            <input name = "amount_1" value = "{{ session('group_reg.total_fee') }}" type = "hidden">
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








    