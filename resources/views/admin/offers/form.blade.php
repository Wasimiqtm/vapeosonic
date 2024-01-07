
<div class="row">            
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} Offers</header>
            <div class="panel-body">
                <div class="position-center">                                                                                                              
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Offer Name', ['class' => 'col-lg-3 col-sm-3 control-label required-input']) !!}
                    <div class="col-lg-9">
                        {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Offer Name','required' => 'required']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                    <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Product Quantity', ['class' => 'col-lg-3 col-sm-3 control-label required-input']) !!}
                        <div class="col-lg-9">
                            {!! Form::number('quantity', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Product Quantity',
                                'min' => 0,
                                'step' => 'any',
                                'required' => 'required',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Offer Price/Unit', ['class' => 'col-lg-3 col-sm-3 control-label required-input']) !!}
                        <div class="col-lg-9">
                            {!! Form::number('price', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Offer Price',
                                'min' => 0,
                                'step' => 'any',
                                'required' => 'required',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('reward_points') ? 'has-error' : ''}}">
                        {!! Form::label('name', 'Reward Points', ['class' => 'col-lg-3 col-sm-3 control-label required-input']) !!}
                        <div class="col-lg-9">
                            {!! Form::number('reward_points', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Reward Points',
                                'min' => 0,
                                'step' => 'any',
                                'required' => 'required',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                        {!! Form::label('name', 'Status', ['class' => 'col-lg-3 col-sm-3 control-label required-input']) !!}
                        <div class="col-lg-9">
                            {!! Form::select('status', ['active' => 'Active', 'inactive' => 'In-Active'], null, [
                            'class' => 'form-control',
                            'required' => 'required',
                        ]) !!}
                            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>




                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-info pull-right']) !!}
                    </div>
                </div>
                </div>
            </div>
        </section>

    </div>
</div>


@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
@endsection