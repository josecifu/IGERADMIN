@extends('Administration.Base/BaseTeacher')
{{-- Page title --}}
    @section('title')
    Inicio
    @stop
    @section('breadcrumb1')
    Voluntario
    @stop
    @section('breadcrumb2')
    Principal
    @stop
    {{-- Page content --}}
    @section('content')

        <div class="content flex-column-fluid" id="kt_content">
                <h3>Tablero</h3>
                <!--begin::Card-->
                                <div class="d-flex flex-row">
                                    <div class="col-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-body">
                                                <!--begin::Top-->
                                                <div class="d-flex">
                                                    <!--begin::Pic-->
                                                    <div class="flex-shrink-0 mr-7">
                                                        <div class="symbol symbol-50 symbol-lg-120">
                                                            @if(session()->get('Gender')=="Masculino")
                                                                    <img src="{{ asset ('assets/media/svg/avatars/Teacher-boy-1.svg')}}" class="h-75 align-self-end" alt="" />
                                                                @else
                                                                    <img src="{{ asset ('assets/media/svg/avatars/Teacher-girl-1.svg')}}" class="h-75 align-self-end" alt="" />
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <!--end::Pic-->
                                                    <!--begin: Info-->
                                                    <div class="flex-grow-1">
                                                        <!--begin::Title-->
                                                        <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                                            <!--begin::User-->
                                                            <div class="mr-3">
                                                                <!--begin::Name-->
                                                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{session()->get('Name')}}
                                                                <i class="flaticon2-correct text-warning icon-md ml-2"></i></a>
                                                                <!--end::Name-->
                                                                <!--begin::Contacts-->
                                                                <div class="d-flex flex-wrap my-2">
                                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>{{session()->get('Email')}}</a>
                                                                    
                                                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>Voluntario</a>
                                                                </div>
                                                                <!--end::Contacts-->
                                                            </div>
                                                            <!--begin::User-->
                                                            <!--begin::Actions-->
                                                            <div class="my-lg-0 my-1">
                                                                
                                                                <a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Ver perfil</a>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                                            <!--begin::Description-->
                                                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5"></div>
                                                            <!--end::Description-->
                                                            <!--begin::Progress-->
                                                            <div class="d-flex mt-4 mt-sm-0">
                                                                
                                                            </div>
                                                            <!--end::Progress-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Top-->
                                                <!--begin::Separator-->
                                                <div class="separator separator-solid my-7"></div>
                                                <!--end::Separator-->
                                                <!--begin::Bottom-->
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column text-dark-75">
                                                            <span class="font-weight-bolder font-size-sm">Circulos de estudio</span>
                                                            <span class="font-weight-bolder font-size-h5">
                                                            <span class="text-dark-50 font-weight-bold"></span>0</span>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-presentation-1 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column text-dark-75">
                                                            <span class="font-weight-bolder font-size-sm">Grados asignados</span>
                                                            <span class="font-weight-bolder font-size-h5">
                                                            <span class="text-dark-50 font-weight-bold"></span>0</span>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-list-3 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column text-dark-75">
                                                            <span class="font-weight-bolder font-size-sm">Materias asignadas</span>
                                                            <span class="font-weight-bolder font-size-h5">
                                                            <span class="text-dark-50 font-weight-bold"></span>0</span>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column flex-lg-fill">
                                                            <span class="text-dark-75 font-weight-bolder font-size-sm">0 Examenes realizados</span>
                                                            <a href="#" class="text-primary font-weight-bolder">Ver</a>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="d-flex flex-column">
                                                            <span class="text-dark-75 font-weight-bolder font-size-sm">0 Notas realizadas</span>
                                                            <a href="#" class="text-primary font-weight-bolder">Ver</a>
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                    <!--begin: Item-->
                                                    <div class="d-flex align-items-center flex-lg-fill my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-tabs icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                        <div class="symbol-group symbol-hover">
                                                            
                                                        </div>
                                                    </div>
                                                    <!--end: Item-->
                                                </div>
                                                <!--end::Bottom-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row">
                                    <div class="col-12">
                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <span class="card-icon">
                                                        <i class="flaticon2-image-file text-primary"></i>
                                                    </span>
                                                    <h3 class="card-label">Asignaciones de examenes y presentación de notas</h3>
                                                </div>
                                                <div class="card-toolbar">
                                                  
                                                 
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!--begin: Datatable-->
                                                <table class="table table-bordered table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                                                    <thead>
                                                        <tr>
                                                            <th>Record ID</th>
                                                            <th>Order ID</th>
                                                            <th>Country</th>
                                                            <th>Ship City</th>
                                                            <th>Ship Address</th>
                                                            <th>Company Agent</th>
                                                            <th>Company Name</th>
                                                            <th>Ship Date</th>
                                                            <th>Status</th>
                                                            <th>Type</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>322</td>
                                                            <td>0338-1009</td>
                                                            <td>Brazil</td>
                                                            <td>Osasco</td>
                                                            <td>002 Menomonie Crossing</td>
                                                            <td>Keith Lukesch</td>
                                                            <td>Hand-Kemmer</td>
                                                            <td>1/13/2017</td>
                                                            <td>6</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>328</td>
                                                            <td>59886-308</td>
                                                            <td>Brazil</td>
                                                            <td>Franca</td>
                                                            <td>57273 Dryden Trail</td>
                                                            <td>Edmund Labitt</td>
                                                            <td>Gibson, Hamill and Abbott</td>
                                                            <td>2/6/2017</td>
                                                            <td>2</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>154</td>
                                                            <td>60760-278</td>
                                                            <td>Brazil</td>
                                                            <td>Blumenau</td>
                                                            <td>4672 Pawling Park</td>
                                                            <td>Ivett Faldo</td>
                                                            <td>Bogan and Sons</td>
                                                            <td>12/11/2017</td>
                                                            <td>5</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>64616-103</td>
                                                            <td>Brazil</td>
                                                            <td>São Félix do Xingu</td>
                                                            <td>698 Oriole Pass</td>
                                                            <td>Hayes Boule</td>
                                                            <td>Casper-Kerluke</td>
                                                            <td>10/15/2017</td>
                                                            <td>5</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>226</td>
                                                            <td>55111-125</td>
                                                            <td>Brazil</td>
                                                            <td>Joinville</td>
                                                            <td>7645 Marquette Alley</td>
                                                            <td>Luce Hindshaw</td>
                                                            <td>Tromp-Langosh</td>
                                                            <td>12/7/2017</td>
                                                            <td>3</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>140</td>
                                                            <td>49035-441</td>
                                                            <td>Brazil</td>
                                                            <td>Seabra</td>
                                                            <td>4858 5th Lane</td>
                                                            <td>Ware Schuler</td>
                                                            <td>Ritchie LLC</td>
                                                            <td>1/29/2016</td>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>123</td>
                                                            <td>0869-0434</td>
                                                            <td>Brazil</td>
                                                            <td>Jaciara</td>
                                                            <td>9477 Cardinal Street</td>
                                                            <td>Daniela Casine</td>
                                                            <td>Ortiz-Wuckert</td>
                                                            <td>7/31/2016</td>
                                                            <td>4</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>191</td>
                                                            <td>30142-980</td>
                                                            <td>Brazil</td>
                                                            <td>Cafarnaum</td>
                                                            <td>57 Valley Edge Road</td>
                                                            <td>Lilla Espino</td>
                                                            <td>Luettgen, Witting and Ratke</td>
                                                            <td>6/6/2017</td>
                                                            <td>5</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>173</td>
                                                            <td>53014-580</td>
                                                            <td>Brazil</td>
                                                            <td>Marau</td>
                                                            <td>3120 Jenna Court</td>
                                                            <td>Pippa Castelletto</td>
                                                            <td>Howell, Pfannerstill and Gottlieb</td>
                                                            <td>6/22/2016</td>
                                                            <td>3</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>283</td>
                                                            <td>51672-2073</td>
                                                            <td>Brazil</td>
                                                            <td>Monte Alto</td>
                                                            <td>870 Carioca Plaza</td>
                                                            <td>Alanson Beloe</td>
                                                            <td>Medhurst LLC</td>
                                                            <td>7/11/2017</td>
                                                            <td>4</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>249</td>
                                                            <td>55891-002</td>
                                                            <td>Brazil</td>
                                                            <td>Palmital</td>
                                                            <td>50 Melby Circle</td>
                                                            <td>Fraser Crichmere</td>
                                                            <td>Parisian, Koelpin and Abshire</td>
                                                            <td>7/31/2016</td>
                                                            <td>3</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>167</td>
                                                            <td>63517-160</td>
                                                            <td>Brazil</td>
                                                            <td>Araras</td>
                                                            <td>14366 Sunnyside Road</td>
                                                            <td>Maiga Moorcraft</td>
                                                            <td>Quitzon-Denesik</td>
                                                            <td>8/6/2017</td>
                                                            <td>4</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>180</td>
                                                            <td>66949-112</td>
                                                            <td>Bulgaria</td>
                                                            <td>Topolovgrad</td>
                                                            <td>000 Ronald Regan Hill</td>
                                                            <td>Dewie Stanyforth</td>
                                                            <td>Effertz, Wunsch and Champlin</td>
                                                            <td>8/22/2016</td>
                                                            <td>6</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>291</td>
                                                            <td>49999-849</td>
                                                            <td>Burkina Faso</td>
                                                            <td>Sapouy</td>
                                                            <td>656 Toban Trail</td>
                                                            <td>Jephthah Munnery</td>
                                                            <td>Deckow, Rau and Wilkinson</td>
                                                            <td>11/30/2017</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>276</td>
                                                            <td>65841-656</td>
                                                            <td>Canada</td>
                                                            <td>Daveluyville</td>
                                                            <td>83781 Summer Ridge Hill</td>
                                                            <td>Candice Aaronsohn</td>
                                                            <td>Crona, Pfeffer and Jacobson</td>
                                                            <td>11/28/2016</td>
                                                            <td>5</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>17</td>
                                                            <td>59528-4456</td>
                                                            <td>Canada</td>
                                                            <td>Melfort</td>
                                                            <td>141 Aberg Pass</td>
                                                            <td>Arlie Larking</td>
                                                            <td>Rosenbaum Group</td>
                                                            <td>7/7/2017</td>
                                                            <td>4</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>232</td>
                                                            <td>55154-0611</td>
                                                            <td>Canada</td>
                                                            <td>Beaconsfield</td>
                                                            <td>642 Prentice Alley</td>
                                                            <td>L;urette Huckin</td>
                                                            <td>Emard-Adams</td>
                                                            <td>3/11/2016</td>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>250</td>
                                                            <td>58975-022</td>
                                                            <td>Canada</td>
                                                            <td>Swan Hills</td>
                                                            <td>44 Kennedy Drive</td>
                                                            <td>Cazzie Mardy</td>
                                                            <td>Rohan-Keeling</td>
                                                            <td>11/20/2016</td>
                                                            <td>1</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>122</td>
                                                            <td>51143-966</td>
                                                            <td>Canada</td>
                                                            <td>Casselman</td>
                                                            <td>95030 Waywood Alley</td>
                                                            <td>Ignacius Coulbeck</td>
                                                            <td>Abbott-Jacobs</td>
                                                            <td>10/21/2016</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>179</td>
                                                            <td>75854-202</td>
                                                            <td>Canada</td>
                                                            <td>Stettler</td>
                                                            <td>895 Aberg Street</td>
                                                            <td>Isa Lundie</td>
                                                            <td>Schumm LLC</td>
                                                            <td>4/22/2017</td>
                                                            <td>4</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>228</td>
                                                            <td>41167-0968</td>
                                                            <td>Chile</td>
                                                            <td>San Clemente</td>
                                                            <td>94915 Marquette Street</td>
                                                            <td>Robers Usherwood</td>
                                                            <td>Hirthe, Baumbach and Crona</td>
                                                            <td>7/29/2016</td>
                                                            <td>4</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>37</td>
                                                            <td>52686-288</td>
                                                            <td>Chile</td>
                                                            <td>San Carlos</td>
                                                            <td>6915 Mifflin Terrace</td>
                                                            <td>Patrizio Pinnion</td>
                                                            <td>Haag-Stokes</td>
                                                            <td>10/7/2016</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>206</td>
                                                            <td>65643-327</td>
                                                            <td>Chile</td>
                                                            <td>Tomé</td>
                                                            <td>53 Annamark Circle</td>
                                                            <td>Justinian McKenny</td>
                                                            <td>Runolfsson-Conn</td>
                                                            <td>11/16/2016</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>66</td>
                                                            <td>68428-046</td>
                                                            <td>China</td>
                                                            <td>Beishan</td>
                                                            <td>06022 Hoffman Way</td>
                                                            <td>Cornie Duff</td>
                                                            <td>Schimmel, Williamson and Heller</td>
                                                            <td>5/11/2017</td>
                                                            <td>1</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>33</td>
                                                            <td>67046-271</td>
                                                            <td>China</td>
                                                            <td>Sanhe</td>
                                                            <td>537 Graceland Park</td>
                                                            <td>Kiley MacTerlagh</td>
                                                            <td>Hauck Inc</td>
                                                            <td>6/9/2017</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>181</td>
                                                            <td>66993-055</td>
                                                            <td>China</td>
                                                            <td>Xinshiba</td>
                                                            <td>4322 Judy Crossing</td>
                                                            <td>Buddy Staddon</td>
                                                            <td>Prohaska-Treutel</td>
                                                            <td>10/5/2016</td>
                                                            <td>5</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>190</td>
                                                            <td>59779-314</td>
                                                            <td>China</td>
                                                            <td>Changgang</td>
                                                            <td>06 Northview Circle</td>
                                                            <td>Fabe Meek</td>
                                                            <td>Littel Inc</td>
                                                            <td>2/6/2016</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>203</td>
                                                            <td>98132-744</td>
                                                            <td>China</td>
                                                            <td>Chengbei</td>
                                                            <td>42641 Arapahoe Terrace</td>
                                                            <td>Ora Zanassi</td>
                                                            <td>Klein, Lang and Stroman</td>
                                                            <td>6/25/2016</td>
                                                            <td>4</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>101</td>
                                                            <td>21695-935</td>
                                                            <td>China</td>
                                                            <td>Bamencheng</td>
                                                            <td>1531 Fulton Crossing</td>
                                                            <td>Cece Conville</td>
                                                            <td>Kessler and Sons</td>
                                                            <td>7/21/2017</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>40</td>
                                                            <td>63402-193</td>
                                                            <td>China</td>
                                                            <td>Xibin</td>
                                                            <td>9 Duke Point</td>
                                                            <td>Augustin Jouannisson</td>
                                                            <td>Witting, Reilly and Morar</td>
                                                            <td>7/3/2016</td>
                                                            <td>3</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>39</td>
                                                            <td>60681-2104</td>
                                                            <td>China</td>
                                                            <td>Shangdu</td>
                                                            <td>61653 Welch Trail</td>
                                                            <td>Blisse Coleborn</td>
                                                            <td>Bailey, Windler and Marquardt</td>
                                                            <td>5/15/2017</td>
                                                            <td>6</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>244</td>
                                                            <td>66993-877</td>
                                                            <td>China</td>
                                                            <td>Dalai</td>
                                                            <td>8 Rutledge Road</td>
                                                            <td>Tally Burtwhistle</td>
                                                            <td>Gusikowski-Berge</td>
                                                            <td>5/27/2016</td>
                                                            <td>1</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>256</td>
                                                            <td>76209-123</td>
                                                            <td>China</td>
                                                            <td>Hanban</td>
                                                            <td>6 Kenwood Crossing</td>
                                                            <td>Patricio Parslow</td>
                                                            <td>Klocko and Sons</td>
                                                            <td>5/6/2016</td>
                                                            <td>2</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>264</td>
                                                            <td>50080-001</td>
                                                            <td>China</td>
                                                            <td>Huangtan</td>
                                                            <td>85885 Donald Pass</td>
                                                            <td>Marcelle Cavozzi</td>
                                                            <td>Tillman Group</td>
                                                            <td>11/10/2016</td>
                                                            <td>4</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>251</td>
                                                            <td>65862-102</td>
                                                            <td>China</td>
                                                            <td>Haikou</td>
                                                            <td>10 6th Place</td>
                                                            <td>Lina Heintsch</td>
                                                            <td>Kuvalis Group</td>
                                                            <td>2/9/2016</td>
                                                            <td>6</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>349</td>
                                                            <td>61703-423</td>
                                                            <td>China</td>
                                                            <td>Huanglong</td>
                                                            <td>93 Scofield Place</td>
                                                            <td>Fitz Blanchard</td>
                                                            <td>Gorczany-O'Keefe</td>
                                                            <td>3/5/2016</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>243</td>
                                                            <td>68196-974</td>
                                                            <td>China</td>
                                                            <td>Yuexi</td>
                                                            <td>51 Morrow Park</td>
                                                            <td>Galvin Lamacraft</td>
                                                            <td>Feeney and Sons</td>
                                                            <td>4/20/2016</td>
                                                            <td>6</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>259</td>
                                                            <td>59779-394</td>
                                                            <td>China</td>
                                                            <td>Shuidong</td>
                                                            <td>8543 Anniversary Way</td>
                                                            <td>Raymond Gingell</td>
                                                            <td>Wisoky-Olson</td>
                                                            <td>5/10/2016</td>
                                                            <td>1</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>162</td>
                                                            <td>57344-152</td>
                                                            <td>China</td>
                                                            <td>Xinhui</td>
                                                            <td>9 Corben Alley</td>
                                                            <td>Masha Masey</td>
                                                            <td>Botsford-Feest</td>
                                                            <td>1/23/2017</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>277</td>
                                                            <td>63354-370</td>
                                                            <td>China</td>
                                                            <td>Huaqiao</td>
                                                            <td>42 Clyde Gallagher Street</td>
                                                            <td>Addie Greet</td>
                                                            <td>Dibbert Group</td>
                                                            <td>3/28/2017</td>
                                                            <td>4</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>301</td>
                                                            <td>49483-061</td>
                                                            <td>China</td>
                                                            <td>Pingtian</td>
                                                            <td>817 Logan Junction</td>
                                                            <td>Dolley Dickens</td>
                                                            <td>Wehner Group</td>
                                                            <td>6/18/2016</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>53</td>
                                                            <td>49999-307</td>
                                                            <td>China</td>
                                                            <td>Pinghu</td>
                                                            <td>1090 Orin Junction</td>
                                                            <td>Briant Fincher</td>
                                                            <td>Fisher, Williamson and Howe</td>
                                                            <td>12/25/2017</td>
                                                            <td>4</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>304</td>
                                                            <td>55154-0880</td>
                                                            <td>China</td>
                                                            <td>Sanxi</td>
                                                            <td>67 Moland Pass</td>
                                                            <td>Friedrich Maasz</td>
                                                            <td>Green LLC</td>
                                                            <td>1/2/2017</td>
                                                            <td>5</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>278</td>
                                                            <td>68788-9847</td>
                                                            <td>China</td>
                                                            <td>Longquan</td>
                                                            <td>767 Lillian Point</td>
                                                            <td>Malorie Emanulsson</td>
                                                            <td>McKenzie-Windler</td>
                                                            <td>2/1/2017</td>
                                                            <td>4</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>348</td>
                                                            <td>62040-1001</td>
                                                            <td>China</td>
                                                            <td>Huangtudian</td>
                                                            <td>28182 Rowland Way</td>
                                                            <td>Batholomew Stoneham</td>
                                                            <td>Dickens, Jast and Abernathy</td>
                                                            <td>12/25/2017</td>
                                                            <td>5</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>57</td>
                                                            <td>67457-358</td>
                                                            <td>China</td>
                                                            <td>Ditang</td>
                                                            <td>2 Bluejay Junction</td>
                                                            <td>Sharona Schirach</td>
                                                            <td>Funk LLC</td>
                                                            <td>11/23/2016</td>
                                                            <td>3</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>55154-6876</td>
                                                            <td>China</td>
                                                            <td>Jiannan</td>
                                                            <td>8 Muir Drive</td>
                                                            <td>Krishnah Tosspell</td>
                                                            <td>Prosacco-Kessler</td>
                                                            <td>2/5/2016</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>342</td>
                                                            <td>58411-131</td>
                                                            <td>China</td>
                                                            <td>Chenhu</td>
                                                            <td>3403 Heffernan Lane</td>
                                                            <td>Linn Richten</td>
                                                            <td>D'Amore-Block</td>
                                                            <td>9/4/2016</td>
                                                            <td>2</td>
                                                            <td>2</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>32</td>
                                                            <td>15370-110</td>
                                                            <td>China</td>
                                                            <td>Caijiang</td>
                                                            <td>2 Mariners Cove Way</td>
                                                            <td>Kerianne Axelbey</td>
                                                            <td>Wolff, Sporer and Bechtelar</td>
                                                            <td>2/20/2016</td>
                                                            <td>6</td>
                                                            <td>1</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>275</td>
                                                            <td>68084-003</td>
                                                            <td>China</td>
                                                            <td>Chuanxi</td>
                                                            <td>91 Pleasure Drive</td>
                                                            <td>Cybill Deny</td>
                                                            <td>Littel, Ankunding and Abernathy</td>
                                                            <td>5/28/2016</td>
                                                            <td>3</td>
                                                            <td>3</td>
                                                            <td nowrap="nowrap"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!--end: Datatable-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
								<!--end::Card-->
								<!--begin::Teachers-->
								<div class="d-flex flex-row">
                                    <div class="col-xl-6">
                                        <div class="card card-custom gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-7">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bold font-size-h4 text-dark-75">Punteos verificados</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Last week
                                                    <span class="text-primary font-weight-bolder">9 accidents</span></span>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <ul class="nav nav-pills nav-pills-sm nav-dark">
                                                        <li class="nav-item ml-0">
                                                            <a class="nav-link py-2 px-4 font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_1_1">Mes</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link py-2 px-4 active font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_2_2">Semana</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-1">
                                                <div class="tab-content mt-5" id="myTabLIist18">
                                                    <!--begin::Tap pane-->
                                                    <div class="tab-pane fade" id="kt_tab_pane_1_1" role="tabpanel" aria-labelledby="kt_tab_pane_1_1">
                                                        <!--begin::Form-->
                                                        <div class="form">
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-25.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Nike &amp; Blue</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Your website will have long term business should think about those term business</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-24.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Red Boots</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Have long term business objectives. You should think about those long term business</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-20.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder font-size-lg text-hover-primary mb-1">Cup &amp; Green</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Your company your website have long term business objectives. You should think about</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-6">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-19.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Yellow Background</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Your company will have long term business objectives You should think about those long</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Tap pane-->
                                                    <!--begin::Tap pane-->
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_2_2" role="tabpanel" aria-labelledby="kt_tab_pane_2_2">
                                                        <!--begin::Form-->
                                                        <div class="form">
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-20.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder font-size-lg text-hover-primary mb-1">Cup &amp; Green</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Your company your website have long term business objectives. You should think about</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-19.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Yellow Background</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Your company will have long term business objectives You should think about those long</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-9">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-25.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Nike &amp; Blue</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Your website will have long term business should think about those term business</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center pb-6">
                                                                <!--begin::Symbol-->
                                                                <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                                    <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-24.jpg')"></div>
                                                                </div>
                                                                <!--end::Symbol-->
                                                                <!--begin::Section-->
                                                                <div class="d-flex flex-column flex-grow-1">
                                                                    <!--begin::Title-->
                                                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-1">Red Boots</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Desc-->
                                                                    <span class="text-dark-50 font-weight-normal font-size-sm">Have long term business objectives. You should think about those long term business</span>
                                                                    <!--begin::Desc-->
                                                                </div>
                                                                <!--end::Section-->
                                                            </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Tap pane-->
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Examenes programados</span>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                                        <li class="nav-item">
                                                            <a class="nav-link py-2 px-4 active font-weight-bolder" data-toggle="tab" href="#kt_tab_pane_10_2">Hoy</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--begin::Body-->
                                            <div class="card-body pt-2 pb-0 mt-n3">
                                                <div class="tab-content mt-5" id="myTabTables10">
                                                    <!--begin::Tap pane-->
                                                    <div class="tab-pane fade show active" id="kt_tab_pane_10_2" role="tabpanel" aria-labelledby="kt_tab_pane_10_2">
                                                        <!--begin::Table-->
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless table-vertical-center">
                                                                <!--begin::Thead-->
                                                                <thead>
                                                                    <tr>
                                                                        <th class="p-0 w-50px"></th>
                                                                        <th class="p-0 w-100 min-w-100px"></th>
                                                                        <th class="p-0"></th>
                                                                        <th class="p-0 min-w-130px w-100"></th>
                                                                    </tr>
                                                                </thead>
                                                                <!--end::Thead-->
                                                                <!--begin::Tbody-->
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="pl-0 pt-0 py-5">
                                                                            <div class="symbol symbol-45 symbol-light-success mr-2">
                                                                                <span class="symbol-label">
                                                                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Playlist1.svg-->
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                                <path d="M8.97852058,18.8007059 C8.80029331,20.0396328 7.53473012,21 6,21 C4.34314575,21 3,19.8807119 3,18.5 C3,17.1192881 4.34314575,16 6,16 C6.35063542,16 6.68722107,16.0501285 7,16.1422548 L7,5.93171093 C7,5.41893942 7.31978104,4.96566617 7.78944063,4.81271925 L13.5394406,3.05418311 C14.2638626,2.81827161 15,3.38225531 15,4.1731748 C15,4.95474642 15,5.54092513 15,5.93171093 C15,6.51788965 14.4511634,6.89225606 14,7 C13.3508668,7.15502181 11.6842001,7.48835515 9,8 L9,18.5512168 C9,18.6409956 8.9927193,18.7241187 8.97852058,18.8007059 Z" fill="#000000" fill-rule="nonzero" />
                                                                                                <path d="M16,9 L20,9 C20.5522847,9 21,9.44771525 21,10 C21,10.5522847 20.5522847,11 20,11 L16,11 C15.4477153,11 15,10.5522847 15,10 C15,9.44771525 15.4477153,9 16,9 Z M14,13 L20,13 C20.5522847,13 21,13.4477153 21,14 C21,14.5522847 20.5522847,15 20,15 L14,15 C13.4477153,15 13,14.5522847 13,14 C13,13.4477153 13.4477153,13 14,13 Z M14,17 L20,17 C20.5522847,17 21,17.4477153 21,18 C21,18.5522847 20.5522847,19 20,19 L14,19 C13.4477153,19 13,18.5522847 13,18 C13,17.4477153 13.4477153,17 14,17 Z" fill="#000000" opacity="0.3" />
                                                                                            </g>
                                                                                        </svg>
                                                                                        <!--end::Svg Icon-->
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td class="pl-0">
                                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">School Music Festival</a>
                                                                            <span class="text-muted font-weight-bold d-block">By Rose Liam</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td class="text-left">
                                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                                            <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                        </td>
                                                                        <td class="text-right pr-0">
                                                                            <a href="#" class="btn btn-icon btn-light btn-sm">
                                                                                <span class="svg-icon svg-icon-md svg-icon-success">
                                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                                        </g>
                                                                                    </svg>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pl-0 py-5">
                                                                            <div class="symbol symbol-45 symbol-light-danger mr-2">
                                                                                <span class="symbol-label">
                                                                                    <span class="svg-icon svg-icon-2x svg-icon-danger">
                                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                                                                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                                                            </g>
                                                                                        </svg>
                                                                                        <!--end::Svg Icon-->
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td class="pl-0">
                                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Maths Championship</a>
                                                                            <span class="text-muted font-weight-bold d-block">By Tom Gere</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td class="text-left">
                                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">25 Oct, 10:05PM</span>
                                                                            <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                        </td>
                                                                        <td class="text-right pr-0">
                                                                            <a href="#" class="btn btn-icon btn-light btn-sm">
                                                                                <span class="svg-icon svg-icon-md svg-icon-success">
                                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                                        </g>
                                                                                    </svg>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pl-0 py-5">
                                                                            <div class="symbol symbol-45 symbol-light-primary mr-2">
                                                                                <span class="symbol-label">
                                                                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
                                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                                <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
                                                                                                <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                                                                                            </g>
                                                                                        </svg>
                                                                                        <!--end::Svg Icon-->
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td class="pl-0">
                                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Who Knows Geography</a>
                                                                            <span class="text-muted font-weight-bold d-block">By Zoey Dylan</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td class="text-left">
                                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                                            <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                        </td>
                                                                        <td class="text-right pr-0">
                                                                            <a href="#" class="btn btn-icon btn-light btn-sm">
                                                                                <span class="svg-icon svg-icon-md svg-icon-success">
                                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                                        </g>
                                                                                    </svg>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pl-0 py-5">
                                                                            <div class="symbol symbol-45 symbol-light-warning mr-2">
                                                                                <span class="symbol-label">
                                                                                    <span class="svg-icon svg-icon-2x svg-icon-warning">
                                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                                                                <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                                                            </g>
                                                                                        </svg>
                                                                                        <!--end::Svg Icon-->
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td class="pl-0">
                                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Napoleon Days</a>
                                                                            <span class="text-muted font-weight-bold d-block">By Luke Owen</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td class="text-left">
                                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                                            <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                        </td>
                                                                        <td class="text-right pr-0">
                                                                            <a href="#" class="btn btn-icon btn-light btn-sm">
                                                                                <span class="svg-icon svg-icon-md svg-icon-success">
                                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                                        </g>
                                                                                    </svg>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pl-0 py-5">
                                                                            <div class="symbol symbol-45 symbol-light-info mr-2">
                                                                                <span class="symbol-label">
                                                                                    <span class="svg-icon svg-icon-2x svg-icon-info">
                                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Color-profile.svg-->
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                                <path d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                                <circle fill="#000000" cx="12" cy="9" r="5" />
                                                                                            </g>
                                                                                        </svg>
                                                                                        <!--end::Svg Icon-->
                                                                                    </span>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td class="pl-0">
                                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">The School Art Leads</a>
                                                                            <span class="text-muted font-weight-bold d-block">By Ellie Cole</span>
                                                                        </td>
                                                                        <td></td>
                                                                        <td class="text-left">
                                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                                            <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                                        </td>
                                                                        <td class="text-right pr-0">
                                                                            <a href="#" class="btn btn-icon btn-light btn-sm">
                                                                                <span class="svg-icon svg-icon-md svg-icon-success">
                                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                                                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                                        </g>
                                                                                    </svg>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <!--end::Tbody-->
                                                            </table>
                                                        </div>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Tap pane-->
                                                </div>
                                            </div>
                                             <!--end::Body-->
                                        </div>
                                    </div>
                                <!--end::Teachers-->
                                </div>
        </div>
	@stop
    @section('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script type="text/javascript">
    "use strict";
    var KTDatatablesAdvancedRowGrouping = function() {
    
        var init = function() {
            var table = $('#kt_datatable');
    
            // begin first table
            table.DataTable({
                layout: {
                    scroll: true,
                    height: 550,
                    footer: false
                },
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                responsive: true,
                pageLength: 5,
                order: [[2, 'asc']],
                drawCallback: function(settings) {
                    var api = this.api();
                    var rows = api.rows({page: 'current'}).nodes();
                    var last = null;
    
                    api.column(2, {page: 'current'}).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>',
                            );
                            last = group;
                        }
                    });
                },
                columnDefs: [
                    {
                        // hide columns by index number
                        targets: [0, 2],
                        visible: false,
                    },
                    {
                        targets: -1,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return '\
                                <div class="dropdown dropdown-inline">\
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
                                        <i class="la la-cog"></i>\
                                    </a>\
                                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                        <ul class="nav nav-hoverable flex-column">\
                                            <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
                                            <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
                                            <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
                                        </ul>\
                                      </div>\
                                </div>\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                    <i class="la la-edit"></i>\
                                </a>\
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                                    <i class="la la-trash"></i>\
                                </a>\
                            ';
                        },
                    },
                    {
                        targets: 8,
                        render: function(data, type, full, meta) {
                            var status = {
                                1: {'title': 'Pending', 'class': 'label-light-primary'},
                                2: {'title': 'Delivered', 'class': ' label-light-danger'},
                                3: {'title': 'Canceled', 'class': ' label-light-primary'},
                                4: {'title': 'Success', 'class': ' label-light-success'},
                                5: {'title': 'Info', 'class': ' label-light-info'},
                                6: {'title': 'Danger', 'class': ' label-light-danger'},
                                7: {'title': 'Warning', 'class': ' label-light-warning'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                        },
                    },
                    {
                        targets: 9,
                        render: function(data, type, full, meta) {
                            var status = {
                                1: {'title': 'Online', 'state': 'danger'},
                                2: {'title': 'Retail', 'state': 'primary'},
                                3: {'title': 'Direct', 'state': 'success'},
                            };
                            if (typeof status[data] === 'undefined') {
                                return data;
                            }
                            return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                                '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                        },
                    },
                ],
            });
        };
    
        return {
    
            //main function to initiate the module
            init: function() {
                init();
            },
    
        };
    
    }();
    
    jQuery(document).ready(function() {
        KTDatatablesAdvancedRowGrouping.init();
    });
</script>
      
	@stop