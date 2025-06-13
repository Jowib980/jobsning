@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" style="float: right; font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;border: none;" data-dismiss="alert">×</button>
        <strong>{!! clean($message) !!}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" style="float: right; font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;border: none;" data-dismiss="alert">×</button>
        <strong>{!! clean($message) !!}</strong>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" style="float: right; font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;border: none;" data-dismiss="alert">×</button>
        <strong>{!! clean($message) !!}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" style="float: right; font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;border: none;" data-dismiss="alert">×</button>
        <strong>{!! clean($message) !!}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" style="float: right; font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;border: none;" data-dismiss="alert">×</button>
        <strong>{!! clean($message) !!}</strong>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" style="float: right; font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;border: none;" data-dismiss="alert">×</button>
        {{__("Please check the form below for errors")}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! clean($error) !!}</li>
            @endforeach
        </ul>
    </div>
@endif
