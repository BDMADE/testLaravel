<div class="regular header_calculate_price">Calculate the price now</div>
<div id="calculator" class="eGcwth">

    <form class="bgOXaU" onchange="calculatePriceOrder()">
        <div class="row form-group">
            <br>
            <label class="col-xs-12 text-center inputLabel regular control-label label-header">
                Academic Level
            </label>
            <div class="col-xs-12">
                <select label="Academic Level" class="form-control" id="academiclevel_id">
                    @foreach($academiclevels as $al)
                        <option value="{!! $al->id !!}">{!! $al->nom !!}</option>
                    @endforeach

                </select><!-- react-text: 2274 --><!-- /react-text -->
            </div>
        </div>

        <div class="row form-group">
            <label class="col-xs-12 text-center inputLabel regular control-label label-header">Type of work</label>
            <div class="col-xs-12">
                <select label="Type of Paper" class="form-control" id="typeofwork_id">
                    @foreach($typeofworks as $tw)
                        <option value="{!! $tw->id !!}">{!! $tw->nom !!}</option>
                    @endforeach

                </select><!-- react-text: 2323 --><!-- /react-text -->
            </div>
        </div>

        <div class="row form-group">
            <div class="col-xs-12">
                <div class="col-xs-6 light">
                    <div class="sp-tooltip  feTUXg">
                        <div class="row form-group">
                            <label class="col-xs-12 text-center inputLabel regular control-label label-header">Deadline</label>
                            <div class="">
                                <select label="Deadline" class="form-control" id="deadline_id">
                                    @foreach($standarddeadlines as $sd)
                                        <option value="{!! $sd->id !!}">{!! $sd->nom !!}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">
                                    <!--span>
                                        Ready by Friday, Jan 12th, 9 am
                                    </span-->
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-6 light cpodps">
                    <div class="sp-tooltip  feTUXg">
                        <div class="row form-group">
                            <label class="col-xs-12 text-center inputLabel regular control-label label-header">Pages</label>
                            <div class="">
                                <span class="input-group">
                                    <span class="input-group-btn">
                                        <button name="minus" type="button" class="btn btn-default" onclick="modifierPage(false)">−</button>
                                    </span>
                                    <input type="number" value="1" label="Pages" id="number_of_page" class="text-center form-control" style="padding-right: 0px;">
                                    <span class="input-group-btn">
                                        <button name="plus" type="button" class="btn btn-default" onclick="modifierPage(true)">+</button>
                                    </span>
                                </span>
                                <span class="help-block">
                                    <span style="font-size: 12px;" id="wordpages_text_read">
                                        275 Words
                                    </span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 light cpodps">
                    <p class="" style="text-align: center; color: #ffaf00; text-shadow: -1px 2px 1px rgb(0, 0, 0);">
                        Order you paper for only {!! config('app.currency_sombolHTML') !!}<span id="montant_percent_to_bye">0.00</span>
                    </p>
                </div>

            </div>
        </div>
    </form>

    <div class="row">
        <div class="form-header-footer">
            <div class="regular col-xs-6 " style=" padding-left: 0px; padding-right: 0px;">
                <h4 class="text-center text-white" style="margin-top: 10px;">
                    Price:&nbsp;
                    {!! config('app.currency_sombol') !!} <span id="cout_de_la_command"> 4.99 </span>
                </h4>
            </div>
            <div class="col-xs-6">
                <a class="col-xs-12 text-center btn-continue-order" href="{{url('order')}}">Continue</a>
            </div>
        </div>
    </div>
</div>