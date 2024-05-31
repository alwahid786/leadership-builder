@extends('layouts.default-layout')
@section('content')
<style>
    body {
        background-color: #F0F0F0;
    }

    @media screen and (max-width: 991px) {
        .responsive-mobile-navbar {
            height: 100vh;
            overflow-y: scroll;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
    }

    @media (min-width: 992px) {
        .navbar-collapse {
            padding-left: 15% !important;
        }

        .navbar-header-right-section {
            padding-right: 70px;
        }
    }

    .navbar-expand-lg .sidenav {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .navbar-toggler i {
        color: #003f77;
    }

    .navBtns {
        border: 1px solid #6dabe4;
        padding: 5px 0px;
        border-radius: 5px;
        width: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .buttonSection a:hover {
        background-color: #6dabe4;
        color: white;
    }
</style>
@if (Auth::user()->role == 'admin')
@include('includes.navbar-dash')
@else
@include('includes.navbar')
@endif
<section class="contentSection position-relative">
    <div class="container-fluid contentRow">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-baseline">
                        <h1 class="m-0">Receipt</h1>
                        <h3 class="blue ml-3 m-0">#{{ $invoice->invoice_id }}</h3>
                        <input type="hidden" id="invoiceId" value="{{ $invoice->invoice_id }}">
                    </div>
                    <button style="width: 15%;" class=" themePrimaryBtn2 form-control btn btn-primary rounded submit px-3 d-flex align-items-center justify-content-center" type="button" id="print">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <path d="M21.5967 22.658H3.72168C3.30728 22.658 2.90985 22.4934 2.61683 22.2003C2.3238 21.9073 2.15918 21.5099 2.15918 21.0955V18.9705C2.15918 18.5561 2.3238 18.1586 2.61683 17.8656C2.90985 17.5726 3.30728 17.408 3.72168 17.408H4.78418C5.01624 17.408 5.2388 17.5002 5.4029 17.6643C5.56699 17.8284 5.65918 18.0509 5.65918 18.283C5.65918 18.3979 5.68181 18.5117 5.72579 18.6178C5.76976 18.724 5.83421 18.8204 5.91546 18.9017C5.99671 18.9829 6.09317 19.0474 6.19933 19.0914C6.30549 19.1353 6.41927 19.158 6.53418 19.158H18.7842C19.0162 19.158 19.2388 19.0658 19.4029 18.9017C19.567 18.7376 19.6592 18.515 19.6592 18.283C19.6592 18.0509 19.7514 17.8284 19.9155 17.6643C20.0796 17.5002 20.3021 17.408 20.5342 17.408H21.5967C22.0111 17.408 22.4085 17.5726 22.7015 17.8656C22.9946 18.1586 23.1592 18.5561 23.1592 18.9705V21.0955C23.1592 21.5099 22.9946 21.9073 22.7015 22.2003C22.4085 22.4934 22.0111 22.658 21.5967 22.658Z" fill="white" />
                            <path d="M6.47564 11.8593C6.23415 11.6661 6.03919 11.421 5.90522 11.1423C5.77124 10.8635 5.70167 10.5582 5.70166 10.2489V10.2455C5.70167 9.90166 5.79535 9.56434 5.97264 9.26975C6.14993 8.97517 6.40412 8.73445 6.70792 8.57346C7.01172 8.41246 7.35364 8.33728 7.69695 8.35599C8.04027 8.37469 8.37199 8.48658 8.6565 8.67962L10.9406 10.2292L10.2592 5.13072C10.1732 4.71377 10.1972 4.2816 10.3288 3.87673C10.501 3.39653 10.8174 2.98124 11.2345 2.68764C11.6517 2.39404 12.1494 2.23647 12.6596 2.23647C13.1697 2.23647 13.6674 2.39404 14.0846 2.68764C14.5017 2.98124 14.8181 3.39653 14.9903 3.87673C15.122 4.28158 15.146 4.71375 15.06 5.13072L14.3949 10.2182L16.6627 8.67962C16.9472 8.48659 17.2789 8.37471 17.6222 8.35602C17.9655 8.33733 18.3074 8.41252 18.6112 8.57352C18.915 8.73452 19.1692 8.97525 19.3464 9.26984C19.5237 9.56443 19.6174 9.90175 19.6174 10.2456V10.249C19.6174 10.5583 19.5478 10.8637 19.4138 11.1425C19.2798 11.4212 19.0848 11.6663 18.8433 11.8595L13.3038 16.2912C13.1209 16.4375 12.8937 16.5172 12.6596 16.5172C12.4254 16.5172 12.1982 16.4375 12.0153 16.2912L6.47564 11.8593Z" fill="white" />
                        </svg>
                        <span class="ml-3"> Download</span>
                    </button>
                </div>
            </div>
            <div class="col-12 mt-5" id="invoicePrint">
                <div class="invoiceCard">
                    <div class="d-flex">
                        <div class="w-50">
                            <span class="invoiceHeading">FROM</span>
                            <div class="d-flex align-items-start mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="108" height="108" viewBox="0 0 108 108" fill="none">
                                    <path d="M0 28C0 12.536 12.536 0 28 0H80C95.464 0 108 12.536 108 28V80C108 95.464 95.464 108 80 108H28C12.536 108 0 95.464 0 80V28Z" fill="#1177AA" />
                                    <path d="M76.6275 52.5471C74.4847 52.1983 72.7903 51.8993 71.096 51.6999C64.9168 50.8528 58.9368 49.4575 53.6545 45.9194C49.2693 42.9793 45.8806 38.8929 42.5916 34.8565C39.5519 31.119 36.6118 27.2819 33.6716 23.4946C33.1234 22.6973 32.3261 22.6474 32.5254 23.7438C32.7248 24.9895 33.0237 26.2354 33.4225 27.4314C35.7646 34.707 38.0569 42.0324 40.5485 49.2582C41.4455 51.8993 41.4953 54.3411 40.5984 56.9822C38.8542 61.8659 37.2097 66.7993 35.6649 71.7327C35.3161 72.7792 35.4656 73.9752 35.4158 75.0716C36.6118 75.0217 37.8575 75.2211 38.904 74.8223C41.7445 73.8755 44.4853 72.5799 47.3258 71.5335C50.0167 70.5368 50.8141 70.7859 52.1595 73.3772C55.9967 80.7026 59.784 88.1277 63.5713 95.503C64.4184 97.1475 65.3154 98.7919 66.1626 100.486C66.3619 100.436 66.312 100.436 66.5612 100.387C66.2125 97.3967 65.8636 94.3569 65.5148 91.3668C64.9168 86.2839 64.3188 81.2009 63.7207 76.118C63.4716 73.6763 63.3221 71.1846 63.073 68.6929C62.7739 66.0518 63.7706 63.8591 65.6643 62.1648C68.455 59.5735 71.3951 57.1318 74.2356 54.64C74.8833 54.0421 75.581 53.4441 76.6275 52.5471Z" fill="white" />
                                    <path d="M49.967 38.1953C50.5649 36.2519 50.8141 34.7071 51.462 33.3117C54.2525 27.2321 61.5282 25.5877 66.2125 29.9231C69.9499 33.3615 69.9001 40.4378 66.0629 44.4743C65.3652 45.1719 64.6178 45.8198 63.5713 46.7666C66.6609 47.3148 69.5014 47.8131 72.292 48.3613C74.0362 48.71 75.88 48.8596 77.5244 49.4576C79.8666 50.3047 80.6142 52.9458 79.0195 54.8893C78.1224 56.0355 76.9265 56.9325 75.7804 57.9291C73.3385 60.072 70.8469 62.0653 68.455 64.2579C67.1094 65.4538 66.2623 66.9489 66.4117 68.8923C66.9599 74.6729 67.4583 80.4535 68.0065 86.284C68.0562 86.583 68.2057 86.882 68.3553 87.3305C79.468 81.7991 86.4944 73.0783 88.0392 60.8194C89.883 46.1188 84.3018 34.408 71.5944 26.6341C61.3787 20.4051 50.6147 20.3552 39.4023 25.2886C43.0402 29.6241 46.4288 33.81 49.967 38.1953Z" fill="white" />
                                    <path d="M57.3424 89.8223C54.5519 84.7393 51.8609 79.8557 49.1201 74.8226C46.7281 75.7694 44.4856 76.6664 42.1933 77.4637C40.5488 78.0617 38.9043 78.6597 37.2101 78.9587C33.4726 79.7062 30.8314 77.2146 31.6786 73.4771C32.6254 69.3908 33.9709 65.3543 35.3164 61.3678C38.6054 51.6005 38.406 54.6403 35.3662 45.1222C33.9211 40.6373 32.4261 36.2021 30.9311 31.7171C30.9311 31.6674 30.8314 31.6674 30.8314 31.6176C21.5625 39.7901 16.4796 56.2847 24.2037 71.6333C30.8813 84.9386 46.0305 91.7159 57.3424 89.8223Z" fill="white" />
                                    <path d="M58.9366 44.3248C61.6276 44.1753 63.9697 42.4809 64.9663 39.7899C66.0128 36.8997 65.3651 34.0093 63.272 32.2653C61.9265 31.1191 60.3319 31.0693 58.7871 31.3682C56.5446 31.7668 54.2522 34.4081 53.8038 36.9994C53.3553 39.6904 54.4516 42.3315 56.5944 43.5772C57.2921 43.976 58.1891 44.0756 58.9366 44.3248Z" fill="white" />
                                    <path d="M25 12.2324C27.99 14.3254 28.7375 16.7672 27.392 20.106C30.2823 17.8137 32.9234 17.8635 35.7639 20.0562C34.4683 16.6675 35.2655 14.1759 38.6542 12.2324C36.6609 11.8338 35.0164 11.8836 33.9699 11.1361C32.9234 10.3388 32.4251 8.74413 31.4285 6.99998C30.5813 10.6378 28.588 12.3321 25 12.2324Z" fill="white" />
                                </svg>
                                <div class="ml-5">
                                    <h2>Leadership Receipt</h2>
                                    <address>18 Guild Street London, EC2V 5PX <br> United Kingdom</address>
                                    <div class="d-flex" style="gap: 60px;">
                                        <p>mail@mail.com</p>
                                        <p>tel: +1 133445456</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-50">
                            <span class="invoiceHeading">CLIENT</span>
                            <div class="d-flex align-items-start mt-4">
                                <img style="height: 125px;width: 125px" src="{{asset('storage/images/'.($invoice->user->profile_img==null?'profile.png':$invoice->user->profile_img))}}" alt="profile iamge" class="profile-img">
                                <div class="ml-5">
                                    <h2>{{$invoice->user->name . ' ' . $invoice->user->last_name}}</h2>
                                    <address>N/A
                                        <br> N/A
                                    </address>
                                    <div class="d-flex" style="gap: 60px;">
                                        <p>{{$invoice->user->email}}</p>
                                        <p>phone: {{$invoice->user->phone}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img class="hotBorder my-5 " src="{{asset('assets/images/hotBorder.png')}}" alt="">
                    <div class="d-flex align-items-center">
                        <div class="invoiceHeading" style="width: 35%;">
                            PAYMENT FOR
                        </div>
                        <div class="invoiceHeading" style="width: 25%;">
                            ITEM DESCRIPTION
                        </div>
                        <div class="invoiceHeading" style="width: 15%;">
                            DURATION
                        </div>
                        <div class="invoiceHeading" style="width: 15%;">
                            RATE
                        </div>
                        <div class="invoiceHeading" style="width: 10%;">
                            AMOUNT
                        </div>
                    </div>
                    <div class="d-flex align-items-start mt-3">
                        <div class="" style="width: 35%;">
                            <h2 class="w-75">{{ $invoice->plan->name }} Purchase For Leadership</h2>
                        </div>
                        <div class="" style="width: 25%;">
                            <h5>{{ $invoice->plan->name }}</h5>
                        </div>
                        <div class="" style="width: 15%;">
                            <h5>One {{ $invoice->plan->duration }}</h5>
                        </div>
                        <div class="" style="width: 15%;">
                            <h5>${{ $invoice->plan->price }}</h5>
                        </div>
                        <div class="" style="width: 10%;">
                            <h5>${{ $invoice->plan->price }}</h5>
                        </div>
                    </div>
                    <div class="my-5">
                        <div class="invoiceHeading">
                            PURCHASE DATE
                        </div>
                        {{-- <h3 class="blue">Saturday april 24th, 2024</h3> --}}
                        <h3 class="blue">{{ date('l F j, Y', strtotime($invoice->created_at)); }}</h3>
                    </div>
                    <img class="hotBorderStriped mb-5" src="{{asset('assets/images/border.png')}}" alt="">
                    <div class="d-flex my-3">
                        <div class="w-50 text-right">
                            <div class="invoiceHeading">
                                SUBTOTAL
                            </div>
                        </div>
                        <div class="w-50 text-right">
                           <h4>${{ $invoice->plan->price }}</h4>
                        </div>
                    </div>
                    <div class="d-flex my-3">
                        <div class="w-50 text-right">
                            <div class="invoiceHeading">
                                TAX
                            </div>
                        </div>
                        <div class="w-50 text-right">
                           <h4>0%</h4>
                        </div>
                    </div>
                    <div class="d-flex my-3 mb-5">
                        <div class="w-50 text-right">
                            <div class="invoiceHeading">
                                TOTAL
                            </div>
                        </div>
                        <div class="w-50 text-right ">
                           <h2>${{ $invoice->plan->price }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('insertjavascript')


@if(session()->has('responseSuccess'))
<script>
    Swal.fire({
        title: 'Success',
        text: `{{ session('responseSuccess') }}`,
        icon: 'success',
        confirmButtonColor: "#6dabe4"
    })
</script>
@endif
@if(session()->has('nextError'))
<script>
    Swal.fire({
        title: 'Error',
        text: `{{ session('nextError') }}`,
        icon: 'error',
        confirmButtonColor: "#6dabe4"
    })
</script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


<script>
    document.getElementById('print').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
    const content = document.getElementById('invoicePrint');

    html2canvas(content).then(canvas => {
        const imgData = canvas.toDataURL('image/png');

        const imgWidth = canvas.width;
        const imgHeight = canvas.height;

        // Set PDF document size to match the image size
        const pdf = new jsPDF({
            orientation: imgWidth > imgHeight ? 'landscape' : 'portrait',
            unit: 'px',
            format: [imgWidth, imgHeight]
        });

        pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
        let invoice = $('#invoiceId').val();
        pdf.save('Invoice-'+invoice+'.pdf');
    });
});

</script>
@endsection
