

@extends('layout.layout')
@section('title')
    {{ translate('Currency') }}
@endsection
@section('content')


<div class="d-flex justify-content-between">
    <div class="d-flex">
        <a href="{{ route('settings.index') }}" class="fe-edit fa-2x"></a>
        <h2 class="panelUprText">{{ translate('Translation') }}</h2>
    </div>
</div>

<div class="card-header row gutters-5">
    <div class="col text-center text-md-left">
        <h5 class="mb-md-0 h6">{{ $language->name }}</h5>
        {{-- @dd($language->code) --}}
    </div>
    <div class="col-md-4">
        <form class="" id="sort_keys" action="" method="GET">
            <input type="hidden" id="language_code" value="{{ $language->code }}">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" id="search"
                    name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset
                    placeholder="{{ translate('Type key & Enter') }}">
            </div>
        </form>
    </div>
</div>


<form class="form-horizontal" action="{{ route('translation.save') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $language->id }}">
    <div class="sozdatPerveodMini">
        <div class="checkboxDivInput">
            №
        </div>

        <div class="d-flex" style="width: 100%;">
            <div class="checkboxDivPerewvod">
                {{ translate('Key') }}
            </div>
            <div class="checkboxDivPerewvod">
                {{ translate('Translation') }}
            </div>
        </div>
    </div>

    @php
       $i = 1;
    @endphp
    @foreach ($lang_keys as $key => $translation)
        <div class="sozdatPerveodMini2">
            <div class="checkboxDivInput">
                @php
                echo $i++;
                @endphp
            </div>
            <div class="d-flex" style="width: 100%;">
                <div class="checkboxDivPerewvod key" id="google_translate">
                    {{ $translation->lang_key }}
                </div>
                <input type="text" class="checkboxDivPerewvod value" id="input"
                        style="width:100%" name="values[{{ $translation->lang_key }}]"
                        @if (($traslate_lang = \App\Models\Translation::where('lang', $language->code)->where('lang_key', $translation->lang_key)->first()) != null) value="{{ $traslate_lang->lang_value }}" @endif>
                {{-- <input type="text" value="Default Language" class="checkboxDivPerewvod"> --}}
            </div>
        </div>
    @endforeach

    {{-- <div>
        <div class="aiz-pagination" >
            {{ $lang_keys->links() }}
        </div>
    </div> --}}
    <div class="row ">
        <div class="col-xl-6 col-md-6">
 
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="form-group mt-2 text-right">
                <button type="button" class="btn btn-primary"
                    onclick="copyTranslation()">{{ translate('Copy Translations') }}</button>
                <button type="submit" class="btn btn-primary">{{ translate('Save') }}</button>
            </div>
        </div>
    </div>
</form>

    <script type="text/javascript">
        function copyTranslation() {
            $('.key').each(function(index) {
                console.log($(this).text());
                // var key=document.getElementsByClassName("checkboxDivPerewvod").inner;
                // console.log(key);
                // console.log();

                // $(tr).find('.value').val($(tr).find('.key').text());
                var _this = $(this)

                $.post('{{ route('languages.update_value') }}', {
                    _token: '{{ csrf_token() }}',
                    id: index,
                    code: document.getElementById("language_code").value,
                    status: $(this).text()
                }, function(data) {
                    console.log(data);
                    const tsestQ = document.getElementsByClassName("value");
                    // tsestQ.value=data;
                    // console.log(tsestQ);
                    _this.siblings('.value').val(data);
                    // $('.value').val(data);

                });
            });
        }

        function sort_keys(el) {
            $('#sort_keys').submit();
        }
    </script>

@endsection

