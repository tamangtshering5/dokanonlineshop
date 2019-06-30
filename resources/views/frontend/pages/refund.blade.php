
<!-- ============================================== HEADER ============================================== -->
@extends('frontend.master1')
@section('body')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Refund Policy</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="terms-conditions-page">
            <div class="row">
                <div class="col-md-12 terms-conditions">
                    <h2 class="heading-title">Dokan Online's Refund Policy</h2>
                    <div class="">
                        @foreach($refunds as $refund)
                       <p>
                           {!! $refund->refund !!}
                       </p>
                        @endforeach
                        <h3>Changes to this agreement</h3>
                        <p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions. </p>
                        <h3>Contact Us</h3>
                        <p>If you have any questions about this, please contact us filling this <a href="#" class='contact-form'>contact form</a></p>
                    </div>
                </div>			</div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">



        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<section class="bottom-section">
    <div class="container">
       @endsection
