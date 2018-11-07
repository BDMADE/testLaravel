@extends('layouts.template')


@section('css')
    <link href="{{asset('stepForm/css/stepForm.css')}}" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
        #static_price_sm
        {
            display: none;
        }
        @media (max-width:991px){
            #static_price_sm
            {
                display: block;
                position: fixed;
                width: 90px;
                background-color: #ec651f;
                height: 35px;
                left: 0px;
                top : 50%;
                padding: 2px 15px;
                color : white;
                font-weight: bold;
                z-index: 9999;
            }
        }
        @media (max-width:575px){
            .btn-step-form {
                width: auto;
                padding: 5px 15px;
                min-width: 100px;
            }
            label{
                text-align: left !important;
            }
            .input-group-addon {
                height: auto !important;
            }

            .social-btn {
                width: 100% !important;

            }
            .social-btn.facebook {
                margin-top: 25px;
                margin-left: 0%;
            }
            .social-btn.google {
                margin-left: 0%;
            }
        }
    </style>
@endsection


@section('menu')
@include('layouts.menu2')
@endsection

@section('content')




            <!-- ====== Features Section ====== -->
    <section id="orderForm" style="margin-bottom: 20px;">
        <div class="page-content" id="up">
            <div class="container-fluid">
                <div class="row">

                    <br><br>
                    <div class="col-lg-8  col-md-8 col-sm-10 col-xs-12 padding-left-step-form">


                        <form id="step_form" method="post" action="{{url('/order')}}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <section class="tabs-section step-form">

                                <div class="tabs-section-nav">
                                    <div class="tbl">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item active">
                                                <span class="nav-link" id="tabs-1-tab-0" role="tab" data-toggle="tab">
                                                    <span class="nav-link-in">
                                                        Paper details

                                                    </span>
                                                </span>
                                            </li>
                                            <!--li class="nav-item">
                                                <span class="nav-link" id="tabs-1-tab-1" role="tab" data-toggle="tab">
                                                    <span class="nav-link-in">
                                                        Prices calculation
                                                    </span>
                                                </span>
                                            </li-->
                                            <li class="nav-item">
                                                <span class="nav-link" id="tabs-1-tab-1" role="tab" data-toggle="tab">
                                                    <span class="nav-link-in">
                                                        Payment information
                                                    </span>
                                                </span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <!--.tabs-section-nav-->

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="tabs-2-tab-0">

                                        <div style="padding:20px;">
                                            <div data-reactid="270">
                                                <div class="sp-tooltip show ">
                                                    <div class="row form-group" >
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                            TYPE OF PAPER
                                                        </label>

                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <select name="typeofpaper_id" class="form-control">
                                                                @foreach($typepapers as $paper)
                                                                    <option value="{!! $paper->id !!}"
                                                                            {!! (isset($order) && $order->typepapers_id == $paper->id) ? 'selected' : '' !!}>
                                                                        {!! $paper->nom !!}
                                                                    </option>

                                                                @endforeach
                                                            </select><!-- react-text: 315 --><!-- /react-text -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sp-tooltip show ">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label"
                                                               data-reactid="321">Subject</label>

                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <select name="subject_id" class="form-control">
                                                                @foreach($subjects as $subject)
                                                                    <option value="{!! $subject->id !!}"
                                                                            {!! (isset($order) && $order->subject_id == $subject->id) ? 'selected' : '' !!}>
                                                                        {!! $subject->nom !!}
                                                                    </option>

                                                                @endforeach
                                                            </select><!-- react-text: 376 --><!-- /react-text -->
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="sp-tooltip show feTUXg">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                            <span style="position:relative;"> Topic
                                                                <span style="color:red;padding-left:5px;">*</span>
                                                            </span>
                                                        </label>

                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <input type="text" value="{!! (isset($order)) ? $order->topic : '' !!}"
                                                                   placeholder="Please enter your topic here"
                                                                   name="topic" id="topic" class="form-control">
                                                            <span class="error" id="topic_error" ></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sp-tooltip show feTUXg">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                            Description <span style="color:red;padding-left:5px;">*</span>
                                                        </label>

                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <textarea style="resize:vertical;" rows="3" name="description" id="description" type="text" class="form-control"
                                                                      placeholder="Please describe your needs"
                                                                    >{!! (isset($order)) ? $order->description : '' !!}</textarea>

                                                            <span class="error" id="description_error" ></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sp-tooltip show ">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;" class="control-label col-xs-12 col-sm-3 col-md-4 align-left ">
                                                            MATERIALS
                                                        </label>

                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <label class="btn btn-block btn-default fileinput-button center label-btn-upload">
                                                                        <span> <i class="fa fa-cloud-upload"></i>&nbsp;Add files </span>
                                                                        <input class="btn-upload" type="file" name="files[]" multiple="" >
                                                                    </label>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-6" >
                                                                    <ol style="margin:0;padding:0 0 0 15px;list-style:decimal;" ></ol>
                                                                </div>
                                                            </div>
                                                            <span class="help-block2" >Maximum file size is 25 MB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sp-tooltip show ">
                                                    <div class="row form-group">
                                                        <label  style="text-align:right;" class="col-xs-12 col-sm-3 col-md-4 align-left control-label" >Sources</label>
                                                        <div class="col-xs-12 col-sm-3 col-md-4" >
                                                            <span class="input-group" >
                                                                <span class="input-group-btn" >
                                                                    <button name="minus" type="button" class="btn btn-default"  onclick="modifierSource(false)">−</button>
                                                                </span>
                                                                <input type="number" name="source"
                                                                       value="{!! (isset($order)) ? $order->source : '0' !!}"
                                                                       id="sources_page" style="padding-right:0;"  class="text-center form-control" >
                                                                <span class="input-group-btn">
                                                                    <button name="plus" type="button" class="btn btn-default"  onclick="modifierSource(true)">+</button>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="sp-tooltip show feTUXg" data-reactid="434">
                                                    <div class="form-group  row" data-reactid="435">
                                                        <label  style="text-align:right;" class="control-label col-xs-12 col-sm-3 col-md-4 align-left">
                                                            <span>PAPER FORMAT</span>
                                                        </label>

                                                        <div class="col-xs-12 col-sm-9 col-md-8" id="bloc_paper_format">
                                                            <div type="select" class="ButtonGroup btn-group btn-group-justified">
                                                                <?php $i = 0; ?>
                                                                @foreach($typeformats as $typeformat)
                                                                    @if($i == 0)
                                                                        <input type="hidden" name="typeformat_id"
                                                                               value="{!! (!isset($order) || ($order->typeformat_id == $typeformat->id)) ? $typeformat->id : $order->typeformat_id !!}" id="typeformat_id" >
                                                                        <a onclick="changerPaperSelect({!! $typeformat->id !!}, this)" href="javascript:void(0)"
                                                                           class="btn btn-default {!! (!isset($order)||($order->typeformat_id == $typeformat->id)) ? 'active': '' !!}" role="button">{!! $typeformat->nom !!} </a>
                                                                        <?php $i++; ?>
                                                                    @else
                                                                        <a onclick="changerPaperSelect({!! $typeformat->id !!}, this)" href="javascript:void(0)"
                                                                           class="btn btn-default {!! (isset($order) && $order->typeformat_id == $typeformat->id) ? 'active' : '' !!}"
                                                                           role="button">{!! $typeformat->nom !!} </a>

                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <hr>


                                                <div class="sp-tooltip show feTUXg">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                            Academic Level
                                                        </label>
                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <select class="form-control" onchange="academicLevelChange(this)" name="academiclevel_id" id="academiclevel_id">
                                                                @foreach($academiclevels as $academiclevel)
                                                                    <option value="{!! $academiclevel->id !!}"
                                                                            {!! (isset($order) && $order->deadline->academicLevel->id == $academiclevel->id) ? 'selected' : '' !!}>
                                                                        {!! $academiclevel->nom !!}
                                                                    </option>

                                                                @endforeach
                                                            </select><!-- react-text: 2274 --><!-- /react-text -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="sp-tooltip show feTUXg">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                            Type of Work
                                                        </label>
                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <select class="form-control" onchange="typeOfWorkChange(this)" name="typeofwork_id" id="typeofwork_id">
                                                                @foreach($typeofworks as $typeofwork)
                                                                    <option value="{!! $typeofwork->id !!}"
                                                                            {!! (isset($order) && $order->typeofwork_id == $typeofwork->id) ? 'selected' : '' !!}>
                                                                        {!! $typeofwork->nom !!}
                                                                    </option>

                                                                @endforeach
                                                            </select><!-- react-text: 2274 --><!-- /react-text -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="sp-tooltip show feTUXg">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">

                                                        </label>
                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                            <select label="Deadline" class="form-control" onchange="deadlineChange(this)" name="deadline_id" id="deadline_id">
                                                                @foreach($standarddeadlines as $standarddeadline)
                                                                    <option value="{!! $standarddeadline->id !!}"
                                                                            {!! (isset($order) && $order->deadline->deadline->id == $standarddeadline->id) ? 'selected' : '' !!}>
                                                                        {!! $standarddeadline->nom !!}
                                                                    </option>

                                                                @endforeach
                                                            </select>
                                                    <span class="help-block2">
                                                        <span id="id-display-deadline-text" >

                                                        </span>
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sp-tooltip show feTUXg">
                                                    <div class="row form-group">
                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                            Pages
                                                        </label>
                                                        <div class="col-xs-12 col-sm-6 col-sm-6">
                                                    <span class="input-group">
                                                        <span class="input-group-btn">
                                                            <button name="minus" type="button" class="btn btn-default" onclick="modifierPage(false)">−</button>
                                                        </span>
                                                        <input type="number" id="number_of_page" name="number_of_page" onchange="numberOfPageChange(this)"
                                                               value="{!! (isset($order)) ? $order->number_of_page : '1' !!}"
                                                               label="Pages" class="text-center form-control" style="padding-right: 0px;">
                                                        <span class="input-group-btn">
                                                            <button name="plus" type="button" class="btn btn-default" onclick="modifierPage(true)">+</button>
                                                        </span>
                                                    </span>
                                                    <span class="help-block2">
                                                        <span style="font-size: 12px;" id="wordpages_text_read">
                                                            {!! (isset($order)) ? ($order->number_of_page * $order->wordPage->nb_word) : '275' !!}  Words
                                                        </span>
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="sp-tooltip show feTUXg" data-reactid="434">
                                                    <div class="form-group  row" data-reactid="435">
                                                        <label  style="text-align:right;" class="control-label col-xs-12 col-sm-3 col-md-4 align-left">
                                                            <span>Spacing</span>
                                                        </label>

                                                        <div class="col-xs-12 col-sm-9 col-md-8" id="bloc_word_page">

                                                            <div type="select" class="ButtonGroup btn-group btn-group-justified">
                                                                <?php $i = 0; ?>
                                                                @foreach($wordpages as $wordpage)
                                                                    @if($i == 0)
                                                                        <input type="hidden" name="wordpage_id"
                                                                               value="{!! (!isset($order) || ($order->wordpage_id == $wordpage->id)) ? $wordpage->id : $order->wordpage_id !!}" id="wordpage_id" >
                                                                        <a onclick="changerWordPage({!! $wordpage->id !!}, {!! $wordpage->nb_word !!}, this)" href="javascript:void(0)"
                                                                           class="btn btn-default {!! (!isset($order)||($order->wordpage_id == $wordpage->id)) ? 'active': '' !!}" role="button">{!! $wordpage->nom !!} </a>
                                                                        <?php $i++; ?>
                                                                    @else
                                                                        <a onclick="changerWordPage({!! $wordpage->id !!}, {!! $wordpage->nb_word !!}, this)" href="javascript:void(0)"
                                                                           class="btn btn-default {!! (isset($order) && $order->wordpage_id == $wordpage->id) ? 'active' : '' !!}"
                                                                           role="button">{!! $wordpage->nom !!} </a>

                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>






                                            </div>
                                        </div>

                                    </div>
                                    <!--.tab-pane-->

                                    <!--div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-1">






                                    </div-->
                                    <!--.tab-pane-->

                                    <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-1">

                                        <div class="sp-tooltip show feTUXg">
                                            <div class="row form-group">
                                                <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                    &nbsp;
                                                </label>
                                                <div class="col-xs-12 col-sm-9 col-md-8" id="bloc_user_level">
                                                    <div type="select" value="1" label="Choose your writer" class="ButtonGroup btn-group btn-group-justified">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="premium_mode" id="premium_mode" value="0"  data-toggle="toggle"
                                                                       onchange="changerPremiumService(this)"  data-onstyle="success"
                                                                        >
                                                                get our premium service

                                                            </label>
                                                        </div>
                                                        <!--a href="javascript:void(0);"
                                                           class="btn btn-default"
                                                           role="button" onclick="changerPremiumService(this)" >
                                                                    <span style="white-space: normal;">
                                                                        <span style="font-size: 16px; display: block;">premium service</span>
                                                                        <hr class="border" style="margin: 10px; float: none; width: auto;">
                                                                        <span>
                                                                            get our premium service
                                                                        </span>
                                                                    </span>
                                                        </a-->



                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!--div class="sp-tooltip show feTUXg">
                                            <div class="row form-group">
                                                <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">
                                                    CHOOSE YOUR WRITER
                                                </label>
                                                <div class="col-xs-12 col-sm-9 col-md-8" id="bloc_user_level">
                                                        <div type="select" value="1" label="Choose your writer" class="ButtonGroup btn-group btn-group-justified">

                                                            <?php $i = 0; ?>
                                                            @foreach($userslevels as $userslevel)
                                                                @if($i == 0)
                                                                    <input type="hidden" name="userslevel_id"
                                                                           value="{!! (!isset($order) || ($order->deadline->userslevel->id == $userslevel->id)) ? $userslevel->id : $order->deadline->userslevel->id !!}"
                                                                           id="userslevel_id" >
                                                                @endif
                                                                <a href="javascript:void(0);"
                                                                   class="btn btn-default {!! ((isset($order) && $order->deadline->userslevel->id == $userslevel->id) || (!isset($order) && $i == 0))  ? 'active' : '' !!}"
                                                                   role="button" onclick="changerUserLevel({!! $userslevel->id !!}, this)" >
                                                                    <span style="white-space: normal;">
                                                                        <span style="font-size: 16px; display: block;">{!! $userslevel->nom !!}</span>
                                                                        <hr class="border" style="margin: 10px; float: none; width: auto;">
                                                                        <span>
                                                                            {!!
                                                                                ($userslevel->appliquer_prixfixe) ?
                                                                                (($userslevel->prix_fixe == 0)? 'Standard price' : '$'.$userslevel->prix_fixe) :
                                                                                 (($userslevel->prix_percent == 0)? 'Standard price' : $userslevel->prix_percent.'%')
                                                                             !!}


                                                                        </span>
                                                                    </span>
                                                                </a>
                                                                <?php $i++; ?>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                            </div>
                                        </div-->

                                        <div class="sp-tooltip show feTUXg">
                                            <div class="row form-group">
                                                @if(count($extratservices) > 0)
                                                <label style="text-align:right;"  class="control-label col-xs-12 col-sm-3 col-md-4 align-left">Additional features</label>
                                                <div class="col-xs-12 col-sm-9 col-md-8">
                                                    <div style="
                                                                position: relative;
                                                                cursor: pointer;
                                                                overflow: visible;
                                                                display: table;
                                                                height: auto;
                                                                width: 100%;">
                                                        @foreach($extratservices as $extratservice)
                                                            <div class="btn-group btn-group-vertical" data-toggle="buttons">
                                                                <label class="btn">
                                                                    <input type="checkbox" name='extratservice_id[]'
                                                                           value="{!! $extratservice->id !!}"
                                                                           id="extratservice_id{!! $extratservice->id !!}"
                                                                            onchange="extratServiceChange(this)" {!! (isset($order) && $order->hasExtratService($extratservice->id)) ? 'checked' : '' !!}>
                                                                    <i class="fa fa-square-o fa-2x"></i>
                                                                    <i class="fa fa-check-square-o fa-2x"></i>
                                                                    <span> {!! $extratservice->nom !!} (
                                                                        {!! ($extratservice->appliquer_prixfixe) ? '+$'.$extratservice->prix_fixe : '+'.$extratservice->prix_percent.'%' !!}
                                                                        )
                                                                    </span>
                                                                </label>
                                                            </div>

                                                        @endforeach

                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="sp-tooltip show feTUXg">
                                            <div class="row form-group">
                                                <label style="text-align:right;"  class="control-label col-xs-12 col-sm-3 col-md-4 align-left">Discount</label>
                                                <div class="col-xs-12 col-sm-9 col-md-8">
                                                    <div class="row">
                                                        <div class="col-xs-7 col-sm-8" style="padding-right: 5px;">
                                                            <div class="form-group">
                                                                <input type="hidden" name="bonreduction" id="hidden-code-discount" placeholder="Enter discount code here"
                                                                       value="{!! (isset($order) && !is_null($order->bonreduction_id)) ? $order->bonReduction->code : '' !!}"
                                                                       class="form-control">
                                                                <input type="text" name="reduction" id="input-code-discount" placeholder="Enter discount code here"
                                                                       value="{!! (isset($order) && !is_null($order->bonreduction_id)) ? $order->bonReduction->code : '' !!}"
                                                                       class="form-control">
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-5 col-sm-4" style="padding-left: 5px;">
                                                            <button tabindex="0" type="button" class="btn btn-info" onclick="applyDiscount('{!! route('apply-discount') !!}')">
                                                                <div>
                                                                    <span style="
                                                                                position: relative;
                                                                                padding-left: 16px;
                                                                                padding-right: 16px;
                                                                                vertical-align: middle;
                                                                                letter-spacing: 0px;
                                                                                text-transform: uppercase;
                                                                                font-weight: 500;
                                                                                font-size: 14px;">
                                                                        APPLY <i class="fa fa-spinner fa-spin hidden" id="apply_discount"></i>
                                                                    </span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12" id="message_discount">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-top: 5px;"></div>
                                        </div>



                                        <div style="
                                                color: rgba(0, 0, 0, 0.87);
                                                background-color: rgb(255, 255, 255);
                                                transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;
                                                box-sizing: border-box;
                                                font-family: Roboto, sans-serif;
                                                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                                                box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 6px, rgba(0, 0, 0, 0.12) 0px 1px 4px;
                                                border-radius: 2px;
                                                z-index: 1;
                                                overflow: visible;">
                                            <div style="padding-bottom: 0px;">

                                                @if(!auth()->check() || (auth()->check() && !(auth()->user()->role->slug == 'superadmin' || auth()->user()->role->slug == 'admin')))

                                                    <div value="old" class="tabs-area" id="box-login-register">
                                                        <div style="width: 100%; background: white; white-space: nowrap; color: black;">
                                                            <button id="tab-login-header-0" tabindex="0" type="button" onclick="afficherTab(0)" class="tab-login active">
                                                                    I have an account
                                                            </button>
                                                            <button id="tab-login-header-1" tabindex="0" type="button"  onclick="afficherTab(1)" class="tab-login">
                                                                    I am new here
                                                            </button>
                                                        </div>

                                                        <div>
                                                            <div id="tab-login-0">
                                                                <div style="padding: 20px 20px 5px;">
                                                                    <div class="row form-group">
                                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">Email</label>
                                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                                            <input type="email" value="" id="email_login" placeholder="Enter your e-mail here" name="email" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <label style="text-align:right;"  class="col-xs-12 col-sm-3 col-md-4 align-left control-label">Password</label>
                                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                                            <div class="input-group">
                                                                                <input type="password" id="password_login" value="" placeholder="Enter your password" name="password" class="form-control"  aria-describedby="basic-addon2">
                                                                                <span class="input-group-addon" id="basic-addon2">
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" class="custom-control-input"
                                                                                               onclick="viewPwd(this.checked, 'password_login')">
                                                                                        <label class="custom-control-label" for="customCheck1">Show</label>
                                                                                    </div>
                                                                                </span>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label style="text-align:right;"  class="control-label col-xs-9 col-sm-3 col-md-4 align-left">REMEMBER ME</label>
                                                                        <div class="col-xs-3 col-sm-5 col-md-5">
                                                                            <div class="btn-group btn-group-vertical" data-toggle="buttons">
                                                                                <label class="btn">
                                                                                    <input type="checkbox" name='remenber_me' id="remenber_me_login" value="0">
                                                                                    <i class="fa fa-square-o fa-2x"></i>
                                                                                    <i class="fa fa-check-square-o fa-2x"></i>
                                                                                    <span> &nbsp;</span>
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-4 col-md-3">
                                                                            <a  href="javascript:void(0)" class="btn btn-info pull-right" onclick="loginUser()">
                                                                                login to continue  <i class="fa fa-spinner fa-spin hidden" id="standard_login"></i>
                                                                            </a>

                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 error" id="error_login1">

                                                                        </div>
                                                                    </div>
                                                                    <div style="margin-top: 0px; transform: translateY(-30%);">
                                                                        <a  href="javascript:void(0)" class="social-btn facebook" onclick="facebookLogin()">
                                                                            Login With Facebook &amp; CONTINUE  <i class="fa fa-spinner fa-spin hidden" id="facebook_login1"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0)"  scope="public_profile, email" class="social-btn google"  onclick="googleLogin()">
                                                                            Login With Google &amp; CONTINUE
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div  id="tab-login-1" >
                                                                <div style="padding: 20px 20px 5px;">
                                                                    <div class="row form-group">
                                                                        <label class="col-xs-12 col-sm-3 col-md-4 align-left control-label">Email</label>
                                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                                            <input type="email" id="register_email"  value="" placeholder="Enter your e-mail here" name="email" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row phone">
                                                                        <label class="control-label col-xs-12 col-sm-3 col-md-4 align-left">Phone number</label>
                                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                                            <div class="special-country-list">
                                                                                <input type="hidden" name="pays" value="{!! (count($pays) > 0)?$pays[0]->code:'' !!}" id="pays_code">
                                                                                <div class="dropdown">
                                                                                    <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                        @if(count($pays) > 0)
                                                                                            <img src="{!! asset('images/flags/'.strtolower($pays[0]->code).'.png') !!}"
                                                                                                 title="{!! $pays[0]->nom !!}">
                                                                                            <span>
                                                                                                (+{!! $pays[0]->indicatif_tel !!})
                                                                                            </span>
                                                                                        @else
                                                                                             Country
                                                                                        @endif
                                                                                    </a>
                                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                                        @foreach($pays as $pay)
                                                                                            <div value="{!! $pay->id !!}" class="dropdown-item" type="button" title="{!! $pay->nom !!}"
                                                                                                    onclick="setCountry('{!! strtolower($pay->code) !!}', '{!! asset('images/flags/'.strtolower($pay->code).'.png')!!}', {!! $pay->indicatif_tel !!})">
                                                                                                <img src="{!! asset('images/flags/'.strtolower($pay->code).'.png') !!}">
                                                                                                <span> {!! $pay->nom !!} (+{!! $pay->indicatif_tel !!}) </span>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>

                                                                                <input type="number" id="register_phone" class="form-control" id="phone" aria-describedby="basic-addon3">
                                                                            </div>
                                                                            <div class="intl-tel-input allow-dropdown">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <label class="col-xs-12 col-sm-3 col-md-4 align-left control-label">Password</label>
                                                                        <div class="col-xs-12 col-sm-9 col-md-8">
                                                                            <div class="input-group">
                                                                                <input type="password" id="register_pwd" value="" placeholder="Enter your password" name="password" class="form-control"  aria-describedby="basic-addon2">
                                                                                <span class="input-group-addon" id="basic-addon2">
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" id="register_view_pwd" class="custom-control-input"
                                                                                                onclick="viewPwd(this.checked, 'register_pwd')">
                                                                                        <label class="custom-control-label" for="customCheck1">Show</label>
                                                                                    </div>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="control-label col-xs-9 col-sm-3 col-md-4 align-left">
                                                                            REMEMBER ME
                                                                        </label>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                                                            <div class="btn-group btn-group-vertical" data-toggle="buttons">
                                                                                <label class="btn">
                                                                                    <input type="checkbox" id='register_remember'  name='register_remember' value="0">
                                                                                    <i class="fa fa-square-o fa-2x"></i>
                                                                                    <i class="fa fa-check-square-o fa-2x"></i>
                                                                                    <span> &nbsp;</span>
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-5 col-md-5">
                                                                            <a  href="javascript:void(0)" class="btn btn-info pull-right" onclick="registerUser()">
                                                                                register to continue  <i class="fa fa-spinner fa-spin hidden" id="standard_register"></i>
                                                                            </a>

                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-12 col-md-12 error" id="error_login2">

                                                                        </div>
                                                                    </div>
                                                                    <div style="margin-top: 0px; transform: translateY(-30%);">
                                                                        <a href="javascript:void(0)" scope="public_profile, email" class="social-btn facebook" onclick="facebookLogin()">
                                                                            Login With Facebook &amp; CONTINUE <i class="fa fa-spinner fa-spin hidden" id="facebook_login2"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0)"  scope="public_profile, email" class="social-btn google"  onclick="googleLogin()">
                                                                            Login With Google &amp; CONTINUE
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="is_admin_record" id="is_admin_record" value="1">
                                                    <div class="row" style="padding: 20px 10px">
                                                        <div class="col-md-4" style="text-align: right;">
                                                            <b>Select user</b>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <select name="user_id" id="user_id" class="form-control" required>
                                                                @foreach($users as $us)
                                                                    <option value="{!! $us->id !!}">{!! $us->name !!} ({!! $us->email !!})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!--.tab-pane-->

                                </div>
                                <!--.tab-content-->
                            </section>

                            <section class="">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="button" class="btn btn-inline btn-step-form  btn-blue pull-right" id="next-form">
                                                Next
                                            </button>

                                            <button type="button" class="btn btn-inline btn-step-form  btn-red pull-right btn-margin" id="prev-form">
                                                Previous
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--.box-typical-->

                        </form>


                    </div>
                    <!--.col- -->
                    <div class="hidden-sm hidden-xs col-md-4 col-lg-4">
                        <div>
                            <div>
                                <div class="header-order-pay-list">
                                    <span>
                                        Price : {!! config('app.currency_sombol') !!} <span id="cout_de_la_command">4.99</span>
                                    </span>
                                </div>
                                <div
                                    style="color:rgba(0, 0, 0, 0.87);
                                    background-color:#ffffff;
                                    transition:all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;
                                    box-sizing:border-box;
                                    font-family:Roboto, sans-serif;
                                    -webkit-tap-highlight-color:rgba(0,0,0,0);
                                    box-shadow:0 1px 6px rgba(0, 0, 0, 0.12), 0 1px 4px rgba(0, 0, 0, 0.12);
                                    border-radius:2px;
                                    padding:10px;">
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-6" style="padding-right:0;">
                                                <img style="width:100%;" src="{{asset('images/logo_pay/Paypal.png')}}">
                                            </div>
                                            <div class="col-xs-6" style="padding-left:0;">
                                                <img style="width:100%;" src="{{asset('images/logo_pay/visa.png')}}">
                                            </div>
                                        </div>
                                        <div class="row" data-reactid="470">
                                            <div class="col-xs-6" style="padding-right:0;">
                                                <img style="width:100%;" src="{{asset('images/logo_pay/MasterCard.png')}}">
                                            </div>
                                            <div class="col-xs-6" style="padding-left:0;">
                                                <img style="width:100%;" src="{{asset('images/logo_pay/amex.png')}}">
                                            </div>
                                        </div>
                                        <div class="row" data-reactid="475">
                                            <div class="col-xs-6" style="padding-right:0;">
                                                <img style="width:100%;" src="{{asset('images/logo_pay/JCB.png')}}">
                                            </div>
                                            <div class="col-xs-6" style="padding-left:0;">
                                                <img style="width:100%;" src="{{asset('images/logo_pay/DN.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--.row-->
            </div>
            <!--.container-fluid-->
        </div>
        <!--.page-content-->
    </section>





@endsection

@section('sample')

    @include('front.contactBloc')



    <div id="static_price_sm">
        <span>
            {!! config('app.currency_sombol') !!} <span id="cout_de_la_command2">4.99</span>
        </span>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('stepForm/js/stepForm.js')}}"></script>
    <script src="{{asset('js/my.js')}}"></script>
    <script src="{{asset('js/calculatePrice.js')}}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(function() {
            $('#premium_mode').bootstrapToggle({
                width: '200'
            });
        })
    </script>

    <script>
        //var academicLevel = [];
        @foreach($academiclevels as $academiclevel)
            window.academicLevel[{!! $academiclevel->id !!}] = [];
            var i = 0;
            @foreach($deadlines as $deadline)
                @if($deadline->academiclevel_id == $academiclevel->id)
                    window.academicLevel[{!! $academiclevel->id !!}][{!! $deadline->standarddeadline_id !!}] = [{!! $deadline->prix_standard !!}, {!! $deadline->prix_premium !!}];

                @endif

            @endforeach
        @endforeach

        //var typeOfWorks = [];
        @foreach($typeofworks as $typeofwork)
            window.typeOfWorks[{!! $typeofwork->id !!}] = [{!! $typeofwork->prix_percent !!} , {!! $typeofwork->prix_fixe !!} , {!! $typeofwork->appliquer_prixfixe ? 'true' : 'false' !!}];

        @endforeach

        //var wordpages = [];
        @foreach($wordpages as $wordpage)
            window.wordpages[{!! $wordpage->id !!}] = [{!! $wordpage->nb_word !!} , {!! $wordpage->percentage_price !!}];

        @endforeach

        //var userlevel = [];
        @foreach($userslevels as $userslevel)
            window.userlevel[{!! $userslevel->id !!}] = [{!! $userslevel->prix_percent !!} , {!! $userslevel->prix_fixe !!} , {!! $userslevel->appliquer_prixfixe ? 'true' : 'false' !!}];

        @endforeach

        @foreach($extratservices as $extratservice)
            window.extratservices[{!! $extratservice->id !!}] = [{!! $extratservice->prix_percent !!} , {!! $extratservice->prix_fixe !!} , {!! $extratservice->appliquer_prixfixe ? 'true' : 'false' !!}];

        @endforeach

        @foreach($standarddeadlines as $standarddeadline)
            window.standarddeadline[{!! $standarddeadline->id !!}] = ['{!! $standarddeadline->nom !!}' , {!! $standarddeadline->nb_days !!}];

        @endforeach

        @if(isset($order) && !is_null($order->bonreduction_id))
            window.discount = [
                {!! $order->bonReduction->applique_prixfixe ? $order->bonReduction->prix_fixe : $order->bonReduction->prix_percent !!},
                {!! $order->bonReduction->applique_prixfixe ? 1 : 0 !!}
            ];
        @endif

        window.user_login = {!! auth()->check() ? 'true' : 'false' !!};

        $(document).ready(function(){
            afficherTout();
            allReadyRegistred(window.user_login);
            $('#tab-login-1').hide();
        });

        window.token = '{!! csrf_token() !!}';
        window.base_url = '{!! url('/') !!}';


    </script>


@endsection


@section('scriptImportant')


    <script>


        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1989010381321286',
                cookie     : true,
                xfbml      : true,
                version    : 'v2.12'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        checkLoginState();


    </script>

    <script async defer src="https://apis.google.com/js/api.js"
            onload="this.onload=function(){};HandleGoogleApiLibrary()"
            onreadystatechange="if (this.readyState === 'complete') this.onload()">

    </script>

    <script>


        // Called when Google Javascript API Javascript is loaded
        function HandleGoogleApiLibrary() {
            // Load "client" & "auth2" libraries
            gapi.load('client:auth2',  {
                callback: function() {
                    // Initialize client & auth libraries
                    gapi.client.init({
                        apiKey: 'freelancer-192418',
                        clientId: '489484819754-pu7vr71t798kerhodbhpi5ci9hgfq9nn.apps.googleusercontent.com',
                        scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me'
                    }).then(
                            function(success) {
                                console.log(success);
                                // Libraries are initialized successfully
                                // You can now make API calls
                            },
                            function(error) {
                                console.log(error);
                                // Error occurred
                                // console.log(error) to find the reason
                            }
                    );
                },
                onerror: function() {
                    console.log('error onerror');
                    // Failed to load libraries
                }
            });
        }



    </script>


@endsection