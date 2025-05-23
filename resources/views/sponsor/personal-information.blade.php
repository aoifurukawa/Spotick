@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Profile</h3>
    <hr>
    <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
        <div class="row">
            <div class="col-6">
                <h4>About You</h4>
                <hr>
                <label for="avatar" class="form-label d-block mb-3">Avatar</label>
                @if (Auth::user()->avatar)
                    <img src={{ Auth::user()->avatar }} alt="" style="height: 195px; width: 195px; border-radius: 50%; border: 1px solid black" class="mb-4">
                @else
                <img src={{ asset('images/doll.png') }} alt="" style="height: 195px; width: 195px; border-radius: 50%; border: 1px solid black" class="mb-4">
                @endif

                <input class="form-control mb-3" type="file" id="formFile" name="avatar">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" id="name" class="form-control mb-3" value='{{ old('name', Auth::user()->name) }}'>
                <label for="role" class="form-label">Role: if you choose Sponsor, you have to create <a href="https://www.paypal.com/ph/home">Paypal</a> account</label>
                <p class="my-0">Notion: if you change the role, you have to logout once.</p>
                <select name="role_id" id="role" class="form-select mb-3">
                    <option value="" hidden>Select role</option>
                    @if (Auth::user()->role_id == 1)
                        <option value="1" {{ old('role_id', Auth::user()->role_id) == 1 ? 'selected' : '' }}>Administrator</option>
                    @else
                        <option value="2" {{ old('role_id', Auth::user()->role_id) == 2 ? 'selected' : '' }}>User</option>
                        <option value="3" {{ old('role_id', Auth::user()->role_id) == 3 ? 'selected' : '' }}>Sponsor</option>
                    @endif
                </select>
                @error('role_id')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-3" value='{{ old('password', Auth::user()->password) }}'>
            </div>

            <div class="col-6">
                <h4>Contact Information</h4>
                <hr>
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control mb-3" value='{{ old('email', Auth::user()->email) }}'>
                <label for="phone" class="form-label">Phone Number <span class="fw-bold">(same as Paypal phone number)</span></label>
                <input type="number" name="phone_number" id="phone" class="form-control mb-3" value='{{ old('phone_number', Auth::user()->phone_number) }}'>

                <h4>Residence Information</h4>
                <hr>
                <label for="country" class="form-label">Country</label>
                <select name="country" id="cuntry" class="form-select mb-3" >                                   
                    <option value="" hidden></option>
                    <option value="Afghanistan" {{ old('country', Auth::user()->country ?? '') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                    <option value="Åland Islands" {{ old('country', Auth::user()->country ?? '') == 'Åland Islands' ? 'selected' : '' }}>Åland Islands</option>
                    <option value="Albania" {{ old('country', Auth::user()->country ?? '') == 'Albania' ? 'selected' : '' }}>Albania</option>
                    <option value="Algeria" {{ old('country', Auth::user()->country ?? '') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                    <option value="American Samoa" {{ old('country', Auth::user()->country ?? '') == 'American Samoa' ? 'selected' : '' }}>American Samoa</option>
                    <option value="Andorra" {{ old('country', Auth::user()->country ?? '') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                    <option value="Angola" {{ old('country', Auth::user()->country ?? '') == 'Angola' ? 'selected' : '' }}>Angola</option>
                    <option value="Anguilla" {{ old('country', Auth::user()->country ?? '') == 'Anguilla' ? 'selected' : '' }}>Anguilla</option>
                    <option value="Antarctica" {{ old('country', Auth::user()->country ?? '') == 'Antarctica' ? 'selected' : '' }}>Antarctica</option>
                    <option value="Antigua and Barbuda" {{ old('country', Auth::user()->country ?? '') == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                    <option value="Argentina" {{ old('country', Auth::user()->country ?? '') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                    <option value="Armenia" {{ old('country', Auth::user()->country ?? '') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                    <option value="Aruba" {{ old('country', Auth::user()->country ?? '') == 'Aruba' ? 'selected' : '' }}>Aruba</option>
                    <option value="Australia" {{ old('country', Auth::user()->country ?? '') == 'Australia' ? 'selected' : '' }}>Australia</option>
                    <option value="Austria" {{ old('country', Auth::user()->country ?? '') == 'Austria' ? 'selected' : '' }}>Austria</option>
                    <option value="Azerbaijan" {{ old('country', Auth::user()->country ?? '') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                    <option value="Bahamas" {{ old('country', Auth::user()->country ?? '') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                    <option value="Bahrain" {{ old('country', Auth::user()->country ?? '') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                    <option value="Bangladesh" {{ old('country', Auth::user()->country ?? '') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                    <option value="Barbados" {{ old('country', Auth::user()->country ?? '') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                    <option value="Belarus" {{ old('country', Auth::user()->country ?? '') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                    <option value="Belgium" {{ old('country', Auth::user()->country ?? '') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                    <option value="Belize" {{ old('country', Auth::user()->country ?? '') == 'Belize' ? 'selected' : '' }}>Belize</option>
                    <option value="Benin" {{ old('country', Auth::user()->country ?? '') == 'Benin' ? 'selected' : '' }}>Benin</option>
                    <option value="Bermuda" {{ old('country', Auth::user()->country ?? '') == 'Bermuda' ? 'selected' : '' }}>Bermuda</option>
                    <option value="Bhutan" {{ old('country', Auth::user()->country ?? '') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                    <option value="Bolivia" {{ old('country', Auth::user()->country ?? '') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                    <option value="Bosnia and Herzegovina" {{ old('country', Auth::user()->country ?? '') == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                    <option value="Botswana" {{ old('country', Auth::user()->country ?? '') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                    <option value="Bouvet Island">Bouvet Island</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Territories">French Southern Territories</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guernsey">Guernsey</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-bissau">Guinea-bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan" {{ old('country', Auth::user()->country ?? '') == 'Japan' ? 'selected' : '' }}>Japan</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                    <option value="Korea, Republic of">Korea, Republic of</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macao">Macao</option>
                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines" {{ old('country', Auth::user()->country ?? '') == 'philippines' ? 'selected' : '' }}>Philippines</option>
                    <option value="Pitcairn">Pitcairn</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Helena">Saint Helena</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-leste">Timor-leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Viet Nam">Viet Nam</option>
                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
                <label for="zip-code" class="form-label">Zip Code</label>
                <input type="number" name="zip_code" id="zip-code" class="form-control mb-3" value='{{ old('zip_code', Auth::user()->zip_code) }}'>
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control mb-3" value='{{ old('address', Auth::user()->address) }}'>
                <label for="air_port" class="form-label">Air Port (you often use)</label>
                <input type="text" name="airport" id="air_port" class="form-control mb-3" value='{{ old('air_port', Auth::user()->airport) }}'>
                <div class="row" style="margin-top: 47px;">
                    <div class="col-6"><button type="submit" class="btn btn-primary w-100"><span>Update </span></button></div>
                    <div class="col-6"><a href="{{ route('home') }}" class="text-decoration-none btn btn-danger btn-outline-white w-100">Cancel</a></div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
