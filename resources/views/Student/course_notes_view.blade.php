                                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                            <h1>Titulo</h1>
                                                            <div class="my-5">
                                                                <div class="form-group row">
                                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Jornada</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                                        <select class="form-control" id="Jornada" name="Jornada">
                                                                            <option value="">
                                                                                --Seleccione una opcion
                                                                            </option>
                                                                            @foreach($period as $jornada)
                                                                                <option value="{{$jornada->id}}">
                                                                                    {{$jornada->Name}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>        
                                                                <div class="form-group row">
                                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Nivel</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                                        <select class="form-control" id="Nivel" name="Nivel">
                                                                            <option value="" >
                                                                                --Seleccione una opcion
                                                                            </option>
                                                                            @foreach($level as $nivel)
                                                                                <option value="{{$nivel->id}}">
                                                                                    {{$nivel->Name}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Grado</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                                        <select class="form-control" id="Grado" name="Grado">
                                                                            <option value="">
                                                                                --Seleccione una opcion
                                                                            </option>
                                                                            @foreach($grade as $grado)
                                                                                <option value="{{$grado->id}}">
                                                                                    {{$grado->Name}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Seccion</label>
                                                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                                                        <select class="form-control" id="Seccion" name="Seccion">
                                                                            <option value="">
                                                                                --Seleccione una opcion
                                                                            </option>
                                                                            @foreach($section as $seccion)
                                                                                <option value="">
                                                                                    {{$seccion->Seccion}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>