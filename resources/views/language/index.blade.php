@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    


    <a href="{{ route('settings.index') }}"></a>

    
    <form class="form-horizontal" action="{{ route('env_key_update.update') }}" method="POST">
        @csrf
        <div class="d-flex">
            <h2 class="">{{ translate('Default language') }}</h2>
            <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
            <select class="" id="country" name="DEFAULT_LANGUAGE">
                @foreach ($languages as $key => $language)
                    <option value="{{ $language->code }}" <?php if (env('DEFAULT_LANGUAGE') == $language->code) {
                        echo 'selected';
                    } ?>>
                        {{ $language->name }}
                    </option>
                @endforeach
            </select>


            {{-- <select class="yazikHeader" id="country" name="country">
                <option>{{ translate('English') }}</option>
                <option>{{ translate('Uzbek') }}</option>
                <option>{{ translate('Russian') }}</option>
            </select> --}}

            <button class="">{{ translate('Save') }}</button>
        </div>



    </form>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Table head options</h4>

                    <div class="table-responsive">
                        <table class="table mb-0" style="text-align:center !important">
                            <thead class="table-light">
                            <tr>
                                <th scope="row">№</th>
                                <td>{{ translate('Language') }}</td>
                                <td>{{ translate('Code') }}</td>
                                <td>{{ translate('Action') }}</td>
                            </tr>
                            </thead>
                            <tbody class="text-align:center !important">
                                @empty(!$languages)
                                    @php
                                        $i = 1;
                                    @endphp

                                    @foreach ($languages as $value)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td> {{ $value->name }}</td>
                                        <td>{{ $value->code }}</td>
                                        <td>
                                            <a href="{{ route('language.show', encrypt($value->id)) }}"
                                                title="{{ translate('Translation') }}" class="fa fa-language fa-2x" >
                                                {{-- <i class="fa fa-language fa-2x" aria-hidden="true"></i> --}}
                                                {{-- <i class="fe-edit"> --}}
                                            </a>
                                            <a href="{{ route('language.edit', encrypt($value->id)) }}" class="fe-edit fa-2x" 
                                               style="margin-left: 15px"> 
                                                {{-- <i class="fe-edit"> --}}
                                            </a>
                                            @if ($value->code != 'en')
                                                <a href="{{ route('language.destroy', encrypt($value->id)) }}" class="fe-trash-2 fa-2x">
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                @endempty
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        

        </div>

        
    </div>


    {{-- Your page content --}}

@endsection

