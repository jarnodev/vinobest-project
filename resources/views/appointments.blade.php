@extends('layouts.app')

@section('appointments', 'active')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="pb-2 mb-3 border-bottom">
                <h2>{{ __('Inschrijven wijnproeverijen') }}</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="datePicker">Datum</label>
                            <input class="date form-control" type="date" id="datePicker" name="date">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#datePicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
</script>
@endsection
