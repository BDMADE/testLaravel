
<div class="col-xs-12 margin-top-md general-stats general-bg-block">
    <div class="box box-primary general-stats-box">

        <div class="col-sm-3">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        {!! $user->nb_biddingOrders() !!}
                    </h3>

                    <p>recent orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{!! $user->nb_progressOrders() !!}</h3>

                    <p>Orders in Progress</p>
                </div>
                <div class="icon">
                    <i class="fa fa-line-chart"></i>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{!! $user->nb_completeOrders() !!}</h3>

                    <p>Completed Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-square-o"></i>
                </div>
            </div>
        </div>


        <div class="col-sm-3">
            <!-- small box -->
            @if($user->solde[0]->montant_utile < 0)
                <div class="small-box bg-yellow" onclick="payerFacture('{!! route('pay-for-order', [((-1) * $user->solde[0]->montant_utile), ((-1) * $user->solde[0]->montant_utile)]) !!}')">
                    <div class="inner">
                        <h3>{!! config('app.currency_sombolHTML') !!} {!! $user->solde[0]->montant_utile !!}</h3>

                        <p>Balance (click to pay)</p>
                    </div>
                    <div class="icon">
                        {!! config('app.currency_sombolHTML') !!}
                    </div>
                </div>
            @else
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{!! config('app.currency_sombolHTML') !!} {!! $user->solde[0]->montant_utile !!}</h3>

                        <p>Balance</p>
                    </div>
                    <div class="icon">
                        {!! config('app.currency_sombolHTML') !!}
                    </div>
                </div>
            @endif
        </div>



    </div>
</div>

