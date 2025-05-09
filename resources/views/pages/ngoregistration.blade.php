<!doctype html>
<html lang="en">

<head>
    @include('inc/newheader')
</head>
<header>
    <style>
        .hindifontclass {
            font-family: 'Tiro Devanagari Hindi';
            font-style: 'normal';


        }

        @media only screen and (max-width: 767.98px) {

            .contact-box {
                margin-top: 0 !important;
            }

            .checkbox {
                display: block;

            }

            .mycont {
                margin-top: 20px;
                padding: 0.7rem;
                /* Adjust the padding value as needed */
                border-radius: 10px;
            }


        }

        .infor-img .image-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #0DE0FE;
            box-shadow: 0px 10px 4px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 30px;
            margin: -35px auto;

        }

        .infor-img {
            position: relative;
            margin: 0 auto;
        }
    </style>



</header>
<!-- Breadcrumb -->

<body>
    <div class="container">
        <div class="row" style="margin-top:60px;">
            <div class="col-md-12 text-right py-5">
                <div class="contact-box" style="margin-top:0px;">
                    <div class="infor-img">
                        <div class="image-circle">
                            <h3 style="margin-bottom: 10px; padding-top: 10px;">लक्ष्य</h3>
                        </div>
                    </div>
                    <div class="infor-details p-md-5 mycont"
                        style="background-image: linear-gradient(to right, #00ccff, #ff2994);width: 100%; border-radius: 10px;">
                        <div class="hindifontclass ">
                            <p style="font-size: large; block-size: auto; color: white; font-weight: 100;">
                                हमारा लक्ष्य अयोग्य (झोला छाप) डॉक्टरों को बदलकर योग्य (एजुकेटेड) एम बी बी एस क्वालिफाइड
                                डॉक्टरों (MBBS Qualified Doctor) से बिना किसी गुणवत्ता समझौते के बिलकुल कम खर्च पर
                                चिकित्सा सेवा प्रदान कराना है। तथा भारत के प्रत्येक गांव में डिजिटल प्राइमरी हेल्थ सेंटर
                                का निर्माण करना है जिसका नाम डिजिटल डॉक्टर क्लीनिक रखा गया है। जिसके लिए उत्तर प्रदेश
                                सरकार ने एक समझौता ज्ञापन (MOA Number: 23/HEALTH/0000010982) के माध्यम से obdu ग्रुप के
                                साथ ग्रामीण क्षेत्र की स्वस्थ व्यवस्था को दुरुस्त करने की पहल की है।
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- Contact Form -->
    <div class="container-md p-md-5 card" style="width: 100%;">
        <div class="hindifontclass" style="font-size: large;">
            <form action="/add_ngo_data" method="post" style="padding-bottom: 50px; margin-bottom: 50px;"
                enctype="multipart/form-data">
                @csrf
                <div class="section-header">
                    <h2 class="text-center">NGO Register Form</h2>
                </div>

                <div class="section-header "><br>
                    <p>नोट 1 :- NGO का कार्य क्षेत्र ग्रामीण विकास एवं स्वास्थ्य विकास में होना अनिवार्य है।</p>
                    <p>नोट 2 :- सेक्शन 8 कंपनी को वरीयता दीजाएगी!</p>
                    <p>नोट 3 :- वह NGO जिनके पास 80G होगा वरीयता के पात्र होंगे।</p>
                </div>
                <div class="card-body"><br>
                    <center>
                        <div class="form-control">
                            <h3>आप किस प्रकार की NGO है ?</h3>
                            <span class="text-danger" id="ngo_type"></span>
                            <label class="mx-3">
                                <input type="radio" name="ngo_type" id="ngo_type1" value="पब्लिक ट्रस्ट"
                                    {{ old('ngo_type') == 'पब्लिक ट्रस्ट' ? 'checked' : '' }}>पब्लिक ट्रस्ट
                            </label>
                            <label class="mx-2">
                                <input type="radio" name="ngo_type" id="ngo_type2" value="सुसाइटी"
                                    {{ old('ngo_type') == 'सुसाइटी' ? 'checked' : '' }}>सुसाइटी
                            </label>
                            <label class="mx-2">
                                <input type="radio" name="ngo_type" id="ngo_type3" value="सेक्शन 8 कंपनी"
                                    {{ old('ngo_type') == 'सेक्शन 8 कंपनी' ? 'checked' : '' }}>सेक्शन 8 कंपनी
                            </label>
                        </div>
                    </center>
                </div>
                <div class="row">
                    <div class="row form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">NGO नाम <span>*</span></label>
                                <input type="hidden" name="types" value="ngo">
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" required>
                                <span class="text-danger" id="nameSpan"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email1">ईमेल <span>*</span></label>
                                <input type="email" name="email" id="email1" class="form-control"
                                    oninput="checkEmail()" value="{{ old('email') }}" required>
                                <span id="emailErrorMessage" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mobile1">मोबाइल No <span>*</span></label>
                                <input type="tel" name="mobile" id="mobile1" maxlength="10" minlength="10"
                                    value="{{ old('mobile') }}" required>
                                @if ($errors->has('mobile'))
                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                @endif
                                <span id="mobileErrorMessage" style="color: red;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="place">स्थान </label>

                            <input type="text" name="place" id="place" class="form-control"
                                value="{{ old('place') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="comment">पंजीकृत क्षेत्र </label>
                            <input type="text" id="comment" name="comment" class="form-control"
                                value="{{ old('comment') }}">
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <h3 class="text-center">पंजीकृत पता </h3>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="village_ngo">शहर/ गांव <span>*</span></label>
                    <input type="text" name="village_ngo" id="village_ngo" class="form-control"
                        value="{{ old('village_ngo') }}" required>
                    <span class="text-danger" id="village_ngo_span"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="city1">ज़िला <span>*</span></label>
                    <input type="text" name="city" id="city1" class="form-control"
                        value="{{ old('city') }}" required>
                    <span class="text-danger" id="city1_span"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="state1">राज्य <span>*</span></label>
                    <input type="text" name="state" id="state1" class="form-control"
                        value="{{ old('state') }}" required>
                    <span class="text-danger" id="state1_span"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pincode1">पिन कोड <span>*</span></label>
                    <input type="number" name="pincode" id="pincode1" class="form-control"
                        value="{{ old('pincode') }}" required>
                    <span class="text-danger" id="pincode1_span"></span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="full_address">संपूर्ण पता। <span>*</span></label>
                    <textarea type="text" name="full_address" id="full_address" class="form-control"
                        value="{{ old('full_address') }}" required></textarea>
                    <span class="text-danger" id="full_address_span"></span>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="ngo_certificate_file">NGO रजिस्ट्रेशन सर्टिफिकेट अपलोड करें<span>*</span></label>
                <input type="file" name="ngo_certificate_file" id="ngo_certificate_file" class="form-control"
                    value="{{ old('ngo_certificate_file') }}" required>
                <span class="text-danger" id="ngo_certificate_file_span"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="checkbox">उपनियम दस्तावेज़ अपलोड करें<span>*</span></label>
                <label for="mouRadio1">हाँ</label>
                <input type="radio" name="mouRadio1" id="mouRadio1" onchange="showMouUpload()" value="yes"
                    {{ old('mouRadio1') == 'yes' ? 'checked' : '' }} required>
                <label for="mouRadio2">नहीं</label>
                <input type="radio" name="mouRadio1" id="mouRadio2" onchange="hideMouUpload()" value="no"
                    {{ old('mouRadio1') == 'no' ? 'checked' : '' }}>
                <span class="text-danger" id="mouRadio1_span"></span>
            </div>
        </div>
        <div class="col-md-12" id="mouUpload" style="display: none;">
            <div class="form-group">
                <label for="factCertificateFile">(यदि हाँ सर्टिफिकेट अपलोड करें)<span>*</span></label>
                <input type="file" name="fact_certificate_file" class="form-control"
                    value="{{ old('fact_certificate_file') }}" id="factCertificateFile">
                <span class="text-danger" id="factCertificateFileSpan"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="checkbox">क्या आपकी NGO नीति आयोग के NGO दर्पण में पंजीकृत है <span>*</span></label>
                <label for="darpanRadio1">हाँ</label>
                <input type="radio" name="darpanRadio" id="darpanRadio1" onchange="showMouUpload1(this)"
                    value="yes" {{ old('darpanRadio') == 'yes' ? 'checked' : '' }} required>
                <label for="darpanRadio2">नहीं</label>
                <input type="radio" name="darpanRadio" id="darpanRadio2" onchange="hideMouUpload1()"
                    value="no" {{ old('darpanRadio') == 'no' ? 'checked' : '' }}>
                <span class="text-danger" id="darpanRadio_span"></span>
            </div>
        </div>
        <div class="col-md-12" id="mouUpload1" style="display: none;">
            <div class="form-group">
                <label for="ngo_registor_certificate_file">(यदि हाँ सर्टिफिकेट अपलोड करें)<span>*</span></label>
                <input type="file" name="ngo_registor_certificate_file" id="ngo_registor_certificate_file"
                    class="form-control" value="{{ old('ngo_registor_certificate_file') }}">
                <span class="text-danger" id="ngo_registor_certificate_file_span"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="checkbox">क्या आपके पास 80 G का रजिस्ट्रेशन है <span>*</span></label>
                <label for="darpanRadio11">हाँ</label>
                <input type="radio" name="darpanRadio1" id="darpanRadio11" onchange="showMouUpload5(this)"
                    value="yes" {{ old('darpanRadio1') == 'yes' ? 'checked' : '' }} required>
                <label for="darpanRadio12">नहीं</label>
                <input type="radio" name="darpanRadio1" id="darpanRadio12" onchange="hideMouUpload5()"
                    value="no" {{ old('darpanRadio1') == 'no' ? 'checked' : '' }}>
                <span class="text-danger" id="darpanRadio11_span"></span>
            </div>
        </div>
        <div class="col-md-12" id="mouUpload5" style="display: none;">
            <div class="form-group">
                <label for="g_reg80_file">(यदि हाँ सर्टिफिकेट अपलोड करें)<span>*</span></label>
                <input type="file" name="g_reg80_file" id="g_reg80_file" class="form-control"
                    value="{{ old('g_reg80_file') }}">
                <span class="text-danger" id="g_reg80_file_span"></span>
            </div>
        </div>
        <!-- --------------------------- -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="checkbox">क्या NGO को स्वास्थ्य से संबंधित अनुभव है ?<span>*</span></label>
                <label for="relationship_certificate1">हाँ</label>
                <input type="radio" name="relationship_certificate" id="relationship_certificate1"
                    onchange="showMouUpload2(this)" value="yes"
                    {{ old('relationship_certificate') == 'yes' ? 'checked' : '' }} required>
                <label for="relationship_certificate2">नहीं</label>
                <input type="radio" name="relationship_certificate" id="relationship_certificate2"
                    onchange="hideMouUpload2()" value="no"
                    {{ old('relationship_certificate') == 'no' ? 'checked' : '' }}>
                <span class="text-danger" id="relationship_certificate1_span"></span>
            </div>
        </div>
        <div class="col-md-12" id="mouUpload2" style="display: none;">
            <div class="form-group">
                <label for="relationship_certificate_file">(यदि हाँ सर्टिफिकेट अपलोड करें)<span>*</span></label>
                <input type="file" name="relationship_certificate_file" id="relationship_certificate_file"
                    class="form-control" value="{{ old('relationship_certificate_file') }}">
                <span class="text-danger" id="relationship_certificate_file_span"></span>
            </div>
        </div>
        <!----------------------------- -->
        <!----------------------------- -->
        <div class="col-md-12">
            <div class="form-group">
                <label class="checkbox">क्या NGO, FCRA/CSR -1 पंजीकृत है ?<span>*</span></label>
                <label for="fcra1">हाँ</label>
                <input type="radio" name="fcra" id="fcra1" onchange="showMouUpload8(this)" value="yes"
                    {{ old('fcra') == 'yes' ? 'checked' : '' }} required>
                <label for="fcra2">नहीं</label>
                <input type="radio" name="fcra" id="fcra2" onchange="hideMouUpload8()" value="no"
                    {{ old('fcra') == 'no' ? 'checked' : '' }}>
                <span class="text-danger" id="fcra1_span"></span>
            </div>
        </div>
        <div class="col-md-12" id="mouUpload8" style="display: none;">
            <div class="form-group">
                <label for="fcra_file">(यदि हाँ सर्टिफिकेट अपलोड करें)<span>*</span></label>
                <input type="file" name="fcra_file" id="fcra_file" class="form-control"
                    value="{{ old('fcra_file') }}">
                <span class="text-danger" id="fcra_file_span"></span>
            </div>
        </div>
        <!-- --------------------------- -->

        <div class="col-md-12">
            <div class="form-group">
                <label class="checkbox">क्या NGO किसी प्रकार की उपलब्धि/पुरस्कार धारक है। ?<span>*</span></label>
                <label for="ngo_achievement1">हाँ</label>
                <input type="radio" name="ngo_achievement" id="ngo_achievement1" onchange="showMouUpload6(this)"
                    value="yes" {{ old('ngo_achievement') == 'yes' ? 'checked' : '' }} required>
                <label for="ngo_achievement2">नहीं</label>
                <input type="radio" value="no" name="ngo_achievement" id="ngo_achievement2"
                    onchange="hideMouUpload6()" value="no" {{ old('ngo_achievement') == 'no' ? 'checked' : '' }}>
                <span class="text-danger" id="ngo_achievement1_span"></span>
            </div>
        </div>
        <div class="col-md-12" id="mouUpload6" style="display: none;">
            <div class="form-group">
                <label for="ngo_achievement_file">(यदि हाँ सर्टिफिकेट अपलोड करें)<span>*</span></label>
                <input type="file" name="ngo_achievement_file" id="ngo_achievement_file" class="form-control"
                    value="{{ old('ngo_achievement_file') }}">
                <span class="text-danger" id="ngo_achievement_file_span"></span>
            </div>
        </div>
        <!-- ------------------------------------------------------------ -->

        <div class="col-md-12">
            <div class="form-group">
                <label>डायरेक्टर/ सर्वोच्च अधिकारी के डाक्यूमेंट्स <span>*</span></label>
                <div class="row">
                    <br>
                    <div class="col-md-4">
                        <label for="direactor_aadhar">आधार कार्ड अपलोड करें <span>*</span></label>
                        <input type="file" name="direactor_aadhar" id="direactor_aadhar" class="form-control"
                            value="{{ old('direactor_aadhar') }}" required>
                        <span class="text-danger" id="direactor_aadhar_span"></span>
                    </div>
                    <div class="col-md-4">
                        <label for="direactor_pan">पैन कार्ड अपलोड <span>*</span></label>
                        <input type="file" name="direactor_pan" id="direactor_pan" class="form-control"
                            value="{{ old('direactor_pan') }}" required>
                        <span class="text-danger" id="direactor_pan_span"></span>
                    </div>
                    <div class="col-md-4">
                        <label for="direactor_photo">फोटो अपलोड, <span>*</span></label>
                        <input type="file" name="direactor_photo" id="direactor_photo" class="form-control"
                            value="{{ old('direactor_photo') }}" required>
                        <span class="text-danger" id="direactor_photo_span"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="nogtypework">NGO जिस क्षेत्र में काम करना चाहती है जनपद (जिला) का नाम लिखें।
                    <span>*</span></label>
                <input type="text" name="nogtypework" id="nogtypework" value="{{ old('nogtypework') }}"
                    required>
                <span class="text-danger" id="nogtypework_span"></span>
            </div>
        </div>
        <!-- --------------------------- -->
        <div class="col-md-12" id="mouUpload7" style="display: none;">
            <div class="form-group">
                <label for="block_name">(यदि नहीं तो ब्लॉक का नाम लिखें )<span>*</span></label>
                <input type="text" name="block_name" id="block_name" class="form-control"
                    value="{{ old('block_name') }}">
                <span class="text-danger" id="block_name_span"></span>
            </div>
        </div>
        <!-- ------------------------------------------------------------ -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="ngo_exp">NGO को कितना अनुभव है ? <span>*</span></label>
                <input type="text" name="ngo_exp" id="ngo_exp" class="form-control"
                    value="{{ old('ngo_exp') }}" required>
                <span class="text-danger" id="ngo_exp_span"></span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="declearation_about_ngo">NGO के अनुभव का अपने शब्दों में ब्यौरा दें<span>*</span></label>
                <textarea type="text" name="declearation_about_ngo" id="declearation_about_ngo" class="form-control"
                    value="{{ old('declearation_about_ngo') }}" required></textarea>
                <span class="text-danger" id="declearation_about_ngo_span"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="ngo_password">अपना पासवर्ड बनाया <span>*</span></label>
                <input type="password" name="ngo_password" id="ngo_password" class="form-control" required>
                <span class="text-danger" id="ngo_password_span"></span>
            </div>
        </div>

        <button class="btn btn-primary submit-btn" id="submit"
            style="width: 100%; background:linear-gradient(to right, #00ccff, #ff2994);" onclick="validateInputs()">
            Submit</button>
    </div>
    <!-- Rest of the form code -->
    </form>
    </div>
    </div>

    <div class="col-md-4">
    </div>

    </div>
    </div>



    <!-- /Contact Form -->


</body>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<!-- allowfullscreen="" loading="lazy" -->
<script>
    function showMouUpload() {
        document.getElementById("mouUpload").style.display = "block";
        document.getElementById("factCertificateFile").required = true;
    }

    function hideMouUpload() {
        document.getElementById("mouUpload").style.display = "none";
        document.getElementById("factCertificateFile").required = false;
    }

    function showMouUpload1() {
        document.getElementById("mouUpload1").style.display = "block";
        document.getElementById("ngo_registor_certificate_file").required = true;

    }

    function hideMouUpload1() {
        document.getElementById("mouUpload1").style.display = "none";
        document.getElementById("ngo_registor_certificate_file").required = false;

    }


    function showMouUpload2() {
        document.getElementById("mouUpload2").style.display = "block";
        document.getElementById("relationship_certificate_file").required = true;
    }

    function hideMouUpload2() {
        document.getElementById("mouUpload2").style.display = "none";
        document.getElementById("relationship_certificate_file").required = false;

    }


    function showShowG80Upload() {
        document.getElementById("showG80Upload").style.display = "block";
    }

    function hideHideG80Upload() {
        document.getElementById("hideG80Upload").style.display = "none";
    }

    function showMouUpload5() {
        document.getElementById("mouUpload5").style.display = "block";
        document.getElementById('g_reg80_file').required = true;
    }

    function hideMouUpload5() {
        document.getElementById("mouUpload5").style.display = "none";
        document.getElementById('g_reg80_file').required = false;
    }

    function showMouUpload6() {
        document.getElementById("mouUpload6").style.display = "block";
        document.getElementById('ngo_achievement_file').required = true;
    }

    function hideMouUpload6() {
        document.getElementById("mouUpload6").style.display = "none";
        document.getElementById('ngo_achievement_file').required = false;
    }

    function showMouUpload7() {
        document.getElementById("mouUpload7").style.display = "block";
        document.getElementById('block_name').required = true;
    }

    function hideMouUpload7() {
        document.getElementById("mouUpload7").style.display = "none";
        document.getElementById('block_name').required = false;
    }

    function showMouUpload8() {
        document.getElementById("mouUpload8").style.display = "block";
        document.getElementById('fcra_file').required = true;
    }

    function hideMouUpload8() {
        document.getElementById("mouUpload8").style.display = "none";
        document.getElementById('fcra_file').required = false;

    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileInput = document.getElementById('mobile1');
        const mobileErrorMessage = document.getElementById('mobileErrorMessage');

        let isValidPrevious = false;

        mobileInput.addEventListener('input', function() {
            // Remove non-digit characters
            const sanitizedValue = this.value.replace(/\D/g, '');

            // Limit to 10 digits
            const truncatedValue = sanitizedValue.slice(0, 10);

            // Update the input field
            this.value = truncatedValue;

            // Check if the length is exactly 10 characters
            const isValid = truncatedValue.length === 10;

            // Update error message only if validity state changes
            if (isValid !== isValidPrevious) {
                isValidPrevious = isValid;
                mobileErrorMessage.innerHTML = isValid ? '' : 'Mobile number must be 10 digits long';
            }
        });
    });
</script>


<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        // Function to check email uniqueness
        function checkEmail(email, errorMessageSelector) {
            $.ajax({
                type: 'GET',
                url: '/unique_email',
                data: {
                    email: email
                },
                success: function(response) {
                    console.log(response.trim());
                    if (response.trim() === 'exists') {
                        $(errorMessageSelector).text('Email already exists');
                    } else {
                        $(errorMessageSelector).text('');
                    }
                    updateSubmitButtonState();
                }
            });
        }

        // Function to check mobile number uniqueness
        function checkMobile(mobile, errorMessageSelector) {
            $.ajax({
                type: 'GET',
                url: '/unique_mobile_number',
                data: {
                    mobile_number: mobile
                },
                success: function(response) {
                    console.log(response.trim());
                    if (response.trim() === 'exists') {
                        $(errorMessageSelector).text('Phone number already exists');
                    } else {
                        $(errorMessageSelector).text('');
                    }
                    updateSubmitButtonState();
                }
            });
        }

        // Function to update submit button state based on error messages
        function updateSubmitButtonState() {
            if ($('#emailErrorMessage').text() !== '' || $('#mobileErrorMessage').text() !== '' ||
                $('#DirectoremailErrorMessage').text() !== '' || $('#DirectorphoneErrorMessage').text() !== ''
            ) {
                $('#submit').prop('disabled', true);
            } else {
                $('#submit').prop('disabled', false);
            }
        }

        // Event binding for email1 input
        $('#email1').on('input', function() {
            checkEmail($(this).val(), '#emailErrorMessage');
        });

        // Event binding for mobile1 input
        $('#mobile1').on('input', function() {
            checkMobile($(this).val(), '#mobileErrorMessage');
        });

        // Event binding for email2 input
        $(document).on('input', 'input[name="director_mail"]', function() {
            checkEmail($(this).val(), '#DirectoremailErrorMessage');
        });

        // Event binding for mobile2 input (make sure the name is consistent)
        $(document).on('input', 'input[name="director_phone"]', function() {
            checkMobile($(this).val(), '#DirectorphoneErrorMessage');
        });

        // Event binding for change on both email1 and mobile1
        $('#email1, #mobile1').on('change', updateSubmitButtonState);

        // Event binding for change on both email2 and mobile_number2
        $(document).on('change', 'input[name="director_mail"], input[name="director_phone"]',
            updateSubmitButtonState);

        //PINCODES EXTRACTION for pincode1
        $('#pincode1').on('input', function() {
            var pincode1 = $(this).val();
            $(this).val(pincode1.substring(0, 6));
            if (pincode1.length === 6) {
                $.ajax({
                    url: '{{ url('pincodes') }}',
                    method: 'GET',
                    data: {
                        'pincode': pincode1
                    },
                    success: function(data) {
                        $('#city1').val(data['City']);
                        $('#country1').val('India');
                        $('#state1').val(data['State']);
                    }
                });
            }
        });

        //PINCODES EXTRACTION for pincode2
        $('#pincode2').on('input', function() {
            var pincode2 = $(this).val();
            $(this).val(pincode2.substring(0, 6));
            if (pincode2.length === 6) {
                $.ajax({
                    url: '{{ url('pincodes') }}',
                    method: 'GET',
                    data: {
                        'pincode': pincode2
                    },
                    success: function(data) {
                        $('#city2').val(data['City']);
                        $('#country2').val('India');
                        $('#state2').val(data['State']);
                    }
                });
            }
        });
    });

    function validateInputs() {
        var ngoType1 = document.getElementById('ngo_type1').checked;
        var ngoType2 = document.getElementById('ngo_type2').checked;
        var ngoType3 = document.getElementById('ngo_type3').checked;

        if (!ngoType1 && !ngoType2 && !ngoType3) {
            document.getElementById('ngo_type').innerHTML = 'Please select at least one';
        } else {
            document.getElementById('ngo_type').innerHTML = '';
        }
        if (document.getElementById('name').value == '') {
            document.getElementById('nameSpan').innerHTML = 'Name field is required';
        } else {
            document.getElementById('nameSpan').innerHTML = '';
        }
        if (document.getElementById('email1').value == '') {
            document.getElementById('emailErrorMessage').innerHTML = 'Email field is required';
        } else {
            document.getElementById('emailErrorMessage').innerHTML = '';
        }
        if (document.getElementById('mobile1').value == '') {
            document.getElementById('mobileErrorMessage').innerHTML = 'Phone No. field is required';
            document.getElementById('submit').disabled = true; //i want to disable this button
        } else if (!/^\d{10}$/.test(document.getElementById('mobile1').value)) {
            document.getElementById('mobileErrorMessage').innerHTML = 'Enter valid 10-digit number';
            document.getElementById('submit').disabled = true;
        } else {
            document.getElementById('mobileErrorMessage').innerHTML = '';
            document.getElementById('submit').disabled = false;
        }
        if (document.getElementById('village_ngo').value == '') {
            document.getElementById('village_ngo_span').innerHTML = 'Village name field is required';
        } else {
            document.getElementById('village_ngo_span').innerHTML = '';
        }
        if (document.getElementById('city1').value == '') {
            document.getElementById('city1_span').innerHTML = 'City field is required';
        } else {
            document.getElementById('city1_span').innerHTML = '';
        }
        if (document.getElementById('state1').value == '') {
            console.log('hi');
            document.getElementById('state1_span').innerHTML = 'State field is required';
        } else {
            document.getElementById('state1_span').innerHTML = '';
        }
        if (document.getElementById('pincode1').value == '') {
            document.getElementById('pincode1_span').innerHTML = 'Pincode field is required';
        } else {
            document.getElementById('pincode1_span').innerHTML = '';
        }
        if (document.getElementById('full_address').value == '') {
            document.getElementById('full_address_span').innerHTML = 'Full address field is required';
        } else {
            document.getElementById('full_address_span').innerHTML = '';
        }
        if (document.getElementById('ngo_certificate_file').value == '') {
            document.getElementById('ngo_certificate_file_span').innerHTML = 'NGO certificate required';
        } else {
            document.getElementById('ngo_certificate_file_span').innerHTML = '';
        }
        if (document.getElementById('mouRadio1').checked || document.getElementById('mouRadio2').checked) {
            document.getElementById('mouRadio1_span').innerHTML = '';
        } else {
            document.getElementById('mouRadio1_span').innerHTML = 'Select one';
        }
        if (document.getElementById('darpanRadio1').checked || document.getElementById('darpanRadio2').checked) {
            document.getElementById('darpanRadio_span').innerHTML = '';
        } else {
            document.getElementById('darpanRadio_span').innerHTML = 'Select one';
        }
        if (document.getElementById('darpanRadio11').checked || document.getElementById('darpanRadio12').checked) {
            document.getElementById('darpanRadio11_span').innerHTML = '';
        } else {
            document.getElementById('darpanRadio11_span').innerHTML = 'Select one';
        }
        if (document.getElementById('relationship_certificate1').checked || document.getElementById(
                'relationship_certificate2').checked) {
            document.getElementById('relationship_certificate1_span').innerHTML = '';
        } else {
            document.getElementById('relationship_certificate1_span').innerHTML = 'Select one';
        }
        if (document.getElementById('fcra1').checked || document.getElementById(
                'fcra2').checked) {
            document.getElementById('fcra1_span').innerHTML = '';
        } else {
            document.getElementById('fcra1_span').innerHTML = 'Select one';
        }

        if (document.getElementById('ngo_achievement1').checked || document.getElementById(
                'ngo_achievement2').checked) {
            document.getElementById('ngo_achievement1_span').innerHTML = '';
        } else {
            document.getElementById('ngo_achievement1_span').innerHTML = 'Select one';
        }
        if (document.getElementById('direactor_aadhar').value == '') {
            document.getElementById('direactor_aadhar_span').innerHTML = 'required';
        } else {
            document.getElementById('direactor_aadhar_span').innerHTML = '';
        }
        if (document.getElementById('direactor_pan').value == '') {
            document.getElementById('direactor_pan_span').innerHTML = 'required';
        } else {
            document.getElementById('direactor_pan_span').innerHTML = '';
        }
        if (document.getElementById('direactor_photo').value == '') {
            document.getElementById('direactor_photo_span').innerHTML = 'required';
        } else {
            document.getElementById('direactor_photo_span').innerHTML = '';
        }
        if (document.getElementById('nogtypework').value == '') {
            document.getElementById('nogtypework_span').innerHTML = 'required';
        } else {
            document.getElementById('nogtypework_span').innerHTML = '';
        }
        if (document.getElementById('ngo_exp').value == '') {
            document.getElementById('ngo_exp_span').innerHTML = 'required';
        } else {
            document.getElementById('ngo_exp_span').innerHTML = '';
        }
        if (document.getElementById('declearation_about_ngo').value == '') {
            document.getElementById('declearation_about_ngo_span').innerHTML = 'required';
        } else {
            document.getElementById('declearation_about_ngo_span').innerHTML = '';
        }
        if (document.getElementById('ngo_password').value == '') {
            document.getElementById('ngo_password_span').innerHTML = 'required';
        } else {
            document.getElementById('ngo_password_span').innerHTML = '';
        }
        if (document.getElementById('factCertificateFile').value == '') {
            document.getElementById('factCertificateFileSpan').innerHTML = 'required';
        } else {
            document.getElementById('factCertificateFileSpan').innerHTML = '';
        }
        if (document.getElementById('ngo_registor_certificate_file').value == '') {
            document.getElementById('ngo_registor_certificate_file_span').innerHTML = 'required';
        } else {
            document.getElementById('ngo_registor_certificate_file_span').innerHTML = '';
        }
        if (document.getElementById('relationship_certificate_file').value == '') {
            document.getElementById('relationship_certificate_file_span').innerHTML = 'required';
        } else {
            document.getElementById('relationship_certificate_file_span').innerHTML = '';
        }
        if (document.getElementById('g_reg80_file').value == '') {
            document.getElementById('g_reg80_file_span').innerHTML = 'required';
        } else {
            document.getElementById('g_reg80_file_span').innerHTML = '';
        }
        if (document.getElementById('ngo_achievement_file').value == '') {
            document.getElementById('ngo_achievement_file_span').innerHTML = 'required';
        } else {
            document.getElementById('ngo_achievement_file_span').innerHTML = '';
        }
        if (document.getElementById('block_name').value == '') {
            document.getElementById('block_name_span').innerHTML = 'required';
        } else {
            document.getElementById('block_name_span').innerHTML = '';
        }
        if (document.getElementById('fcra_file').value == '') {
            document.getElementById('fcra_file_span').innerHTML = 'required';
        } else {
            document.getElementById('fcra_file_span').innerHTML = '';
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (!empty(session()->get('failed'))) { ?>
<script type="text/javascript">
    Swal.fire({
        icon: 'warning',
        title: '{{ session('failed') }}',
        showConfirmButton: false,
        timer: 3000,
        customClass: {
            popup: 'sweetalert-message' // Apply custom CSS class to the message
        }
    });
</script>
<?php }
session()->forget('failed'); ?>


@if (!empty(session()->get('success')))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000,
            customClass: {
                popup: 'sweetalert-message' // Apply custom CSS class to the message
            }
        });
    </script>
    @php
        session()->forget('success');
    @endphp
@endif

@include('inc/newfooter')

</html>
