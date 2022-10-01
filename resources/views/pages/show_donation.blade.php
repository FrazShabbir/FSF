@extends('backend.main')
@section('title', 'Page')

@section('styles')
@endsection

@push('css')
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #000;
}
tbody{
    width: 100%;
}
.doc-bg-img{
    position: absolute;
    top: 40%;
    left: 35%;
    width: 20%;
    z-index: 1;
    opacity: 0.3;
}
.outer-border{
    border: 1px dashed #1F3D73;
    padding: 3px;
    border-radius: 5px;
}
.main-border{
    border: 4px solid #135229;
    border-radius: 5px;
}
.dawat-islami-green-color{
    color: #135229;
}
.badge-APPROVED{
    background: #135229;
    color: #fff;
}
@media only screen and (max-width: 767px){
    .voucher-logo{
        margin: 0 auto;
    }
    .main-border{
        border: none;
    }
}
</style>
@endpush



@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="iq-card p-3" style="z-index: -1;">
                    <div class="outer-border">
                        <div class="main-border">
                            <div class="iq-card-header" style="z-index: 99;">
                                <div class="row mt-2">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="">
                                            <p>
                                                Date & Time: <span>12-05-2022 _ 22:00 CET</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start justify-content-md-end justify-content-lg-end">
                                        <div class="">
                                            <p>
                                                Created by (UserID): <span>JAWAD AHMAD</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="ml-lg-4 ml-md-4 mb-3 mb-lg-0 mb-md-0">
                                            <img class="voucher-logo d-flex justify-content-center justify-content-md-start justify-content-lg-start" src="{{asset('frontend/images/fsf-logo.png')}}" width="100px" alt="DawatIslami Logo">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="text-center">
                                            <p class="mb-0"><i>Funeral Services Fund</i></p>
                                            <h2 class="mb-0 font-weight-bolder dawat-islami-green-color"><u>Donation Receipt</u></h2>
                                            <p class="text-uppercase"><b>Dawateislami</b></p>
                                            <p class="">
                                                <span class="badge badge-APPROVED">
                                                    Approved
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body"  style="z-index: 99;">
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="">
                                                <p>
                                                    <b>
                                                        Receipt No.
                                                    </b>
                                                    <span>
                                                        EU/CIV/220500001
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="text-left text-lg-right text-md-right">
                                                <p>
                                                    <b>
                                                        Receipt Date:
                                                    </b>
                                                    <span>
                                                        12/05/2022
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <h4 class="mb-2 font-weight-bold">
                                                Donor Details:
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <table class="table">
                                                <tr>
                                                  <th>Name:</th>
                                                  <td>Danish Malhi</td>
                                                  <th>Registration No.</th>
                                                  <td>8490874738</td>
                                                </tr>
                                                <tr>
                                                    <th>Donation Type:</th>
                                                    <td>FSF members Fund</td>
                                                    <th>Donation Category:</th>
                                                    <td>FSF-22 (Auto as per signed Terms Policy)</td>
                                                </tr>
                                                <tr>
                                                    <th>Donner's Bank Name:</th>
                                                    <td>Dummy Bank</td>
                                                    <th>Donner's Bank Account No.</th>
                                                    <td>8490874738</td>
                                                </tr>
                                              </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <h4 class="mb-2 font-weight-bold">
                                                Donation Details:
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <table class="table">
                                                <tr>
                                                  <th>Beneficiary Bank Name:</th>
                                                  <td>Dummy Bank</td>
                                                  <th>Beneficiary Bank AC No.</th>
                                                  <td>8490874738</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">Donation Amount: (€)</th>
                                                    <td colspan="5">469.00 <span class="font-weight-bold"><i>EUR</i></span></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">Amount in Words:</th>
                                                    <td colspan="5">Five Thousand Only /-</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Donation Date:</th>
                                                    <td colspan="4">12/12/22</td>
                                                </tr>
                                              </table>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 d-flex">
                                            <p class="mb-0 mr-3">Remarks:</p>
                                            <div class="w-100" style="border-bottom: 1px solid #000;">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 mb-5">
                                            <p class="font-weight-bold text-center mb-5">Signatures:</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0 mb-md-0">
                                            <div class="w-75 my-0 mx-auto" style="border-top: 1px solid #000">
                                                <p class="text-center">Donor</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mb-lg-0 mb-md-0">
                                            <div class="w-75 my-0 mx-auto" style="border-top: 1px solid #000">
                                                <p class="text-center">Cash Receiver</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <img class="doc-bg-img d-none d-lg-block d-md-block" src="{{asset('backend/images/Dawateislami_logo.png')}}" alt="">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-2">Download Voucher</button>
                                            <button type="submit" class="btn btn-danger">Back</button>
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
</div>
@endsection


@section('scripts')
@endsection

@push('js')

@endpush
