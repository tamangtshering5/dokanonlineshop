
<!-- ============================================== HEADER ============================================== -->
@extends('frontend.master1')
@section('body')

<!-- ============================================== HEADER : END ============================================== -->
<div class="container">
    <div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                {{$error}}
                @endforeach
            @endif
        <div class="col-md-12">
            <h2>Proceed to Checkout</h2>
            <p> Fill up this form and we will get back to you as soon as possible </p>
            <form role="form"  action="{{route('checkout_action')}}" method="post" >
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-4 form-group checkout_top">
                        <label for="name"> First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" maxlength="50">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="name"> Middle Name:</label>
                        <input type="text" class="form-control" id="lastname" name="midname" maxlength="50">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="name"> Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" maxlength="50">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="email"> Email:</label>
                        <input type="text" class="form-control" id="email" name="email" maxlength="50">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="email"> Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone1">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label for="email"> Alternative Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone2">
                    </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                    <div class="col-sm-4 form-group">
                        <label for="email"> Select Provinces</label>

                        <select class="form-control" id="sel1" name="province">
                            <option value="item0">--Select Provinces--</option>
                            <option value="Province 1">Province 1</option>
                            <option value="Province 2">Province 2</option>
                            <option value="Province 3">Province 3</option>
                            <option value="Gandaki">Gandaki</option>
                            <option value="Province 5">Province 5</option>
                            <option value="Karnali">Karnali </option>
                            <option value="Sudurpaschim">Sudurpaschim </option>
                        </select>


                       {{-- <select class="form-control" id="sel1">
                            <option>Province 1</option>
                            <option>Province 2</option>
                            <option>Province 3</option>
                            <option>Gandaki</option>
                            <option>Province 5</option>
                            <option>Province Karnali</option>
                            <option>Province Sudurpaschim</option>
                        </select>--}}
                    </div>
<script type="text/javascript">
                    $(document).ready(function () {
                    $("#sel1").change(function () {
                    var val = $(this).val();
                    if (val == "Province 1") {
                    $("#sel2").html("<option value='test'>Bhojpur </option>" +
                        "<option value='Dhankuta'>Dhankuta </option>" +
                        "<option value='Ilam'>Ilam </option>" +
                        "<option value='Jhapa'>Jhapa </option>" +
                        "<option value='Khotang'>Khotang </option>" +
                        "<option value='Morang'>Morang </option>" +
                        "<option value='Okhaldhunga'>Okhaldhunga </option>" +
                        "<option value='Panchthar'>Panchthar </option>" +
                        "<option value='Sankhuwasabha'>Sankhuwasabha </option>" +
                        "<option value='Solukhumbu'>Solukhumbu </option>" +
                        "<option value='Sunsari'>Sunsari </option>" +
                        "<option value='Taplejung'>Taplejung </option>" +
                        "<option value='Terhathum'>Terhathum </option>"+"<option value='Udayapur'>Udayapur  </option>");
                    } else if (val == "Province 2") {
                    $("#sel2").html("<option value='Saptari'>Saptari </option>" +
                        "<option value='Parsa'>Parsa </option>" +
                        "<option value='Sarlahi'>Sarlahi </option>" +
                        "<option value='Bara'>Bara </option>" +
                        "<option value='Siraha'>Siraha </option>" +
                        "<option value='Dhanusha'>Dhanusha </option>" +
                        "<option value='Rautahat'>Rautahat </option>" +
                        "<option value='Mahottari'>Mahottari </option>" );
                    } else if (val == "Province 3") {
                    $("#sel2").html("<option value='Bhaktapur'>Bhaktapur </option>"+
                        "<option value='Chitwan'>Chitwan </option>"+
                        "<option value='Dhading'>Dhading </option>"+
                        "<option value='Dolakha'>Dolakha </option>"+
                        "<option value='Kathmandu'>Kathmandu </option>"+
                        "<option value='Kavrepalanchok'>Kavrepalanchok </option>"+
                        "<option value='Lalitpur'>Lalitpur </option>"+
                        "<option value='Makwanpur'>Makwanpur </option>"+
                        "<option value='Nuwakot'>Nuwakot </option>"+
                        "<option value='Ramechhap'>Ramechhap </option>"+
                        "<option value='Rasuwa'>Rasuwa </option>"+
                        "<option value='Sindhuli'>Sindhuli  </option>"+
                        "<option value='Sindhupalchok'>Sindhupalchok  </option>");
                    }  else if (val == "Gandaki") {
                        $("#sel2").html("<option value='Baglung'>Baglung </option>"+
                            "<option value='Gorkha'>Gorkha </option>"+
                            "<option value='Kaski'>Kaski </option>"+
                            "<option value='Lamjung'>Lamjung </option>"+
                            "<option value='Manang'>Manang </option>"+
                            "<option value='Mustang'>Mustang </option>"+
                            "<option value='Myagdi'>Myagdi </option>"+
                            "<option value='Nawalpur'>Nawalpur </option>"+
                            "<option value='Parbat'>Parbat </option>"+
                            "<option value='Syangja'>Syangja </option>"+
                            "<option value='Tanahun'>Tanahun </option>");
                    } else if (val == "Province 5") {
                        $("#sel2").html("<option value='Arghakhanchi'>Arghakhanchi</option>"+
                            "<option value='Banke'>Banke</option>"+
                            "<option value='Bardiya'>Bardiya</option>"+
                            "<option value='Dang'>Dang</option>"+
                            "<option value='Eastern Rukum'>Eastern Rukum</option>"+
                            "<option value='Gulmi'>Gulmi</option>"+
                            "<option value='Kapilvastu'>Kapilvastu</option>"+
                            "<option value='Parasi'>Parasi</option>"+
                            "<option value='Palpa'>Palpa</option>"+
                            "<option value='Pyuthan'>Pyuthan</option>"+
                            "<option value='Rolpa'>Rolpa</option>"+
                            "<option value='Rupandehi'>Rupandehi</option>");
                    } else if (val == "Karnali") {
                        $("#sel2").html("<option value='Dailekh'>Dailekh </option>"+
                            "<option value='Dolpa'>Dolpa </option>"+
                            "<option value='Humla'>Humla </option>"+
                            "<option value='Jajarkot'>Jajarkot </option>"+
                            "<option value='Jumla'>Jumla </option>"+
                            "<option value='Kalikot'>Kalikot </option>"+
                            "<option value='Mugu'>Mugu </option>"+
                            "<option value='Salyan'>Salyan </option>"+
                            "<option value='Surkhet'>Surkhet </option>"+
                            "<option value='Western Rukum'>Western Rukum</option>");
                    } else if (val == "Sudurpaschim") {
                        $("#sel2").html("<option value='Achham'>Achham </option>"+
                            "<option value='Baitadi'>Baitadi </option>"+
                            "<option value='Bajhang'>Bajhang </option>"+
                            "<option value='Bajura'>Bajura </option>"+
                            "<option value='Dadeldhura'>Dadeldhura </option>"+
                            "<option value='Darchula'>Darchula </option>"+
                            "<option value='Doti'>Doti </option>"+
                            "<option value='Kailali'>Kailali </option>"+
                            "<option value='Kanchanpur'>Kanchanpur </option>");
                    }else if (val == "item0") {
                    $("#sel2").html("<option value=''>--select one--</option>");
                    }
                    });
                    });
</script>
                    <div class="col-sm-4 form-group">
                        <label for="email"> Select District</label>
                        <select class="form-control" id="sel2" name="district">
                            <option value="">-- select district -- </option>
                        </select>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="email"> City/Town</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>


                    <div class="col-sm-12 form-group">
                        <label for="name"> Additional Information</label>
                        <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here"  rows="4"></textarea>
                    </div>
                    @foreach($cartitems as $cartitem)
                    <div class="col-sm-4 form-group">
                        <label for="email"> </label>
                        <input type="hidden" class="form-control" id="city" value="{{$cartitem->name}}" name="name">
                    </div>
                        <div class="col-sm-4 form-group">
                            <label for="email"></label>
                            <input type="hidden" class="form-control" id="city" value="{{$cartitem->qty}}" name="qty">
                        </div>
                        @endforeach

                </div>
                @captcha
                <div class="checkbox">

                    <label>
                        <input type="checkbox" required/><strong>I agree to Dokan Online's <a href="terms-conditions.php">Terms and Conditions</a></strong>
                    </label>
                    <br><br>
                    <a href="{{route('invoice')}}"><button class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> Submit</button></a>
                </div>
            </form>
        </div>


    </div>
</div>
</div>

<section class="bottom-section">
    <div class="container">
    </div>
</section>
    @endsection







