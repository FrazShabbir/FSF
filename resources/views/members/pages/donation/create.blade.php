@extends('members.main')
@section('title', 'Dashboard')

@section('styles')
@endsection

@push('css')
@endpush

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        Donation Form
                    </div>
                    <div class="card-body ">
                        <div>
                            <table class="table mt-5 mb-5">
                                <tbody>
                                
                                    <tr>
                                        <td class="font-weight-bold">
                                            Application ID
                                        </td>
                                        <td class="text-right" id="app_id">
                                            ----------
                                        </td>
                                    </tr>
                                 
                                    <tr>
                                        <td class="font-weight-bold">
                                            Donation Category:
                                        </td>
                                        <td class="text-right">
                                            Application Donation
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Beneficiary Bank Name:
                                        </td>
                                        <td class="text-right" id="fsf_bank_name">
                                            ----------
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" >
                                            Beneficiary Bank AC No.
                                        </td>
                                        <td class="text-right" id="fsf_bank_no">
                                            000000000
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mb-5">
                                <form action="{{route('member.donation.store')}}" method="POST" enctype="multipart/form-data">
                                    {{-- @method('POST') --}}
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 pl-5">
                                            <div class="form-group">
                                                <label>FSF account:</label>
                                                <select name="fsf_bank_id" id="fsf_bank_id" class="form-control" required>
                                                    <option value="" selected>Select Bank</option>

                                                    @foreach ($accounts as $account)
                                                        <option value="{{ $account->id }}" >
                                                            {{ $account->name }} - {{ $account->account_number }}
                                                        </option>
                                                        <span id="id_option_{{ $account->id }}" meta-name="{{ $account->name }}"  meta-bank="{{ $account->bank }}"  meta-city="{{ $account->city }}" meta-account_number="{{ $account->account_number }}"></span>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @foreach ($accounts as $account)
                                        
                                        <span id="id_option_{{ $account->id }}" meta-name="{{ $account->name }}"  meta-bank="{{ $account->bank }}"  meta-city="{{ $account->city }}" meta-account_number="{{ $account->account_number }}"></span>
                                    @endforeach
                                        <div class="col-md-6 pr-5">
                                            <div class="form-group">
                                                <label>Application ID</label>
                                                <select name="application_id" id="change_app" class="form-control" required>
                                                    <option value="" selected>Select Application</option>
                                                    @foreach ($applications as $application)
                                                        <option value="{{ $application->application_id }}"> {{ $application->full_name }} - {{ $application->application_id }} - {{ $application->passport_number }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                {{-- <input type="text" class="form-control" name="application_id"
                                                    placeholder="Application ID" readonly value="{{auth()->user()->application->application_id}}">
                                            --}}
                                                </div>
                                        </div>

                                    </div>
                                    <div class="row">


                                        <div class="col-md-6 pl-5">
                                            <div class="form-group">
                                                <label>Doner Bank Name:</label>
                                                <input type="text" class="form-control" name="donor_bank_name"
                                                    placeholder="Funeral Servies Anual Donation" value="{{old('donor_bank_name')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-5">
                                            <div class="form-group">
                                                <label>Doner Bank AC No.</label>
                                                <input type="text" class="form-control" name="donor_bank_no"
                                                    placeholder="2374983274890" value="{{old('donor_bank_no')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pl-5">
                                            <label>Donation Amount:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">€</span>
                                                </div>
                                                <input type="number" step="0.01" class="form-control" name="amount" placeholder="250" value="{{old('amount')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-5">
                                            <div class="form-group">
                                                <label>Donation Date:</label>
                                                <input type="date" class="form-control" name="donation_date"
                                                    placeholder="22-12-2022" value="{{old('donation_date')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 px-5">
                                            <div class="form-group">
                                                <label for="">Upload Receipt</label>
                                                <input type="file" id="image-input" name="receipt"
                                                    accept="image/jpeg, image/png, image/jpg" required>
                                                <div id="display-image"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 px-5">
                                            <div class="px-3">
                                                <p class="font-weight-bold text-danger mb-0">Note:</p>
                                                <div>
                                                    <p class="mb-0">You can not donate from kid's personal amount.</p>
                                                    <p class="text-right">آپ نابالغ بچے کی ذاتی رقم سے ڈونیٹ نہیں کر سکتے.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
@endsection

@push('js')
    <script>
        const image_input = document.querySelector("#image-input");
        image_input.addEventListener("change", function() {
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                const uploaded_image = reader.result;
                document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);
        });

        $('#change_app').change(function(){
            var app_id = $('#change_app').find(":selected").val();
            $('#app_id').text(app_id);
        })

        $('#fsf_bank_id').change(function(){
            var bank_id = $('#fsf_bank_id').find(":selected").val();
            var bank_name = $('#id_option_'+bank_id).attr('meta-name');
            var bank_city = $('#id_option_'+bank_id).attr('meta-city');
            var account_number = $('#id_option_'+bank_id).attr('meta-account_number');

            $('#fsf_bank_name').text(bank_name);
            $('#fsf_bank_no').text(account_number);
        })

    </script>

@endpush
