
<div class="col-xs-12 margin-top-md general-stats general-bg-block">
    <div class="box box-primary general-stats-box">

        <div class="col-sm-3">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        {!! $user->nb_biddingOrdersAdmin() !!}
                    </h3>

                    <p>Total recent orders</p>
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
                    <h3>{!! $user->nb_progressOrdersAdmin() !!}</h3>

                    <p>Total orders in Progress</p>
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
                    <h3>{!! $user->nb_completeOrdersAdmin() !!}</h3>

                    <p>Total completed orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-square-o"></i>
                </div>
            </div>
        </div>


        <div class="col-sm-3">
            <div class="small-box bg-yellow" onclick="redirect('{!! route('see-all-waiting-payment') !!}')">
                <div class="inner">
                    <h3>{!! config('app.currency_sombolHTML') !!} {!! (-1) * $user->amountInWaitAdmin() !!}</h3>

                    <p>Total amount to recive (click to see)</p>
                </div>
                <div class="icon">
                    {!! config('app.currency_sombolHTML') !!}
                </div>
            </div>

        </div>



    </div>
</div>

