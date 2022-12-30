<!DOCTYPE html>
<html>

<head>
    <title>Voucher Pdf</title>
    <style>
        body {
            /* background: rgb(204, 204, 204); */
            background: #fff;
        }

        page {
            background: #fff;
            color: #000;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            /* box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5); */
        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        }

        @media print {

            body,
            page {
                margin: 0;
                box-shadow: 0;
            }
        }

        /* Main Design CSS */
        /* .doc-bg-img {
            position: absolute;
            top: 40%;
            left: 35%;
            width: 20%;
            z-index: 1;
            opacity: 0.3;
        } */

        .doc-bg-img {
            position: absolute;
            top: 42%;
            left: 32%;
            width: 30%;
            z-index: 1;
            opacity: 0.2;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #000;
        }

        th {
            padding: 10px 20px;
        }

        td {
            padding: 10px 20px;
        }

        .mb-0 {
            margin-bottom: 0px;
        }

        .m-0 {
            margin: 0px;
        }

        .p-3 {
            padding: 10px;
        }

        .border {
            border: 1px solid #000;
        }

        .outer-border {
            border: 1px dashed #50b748;
            border-radius: 5px;
            margin: 3px !important;
            padding: 3px;
        }

        .inner-border {
            border: 4px solid #135229;
            border-radius: 5px;
            padding: 10px;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .justify-content-center {
            justify-content: center;
        }
    </style>
</head>

<body>
    <page size="A4">
        <div>
            <div class="outer-border">
                <div class="inner-border">
                    <div>
                        <div class="d-flex justify-content-between">
                            <p class="m-0">
                                Date & Time: <span>12-05-2022 _ 22:00 CET</span>
                            </p>
                            <p class="m-0">
                                Created by (UserID): <span>JAWADAHMAD</span>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between" style="margin-top: 20px; margin-bottom: 20px;">
                            <div>
                                <img src="https://fsfeu.org/backend/images/Dawateislami_logo.png" style="margin-top: 15px; margin-left: 20px;"
                                    width="100px" alt="Logo">
                            </div>

                            <div style="text-align: center;">
                                <p class="mb-0" style="font-size: 20px; font-weight: lighter; margin-bottom: 5px;">
                                    <i>Funeral Services Fund</i>
                                </p>
                                <h1 class="m-0" style="color: #135229;"><u><b>Enrollment: {{$application->application_id}}</b></u></h1>
                                <p style="text-transform: uppercase; margin-top: 5px; font-weight: 600; color: #135229">Dawateislami
                                </p>
                            </div>

                            <div>
                                <div style="text-align: center; margin-right: 20px; margin-top: 40px;">
                                    <p style="margin-bottom: 5px;">Check & Audit</p>
                                    <div class="d-flex justify-content-center">
                                        <div class="border p-3"></div>
                                        <div class="border p-3"></div>
                                        <div class="border p-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: 20px;">
                        <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 30px;">
                            <div>
                                <h2 style="font-size: 22px; margin-bottom: 5px;"><b>Personal Details:</b></h2>
                            </div>
                            <div>
                                <table style="width: 100%;">
                                    <tr>
                                        <th style="padding: 0;" colspan="3">
                                            <table style="border: none;">
                                                <tr style="border: none;">
                                                    <th style="border: none; text-align: left;">Full Name:</th>
                                                    <td style="border: none; text-align: left;">{{ $application->full_name }}</td>
                                                </tr>
                                                <tr style="border: none;">
                                                    <th style="border: none; text-align: left;">Father Name:</th>
                                                    <td style="border: none; text-align: left;">{{ $application->father_name }}</td>
                                                </tr>
                                                <tr style="border: none;">
                                                    <th style="border: none; text-align: left;">Sur Name:</th>
                                                    <td style="border: none; text-align: left;">{{ $application->surname }}</td>
                                                </tr>
                                                <tr style="border: none;">
                                                    <th style="border: none; text-align: left;">Gender:</th>
                                                    <td style="border: none; text-align: left;">{{ $application->gender }}</td>
                                                </tr>
                                            </table>
                                        </th>
                                        <th colspan="1">
                                            <img style="width: 100%;" src="{{$application->avatar ?? asset('placeholder.png')}}" alt="">
                                        </th>
                                    </tr>
                                    <!-- <tr>
                                        <th>Full Name:</th>
                                        <td>Danish Malhi</td>
                                        <th>Father Name:</th>
                                        <td>Asghar Malhi</td>
                                    </tr>
                                    <tr>
                                        <th>Sur Name:</th>
                                        <td>Malhi</td>
                                        <th>Gender:</th>
                                        <td>Male</td>
                                    </tr> -->
                                    <tr>
                                        <th>Date of Birth:</th>
                                        <td>{{ $application->dob }}</td>
                                        <th>Passport No:</th>
                                        <td>{{ $application->passport_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Residence Card No:</th>
                                        <td>{{ $application->nie }}</td>
                                        <th>Cell No:</th>
                                        <td>{{ $application->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $application->user->email }}</td>
                                        <th>Country:</th>
                                        <td>{{ $application->country->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Community:</th>
                                        <td>{{ $application->community->name }}</td>
                                        <th>Province:</th>
                                        <td>{{ $application->province->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>City:</th>
                                        <td>{{ $application->city->name }}</td>
                                        <th>Address:</th>
                                        <td>{{ $application->area }}</td>
                                    </tr>
                                    <tr>
                                        <th>Native Country:</th>
                                        <td>{{ $application->native_country }}</td>
                                        <th>ID Card No. (Native Country):</th>
                                        <td>{{ $application->native_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Complete Address (Native Country):</th>
                                        <td colspan="3">
                                            {{ $application->native_country_address }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 30px;">
                            <div>
                                <h2 style="font-size: 22px; margin-bottom: 5px;"><b>Relative Information (Residence):</b></h2>
                            </div>
                            <div>
                                <table style="width: 100%;">
                                    <h4 style="font-size: 15px; margin-bottom: 5px;">Relative 1</h4>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td>{{ $application->s_relative_1_name }}</td>
                                        <th>Relation:</th>
                                        <td>{{ $application->s_relative_1_relation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cell No:</th>
                                        <td>{{ $application->s_relative_1_phone }}</td>
                                        <th>Complete Address:</th>
                                        <td>{{ $application->s_relative_1_address }}</td>
                                    </tr>
                                </table>
                                <table style="width: 100%;">
                                    <h4 style="font-size: 15px; margin-bottom: 5px;">Relative 1</h4>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td>{{ $application->s_relative_2_address }}</td>
                                        <th>Relation:</th>
                                        <td>{{ $application->s_relative_2_relation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cell No:</th>
                                        <td>{{ $application->s_relative_2_phone }}</td>
                                        <th>Complete Address:</th>
                                        <td>{{ $application->s_relative_2_address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 30px;">
                            <div>
                                <h2 style="font-size: 22px; margin-bottom: 5px;"><b>Relative Information (Native Country):</b></h2>
                            </div>
                            <div>
                                <table style="width: 100%;">
                                    <h4 style="font-size: 15px; margin-bottom: 5px;">Relative 1</h4>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td>{{ $application->n_relative_1_name }}</td>
                                        <th>Relation:</th>
                                        <td>{{ $application->n_relative_1_relation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cell No:</th>
                                        <td>{{ $application->n_relative_1_phone }}</td>
                                        <th>Complete Address:</th>
                                        <td>{{ $application->n_relative_1_address }}</td>
                                    </tr>
                                </table>
                                <table style="width: 100%;">
                                    <h4 style="font-size: 15px; margin-bottom: 5px;">Relative 1</h4>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td>{{ $application->n_relative_2_name }}</td>
                                        <th>Relation:</th>
                                        <td>{{ $application->n_relative_2_relation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cell No:</th>
                                        <td>{{ $application->n_relative_2_phone }}</td>
                                        <th>Complete Address:</th>
                                        <td>{{ $application->n_relative_2_name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 30px;">
                            <div>
                                <h2 style="font-size: 22px; margin-bottom: 5px;"><b>Representative Information</b></h2>
                            </div>
                            <div>
                                <table style="width: 100%;">
                                    <tr>
                                        <th>Full Name:</th>
                                        <td>{{ $application->rep_name }}</td>
                                        <th>Sur Name:</th>
                                        <td>{{ $application->rep_surname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Passport No:</th>
                                        <td>{{ $application->rep_passport_no }}</td>
                                        <th>Cell No:</th>
                                        <td>{{ $application->rep_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Complete Address:</th>
                                        <td colspan="3">{{ $application->rep_address }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Have you informed him that youare appointing this person as your Representative in FSF and this person will be authorized to collect your reaming ammount:</th>
                                        <td>yes</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div style="margin-left: 20px; margin-right: 20px; margin-bottom: 30px;">
                            <div>
                                <h2 style="font-size: 22px; margin-bottom: 5px;"><b>Suplementary Information</b></h2>
                            </div>
                            <div>
                                <table style="width: 100%;">
                                    <tr>
                                        <th>Burried Place:</th>
                                        <td>{{ $application->buried_location }}</td>
                                        <th>Registered Relative:</th>
                                        <td>{{ $application->registered_relatives=='1'?'Yes':'No' }}</td>
                                    </tr>
                                    @if ($application->registered_relatives == 1)
                                                @php
                                                    $relative = App\Models\Application::where('passport_number', $application->registered_relative_passport_no)->first();
                                                @endphp
                                    <tr>
                                        <th>Full Name:</th>
                                        <td>{{ $relative->full_name }}</td>
                                        <th>Father Name:</th>
                                        <td>{{ $relative->father_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cell No:</th>
                                        <td>{{ $relative->phone }}</td>
                                        <th>Passport No:</th>
                                        <td>{{ $relative->passport_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Complete Address:</th>
                                        <td colspan="3">{{ $relative->area }}</td>
                                    </tr>

                                    @endif

                                    <tr>
                                        <th>How much will you pay annually in this fund:</th>
                                        <td colspan="3">€ {{ $application->annually_fund_amount }}</td>
                                    </tr>
                                    <tr>
                                        <th>Your Signature:</th>
                                        <td colspan="3">
                                            <img style="width: 150px;" src="{{ $application->user_signature }}" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Have you read carefully to all the conditions and regulations on this funderal services fund:</th>
                                        <td>yes</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex" style="margin-left: 20px; margin-right: 20px; margin-top: 30px;">
                            <p class="mb-0" style="margin-right: 15px;">Remarks:</p>
                            <div style="border-bottom: 1px solid #000; width: 100%;">

                            </div>
                        </div>
                        <div class="" style="margin-left: 20px; margin-right: 20px;">
                            <div style="margin-bottom: 80px;">
                                <p style="text-align: center; font-weight: bold; margin-bottom: 20px;">Signatures:</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="" style="width: 100%;">
                                    <div style="border-top: 1px solid #000; width: 75%; margin: 0 auto;">
                                        <p style="text-align: center;">Applicant</p>
                                    </div>
                                </div>
                                <!-- <div class="" style="width: 100%;">
                                    <div style="border-top: 1px solid #000; width: 75%; margin: 0 auto;">
                                        <p style="text-align: center;">Donor</p>
                                    </div>
                                </div> -->
                                <div class="" style="width: 100%;">
                                    <div style="border-top: 1px solid #000; width: 75%; margin: 0 auto;">
                                        <p style="text-align: center;">Application Receiver</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <img class="doc-bg-img" src="Dawateislami_logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </page>
</body>

</html>
