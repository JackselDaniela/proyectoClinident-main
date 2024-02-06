@extends('layouts.plantilla')

@section('title')
<title>Clinident / Honorarios</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Ganancias</h4>
            </div>
            <div class="col-sm-7 col-8 text-right m-b-30">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white"><img src="{{asset('assets/img/pdf.png')}}" style="width: 30px"></button>
                    <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Imprimir</button>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Honorarios</a></li>
                <li class="breadcrumb-item"><a href="#">Ganancias</a></li>
            </ol>
        </nav>

        <section>
            <div class="row filter-row">
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control datetimepicker" placeholder="Fecha Inicio" type="datetime">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control datetimepicker" placeholder="Fecha Fin" type="datetime">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control" placeholder="Doc. Id. Doctor" type="text">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="payslip-title">Ganancias Acumuladas</h4>
                        <div class="row">
                            <div class="col-sm-6 m-b-20">
                                <img src="assets/img/logoc.png" class="inv-logo" alt="">
                                <ul class="list-unstyled mb-0">
                                    <li>Clinident</li>
                                    <li>3864 Quiet Valley Lane,</li>
                                    <li>Sherman Oaks, CA, 91403</li>
                                </ul>
                            </div>
                            <div class="col-sm-6 m-b-20">
                                <div class="invoice-details">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 m-b-20">
                                <ul class="list-unstyled">
                                    <li>
                                        <h5 class="mb-0"><strong>Andrea Donato</strong></h5></li>
                                    <li><span>Odontologo General</span></li>
                                    <li>Employee ID: OG-0010</li>
                                    <li>Trabaja desde: 7 May 2015</li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Acumulado Semanal</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Sueldo neto</strong> <span class="float-right">$500</span></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <h4 class="m-b-10"><strong>Acumulado Mensual</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Sueldo neto</strong> <span class="float-right">$6500</span></td>
                                            </tr>
                                            <tr>
                                                <p><strong >Salario Neto: $6500</strong> (seis mil quinientos dolares)</p>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-12">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
        
    </div>
</div>
@endsection

@section('js-externo')
    <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
@endsection
